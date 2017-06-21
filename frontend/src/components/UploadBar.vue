<template>
    <div id="container">
        <div id="errorMsg" class="uploadClick">
            <span  v-show="error !== '' ">{{ error }} </span>
        </div>
        <div class="bars" v-show="state === UploadStates.LOADING || state === UploadStates.PROCESSING">
            <b-progress :striped="state === UploadStates.PROCESSING" :animated="state === UploadStates.PROCESSING" :value="loadProgress" v-bind:class="{ completed: state === UploadStates.PROCESSING}" class="uploadClick">{{ uploadText }}</b-progress>
        </div>
        <div class="bars" v-show="state === UploadStates.WAIT_FOR_INPUT">
            <span v-on:click.prevent="">
                <file-upload
                :post-action="postAction"
                :title="title"
                :events="events"
                :drop="true"
                :size="size || 0"
                class="dropping"
                v-bind:class = "{dropping_active : upload.dropActive }"
                ref="upload"
                ></file-upload>
            </span>

            <file-upload v-show="state == UploadStates.WAIT_FOR_INPUT"
                     :title="title"
                     :size="size || 0"
                     :post-action="postAction"
                     :events="events"
                     :drop="true"
                     class="uploadClick"
                     ref="upload"
            ><span id="instructionText">Drop video files here</span></file-upload>
        </div>
        <div v-show="state == UploadStates.VIEW_RESULT">
            <div id="result" class="row">
                <div class="col-sm-6"><img src="#" class="img" v-bind:src="result.img" width="100%" alt="Your lovely gif" /></div>
                <div class="col-sm-6">

                    <h2>Your gif is ready!</h2>
                    <input title="shareLink" id="link" readonly class="borderContainer" v-bind:value="result.img"/>

                    <div class="borderContainer" id="tags">
                        <span v-for="tag in result.tags"> {{ tag }} </span>
                        <div class="row" id="buttons">
                            <div class="col-xs-5"><button id="download">Gif me :)</button> </div>
                            <div class="col-xs-7"><button id="share">Share</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" src="../controllers/UploadBar.ts">
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
    @import "../assets/sass/properties"
    $result-margin: 15px

    .bars
        height: 45px
    #container
        position: relative
        margin-top: 30px

    .dropping
        width: 90%
        height: 210px
        position: absolute
        display: block
        left: 5%
        top: -110px

    .dropping_active
        color: lighten($text-color, 20%)
        font-size: 50px
        background-color: rgba($text-color, 0.95)
        border-radius: $border-radius * 2
        border: 11px lighten($text-color, 20%) dashed
        z-index: 3
        padding-top: 30px

        &:after
            content: "Drop video files here"

    .uploadClick
        background-color: rgba(255,255,255, 0.3)
        width: 100%
        max-width: 550px
        height: 100%
        border: 1px $border-color solid
        border-radius: $border-radius
        display: inline-block
        position: relative
        vertical-align: middle
        cursor: pointer

        #instructionText
            font-family: Nevis
            float: left
            color: lighten($text-color, 10%)
            padding: 10px 10px 0 10px
            display: inline-block

    .drop-active
        top: 0
        bottom: 0
        right: 0
        left: 0
        position: absolute
        opacity: .4
        background: #000

    .progress
        background-color: rgba(255,255,255,.5)
        cursor: default

    .completed
        border: 1px darken($primary-color, 20%) solid
    #result
        width: 100%
        max-width: 550px
        margin: 0 auto
        text-align: left
        #link
            cursor: text
        h2
            font-size: 18px
            color: $primary-color
            margin: 0

        .borderContainer
            margin-top: $result-margin
            padding: 7px
            border: 3px $border-color solid
            border-radius: $border-radius
            width: 100%
            height: 43px

        #tags
            border: none

            span
                border: 1px darken($border-color, 30%) solid
                color: darken($border-color, 30%)
                font-weight: 100
                border-radius: 6px
                padding: 5px
                margin-right: 8px

        #buttons
            margin-top: $result-margin

            button
                padding: 7px 15px
                background-color: $primary-color
                border-radius: $border-radius
                border: none
                color: white
                cursor: pointer
                margin: 0 10px 0 17px
                
            #download
                background: $primary-color url("../assets/png/download.png") no-repeat 12px 8px
                padding-left: 32px

    #errorMsg
        border: none
        text-align: left
        color: $secondary-color
</style>

<style lang="sass">
    @import "../assets/sass/properties"
    .progress-bar
        background-color: $border-color
        height: 100% !important
        text-align: left
        padding: 14px

    .completed
        .progress-bar
            background-color: darken($primary-color, 20%) !important
</style>
