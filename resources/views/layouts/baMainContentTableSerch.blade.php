{{-- css --}}
@once
@push('customStyle')
<style>
  [class^='tableDiv']{
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
    margin-bottom: 16px;
  }
  [class^='tableDiv'] [class^='tableTop']{
    border-bottom: 2px solid #DFE0EB;
  }
  [class^='tableDiv'] [class^='tableTitleDiv']{
    /* border-top: 2px solid #DFE0EB; */
    border-bottom: 2px solid #DFE0EB;
    color: #9FA2B4;
  }
  [class^='tableDiv'] [class^='tableTitleDiv'] li div{
    padding: 8px 16px;
    flex: 1 1;
  }
  [class^='tableDiv'] [class^='tableItemDiv'] li div{
    padding: 16px;
    flex: 1 1;
  }
  [class^='tableDiv'] [class^='tableItemDiv'] li{
    border-bottom: 1px solid #DFE0EB;
  }
  [class^='tableDiv'] li div.chooseDiv{
    flex: 0 0 60px;
    text-align: center;
  }
  [class^='tableDiv'] li div.releasesDiv{
    flex: 0 0 80px;
  }
  [class^='tableDiv'] li div.modifyDiv{
    flex: 0 0 80px;
    text-align: center;
  }
  [class^='tableDiv'] li div.sortDiv{
    flex: 0 0 80px;
  }
  [class^='tableDiv'] li div.coverDiv{
    flex: 0 0 120px;
  }
  /*delete*/
  .delete_btn2:hover{
    background: #5e7da3;
    color: #fff;
  }
  /*add*/
  .add_btn2{
    height: 40px;
  }
  .add_btn2 svg{
    margin-bottom: -4px;
  }
  .add_btn2{
    padding: 0 8px 0 0;
  }
  .add_btn2:hover{
    background: #5e7da3;
    color: #fff;
  }
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
  function chooseCheckFn(event){
    // console.log(event.checked)
    const chooseInputs = document.querySelectorAll('.chooseInput')
    if(event.checked){
      chooseInputs.forEach(element => {
        element.checked = true
      });
    }else{
      chooseInputs.forEach(element => {
        element.checked = false
      });
    }
  }
  function btnDeletFn(){
    const checkeds = [...document.querySelectorAll('.chooseInput:checked')]
    const ids = checkeds.map(items=>items.dataset.id)
    if(!ids.length){
      alert('沒有選擇刪除項目!!')
      return false;
    }
    if(confirm("你確定刪除?"))
    {
      fetch('/{{ $active }}_deleteAll', {
        method: 'post', 
        headers: {
          'Content-Type': 'application/json',
          "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        cache: 'no-cache',
        body: JSON.stringify({
          ids: ids,
          pageId: {{ $pageStart }}
        })
      })
      .then((response)=>response.json())
      .then(data => {
        // checkeds.forEach(element => {
        //   element.closest('li').remove()
        // });
        window.location.reload();
      })
      .catch(error => {
        alert(error)
      });
    }
  }
</script>
@endpush
@endonce
{{-- html --}}
<div class="_dif_aic_jcs_mab24">
  <div class="_fs32_coGray900_fw600">{{ $mainTitle }}</div>
</div>
<div class="tableDiv">
  @if(!isset($add) && !isset($delet))
  <div class="tableTop_dif_aic_jcs_pa32">
    @if(!isset($add))
      <a class="add_btn2" href="{{ URL::asset($active.'_add') }}">
        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d_582_361)">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M21.5 33C28.9558 33 35 26.9558 35 19.5C35 12.0442 28.9558 6 21.5 6C14.0442 6 8 12.0442 8 19.5C8 26.9558 14.0442 33 21.5 33Z" fill="#5E7DA3"/>
          </g>
          <path d="M22.3397 14.7495C22.3397 14.2859 21.9639 13.9102 21.5003 13.9102C21.0368 13.9102 20.661 14.2859 20.661 14.7495V18.661H16.7495C16.2859 18.661 15.9102 19.0368 15.9102 19.5003C15.9102 19.9639 16.2859 20.3397 16.7495 20.3397H20.661V24.2511C20.661 24.7147 21.0368 25.0905 21.5003 25.0905C21.9639 25.0905 22.3397 24.7147 22.3397 24.2511V20.3397H26.2511C26.7147 20.3397 27.0905 19.9639 27.0905 19.5003C27.0905 19.0368 26.7147 18.661 26.2511 18.661H22.3397V14.7495Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{-- <p>新增{{ $mainTitle }}</p> --}}
        <p>新增</p>
      </a>
    @endif
    {{-- 刪除 --}}
    @if(!isset($delet))
    <a class="delete_btn2" onclick="btnDeletFn()">刪除</a>
    @endif
  </div>
  @endif
  <div class="tableContent_mab64">
    <ul class="tableTitleDiv">
      <li class="_dif">
        {{-- 刪除 --}}
        @if(!isset($delet))
        <div class="chooseDiv">
          <input type="checkbox" class="chooseInputAll" onclick="chooseCheckFn(this)">
        </div>
        @endif
        @foreach($forms as $form)
          <div class="{{ $form['name'].'Div' }}">
            <p>{{ $form['text'] }}</p>
          </div>
        @endforeach
      </li>
    </ul>
    <ul class="tableItemDiv">
      @foreach($datas as $data)
      <li class="_dif">
        {{-- 刪除 --}}
        @if(!isset($delet))
        <div class="chooseDiv">
          <input type="checkbox" class="chooseInput" data-id="{{ $data['id'] }}">
        </div>
        @endif
        @foreach($forms as $form)
          <div class="{{ $form['name'].'Div' }}">
            @if ($form['type']=='releases')
              {{-- 範例
                {"name":"releases","text":"狀態","type":"releases","value":"y","y_text":"啟用","n_text":"停用"}, 
              --}}
              <p>{{ $data[$form['name']]==$form['value']?$form['y_text']:$form['n_text'] }}</p>
            @elseif ($form['type']=='select')
              {{-- 範例
                {"name":"assort","text":"分類","type":"select","selects":[{"id":"1","value":"最新資訊"},{"id":"2","value":"優惠活動"},{"id":"3","value":"新品登場"}]},
              --}}
              @foreach($form['selects'] as $select)
                @if ( $select['id']==$data[$form['name']] )
                  <p>{{ $select['value'] }}</p>
                @endif
              @endforeach
            @elseif ($form['type']=='cover')
              <img class="_fluid" src="{{ URL::asset(isset($src)&&$src?$src:env('MIX_IMGPREFIX')).'/'.$data[$form['name']].'?'.rand() }}">
            @elseif ($form['type']=='text')
              <p>{{ $data[$form['name']] }}</p>
            @elseif ($form['type']=='modify')
              <a href="{{ URL::asset($active.'_update').'/'.$data->id.'/'.$pageStart }}" class="_tac">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M19.9964 0.927555C19.4015 0.333603 18.5953 0 17.7546 0C16.914 0 16.1078 0.333603 15.5129 0.927555L1.28189 15.1586C0.874358 15.5638 0.55123 16.0458 0.331199 16.5767C0.111168 17.1077 -0.00139823 17.677 1.31086e-05 18.2517V20.0481C1.31086e-05 20.2801 0.0922004 20.5027 0.256295 20.6668C0.420389 20.8309 0.642949 20.9231 0.875013 20.9231H2.67139C3.24606 20.9247 3.81534 20.8123 4.34627 20.5924C4.87721 20.3725 5.35926 20.0495 5.76451 19.6421L19.9964 5.41018C20.5901 4.81535 20.9235 4.00928 20.9235 3.16887C20.9235 2.32846 20.5901 1.52239 19.9964 0.927555ZM4.52726 18.4048C4.03377 18.895 3.36698 19.171 2.67139 19.1731H1.75001V18.2517C1.74913 17.9068 1.81665 17.5653 1.94867 17.2467C2.08069 16.9281 2.27459 16.6389 2.51914 16.3958L13.3193 5.59568L15.3318 7.60818L4.52726 18.4048ZM18.7583 4.17293L16.5655 6.36656L14.553 4.35843L16.7466 2.16481C16.8788 2.03295 17.0356 1.92841 17.2081 1.85716C17.3807 1.78591 17.5656 1.74935 17.7522 1.74955C17.9389 1.74975 18.1237 1.78672 18.2961 1.85835C18.4685 1.92997 18.6251 2.03485 18.757 2.16699C18.8888 2.29914 18.9933 2.45596 19.0646 2.6285C19.1358 2.80104 19.1724 2.98593 19.1722 3.1726C19.172 3.35928 19.135 3.54408 19.0634 3.71647C18.9918 3.88886 18.8869 4.04545 18.7548 4.17731L18.7583 4.17293Z" fill="#9FA2B4"/>
                </svg>
              </a>
            @endif
          </div>
        @endforeach
      </li>
      @endforeach
    </ul>
  </div>
</div>