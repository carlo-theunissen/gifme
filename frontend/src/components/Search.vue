<template>
<div>
    <b-form-input placeholder="SEARCH" />
</div>
</template>

<script>

export default {
  name: 'search'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
    @import "../assets/sass/properties"

    div
        display: block
        clear: both
        overflow: auto

    input, input:focus, input:active
        font-family: Nevis
        color: darken($text-color, 10%)
        border-color: $primary-color
        text-transform: capitalize
        border-radius: $border-radius
        background-color: rgba(255,255,255,.5)
        max-width: 300px
        width: 100%
        float: right
    input::placeholder
        color: lighten($text-color, 10%)
</style>
