import {FfmpegHelper} from "./FfmpegHelper";
import config from "../config/parameters"
import * as util from "util"
import {GifsicleHelper} from "./GifsicleHelper";

/**
 * Created by carlo on 8-6-2017.
 */
export class GifCreator {

    private _ffmpeg : FfmpegHelper;
    private _gifsicle: GifsicleHelper;

    public constructor(){
        this._ffmpeg = new FfmpegHelper();
        this._gifsicle = new GifsicleHelper();
    }

    public CreateGif(movLocation: string) : Promise<string>{
        const paletteLocation = util.format("%s/palette.png",config.tmp_folder);

        return this
            ._ffmpeg.createPalette(movLocation, paletteLocation)
            .then(() => this._ffmpeg.createGif(movLocation,paletteLocation, config.temp_gif))
            .then(() => this._gifsicle.optimizeGif(config.temp_gif,config.result_gif));
    }



}

//ffmpeg -v warning -i file.mov -vf "fps=5,scale=160:-1:flags=lanczos,palettegen" -y palette.png
//ffmpeg -y -i file.mov -i palette.png -lavfi "fps=15,scale=160:-1:flags=lanczos [x]; [x][1:v] paletteuse" -y file.gif
//gigsicle.exe -o=10 file.gif --resize-width 320 > out.gif