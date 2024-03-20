@once
@push('customStyle')
<style>
  [class^='publicFooter']{
    padding: 74px 0 34px;
  }
  [class^='publicFooter'] .logoDiv .logoBox{
    width: 200px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  [class^='publicFooter'] .linksDiv{
    max-width: 360px;
  }
  [class^='publicFooter'] .linksDiv a:hover{
    opacity: 1;
  }
  [class^='publicFooter'] .lineDiv{
    max-width: 580px;
  }
  [class^='publicFooter'] .lineDiv ._text16_coWhite{
    opacity: .3;
  }
  [class^='publicFooter'] .bottomDiv{
    border-top: 1px solid rgba(255,255,255,.3);
  }
  [class^='publicFooter'] .bottomDiv [class^='goto']{
    flex: 0 0 100px;
  } 
  [class^='publicFooter'] .bottomDiv [class^='goto'] svg{
    width: 16px;
    height: auto;
    margin-right: 8px;
  }
  @media (max-width: 1280px){
    [class^='publicFooter'] {
      padding: 34px 0 34px;
    }
    [class^='publicFooter'] .topDiv{
      justify-content: flex-start;
    }
    [class^='publicFooter'] .logoDiv{
      width: 100%;
      margin-bottom: 32px;
      margin-top: 32px;
    }
    [class^='publicFooter'] .linksDiv{
      flex: 0 0 340px;
      margin-right: 48px;
    }
    [class^='publicFooter'] .linksDiv .serveDiv_mat32{
      margin-top: 24px;
    }
    [class^='publicFooter'] .lineDiv{
      flex: 1 1;
    }
    [class^='publicFooter'] ._dif_aic_gap24_mat32{
      margin-top: 24px;
    }
  }
  @media (max-width: 960px){
    [class^='publicFooter'] .lineDiv,
    [class^='publicFooter'] .logoDiv,
    [class^='publicFooter'] .linksDiv{
      flex: 0 1 100%;
      max-width: 100%;
      width: 100%;
    }
    [class^='publicFooter'] .linksDiv{
      margin-right: 0;
    }
    [class^='publicFooter'] .lineDiv{
      margin-top: 48px;
    }
    [class^='publicFooter'] .lineDiv ._text16_coWhite{
      line-height: 1.6;
    }
  }
  @media (max-width: 780px){
    [class^='publicFooter'] ._dif_aic_gap24_mat24{
      margin-top: 16px;
    }
    [class^='publicFooter'] .logoDiv {
      margin-bottom: 36px;
      margin-top: 0;
    }
    [class^='publicFooter'] .lineDiv {
      margin-top: 36px;
    }
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  //購物車
  function car_number(){
    const buy = document.querySelector('.fn_navDiv .link .buy')
    if(!buy.length)false;
    const buyNumber  = buy.querySelector('.number')
    const car =  car_search({obj:'car'})
    // console.log(car)
    if(car && car.length){
      // console.log(`carlength,${car.length}`)
      buyNumber.classList.add('active')
      buyNumber.innerText = car.length
    }else{
      // console.log(`car,${car}`)
      buyNumber.classList.remove('active')
      buyNumber.innerText = 0
    }
  }
  function car_delet({obj,id}){
    if(!id){
      if(obj){
        localStorage.removeItem(obj);
      }else{
        localStorage.clear(); 
      }
    }else{
      let getItem = car_search({obj})
      // console.log(`nowGetItem:${getItem}`)
      getItem = getItem.filter(item=>item[0]!=id)
      // console.log(`afterNowItem:${getItem}`)
      //更新
      localStorage.setItem(obj,JSON.stringify(getItem));
      // console.log(`after2NowItem:${ car_search({obj})}`)
    }
    //更新數量
    car_number()
  }
  function car_search({obj,id}){
    if(!id){
      return JSON.parse(localStorage.getItem(obj));
    }else{
      return car_search({obj}).find(item=>{
        item[0]==id?item:''
      })
    }
  }
  function car_add({obj,array}){
    //add
    const id = array[0]
    const value = array[1]
    const getItem = car_search({obj});
    const nowArray = getItem?getItem:[]
    let arrayPush = 0
    // console.log(`修改前nowArray:${nowArray},${id},${value}`)
    //有值
    if(nowArray.length){
      nowArray.forEach((item,index)=>{
        console.log(item,index)
        if(item[0]==id){
          nowArray[index][1] = Number(item[1])+Number(value)
          arrayPush = 1
        }
      })
    }
    if(!arrayPush || !nowArray.length){
      nowArray.push([id,Number(value)])
    }
    localStorage.setItem(obj,JSON.stringify(nowArray));
    //add
    // car_add({obj:'car',array:[this.dataset.id,Number(pop_input.value)]})
    // console.log(`car_search:${car_search({obj:'car'})}`)
  }
  //removeloading
  const removeloading =(event)=>{
    event.target.querySelector('.loadDiv').classList.remove('loadDiv')


    // console.log(event.target)
    // event.preventDefault();
    //  console.log('removeloading',obj)

    // 使用方式
    // <button class='loadDiv' onclick="removeloading(this)">
    //   button
    //   <div class="_loading"></div>
    // </button>
  }
  //goto
  const scrollToTop = ()=>{
    window.scrollTo({
      top: 0,
      behavior: "smooth" // 使用平滑滚动
    });
  }
  //公告
  const messageFn =()=>{
    @if(session('message'))
      let timeoutID = setTimeout(( () => {
        alert("{!! session('message') !!}")
      } ), 400);
      // clearTimeout(timeoutID);
    @endif
  }
</script>
@endpush
@endonce
<div class="publicFooter_bgGray900">
  <div class="_mw1420">
    <div class="_dif_aic_jcs_fww_pab32 topDiv">
      <div class="logoDiv">
        <div class="logoBox">
          <div class="logo">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_logo.png?'.rand() }}">
          </div>
          <div class="_dif_aic_gap24_mat24">
            <a href="https://www.instagram.com/oao.style" target="_black">
              <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_link1.png?'.rand() }}">
            </a>
            <a href=" https://www.facebook.com/oao.taiwan" target="_black">
              <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_link2.png?'.rand() }}">
            </a>
            {{-- <a href="#">
              <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_link3.png?'.rand() }}">
            </a> --}}
          </div>
        </div>
      </div>
      <div class="linksDiv">
        <div class="linkDiv">
          <div class="_title2_coWhite">快速連結</div>
          <div class="_dif_aic_gap16_fww">
            <a href="{{ route( 'fnhome') }}" class="_text16_coWhite_lh1_op06_fw300">首頁</a>
            <a href="{{ route( 'fnstory' ) }}" class="_text16_coWhite_lh1_op06_fw300">品牌故事</a>
            <a href="{{ route( 'fnnew' ) }}" class="_text16_coWhite_lh1_op06_fw300">最新消息</a>
            <a href="{{ route( 'fncontact' ) }}" class="_text16_coWhite_lh1_op06_fw300">聯絡我們</a>
          </div>
        </div>
        <div class="serveDiv_mat32">
          <div class="_title2_coWhite">服務項目</div>
          <div class="_dif_aic_gap16_fww">
            <a  href="https://oaostyle.cashier.ecpay.com.tw" class="_text16_coWhite_lh1_op06_fw300" target="_black">線上訂購</a>
            {{-- <a href="{{ route( 'fnshop' ) }}" class="_text16_coWhite_lh1_op06_fw300">線上訂購</a> --}}
            <a href="{{ route( 'fnexchange' ) }}" class="_text16_coWhite_lh1_op06_fw300">退換貨須知</a>
            <a href="{{ route( 'fnconfidentiality' ) }}" class="_text16_coWhite_lh1_op06_fw300">隱私權條款</a>
            <a href="{{ route( 'fnshippingpolicy' ) }}" class="_text16_coWhite_lh1_op06_fw300">運送政策</a>
          </div>
        </div>
      </div>
      <div class="lineDiv">
        <div class="_title2_coWhite">線上訂購</div>
        <div class="_text12_coWhite_op06">線上刷卡可接受 VISA, Master, PayPal, Union Pay, EC Pay, Apple Pay, LINE pay</div>
        <div class="_dif_aic_fww_gap8_mat8">
          {{-- <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon1.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon2.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon3.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon4.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon5.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon6.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon7.png?'.rand() }}">
          </div> --}}
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon8.png?'.rand() }}">
          </div>
          {{-- <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon9.png?'.rand() }}">
          </div>
          <div class="img">
            <img src="{{ URL::asset(env('MIX_IMGPREFIX')).'/footer_icon10.png?'.rand() }}">
          </div> --}}
        </div>
      </div>
    </div>
    <div class="_dif_aic_jcs_patb8 bottomDiv">
      <small class="_text12_coWhite_op06">Copyright ©2023 昫島OAO. All Right Reserved.</small>
      <div class="goto_dif_aic_jcc_cup_op06">
        <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27 13.3141C27.002 13.6656 26.934 14.014 26.7999 14.3393C26.6657 14.6647 26.468 14.9606 26.2182 15.2101C25.9676 15.4604 25.6694 15.6591 25.3409 15.7946C25.0124 15.9302 24.6601 16 24.3042 16C23.9483 16 23.596 15.9302 23.2675 15.7946C22.939 15.6591 22.6408 15.4604 22.3902 15.2101L13.5213 6.37115L4.59838 14.863C4.0933 15.3603 3.41006 15.6395 2.69789 15.6395C1.98571 15.6395 1.30247 15.3603 0.797394 14.863C0.544727 14.6147 0.344179 14.3194 0.20732 13.994C0.0704611 13.6685 -1.17168e-07 13.3195 -1.32577e-07 12.967C-1.47986e-07 12.6145 0.070461 12.2654 0.20732 11.94C0.344179 11.6146 0.544727 11.3193 0.797394 11.071L11.5803 0.763348C12.0842 0.274063 12.7617 3.95841e-07 13.4674 3.64998e-07C14.173 3.34154e-07 14.8505 0.274062 15.3544 0.763348L26.1373 11.4449C26.3986 11.6846 26.6094 11.9732 26.7575 12.294C26.9055 12.6148 26.9879 12.9616 27 13.3141Z" fill="white"/>
        </svg>
        <p class="_text12_coWhite" onclick="scrollToTop()">Go to top</p>
      </div>
    </div>
  </div>
</div>
</div>
{{-- <script>
  // car_number();
  // navFn();//選單
  // messageFn();//公告
</script> --}}