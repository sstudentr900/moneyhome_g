{{-- CSS --}}
@once
@push('customStyle')
<style>
  [class^='publicContact']{
    max-width: 580px;
    margin: auto;
  }
  [class^='publicContact'] textarea{
    height: 180px;
  }
  [class^='publicContact'] [class^='label']{
    padding-right: 12px;
    flex: 0 0 58px;
    text-align: right;
    color: #fff;
  }
  [class^='publicContact'] textarea,
  [class^='publicContact'] input{
    background: none;
    border: none;
    width: 100%;
    padding: 8px;
    line-height: 1;
    font-size: 16px;
    color: #fff;
    border: 1px solid #FFF;
  }
  [class^='publicContact'] .input{
    width: 100%;
    position: relative;
  }
  [class^='publicContact'] textarea:focus-visible,
  [class^='publicContact'] input:focus-visible {
    border-radius: 0;
    outline: none;
  }
  [class^='publicContact'] [class^='btnDiv']{
    margin-left: 58px;
  }
  [class^='publicContact'] [class^='btnDiv'] input{
    padding: 12px 36px;
  }
  /*sty2*/
  [class^='publicContact'] [class^='label']{
    color: #212121;
  }
  [class^='publicContact'] textarea,
  [class^='publicContact'] input{
    border: 1px solid #212121;
    color: #212121;
  }
  [class^='publicContact'] [class*='_btn'] {
    color: #212121;
    border: 1px solid #212121;
    background: #212121;
    color: #fff;
    padding: 12px 24px
  }
  /* [class^='publicContact'] [class*='_btn']:hover {
    background: #212121;
    color: #fff;
  } */
  [class^='publicContact'] [class^='qrcode']{
    margin-left: 58px;
  }
  [class^='publicContact'] [class^='qrcode'] .img{
    background: #fff;
    /* padding: 6px; */
  }
  [class^='publicContact'] [class^='qrcode'] p{
    color: #fff;
    color: #212121;
  }
  @media (max-width: 780px){
    [class^='publicContact'] [class^='qrcode']{
      flex-direction: column;
      text-align: center;
    }
    [class^='publicContact'] [class^='qrcode'] ._wi80{
      width: 100%;
      max-width: 380px;
    }
    [class^='publicContact'] [class^='qrcode'] ._wi20{
      width: 100%;
      max-width: 110px;
    }
  }
  @media (max-width: 620px){
    [class^='publicContact'] [class^='label']{
      text-align: left;
      margin-bottom: 2px;
      display: block;
    }
    [class^='publicContact'] [class^='_dif_aic_gap16']{
      display: block;
      margin-bottom: 0;
    }
    [class^='publicContact'] [class^='_dif_aic_wi50'],
    [class^='publicContact'] [class^='_dif_aic_mab32']{
      display: block;
      width: 100%;
      margin-bottom: 16px;
    }
    [class^='publicContact'] [class^='qrcode'],
    [class^='publicContact'] [class^='btnDiv'] {
      margin-left: 0;
    }
  }
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
  function emailFetchFn(){
    fetch("{{ route( 'fncontact' ) }}", {
      method: 'post', 
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      cache: 'no-cache',
      body: JSON.stringify({
        name: 'name',
        phone: 'phone',
        email: 'email@tt.tt',
        content: 'content',
      })
    })
    .then((response)=>response.json())
    .then(data => {
      // console.log(data)
      alert(data['message'])
    })
    .catch(error => {
      alert(error)
    });
  }
</script>
@endpush
@endonce  
<div class="publicContact">
  <form method="post" action="{{ route('fncontactpost') }}" onsubmit="removeloading(event)">
    {!! csrf_field() !!}
    <div class="_dif_aic_gap16_mab32">
      <div class="_dif_aic_wi50">
        @include('layouts.input',[
          'require'=>'true',
          'type'=>'text',
          'id'=>'name',
          'label'=>'姓名'
        ])
      </div>
      <div class="_dif_aic_wi50">
        @include('layouts.input',[
          'type'=>'phone',
          'id'=>'phone',
          'label'=>'電話'
        ])
      </div>
    </div>
    <div class="_dif_aic_mab32">
      @include('layouts.input',[
        'require'=>'true',
        'type'=>'email',
        'id'=>'email',
        'label'=>'電郵'
      ])
    </div>
    <div class="_dif_aic_mab32">
      @include('layouts.input',[
        'require'=>'true',
        'type'=>'textarea',
        'id'=>'content',
        'label'=>'內容'
      ])
    </div>
    <div class="btnDiv_tac">
      <button class='_btn_dii_br0 loadDiv' type='submit'>
        發送留言
        <div class="_loading"></div>
      </button>
    </div>
  </form>
  <div class="qrcode_dif_aic_gap16_mat32">
    <div class="_wi80">
      <p class="_text16_ls2">OAO LINE帳號：
        <b class="_text24_ls2_fwb">@oao.style</b>
      </p>
      <p class="_text12_ls2">若有訊息需要即時回覆，請加入LINE和我們聯繫吧！</p>
      <p class="_text12_ls2">(手機點擊或掃描右方Line帳號的QR-CODE)</p>
    </div>
    <div class="_wi20">
      <div class="img"><img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_qrcode.png?'.rand() }}"></div>
    </div>
  </div>
</div>
