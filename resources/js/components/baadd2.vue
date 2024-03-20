<script setup>
  import formselect from '../components/formselect.vue'
  import formnumber from '../components/formnumber.vue'
  import formcontent from '../components/formcontent.vue'
  import formtinymce from '../components/formtinymce.vue'
  import forminput from '../components/forminput.vue'
  import formpassword from '../components/formpassword.vue'
  import formemail from '../components/formemail.vue'
  import formimg from '../components/formimg.vue'
  import formreleases from '../components/formreleases.vue'
  import formbutton from '../components/formbutton.vue'
  import {defineExpose,onMounted ,ref } from 'vue'
  const props = defineProps({
    loadingShow:{
      type: Boolean, 
      // required: true
    },
    routemeta:{
      type: Object, 
      // required: true
    },
    sort:{
      default: ''
      // required: true
    },
    assort:{
      type: Array, 
      //  default: ''
      // required: true
    },
    editdata:{
      type: Array,
      // required: true
      // default: 1
    },
    inputdata:{
      type: Array,
      // required: true
      // default: 1
    },
    nowtable:{
      type: Array,
      // required: true
      // default: 1
    },
    fn:{
      type: Function, 
      // required: true
      // default: ()=>{},
    },
    seadFn:{
      type: Function, 
      // required: true
      // default: ()=>{},
    }
  })
  const visible = ref(false)
  const open = (row,editdata)=>{
    // visible.value = true
    // row = JSON.parse(JSON.stringify(row))
    // editdata = JSON.parse(JSON.stringify(editdata))
    // console.log('50',row,editdata)
    // editdata.forEach((item)=>{
    //   // console.log('52',item)
    //   Object.entries(row).forEach((data) => {
    //     if(item.id == data[0]){
    //       // console.log(data)
    //       item.value = data[1]
    //     }
    //   })
    // })
    // console.log('59',editdata)
    // console.log(row)
  }
  defineExpose({
    // open,
    // visible
  })
</script>

<template>
  <!-- <div class="baadd" v-show="visible"> -->
  <div class="baadd">
    <div class="topTitle_fs24_fw600_coGreen_matb24">編輯</div>
    <div class="formDiv">
      <v-form id="form2" ref="form" v-slot="{ errors }"  @submit="props.seadFn">
        <div v-for="(item, index) in props.nowtable" :key="index">
          <formimg v-if="item.add && item.id=='cover'" :id="item.id" :size='item.size' :width='item.width' :height='item.height' :type='item.type' :text='item.ch' :value='item.value' class="_mab32" :errors="errors"/>
          <formemail v-else-if="item.add && item.id=='account'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formpassword v-else-if="item.add && item.id=='password'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formnumber v-else-if="item.add && item.id=='sort'" :id="item.id" :text='item.ch' :value='props.sort?props.sort:item.value' class="_mab32" :errors="errors" />
          <formnumber v-else-if="item.add && item.id=='price'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formselect v-else-if="item.add && item.id=='assort'" :id="item.id" :text='item.ch' :options='props.assort?props.assort:""' :value='item.value' class="_mab32" :errors="errors" />
          <forminput v-else-if="item.add && item.id=='name'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <forminput v-else-if="item.add && item.id=='class'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <forminput v-else-if="item.add && item.id=='title'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formcontent v-else-if="item.add && item.id=='content'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formtinymce v-else-if="item.add && item.id=='tinymce'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
          <formreleases v-else-if="item.add && item.id=='releases'" :id="item.id" :text='item.ch' :value='item.value' class="_mab32" :errors="errors" />
        </div>
        <formbutton :loadingShow="props.loadingShow" text="送出"/> 
      </v-form>
    </div>
  </div>
</template>
<style scoped>
  [class^='baadd']{
    flex: 1 1;
    padding: 24px;
    background: #efefef;
  }
  [class^='baadd'] [class^='formDiv']{
    padding: 64px 32px;
    background: #fff;
    user-select: none;
    border-radius: 6px;
    min-height: calc(100vh - 104px - 72px);
    display: flex;
  }
  [class^='baadd'] [class^='formDiv'] form{
    max-width: 1080px;
    padding-right: 80px;
    width: 100%;
    margin: auto;
  }
  [class^='baadd'] [class^='formDiv'] [class^='inputDiv']{
    flex-direction: row;
  }
  [class^='baadd'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='label']){
    flex: 0 0 130px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 16px;
    color: rgb(108, 117, 125);
  }
  [class^='baadd'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='eye']){
    top: 7px
  }
  [class^='baadd'] [class^='formDiv'] [class^='inputDiv'] :deep([class^='input'] input){
    padding: 8px 16px;
    border-radius: 0;
    border-color: #dee2e6;
  }
  [class^='baadd'] [class^='formDiv'] button{
    width: 120px;
    margin-left: 130px;
    padding:  12px 16px;
  }
  [class^='baadd'] [class^='formDiv'] :deep(textarea){
    min-height: 120px;
  }
  [class^='baadd'] [class^='formDiv'] :deep(.tox-tinymce){
    border: 1px solid #dee2e6;
    border-radius: 0;
  }
</style>
