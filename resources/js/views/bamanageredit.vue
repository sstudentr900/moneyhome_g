<script setup>
  import formpassword from '../components/formpassword.vue'
  import banav from '../components/banav.vue'
  import forminput from '../components/forminput.vue'
  import formemail from '../components/formemail.vue'
  import formimg from '../components/formimg.vue'
  import formreleases from '../components/formreleases.vue'
  import formbutton from '../components/formbutton.vue'
  import {onMounted ,ref } from 'vue'
  import { useRoute,useRouter } from 'vue-router'
  import { bamanageredit,bamanagereditpost } from "../composables/useApi"
  import { notify } from "@kyvg/vue3-notification";
  const route = useRoute()
  const router = useRouter()
  const id = ref('')
  const imgValue = ref('')
  const emailValue = ref('')
  // const passwordValue = ref('')
  const nameValue = ref('')
  const releasesValue = ref('')
  const loadingShow = ref(false)
  const onSubmit = async(values,actions)=>{
    // console.log('22',values)
    //送出表單
    try{
      loadingShow.value = true
      const result = await bamanagereditpost(id.value,values);
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
  onMounted(async()=>{
    // console.log('onMounted',route.params.id);
    id.value = Number(route.params.id)
    if(!id.value){
      notify({title: '錯誤請重新操作'});
      // router.push({ name:'bamanager', params:{id:1} })
    }
    try{
      const result = await bamanageredit(id.value);
      // console.log('61',result,now);
      if(result.status){
        // console.log('67',result.datas.cover)
        imgValue.value = result.datas.cover; 
        emailValue.value = result.datas.account; 
        // passwordValue.value = result.datas.cover; 
        nameValue.value = result.datas.name; 
        releasesValue.value = result.datas.releases; 
        // console.log(emailValue.value)
      }else{
        notify({title: '錯誤找不到資料請重新操作'});
        router.push({ name:'bamanager', params:{id:1} })
      }
    }catch(eror){
      console.log('eror',eror)
      // router.push({name:'bamanager'})
    }
  })
</script>

<template>
  <div class="bamanageradd_dif">
    <banav/>
    <div class="publicBaContent">
      <div class="topTitle_fs24_fw600_coGreen_matb24">管理員_修改</div>
      <div class="formDiv">
        <v-form id="form" ref="form" v-slot="{ errors }"  @submit="onSubmit">
          <formimg id="cover" size='5' width='200' height='200' type="jpg,png,jpeg" text='圖片' class="_mab32" :errors="errors" :value="imgValue"/>
          <formemail id="account" text="帳號" class="_mab32" :errors="errors" :value="emailValue"/>
          <forminput id="name" text="姓名" type="text" class="_mab32" :errors="errors" :value="nameValue"/>
          <formreleases class="_mab32" :errors="errors" :value="releasesValue"/>
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