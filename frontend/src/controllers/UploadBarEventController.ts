/**
 * Created by carlotheunissen on 16/05/2017.
 */
import UploadBar from './UploadBar'
import * as _ from 'lodash'
import apiConfig from '../../config/endPoints'
import Vue from 'vue'

class UploadBarEventController{
    private uploadBar : UploadBar;
    private sendBounce : () => void;
    private sizeBounce : () => void;
    private component : any;
    private allowedSize : number;
    public constructor(uploadBar: UploadBar){
        this.uploadBar = uploadBar;
        this.sendBounce = _.debounce(this.sendRequestToServer, 100);
        this.sizeBounce = _.debounce(this.sizeToBig, 100);

    }
    public setMaxSize(size : number) : void {
        this.allowedSize = size;
    }

    /**
     * Gets called by the vue upload component when the users starts an upload
     * @param file
     * @param component
     */
     public add = (file:any, component: any) : void=> {

        if(file.size >= this.allowedSize){
            this.sizeBounce();
        } else {
            this.sendBounce();
            file.postUrl = apiConfig.fileUpload;
            this.component = component;
        }
    };

    public progress = (file:any, component:Vue) : void  => {
        this.uploadBar.loadChanged(+file.progress);
    };

    public after = (file:any, component:Vue) :void => {
        let response = (JSON.parse(file.response));
        if(file.success){
            this.uploadBar.handleSuccess(response)
        } else {
            this.uploadBar.handleError(response);
        }
    };
    private sendRequestToServer() : void{
        this.uploadBar.StartUploadState();
        this.component.active = true //this makes the vue-upload-component send a request to the serer
    }
    private sizeToBig() : void{
        this.uploadBar.handleError("File is to big, " + Math.floor(this.allowedSize / (1028 * 1028)) + "mb is max");
    }
}
export default UploadBarEventController;