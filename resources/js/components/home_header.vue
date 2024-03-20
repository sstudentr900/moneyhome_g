<script setup>
  // import { onBeforeUnmount,onMounted,ref } from 'vue';
  // import publicCarousel from './publicCarousel.vue'; // 輪播组件
  // const commodity = ref([
  //   {
  //     'id':1,
  //     'img':'home_header1.png',
  //     'small':{
  //       'id':1,
  //       'img':'home_header_small1.png',
  //       'title':'OAO1-Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)',
  //       'price':'100',
  //     }
  //   },
  //   {
  //     'id':2,
  //     'img':'home_header2.png',
  //     'small':{
  //       'id':1,
  //       'img':'home_header_small1.png',
  //       'title':'OAO2-Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)',
  //       'price':'200',
  //     }
  //   },
  //   {
  //     'id':3,
  //     'img':'home_header3.png',
  //     'small':{
  //       'id':1,
  //       'img':'home_header_small1.png',
  //       'title':'OAO3-Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)',
  //       'price':'300',
  //     }
  //   },
  // ])
  // const hearderImg = commodity.value.map(item =>item.img)
  // const currentIndex = ref(0);
  // let autoPlayTimer = null;
  // const startAutoPlay = () => {
  //   autoPlayTimer = setInterval(()=>{
  //     currentIndex.value = (currentIndex.value + 1) % hearderImg.length;
  //     // console.log('currentIndex',currentIndex.value)
  //   }, 6000);
  // };
  // const stopAutoPlay = () => {
  //   clearInterval(autoPlayTimer);
  // };
  // onMounted(() => {
  //   startAutoPlay();
  // });
  // onBeforeUnmount(() => {
  //   stopAutoPlay();
  // });
</script>

<template>
  <div id="home_header" class="home_header">
    <div class="textDiv" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
      <div class="title">
        <div class="top">
          <div class="left">
            <div class="text1">
              合法債務催收服務
              <div class="img">
                <img :src="$getSrc('home_mony.png')"/>
              </div>
            </div>
            <div class="text2">讓錢錢回到你口袋</div>
          </div>
          <div class="right">
            <a href="">
              <img :src="$getSrc('home_free.png')"/>
            </a>
          </div>
        </div>
        <div class="bottom">
          <div class="text3">被倒債? 倒會? 債務糾紛?</div>
        </div>
      </div>
    </div>
    <div class="bgimg">
      <img class="_cover" :src="$getSrc('home_header.png')"/>
    </div>
  </div>
</template>

<style scoped>
  .home_header{
    position: relative;
    z-index: 1;
    height: 100vh;
    overflow: hidden;
  }
  .home_header .bgimg{
    height: 100vh;
  }
  .home_header .bgimg img{
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .home_header .title{
    position: absolute;
    z-index: 2;
    top: 300px;
    left: 50%;
    transform: translateX(-50%);
    max-width: 1000px;
    width: 100%;
    padding: 0 20px;
  }
  .home_header .bottom,
  .home_header .top{
    display: flex;
    font-size: 72px;
    font-weight: bold;
    color: #134A56;
    text-shadow: -3px 0 #fff, 0 3px #fff, 3px 0 #fff, 0 -3px #fff;
    font-weight: 800;
  }
  .home_header .top .left{
    flex: 0 0 680px;
    /* width: 70%; */
    margin-bottom: 8px;
  }
  .home_header .top .left .text1{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }
  .home_header .top .left .text1 .img{
    margin-left: 8px;
  }
  .home_header .top .left .text2{
    text-align: right;
    margin-bottom: 8px;
  }
  .home_header .top .right{
    flex: 1 1;
    text-align: right;
  }
  .home_header .bottom{
    max-width: 80%;
    font-size: 40px;
    display: flex;
    justify-content: flex-end;
  }
  @media (max-width: 970px){
    .home_header .top{
      flex-direction: column-reverse;
      align-items: center;
      margin-bottom: 16px;
    }
    .home_header .top .left{
      flex: 1 1;
    }
    .home_header .top .left .text2{
      text-align: center;
    }
    .home_header .top .right{
      margin-bottom: 32px;
    }
    .home_header .bottom{
      max-width: 100%;
      justify-content: center;
    }
  }
  @media (max-width: 780px){
    .home_header .title{
      top: 200px;
    }
    .home_header .top .left .text1 .img{
      display: none;
    }
  }
  @media (max-width: 680px){
    .home_header .top{
      font-size: 58px;
    }
  }
  @media (max-width: 580px){
    .home_header .top{
      font-size: 36px;
    }
    .home_header .bottom{
      font-size: 24px;
    }
  }
</style>
