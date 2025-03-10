@once
@push('customStyle')
<style>
  [class^='home_store']{
    padding: 120px 0 340px;
  }
  [class^='home_store'] [class*='_mw1280']{
    /* max-width: 1080px; */
    max-width: 62vw;
  }
  [class^='home_store'] [class*='img']:nth-child(1){
    top: 55%;
    left: 0;
    max-width: 16vw;
  }
  [class^='home_store'] [class*='img']:nth-child(2){
    bottom: -10%;
    left: 60%;
    max-width: 28vw;
  }
  [class^='home_store'] [class*='img']:nth-child(3){
    top: 10%;
    right: 0;
    max-width: 24vw;
  }
  [class^='home_store'] [class*='img']:nth-child(4){
    top: 30%;
    right: 20vw;
    max-width: 20vw;
  }
  @media (max-width: 1340px){
    [class^='home_store'] .storyCenter_pal48{
      padding-left: 0;
    }
    [class^='home_store'] .big_text32_fsi{
      line-height: 2;
    }
  }
  @media (max-width: 1280px){
    .big_text32_fsi{
      font-size: 24px;
    }
  }
  @media (max-width: 1080px){
    [class^='home_store']{
      padding: 60px 0 250px;
    }
    [class^='home_store'] [class*='img']:nth-child(4){
      display: none;
    }
  }
  @media (max-width: 680px){
    [class^='home_store'] [class*='_mw1280']{
      max-width: 100%;
    }
  }
</style>
@endpush
@endonce
{{-- @once
@push('customScript')
<script>
</script>
@endpush
@endonce --}}
<div id="home_store" class="home_store_bgGray800_por">
  <div class="_mw1280_por_zi2 rellax" data-rellax-speed="-2">
    <div class="_title" data-aos="fade-up" data-aos-duration="600">
      <h4 class="big">STORY</h4>
      <p class="small">品牌故事</p>
    </div>
    <div class="storyCenter_pal48" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
      <p class="_text16_coWhite_ls2_mab32">博大精深的漢菓子不僅是東方人的文化，<br>對於西方世界來說更是充滿神秘與故事的點心。</p>
      <p class="_text16_coWhite_ls2_mab32">OAO將漢方內餡結合西式餅皮，<br>或是西方特色水果製成內餡結合中式餅皮呈現，</p>
      <p class="_text16_coWhite_ls2_mab32">
        <span class="big_text32_fsi">Optimism</span>(樂活) / 
        <span class="big_text32_fsi">Appetite</span>(享食) / 
        <span class="big_text32_fsi">Originality</span>(創新)<br>以三元素為核心，揉合文化滋味，隨吃隨享，與世界連結！
      </p>
      <h4 class="big2_text24_ls4_mat32_mab8_coWhite">「用滋味與世界連結」</h4>
      <p class="_text16_coWhite_ls2">透過音樂、藝術，透過現代糕點，我們相信，<br>能夠讓腳下的島嶼與地球每一塊陸地銜接在一起！</p>
    </div>
  </div>
  <div class="bg">
    <div class="img_poa_zi1 rellax" data-rellax-speed="2">
      <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_store1.png?'.rand() }}">
    </div>
    <div class="img_poa_zi1 rellax" data-rellax-speed="1">
      <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_store2.png?'.rand() }}">
    </div>
    <div class="img_poa_zi1 rellax" data-rellax-speed="3">
      <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_store3.png?'.rand() }}">
    </div>
    <div class="img_poa_zi1 rellax" data-rellax-speed="-1">
      <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_store4.png?'.rand() }}">
    </div>
  </div>
</div>