<script setup>
  import forminput from './forminput.vue'
  import formpassword from './formpassword.vue'
  import formemail from './formemail.vue'
  import formimg from './formimg.vue'
  import formbutton from './formbutton.vue'
  import {onMounted,ref} from 'vue'
  import { useRoute,useRouter } from 'vue-router'
  const route = useRoute()
  const router = useRouter()
  const loadingShow = ref(false)
  const props = defineProps({
    class:{
      type: String,
      default:''
    },
    // formshow:{
    //   type: array,
    //   default:''
    // },
    // formdate:{
    //   type: array,
    //   default:''
    // },
  })
  const isActiveFn = () => {
    document.body.classList.toggle('active');
  }
  const getData = async(now)=>{
    // try{
    //   const res = await request.get(`/news`,{ params: { id: now }})
    //   const data = res.data
    //   // console.log(data)
    //   newsdata.value = data; 
    //   pageNow.value = Number(data[0].pageNow); 
    //   pageTotle.value = Number(data[0].pageTotle); 
    //   router.push({ name:'news', params:{id:now} })
    // }catch(eror){
    //   console.log('news',eror)
    //   // console.log(newsdata.value.length)
    // }
  }
  const onSubmit = (values)=>{
    // console.log(JSON.stringify(values, null, 2));
    // alert('修改成功，請重新登入')
    // router.push({name:'login'})
  }
  onMounted(()=>{
    // if(route.params.id){pageNow.value = route.params.id }
    // getData(pageNow.value)
    // console.log(props.title)
  })
</script>

<template>
  <div class="publicBaContent2">
    <div class="topTitle_fs24_fw600_coGreen_matb24">管理員_新增</div>
    <div class="formDiv">
      <v-form id="form" ref="form" v-slot="{ errors }"  @submit="onSubmit">
        <formimg id="img" text='管員圖片' class="_mab32" :errors="errors"/>
        <formemail id="account" text="管員帳號" class="_mab32" :errors="errors" />
        <formpassword id="password" text="管員密碼" class="_mab32" :errors="errors" />
        <forminput id="name" text="管員姓名" type="text" class="_mab32" :errors="errors" />
        <!-- <forminput id="phone" text="管員電話" type="number" class="_mab32" :errors="errors" /> -->
        <forminput id="release" text="管員狀態" type="text" class="_mab32" :errors="errors" />
        <formbutton :loadingShow="loadingShow" text="送出"/>
      </v-form>
    </div>
  </div>
</template>
<style scoped>
  [class^='publicBaContent2']{
    flex: 1 1;
    padding: 24px;
    background: #efefef;
  }
  [class^='publicBaContent2'] [class^='formDiv']{
    padding: 32px;
    background: #fff;
    user-select: none;
    border-radius: 6px;
    min-height: calc(100vh - 72px - 72px);
    display: flex;
  }
  [class^='publicBaContent2'] [class^='formDiv'] form{
    max-width: 640px;
    width: 100%;
    margin: auto;
  }
  [class^='publicBaContent2'] [class^='formDiv'] [class^='inputDiv']{
    flex-direction: row;
  }
  [class^='publicBaContent2'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='label']){
    flex: 0 0 130px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 16px;
    color: rgb(108, 117, 125);
  }
  /* [class^='publicBaContent2'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='input']){
    max-width: 600px;
  } */
  [class^='publicBaContent2'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='eye']){
    top: 6px
  }
  [class^='publicBaContent2'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='input'] input){
    padding: 8px 16px;
    border-radius: 0;
    border-color: #dee2e6;
  }
  [class^='publicBaContent2'] [class^='formDiv'] button{
    width: 90px;
    margin-left: 130px;
    padding:  12px 16px;
  }
</style>
