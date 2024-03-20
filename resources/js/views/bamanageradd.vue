<script setup>
  import banav from '../components/banav.vue'
  import forminput from '../components/forminput.vue'
  import formpassword from '../components/formpassword.vue'
  import formemail from '../components/formemail.vue'
  import formimg from '../components/formimg.vue'
  import formreleases from '../components/formreleases.vue'
  import formbutton from '../components/formbutton.vue'
  import {onMounted ,ref } from 'vue'
  import { notify } from "@kyvg/vue3-notification";
  import { useRoute,useRouter } from 'vue-router'
  import { bamanageradd } from "../composables/useApi"
  const route = useRoute()
  const router = useRouter()
  const loadingShow = ref(false)
  const onSubmit = async(values,actions)=>{
    //驗證圖片
    // if(!actions.evt.target.cover_img){
    //   actions.setFieldError('cover', '圖片為必填');
    //   return;
    // }else{
      //圖片需指定cover_img
      // values['cover'] = actions.evt.target.cover_img.src
    // }

    //送出表單
    try{
      loadingShow.value = true
      const result = await bamanageradd(values);
      loadingShow.value = false
      if(result.status){
        notify({title: result.message});
        // 成功去管員
        router.push({name:'bamanager'})
      }else{
        //錯誤訊息
        Object.entries(result.message).forEach((obj) => {
          // console.log(obj); // ['001', {...}]
          // console.log(obj[0], obj[1]); // '001', {...}
          // actions.setFieldError('account', '帳號或密碼錯誤');
          actions.setFieldError(obj[0], obj[1][0]);
        });
      }
    }catch(eror){
      console.log('bamanageradd',eror)
    }
  }
  onMounted(()=>{})
</script>

<template>
  <div class="bamanageradd_dif">
    <banav/>
    <div class="publicBaContent">
      <div class="topTitle_fs24_fw600_coGreen_matb24">管理員_新增</div>
      <div class="formDiv">
        <v-form id="form" ref="form" v-slot="{ errors }"  @submit="onSubmit">
          <formimg id="cover" size='5' width='200' height='200' type="jpg,png,jpeg" text='圖片' class="_mab32" :errors="errors"/>
          <formemail id="account" text="帳號" class="_mab32" :errors="errors" />
          <formpassword id="password" text="密碼" class="_mab32" :errors="errors" />
          <forminput id="name" text="姓名" type="text" class="_mab32" :errors="errors" />
          <formreleases class="_mab32" :errors="errors" />
          <formbutton :loadingShow="loadingShow" text="送出"/> 
        </v-form>
      </div>
    </div>
  </div>
</template>

<style scoped>
  [class^='publicBaContent']{
    flex: 1 1;
    padding: 24px;
    background: #efefef;
  }
  [class^='publicBaContent'] [class^='formDiv']{
    padding: 64px 32px;
    background: #fff;
    user-select: none;
    border-radius: 6px;
    min-height: calc(100vh - 104px - 72px);
    display: flex;
  }
  [class^='publicBaContent'] [class^='formDiv'] form{
    max-width: 640px;
    width: 100%;
    margin: auto;
  }
  [class^='publicBaContent'] [class^='formDiv'] [class^='inputDiv']{
    flex-direction: row;
  }
  [class^='publicBaContent'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='label']){
    flex: 0 0 130px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 16px;
    color: rgb(108, 117, 125);
  }
  [class^='publicBaContent'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='eye']){
    top: 7px
  }
  [class^='publicBaContent'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='input'] input){
    padding: 8px 16px;
    border-radius: 0;
    border-color: #dee2e6;
  }
  [class^='publicBaContent'] [class^='formDiv'] button{
    width: 120px;
    margin-left: 130px;
    padding:  12px 16px;
  }
</style>