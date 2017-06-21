/**
 * Created by carlo on 7-6-2017.
 */

import config from "../config/parameters"
import * as RP from "request-promise-native"
import * as util from "util"
let jwt = require('jsonwebtoken');
import * as Fs from 'fs'

export class ServerCominicator{
    certLoaded : Promise<Buffer>;

    public constructor(){
       //var test : Buffer=  Fs.readFileSync("");
        this.certLoaded = new Promise<Buffer>((resolve, reject) => {
            Fs.readFile('private.pem', (error, data) => {
                if(data === null){
                    reject(error);
                } else {
                    resolve(data);
                }
            });  // get private key
        });
    }
    public sendTagsToServer(tags: any, id) : Promise<string>{
        console.log(tags, id);
        return new Promise<string>((resolve, reject) => {
            let options = {
                method: 'POST',
                uri: config.submit_tags_url,
                form: {
                    gifId: id,
                    tags: this.formatTags(tags)
                },
                headers: {
                    'content-type': 'application/x-www-form-urlencoded'
                }
            };
            this.certLoaded
                .then(x => {
                    options.headers['Authorization'] = "Bearer " + this.getToken(x)
                    console.log(options);
                })
                .then(x => RP(options))
                .then(x => resolve(x));
        });
    }

    private getToken(data: Buffer) : string{

        return jwt.sign(
            {
                exp: Math.floor(Date.now() / 1000) + 10,
                data: 'LAMBDA_USER'
            }, {
                key: data,
                passphrase :"G~z'E1B\"{aTkkJ7TSkU~XWz&{DQ)5!vcZ_5XTdrU2+c)5<8W@(@BHwO)6u(2_bF"
            }, { algorithm: 'RS256'});
    }

    private formatTags(tags: any) : string{
        console.log("tags");
        let out ="";
        for (let key in tags) {
            // skip loop if the property is from prototype
            if (!tags.hasOwnProperty(key)) continue;
            out += util.format("%s=%s,", key, tags[key]);
        }
        return out;
    }
}