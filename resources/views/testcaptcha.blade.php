<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
    <link rel="icon" href="{{ asset('/favicon-a.ico?').time()}}">
    <link href="{{ URL::asset('css/zero.css').'?'.rand() }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/basis.css').'?'.rand() }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/fnapp.css').'?'.rand() }}" rel="stylesheet" type="text/css">
    <!-- @stack('customStyle')
    <script src="{{ URL::asset('js/fnapp.js').'?'.rand() }}"></script>
    @stack('customScript') -->
  </head>
  <body>
    <h2>testcaptcha.blade</h2>
    <form method="post" action="{{ route('testcaptchaPost') }}">
      {!! csrf_field() !!}
      <input type="text" id="captcha" name="captcha" placeholder="captcha">
      <img src="{{ captcha_src() }}" onclick="this.src='{{captcha_src()}}'+Math.random() ">
      @error('captcha')
        <div class="puplicError">{!! $message !!}</div>
      @enderror
      <button type='submit'>發送</button>
  </form>
  </body>
</html>

