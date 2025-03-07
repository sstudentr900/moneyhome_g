@once
@push('customStyle')
<style>
  [class^='tableDiv']{
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
    margin-bottom: 16px;
    padding: 60px 30px;
    user-select: none;
  }
  [class^='tableDiv'] li{
    display: flex;
    align-items: center;
    font-size: 14px;
    list-style: none;
    max-width: 720px;
  }
  [class^='tableDiv'] li label{
    color: #9A9FAC;
  }
  [class^='tableDiv'] .publicFlex>label,
  [class^='tableDiv'] li>label{
    flex: 0 0 110px;
    font-size: 16px;
    padding-right: 24px;
    display: flex;
    align-items: baseline;
    justify-content: end;
  }
  [class^='tableDiv'] li>label a {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }
  [class^='tableDiv'] li>label a svg{
    width: 14px;
    height: 14px;
    margin-left: 6px;
    fill: #777;
  }
  [class^='tableDiv'] label+div{
    flex: 1 1;
    display: flex;
  }
  [class^='tableDiv'] [class^='customInputs'] [class^='input'],
  [class^='tableDiv'] label+div>select,
  [class^='tableDiv'] label+div>input,
  [class^='tableDiv'] label+div>textarea{
    padding: 12px;
    width: 100%;
    border: 1px solid #F0F1F7;
    font-size: 16px;
    border-radius: 8px;
    background:  #FCFDFE;
    line-height: 1;
  }
  [class^='tableDiv'] label+div>textarea:not(.tinymce){
    min-height: 160px;
  }
  [class^='tableDiv'] div.mce-tinymce,
  [class^='tableDiv'] textarea#tinymce,
  [class^='tableDiv'] textarea.tinymce{
    min-height: 280px;
    width: 100%;
  }
  [class^='tableDiv'] li+li{
    margin-top: 24px;
  }
  /* [class^='tableDiv'] li>.publicFlex{
    width: 100%;
  }
  [class^='tableDiv'] .publicFlex>.publicFlex{
    flex: 1 1;
  } */
  [class^='tableDiv'] .input{
    position: relative;
  }
  /* [class^='tableDiv'] .publicBtn2{
    color: #fff;
    background: #3056D3;
    border: 1px solid #3056D3;
    padding: 8px 20px;
    border-radius: 3px;
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    margin-top: 20px;
  } */
</style>
@endpush
@endonce
<form method="post" enctype="multipart/form-data">
  <div class="_dif_aic_jcs_mab24">
    <div class="_fs32_coGray900_fw600">{{ $mainTitle }}</div>
    <div class="btns_dif_gap8">
      <button class="_btn2_bgRed500_coWhite_bon" type="submit">儲存</button>
      {{-- <button class="_btn2" type="submit">刪除</button> --}}
    </div>
  </div>
  <div class="tableDiv">
    {!! csrf_field() !!}
    <ul>
      {{-- 自訂表單 --}}
      @if (isset($customInputs))
      @foreach ($customInputs as $customInput)
        <li class="customInputs">
          <label class="label">{{ $customInput['label'] }}</label>
          <div class="input">{{ $customInput['input'] }}</div>  
        </li>
      @endforeach
      @endif

      {{-- forms表單 --}}
      @foreach ($forms as $array)
        <li>
            @include('layouts.input',$array)
        </li>
      @endforeach
      {{--<li>
          @include('layouts.input',['type'=>'file','id'=>'cover','label'=>'圖片'])
      </li>
      <li>
          @include('layouts.input',['type'=>'text','id'=>'account','label'=>'帳號'])
      </li>
      @if ($inputPassword)
      <li>
          @include('layouts.input',['type'=>'password','id'=>'password','label'=>'密碼'])
      </li>
      @endif
      <li>
          @include('layouts.input',['type'=>'text','id'=>'name','label'=>'姓名'])
      </li>
      <li>
          @include('layouts.input',['type'=>'tel','id'=>'phone','label'=>'電話'])
      </li>
      <li>
          @include('layouts.input',['type'=>'release','id'=>'release','label'=>'狀態'])
      </li>--}}
      {{-- <li>
        <label></label>
        <div class="input">
          <button class="publicBtn2" type="submit">送出</button>
        </div>
      </li> --}}
    </ul>
  </div>

  {{-- 第二表單 --}}
  @if(isset($forms2))
  <div class="tableDiv">
    <ul>
      @foreach ($forms2 as $array)
        <li>
            @include('layouts.input',$array)
        </li>
      @endforeach
    </ul>
  </div>
  @endif
</form>