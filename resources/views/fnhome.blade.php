{{-- 指定繼承 layouts.fn 母模板  --}}
@extends('layouts.fn')

{{-- title --}}
@section('title')@endsection

{{-- CSS --}}
@once
@push('customStyle')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  {{-- <style>
  </style> --}}
@endpush
@endonce

{{-- js --}}
@once
@push('customScript')
  <script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endpush
@endonce  

{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  {{-- html --}}
  @include('layouts.fn_nav2')
  @include('layouts.fnhome_header')
  @include('layouts.fnhome_story')
  @include('layouts.fnhome_news')
  @include('layouts.fnhome_commodity')
  @include('layouts.fnhome_ad')
  @include('layouts.fnhome_connection')
  @include('layouts.fn_footer')

  {{-- js --}}
  <script>
    function fn(){
      new Rellax('.rellax')
      AOS.init()
      headerfn()
      commodityFn()
      messageFn();//公告
    }
    window.onload = fn
  </script>
@endsection