{{-- 指定繼承 layouts.fn 母模板  --}}
@extends('layouts.fn')

{{-- title --}}
@section('title')@endsection

{{-- CSS --}}
@once
@push('customStyle')
<style>
  @media (max-width: 760px){
    .fnnew .publicContent ._dif_gap32{
      flex-flow: column;
    }
    .fnnew .publicContent .img_wi40,
    .fnnew .publicContent .textDiv_wi60{
      width: 100%;
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
    <div class="{{ $active }}_bgGray200_patb140_pageMh">
      <div class="_mw980">
        @include('layouts.fn_title')
        {{-- @php
          dd($datas);
        @endphp --}}
        @if($datas->isEmpty())
          <div class="publicContent">
            <div class="_fs32_tac_pa48_mat48">找不到資料...</div>
          </div>
        @else
        <div class="publicContent">
          <div class="items">
            @foreach ($datas as $data)
            <div class="item">
              <div class="_dif_gap32">
                <div class="img_wi40">
                  <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/'.$data['cover'].'?'.rand() }}">
                </div>
                <div class="textDiv_wi60">
                  <div class="title_dif_aic">
                    <div class="date_fs24_fw400_coGray900_mar8">{{ $data['updated'] }}</div>
                    <div class="icon_btn_noho_coGray900_bgTran_bcGray900_pat3b6">{{ $data['assort'] }}</div>
                  </div>
                  <div class="text_text18_coGray900_ellipsis1">{{ $data['title'] }}</div>
                  <hr class="_matb8">
                  <div class="text_text16_coGray900_ellipsis2">{!! $data['content'] !!}</div>
                  <a class="more_text16_ls2_coGray900_mat8" href="{{ route('fnnews',[ 'id'=>$data['id'] ]) }}">
                    SEE ALL...
                  </a>
                </div>
              </div>
              <hr class="_matb32_op02">
            </div>
            @endforeach
          </div>
          @include('layouts.fn_page')
        </div>
        @endif
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