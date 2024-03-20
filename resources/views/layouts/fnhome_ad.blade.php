@once
@push('customStyle')
<style>
  .home_ad{
    /* background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    height: 600px; */
    margin-bottom: -1px;
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
{{-- <div class="home_ad" style="background-image:url('{{ URL::asset(env('MIX_IMGPREFIX')).'/home_ad1.jpg?'.rand() }}')"></div> --}}
<div class="home_ad">
  <img class="_cover" src="{{ URL::asset(env('MIX_IMGPREFIX')).'/home_ad1.jpg?'.rand() }}">
</div>