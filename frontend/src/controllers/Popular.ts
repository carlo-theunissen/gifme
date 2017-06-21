/**
 * Created by carlo on 21-6-2017.
 */
import Vue from 'vue'
import * as Upload from 'vue-upload-component'
import Component from 'vue-class-component'
import UploadBarEventController from './UploadBarEventController'
import apiConfig from '../../config/endPoints'
import axios from "axios"
import ApiHelper from "../helpers/ApiHelper"

enum PopularState{
    INSTALLING,
    ACTIVE
}

@Component({
    name: "popular",

    components: { }
})
export default class Popular extends Vue {
    public PopularState : any = PopularState;
    public state : PopularState = PopularState.INSTALLING;
    public tags : string[];

    public constructor(){
        super();
        this.setServerProperties();
        this.tags = [];
    }

    private setServerProperties() : void{
        let popularTags = ApiHelper.get("popularTags", {});
        popularTags.then((response : any) => {
            if(response.data.hasOwnProperty("tags")){
                for(let i = 0 ; i < response.data.tags.length; i++){
                    this.tags.push(response.data.tags[i].name);
                }
            }
        });
        axios.all([popularTags]).then(() => {
            this.state = PopularState.ACTIVE;
        })
    }
}