<script setup>
  import { notify } from "@kyvg/vue3-notification";
  import { bamanagerpassword } from '../composables/useApi'
  import formpassword from './formpassword.vue'
  import formbutton from './formbutton.vue'
  import {onMounted,toRef ,ref,getCurrentInstance } from 'vue'
  const { proxy, ctx } = getCurrentInstance()
  const _this = ctx
  const loadingShow = ref(false)
  const props = defineProps({
    class:{
      type: String,
      default:''
    },
    show:{
      type: Boolean,
      required: true
    },
    id:{
      type: Number,
      required: true
    },
    url:{
      type: String,
      required: true
    },
  })
  const emit = defineEmits(['update:show'])
  const cancelFn = () => {
    //向父組件回傳
    emit('update:show',false)
    _this.$refs.form.resetForm();
  }
  const onSubmit = async(values,actions)=>{
    values['id'] = props.id
    try{
      loadingShow.value = true
      const result = await bamanagerpassword(values);
      loadingShow.value = false
      //清除表單
      _this.$refs.form.resetForm();
      if(result.status){
        notify({title: "修改完成"});
      }else{
        notify({title:"修改失敗",text:result.message});
      }
      cancelFn()
    }catch(eror){
      console.log('bakey:請求失敗',eror)
      notify({title: eror});
      cancelFn()
    }
  }
  // onMounted(()=>{
  // })
</script>
<template>
  <div class="bakey" :class="props.class" v-show="props.show">
    <div class="content">
      <div class="title_fs24_mab24">修改密碼</div>
      <v-form id="form" ref="form" v-slot="{ errors }"  @submit="onSubmit">
        <formpassword id="password" class="_mab32" :errors="errors" />
        <div class="_dif_jce">
          <div class="_dif_wi50_gap8">
            <a class="link_btn_wi100_pa16_fs16_br4_dif_aic_jcc_fw400_bgWhite" @click="cancelFn">取消</a>
            <formbutton :loadingShow="loadingShow" text="送出"/>
          </div>
        </div>
      </v-form>
    </div>
  </div>
</template>
<style scoped>
[class^='bakey']{
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0,0,0,.3);
  display: flex;
  /* display: none; */
  align-items: center;
  justify-content: center;
}
[class^='bakey'] [class^='content']{
  padding: 32px;
  background: #fff;
  box-shadow: -2px 1px 10px #00000010;
  border-radius: 8px;
  max-width: 500px;
  width: 100%;
}
[class^='bakey'] [class^='content'] :deep(input){
  border: 1px solid #F0F1F7;
}
[class^='bakey'] [class^='content'] :deep(.link+.link){
  background: #134A56;
  border: 1px solid #134A56;
  color: #fff;
}
[class^='bakey'] [class^='content'] :deep(#form [class^='label']){
  display: none;
}
</style>
