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
import * as Linq from "Linq"
import { Watch } from 'vue-property-decorator'

enum PopularState{
    INSTALLING,
    ACTIVE
}

interface tagInterface{
    name : string;
    id : number;
}

interface gifInterface {
    fileName : string;
    tags : tagInterface[];
}
interface calculatedGifInterface extends gifInterface{
    location : string;
}

@Component({
    name: "popular",

    components: { }
})
export default class Popular extends Vue {
    public PopularState : any = PopularState;
    public state : PopularState = PopularState.INSTALLING;
    public tags : tagInterface[];
    public shownGifs : calculatedGifInterface[] = [];
    private activeTags : number[];


    public constructor(){
        super();
        this.setServerProperties();
        this.tags = [];
        this.activeTags = [];



        setTimeout(() => this.activeTags.push(1), 10000);
    }

    public UIElementActiveClass(index: number) : string{
        return Linq.from(this.activeTags).any(x => x == index) ? "selected" : "";
    }

    private setFirstMenuitemActive(){
        this.activeTags.push(0);
    }

    @Watch('activeTags')
    private onTagsChanged(val: number[], oldVal: number[]) {
        let serverIds : number[] = [];
        Linq.from(val).forEach((el, index) => {
            serverIds.push(this.tags[el].id);
        });

        ApiHelper.get("gifs", {tags: serverIds.join(',')})
            .then(data => {
                this.shownGifs = this.makeCalculatedGifs(data.data.gifs);
            });
    }
    private makeCalculatedGifs(gifs : gifInterface[]) : calculatedGifInterface[]{
        let out : calculatedGifInterface[] = [];
        gifs.forEach(x => {
            let temp = <calculatedGifInterface> x;
            temp.location = apiConfig.gifLocation + temp.fileName + '.gif';
        });
        return out;
    }

    private setServerProperties() : void{
        let popularTags = ApiHelper.get("popularTags", {});
        popularTags.then((response : any) => {
            if(response.data.hasOwnProperty("tags")){
                this.tags = response.data.tags;
            }
        });
        axios.all([popularTags]).then(() => {
            this.state = PopularState.ACTIVE;
            this.setFirstMenuitemActive();
        })
    }


}