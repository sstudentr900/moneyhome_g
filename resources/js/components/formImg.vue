<script setup>
  import {onMounted,toRef,watchEffect ,ref,getCurrentInstance } from 'vue'
  const { proxy, ctx } = getCurrentInstance()
  const _this = ctx
  const props = defineProps({
    id:{
      type: String,
      default: 'photo',
      required: true
    },
    size:{
      type: String,
      // default: '預設值',
      required: true
    },
    width:{
      type: String,
      // default: '預設值',
      required: true
    },
    height:{
      type: String,
      // default: '預設值',
      required: true
    },
    type:{
      type: String,
      default: 'jpg,png,jpeg',
      // required: true
    },
    text:{
      type: String,
      default: '圖片',
      // required: true
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
  const text= `上傳檔案須小於 ${props.size} MB，建議尺寸：寬${props.width}px × 高${props.height}px 。圖片格式：${props.type}。`
  const imagValue = ref('')
  const error = ref('')
  const validate = (value)=>{
    // console.log('44',value)
    //無值
    if (!value) {
      return '圖片為必填';
    }
    //類型
    const propstype = props.type.split(','); //類型
    const type = value.type.split('/')[1]; //類型
    // console.log('63',type,propstype,propstype.indexOf(type))
    if (!(~propstype.indexOf(type))) {
      return `圖片類型為${props.type}`;
    }
    //大小
    const size = props.size * 1048576; //大小
    if (size <= value.size) {
      return `圖片大小需小於${props.type}M`;
    } 
    //轉baste64
    const imgWidth =  props.width;
    const imgHight = props.height;
    const file2Image = (file, callback)=>{
      const image = new Image();
      const url = URL.createObjectURL(file);
      image.onload = function () {
        callback(image);
        URL.revokeObjectURL(url);
      };
      image.src = url;
    };
    file2Image(value, function (img) {
      const canvas = document.createElement("canvas");
      const context = canvas.getContext("2d");
      if (imgWidth) {
        canvas.width = imgWidth;
        canvas.height = imgHight;
        const imageWidth = img.width;
        const imageHeight = img.height;
        context.clearRect(0, 0, canvas.width, canvas.height);
        if (imageWidth / imgWidth > imageHeight / imgHight) {
          context.drawImage(img, imgWidth / 2 - imgHight * imageWidth / imageHeight / 2, 0, imgHight * imageWidth / imageHeight, imgHight);
        } else {
          context.drawImage(img, 0, imgHight / 2 - imgWidth * imageHeight / imageWidth / 2, imgWidth, imgWidth * imageHeight / imageWidth);
        }
      } else {
        canvas.width = img.width;
        canvas.height = img.height;
        context.drawImage(img, 0, 0, img.width, img.height);
      }
      imagValue.value = canvas.toDataURL("image/jpeg", 0.9); 
    });

    // All is good
    return true;
  }
  const fileFn =(event)=>{
    const file= event.target.files[0]
    // console.log(file)
    //類型
    const propstype = props.type.split(','); //類型
    const type = file.type.split('/')[1]; //類型
    // console.log('63',type,propstype,propstype.indexOf(type))
    if (!(~propstype.indexOf(type))) {
      error.value = `圖片類型為${props.type}`;
      return false;
    }
    //大小
    const size = props.size * 1048576; //大小
    if (size <= file.size) {
      error.value = `圖片大小需小於${props.type}M`;
      return false;
    } 
    //轉baste64
    const imgWidth =  props.width;
    const imgHight = props.height;
    const file2Image = (file, callback)=>{
      const image = new Image();
      const url = URL.createObjectURL(file);
      image.onload = function () {
        callback(image);
        URL.revokeObjectURL(url);
      };
      image.src = url;
    };
    file2Image(file, function (img) {
      const canvas = document.createElement("canvas");
      const context = canvas.getContext("2d");
      if (imgWidth) {
        canvas.width = imgWidth;
        canvas.height = imgHight;
        const imageWidth = img.width;
        const imageHeight = img.height;
        context.clearRect(0, 0, canvas.width, canvas.height);
        if (imageWidth / imgWidth > imageHeight / imgHight) {
          context.drawImage(img, imgWidth / 2 - imgHight * imageWidth / imageHeight / 2, 0, imgHight * imageWidth / imageHeight, imgHight);
        } else {
          context.drawImage(img, 0, imgHight / 2 - imgWidth * imageHeight / imageWidth / 2, imgWidth, imgWidth * imageHeight / imageWidth);
        }
      } else {
        canvas.width = img.width;
        canvas.height = img.height;
        context.drawImage(img, 0, 0, img.width, img.height);
      }
      imagValue.value = canvas.toDataURL("image/jpeg", 0.9); 
    });
  }
  watchEffect(() => {
    // console.log('img類型',props.value)
    //空值
    if(!props.value){
      return false;
    }
    //判斷類型
    const propstype = props.type.split(','); //類型
    const type = props.value.split('.')[1]; //類型
    const random = Math.floor(Math.random()*1000)
    if ((~propstype.indexOf(type))) {
      //判斷是xxx.jpg
      imagValue.value = `${process.env.MIX_URL}${process.env.MIX_IMGPREFIX}/${props.value}/?${random}`
    }else{
      //base64
      imagValue.value = props.value
    }
  });
  // console.log(setFieldError())
</script>
<template>
  <div class="inputDiv_dif">
    <div class="label_text16">
      <label>{{ props.text }} <span class="_coRed" v-if="props.required">*</span></label>
    </div>
    <div class="_dif_fdc_fl1"> 
      <div class="imgDiv_dif_aic_gap16_mab8" >
        <div class="img">
          <img :src="imagValue" v-if="imagValue"/> 
          <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" v-else>
            <path d="M0 0H100V100H0V0Z" fill="url(#paint0_linear_582_637)"/>
            <path d="M0 0H100V100H0V0Z" fill="url(#paint1_linear_582_637)"/>
            <path d="M49.8757 59.8334C60.8754 59.8334 69.7924 50.9164 69.7924 39.9167C69.7924 28.917 60.8754 20 49.8757 20C38.876 20 29.959 28.917 29.959 39.9167C29.959 50.9164 38.876 59.8334 49.8757 59.8334Z" fill="white"/>
            <path d="M49.8751 66.4727C33.3831 66.491 20.0184 79.8558 20 96.3477C20 98.181 21.4861 99.6671 23.3194 99.6671H76.4306C78.2638 99.6671 79.75 98.181 79.75 96.3477C79.7318 79.8558 66.367 66.4909 49.8751 66.4727Z" fill="white"/>
            <defs>
            <linearGradient id="paint0_linear_582_637" x1="21.5" y1="-20.5" x2="21.5" y2="79.5" gradientUnits="userSpaceOnUse">
            <stop offset="0.03125" stop-color="#FFF1CC"/>
            <stop offset="0.473958" stop-color="#FFE9B0" stop-opacity="0.262661"/>
            <stop offset="1" stop-color="#FDF2CB" stop-opacity="0"/>
            </linearGradient>
            <linearGradient id="paint1_linear_582_637" x1="13.0441" y1="-6.89706" x2="82.9706" y2="102.735" gradientUnits="userSpaceOnUse">
            <stop stop-color="#FEB665"/>
            <stop offset="1" stop-color="#F66EB4"/>
            </linearGradient>
            </defs>
          </svg>
        </div>
      </div>
      <div class="imginputDiv_dif_aic_por">
        <div class="inputDiv">
          <div class="input">
            <v-field 
            type="hidden" 
            :name="props.id"
            rules="required"
            v-model="imagValue"
            ></v-field>
            <input type="file" @change="fileFn">
            <!-- <v-field 
            type="file" 
            :name="`${props.id}_file`"
            :rules="validate"
            :validateOnBlur="false"
            :validateOnChange="true"
            ></v-field> -->
          </div>
          <error-message :name="props.id" class="_formError"></error-message>
          <span class="_formError" v-if="error">{{ error }}</span>
        </div>
        <div class="text_fs14_coGray700_lh12">{{ text }}</div>
      </div>
    </div> 
  </div>
</template>
<style scoped>
  [class^='imgDiv'] img{
    max-width: 100px;
    border: 1px solid #ddd;
  }
  [class^='inputDiv']{
    flex: 0 0 100px;
  }
  [class^='imginputDiv'] .input{
    width: 80px;
    overflow: hidden;
  }
  [class^='imginputDiv'] .input input{
    padding: 0!important;
  } 
/* [class^='file']{
  padding: 0 8px 0 0;
  font-size: 16px;
  font-weight: 500;
  border: 1px solid #DCDFE7;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05);
  border-radius: 6px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
[class^='file']:hover{
}
[class^='file'] svg{
  margin-bottom: -4px;
}*/
[class^='text']{
  flex: 1 1;
}
</style>
