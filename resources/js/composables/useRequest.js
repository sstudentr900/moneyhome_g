import axios from "axios";
import bauserstore from '../store/bauser'

const request = axios.create({
  //基礎路徑
  baseURL: process.env.MIX_UR, 
  // 超时
  timeout: 5000
})

//攔截請求
request.interceptors.request.use(config => {
  // console.log(config)
  //判斷登入帶入token
  const userStore = bauserstore()
  // console.log('token',userStore.token)
  if(userStore.token){
    //Bearer token 一定要這樣寫
    config.headers.Authorization = `Bearer ${userStore.token}` 
    //錯誤 token
    // config.headers.token = `Bearer ${userStore.token}` 
    //ngrok-skip-browser-warning
    // config.headers.ngrokSkipBrowserWarning = true
  }
  return config
}, error => {
  return Promise.reject(error)
});

//攔截回應
request.interceptors.response.use((res)=>{
  //簡化數組
  // return res.data;

  // switch (res.status) {
  //   case 200:
      return Promise.resolve(res.data)
  //   default:
  //     console.log(res.status)
  // }
},error => {
  //失敗錯誤
  let message = '';
  // console.log('useRequest',error.response.data)
  switch (error.response.status) {
    case 401:
      message='tokene過期'
      break
    case 403:
      message='無權訪問'
      break
    case 404:
      message='地址錯誤'
      break
    case 500:
      message='服務器出問題'
      break
    default:
      message='請求錯誤'
  }
  // console.log('useRequest',message)
  return Promise.reject(message)
});

export default request;