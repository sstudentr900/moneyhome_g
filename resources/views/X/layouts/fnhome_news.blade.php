@once
@push('customStyle')
<style>
  [class^='home_news']{
    padding: 160px 0;
  }
  [class^='home_news'] .linkDiv_dif_aic_jcs_pal24{
    border-left: 3px solid rgba(255,255,255,.3);
  }
  [class^='home_news'] [class^='linkDiv'] [class*='_btn'] {
    padding: 2px 8px;
  }
  [class^='home_news'] [class^='linkDiv'] [class^='iconDiv']{
    width: 38px;
  }
  [class^='home_news'] [class^='linkDivs'] [class^='linkDiv']{
    border-bottom: 1px solid rgba(255,255,255,.3);
  }
  [class^='home_news'] [class^='linkDiv_']:hover svg path{
    fill: #fff;
  }
  @media (max-width: 1200px){
    [class^='home_news']{
      padding: 80px 0;
    }
    [class^='home_news'] ._title{
      text-align: center;
    }
    [class^='home_news'] ._title .big{
      padding-left: 12px;
    }
    [class^='home_news'] [class^='newsContent']{
      display: flex;
      align-items: center;
      flex-flow: column;
      gap: 64px;
    }
    [class^='home_news'] [class^='newsContent']>div{
      max-width: 520px;
      width: 100%;
    }
  }
  @media (max-width: 780px){
    [class^='home_news'] [class^='newsContent']{
      gap: 36px;
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
<div id="home_news" class="home_news_bgGray900">
  <div class="_mw1280">
    <div class="_title" data-aos="fade-up" data-aos-duration="600">
      <h4 class="big">NEWS</h4>
      <p class="small">最新消息</p>
    </div>
    <div class="newsContent_dif_gap32">
      <div class="_wi50" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
        @foreach ($newdatas as $newdata)
        @if($loop->index==0)
        <div class="img_mab24">
          {{-- <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_new1.png?'.rand() }}"> --}}
          <img class="_fluid" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/'.$newdata['cover'].'?'.rand() }}">
        </div>
        <a class="linkDiv_dif_aic_jcs_pal24" href="{{ route('fnnews',[ 'id'=>$newdata['id'] ]) }}">
          <div class="textDiv">
            <div class="title_dif_aic">
              {{-- <div class="date_text18_coWhite_mar8">2023.10.30</div>
              <div class="icon_btn">優惠活動</div> --}}
              <div class="date_text18_coWhite_mar8">{{ $newdata['updated'] }}</div>
              <div class="icon_btn">{{ $newdata['assort'] }}</div>
            </div>
            <div class="text_text18_coWhite_ellipsis1">{{ $newdata['title'] }}</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a>
        @endif
        @endforeach
      </div>
      <div class="linkDivs_wi50" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
        {{-- <a class="linkDiv_dif_aic_jcs_mab16_pab16">
          <div class="textDiv">
            <div class="title_dif_aic">
              <div class="date_text18_coWhite_mar8">2023.10.30</div>
              <div class="icon_btn">優惠活動</div>
            </div>
            <div class="_text18_coWhite_ellipsis1">OAO優惠活動標題文字文字文字文字文字文字</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a>
        <a class="linkDiv_dif_aic_jcs_mab16_pab16">
          <div class="textDiv">
            <div class="title_dif_aic">
              <div class="date_text18_coWhite_mar8">2023.10.30</div>
              <div class="icon_btn">優惠活動</div>
            </div>
            <div class="_text18_coWhite_ellipsis1">OAO優惠活動標題文字文字文字文字文字文字</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a>
        <a class="linkDiv_dif_aic_jcs_mab16_pab16">
          <div class="textDiv">
            <div class="title_dif_aic">
              <div class="date_text18_coWhite_mar8">2023.10.30</div>
              <div class="icon_btn">優惠活動</div>
            </div>
            <div class="_text18_coWhite_ellipsis1">OAO優惠活動標題文字文字文字文字文字文字</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a>
        <a class="linkDiv_dif_aic_jcs_mab16_pab16">
          <div class="textDiv">
            <div class="title_dif_aic">
              <div class="date_text18_coWhite_mar8">2023.10.30</div>
              <div class="icon_btn">優惠活動</div>
            </div>
            <div class="_text18_coWhite_ellipsis1">OAO優惠活動標題文字文字文字文字文字文字</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a> --}}
        @foreach ($newdatas as $newdata)
        @if($loop->index>0)
        <a class="linkDiv_dif_aic_jcs_mab16_pab16" href="{{ route('fnnews',[ 'id'=>$newdata['id'] ]) }}">
          <div class="textDiv">
            <div class="title_dif_aic">
              <div class="date_text18_coWhite_mar8">{{ $newdata['updated'] }}</div>
              <div class="icon_btn">{{ $newdata['assort'] }}</div>
            </div>
            <div class="_text18_coWhite_ellipsis1">{{ $newdata['title'] }}</div>
          </div>
          <div class="iconDiv_dif_aic_jcc">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.75003 15.5C1.55262 15.5012 1.35693 15.4633 1.17417 15.3887C0.991415 15.314 0.825191 15.204 0.68503 15.065C0.544438 14.9256 0.432847 14.7597 0.356694 14.5769C0.280541 14.3941 0.241333 14.198 0.241333 14C0.241333 13.802 0.280541 13.6059 0.356694 13.4232C0.432847 13.2404 0.544438 13.0745 0.68503 12.935L5.65003 8.00002L0.880031 3.03501C0.600654 2.75397 0.443842 2.37379 0.443842 1.97752C0.443842 1.58124 0.600654 1.20106 0.880031 0.920016C1.01948 0.779423 1.18538 0.667831 1.36817 0.591678C1.55095 0.515525 1.74701 0.476318 1.94503 0.476318C2.14305 0.476318 2.33911 0.515525 2.5219 0.591678C2.70468 0.667831 2.87059 0.779423 3.01003 0.920016L8.80003 6.92002C9.07487 7.20041 9.22882 7.57739 9.22882 7.97001C9.22882 8.36264 9.07487 8.73962 8.80003 9.02002L2.80003 15.02C2.66539 15.1654 2.50328 15.2827 2.32306 15.3651C2.14284 15.4475 1.94808 15.4933 1.75003 15.5Z" fill="#666666"/>
            </svg>
          </div>
        </a>
        @endif
        @endforeach
        <a href="{{ route( 'fnnew') }}" class="more_text16_ls2_coWhite">
          MORE...
        </a>
      </div>
    </div>
  </div>
</div>