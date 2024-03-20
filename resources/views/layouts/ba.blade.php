<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    @include('layouts.ba_head')
    @stack('customStyle')
    @stack('customScript')
  </head>
  <body>
    <style>
      [class^='baMainDiv']{
        background: #F7F8FC;
        padding: 0 0 0 90px;
      }
      [class^='baMainTopDiv']{
        width: 100%;
        height: 60px;
        background: #ECEDF0;
      }
      [class^='baMainContentDiv']{
        padding: 32px;
        height: calc(100vh - 60px);
      }
    </style>
    <div class="bamain {{ $active }}">
      @include('layouts.ba_menu')
      <div class="baMainDiv">
        <div class="baMainTopDiv"></div>
        <div class="baMainContentDiv">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
