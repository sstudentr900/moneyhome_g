@if($pageTotle!=1)
  {{-- css --}}
  @once
  @push('customStyle')
  <style>
    .publicPageNumber{
      display: flex;
      justify-content: center;
      margin-top: 72px;
      user-select: none;
    }
    .publicPageNumber ul{
      /* border: 1px solid #212121; */
      display: flex;
    }
    .publicPageNumber .ph{
      display: none;
    }
    .publicPageNumber a{
      font-size: 16px;
      width: 45px;
      height: 45px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #212121;
      margin: 0 2px;
    }
    .publicPageNumber a.active{
      background:#212121;
      color: #fff;
    }
    .publicPageNumber a:not(.dot):hover{
      background:#212121;
      color: #fff;
    }
    .publicPageNumber a:hover svg path {
      stroke: #fff;
    }
    @media (max-width: 680px){
      .publicPageNumber {
        margin-top: 32px;
        justify-content: center;
      }
      [class^='number'] {
        display: none;
      }
      .publicPageNumber a{
        /* border: 1px solid #212121; */
        margin: 0 6px;
        width: 130px;
        background: #212121;
        color: #fff;
        
      }
      .publicPageNumber a svg path {
        stroke: #fff;
      }
      .publicPageNumber .ph{
        display: inline-block;
        padding: 0 8px;
        padding-bottom: 4px;
      }
    }
  </style>
  @endpush
  @endonce
  {{-- js --}}
  {{-- @once
  @push('customScript')
  <script>
  </script>
  @endpush
  @endonce --}}
  {{-- html --}}
  <div class="publicPageNumber">
    <ul>
      <li class="previous">
        <a href="{{  route($active,[ 'id'=>$pageStart>1?($pageStart-1):1]) }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
            <path d="M6 11L1.07071 6.07071C1.03166 6.03166 1.03166 5.96834 1.07071 5.92929L6 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
          <p class="ph">上一頁</p>
        </a>
      </li>
      @if($pageStart>1)
      <li
        class="number dot"
      >
        <a>...</a>
      </li>
      @endif
      @php
        // 顯示幾個
        $maxGap = 4; 
        $minPage = $pageStart>$maxGap?$pageTotle-($pageStart-$maxGap+$pageStart-1)>$maxGap?$pageStart-$maxGap:($pageStart-$maxGap+$pageStart-1):1;
        $minPage = $pageStart>$maxGap?($pageStart-$maxGap+1):1;
        $maxPage = $pageTotle>($minPage+$maxGap-1)?($minPage+$maxGap-1):$pageTotle;
      @endphp
      @for ($i = $minPage; $i <= $maxPage; $i++)
      <li>
        <a 
          class="{{ $pageStart==$i?'active':'' }}"
          href="{{ route($active,[ 'id'=>$i ]) }}"
          >{{ $i }}</a>
      </li>
      @endfor
  
      @if($pageStart<$pageTotle)
      <li
        class="number dot"
      >
        <a>...</a>
      </li>
      @endif
      <li class="next">
        <a href="{{ route($active,[ 'id'=>$pageStart<$pageTotle?($pageStart+1):$pageTotle ]) }}">
          <p class="ph">下一頁</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
          <path d="M1 11L5.92929 6.07071C5.96834 6.03166 5.96834 5.96834 5.92929 5.92929L1 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </a>
      </li>
    </ul>
  </div>
@endif