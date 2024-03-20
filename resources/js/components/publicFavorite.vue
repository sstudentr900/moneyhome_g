<!-- 
使用方式
import publicFavorite from '../components/publicFavorite.vue'
//愛心加入我的收藏
<publicFavorite :text="true"/>
//愛心 
<publicFavorite/> 
-->

<script setup>
  import {ref,onMounted} from 'vue'
  const props = defineProps({
    text:{
      type: Boolean,
    }, 
  })
  onMounted(()=>{
  })

</script>
<template>
  <div class="favorite_cup_dif_aic" :class="{'active':props.text}">
    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
      <path d="M23.7442 3C22.4098 3.02076 21.1045 3.39327 19.9601 4.07991C18.8157 4.76655 17.8727 5.74302 17.2264 6.91069C16.5801 5.74302 15.6372 4.76655 14.4928 4.07991C13.3484 3.39327 12.043 3.02076 10.7086 3C8.58136 3.09242 6.57715 4.02301 5.13384 5.58844C3.69053 7.15388 2.92545 9.22691 3.00574 11.3547C3.00574 16.7431 8.67742 22.6281 13.4342 26.6182C14.4963 27.5107 15.8391 28 17.2264 28C18.6137 28 19.9565 27.5107 21.0186 26.6182C25.7754 22.6281 31.4471 16.7431 31.4471 11.3547C31.5274 9.22691 30.7623 7.15388 29.319 5.58844C27.8757 4.02301 25.8715 3.09242 23.7442 3Z"/>
      <path d="M23.7985 1.75118L23.7617 1.74958L23.7248 1.75015C22.1704 1.77433 20.65 2.20823 19.317 3.00804C18.5309 3.47965 17.8265 4.06862 17.2264 4.75142C16.6263 4.06862 15.9219 3.47965 15.1359 3.00804C13.8029 2.20823 12.2824 1.77433 10.7281 1.75015L10.6912 1.74958L10.6544 1.75118C8.19713 1.85794 5.88203 2.93287 4.21484 4.74113C2.55297 6.54363 1.66953 8.92873 1.75577 11.3783C1.76394 14.4759 3.37805 17.5574 5.4416 20.268C7.53266 23.0147 10.2168 25.5509 12.6301 27.5752C13.9174 28.6569 15.545 29.25 17.2264 29.25C18.9079 29.25 20.5355 28.6569 21.8228 27.5752C24.236 25.5509 26.9202 23.0147 29.0113 20.268C31.0748 17.5574 32.6889 14.4759 32.6971 11.3783C32.7833 8.92873 31.8999 6.54363 30.238 4.74113C28.5708 2.93287 26.2557 1.85794 23.7985 1.75118Z" stroke="white" stroke-opacity="0.8" stroke-width="2.5"/>
    </svg>
    <!-- <p class="_fs16_mal8">{{ props.text }}</p> -->
    <p class="_fs16_mal8">加入我的收藏</p>
  </div>
</template>
<style scoped>
/* [class^='favorite'] {
  bottom: 10px;
  right: 10px;
} */
[class^='favorite'] p{
  display: none;
}
[class^='favorite']:hover path:nth-child(1){
  fill: #DC5B64;
}
[class^='favorite'].active path:nth-child(1){
  fill: #DC5B64;
}
[class^='favorite'].active path:nth-child(2){
  display: none;
}
[class^='favorite'].active p{
  display: block;
}
</style>
