<template>
<div>
<div v-if="exibit !== false">
  <div class="container urlBox" v-for="(url, index) in urls" v-if="!url.private">
    <div class="row">
      <div class="col-12"> <a v-bind:href="'/'+url.short" class="shortLink">{{url.short}}</a> </div>
      <div class="col-12"> <a v-bind:href="url.long" class="longLink">{{url.long}}</a> </div>
      <div class="col-12"> {{url.description}} </div>
      <div class="col-8">Last Access: {{url.accessed}} </div>
      <div class="col-4">Number of accesses: {{url.times}} </div>
    </div>
  </div>
</div>
<div v-if="exibit === false">
  <h1>There are no URLs yet</h1>
</div>
</div>
</template>

<script>
  export default {
    props: ["urls","exibit"]
  }
</script>
