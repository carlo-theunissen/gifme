<template>
    <div id="container">
        <div class="row" id="tags">
            <div class="col-xs-3"><button class="button selected">New</button></div>
            <div class="col-xs-3"><button class="button">New</button></div>
            <div class="col-xs-3"><button class="button">New</button></div>
            <div class="col-xs-3"><button class="button">New</button></div>
        </div>

        <div id="items" class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="item"></div>
                </div>
                <div class="col-sm-4">
                    <div class="item"></div>
                </div>
                <div class="col-sm-4">
                    <div class="item"></div>
                </div>
                <div class="col-sm-4">
                    <div class="item"></div>
                </div>

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Component from 'vue-class-component'
import Vue from 'vue'

@Component({
    name: "popular",
})
export default class Popular extends Vue{
    public test:string = "";
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
    @import "../assets/sass/properties"
    #container
        margin-top: 60px

    #tags
        max-width: 600px
        width: 100%
        margin: 0 auto

    #items
         max-width: 900px
         width: 100%
         margin: 30px auto

    .col-xs-3
        width: 23%
        text-align: center
        margin-right: 14px
        box-sizing: border-box
        &:last-child
            margin: 0
    .row
        .col-sm-4
            padding: 5px


            .item
                border: 2px $border-color solid
                width: 100%
                height: 40px
    .button
        background-color: white
        border: 2px $secondary-color solid
        color: $secondary-color
        font-weight: bold
        border-radius: $border-radius
        padding: 3px 15px
        cursor: pointer
        width: 100%
        text-transform: uppercase
        height: 40px

        &.selected
            cursor: default

        &.selected, &:hover
            background-color: $secondary-color
            color: white

</style>
