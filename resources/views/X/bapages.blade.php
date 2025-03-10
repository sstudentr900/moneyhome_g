{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')

{{--傳送資料到母模板，並指定變數為content--}}
@section('content')
  {{-- css --}}
  @once
  @push('customStyle')
  <style>
    .bapages [class^='baMainContentDiv'] [class^='tableContent'] [class^='tableTitleDiv'] li div,
    .bapages [class^='baMainContentDiv'] [class^='tableContent'] [class^='tableItemDiv'] li div{
      padding: 16px 30px;
    }
    .bapages [class^='baMainContentDiv'] [class^='tableContent'] [class^='tableItemDiv'] li div.modifyDiv,
    .bapages [class^='baMainContentDiv'] [class^='tableContent'] [class^='tableTitleDiv'] li div.modifyDiv{
      flex: 0 0 120px;
    }
  </style>
  @endpush
  @endonce
  @include('layouts.baMainContentBread')
  @include('layouts.baMainContentTableSerch',['add'=>'false','delet'=>'false'])
  @include('layouts.ba_page')
@endsection