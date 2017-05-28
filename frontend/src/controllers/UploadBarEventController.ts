/**
 * Created by carlotheunissen on 16/05/2017.
 */
import UploadBar from './UploadBar'
import * as _ from 'lodash'
import apiConfig from '../../config/endPoints'
import Vue from 'vue'

class UploadBarEventController{
    private uploadBar : UploadBar;
    private bounce : () => void;
    private component : any;

    public constructor(uploadBar: UploadBar){
        this.uploadBar = uploadBar;
        this.bounce = _.debounce(this.sendRequestToServer, 100);
    }

    /**
     * Gets called by the vue upload component when the users starts an upload
     * @param file
     * @param component
     */
     public add = (file:any, component: any) : void=> {

        this.bounce();
        file.postUrl = apiConfig.fileUpload;
        this.component = component;
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
}
export default UploadBarEventController;