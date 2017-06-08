import {ExecHelper} from "./ExecHelper";
import * as util from "util"
import config from "../config/parameters"

/**
 * Created by carlo on 8-6-2017.
 */
export class FfmpegHelper {
    private _binary : string;
    private _exec : ExecHelper;

    public constructor(){
        this._binary = config.ffmpeg_location;
        this._exec = new ExecHelper();
    }

    public createPalette(movFile: string, outFile: string) : Promise<string>{
        return this._exec.executeCommand(util.format('%s -v warning -i %s -vf "fps=5,scale=160:-1:flags=lanczos,palettegen" -y %s', this._binary, movFile, outFile));
    }

    public createGif(movFile: string, pallette: string, outfile: string) : Promise<string>{
        return this._exec.executeCommand(util.format('%s -y -i %s -i %s -lavfi "fps=15,scale=160:-1:flags=lanczos [x]; [x][1:v] paletteuse" -y %s', this._binary, movFile, pallette, outfile))
    }

}