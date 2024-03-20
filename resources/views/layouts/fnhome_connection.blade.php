@once
@push('customStyle')
<style>
  [class^='home_connection']>div{
    padding: 100px 60px;
  }
  [class^='home_connection'] [class*='_title'] .big{
    padding: 0 12px 12px;
  }
  [class^='home_connection'] .contentDiv{
    max-width: 600px;
    width: 100%;
  }
  [class^='home_connection'] [class^='publicContact'] [class^='label'] {
    color: #fff;
  }
  [class^='home_connection'] [class^='publicContact'] textarea, 
  [class^='home_connection'] [class^='publicContact'] input {
    border: 1px solid #fff;
    color: #fff;
  }
  [class^='home_connection'] [class^='publicContact'] [class*='_btn'] {
    border: 1px solid #fff;
    color: #fff;
    background: transparent;
  }
  [class^='home_connection'] [class^='publicContact'] [class*='_btn']:hover {
    color: #000;
    background: #fff
  }
  [class^='home_connection'] [class^='publicContact'] [class^='qrcode'] p {
    color: #fff;
  }
  [class^='home_connection'] [class^='store']{
    border-left: 2px solid rgba(255,255,255,.3);
  }
  [class^='home_connection'] [class^='publicStore'] p{
    color: #fff;
  }
  [class^='home_connection'] [class^='publicStore'] [class*='_btn'] {
    color: #fff;
    border: 1px solid #fff;
    background: transparent;
  }
  [class^='home_connection'] [class^='publicStore'] [class*='_btn']:hover {
    color: #000;
    background: #fff
  }
  @media (max-width: 1200px){
    [class^='home_connection']{
      padding: 20px 0;
    } 
    [class^='home_connection']>div{
      width: 100%;
      padding: 60px 30px;
      justify-content: center;
    }
    [class^='home_connection'] [class^='store']{
      border-left: none;
    }
    [class^='store']{
      border-top: 2px solid rgba(255,255,255,.3);
      border-left: none;
      text-align: center;
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
<div id="home_connection" class="home_connection_dif_fww_bgGray800">
  <div class="contact_dif_jce_wi50">
    <div class="contentDiv" data-aos="fade-up" data-aos-duration="600">
      <div class="_title_tac">
        <h4 class="big">CONTACT US</h4>
        <p class="small">聯絡我們</p>
      </div>
      @include('layouts.fn_contact')
    </div>
  </div>
  <div class="store_dif_wi50">
    <div class="contentDiv" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
      <div class="_title_tac">
        <h4 class="big">SERVICE HOURS</h4>
        <p class="small">服務時間</p>
      </div>
      @include('layouts.fn_store')
    </div>
  </div>
</div>