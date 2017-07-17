<template>
    <div id="container">
        <div id="img" v-bind:style="style">
            Yes
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue'
    import Component from 'vue-class-component'
    import {CalculatedGifInterface} from "../controllers/Popular"
    import {Prop } from 'vue-property-decorator'

    @Component({
        name: "GifItem",
        components: {}
    })
    export default class GifItem extends Vue {
        @Prop()
        public gif : CalculatedGifInterface;

        public style = {
            "background-image" : "url()"
        };

        
        public constructor(){
            super();

        }
        public mounted() : void{
            this.style  = {
                "background-image" : "url("+this.gif.location+")"
            };
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">

    #img
        width: 100%
        height: 100px
</style>
