import {ExecHelper} from "./ExecHelper"
import * as util from "util"
import config from "../config/parameters"

export class GifsicleHelper{

    private _binary : string;
    private _exec : ExecHelper;
    private _optimize : number;
    private _width : number;
    public constructor(){
        this._binary = config.gifsicle_location;
        this._exec = new ExecHelper();
    }

    public optimizeGif(gifLocation: string, outLocation: string) : Promise<string>{
        return this._exec.executeCommand(util.format('%s -o=%d --resize-width %d %s > %s', this._binary, this._optimize, this._width, gifLocation, outLocation));
    }
}