<template>
  <div class="publicCarousel" :class="{ 'active':show==true }">
    <div
      v-for="(item, index) in items"
      :key="index"
      class="img_he100"
      :class="{ 'active':currentIndex == index }"
    >
      <!-- <img class='_cover' :src="$getUrl(item)" @error.once="$defaultImage($event,'home_ad1.png')" /> -->
      <img class='_cover' :src="$getSrc(item)" />
    </div>
  </div>
</template>
<script setup>
  import {loadImageEnd} from '../composables/public'
  import { ref, onMounted, onBeforeUnmount } from 'vue';
  //props
  const props = defineProps({
    items: Array, // 内容
    autoPlay: Boolean, // 是否自动轮播
    interval: Number, // 自动轮播间隔（毫秒）
  });
  const currentIndex = ref(-1);
  const show = ref(false)
  let autoPlayTimer = null;
  const prevSlide = () => {
    currentIndex.value = (currentIndex.value - 1 + props.items.length) % props.items.length;
  };
  const nextSlide = () => {
    currentIndex.value = (currentIndex.value + 1) % props.items.length;
  };
  const startAutoPlay = () => {
    if (props.autoPlay) {
      autoPlayTimer = setInterval(nextSlide, props.interval);
    }
  };
  const stopAutoPlay = () => {
    if (autoPlayTimer) {
      clearInterval(autoPlayTimer);
    }
  };
  onMounted(() => {
    // console.log('onMounted')
    // currentIndex.value = 0
    // startAutoPlay();
    loadImageEnd([props.items[0]],()=>{
      // console.log('ok')
      //載入完才跑換頁
      startAutoPlay();
      //載入完才跑縮放動畫
      currentIndex.value = 0
      show.value = true
    })
  });
  onBeforeUnmount(() => {
    stopAutoPlay();
  });
</script>
<style scoped>
  .publicCarousel {
    position: relative;
    width: 100%;
    height: 100vh;
    /* background-color: #333; */
    opacity: 0;
    transition: opacity .8s;
  }
  .publicCarousel.active {
    opacity: 1;
  }

  .img_he100 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    text-align: center;
    opacity: 0;
    transition: opacity .8s ease;
    transition-delay: opacity .3s;
    overflow: hidden;
  }
  .img_he100.active{
    opacity: 1;
  }
  .img_he100 img{
    transform: scale(1.2);
    transition: transform 12s ease-out;
  }
  .img_he100.active img{
    transform:scale(1)
  }
</style>