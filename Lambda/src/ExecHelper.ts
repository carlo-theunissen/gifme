/**
 * Created by carlo on 7-6-2017.
 */

import * as exec from "child_process"
import * as util from "util"

export class ExecHelper{

    public moveFile (old: string, newLocation:string) : Promise<string>{
        console.log("movefile");
        return this.executeCommand(util.format("cp %s %s", old, newLocation));
    }

    public ChmodFile(file : string) : Promise<string>{
        console.log("ChmodFile");
        return this.executeCommand(util.format("chmod 755 %s", file));
    }

    public executeCommand(command : string) : Promise<string>{

        return new Promise((resolve, reject) => {

            exec.exec(command,(error, stdout, stderr) => {
                if(error) {
                    reject(stderr);
                    return;
                }
                resolve(stdout);
            });
        });
    }
}
