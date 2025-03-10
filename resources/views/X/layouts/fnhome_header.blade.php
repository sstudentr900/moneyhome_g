@once
@push('customStyle')
<style>
  .home_header{
    position: relative;
    background-color: #333;
  }
  .home_header [class*='logo2Div']{
    bottom: 50px;
    left: 40px;
  }
  .home_header [class*='commidity']{
    bottom: 60px;
    right: 0;
    height: 175px;
    z-index: 100;
  }
  .home_header [class*='commidityDiv']{
    opacity: 0;
  }
  .home_header [class*='commidityDiv'].active{
    opacity: 1;
  }
  .home_header [class*='commidityDiv'] .img{
    width: 130px;
    height: auto;
  }
  .home_header [class*='commidityDiv'] [class*='_commidityItem']{
    width: 200px;
  }
  .home_header [class*='commidityDiv'] h4{
    line-height: 1.2;
    border-bottom: 1px solid #ddd;
    padding-bottom: 12px;
    margin-bottom: 12px;
  }
  .home_header [class*='commidityDiv'] a:hover{
    background: #fff;
    color: #212121;
  }
  .home_header [class*='lineDiv']{
    width: 1px ;
    background: rgba(255,255,255,.3);
    top: 0;
    right: 220px;
  }
  @media (max-width: 920px){
    .home_header [class*='lineDiv'],
    .home_header [class*='logo2Div']{
      display: none;
    }
  }
  @media (max-width: 480px){
    .home_header [class*='commidity'] {
      width: 100%;
      right: auto;
      left: 0;
      bottom: 16px;
    }
    .home_header [class*='commidityDiv']{
      left: 20px;
      width: calc(100% - 40px);
    }
  }
  .publicCarousel {
    position: relative;
    width: 100%;
    height: 100vh;
    opacity: 0;
    transition: opacity .8s;
  }
  .publicCarousel.active {
    opacity: 1;
  }
  .publicCarousel .img_he100 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    text-align: center;
    opacity: 0;
    transition: opacity .4s ease-in;
    /* transition-delay: opacity .3s; */
    overflow: hidden;
  }
  .publicCarousel .img_he100.active{
    opacity: 1;
  }
  .publicCarousel .img_he100 img{
    transform: scale(1.2);
    transition: transform 12s ease-out;
  }
  .publicCarousel .img_he100.active img{
    transform:scale(1)
  }
  .phoneCarousel{
    display: none;
  }
  .phoneCarousel video{
    width: 100%;
    height: auto;
  }
  @media (max-width: 720px){
    .publicCarousel,
    .commidity_poa{
      display: none;
    }
    .phoneCarousel{
      display: block
    }
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  const headerfn = () => {
    let currentIndex = 2;
    const homeheader = document.querySelector('.home_header');
    const commidityitems = homeheader.querySelectorAll('.commidityitem');
    const bigimgitems = homeheader.querySelectorAll('.bigimgitem');
    const imgLength = commidityitems.length;
    const addClass = ()=>{
      currentIndex = ((currentIndex + 1) % imgLength);
      commidityitems.forEach(element => {
        element.classList.remove('active')
      });
      bigimgitems.forEach(element => {
        element.classList.remove('active')
      });
      commidityitems[currentIndex].classList.add('active')
      bigimgitems[currentIndex].classList.add('active')
    }
    const autoPlayTimer = setInterval(()=>{
      addClass()
    }, 6000);
    addClass()

  };
</script>
@endpush
@endonce
<div id="home_header" class="home_header" data-scroll-section>
  <div class="lineDiv_poa_zi1_he100" data-aos="fade" data-aos-delay="1200" data-aos-duration="1000" data-aos-anchor=".home_header"></div>
  <div class="logo2Div_poa_zi1" data-aos="fade" data-aos-delay="400" data-aos-duration="1000" data-aos-anchor=".home_header">
    <div class="img rellax" data-rellax-speed="-1">
      <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_logo2.png?'.rand() }}">
    </div>
  </div>
  {{-- 商品 --}}
  <div class="commidity_poa" data-aos="fade" data-aos-delay="600" data-aos-duration="1600" data-aos-anchor=".home_header">
    <div class="commidityDiv_poa_dif_gap16_bgGray900_pa24 commidityitem">
      <div class="img">
        <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header_small1.png?'.rand() }}">
      </div>
      <div class="_commidityItem">
        <h4 class="title_coWhite_ellipsis3">002</h4>
        <div class="_dif_aic_jcs">
          <div class="price_coWhite">NT$ 890</div>
          <a 
          class="buy_btn"
          href="https://oaostyle.cashier.ecpay.com.tw/product/000000000589500"
          target="_block"
          >
            立即購買
          </a>
        </div>
      </div>
    </div>
    <div class="commidityDiv_poa_dif_gap16_bgGray900_pa24 commidityitem">
      <div class="img">
        <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header_small1.png?'.rand() }}">
      </div>
      <div class="_commidityItem">
        <h4 class="title_coWhite_ellipsis3">002</h4>
        <div class="_dif_aic_jcs">
          <div class="price_coWhite">NT$ 890</div>
          <a 
          class="buy_btn"
          href="https://oaostyle.cashier.ecpay.com.tw/product/000000000589500"
          target="_block"
          >
            立即購買
          </a>
        </div>
      </div>
    </div>
    <div class="commidityDiv_poa_dif_gap16_bgGray900_pa24 commidityitem">
      <div class="img">
        <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header_small1.png?'.rand() }}">
      </div>
      <div class="_commidityItem">
        <h4 class="title_coWhite_ellipsis3">002</h4>
        <div class="_dif_aic_jcs">
          <div class="price_coWhite">NT$ 890</div>
          <a 
          class="buy_btn"
          href="https://oaostyle.cashier.ecpay.com.tw/product/000000000589500"
          target="_block"
          >
            立即購買
          </a>
        </div>
      </div>
    </div>
  </div>
  {{-- 大圖 --}}
  <div class="publicCarousel active">
    <div class="img_he100 bigimgitem">
      <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header2.jpg?'.rand() }}">
    </div>
    <div class="img_he100 bigimgitem">
      <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header1.jpg?'.rand() }}">
    </div>
    <div class="img_he100 bigimgitem">
      <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header3.jpg?'.rand() }}">
    </div>
  </div>
  {{-- 手機 --}}
  <div class="phoneCarousel">
    {{-- <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_header2.jpg?'.rand() }}"> --}}
    {{-- <video muted playsinline controls autoplay loop> --}}
    <video muted playsinline autoplay loop>
      <source src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_phone.mp4?'.rand() }}" type="video/mp4">
    </video>
  </div>
</div>