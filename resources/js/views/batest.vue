<script setup>
  import banav from '../components/banav.vue'
  import baquery from '../components/baquery2.vue'
  import {onMounted,ref,watch} from 'vue'
  import { bamanager,bamanageradd,bamanageredit,bamanagereditpost,bamanagerdelete } from "../composables/useApi"
  const pagename = ref('batest')
  const nowtable = ref([
    {'en':'id','ch':'#','search':true,'add':false,'edit':false},
    {'en':'cover','ch':'圖片','search':false,'add':true,'edit':true,'id':'cover','size':'5','width':'200','height':'200','type':"jpg,png,jpeg"},
    {'en':'account','ch':'帳號','search':true,'add':true,'edit':true,'id':'account','type':"text"},
    {'en':'password','ch':'密碼','search':false,'add':true,'edit':false,'id':'password','type':"password"},
    {'en':'name','ch':'姓名','search':true,'add':true,'edit':true,'id':'name','type':"text"},
    {'en':'updated_at','ch':'更新時間','search':true,'add':false,'edit':false},
    {'en':'releases','ch':'狀態','search':true,'add':true,'edit':true,'id':'releases','type':"radio"},
    {'en':'edit','ch':'編輯','search':true,'add':false,'edit':false,'password':true},
  ])
  // onMounted(()=>console.log('onMounted'),startFn)
  // :class="route.meta.title"
</script>
<template>
  <div class="_dif" :class="pagename">
    <banav
    :pagename="pagename" 
    />
    <baquery 
    :pagename="pagename" 
    :keymodel="true"
    :nowtable="nowtable" 
    :searchApi="bamanager" 
    :addApi="bamanageradd" 
    :editApi="bamanageredit" 
    :editpostApi="bamanagereditpost" 
    :deletApi="bamanagerdelete" 
    />
  </div>
  
</template>
<style scoped>

</style>
<!-- v-if="route.meta.title==`${pagename}`"
:routemeta="route.meta" 
:searchFn="searchFn" 
:deletFn="deletFn" 
:data="nowdata" 
:inputdata="searchdata"
:keymodel="true" -->
