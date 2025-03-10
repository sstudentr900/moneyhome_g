<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <!-- <base href="{{ URL::to('/') }}/">{{-- #基本路徑 --}} -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
  <!-- <meta name="format-detection" content="telephone=no" /> -->
  {{-- 強制https --}}
  {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
  {{-- <title>@yield('title')</title> --}}
  <title></title>
  {{-- 頁面描述　--}}
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('/favicon-a.ico?').time()}}">
  <link href="{{ URL::asset('css/zero.css').'?'.rand() }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/basis.css').'?'.rand() }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/fnapp.css').'?'.rand() }}" rel="stylesheet" type="text/css">
  {{-- <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ URL::asset('js/tinymce/tinymce.min.js').'?'.rand() }}"></script> --}}
  @stack('customStyle')
  <script src="{{ URL::asset('js/fnapp.js').'?'.rand() }}"></script>
  @stack('customScript')
</head>

<body>
  @yield('content')
</body>

</html>