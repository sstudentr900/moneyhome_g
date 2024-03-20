<script setup>
  const props = defineProps({
    class:{
      type: String,
      default:''
    }
  })
</script>

<template>
  <div class="qrcode_dif_aic_gap16_mat32" :class="props.class">
    <div class="_wi80">
      <p class="_text16_ls2">OAO LINE帳號：
        <b class="_text24_ls2_fwb">@oao.style</b>
      </p>
      <p class="_text12_ls2">若有訊息需要即時回覆，請加入LINE和我們聯繫吧！</p>
      <p class="_text12_ls2">(手機點擊或掃描右方Line帳號的QR-CODE)</p>
    </div>
    <div class="_wi20">
      <div class="img"><img class='_fluid' :src="$getSrc('home_qrcode.png')" alt=""></div>
    </div>
  </div>
</template>
<style scoped>
  [class^='qrcode']{
    margin-left: 58px;
  }
  [class^='qrcode'] .img{
    background: #fff;
    padding: 6px;
  }
  [class^='qrcode'] p{
    color: #fff;
  }
  [class^='qrcode'].style2 p{
    color: #212121;
  }
  @media (max-width: 780px){
    [class^='qrcode']{
      flex-direction: column;
      text-align: center;
    }
    [class^='qrcode'] ._wi80{
      width: 100%;
      max-width: 380px;
    }
    [class^='qrcode'] ._wi20{
      width: 100%;
      max-width: 110px;
    }
  }
</style>
