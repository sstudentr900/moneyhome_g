<meta charset="UTF-8" />
<!-- <base href="{{ URL::to('/') }}/">{{-- #基本路徑 --}} -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
<!-- <meta name="format-detection" content="telephone=no" /> -->
{{--  強制https --}}
{{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
{{-- <title>@yield('title')</title> --}}
<title>管理者後台 - OAO.style</title>
<meta name="description" content="用滋味與世界連結，OAO.style將漢方內餡結合西式餅皮，或是西方特色水果製成內餡結合中式餅皮呈現， 透過音樂、藝術，透過現代糕點，我們相信，能夠讓腳下的島嶼與地球每一塊陸地銜接在一起！" />
<meta name="keywords" content="oao,oao style,oao蛋糕,oao千層蛋糕,千層蛋糕,用滋味與世界連結,oao酥餅,oao鳳梨酥,千層蛋糕推薦,好吃的千層蛋糕,送禮千層蛋糕,千層蛋糕人氣店,千層蛋糕推薦,Optimism, Appetite,Originality">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('/favicon-b.ico?').time()}}">
<link href="{{ URL::asset('css/zero.css').'?'.rand() }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/baapp.css').'?'.rand() }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/basis.css').'?'.rand() }}" rel="stylesheet" type="text/css">
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/tinymce/tinymce.min.js').'?'.rand() }}"></script>