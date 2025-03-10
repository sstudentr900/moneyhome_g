{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')

{{--傳送資料到母模板，並指定變數為content--}}
@section('content')
  @include('layouts.baMainContentBread')
  @include('layouts.baMainContentTableUpdate',['forms'=>$forms])
  <script>
    imgFn(120,120)
  </script>
@endsection