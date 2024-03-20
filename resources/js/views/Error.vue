<script setup>
  // import {useRoute,useRouter} from 'v-router'
  import {onMounted} from 'vue'
  // const router = useRouter()
  // const route = useRoute()
  onMounted(()=>{
  })
</script>

<template>
  <div class="error_dif_aic_jcc">
    <div class="box_tac">
      <h2 class="_fs48_lh14">404 Error</h2>
      <p class="_fs16_lh14_mab16">抱歉，找不到您要尋找的頁面</p>
      <router-link :to="{ name:'fnhome'}" class="_btn_coFFF_bgGreen_fs16_pat12b24_dii_fw400">回首頁</router-link>
    </div>
  </div>
</template>

<style scoped>
[class^=error]{
  height: 100vh;
}
/* [class^=error] [class^=box]{

} */
</style>
