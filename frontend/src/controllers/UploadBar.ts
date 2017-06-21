import Vue from 'vue'
import * as Upload from 'vue-upload-component'
import Component from 'vue-class-component'
import UploadBarEventController from './UploadBarEventController'
import apiConfig from '../../config/endPoints'
import axios from "axios"
import ApiHelper from "../helpers/ApiHelper"

enum UploadSates{
    INSTALLING,
    LOADING,
    WAIT_FOR_INPUT,
    PROCESSING,
    VIEW_RESULT
}

@Component({
    name: "upload-bar",

    components: {
        "file-upload":  Upload
    }
})
export default class UploadBar extends Vue {

    public constructor(){
        super();
        this.events = new UploadBarEventController(this);
        this.state = UploadSates.INSTALLING;
        this.postAction = apiConfig.fileUpload;
        this.setServerProperties();
        this.ws = new WebSocket(apiConfig.webSocketGifs);
        this.ws.onmessage = this.websocketMessage;


    }
    private websocketMessage(data: MessageEvent) : void{
        if(data.data.indexOf(this.lookingId) > -1){
            console.log(data);
            let tempImg = new Image();
            const loadTagsPromise = this.loadTags();

            tempImg.onload = () => {
                loadTagsPromise
                    .then( x => {
                        this.result.tags = x;
                        this.state = UploadSates.VIEW_RESULT;
                    });

            };

            this.result.img = apiConfig.gifLocation + data.data;
            tempImg.src = apiConfig.gifLocation + data.data;

        }
    }

    private loadTags() : Promise<string[]>{
        return new Promise<string[]>((resolve, reject) => {
            ApiHelper
                .getGefId(this.lookingId)
                .then((response : any) => {
                    let out = [];
                    let lastValue = 0;

                   for(let i = 0; i < response.data.tags.length && i < 4; i++){
                       if(response.data.tags[i].score != lastValue){
                           out.push(response.data.tags[i].name);
                           lastValue = response.data.tags[i].score;
                       }
                   }
                    resolve(out);
                })
                .catch( x => reject(x));
        });
    }

    public mounted () : void{
        this.upload = this.$refs.upload;
        this.upload = this.upload.$data;
    }

    public StartUploadState() : void{
        this.uploadText = "UPLOADING";
        this.state = UploadSates.LOADING;
        this.error = "";
    }
    public loadChanged(newNumber : number) : void {
        this.loadProgress = newNumber;

    }
    public handleError(errorMsg: any) : void {
        this.error = errorMsg;
        this.state = UploadSates.WAIT_FOR_INPUT;
        this.loadProgress = 0;
    }
    public handleSuccess(successMsg: any) : void{
        if(! successMsg.success ){
            this.handleError("File is not supported");
            return;
        }
        this.state = UploadSates.PROCESSING;
        this.uploadText = "PROCESSING";
        this.lookingId = successMsg.id;
        this.ws.send(this.lookingId);
    }

    private setServerProperties() : void{
        let filesize = ApiHelper.get("fileSize", {});
        filesize.then((response : any) => {
           this.size = response.data.max_file_size * 1024 * 1024;
        });
        axios.all([filesize]).then(() => {
            this.state = UploadSates.WAIT_FOR_INPUT;
            this.events.setMaxSize(this.size);
        })
    }

    private lookingId: number;

    UploadStates: any = UploadSates;
    size: number = 10;
    loadProgress: number = 0;
    state: UploadSates;
    uploadText : string = "";
    title: string= "";
    postAction: string;
    upload:any = {};
    events : UploadBarEventController;
    result:any = {
        "img" : "",
        "tags" : []
    };
    error : string = "";
    ws: WebSocket;
}