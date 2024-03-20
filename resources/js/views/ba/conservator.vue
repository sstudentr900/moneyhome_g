<script setup>
  import baquery from './components/baquery.vue'
  import baadd from './components/baadd.vue'
  import { notify } from "@kyvg/vue3-notification";
  import {onMounted,ref,watch} from 'vue'
  import { useRoute,useRouter } from 'vue-router'
  import { bamanager,bamanageradd,bamanageredit,bamanagereditpost,bamanagerdelete } from "../../composables/useApi"
  const route = useRoute()
  const router = useRouter()
  const pagename = ref('baconservator')
  const loadingShow = ref(false)
  const sort = ref('')
  const nowdata = ref({})
  const searchdata = ref([
    {'en':'id','ch':'#','search':true,'add':false,'edit':false},
    // {'en':'cover','ch':'圖片','search':false,'add':true,'edit':true},
    {'en':'account','ch':'帳號','search':true,'add':true,'edit':true},
    // {'en':'password','ch':'密碼','search':false,'add':true,'edit':true},
    {'en':'name','ch':'姓名'},
    // {'en':'phone','ch':'電話','search':false,'add':true,'edit':true},
    {'en':'updated_at','ch':'更新時間','search':false,'edit':false},
    {'en':'releases','ch':'狀態','search':true,'add':true,'edit':true},
    {'en':'edit','ch':'編輯','search':true,'add':false,'edit':false,'password':true},
  ])
  const adddata = ref([
    {'id':'cover','size':'5','width':'200','height':'200','type':"jpg,png,jpeg",'text':'圖片'},
    {'id':'account','text':"帳號",'type':"text"},
    {'id':'password','text':"密碼",'type':"password"},
    {'id':'name','text':"姓名",'type':"text"},
    {'id':'releases','text':"狀態",'type':"radio"},
  ])
  const editdata = ref([
    {'id':'cover','size':'5','width':'200','height':'200','type':"jpg,png,jpeg",'text':'圖片'},
    {'id':'account','text':"帳號",'type':"text"},
    {'id':'name','text':"姓名",'type':"text"},
    {'id':'releases','text':"狀態",'type':"radio"},
  ])
  const searchFn = async(now=route.params.id)=>{
    try{
      const result = await bamanager(now);
      if(result.status){
        nowdata.value = result; 
        // console.log('searchFn',adddata.value,editdata.value)
        router.push({ name: `${pagename.value}`, params:{id:result.pageNow} })
      }else{
        console.log('找不到資料')
      }
    }catch(error){
      console.log('bamanager error',error)
      notify({title: error});
      router.push({name:'balogin'})
    }
  }
  const addFn = async(values,actions)=>{
    //送出表單
    try{
      loadingShow.value = true
      const result = await bamanageradd(values);
      loadingShow.value = false
      if(result.status){
        notify({title: result.message});
        // 成功去管員
        router.push({name:`${pagename.value}`, params:{id:1}})
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
      console.log(`${pagename.value}-addFn`,eror)
    }
  }
  const editpostFn = async(values,actions)=>{
    //送出表單
    try{
      const id = route.params.id
      loadingShow.value = true
      // editdata.value = adddata.value; 
      // console.log('editpostFn',adddata.value,editdata.value)
      const result = await bamanagereditpost(id,values);
      loadingShow.value = false
      if(result.status){
        notify({title: result.message});
        // 成功去管員
        router.push({name:`${pagename.value}`, params:{id:1}})
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
      console.log(`${pagename.value}-editpostFn`,eror)
    }
  }
  const editFn = async()=>{
    try{
      const id = route.params.id
      // editdata.value = adddata.value; 
      console.log('editFn',adddata.value,editdata.value)
      const result = await bamanageredit(id);
      // console.log('61',result,now);
      if(result.status){
        editdata.value.forEach((item)=>{
          Object.entries(result.datas).forEach((data) => {
            if(item.id == data[0]){
              // console.log(data)
              item.value = data[1]
            }
          })
        })
      }else{
        notify({title: '錯誤找不到資料請重新操作'});
        router.push({ name:`${pagename.value}`, params:{id:1} })
      }
    }catch(eror){
      console.log(`${pagename.value}-editFn`,eror)
    }
  }
  const deletFn = async(id,searchfn,cancelfn) => {
    // console.log('deletFn')
    try{
      loadingShow.value = true
      const result = await bamanagerdelete(id);
      loadingShow.value = false
      if(result.status){
        notify({title: "刪除成功"});
        // props.fn(route.params.id)
        // console.log(route.params.id)
        searchfn(route.params.id)
      }else{
        notify({title:"刪除失敗",text:result.message});
      }
      cancelfn()
    }catch(eror){
      console.log('badelete:請求失敗',eror)
      notify({title: eror});
      cancelfn()
    }
  }
  const sortFn = async()=>{
    // console.log('sortFn')
    // try{
    //   const result = await baarticleclasssort();
    //   if(result.status){
    //     sort.value = result.sortValue
    //   }else{
    //     console.log('找不到資料')
    //   }
    // }catch(eror){
    //   console.log('eror',eror)
    //   router.push({name:'balogin'})
    // }
  }
  const assortFn = async()=>{
    // console.log('assortFn')
    // try{
    //   const result = await baarticleassort();
    //   if(result.status){
    //     console.log(result.datas)
    //     assort.value = result.datas
    //   }else{
    //     console.log('找不到資料')
    //   }
    // }catch(eror){
    //   console.log('eror',eror)
    //   router.push({name:'balogin'})
    // }
  }
  const startFn = async()=>{
    //當頁名
    // pagename.value = route.meta.title

    //移除編輯value
    editdata.value.forEach((item)=>{
      item.value = ''
    })
    if(route.meta.title==pagename.value){
      await searchFn();
    // }else if(route.meta.title==`${pagename.value}add`){
    //   await sortFn()
    }else if(route.meta.title==`${pagename.value}edit`){
      await editFn();
    }
  };
  watch(
    () => route.meta.title,
    () => {
      // console.log('watch')
      startFn()
    },
    { immediate: true }
  );
  // onMounted(()=>console.log('onMounted'),startFn)

</script>
<template>
  <baquery 
  v-if="route.meta.title==`${pagename}`"
  :searchFn="searchFn" 
  :deletFn="deletFn" 
  :inputdata="searchdata"
  :data="nowdata" 
  :keymodel="true"
  />
  <baadd
  v-if="route.meta.title==`${pagename}add`"
  :inputdata="adddata"
  :loadingShow="loadingShow"
  :fn="addFn" 
  />
  <baadd
  v-if="route.meta.title==`${pagename}edit`"
  :inputdata="editdata"
  :loadingShow="loadingShow"
  :fn="editpostFn" 
  />
</template>
<style scoped>
</style>