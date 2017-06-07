/**
 * Created by carlo on 7-6-2017.
 */
import * as Fs from "fs"
/// <reference types="aws-sdk" />
import * as AWS from 'aws-sdk/dist/aws-sdk.js'

export class S3Helper {
    public downloadTo(s3key : string, s3Bucket: string, newLocation: string) : Promise<string>{
        return new Promise((resolve, reject) => {

            let s3 = new AWS.S3();
            let options = {
                Bucket: s3Bucket,
                Key: s3key
            };

            //download the file
            let file = Fs.createWriteStream(newLocation);

            let fileStream = s3.getObject(options).createReadStream();
            let stream = fileStream.pipe(file);

            stream.on("finish", () => resolve(newLocation));
            stream.on("error", () => reject(""));

        });
    }
}