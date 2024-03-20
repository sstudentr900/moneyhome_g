<script setup>
  import fnnav from '../components/fnnav.vue'
  import fnbread from '../components/fnbread.vue'
  import fnarticleclass from '../components/fnarticleclass.vue'
  import fnarticlenew from '../components/fnarticlenew.vue'
  import publicFooter from '../components/publicFooter.vue'
  import forminput from '../components/forminput.vue'
  import formcontent from '../components/formcontent.vue'
  import { notify } from "@kyvg/vue3-notification";
  import { fnarticlemore } from "../composables/useApi"
  import {computed,watch,onMounted,ref} from 'vue'
  import { useRoute,useRouter } from 'vue-router'
  import { fnknowledgemessage } from "../composables/useApi"
  import AOS from 'aos'
  import 'aos/dist/aos.css'
  const route = useRoute()
  const router = useRouter()
  const nowdata = ref([])
  const articleClassDatas = ref([])
  const articleNewDatas = ref([])
  const bread = ref([])
  const articleMessage = ref([])
  const nowClassName = ref('')
  const pageNow =  ref(1)
  const pageSize = ref(6)
  const pageTotle = ref(6)
  const title = ref('')
  const loadingShow = ref(false)
  const getData = async()=>{
    // console.log('fnknowledgemore 25',route.params.category,pagenow)
    const breadArray=[]
    const id=route.params.id
    const category=route.params.category
    try{
      const result = await fnarticlemore(id)
      if(result.status){
        nowdata.value = result.datas;
        articleClassDatas.value = result.articleClassDatas;
        articleNewDatas.value = result.articleNewDatas;
        nowClassName.value = result.nowClassName
        articleMessage.value = result.articleMessage
        // pageNow.value = Number(result.pageNow); 
        // pageTotle.value = Number(result.pageTotle); 
        breadArray.push({name:'首頁',to:{name:'fnhome'} })
        if(category!=99){
          breadArray.push({ name:'債務知識543',to:{name:'fnknowledgemore',params:{category:category,id:id}}  })
          // title.value = '債務知識543'
        }
        // if(id==99){
        //   title.value = result.nowClassName
        // }
        breadArray.push({ name:result.nowClassName,to:{name:'fnknowledgemore',params:{category:category,id:id}} })
        bread.value = breadArray
        // console.log('fnknowledgemore 45',bread.value)
        router.push({ name:'fnknowledgemore', params:{id:id} })
        AOS.init()
      }else{
        console.log('找不到資料')
      }
    }catch(error){
      console.log('fnknowledgemore',error)
      // console.log(newsdata.value.length)
    }
  }
  const fromFn = async(values,actions)=>{
    values['id']=route.params.id
    // console.log(values)
    // 送出表單
    try{
      loadingShow.value = true
      const result = await fnknowledgemessage(values);
      loadingShow.value = false
      if(result.status){
        notify({title: result.message});
        actions.resetForm() //Reset Form
        getData()
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
  watch(
    () => route.path,
    () => {
      // console.log('fnknowledge watch')
      getData()
    },
    { immediate: true }
  );
</script>

<template>
  <div class="fnknowledgemore_bgFAFAFA">
    <fnnav class="style2"/>
    <div class="_mw1340">
      <div class="_patb140_dif_jcs" v-if="nowdata.updated_at">
        <div class="leftDiv_fl1_par40">
          <fnbread :arrays="bread"/>
          <div class="contentDiv">
            <div class="top_mat32">
              <div class="iconDiv_dif_aic_mab8">
                <div class="icon_fs14_fw400_coWhite_patb4_palr16_bgGreen_br100_dii">{{ nowClassName }}</div>
                <div class="date_fs14_fw400_co212121_dii_mal8">{{ nowdata.updated_at?.split(' ')[0] }}</div>
              </div>
              <div class="title_fs32_fw400_co212121_ellipsis1_lh12">{{nowdata.title}}</div>
              <hr class="_matb24_op02">
            </div>
            <div class="bottom">
              <div v-html="nowdata.tinymce"></div>
            </div>
            <hr class="_matb48_op02">
          </div>
          <div class="messageDiv">
            <div class="title2_dif_aic_mab32">
              <div class="icon">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4932 1.54882C12.4932 0.999817 12.0493 0.552817 11.4993 0.549817L3.50625 0.499817H3.50025C2.95025 0.499817 2.50425 0.943817 2.50025 1.49382C2.49625 2.04582 2.94125 2.49682 3.49425 2.49982L9.05225 2.53482L0.79325 10.7928C0.40225 11.1838 0.40225 11.8168 0.79325 12.2068C0.98825 12.4028 1.24425 12.4998 1.50025 12.4998C1.75625 12.4998 2.01225 12.4028 2.20725 12.2068L10.4952 3.91882L10.5002 9.50082C10.5002 10.0528 10.9482 10.4998 11.5002 10.4998H11.5013C12.0533 10.4998 12.5002 10.0508 12.5002 9.49882L12.4932 1.54882Z" fill="white"/>
                </svg>
              </div>
              <div class="text_fs24_fw800_coGreen_ellipsis1_lh12_mal16">留言</div>
            </div>
            <div class="_palr16">
              <div class="items">
                <div class="item" v-for="(item,index) in articleMessage" :key="index">
                  <div class="top_dif_aic_mab8">
                    <div class="title3_fs24_fw800_coGray900">{{ item.nickname }}</div>
                    <div class="date_fs16_fw400_coGray900_mal8">於{{ item.updated_at }}</div>
                  </div>
                  <div class="text_fs16_fw400_coGray900_lh12">{{ item.message }}</div>
                  <hr class="_matb32_op03">
                </div>
                <!-- <div class="item">
                  <div class="top_dif_aic_mab8">
                    <div class="title3_fs24_fw800_coGray900">elle0255</div>
                    <div class="date_fs16_fw400_coGray900_mal8">於2024/01/16  11:20</div>
                  </div>
                  <div class="text_fs16_fw400_coGray900_lh12">留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容留言內容</div>
                  <hr class="_matb32_op03">
                </div> -->
              </div>
              <div class="messageForm_mat48">
                <v-form id="form" ref="form" v-slot="{ errors }"  @submit="fromFn">
                  <forminput id="nickname" class="_mab8" text='暱稱' :errors="errors" />
                  <formcontent id="message" text='留言' :errors="errors" />
                  <button class="link_diif_aic_jcs_pa_fs18_fw600_coWhite_bgGreen_patb16_palr40_br100_mat24_lh14_cup_bon">
                    送出留言
                    <div class="_loading_mal8" v-if="loadingShow"></div>
                  </button>
                </v-form>
              </div>
            </div>
          </div>
        </div>
        <div class="rightDiv_fl0"> 
          <fnarticleclass :data="articleClassDatas"/>
          <fnarticlenew :data="articleNewDatas"/>
        </div>
      </div>
    </div>
    <publicFooter/>
  </div>
</template>

<style scoped>
  [class^="fnknowledgemore"] [class^="_mw1340"]{
    min-height: 100vh;
  }
  [class^="fnknowledgemore"] [class^="contentDiv"] [class^="bottom"]{
    line-height: 2;
  }
  [class^="fnknowledgemore"] [class^="contentDiv"] [class^="bottom"] p{
    margin: 24px 0;
  }
  [class^="fnknowledgemore"] [class^="rightDiv"] {
    flex-basis: 260px;
    margin-top: 90px;
  }
  [class^="fnknowledgemore"] [class^="messageDiv"] .icon{
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border:2px solid #3A838C;
    background: #134A56;
  }
  [class^="fnknowledgemore"] [class^="input"] textarea,
  [class^="fnknowledgemore"] [class^="input"] :deep(input){
    border: 1px solid #ddd;
    border-radius: 0;
    padding: 8px 16px;
  }
  [class^="fnknowledgemore"] [class^="input"] :deep([class^="label"]){
    display: none;
  }

  @media (max-width: 1200px){
    [class^="fnknowledgemore"] [class^="rightDiv"] {
      flex-basis: 200px;
    }
  }
  @media (max-width: 1020px){
    [class^="fnknowledgemore"] [class^="_mw1340"] [class^="_patb140"]{
      padding-top: 120px ;
      padding-bottom: 120px ;
    }
  }
  @media (max-width: 880px){
  }
  @media (max-width: 680px){
    [class^="fnknowledgemore"] [class^="_mw1340"]{
      padding: 0;
    }
    [class^="fnknowledgemore"] [class^="_mw1340"] [class^="_patb140"]{
      padding: 120px 20px 0;
      flex-direction: column-reverse;
    }
    [class^="fnknowledgemore"] [class^="rightDiv"] {
      margin-top: 0;
    }
    [class^="fnknowledgemore"] [class^="leftDiv"]{
      padding: 0;
      margin-bottom: 56px;
    }

  }
</style>
