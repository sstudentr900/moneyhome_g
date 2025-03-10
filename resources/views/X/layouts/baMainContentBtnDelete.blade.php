{{-- css --}}
@once
@push('customStyle')
<style>
  .delete_btn2:hover{
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
        checkeds.forEach(element => {
          element.closest('li').remove()
        });
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
<a class="delete_btn2" onclick="btnDeletFn()">刪除</a>