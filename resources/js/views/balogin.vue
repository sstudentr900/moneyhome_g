<script setup>
  import formemail from '../components/formemail.vue'
  import formpassword from '../components/formpassword.vue'
  import formverify from '../components/formverify.vue'
  import formbutton from '../components/formbutton.vue'
  import {onMounted,ref,getCurrentInstance } from 'vue'
  import {useRouter,useRoute} from 'vue-router'
  import bauser from '../store/bauser'
  const bauserstore = bauser()
  const router = useRouter()
  const route = useRoute()
  const { proxy, ctx } = getCurrentInstance()
  const _this = ctx
  const loadingShow = ref(false)
  const onSubmit = async(values,actions)=>{
    try{
      //redirect登出帶登入跳轉頁面
      // router.push({name:'bamanager'})
      // let redirect = route.query.redirect
      // console.log('redirect',redirect)
      // router.push({path: redirect||'/member/info'})
      loadingShow.value = true
      const result = await bauserstore.isLogin(values);
      loadingShow.value = false
      if(result.status){
        // 成功去館員
        router.push({name:'bamanager',params:{id:1}})
      }else{
        //表單清空
        _this.$refs.form.resetForm();
        //自訂錯誤訊息
        actions.setFieldError('account', '帳號或密碼錯誤');
        actions.setFieldError('password', '帳號或密碼錯誤');
        // alert('帳號或密碼錯誤')
      }
    }catch(eror){
      console.log('balogin',eror)
    }
  }
  onMounted(async()=>{
    // const res = await reqTest()
    // console.log(res)
  })
</script>
<template>
  <div class="login_patb140">
    <div class="contentDiv_usn_mw520">
      <div class="logo_mab48">
        <img :src="$getSrc('home_logo.png')"/>
        <h2 class="_fs32_coGreen_fw800_ls-1">Money Home</h2>
      </div>
      <v-form id="form" ref="form" @submit="onSubmit">
        <formemail class="_mab16" id="account" text="帳號" value='1@1.1'/>
        <formpassword class="_mab16" value='1'/>
        <!-- <formverify class="_mab32"/> -->
        <formbutton :loadingShow="loadingShow" text="登入" class="_mat32"/>
      </v-form>
    </div>
  </div>
</template>
<style scoped>
[class^='login']{
  background: #134A56;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
[class^='logo']{
  text-align: center;
}
[class^='contentDiv']{
  background: #fff;
  padding: 50px 40px 60px;
  border-radius: 8px;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  width: 100%;
  max-width: 440px;
}
:deep(input){
  border: 1px solid #F0F1F7;
}
:deep(button){
  background: #134A56;
  border: none;
  padding: 18px 16px;
}
:deep(#form [class^='label']){
  display: none;
}
</style>
