<script setup>
  import bapagenumber from './bapagenumber.vue'
  import bakey from './bakey.vue'
  import badelete from './badelete.vue'
  import {onMounted,ref} from 'vue'
  const props = defineProps({
    fn:{
      type: Function, 
      default: ()=>{},
      // required: true
    },
    searchFn:{
      type: Function, 
      default: ()=>{},
      required: true
    },
    deletFn:{
      type: Function, 
      default: ()=>{},
      required: true
    },
    data:{
      type: Object, 
      required: true
    },
    inputdata:{
      type: Array, 
      required: true
    },
    keymodel:{
      type: Boolean, 
      default: false
    },
    deletemodel:{
      type: Boolean, 
      default: true
    }
  })
  const passwordshow = ref(false)
  const passwordid = ref(1)
  const deleteshow = ref(false)
  const deleteid = ref(1)
  const deleteFn = (id)=>{
    // console.log('deleteFn',id)
    deleteshow.value = true
    deleteid.value = id
  }
  const passwordFn = (id)=>{
    // console.log('passwordFn',id)
    passwordshow.value = true
    passwordid.value = id
  }
  // onMounted(()=>{
  //   console.log('52',props.pageTotle,props.pageNow,props.fn)
  // })
</script>

<template>
  <div class="baquery">
    <div class="topTitle_fs24_fw600_coGreen_matb24">{{ $route.meta.title_ch }}</div>
    <div class="tableDiv">
      <div class="tableControl_dif_mab24">
        <div class="links">
          <router-link :to="{name:`${$route.meta.title}add`}" class="add">
            <svg viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"></path></svg>
            新增
          </router-link>
        </div>
      </div>
      <!-- <div class="tableTitle_dif_aic">
        <div class="idDiv"><p>#</p></div>
        <div class="accountDiv"><p>帳號</p></div>
        <div class="nameDiv"><p>姓名</p></div>
        <div class="updated_atDiv"><p>更新時間</p></div>
        <div class="releasesDiv"><p>狀態</p></div>
        <div class="editDiv"><p>編輯</p></div>
      </div>
      <div class="tableContent_dif_aic">
        <div class="idDiv"><p>24</p></div>
        <div class="accountDiv"><p>ning118230@gmail.com</p></div>
        <div class="nameDiv"><p>姓名</p></div>
        <div class="updatedDiv"><p>2023-10-17 10:23:51</p></div>
        <div class="releaseDiv"><p class="markDiv">使用</p></div>
        <div class="modifyDiv">
          <router-link :to="{name:'bamanageredit'}" class="edit">
            <svg viewBox="0 0 24 24">
              <path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"></path>
            </svg>
          </router-link>
          <a href="#">
            <svg viewBox="0 0 24 24">
              <path d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"></path>
            </svg>
          </a>
          <a href="#">
            <svg viewBox="0 0 24 24">
              <path d="M19 24h-14c-1.104 0-2-.896-2-2v-17h-1v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2h-1v17c0 1.104-.896 2-2 2zm0-19h-14v16.5c0 .276.224.5.5.5h13c.276 0 .5-.224.5-.5v-16.5zm-9 4c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm-2-7h-4v1h4v-1z"></path>
            </svg>
          </a>
        </div>
      </div> -->
      <div class="tableTitle_dif_aic">
        <div v-for="(item, index) in props.inputdata" :key="index" :class="`${item.en}Div`"><div><p>{{item.ch}}</p></div></div>
      </div>
      <div class="tableContent_dif_aic" v-for="(item, index) in props.data.datas" :key="index">
        <div v-for="(item1, index1) in props.inputdata" :key="index1" :class="`${item1.en}Div`">
          <div v-if="item1.en=='id'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='sort'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='title'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='account'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='name'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='class'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='updated_at'">
            <p>{{ item[item1.en] }}</p>
          </div>
          <div v-else-if="item1.en=='releases'">
            <p class="markDiv" v-if="item[item1.en]=='y'">使用</p>
            <p class="markDiv disable" v-else>停用</p>
          </div>
          <div class='_dif' v-else-if="item1.en=='edit'">
            <router-link :to="{name:`${$route.meta.title}edit`,params:{id:item.id}}" class="edit">
              <svg viewBox="0 0 24 24">
                <path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"></path>
              </svg>
            </router-link>
            <a @click="passwordFn(item.id)" v-if="keymodel">
              <svg viewBox="0 0 24 24">
                <path d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"></path>
              </svg>
            </a>
            <a @click="deleteFn(item.id)" v-if="deletemodel">
              <svg viewBox="0 0 24 24">
                <path d="M19 24h-14c-1.104 0-2-.896-2-2v-17h-1v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2h-1v17c0 1.104-.896 2-2 2zm0-19h-14v16.5c0 .276.224.5.5.5h13c.276 0 .5-.224.5-.5v-16.5zm-9 4c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm-2-7h-4v1h4v-1z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <bapagenumber :totle="props.data.pageTotle" :now="Number(props.data.pageNow)" :fn="props.searchFn"/>
    </div>
  </div>
  <bakey v-model:show="passwordshow" :id="passwordid" :url="$route.meta.title" v-if="keymodel"/>
  <badelete v-model:show="deleteshow" :id="deleteid" :url="$route.meta.title" :searchFn="props.searchFn" :deletFn="props.deletFn"/>
</template>
<style scoped>
  [class^='baquery']{
    flex: 1 1;
    padding: 24px;
    background: #efefef;
  }
  [class^='baquery'] [class^='tableDiv']{
    padding: 24px 24px 40px;
    background: #fff;
    user-select: none;
    border-radius: 6px;
    min-height: calc(100vh - 72px - 72px);
  }
  [class^='baquery'] [class^='tableControl'] [class^='add']{
    border-radius: 3px;
    cursor: pointer;
    display: flex;
    padding: 12px 16px;
    color: #fff;
    background-color: rgb(39 119 137);
  }
  [class^='baquery'] [class^='tableControl'] [class^='add'] svg{
    width: 12px;
    height: auto;
    fill: #fff;
    margin-right: 8px;
  }
  [class^='baquery'] [class^='tableControl'] [class^='add']:hover{
    box-shadow: rgb(39 119 137 / 50%) 0px 5px 15px;
  }
  [class^='baquery'] [class^='tableTitle'],
  [class^='baquery'] [class^='tableContent']{
    border: 1px solid #dee2e6;
    padding: 0 16px;
  }
  [class^='baquery'] [class^='tableTitle']{
    background: #f5f5f5;
  }
  [class^='baquery'] [class^='tableContent']{
    border-top: none;
  }
  [class^='baquery'] [class^='tableTitle']>div,
  [class^='baquery'] [class^='tableContent']>div{
    padding: 16px 12px;
    flex: 1 1;
    display: flex;
    word-break: break-all;
  }
  [class^='baquery'] [class^='tableContent']>div{
    padding: 24px 12px;
  }
  [class^='baquery'] [class^='tableTitle'] p,
  [class^='baquery'] [class^='tableContent'] p{
    font-size: 15px;
    line-height: 1.2;
  }
  [class^='baquery'] [class^='tableTitle'] p{
    font-weight: 600;
    color: rgb(49, 58, 70);
  }
  [class^='baquery'] [class^='tableContent'] p{
    font-weight: 400;
    color: rgb(108, 117, 125);
  }
  [class^='baquery'] [class^='tableTitle'] .idDiv,
  [class^='baquery'] [class^='tableContent'] .idDiv{
    flex: 0 0 60px;
    /* justify-content: center; */
  }
  [class^='baquery'] [class^='tableTitle'] .sortDiv,
  [class^='baquery'] [class^='tableContent'] .sortDiv{
    flex: 0 0 60px;
    /* justify-content: center; */
  }
  [class^='baquery'] [class^='tableTitle'] .nameDiv,
  [class^='baquery'] [class^='tableContent'] .nameDiv{
    flex: 0 0 120px;
    /* justify-content: center; */
  }
  [class^='baquery'] [class^='tableTitle'] .updated_atDiv,
  [class^='baquery'] [class^='tableContent'] .updated_atDiv{
    flex: 0 0 200px;
  }
  [class^='baquery'] [class^='tableTitle'] .releasesDiv,
  [class^='baquery'] [class^='tableContent'] .releasesDiv{
    flex: 0 0 80px;
  }
  [class^='baquery'] [class^='tableContent'] .markDiv{
    padding: 3px 6px;
    background: rgb(39 119 137);
    color: #fff;
    border-radius: 3px;
    font-size: 12px;
  }
  [class^='baquery'] [class^='tableContent'] .markDiv.disable{
    background: rgb(250, 92, 124);
  }
  [class^='baquery'] [class^='tableTitle'] .editDiv,
  [class^='baquery'] [class^='tableContent'] .editDiv{
    flex: 0 0 110px;
  }
  [class^='baquery'] [class^='tableContent'] .editDiv a{
    padding: 0 6px;
    opacity: .5;
  }
  [class^='baquery'] [class^='tableContent'] .editDiv a svg{
    width: 16px;
    height: auto;
    fill: black;
  }
  [class^='baquery'] [class^='tableContent'] .editDiv a:hover{
    opacity: 1;
  }
</style>
