@once
@push('customStyle')
<style>
  [class^='title3']{
    color: #212121;
    font-size: 36px;
    font-weight: 400;
    letter-spacing: 2px;
    padding-bottom: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #212121;
    display: inline-flex;
    align-items: end;
    font-family: 'Noto Serif TC','Noto Sans TC',serif;
    margin-bottom: 50px;
  }
  [class^='title3'] span{
    font-size: 18px;
    margin-left: 16px;
    font-family: 'Noto Sans TC','Noto Serif TC',serif;
  }
  @media (max-width: 620px){
    [class^='title3']{
      font-size: 18px;
      letter-spacing: 1px;
      padding: 0 12px 12px 0;
      margin-bottom: 32px;
    }
    [class^='title3'] span{
      font-size: 12px;
    }
  }
</style>
@endpush
@endonce
{{-- @once
@push('customScript')
<script>
</script>
@endpush
@endonce --}}
<div class="publichyperlink_coGray900_text14_mab16_dif_aic_jcs">
  <div class="bread_dif">
    @foreach ($breads as $key => $bread)
    <div class="_dif">
      <a href="{{ $bread['url']?route($bread['url']):'' }}">{{ $bread['name'] }}</a>
      @if(count($breads)!=$loop->index+1)
      <div class="icon_pal8_par8">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="6"
          height="12"
          viewBox="0 0 7 12"
          fill="none"
        >
          <path
            d="M1 11L5.92929 6.07071C5.96834 6.03166 5.96834 5.96834 5.92929 5.92929L1 1"
            stroke="#A4A4A4"
            stroke-width="2"
            stroke-linecap="round"
          />
        </svg>
      </div>
      @endif
    </div>
    @endforeach
  </div>
</div>
<div class="title3">
  <p>{{ $title_en }}</p>
  <span>{{ $title }}</span>
</div>