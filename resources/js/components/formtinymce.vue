<script setup>
  import Editor from '@tinymce/tinymce-vue'
  import {onMounted,watch,watchEffect,ref,reactive} from 'vue'
  const props = defineProps({
    // errors:{
    //   type: Object,
    //   default: '',
    //   required: true
    // },
    id:{
      type: String,
      // default: '',
      required: true
    },
    text:{
      type: String,
      // default: '',
      required: true
    },
    // type:{
    //   type: String,
    //   // default: 'text',
    //   required: true
    // },
    rules:{
      type: String,
      default: '',
    },
    required:{
      type: Boolean,
      default: false,
    },
    value:{
      type: String,
      // default: '',
      // required: true
    },
  })
  const apiKey = 'gje7zemldqqgzujr26nq4f0y4oytowkculf5nkwr0c9lik86'
  const init = reactive({
    language: 'zh_TW',
    height: 500,
    menubar: false, //隐藏上菜單
    // toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
    toolbar: 'fontsize forecolor bold italic underline link image align code', //下菜單
    // plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap mentions quickbars linkchecker emoticons advtable export',
    // plugins: 'mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    plugins: 'image link advcode',//
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function () {
          // var id = 'blobid' + (new Date()).getTime();
          // var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          // var base64 = reader.result.split(',')[1];
          // var blobInfo = blobCache.create(id, file, base64);
          // blobCache.add(blobInfo);
          // cb(blobInfo.blobUri(), { title: file.name });
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
              var id = 'blobid' + (new Date()).getTime();
              var blobCache = tinymce.activeEditor.editorUpload.blobCache;
              // console.log(id, file, base64)
              var blobInfo = blobCache.create(id, file, base64);
              blobCache.add(blobInfo);
              cb(blobInfo.blobUri(), { title: file.name });
            };
          }
        };
        reader.readAsDataURL(file);
      };
      input.click();
    }
  })
  const content = ref('')
  const inputValue = ref('')
  watch(
    () =>props.value,
    () => {
    // console.log('watch props.value')
    content.value = props.value
    inputValue.value = props.value
  });
  watch(
    () =>content.value,
    () => {
    // console.log('watch content')
    // console.log(content.value)
    inputValue.value = content.value
  });
</script>
<template>
  <div class="inputDiv_dif_fdc">
    <div class="label_text16">
      <label :for="props.id">{{props.text}}<span class="_coRed" v-if="props.required">*</span></label>
    </div>
    <div class="input_wi100_por">
      <v-field 
      type="hidden" 
      :name="props.id"
      rules="required"
      v-model="inputValue"
      ></v-field>
      <Editor :api-key="apiKey" v-model="content" :init="init"></Editor>
      <error-message :name="props.id" class="_formError"></error-message>
    </div>
  </div>
</template>
<style scoped>
  textarea{
    padding: 8px 16px;
    border-radius: 0;
    border-color: #dee2e6;
    min-height: 160px;
  }
  textarea:focus-visible {
    outline: none;
  }

</style>
