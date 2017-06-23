<template>
    <div id="container" v-bind:class="ContainerClass()" v-show="state === PopularState.ACTIVE || state === PopularState.PROCESSING">
        <div class="row" id="tags">
            <div class="col-xs-3" v-for="(tag, index) in tags"><button class="button" v-on:click="UIMenuElementClicked(index)" v-bind:class="UIElementActiveClass(index)">{{ tag.name }}</button></div>
        </div>

        <div id="items" class="container-fluid">
            <div class="row">
                <div class="gifcol col-md-4" v-for="gifCol in shownGifs">
                    <div class="item" v-for="gif in gifCol"><GifItem  v-bind:gif ="gif" ></GifItem> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" src="../controllers/Popular.ts">
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
    @import "../assets/sass/properties"
    #container
        margin-top: 60px

        &.processing
            opacity: 0.5
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
        .gifcol
            padding: 5px


            .item
                border: 2px $border-color solid
                width: 100%
                padding: 8px
                margin-top: 8px
    .button
        outline: none
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


        &.selected, &:hover
            background-color: $secondary-color
            color: white

        &.selected:hover
            background-color: white
            color: $secondary-color

</style>
