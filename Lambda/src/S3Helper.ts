/**
 * Created by carlo on 7-6-2017.
 */
import * as Fs from "fs"
/// <reference types="aws-sdk" />
import * as AWS from 'aws-sdk/dist/aws-sdk.js'

export class S3Helper {
    private _s3 : AWS.S3;
    public constructor(){
        this._s3 = AWS.S3;
    }
    public downloadTo(s3key : string, s3Bucket: string, newLocation: string) : Promise<string>{
        return new Promise((resolve, reject) => {


            let options = {
                Bucket: s3Bucket,
                Key: s3key
            };

            //download the file
            let file = Fs.createWriteStream(newLocation);

            let fileStream = this._s3.getObject(options).createReadStream();
            let stream = fileStream.pipe(file);

            stream.on("finish", () => resolve(newLocation));
            stream.on("error", () => reject(""));

        });
    }

    public uploadTo(s3key: string, s3Bucket: string, fileLocation: string) : Promise<string>{
        return new Promise((resolve, reject) => {
            const fileStream = Fs.createReadStream(fileLocation);
            fileStream.on('error', function (err) {
                reject(err);
            });
            fileStream.on('open', function () {
                //place is back to the bucket
                this._s3.putObject({
                        Bucket: s3Bucket,
                        Key: s3key,
                        Body: fileStream
                    }
                    , function () {
                        console.log('Successfully uploaded package.');
                        resolve(fileLocation);
                    });
            });
        });
    }
}