/**
 * Created by carlo on 7-6-2017.
 */


import { ExecHelper } from './src/ExecHelper'
import { S3Helper } from './src/S3Helper'
import { RekognitionHelper } from './src/RekognitionHelper'
import * as util from "util"
import {GifCreator} from "./src/GifCreator";
import {ServerCominicator} from "./src/ServerCominicator";
import config from "./config/parameters"

function call(event, context, callback){

    const exec = new ExecHelper();
    const s3 = new S3Helper();
    const gifCreator = new GifCreator();
    const rekognition = new RekognitionHelper();
    const server = new ServerCominicator();
    const srcBucket = event.Records[0].s3.bucket.name;
    const srcKey = decodeURIComponent(event.Records[0].s3.object.key.replace(/\+/g, " "));
    const region = event.Records[0].awsRegion;
    const name = srcKey.split('/')[1];
    const uploadId = name.split('.')[0];

    const movieLocation = util.format("%s/%s", config.tmp_folder, name);

    exec.executeCommand(util.format("rm -rf %s/*", config.tmp_folder))
        .then( () =>
            //first: copy the ffmpeg binary and the gifsicle binary to the tmp folder and download the file
            Promise.all([

                exec
                    .moveFile('ffmpeg', config.ffmpeg_location)
                    .then(() => exec.ChmodFile(config.ffmpeg_location)),

                exec
                    .moveFile('gifsicle', config.gifsicle_location)
                    .then(() => exec.ChmodFile(config.gifsicle_location)),

                s3.downloadTo(srcKey, srcBucket, movieLocation)
            ])
        )
        .then(() => Promise.all([

            //make the gif
            gifCreator.CreateGif(movieLocation),

            //create the labels from the gif
            rekognition.getLabelsFromVideo(movieLocation)
                .then(x => server.sendTagsToServer(x, uploadId))
                .then(x => console.log(x))

        ]))
        .then(() => s3.uploadTo(util.format(config.s3_upload_location, uploadId), srcBucket, config.result_gif))
        .then(() => callback(null, "Successfully uploaded " + util.format(config.s3_upload_location, uploadId)))

};

export default call;