<script setup>
  // import forminput from './forminput.vue'
  // import formpassword from './formpassword.vue'
  // import formemail from './formemail.vue'
  // import formimg from './formimg.vue'
  // import formbutton from './formbutton.vue'
  // import axios from 'axios'
  import { useRoute,useRouter } from 'vue-router'
  const route = useRoute()
  const router = useRouter()
  import { notify } from "@kyvg/vue3-notification";
  import formbutton from './formbutton.vue'
  import { bamanagerdelete } from '../composables/useApi'
  import {onMounted ,ref } from 'vue'
  const loadingShow = ref(false)
  const props = defineProps({
    class:{
      type: String,
      default:''
    },
    show:{
      type: Boolean,
      // required: true
    },
    id:{
      type: Number,
      // required: true
    },
    url:{
      type: String,
      // required: true
    },
    fn:{
      type: Function, 
      default: ()=>{},
    },
    deletFn:{
      type: Function, 
      default: ()=>{},
    },
    searchFn:{
      type: Function, 
      default: ()=>{},
    },
  })
  const emit = defineEmits(['update:show'])
  const cancelFn = () => {
    //向父組件回傳
    emit('update:show',false)
  }
  // const sendFn = async() => {
  //   try{
  //     loadingShow.value = true
  //     const result = await bamanagerdelete(props.id);
  //     loadingShow.value = false
  //     if(result.status){
  //       notify({title: "刪除成功"});
  //       props.fn(route.params.id)
  //     }else{
  //       notify({title:"刪除失敗",text:result.message});
  //     }
  //     cancelFn()
  //   }catch(eror){
  //     console.log('badelete:請求失敗',eror)
  //     notify({title: eror});
  //     cancelFn()
  //   }
  // }
  onMounted(()=>{
  })
</script>

<template>
  <div class="badelete" :class="props.class" v-show="props.show">
    <div class="content">
      <div class="title_fs24_mab24">訊息通知</div>
      <div class="text_mab24">你確定刪除?</div>
      <div class="_dif_jce">
        <div class="_dif_wi50_gap8">
          <a class="link_btn_wi100_pa16_fs16_br4_dif_aic_jcc_fw400_bgWhite" @click="cancelFn">取消</a>
          <!-- <formbutton :loadingShow="loadingShow" @click="sendFn" text="確認"/> -->
          <formbutton :loadingShow="loadingShow" @click="props.deletFn(props.id,props.searchFn,cancelFn)" text="確認"/>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
[class^='badelete']{
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0,0,0,.3);
  display: flex;
  align-items: center;
  justify-content: center;
}
[class^='badelete'] [class^='content']{
  padding: 32px;
  background: #fff;
  box-shadow: -2px 1px 10px #00000010;
  border-radius: 8px;
  max-width: 500px;
  width: 100%;
}
[class^='badelete'] [class^='content'] :deep(button){
  background: #134A56;
  border: 1px solid #134A56;
  color: #fff;
}
</style>
