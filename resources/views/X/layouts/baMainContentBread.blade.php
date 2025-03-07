{{-- css --}}
@once
@push('customStyle')
<style>
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
</script>
@endpush
@endonce
{{-- html --}}
<div class="bread_dif_coGray600_mab24">
  @foreach($breads as $index=>$bread)
  <div class="_dif">
    <a href="{{ $bread['url']?URL::asset($bread['url']):'' }}">{{ $bread['name'] }}</a>
    @if (($index+1)!=count($breads))
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
  {{-- <div class="_dif_coGray600_mab24">
    <a>設定</a>
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
  </div>
  <div class="_dif_coGray600_mab24">
    <a>{{ $mainTitle }}</a>
  </div> --}}
</div>