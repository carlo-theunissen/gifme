/**
 * Created by carlo on 7-6-2017.
 */
import * as Fs from "fs"
import {FfmpegHelper} from "./FfmpegHelper"
import config from "../config/parameters"
import {ExecHelper} from "./ExecHelper"
const AWS = require('aws-sdk');

export class RekognitionHelper {
    private _rekognision;
    public constructor(){
        this._rekognision = new AWS.Rekognition({region : "us-east-1"});

    }

    public getLabelsFromVideo(videoFile : string) : Promise<any[]>{
        return new Promise((resolve, reject) => {
            let exec = new ExecHelper();
            let ffmpegHelper = new FfmpegHelper();

            exec.makeFolder(config.frames_folder)
                .then(() => ffmpegHelper.createFrames(videoFile, config.frames_folder) )
                .then(x => this.getLabels(x))
                .then(resolve)
                .catch(reject)
        });
    }

    public getLabels(images: string[]) : Promise<any[]>{
        let promises = [];
        for(let i = 0; i < images.length; i++){
            promises.push(this.detectLabels(images[i]));
        }

        return new Promise((resolve, reject) => {
            let out = {};
            Promise.all(promises)
                .then(values => {
                    for(let i = 0; i < values.length; i++){
                        for(let n = 0; n < values[i].Labels.length; n++){
                            out = RekognitionHelper.combine(out, values[i].Labels[n]);
                        }
                    }

                    resolve(out);
                })
                .catch(reject);
        });
    }

    private static combine(el1: any, el2: any) : any{
        let out = el1;
        let value = el1[el2.Name] || 0;
        out[el2.Name] = Math.max(value, Math.ceil( el2.Confidence));
        return out;
    }

    private detectLabels(filename: string): Promise<any>{
        console.log(config.frames_folder + "/" + filename);
        return new Promise((resolve, reject) => {
            Fs.readFile(config.frames_folder + "/" + filename, (err, data) => {
                console.log(err);
                const params = {
                    Image: {
                        /* required */
                        Bytes: data
                    }
                };
                this._rekognision.detectLabels(params, function (err, data) {
                    if (err) reject(err); // an error occurred
                    else     resolve(data);           // successful response
                });
            });
        });
    }
}