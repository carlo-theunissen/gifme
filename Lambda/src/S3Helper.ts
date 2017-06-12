/**
 * Created by carlo on 7-6-2017.
 */
import * as Fs from "fs"
const AWS = require('aws-sdk');

export class S3Helper {
    private _s3;
    public constructor(){
        this._s3 = new AWS.S3();
    }
    public downloadTo(s3key : string, s3Bucket: string,  newLocation: string) : Promise<string>{
        return new Promise((resolve, reject) => {

            console.log("Download started", newLocation, s3key, s3Bucket);
            let options = {
                Bucket: s3Bucket,
                Key: s3key
            };

            //download the file
            let file = Fs.createWriteStream(newLocation);


            let read  = new AWS.S3().getObject(options);

            read.on("error", (error) => {
                console.log("ERROR!", error);
            });

            let fileStream = read.createReadStream();
            let stream = fileStream.pipe(file);

            stream.on("finish", function() {
                console.log("Resolve! :)");
                resolve(newLocation)
            });

            stream.on("error", function(error){
                reject(error);
                console.log("Download error! :(" , error);
            });

        });
    }

    public uploadTo(s3key: string, s3Bucket: string, fileLocation: string) : Promise<string>{
        return new Promise((resolve, reject) => {
            const fileStream = Fs.createReadStream(fileLocation);
            fileStream.on('error', function (err) {
                reject(err);
            });
            fileStream.on('open', () => {
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