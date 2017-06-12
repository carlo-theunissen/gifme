import {ExecHelper} from "./ExecHelper"
import * as util from "util"
import config from "../config/parameters"

export class GifsicleHelper{

    private _binary : string;
    private _exec : ExecHelper;
    public constructor(){
        this._binary = config.gifsicle_location;
        this._exec = new ExecHelper();
    }

    public optimizeGif(gifLocation: string, outLocation: string) : Promise<string>{
        return this._exec.executeCommand(util.format('%s --lossy=70 -O3 --no-extensions %s -o %s', this._binary,  gifLocation, outLocation));
    }
}