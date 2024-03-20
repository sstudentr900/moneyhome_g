<script setup>
  import fnnav from '../components/fnnav.vue'
  import fnbread from '../components/fnbread.vue'
  import fnarticleclass from '../components/fnarticleclass.vue'
  import fnarticlenew from '../components/fnarticlenew.vue'
  import fnpagenumber from '../components/fnpagenumber.vue'
  import publicFooter from '../components/publicFooter.vue'
  import { fnarticle } from "../composables/useApi"
  import {watch,onMounted,ref} from 'vue'
  import { useRoute,useRouter } from 'vue-router'
  import AOS from 'aos'
  import 'aos/dist/aos.css'
  const route = useRoute()
  const router = useRouter()
  const nowdata = ref([])
  const articleClassDatas = ref([])
  const articleNewDatas = ref([])
  const pageNow =  ref(1)
  const pageSize = ref(6)
  const pageTotle = ref(0)
  const bread = ref([])
  const nowClassName = ref('')
  const title = ref('')
  const getData = async(pagenow=route.params.pagenow)=>{
    // console.log('fnknowledge 25',route.params.category,pagenow)
    const breadArray=[]
    const category=route.params.category
    try{
      const result = await fnarticle(category,pagenow)
      if(result.status){
        nowdata.value = result.datas;
        articleClassDatas.value = result.articleClassDatas;
        articleNewDatas.value = result.articleNewDatas;
        nowClassName.value = result.nowClassName
        pageNow.value = Number(result.pageNow); 
        pageTotle.value = Number(result.pageTotle); 
        breadArray.push({name:'首頁',to:{name:'fnhome'} })
        if(category!=99){
          breadArray.push({ name:'債務知識543',to:{name:'fnknowledge',params:{category:category,pagenow:pagenow}}  })
          title.value = '債務知識543'
        }
        if(category==99){
          title.value = result.nowClassName
        }
        breadArray.push({ name:result.nowClassName,to:{name:'fnknowledge',params:{category:category,pagenow:pagenow}} })
        bread.value = breadArray
        // console.log('fnknowledge 45',bread.value)
        router.push({ name:'fnknowledge', params:{category:category,pagenow:pagenow} })
        AOS.init()
      }else{
        console.log('找不到資料')
      }
    }catch(error){
      console.log('fnknowledge',error)
      // console.log(newsdata.value.length)
    }
  }
  const pagenumberFn = (number)=>{
    router.push({ 
      name:'fnknowledge', 
      params:{
        category:route.params.category,
        pagenow:number
      } 
    })
  }
  watch(
    () => route.path,
    () => {
      console.log('fnknowledge watch')
      getData()
    },
    { immediate: true }
  );
  // onMounted(()=>{
  //   getData()
  // })
</script>
<template>
  <div class="fnknowledge_bgFAFAFA">
    <fnnav class="style2"/>
    <div class="_mw1340">
      <div class="_patb140_dif_jcs" v-if="articleNewDatas[0]">
        <div class="fnknowledgeLeft_fl1_par32">
          <fnbread :arrays="bread"/>
          <div class="fnknowledgeTitle_fs40_coGray900_fw800_mab48">{{ title }}</div>
          <div class="itemsdiv">
            <div class="items" v-for="(item,index) in nowdata" :key="index">
              <div class="item_dif">
                <div class="img_fl0">
                  <img class="_fluid" :src="$getSrc(item.cover)"/>
                </div>
                <div class="textDiv_palr24_fl1">
                  <div class="icon_fs14_fw400_coWhite_patb4_palr16_bgGreen_br100_mab16_dii">{{nowClassName}}</div>
                  <div class="title_fs32_fw600_co212121_ellipsis1_lh12_mab8">{{item.title}}</div>
                  <!-- <hr class="_matb16"> -->
                  <div class="text_fs16_fw400_co747474_ellipsis3_mab16_lh14">{{item.content}}</div>
                  <router-link class="link_fs16_fw400_co212121_tdu_lh12" :to="{ name:'fnknowledgemore',params:{id:item.id} }">
                    立即瀏覽
                  </router-link>
                </div>
              </div>
              <hr class="_matb48_op02">
              <!-- <div class="item_dif">
                <div class="img_fl0">
                  <img class="_fluid" :src="$getSrc('knowledge_item01.png')"/>
                </div>
                <div class="textDiv_palr24_fl1">
                  <div class="icon_fs14_fw400_coWhite_patb4_palr16_bgGreen_br100_mab8_dii">相關案例</div>
                  <div class="title_fs32_fw400_co212121_ellipsis1_lh12">標題文字文字文字文字</div>
                  <hr class="_matb16">
                  <div class="text_fs16_fw400_co747474_ellipsis3_mab16_lh14">內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文...</div>
                  <router-link class="link_fs16_fw400_co212121_tdu_lh12" :to="{ name:'fnknowledgemore', params:{id:1} }">
                    立即瀏覽
                  </router-link>
                </div>
              </div>
              <hr class="_matb48_op03"> -->
            </div>
          </div>
          <fnpagenumber :totle="pageTotle" :now="pageNow" :fn="pagenumberFn"/>
        </div>
        <div class="fnknowledgeRight_fl0"> 
          <fnarticleclass :data="articleClassDatas"/>
          <fnarticlenew :data="articleNewDatas"/>
        </div>
      </div>
    </div>
    <publicFooter/>
  </div>
</template>

<style scoped>
  [class^="fnknowledge"] [class^="_mw1340"]{
    min-height: 100vh;
  }
  [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="item"] [class^="img"]{
    flex-basis: 300px;
  }
  [class^="fnknowledge"] [class^="fnknowledgeRight"] {
    flex-basis: 260px;
    margin-top: 90px;
  }
  @media (max-width: 1200px){
    [class^="fnknowledge"] [class^="fnknowledgeRight"] {
      flex-basis: 200px;
    }
  }
  @media (max-width: 1020px){
    [class^="fnknowledge"] [class^="_mw1340"] [class^="_patb140"]{
      padding-top: 120px ;
      padding-bottom: 120px ;
    }
    [class^="fnknowledge"] [class^="fnknowledgeTitle"]{
      margin-bottom: 24px;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="item"]{
      flex-direction: column;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="item"] [class^="img"]{
      max-width: 580px;
      flex-basis: auto;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="item"] [class^="textDiv"]{
      padding: 24px 0 0;
    }
  }
  @media (max-width: 880px){
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="_matb16"]{
      margin: 8px 0;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="_matb48"]{
      margin: 24px 0;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"] [class^="item"] [class^="textDiv"]{
      padding: 16px 0 0;
    }
  }
  @media (max-width: 680px){
    [class^="fnknowledge"] [class^="_mw1340"]{
      padding: 0;
    }
    [class^="fnknowledge"] [class^="_mw1340"] [class^="_patb140"]{
      padding: 120px 20px 0;
      flex-direction: column-reverse;
    }
    [class^="fnknowledge"] [class^="fnknowledgeRight"] {
      margin-top: 0;
    }
    [class^="fnknowledge"] [class^="fnknowledgeLeft"]{
      padding: 0;
      margin-bottom: 56px;
    }

  }
</style>
