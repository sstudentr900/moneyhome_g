import router from './index'
import nprogress from 'nprogress'
import 'nprogress/nprogress.css'
import bauser from '../store/bauser'
nprogress.configure({showSpinner: false}) //進度條圈圈關閉
// import { createPinia } from 'pinia' //全端資料管理
// import pinia from './store/'
// const bauserstore = bauser(createPinia())
// console.log(bauserstore.token)

//全局前守衛 切換路由都會觸發
router.beforeEach(async (to,from,next)=>{
  // console.log('全局前守衛')

  // to 你要訪問的路由
  // from 你從拿個路由來的
  // next() 路由放行函數

  //改變title
  // document.title = to.meta.title_ch

  //進度條開始
  nprogress.start() 

  //全放行
  // next();

  //引入store
  const bauserstore = bauser()  
  //test
  // await bauserstore.useUserInfo();
  // console.log('取用戶訊息',bauserstore.name)

  //有登入取得token
  // console.log('全局前守衛','token',bauserstore.token,'name',bauserstore.name)
  if(bauserstore.token){
    // next();
    //不能去登入
    // console.log('有登入取得token',bauserstore.token)
    // if(to.name=='balogin' || to.name.indexOf('baregister')===0){
    //   console.log('有token不能去[login,baregister]',to.name)
    //   next({name:'bamanager'});
    // }else{
      // 網址改變重新整理 Store訊息會消失所以要取用戶訊息
      // to 改變 Store訊息不會消失
      console.log('全局前守衛','token',bauserstore.token,'name',bauserstore.name)
      // 判斷用戶訊息
      if(bauserstore.name){
        console.log('有token和用戶訊息放行')
        next(); //放行
      }else{
        try{
          //沒用戶訊息取訊息
          console.log('有token沒用戶訊息取訊息')
          await bauserstore.useUserInfo();
          console.log('有token沒有用戶訊息取用戶訊息',bauserstore.name)
          next();
        }catch(error){
          //tokene過期 登出
          console.log('tokene過期 登出')
          bauserstore.useLogout();
          // next({name:'balogin',query:{redirect:to.path}});
          next({name:'balogin'});
        }
      }
    // }
  }else{
    // console.log('沒有登入')
    // console.log('balogin',to.name!='balogin')
    // next();
    if(
      to.name.indexOf('ba')===0 && to.name!='balogin'
    ){
      console.log('沒有登入不能去',to.name,'但能去balogin')
      // next({name:'balogin',query:{redirect:to.path}});
      next({name:'balogin'});
    }else{
      console.log('沒有登入但能去',to.name)
      next();
    }
  }


})


//全局後守衛
router.afterEach((to,from,next)=>{
  nprogress.done() //進度條結束
})

//切換-進度條 nprogress