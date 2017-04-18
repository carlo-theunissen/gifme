'use strict';

console.log('Loading function');
/**
 * This script is used by AWS Lambda to create a gif out of a video
 * The lambda gets activated when there is a "S3 Put" event.
 *
 * To create a gif you'll have to proceed through these steps
 * 1) Download the object from s3 to the /tmp folder we have write rights in that folder
 * 2) Copy the ffmpeg binary to the /tmp folder
 * 3) make a palette of the object. This is necessary for great quality
 * 4) compile the movie to gif with the previous created palette
 * 5) Upload the gif to the bucket
 * 9) Dance around, you made yourself a gif :D
 */
exports.handler = function(event, context, callback){
    var exec = require('child_process').exec;
    var AWS = require('aws-sdk');
    var srcBucket = event.Records[0].s3.bucket.name;
    var srcKey = decodeURIComponent(event.Records[0].s3.object.key.replace(/\+/g, " "));

    var name = srcKey.split('/')[1];

    var s3 = new AWS.S3();
    var options = {
        Bucket    : srcBucket,
        Key       : srcKey
    };

    //download the file
    var file = require('fs').createWriteStream("/tmp/"+name);

    var fileStream = s3.getObject(options).createReadStream();
    var stream = fileStream.pipe(file);

    stream.on('finish', function () {

        //move ffmpeg
        var cmd = "cp ffmpeg /tmp/ffmpeg && chmod 755 /tmp/ffmpeg";

        //make a palette
        cmd += ' && /tmp/ffmpeg -v warning -i /tmp/'+name +' -vf "fps=15,scale=320:-1:flags=lanczos,palettegen" -y /tmp/palette.png';
        exec(cmd, function(error, stdout, stderr) {

            //make a gif with the pallet
            cmd = '/tmp/ffmpeg -v warning -i /tmp/'+name +' -i /tmp/palette.png -lavfi "fps=15,scale=320:-1:flags=lanczos [x]; [x][1:v] paletteuse" -y /tmp/anim.gif';
            exec(cmd, function(error, stdout, stderr) {
                var fileStream = require('fs').createReadStream('/tmp/anim.gif');
                fileStream.on('error', function (err) {
                    if (err) { throw err; }
                });
                fileStream.on('open', function () {
                    //place is back to the bucket
                    s3.putObject({
                        Bucket: srcBucket,
                        Key: 'out/'+name+'.gif',
                        Body: fileStream
                        }
                    , function () {
                        console.log('Successfully uploaded package.');
                        callback(null, "Successfully uploaded "+ name)
                    });
                });
            });
        });
    });
};