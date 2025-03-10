{{-- css --}}
@once
@push('customStyle')
<style>
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
</script>
@endpush
@endonce
{{-- html --}}
<a class="add_btn2" href="{{ URL::asset($active.'_add') }}">
  <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g filter="url(#filter0_d_582_361)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.5 33C28.9558 33 35 26.9558 35 19.5C35 12.0442 28.9558 6 21.5 6C14.0442 6 8 12.0442 8 19.5C8 26.9558 14.0442 33 21.5 33Z" fill="#5E7DA3"/>
    </g>
    <path d="M22.3397 14.7495C22.3397 14.2859 21.9639 13.9102 21.5003 13.9102C21.0368 13.9102 20.661 14.2859 20.661 14.7495V18.661H16.7495C16.2859 18.661 15.9102 19.0368 15.9102 19.5003C15.9102 19.9639 16.2859 20.3397 16.7495 20.3397H20.661V24.2511C20.661 24.7147 21.0368 25.0905 21.5003 25.0905C21.9639 25.0905 22.3397 24.7147 22.3397 24.2511V20.3397H26.2511C26.7147 20.3397 27.0905 19.9639 27.0905 19.5003C27.0905 19.0368 26.7147 18.661 26.2511 18.661H22.3397V14.7495Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
  <p>新增帳戶</p>
</a>