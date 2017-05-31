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
        console.log(data);
        if(data.data.indexOf(this.lookingId) > -1){
            this.state = UploadSates.VIEW_RESULT;
            this.result.src = apiConfig.gifLocation + data.data;
        }
    }

    public mounted () {
        this.upload = this.$refs.upload;
    }

    public StartUploadState() : void{
        this.uploadText = "UPLOADING";
        this.state = UploadSates.LOADING;
    }
    public loadChanged(newNumber : number) : void {
        this.loadProgress = newNumber;
    }
    public handleError(errorMsg: any) : void {
        this.uploadText = "ERROR :(";
    }
    public handleSuccess(successMsg: any) : void{
        this.state = UploadSates.PROCESSING;
        this.uploadText = "PROCESSING";
        console.log(successMsg);
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
        "src" : ""
    };

    ws: WebSocket;
}