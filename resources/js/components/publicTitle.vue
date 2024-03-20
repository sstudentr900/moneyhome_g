<script setup>
  import {onMounted,ref} from 'vue'
  import {useRouter,useRoute} from 'vue-router'
  import bauser from '../store/bauser'
  const props = defineProps({
    LoginShowMenu:{
      type: Boolean,
      default: false
    }
  })
  //route
  const route = useRoute()
  const router = useRouter()
  const matched = route.matched
  const json = matched.filter(item=>item.meta.title)//要有meta才跑麵包
  // console.log(matched,json)
  //登出
  const logout = ()=>{
    // console.log('logout')
    const bauserstore = bauser()
    bauserstore.useLogout()
    //redirect登出帶登入跳轉頁面
    console.log('登出redirect',route.path)
    router.push({name:'login',query:{redirect:route.path}})
  }

  onMounted(()=>{
  })
</script>
<template>
  <div class="publichyperlink_coGray900_text14_mab16_dif_aic_jcs">
    <div class="bread_dif">
      <div class="_dif" v-for="(item,index) in json" :key="index" >
        <router-link :to="{ name: item.name }">{{ item.meta.title_ch }}</router-link>
        <div class="icon_pal8_par8" v-if="(json.length-1)!=index">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="6"
            height="12"
            viewBox="0 0 7 12"
            fill="none"
          >
            <path
              d="M1 11L5.92929 6.07071C5.96834 6.03166 5.96834 5.96834 5.92929 5.92929L1 1"
              stroke="#A4A4A4"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
        </div>
      </div>
    </div>
    <div class="_dif" v-if="LoginShowMenu">
      <!-- 登入顯示 -->
      <a class="_mar6_mal6" @click="logout">登出</a>
      <router-link :to="{ name: 'forget' }" class="_mar6_mal6">修改密碼</router-link>
      <router-link :to="{ name: 'info' }" class="_mar6_mal6">個人資訊</router-link>
      <router-link :to="{ name: 'order' }" class="_mar6_mal6">訂單查詢</router-link>
      <router-link :to="{ name: 'collect' }" class="_mar6_mal6">我的收藏</router-link>
    </div>
  </div>
  <div class="_title3">
    <p>{{json.at(-1).meta.title}}</p>
    <span>{{json.at(-1).meta.title_ch}}</span>
  </div>
</template>
<style scoped>
  [class*='_title3']{
    color: #212121;
    font-size: 36px;
    font-weight: 400;
    letter-spacing: 2px;
    padding-bottom: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #212121;
    display: inline-flex;
    align-items: end;
    font-family: 'Noto Serif TC','Noto Sans TC',serif;
  }
  [class*='_title3'] span{
    font-size: 18px;
    margin-left: 16px;
    font-family: 'Noto Sans TC','Noto Serif TC',serif;
  }
</style>
