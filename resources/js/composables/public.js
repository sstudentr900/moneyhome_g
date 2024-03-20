export function getSrc(url){
  return `${process.env.MIX_URL}${process.env.MIX_IMGPREFIX}/${url}?${(Math.floor(Math.random()*1000)+1)}`
  // 圖片返回路徑 使用方式 template
  // img :src="$getSrc('imgsrc.png')"
}
export function getUrl(url){
  return new URL(`/src/assets/${process.env.MIX_IMGPREFIX}/${url}`, import.meta.url).href;
  // 圖片返回絕對路徑 使用方式 template
  // 絕對路徑 http://localhost:5173/@fs/src/assets/img/${url}
  // img :src="$getUrl('imgsrc.png')"
}
export function defaultImage(event,defaultImage){
  //vite預設圖片 import.meta.env.VITE_IMAGE_DEFAULT 
  defaultImage = defaultImage?defaultImage: import.meta.env.VITE_IMAGE_DEFAULT
  event.target.src = getUrl(defaultImage);
  event.target.onerror = null; // 添加这个防止默认图片也不存在而陷入死循环
  // 圖片錯誤 使用方式
  // defaultImage圖片預設
  // img  @error.once="$defaultImage($event,'defaultImage.png')"
}
export function loadImageEnd (list,callback){
  let i = 0;
  list.forEach((src)=>{
    const newImg = new Image()
    newImg.src = getSrc(src)
    newImg.onerror = () => { 
      // console.log('onerror','src',src)
      //錯誤預設圖片
      // newImg.src = 'http://www.86y.org/images/loading.gif'
      newImg.src = getSrc(import.meta.env.VITE_IMAGE_DEFAULT)
    }
    newImg.onload = () => { 
      i += 1
      // console.log('onload','list.length',list.length,'i',i,'src',src)
      if(list.length === i) { 
        callback()
      }
    }
  })

  // 圖片全部載入完成 使用方式 
  // imgArr => 需是array
  // const imgArr=['home_header1.png','home_header25.png','home_header3.png']
  // loadImageEnd(imgArr,()=>{
  //   console.log('圖片全部載入完成');
  // })
}
export function loadImageHandlerX(e){
  let data = e.currentTarget.data
  if(e.type!=='error'){
    data.resultList.push(e.currentTarget.cloneNode(false))
  }
  data.num++
  if(data.num>data.list.length-1){
    e.currentTarget.removeEventListener('load',loadImageHandler)
    if(data.callback){
      data.callback(data.resultList)
    }
    data = null;
    return;
  }
  e.currentTarget.src = data.list[data.mum];
}
export function loadImageEndX (list,callback,basePath){
  if(!list||list.length===0)return;
  if(basePath) list = list.map(item=>basePath + item);
  let img = new Image();
  img.data = {
    list: list,
    callback: callback,
    resultList: [],
    mum: 0
  }
  img.addEventListener('load',loadImageHandler);
  img.addEventListener('error',loadImageHandler);
  img.src = list[img.data.num]

  // 使用方式
  // 來源 https://blog.csdn.net/Charissa2017/article/details/109692185
  // const isLoading = ref(true)
  // let imgArr=[]
  // loadImageEnd(imgArr,()=>{
  //   isLoading.value = false
  // })
}
