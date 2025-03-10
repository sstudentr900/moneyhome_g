{{-- 指定繼承 layouts.fn 母模板  --}}
@extends('layouts.fn')

{{-- title --}}
@section('title')@endsection

{{-- CSS --}}
@once
@push('customStyle')
  <style>
    [class^="tinymceDiv"] p{
      color: #212121;
      font-size: 16px;
      font-weight: 400;
      line-height: 26px;
    }
    [class^="tinymceDiv"] p+p{
      margin-top: 24px;
    }
    @media (max-width: 900px) {
      [class^="fnnews"] [class^="_mw820"]{
        padding: 0;
      }
    }
  </style>
@endpush
@endonce

{{-- js --}}
{{-- @once
@push('customScript')
@endpush
@endonce   --}}

{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  {{--  html --}}
  <div class="{{ $active }}">
    @include('layouts.fn_nav')
    <div class="_bgGray200_patb140_pageMh">
      <div class="_mw980">
        @include('layouts.fn_title')
        <div class="_mw820">
          @if($datas->isEmpty())
            <div class="publicContent">
              <div class="_fs32_tac_pa48_mat48">找不到資料...</div>
            </div>
          @else
          <div class="publicContent">
            <div class="img_mab24_tac">
              <img class="_img" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/'. $datas[0]['cover'].'?'.rand() }}">
            </div>
            <div class="topDiv">
              <div class="title_dif_aic">
                <div class="date_text18_coGray900_mar8">{{ $datas[0]['updated'] }}</div>
                <div class="icon_btn_noho_coGray900_bgTran_bcGray900_pat3b6">{{ $datas[0]['assort'] }}</div>
              </div>
              <div class="text_text18_coGray900_ellipsis1_">{{ $datas[0]['title'] }}</div>
              <hr class="_mat16_mab16">
            </div>
            <div class="tinymceDiv">{!! $datas[0]['tinymce'] !!}</div>
            <hr class="_mat32_mab32">
            @include('layouts.fn_page2')
          </div>
          @endif
        </div>
      </div>
    </div>
    @include('layouts.fn_footer')
  </div>
  
  {{-- js --}}
  {{-- <script>
    function fn(){
    }
    window.onload = fn
  </script> --}}
@endsection