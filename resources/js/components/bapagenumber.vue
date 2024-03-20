<!-- 使用方式
import bapagenumber from '../components/bapagenumber.vue'
import { useRoute,useRouter } from 'vue-router'
const route = useRoute()
const router = useRouter()
const newsdata = ref([])
const pageNow =  ref(1)
const pageSize = ref(6)
const pageTotle = ref(6)
const getData = async(now)=>{
  try{
    const res = await getNewsDate(now)
    const data = res.data
    console.log(data)
    newsdata.value = data.list;
    pageNow.value = Number(now); 
    pageTotle.value = Number(data.pageTotle); 
    router.push({ name:'news', params:{id:now} })
  }catch(eror){
    console.log('news',eror)
    console.log(newsdata.value.length)
  }
}
onMounted(()=>{
  if(route.params.id){pageNow.value = route.params.id }
  getData(pageNow.value)
})
totle=>總頁 now=>當前頁 fn=>點擊觸發換頁
<bapagenumber :totle="pageTotle" :now="pageNow" :fn="getData"/> 
-->
<script setup>
  import {computed,ref} from 'vue';
  import { useRoute,useRouter } from 'vue-router'
  const props = defineProps({
    totle:{
      type: Number,
      // default: 6
    }, 
    now:{
      type: Number,
      // default: 1
    },
    fn:{
      type: Function, 
      default: ()=>{},
    }
  })
  const maxGap = 3; //顯示最多
  let minPage = 1;
  let maxPage = 1;
  const pageLists = ()=>{
    minPage = props.now>maxGap?props.totle-(props.now-maxGap+props.now-1)>maxGap?props.now-maxGap:(props.now-maxGap+props.now-1):1
    minPage = props.now>maxGap?(props.now-maxGap+1):1
    // minPage = (props.totle-minPage)<maxGap?
    maxPage = props.totle>(minPage+maxGap-1)?(minPage+maxGap-1):props.totle
    // maxPage = props.totle>maxGap?(minPage+maxGap-1)<props.totle?(minPage+maxGap-1):props.totle:props.totle
    // console.log('minPage',minPage,'maxPage',maxPage,'totle',props.totle,'now',props.now)
    let array = []
    for(let i= minPage;i<=maxPage;i++){
      array.push(Number(i))
    }
    // console.log('pageLists',array)
    // console.log('minPage',minPage,array,'maxPage',maxPage,'totle',props.totle,'now',props.now)
    return array;
    // return Array.from({ length: props.totle }, (_, index) => index + 1)
  }
  // console.log(props.totle,pageLists)
  const isActive = (number)=>number==props.now?'active':''
  const page = (number)=>{
    // console.log('now',props.now)
    // pageLists()
    props.fn(number)
  }
  const previous = ()=>{
    // console.log('now',props.now)
    let number = props.now
    if(props.now>1 && props.now<=props.totle){
      number = props.now-1;
    }
    // console.log(number)
    // pageLists()
    props.fn(number)
  }
  const next = ()=>{
    // console.log('now',props.now)
    let number = props.totle
    if(props.now<props.totle){
      number = props.now+1;
    }
    // console.log(number)
    // pageLists()
    props.fn(number)
  }
</script>
<template>
  <div class="bapagenumber" :class="props.totle>1?'active':''" v-if="props.totle>1">
    <ul>
      <!-- <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <router-link :to="{name:'news', params: { page: previous() }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
            <path d="M6 11L1.07071 6.07071C1.03166 6.03166 1.03166 5.96834 1.07071 5.92929L6 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </router-link>
      </li>
      <li 
        v-for="number in numbers" 
        :key="number"
      >
        <router-link 
          :to="{name:'news', params: { page: number }}"
          :class="isActive(number)"
        >{{ number }}</router-link>
      </li>
      <li>
        <router-link :to="{name:'news', params: { page: next() }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
          <path d="M1 11L5.92929 6.07071C5.96834 6.03166 5.96834 5.96834 5.92929 5.92929L1 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </router-link>
      </li> -->
      <li 
        v-show="props.now>1"
        class="previous"
      >
        <a @click="previous()">
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
            <path d="M6 11L1.07071 6.07071C1.03166 6.03166 1.03166 5.96834 1.07071 5.92929L6 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
          <p class="ph">上一頁</p>
        </a>
      </li>
      <li
        v-show="props.now>maxGap"
        class="number dot"
      >
        <a>...</a>
      </li>
      <li 
        v-for="(number,index) in pageLists()" 
        :key="index"
        class="number"
      >
        <a
          @click="page(number)"
          :class="isActive(number)"
        >{{ number }}</a>
      </li>
      <li
        v-show="props.now<props.totle"
        class="number dot"
      >
        <a>...</a>
      </li>
      <li 
        v-show="props.now<props.totle"
        class="next"
      >
        <a @click="next()">
          <p class="ph">下一頁</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
          <path d="M1 11L5.92929 6.07071C5.96834 6.03166 5.96834 5.96834 5.92929 5.92929L1 1" stroke="#212121" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </a>
      </li>
    </ul>
  </div>
</template>
<style scoped>
  .bapagenumber{
    display: none;
    justify-content: flex-end;
    user-select: none;
    margin-top: 24px;
  }
  .bapagenumber.active{
    display: flex;
  }
  .bapagenumber ul{
    display: flex;
  }
  .bapagenumber .ph{
    display: none;
  }
  .bapagenumber a{
    font-size: 15px;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgb(126 126 126);
    margin: 0 2px;
    border-radius: 50%;
    line-height: 36px;
  }
  .bapagenumber a:not(.dot):hover.active,
  .bapagenumber a.active{
    background: #277789;
    color: #fff;
  }
  .bapagenumber a:not(.dot):hover{
    background:#f5f5f5;
  }
  .bapagenumber a svg path {
    stroke: rgb(126 126 126);
  }
</style>
