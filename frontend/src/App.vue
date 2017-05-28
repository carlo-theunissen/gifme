<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export default {
  name: 'app'
}
</script>

<style lang="sass">
  @import "assets/sass/reset"
  @import "assets/sass/fontface"
  +font-face(Nevis, "assets/font/nevis", null, null, ttf)
  +font-face(BungeeLayers, "assets/font/BungeeLayers-Outline", null, null, otf)
  body, html
    background-image: url("assets/png/pattern.png")
  body *
    font-family: Nevis
</style>
