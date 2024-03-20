<script setup>
  import publicTitle from '../components/publicTitle.vue'
  import fnpagenumber from '../components/fnpagenumber.vue'
  import { getNewsDate } from "../composables/useApi";
  import request from "../composables/useRequest";
  import axios from 'axios'
  import {onMounted,ref} from 'vue'
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
      // console.log(data)
      newsdata.value = data.list;
      pageNow.value = Number(now); 
      pageTotle.value = Number(data.pageTotle); 
      router.push({ name:'news', params:{id:now} })
    }catch(eror){
      console.log('news',eror)
      // console.log(newsdata.value.length)
    }
  }
  // const getData = async(now)=>{
  //   try{
  //     const res = await request.get(`/news`,{ params: { id: now }})
  //     const data = res.data
  //     // console.log(data)
  //     newsdata.value = data; 
  //     pageNow.value = Number(data[0].pageNow); 
  //     pageTotle.value = Number(data[0].pageTotle); 
  //     router.push({ name:'news', params:{id:now} })
  //   }catch(eror){
  //     console.log('news',eror)
  //     // console.log(newsdata.value.length)
  //   }
  // }
  // const getData = async(now)=>{
  //   try{
  //     const res = await axios.get(`/api/news`, { params: { id: now } })
  //     const data = res.data.data
  //     // console.log(data)
  //     newsdata.value = data; 
  //     pageNow.value = Number(data[0].pageNow); 
  //     pageTotle.value = Number(data[0].pageTotle); 
  //     router.push({ name:'news', params:{id:now} })
  //   }catch(eror){
  //     console.log('news',eror)
  //     // console.log(newsdata.value.length)
  //   }
  // }
  onMounted(()=>{
    if(route.params.id){pageNow.value = route.params.id }
    getData(pageNow.value)
  })
</script>

<template>
  <!-- <publicNav/> -->
  <div class="news_bgGray200_patb140_pageMh">
    <div class="_mw980">
      <publicTitle/>
      <div class="newsContent" v-if="newsdata.length===0">
        <div class="_fs32_tac_pa48_mat48">找不到資料...</div>
      </div>
      <div class="newsContent" v-else>
        <div class="items">
          <!-- <div class="item_dif_gap32">
            <div class="img_wi40"><img class="_fluid" src="@img/home_new1.png" alt=""></div>
            <div class="textDiv_wi60">
              <div class="title_dif_aic">
                <div class="date_text24_coGray900_mar8">2023.10.30</div>
                <div class="icon_btn_noho_coGray900_bgTran_bc900_pat3b6">優惠活動</div>
              </div>
              <div class="text_text18_coGray900_ellipsis1">OAO優惠活動標題文字文字文字文字文字文字</div>
              <hr class="_matb8">
              <div class="text_text16_coGray900_ellipsis2">
                優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優惠內容說明優...
              </div>
              <a class="more_text16_ls2_coGray900_mat8">
                SEE ALL...
              </a>
            </div>
          </div>
          <hr class="_matb32_op02"> -->
          <div class="item" v-for="(data,index) in newsdata" :key='index'>
            <div class="_dif_gap32">
              <div class="img_wi40">
                <img class="_cover" :src="data.img" @error.once="$defaultImage($event,'home_new1.png')">
              </div>
              <div class="textDiv_wi60">
                <div class="title_dif_aic">
                  <div class="date_fs24_fw400_coGray900_mar8">{{data.date}}</div>
                  <div class="icon_btn_noho_coGray900_bgTran_bcGray900_pat3b6">{{data.activity}}</div>
                </div>
                <div class="text_text18_coGray900_ellipsis1">{{data.title}}</div>
                <hr class="_matb8">
                <div class="text_text16_coGray900_ellipsis2">{{data.text}}</div>
                <router-link class="more_text16_ls2_coGray900_mat8" :to="{ name:'news_read', params:{id:data.id}}">
                  SEE ALL...
                </router-link>
              </div>
            </div>
            <hr class="_matb32_op02" v-if="index!=newsdata.length-1">
          </div>
        </div>
        <fnpagenumber :totle="pageTotle" :now="pageNow" :fn="getData"/>
      </div>
    </div>
  </div>
  <!-- <publicFooter/> -->
</template>

<style scoped>
  @media (max-width: 820px){
    [class^='item']{
      max-width: 480px;
      margin: auto;
    }
    [class^='item']>[class^='_dif']{
      flex-direction: column;
      gap: 16px
    }
    [class^='item']>[class^='_dif']>div{
      width: 100%;
    }
  }
</style>
