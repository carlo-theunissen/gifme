<template>
        <header>
            <div id="logo"></div>
            <h1>Gif Me</h1>
            <p>Gif Me is an awesome generator that turns
                your lovely videos into incredible gifs</p>
            <upload-bar></upload-bar>
        </header>
</template>

<script>
import UploadBar from './UploadBar'

export default {
  components: {
    UploadBar
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
@import "../assets/sass/properties"
header
    margin-top: 20px
    text-align: center

    #logo
        background-image: url("../assets/png/logo.png")
        width: 88px
        height: 73px
        margin: 0 auto

    h1
        font-family: BungeeLayers
        color: $primary-color
        font-size: 72px
        margin: 30px 0
    p
        text-transform: uppercase
        max-width: 450px
        width: 100%
        margin: 0 auto
        color: $text-color

</style>
