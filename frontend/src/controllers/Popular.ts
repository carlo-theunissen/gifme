/**
 * Created by carlo on 21-6-2017.
 */

declare var require: any

import Vue from 'vue'
import Component from 'vue-class-component'
import apiConfig from '../../config/endPoints'
import axios from "axios"
import ApiHelper from "../helpers/ApiHelper"
import * as Enumerable from "linq";
import { Watch } from 'vue-property-decorator'
import GifItem from '../components/GifItem.vue'

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
export interface CalculatedGifInterface extends gifInterface{
    location : string;
}

@Component({
    name: "popular",

    components: {
        "GifItem" : GifItem
    }
})
export default class Popular extends Vue {
    public PopularState : any = PopularState;
    public state : PopularState = PopularState.INSTALLING;
    public tags : tagInterface[];
    public shownGifs : CalculatedGifInterface[][] = [];

    private activeTags : number[];


    public constructor(){
        super();
        this.setServerProperties();
        this.tags = [];
        this.activeTags = [];


    }

    public UIElementActiveClass(index: number) : string{
        return Enumerable.from(this.activeTags).any(x => x == index) ? "selected" : "";
    }
    public ContainerClass(){
        return this.state === PopularState.PROCESSING ? "processing" : "";
    }

    public UIMenuElementClicked(index : number) : void {
        if(this.state != PopularState.ACTIVE){
            return;
        }
        const find : number = this.activeTags.findIndex((x) => x == index);
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
        if(val.length == 0 ){
            this.shownGifs = [];
            return;
        }
        this.state = PopularState.PROCESSING;

        let serverIds : number[] = [];
        Enumerable.from(val).forEach((el, index) => {
            if(this.tags[el] !== undefined) {
                serverIds.push(this.tags[el].id);
            }
        });



        ApiHelper.get("gifs", {tags: serverIds.join(',')})
            .then(data => {

                let calculedGifs : CalculatedGifInterface[] = this.makeCalculatedGifs(data.data.gifs);
                this.shownGifs = this.makeGifCollections(calculedGifs);

                this.state = PopularState.ACTIVE;
            });
    }
    private makeCalculatedGifs(gifs : gifInterface[]) : CalculatedGifInterface[]{
        let out : CalculatedGifInterface[] = [];
        gifs.forEach(x => {
            let temp = <CalculatedGifInterface> x;
            temp.location = apiConfig.gifLocationFrontpage + temp.fileName + '.gif';
            out.push(temp);
        });
        return out;
    }

    private makeGifCollections(gifs : CalculatedGifInterface[]) : CalculatedGifInterface[][]{
        let out : CalculatedGifInterface[][] = [];
        let index = 0;
        gifs.forEach((x : CalculatedGifInterface) => {
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
                this.tags =  Enumerable.from( <tagInterface[]> response.data.tags).take(4).toArray();
            }
        });
        axios.all([popularTags]).then(() => {
            this.state = PopularState.ACTIVE;
            this.setFirstMenuitemActive();
        })
    }


}