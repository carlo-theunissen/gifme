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
    ACTIVE,
    PROCESSING
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
    public shownGifs : calculatedGifInterface[][] = [];

    private activeTags : number[];


    public constructor(){
        super();
        this.setServerProperties();
        this.tags = [];
        this.activeTags = [];


    }

    public UIElementActiveClass(index: number) : string{
        return Linq.from(this.activeTags).any(x => x == index) ? "selected" : "";
    }
    public ContainerClass(){
        return this.state === PopularState.PROCESSING ? "processing" : "";
    }

    public UIMenuElementClicked(index : number) : void {
        if(this.state != PopularState.ACTIVE){
            return;
        }
        const find : number = this.activeTags.findIndex((x) => x == index);
        let active = this.activeTags;
        if(find >= 0){
            this.activeTags.splice(find, 1);
        } else {
            this.activeTags.push(index);
        }

    }

    private setFirstMenuitemActive(){
        this.activeTags.push(0);
    }

    @Watch('activeTags')
    private onTagsChanged(val: number[], oldVal: number[]) {
        if(val.length == 0){
            this.shownGifs = [];
            return;
        }
        this.state = PopularState.PROCESSING;

        let serverIds : number[] = [];
        Linq.from(val).forEach((el, index) => {
            serverIds.push(this.tags[el].id);
        });

        ApiHelper.get("gifs", {tags: serverIds.join(',')})
            .then(data => {

                let calculedGifs : calculatedGifInterface[] = this.makeCalculatedGifs(data.data.gifs);
                this.shownGifs = this.makeGifCollections(calculedGifs);

                this.state = PopularState.ACTIVE;
            }); 
    }
    private makeCalculatedGifs(gifs : gifInterface[]) : calculatedGifInterface[]{
        let out : calculatedGifInterface[] = [];
        gifs.forEach(x => {
            let temp = <calculatedGifInterface> x;
            temp.location = apiConfig.gifLocationFrontpage + temp.fileName + '.gif';
            out.push(temp);
        });
        return out;
    }

    private makeGifCollections(gifs : calculatedGifInterface[]) : calculatedGifInterface[][]{
        let out : calculatedGifInterface[][] = [];
        let index = 0;
        gifs.forEach((x : calculatedGifInterface) => {
            const workingIndex = index%3;
            if(out.length-1 < workingIndex){
                out[workingIndex] = [];
            }
            out[workingIndex].push(x);
            index++;
        });
        return out;
    }

    private setServerProperties() : void{
        let popularTags = ApiHelper.get("popularTags", {});
        popularTags.then((response : any) => {
            if(response.data.hasOwnProperty("tags")){
                this.tags =  Linq.from( <tagInterface[]> response.data.tags).take(4).toArray();
            }
        });
        axios.all([popularTags]).then(() => {
            this.state = PopularState.ACTIVE;
            this.setFirstMenuitemActive();
        })
    }


}