<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="description" content="">
  <title></title>
  <script src="{{ asset('js/app.js').'?'.rand() }}" defer></script>
  <link rel="stylesheet" href="{{ asset('css/app.css').'?'.rand() }}">
</head>

<body>
  <div id="app">
    <router-view></router-view>
    <notifications />
    <div>
</body>

</html>