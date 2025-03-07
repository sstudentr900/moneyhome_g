{{-- 指定繼承 layouts.fn 母模板  --}}
@extends('layouts.fn')

{{-- title --}}
@section('title')@endsection

{{-- CSS --}}
{{-- @once
@push('customStyle')
<style>
</style>
@endpush
@endonce --}}

{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  {{--  html --}}
  <div class="{{ $active }}">
    @include('layouts.fn_nav')
    <div class="_bgGray200_patb140_pageMh">
      <div class="_mw980">
        @include('layouts.fn_title')
        @if(!$data)
          <div class="publicContent">
            <div class="_fs32_tac_pa48_mat48">找不到資料...</div>
          </div>
        @else
          <div class="publicContent">
            {!! $data['tinymce'] !!}
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