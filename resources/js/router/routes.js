import fnhome from '../views/fnhome.vue'
import fnknowledge from '../views/fnknowledge.vue'
import fnknowledgemore from '../views/fnknowledgemore.vue'
import balayout from '../views/ba/components/layout.vue'
import baconservator from '../views/ba/conservator.vue'
import basuccesscase from '../views/ba/successcase.vue'
import balogin from '../views/balogin.vue'
import bamanager from '../views/bamanager.vue'
import batest from '../views/batest.vue'
import bacase from '../views/bacase.vue'
import baqa from '../views/baqa.vue'
import baarticle from '../views/baarticle.vue'
import baarticleclass from '../views/baarticleclass.vue'
import Test from '../views/Test.vue'
import Error from '../views/Error.vue'
const customUrl = process.env.MIX_URL
console.log('MIX_URL=>',customUrl,'MIX_IMGPREFIX=>',process.env.MIX_IMGPREFIX)
const constantRouter=[
  { 
    path: `${customUrl}`,
    component: fnhome,
    name: 'fnhome',
  },
  {
    path: `${customUrl}knowledge/:category/:pagenow`,
    component: fnknowledge,
    name: "fnknowledge",
    meta: {
    },
  },
  {
    path: `${customUrl}knowledgemore/:category/:id`,
    component: fnknowledgemore,
    name: "fnknowledgemore",
    meta: {
    },
  },
  {
    path: `${customUrl}balogin`,
    component: balogin,
    name: 'balogin',
    meta:{
      title: 'balogin',
      title_ch: '後台登入',
    },
  },
  // {
  //   path: 'balogout',
  //   path: `${customUrl}balogout`,
  //   name: 'balogout',
  //   component: balogout,
  //   meta:{
  //     title: 'balogout',
  //     title_ch: '登出',
  //   },
  // },
  {
    path: `${customUrl}ba`,
    component: balayout,
    // name: 'batest',
    meta:{
      title: '後台模板1',
      // title_ch: 'test',
      // requiresAuth: true, //需要驗證
    },
    children:[
      {
        path: 'conservator/:id?',
        component: baconservator,
        name: 'baconservator',
        meta:{
          title: 'baconservator',
          title_ch: '管理員',
          requiresAuth: true, //需要驗證
        },
      },
      {
        path: `conservator/add`,
        component: baconservator,
        name: 'baconservatoradd',
        meta:{
          title: 'baconservatoradd',
          title_ch: '管理員_新增',
          requiresAuth: true, //需要驗證
        },
      },
      {
        path: `conservator/edit/:id`,
        component: baconservator,
        name: 'baconservatoredit',
        meta:{
          title: 'baconservatoredit',
          title_ch: '管理員_編輯',
          requiresAuth: true, //需要驗證
        },
      },
      {
        path: 'successcase/:id?',
        component: basuccesscase,
        name: 'basuccesscase',
        meta:{
          title: 'basuccesscase',
          title_ch: '成功案例',
          requiresAuth: true, //需要驗證
        },
      },
      // {
      //   path: 'conservator/add',
      //   component: baconservator,
      //   name: 'baconservatoradd',
      //   meta:{
      //     title: 'baconservatoradd',
      //     title_ch: '管理員_新增',
      //     requiresAuth: true, //需要驗證
      //   },
      // }
    ]
  },
  {
    path: `${customUrl}batest/:id`,
    component: batest,
    name: 'batest',
    meta:{
      title: '2次修改',
      title_ch: 'test',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bamanager/:id`,
    component: bamanager,
    name: 'bamanager',
    meta:{
      title: 'bamanager',
      title_ch: '管理員',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bamanager/add`,
    component: bamanager,
    name: 'bamanageradd',
    meta:{
      title: 'bamanageradd',
      title_ch: '管理員_新增',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bamanager/edit/:id`,
    component: bamanager,
    name: 'bamanageredit',
    meta:{
      title: 'bamanageredit',
      title_ch: '管理員_編輯',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bacase/:id`,
    name: 'bacase',
    component: bacase,
    meta:{
      title: 'bacase',
      title_ch: '成功案例',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bacase/add`,
    name: 'bacaseadd',
    component: bacase,
    meta:{
      title: 'bacaseadd',
      title_ch: '成功案例_新增',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}bacase/edit/:id`,
    name: 'bacaseedit',
    component: bacase,
    meta:{
      title: 'bacaseedit',
      title_ch: '成功案例_編輯',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baqa/:id`,
    name: 'baqa',
    component: baqa,
    meta:{
      title: 'baqa',
      title_ch: '想問什麼Q&A',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baqa/add`,
    name: 'baqaadd',
    component: baqa,
    meta:{
      title: 'baqaadd',
      title_ch: '想問什麼Q&A_新增',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baqa/edit/:id`,
    name: 'baqaedit',
    component: baqa,
    meta:{
      title: 'baqaedit',
      title_ch: '想問什麼Q&A_編輯',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticle/:id`,
    name: 'baarticle',
    component: baarticle,
    meta:{
      title: 'baarticle',
      title_ch: '全部文章',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticle/add`,
    name: 'baarticleadd',
    component: baarticle,
    meta:{
      title: 'baarticleadd',
      title_ch: '全部文章_新增',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticle/edit/:id`,
    name: 'baarticleedit',
    component: baarticle,
    meta:{
      title: 'baarticleedit',
      title_ch: '全部文章_編輯',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticleclass/:id`,
    name: 'baarticleclass',
    component: baarticleclass,
    meta:{
      title: 'baarticleclass',
      title_ch: '文章類別',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticleclass/add`,
    name: 'baarticleclassadd',
    component: baarticleclass,
    meta:{
      title: 'baarticleclassadd',
      title_ch: '文章類別_新增',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}baarticleclass/edit/:id`,
    name: 'baarticleclassedit',
    component: baarticleclass,
    meta:{
      title: 'baarticleclassedit',
      title_ch: '文章類別_編輯',
      requiresAuth: true, //需要驗證
    },
  },
  {
    path: `${customUrl}test`,
    component: Test,
    meta:{
      hidden: true
    }
  },
  // 找不到頁面，要放在最後。
  {
    path: `${customUrl}404`,
    component: Error,
    name: 'error',
    meta:{
      hidden: true
    }
  },
  {
    // path: '/:error(.*)*',
    // redirect: '/404',
    path: `${customUrl}:error(.*)*`,
    redirect: `${customUrl}404`,
    name: 'any',
    meta:{
      hidden: true
    }
  },
]

export default constantRouter;