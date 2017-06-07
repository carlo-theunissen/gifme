/**
 * Created by carlo on 7-6-2017.
 */


import { ExecHelper } from './src/ExecHelper'
import { S3Helper } from './src/S3Helper'
import * as util from "util"

exports.handler = function(event, context, callback){

    let exec = new ExecHelper();
    let s3 = new S3Helper();
    let srcBucket = event.Records[0].s3.bucket.name;
    let srcKey = decodeURIComponent(event.Records[0].s3.object.key.replace(/\+/g, " "));
    let name = srcKey.split('/')[1];


    exec
        //first: copy the ffmpeg binary to the tmp folder, this is the place aws lets us execute everything
        .moveFile('ffmpeg', '/tmp/ffmpeg')
        .then(() => exec.ChmodFile('/tmp/ffmpeg'))

        //second: copy the movie
        .then(() => {
            return s3.downloadTo(srcKey, srcBucket, util.format("/tmp/%s", name));
        })



};