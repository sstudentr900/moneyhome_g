<script setup>
</script>

<template>
  <div id="home_report" class="home_report_bgGreen_patb140">
    <div class="_mw1340_por">
      <img class='bg_poa_zi1' :src="$getSrc('home_report_bg01.png')"/>
      <img class='bg2_poa_zi1' :src="$getSrc('home_report_bg02.png')"/>
      <!-- <div class="bg_poa_zi1" :style="{ backgroundImage: `url('${$getSrc('home_report_bg01.png')}')` }"></div>
      <div class="bg2_poa_zi1" :style="{ backgroundImage: `url('${$getSrc('home_report_bg02.png')}')` }"></div> -->
      <div class="content_por_zi2">
        <div class="title_dif_jcc_mab32" data-aos="fade-up" data-aos-duration="600">
          <div class="box">
            <div class="top_mab8_tal_fs24_fw400_coYellow_lh12">
              馬尼馬尼轟 money money home
            </div>
            <div class="bottom_fs62_fw800_coWhite_lh12">
              媽~ 我把錢錢拿回來了!
            </div>
          </div>
        </div>
        <div class="title2_fs32_fw600_coGreen200_tac_mab56_lh12" data-aos="fade-up" data-aos-duration="600">
          快看看他們怎麼追回債款的
        </div>
        <div class="linkDiv_dif_aic_jcc" data-aos="fade-up" data-aos-duration="600">
          <a href="#" class="_dii_patb16_palr24_bgWhite_coGreen_fw800">
            免費取得債務催收分析報告
            <svg class='_mal16' width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M1 8H12.865L9.232 12.36C8.878 12.784 8.936 13.415 9.36 13.768C9.785 14.122 10.415 14.064 10.769 13.64L15.769 7.64C15.808 7.593 15.827 7.538 15.856 7.486C15.88 7.444 15.909 7.408 15.927 7.362C15.972 7.247 15.999 7.126 15.999 7.004C15.999 7.003 16 7.001 16 7C16 6.999 15.999 6.997 15.999 6.996C15.999 6.874 15.972 6.753 15.927 6.638C15.909 6.592 15.88 6.556 15.856 6.514C15.827 6.462 15.808 6.407 15.769 6.36L10.769 0.36C10.57 0.123 10.286 0 10 0C9.774 0 9.547 0.076 9.36 0.232C8.936 0.585 8.878 1.216 9.232 1.64L12.865 6H1C0.448 6 0 6.448 0 7C0 7.552 0.448 8 1 8Z" fill="#134A56"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  [class^='home_report']{
  }
  [class^="home_report"] [class^="bg_"]{
    top: 0;
    left: -10px;
    width: 334px;
    height: auto;
  }
  [class^="home_report"] [class^="bg2_"]{
    top: 0;
    right: 0px;
    width: 221px;
    height: auto;
  }
  @media (max-width: 1020px){
    [class^="home_report"] [class^="bg_"]{
      width: 230px;
      top: 160px;
    }
    [class^="home_report"] [class^="bg2_"]{
      top: -120px;
      width: 140px; 
    }
  }
  @media (max-width: 820px){
    [class^="home_report"] [class^="bg_"]{
      top: 80px;
      opacity: .3;
    }
    [class^="home_report"] [class^="title_"]{
      margin-bottom: 8px;
    }
    [class^="home_report"] [class^="top_"],
    [class^="home_report"] [class^="bottom_"]{
      text-align: center;
    }
    [class^="home_report"] [class^="top_"]{
      font-size: 16px;
    }
    [class^="home_report"] [class^="bottom_"]{
      font-size: 36px;
    }
    [class^="home_report"] [class^="title2_"]{
      font-size:24px;
    }
  }
  @media (max-width: 660px){
    [class^="home_report"] [class^="_mw1340"] {
      padding: 0 20px;
    }
  }
</style>
