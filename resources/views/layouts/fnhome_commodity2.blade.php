@once
@push('customStyle')
<style>
  .home_commodity{
    padding: 160px 0 120px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }
  .home_commodity ._title_tac .big{
    border-bottom: none;
    padding-right: 0;
    color: rgba(33, 33, 33, 1);
    position: relative;
  }
  .home_commodity ._title_tac .big::after{
    content: '';
    width: 60%;
    height: 1px;
    background: rgba(33, 33, 33, 1);
    position: absolute;
    top: 45px;
    left: calc(50% - 30%);
  }
  .home_commodity ._title_tac .small{
    color: rgba(33, 33, 33, 1);
  }
  .home_commodity [class*='commidityItems']>div{
    padding: 18px;
    background: #fff;
    box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.25);
    cursor: pointer;
  }
  .home_commodity [class*='commidityItems']>div:nth-child(2){
    width: 40%;
  }
  .home_commodity [class*='commidityItems'] ._commidityItem .title{
    border-bottom: 1px solid rgba(33, 33, 33, 1);
    padding-bottom: 16px;
    margin-bottom: 12px;
  }
  .home_commodity [class*='commidityItems'] ._commidityItem .buy{
    padding: 3px 12px
  }
  .home_commodity [class*='commidityItems'] ._commidityItem .buy:hover{
    background: #212121;
    color: #fff;
  }
  .home_commodity .bottom p{
    display: none;
  }
  .home_commodity .bottom.left{
    text-align: left;
  }
  .home_commodity .bottom.left p:nth-child(2){
    display: block;
  }
  .home_commodity .bottom.center{
    text-align: center;
  }
  .home_commodity .bottom.center p:nth-child(3){
    display: block;
  }
  .home_commodity .bottom.right{
    text-align: right;
  }
  .home_commodity .bottom.right p:nth-child(4){
    display: block;
  }
  .home_commodity .bottom svg{
    filter: drop-shadow(0 3px 3px rgb(0 0 0 / 0.4));
  }
  .home_commodity .bottom .text{
    /* display: none; */
    margin-top: 24px;
    color: #212121;
    font-size: 18px;
    font-weight: 400;
    line-height: 30px; /* 176.471% */
    letter-spacing: 2px;
  }
  @media (max-width: 1200px){
    .home_commodity{
      padding: 80px 0 ;
    }
    .home_commodity [class*='commidityItems']>div[data-v-7ebc6618] {
      padding: 16px 16px 12px;
    }
  }
  /* @media (max-width: 1080px){
    [class*='commidityItems']{
      gap: 32px;
    }
  } */
  @media (max-width: 980px){
    .home_commodity [class*='commidityItems']{
      flex-flow: column;
      gap: 32px;
    }
    .home_commodity [class*='commidityItems']>div._wi40,
    .home_commodity [class*='commidityItems']>div._wi30{
      max-width: 420px;
      width: 100%;
    }
    .home_commodity .bottom {
      display: none;
    }
  }
  @media (max-width: 474px){
    .home_commodity ._title_tac .big::after{
      top: 76px;
    }
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  function commodityFn(){
    const home_commodity = document.querySelector('.home_commodity');
    const items = home_commodity.querySelectorAll('.item');
    const bottom = home_commodity.querySelector('.bottom');
    // const ps = bottom.querySelectorAll('p');
    // console.log(divs)
    items.forEach((item,index) => {
      item.addEventListener("mouseenter", (event) => {
        event.stopPropagation()
        bottom.classList.remove('left')
        bottom.classList.remove('center')
        bottom.classList.remove('right')
        if(index==0){
          bottom.classList.add('left')
        }else if(index==1){
          bottom.classList.add('center')
        }else if(index==2){
          bottom.classList.add('right')
        }
        // console.log(index)
      });
    });
  }
</script>
@endpush
@endonce
<div 
  id="home_commodity" 
  class="home_commodity"
  style="background-image:url('{{ URL::asset(env('MIX_IMGPREFIX')).'/home_commodity_bg.png?'.rand() }}')"
>
  <div class="_mw1280">
    <div class="_title_tac" data-aos="fade-up" data-aos-duration="600">
      <h4 class="big">POPULAR PRODUCTS</h4>
      <p class="small">人氣商品</p>
    </div>
    <div class="commidityItems_dif_aic_jcs_gap64_mab32" >
      <div class="item _wi30" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
        <div class="img_mab8">
          <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_commodity1.png?'.rand() }}">
        </div>
        <div class="_commidityItem">
          <h4 class="title">
            <div class="_ellipsis1">OAO  -Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)</div>
          </h4>
          <div class="_dif_aic_jcs">
            <div class="price">NT$ 100</div>
            <a href="#" class="buy _btn_coGray900_bcGray900">立即購買</a>
          </div>
        </div>
      </div>
      <div class="item _wi40" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
        <div class="img_mab8">
          <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_commodity2.png?'.rand() }}">
        </div>
        <div class="_commidityItem">
          <h4 class="title">
            <div class="_ellipsis1">OAO  -Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)</div>
          </h4>
          <div class="_dif_aic_jcs">
            <div class="price">NT$ 200</div>
            <a href="#" class="buy _btn_coGray900_bcGray900">立即購買</a>
          </div>
        </div>
      </div>
      <div class="item _wi30" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
        <div class="img_mab8">
          <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_commodity3.png?'.rand() }}">
        </div>
        <div class="_commidityItem">
          <h4 class="title">
            <div class="_ellipsis1">OAO  -Galette布列塔尼酥餅綜合三入組 (土鳳梨、蔓越莓、煙燻桂圓)</div>
          </h4>
          <div class="_dif_aic_jcs">
            <div class="price">NT$ 300</div>
            <a href="#" class="buy _btn_coGray900_bcGray900">立即購買</a>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom left">
      <div class="icon">
        <svg width="120" height="110" viewBox="0 0 120 110" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line x1="63" y1="-4.37114e-08" x2="63" y2="57" stroke="white" stroke-width="2"/>
          <path d="M28.0465 94.4545C28.0465 97.6269 27.4452 100.326 26.2425 102.551C25.0494 104.777 23.4206 106.476 21.3562 107.651C19.3013 108.815 16.9906 109.398 14.4244 109.398C11.8391 109.398 9.51906 108.811 7.46413 107.636C5.40921 106.462 3.78516 104.762 2.59197 102.537C1.39879 100.312 0.802202 97.6174 0.802202 94.4545C0.802202 91.2822 1.39879 88.5833 2.59197 86.358C3.78516 84.1326 5.40921 82.4375 7.46413 81.2727C9.51906 80.0985 11.8391 79.5114 14.4244 79.5114C16.9906 79.5114 19.3013 80.0985 21.3562 81.2727C23.4206 82.4375 25.0494 84.1326 26.2425 86.358C27.4452 88.5833 28.0465 91.2822 28.0465 94.4545ZM21.8107 94.4545C21.8107 92.3996 21.503 90.6667 20.8874 89.2557C20.2814 87.8447 19.4244 86.7746 18.3164 86.0455C17.2085 85.3163 15.9111 84.9517 14.4244 84.9517C12.9376 84.9517 11.6403 85.3163 10.5323 86.0455C9.42436 86.7746 8.56262 87.8447 7.94709 89.2557C7.34103 90.6667 7.038 92.3996 7.038 94.4545C7.038 96.5095 7.34103 98.2424 7.94709 99.6534C8.56262 101.064 9.42436 102.134 10.5323 102.864C11.6403 103.593 12.9376 103.957 14.4244 103.957C15.9111 103.957 17.2085 103.593 18.3164 102.864C19.4244 102.134 20.2814 101.064 20.8874 99.6534C21.503 98.2424 21.8107 96.5095 21.8107 94.4545ZM37.9762 109H31.3853L41.4279 79.9091H49.354L59.3825 109H52.7915L45.5046 86.5568H45.2773L37.9762 109ZM37.5643 97.5653H53.1325V102.366H37.5643V97.5653ZM90.2496 94.4545C90.2496 97.6269 89.6483 100.326 88.4457 102.551C87.2525 104.777 85.6237 106.476 83.5593 107.651C81.5044 108.815 79.1938 109.398 76.6275 109.398C74.0423 109.398 71.7222 108.811 69.6673 107.636C67.6123 106.462 65.9883 104.762 64.7951 102.537C63.6019 100.312 63.0053 97.6174 63.0053 94.4545C63.0053 91.2822 63.6019 88.5833 64.7951 86.358C65.9883 84.1326 67.6123 82.4375 69.6673 81.2727C71.7222 80.0985 74.0423 79.5114 76.6275 79.5114C79.1938 79.5114 81.5044 80.0985 83.5593 81.2727C85.6237 82.4375 87.2525 84.1326 88.4457 86.358C89.6483 88.5833 90.2496 91.2822 90.2496 94.4545ZM84.0139 94.4545C84.0139 92.3996 83.7061 90.6667 83.0906 89.2557C82.4845 87.8447 81.6275 86.7746 80.5195 86.0455C79.4116 85.3163 78.1142 84.9517 76.6275 84.9517C75.1407 84.9517 73.8434 85.3163 72.7354 86.0455C71.6275 86.7746 70.7657 87.8447 70.1502 89.2557C69.5442 90.6667 69.2411 92.3996 69.2411 94.4545C69.2411 96.5095 69.5442 98.2424 70.1502 99.6534C70.7657 101.064 71.6275 102.134 72.7354 102.864C73.8434 103.593 75.1407 103.957 76.6275 103.957C78.1142 103.957 79.4116 103.593 80.5195 102.864C81.6275 102.134 82.4845 101.064 83.0906 99.6534C83.7061 98.2424 84.0139 96.5095 84.0139 94.4545ZM103.922 79.9091L103.368 100.278H98.1694L97.6012 79.9091H103.922ZM100.769 109.369C99.8313 109.369 99.0264 109.038 98.354 108.375C97.6817 107.703 97.3503 106.898 97.3597 105.96C97.3503 105.032 97.6817 104.237 98.354 103.574C99.0264 102.911 99.8313 102.58 100.769 102.58C101.668 102.58 102.459 102.911 103.141 103.574C103.823 104.237 104.168 105.032 104.178 105.96C104.168 106.585 104.003 107.158 103.681 107.679C103.368 108.19 102.956 108.602 102.445 108.915C101.934 109.218 101.375 109.369 100.769 109.369ZM118.891 79.9091L118.337 100.278H113.138L112.57 79.9091H118.891ZM115.738 109.369C114.8 109.369 113.995 109.038 113.323 108.375C112.65 107.703 112.319 106.898 112.328 105.96C112.319 105.032 112.65 104.237 113.323 103.574C113.995 102.911 114.8 102.58 115.738 102.58C116.637 102.58 117.428 102.911 118.11 103.574C118.792 104.237 119.137 105.032 119.147 105.96C119.137 106.585 118.971 107.158 118.65 107.679C118.337 108.19 117.925 108.602 117.414 108.915C116.902 109.218 116.344 109.369 115.738 109.369Z" fill="white"/>
        </svg>
      </div>
      <p class="text">1舌尖上的絲絲分明,抵達味蕾時的酸與甜，相擁、激情。<br>台灣的豔陽將土鳳梨17號的柔順香甜送入口中，土鳳梨2號3的濃郁香氣緊接著翻騰湧入!<br>最後到底是誰在味蕾上佔據了上風?</p>
      <p class="text">2舌尖上的絲絲分明,抵達味蕾時的酸與甜，相擁、激情。<br>台灣的豔陽將土鳳梨17號的柔順香甜送入口中，土鳳梨2號3的濃郁香氣緊接著翻騰湧入!<br>最後到底是誰在味蕾上佔據了上風?</p>
      <p class="text">3舌尖上的絲絲分明,抵達味蕾時的酸與甜，相擁、激情。<br>台灣的豔陽將土鳳梨17號的柔順香甜送入口中，土鳳梨2號3的濃郁香氣緊接著翻騰湧入!<br>最後到底是誰在味蕾上佔據了上風?</p>
    </div>
  </div>
</div>