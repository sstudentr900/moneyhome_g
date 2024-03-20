import { defineStore } from "pinia";
import { balogin,bauserinfo } from '../composables/useApi'
const useUserStore = defineStore('user',{
  state:()=>{
    return {
      token: localStorage.getItem('TOKEN'),
      account: '',
      name: '',
      cover: '',
    };
  },
  //異步|邏輯
  actions:{
    async isLogin(data){
      // console.log(12,data)
      let result = await balogin(data)
      if(result.status){
        //存本地
        // console.log('TOKEN',result.token)
        localStorage.setItem('TOKEN',result.token)
        //存取個人資訊
        this.token = result.token
        this.account = result.account
        this.name = result.name
        this.cover = result.cover
        // this.useUserInfo()
        // return 'ok'
      }
      // else
      // {
      //   //new Error 錯誤訊息
      //   // return Promise.reject(new Error(result.data.message))
      //   //錯誤
      //   return Promise.reject(result)
      //   //錯誤字串
      //   // return Promise.reject(result.data.message)
      // }
      // return Promise.reject(result)
      return result
    },
    async useUserInfo(){
      // isLogin()
      let result = await bauserinfo()
      // console.log(result)
      if(result.status){
        this.account = result.account
        this.name = result.name
        this.cover = result.cover
        return 'ok'
      }
      // else{
      //   return Promise.reject(new Error(result.data.message))
      // }
      return result
    },
    async useLogout(){
      //通知服務token 消除
      this.token='';
      this.account='';
      this.name='';
      this.cover='';
      localStorage.removeItem('TOKEN');
    }
  },
  getters:{

  }
})
export default useUserStore;