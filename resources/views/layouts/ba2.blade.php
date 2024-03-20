<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    @include('layouts.ba_head')
    @stack('customStyle')
    @stack('customScript')
  </head>
  <body>
    @yield('content')
  </body>
</html>
