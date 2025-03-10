{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')

{{--傳送資料到母模板，並指定變數為content--}}
@section('content')
  {{-- js --}}
  @once
  @push('customScript')
    <script>
      window.tinymceFn = function (o) {
        var select = o.select;
        tinymce.remove();
        tinymce.init({
          selector: select,
          // 目標物件
          theme: "modern",
          // 模板風格
          language: "zh_TW",
          //語系
          // paste_data_images: true,
          // image_advtab: true,
          menubar: false,
          verify_html: false,
          //禁清除html
          // inline: true, //內連
          plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern"],
          //引入套件=>
          //advlist進階清單','autolink自動連結,link連結,image上傳圖片,lists清單,charmap特殊字元表,print列印,preview預覽,media影音,
          //forecolor文字顏色,backcolor文字背景,emoticons表情,undo復原,styleselect格式, bold粗體,italic斜體, alignleft置左對齊, 
          //bullist項目清單,numlist數字清單, outdent減少縮排, indent增加縮排,fontselect字體樣式 ,fontsizeselect字體大小,code程式碼,table表單
          toolbar: "undo redo | fontsizeselect bold italic forecolor alignleft aligncenter image table link code",
          //bar1顯示套件

          /* enable title field in the Image dialog*/
          image_title: true,

          /* enable automatic uploads of images represented by blob or data URIs*/
          // automatic_uploads: true,
          file_picker_types: 'image',
          file_picker_callback: function file_picker_callback(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
              var file = this.files[0];
              var type = file.type.split('/')[1]; //類型

              var size = file.size;
              var imgSize = 1070000; //單張圖大小

              if (!(type == 'jpeg' || type == 'jpg' || type == 'png')) {
                alert('錯誤 : 圖片類型只能是 jpg , jpeg , png');
              } else if (size > imgSize) {
                alert('錯誤 : 圖片大小需小於1M');
              } else {
                var reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function () {
                  var base64 = reader.result.split(',')[1];
                  var id = 'blobid' + new Date().getTime();
                  var blobCache = tinymce.activeEditor.editorUpload.blobCache; // console.log(id, file, base64)

                  var blobInfo = blobCache.create(id, file, base64);
                  blobCache.add(blobInfo);
                  cb(blobInfo.blobUri(), {
                    title: file.name
                  });
                };
              }
            };

            input.click();
          },
          setup: function setup(editor) {
            editor.on('init', function (e) {
              console.log('init'); //載入完成移除load
              // loadRemove();
            });
          }
        });
      };
    </script>
  @endpush
  @endonce  
  
  @include('layouts.baMainContentBread')
  @include('layouts.baMainContentTableUpdate',['forms'=>$forms])
  <script>
    imgFn(740,480,5)
    tinymceFn({'select': '#tinymce'})
  </script>
@endsection