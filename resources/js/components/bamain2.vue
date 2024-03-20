<script setup>
  import banav from './banav.vue'
  import {onMounted,ref,getCurrentInstance } from 'vue'
  import {useRouter,useRoute} from 'vue-router'
  const router = useRouter()
  const route = useRoute()
  const { proxy, ctx } = getCurrentInstance()
  const _this = ctx
  onMounted(async()=>{
    // const res = await reqTest()
    // console.log(res)
  })
</script>

<template>
  <banav/>
  <div class="baMainDiv">
    <div class="baMainTopDiv"></div>
    <div class="baMainContentDiv">
      <slot></slot>
    </div>
  </div>
</template>
<style scoped>
  [class^='baMainDiv']{
    background: #F7F8FC;
    padding: 0 0 0 90px;
  }
  [class^='baMainTopDiv']{
    width: 100%;
    height: 60px;
    background: #ECEDF0;
  }
  [class^='baMainContentDiv']{
    padding: 32px;
    height: calc(100vh - 60px);
  }
</style>
