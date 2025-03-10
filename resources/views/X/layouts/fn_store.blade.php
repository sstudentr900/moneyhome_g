{{-- CSS --}}
@once
@push('customStyle')
<style>
    [class^='publicStore']{
      max-width: 620px;
      margin: auto;
    }
    [class^='publicStore'] p{
      color: #212121;
    }
    [class^='publicStore'] [class*='_btn'] {
      color: #212121;
      border: 1px solid #212121;
    }
    [class^='publicStore'] [class*='_btn']:hover {
      background: #212121;
      color: #fff;
    }
    /* [class^='publicStore'] [class*='_cover']{
      max-width: 500px;
    } */
</style>
@endpush
@endonce
<div class="publicStore">
  <div class="map_mab24">
    <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_store.jpg?'.rand() }}">
    {{-- <iframe class='_wi100' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.258135557517!2d121.54410899999999!3d25.025312399999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aa2ea2992fd7%3A0xd2a7bbe8e3826f2f!2zMTA25Y-w5YyX5biC5aSn5a6J5Y2A5ZKM5bmz5p2x6Lev5LqM5q61MjY15be3M-iZnzE!5e0!3m2!1szh-TW!2stw!4v1699346669531!5m2!1szh-TW!2stw" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
  </div>
  <ul class="text_mab24">
    <li>
      <p class="_text16_ls2">營業時間 | 周一至周五 11:00-18:00</p>
    </li>
    <li>
      <p class="_text16_ls2">聯絡電話 | 0919-941-070</p>
    </li>
    <li>
      <p class="_text16_ls2">電　　郵 | oao@oao.style</p>
    </li>
    <li>
      <p class="_text16_ls2">地　　址 | 臺北市中正區懷寧街12號2樓(僅開放網路販售)</p>
    </li>
  </ul>
  {{-- <a class="_btn_pat12b24_dii_br0" href="https://maps.app.goo.gl/qhkjG2ptEqLpHfLg7" target="_blank">開啟Google地圖</a> --}}
</div>