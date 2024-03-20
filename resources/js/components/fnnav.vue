<script setup>
  const props = defineProps({
    class:{
      type: String,
      default:''
    }
  })
  const isActiveFn = () => {
    document.body.classList.toggle('active');
  }
</script>

<template>
  <div class="fnnav_pof_zi99_wi100" :class="props.class">
    <div class="_mw1340_patb16">
      <div class="box_dif_aic_jcc">
        <!-- <div class="logoDiv" data-aos="fade" data-aos-delay="200" data-aos-duration="1000"> -->
        <div class="logoDiv_dif" data-aos="fade-right" data-aos-duration="600">
          <router-link :to="{name:'fnhome'}" class="_dif_aic_jcc">
            <div class="img">
              <img :src="$getSrc('home_logo.png')"/>
            </div>
            <div class="textDiv_mal8_coGreen_fw800">
              <p class="_fs16">馬尼馬尼Home</p>
              <p class="_fs32_ls-2">Money Home</p>
            </div>
          </router-link>  
        </div>
        <div class="menusDiv_dif_fs18_fw800_coGreen_aic_jcs" data-aos="fade-left" data-aos-duration="600">
          <ul class="itemDiv_dif_aic_jcc_pal24">
            <!-- <li><router-link :to="{name:'fnhome',hash:'#home_case'}">債務催繳案例</router-link></li>
            <li><router-link :to="{name:'fnhome',hash:'#home_status'}">線上分析</router-link></li>
            <li><router-link :to="{name:'fnhome',hash:'#home_qa'}">想問什麼</router-link></li>
            <li><router-link :to="{name:'fnhome',hash:'#home_make'}">服務項目</router-link></li> -->
            <li><a href="/moneyhome_g/public/#home_case">債務催繳案例</a></li>
            <li><a href="/moneyhome_g/public/#home_status">線上分析</a></li>
            <li><a href="/moneyhome_g/public/#home_qa">想問什麼</a></li>
            <li><a href="/moneyhome_g/public/#home_make">服務項目</a></li>
            <li><router-link :to="{name:'fnknowledge',params:{category:'98',pagenow:'1'}}">債務知識543</router-link></li>
          </ul>
          <div class="downlodDiv">
            <a class="_btn">借據範本下載</a>
            <!-- <router-link :to="{name:'fnknowledge',params:{category:'98',pagenow:'1'}}" class="_btn">債務知識543</router-link> -->
          </div>
        </div>
        <div class="publicHamburger_dif_aic_cup" @click="isActiveFn">
          <span></span>
        </div>
      </div>
      <hr>
    </div>
  </div>
</template>
<style scoped>
  [class^='fnnav']{
    background: rgba(255,255,255,.88);
    backdrop-filter:blur(8px); /* 模糊效果 */
    box-shadow: 0 0 42px 42px rgba(255,255,255,.9);
  } 
  [class^='fnnav'] hr{
    border: 1px solid #134a56;
    opacity: .06;
    margin-bottom: 0;
  }
  [class^='logoDiv']{
    flex: 0 0 260px;
    justify-content: left;
  }
  [class^='menusDiv']{
    flex: 1 1;
  }
  [class^='itemDiv'] li{
    padding: 0 20px;
    position: relative;
  }
  [class^='itemDiv'] li+li::after{
    content: '/';
    position: absolute;
    left: 0;
    top: 3px;
    font-size: 12px;
    color: #C7C7C7;
  }
  [class^='itemDiv'] li a:hover{
    opacity: .8;
  }
  [class^='fnnav'].style2{
    background: #fff;
    box-shadow: none;
    backdrop-filter: none;
    border-bottom: 1px solid #D8D8D8;
  }
  [class^='fnnav'].style2 hr{
    display: none;
  }
  @media (max-width: 1200px){
    [class^='itemDiv'] li{
      padding: 0 12px;
    }
  }
  @media (max-width: 1130px){
    body.active [class^='fnnav']{
      background: rgb(242 240 239);
    }
    body.active [class^='fnnav'].style2 [class^='_mw1340']{
      background: #fff;
    }
    [class^='menusDiv']{
      position: absolute;
      flex-direction: column;
      justify-content: center;
      background: rgb(242 240 239);
      width: 100%;
      min-height: 540px;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: -1;
      visibility: hidden;
      opacity: 0;
      transition: opacity 0.3s, visibility 0.3s;
      padding: 120px 0 0;
    }
    body.active [class^='menusDiv']{
      visibility: visible;
      opacity: 1;
      transition: opacity 0.3s, visibility 0.3s;
    }
    [class^='publicHamburger']{
      display: flex;
    }
    [class^='menusDiv'] [class^='itemDiv']{
      flex-direction: column;
    }
    [class^='menusDiv'] [class^='itemDiv'] li+li::after {
      display: none;
    }
    [class^='menusDiv'] [class^='itemDiv'] a{
      font-size: 32px;
      margin-bottom: 24px;
    }
    [class^='menusDiv'] [class^='downlodDiv']{
      margin: 24px 0;
    }
    [class^='fnnav'] [class^='box']{
      justify-content: space-between;
    }
  }
  @media (max-width: 1020px){
    [class^='fnnav'].style2 [class^='_mw1340']{
      padding-top: 8px;
      padding-bottom: 8px;
    }
  }
  @media (max-width: 680px){
    [class^='_mw1340']{
      /* padding-left: 20px;
      padding-right: 20px; */
      padding: 8px 20px;
    }
    [class^='logoDiv']{
      flex: 0 0 220px
    }
    [class^='logoDiv'] [class^='_fs32']{
      font-size: 24px;
    }
    [class*='publicHamburger']{
      width: 58px;
    }
  }

</style>
