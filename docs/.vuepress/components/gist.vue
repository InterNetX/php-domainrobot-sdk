<template>
  <vue-embed-gist 
      :gist-id="id" 
      :file="url"/>
      </code>
</template>
 
 // <gist id="57bd32be140214cddf26e62fd31a1414" />
<script>
import VueEmbedGist from 'vue-embed-gist'
 import axios from 'axios';

export default {
  components: {
    VueEmbedGist
  },
  data(){
      return {
          r: ''
      }
  },
  props: {
      url: {
          type: String,
          default: ''
      },
      id: {
          type: String,
          default: ''
      }
  }
}
</script>