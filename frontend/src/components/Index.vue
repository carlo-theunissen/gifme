<template>
    <div>
        <search></search>
        <upload></upload>
        <popular></popular>
    </div>
</template>

<script>
import Upload from './Upload.vue'
import Search from './Search.vue'
import Popular from './Popular.vue'

export default {
  components: {
    Upload,
    Search,
    Popular
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="sass">
    div
        width: 100%
        max-width: 1100px
        margin: 0px auto
        padding: 10px 20px
</style>
