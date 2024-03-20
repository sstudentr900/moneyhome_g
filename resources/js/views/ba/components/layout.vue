<script setup>
import banav from './banav.vue'
</script>
<template>
<div class="_dif" :class="$route.meta.title">
  <banav/>
  <RouterView/>
</div>
</template>
<style scoped>
</style>