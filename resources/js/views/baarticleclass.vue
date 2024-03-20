<script setup>
  import banav from '../components/banav.vue'
  import baquery from '../components/baquery.vue'
  import baadd from '../components/baadd.vue'
  import { notify } from "@kyvg/vue3-notification";
  import {onMounted,ref,watch} from 'vue'
  import { baarticleclass,baarticleclassadd,baarticleclassedit,baarticleclasseditpost,baarticleclasssort,baarticleclassdelete } from "../composables/useApi"
  import { useRoute,useRouter } from 'vue-router'
  const route = useRoute()
  const router = useRouter()
  const pagename = ref('baarticleclass')
  const loadingShow = ref(false)
  const sort = ref('')
  const nowdata = ref([])
  const searchdata = ref([
    {'en':'id','ch':'#'},
    {'en':'sort','ch':'排序'},
    {'en':'class','ch':'類別名'},
    {'en':'updated_at','ch':'更新時間'},
    {'en':'releases','ch':'狀態'},
    {'en':'edit','ch':'編輯'},
  ])
  const adddata = ref([
    {'id':'sort','text':"排序",'type':"sort"},
    {'id':'class','text':"類別名",'type':"text"},
    {'id':'releases','text':"狀態",'type':"radio"},
  ])
  const editdata = ref([
    {'id':'sort','text':"排序",'type':"sort"},
    {'id':'class','text':"類別名",'type':"text"},
    {'id':'releases','text':"狀態",'type':"radio"},
  ])
  const searchFn = async(now=route.params.id)=>{
    console.log('searchFn')
    try{
      const result = await baarticleclass(now);
      if(result.status){
        nowdata.value = result; 
        //sort value
        sort.value = result.sortValue
        // adddata.value[1]['value'] = result.sortValue.toString()
        // console.log('searchFn',nowdata.value)
        router.push({ name: `${pagename.value}`, params:{id:result.pageNow} })
      }else{
        console.log('找不到資料')
      }
    }catch(eror){
      console.log('eror',eror)
      router.push({name:'balogin'})
    }
  }
  const sortFn = async()=>{
    // console.log('sortFn')
    try{
      const result = await baarticleclasssort();
      if(result.status){
        sort.value = result.sortValue
      }else{
        console.log('找不到資料')
      }
    }catch(eror){
      console.log('eror',eror)
      router.push({name:'balogin'})
    }
  }
  const addFn = async(values,actions)=>{
    //送出表單
    try{
      loadingShow.value = true
      const result = await baarticleclassadd(values);
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
      const result = await baarticleclasseditpost(id,values);
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
      console.log(`${pagename.value}-editFn`,eror)
    }
  }
  const editFn = async()=>{
    try{
      const id = route.params.id
      const result = await baarticleclassedit(id);
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
        // console.log(editdata.value)
      }else{
        notify({title: '錯誤找不到資料請重新操作'});
        router.push({ name:`${pagename.value}`, params:{id:1} })
      }
    }catch(eror){
      console.log(`${pagename.value}-editFn`,eror)
    }
  }
  const deletFn = async(id,searchfn,cancelfn) => {
    try{
      loadingShow.value = true
      const result = await baarticleclassdelete(id);
      loadingShow.value = false
      if(result.status){
        notify({title: "刪除成功"});
        // props.fn(route.params.id)
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
  const startFn = async()=>{
    console.log('startFn-85',route.meta.title);
    if(route.meta.title==pagename.value){
      console.log('search')
      await searchFn()
    }else if(route.meta.title==`${pagename.value}add`){
      console.log('add')
      await sortFn()
    }else if(route.meta.title==`${pagename.value}edit`){
      console.log('edit')
      await editFn()
    }else{
    }
  }
  watch(
    () => route.meta.title,
    () => {
      console.log('watch')
      startFn()
    },
    { immediate: true }
  );
  // onMounted(()=>{
  //   console.log(route.meta.title,`${pagename.value}`,route.meta.title==`${pagename.value}`)
  // })
</script>
<template>
  <div class="_dif" :class="route.meta.title">
    <banav
    :pagename="pagename" 
    />
    <baquery 
    v-if="route.meta.title==`${pagename}`"
    :routemeta="route.meta" 
    :searchFn="searchFn" 
    :deletFn="deletFn" 
    :data="nowdata" 
    :inputdata="searchdata"
    :keymodel="false"
    :deletemodel="false"
    />
    <baadd
    v-if="route.meta.title==`${pagename}add`"
    :routemeta="route.meta" 
    :inputdata="adddata"
    :sort="sort"
    :loadingShow="loadingShow"
    :fn="addFn" 
    />
    <baadd
    v-if="route.meta.title==`${pagename}edit`"
    :routemeta="route.meta" 
    :inputdata="editdata"
    :loadingShow="loadingShow"
    :fn="editpostFn" 
    />
  </div>
</template>
<style scoped>
  :deep([class^='baquery'] [class^='tableTitle'] .editDiv),
  :deep([class^='baquery'] [class^='tableContent'] .editDiv){
    flex: 0 0 55px;
  }
</style>