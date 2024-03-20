import request from "./useRequest";
const customPath = process.env.MIX_URL + "api";
//前qa
export const fnqa = () =>request.get(`${customPath}/fnqa`);
//前催收成功案例
export const fncase = () =>request.get(`${customPath}/fncase`);
//前債務催收文章
// export const fncollection = (id,pagenow) =>request.get(`${customPath}/fnarticle/${id}/${pagenow}`);
export const fnarticle = (category,pagenow) =>request.get(`${customPath}/fnarticle/${category}/${pagenow}`);
export const fnarticlemore = (id) =>request.get(`${customPath}/fnarticlemore/${id}`);
export const fnknowledgemessage = (data) =>request.post(`${customPath}/fnknowledgemessage`, data);
//前最新消息
// export const getNewsDate = (pageNow) =>request.get(`${customPath}/news`, { params: { id: pageNow } });
// export const getNewsReadDate = (pageNow) =>request.get(`${customPath}/news_read`, { params: { id: pageNow } });
//後登入
export const balogin = (data) => request.post(`${customPath}/balogin`, data);
//登入人資訊
export const bauserinfo = () => request.get(`${customPath}/bauserinfo`);
//後管理員
export const bamanager = (pageNow) =>request.get(`${customPath}/bamanager/${pageNow}`);
export const bamanageradd = (data) =>request.post(`${customPath}/bamanageradd`, data);
export const bamanageredit = (id) =>request.get(`${customPath}/bamanageredit/${id}`);
export const bamanagereditpost = (id,data) =>request.post(`${customPath}/bamanagereditpost/${id}`, data);
export const bamanagerpassword = (data) =>request.post(`${customPath}/bamanagerpassword`, data);
export const bamanagerdelete = (id) =>request.get(`${customPath}/bamanagerdelete/${id}`);
//後催收成功案例
export const bacase = (pageNow) =>request.get(`${customPath}/bacase/${pageNow}`);
export const bacasesort = () =>request.get(`${customPath}/bacasesort`);
export const bacaseadd = (data) =>request.post(`${customPath}/bacaseadd`, data);
export const bacaseedit = (id) =>request.get(`${customPath}/bacaseedit/${id}`);
export const bacaseeditpost = (id,data) =>request.post(`${customPath}/bacaseeditpost/${id}`, data);
export const bacasedelete = (id) =>request.get(`${customPath}/bacasedelete/${id}`);
//後qa
export const baqa = (pageNow) =>request.get(`${customPath}/baqa/${pageNow}`);
export const baqasort = () =>request.get(`${customPath}/baqasort`);
export const baqaadd = (data) =>request.post(`${customPath}/baqaadd`, data);
export const baqaedit = (id) =>request.get(`${customPath}/baqaedit/${id}`);
export const baqaeditpost = (id,data) =>request.post(`${customPath}/baqaeditpost/${id}`, data);
export const baqadelete = (id) =>request.get(`${customPath}/baqadelete/${id}`);
//後全部文章
export const baarticle = (pageNow) =>request.get(`${customPath}/baarticle/${pageNow}`);
export const baarticlesort = () =>request.get(`${customPath}/baarticlesort`);
export const baarticleassort = () =>request.get(`${customPath}/baarticleassort`);
export const baarticleadd = (data) =>request.post(`${customPath}/baarticleadd`, data);
export const baarticleedit = (id) =>request.get(`${customPath}/baarticleedit/${id}`);
export const baarticleeditpost = (id,data) =>request.post(`${customPath}/baarticleeditpost/${id}`, data);
export const baarticledelete = (id) =>request.get(`${customPath}/baarticledelete/${id}`);
//後文章類別
export const baarticleclass = (pageNow) =>request.get(`${customPath}/baarticleclass/${pageNow}`);
export const baarticleclasssort = () =>request.get(`${customPath}/baarticleclasssort`);
export const baarticleclassadd = (data) =>request.post(`${customPath}/baarticleclassadd`, data);
export const baarticleclassedit = (id) =>request.get(`${customPath}/baarticleclassedit/${id}`);
export const baarticleclasseditpost = (id,data) =>request.post(`${customPath}/baarticleclasseditpost/${id}`, data);
export const baarticleclassdelete = (id) =>request.get(`${customPath}/baarticleclassdelete/${id}`);
//test
export const reqTest = () => request.get(`${customPath}/test`);
