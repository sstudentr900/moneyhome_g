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
    <div class="publicContent_bgGray200_patb140_pageMh">
      <div class="_mw980">
        @include('layouts.fn_title')
        @include('layouts.fn_store')
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