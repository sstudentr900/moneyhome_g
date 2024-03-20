import { defineStore } from "pinia";
import { bamanager } from '../composables/useApi'
export default defineStore('bamanager',{
  state:()=>{
    return {
      data: '',
      pageNow: '',
      pageTotle: '',
    };
  },
  //異步|邏輯
  actions:{
    async getdata(now){
      // console.log('14',now)
      try{
        const result = await bamanager(now);
        // console.log('17',result,now);
        if(result.status){
          this.data = result.datas; 
          this.pageNow = Number(result.pageNow); 
          this.pageTotle = Number(result.pageTotle); 
          // router.push({ name:'bamanager', params:{id:now} })
        }else{
          console.log('找不到資料')
        }
      }catch(eror){
        console.log('eror',eror)
        // router.push({name:'balogin'})
      }
      // const result = await bamanager(now);
      // if(result.status){
      //   this.nowdata = result.datas; 
      //   this.pageNow = Number(result.pageNow); 
      //   this.pageTotle = Number(result.pageTotle); 
      // }else{
      //   console.log('找不到資料')
      // }
      // return result
    },
  },
  getters:{

  }
})
