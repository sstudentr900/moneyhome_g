<script setup>
  import bauser from '../store/bauser'
  import {useRouter,useRoute} from 'vue-router'
  const router = useRouter()
  const bauserstore = bauser()
  const props = defineProps({
    class:{
      type: String,
      default:'',
    },
    pagename:{
      type: String,
      default:'',
      required: true
    }
  })
  const isActiveFn = () => {
    document.body.classList.toggle('active');
  }
  const logoutFn = () => {
    bauserstore.useLogout()
    router.push({name:'balogin'})
  }
</script>

<template>
  <div class="banav">
    <div class="logo_mat16_mab48_tac">
      <img :src="$getSrc('home_logo.png')"/>
      <h2 class="_fs24_coFFF_fw800_ls-1">Money Home</h2>
    </div>
    <ul>
      <!-- <li>
        <router-link :to="{name:'batest',params:{id:'1'}}" :class="props.pagename.includes('batest')?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"/></svg>
            測試
          </p>
        </router-link>
      </li> -->
      <li>
        <router-link :to="{name:'bamanager',params:{id:'1'}}" :class="props.pagename.includes('bamanager')?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"/></svg>
            管理員
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </router-link>
      </li>
      <li>
        <router-link :to="{name:'bacase',params:{id:'1'}}" :class="props.pagename.includes('bacase')?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path id="telegram-1" d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z"/></svg>
            成功案例
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </router-link>
      </li>
      <li>
        <router-link :to="{name:'baqa',params:{id:'1'}}" :class="props.pagename.includes('baqa')?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h17v24zm-2-4h-14.505c-1.375 0-1.375 2 0 2h14.505v-2zm-3-15h-10v3h10v-3z"/></svg>
            想問什麼Q&A
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </router-link>
      </li>
      <li>
        <router-link :to="{name:'baarticle',params:{id:'1'}}" :class="props.pagename=='baarticle'?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M8.5 3.551c-.053-1.867 1.491-3.551 3.5-3.551 1.867 0 3.5 1.484 3.5 3.551 1.324-1.379 3.585-1.436 4.985-.037 1.268 1.268 1.474 3.412-.036 4.986 1.857-.054 3.551 1.484 3.551 3.5 0 1.862-1.479 3.5-3.551 3.5 1.461 1.461 1.357 3.664.036 4.985-1.318 1.317-3.52 1.43-4.985-.036 0 2.07-1.638 3.551-3.5 3.551-2.004 0-3.555-1.681-3.5-3.551-1.56 1.497-3.706 1.316-4.986.036-1.398-1.399-1.344-3.66.037-4.985-2.064 0-3.551-1.63-3.551-3.5 0-2.007 1.682-3.553 3.551-3.5-1.461-1.461-1.358-3.665-.037-4.986 1.317-1.317 3.521-1.428 4.986.037zm3.5 4.949c1.932 0 3.5 1.568 3.5 3.5s-1.568 3.5-3.5 3.5-3.5-1.568-3.5-3.5 1.568-3.5 3.5-3.5z"/></svg>
            全部文章
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </router-link>
      </li>
      <li>
        <router-link :to="{name:'baarticleclass',params:{id:'1'}}" :class="props.pagename=='baarticleclass'?'active':''">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 21h-3l1-3h1l1 3zm-12.976-4.543l8.976-4.575v6.118c-1.007 2.041-5.607 3-8.5 3-3.175 0-7.389-.994-8.5-3v-6.614l8.024 5.071zm11.976.543h-1v-7.26l-10.923 5.568-11.077-7 12-5.308 11 6.231v7.769z"/></svg>
            文章類別
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </router-link>
      </li>
      <li>
        <a @click="logoutFn">
          <p>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21h8v-2l1-1v4h-9v2l-10-3v-18l10-3v2h9v5l-1-1v-3h-8v18zm10.053-9l-3.293-3.293.707-.707 4.5 4.5-4.5 4.5-.707-.707 3.293-3.293h-9.053v-1h9.053z"/></svg>
            管理員登出
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg> -->
        </a> 
      </li>
      <li>
        <router-link :to="{name:'fnhome'}">
          <p>
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m22 8c0-.478-.379-1-1-1h-13c-.62 0-1 .519-1 1v13c0 .621.52 1 1 1h13c.478 0 1-.379 1-1zm-16-2h13.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-13.75c-.53 0-1 .47-1 1v13.75c0 .414.336.75.75.75s.75-.336.75-.75zm-2.5-2.5h13.75c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-14.25c-.53 0-1 .47-1 1v14.25c0 .414.336.75.75.75s.75-.336.75-.75z" fill-rule="nonzero"/></svg>
            回到前台
          </p>
          <!-- <svg class='arrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg>-->
        </router-link> 
      </li>
    </ul>
  </div>
</template>
<style scoped>
  [class^='banav']{
    flex: 0 0 260px;
    background: #134A56;
    padding: 20px;
    min-height: 100vh;
  }
  [class^='banav'] [class^='logo'] img{
    min-height: 70px;
  }
  [class^='banav'] ul li a{
    padding: 15px 0;
    color: #fff;
    opacity: .3;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  [class^='banav'] ul li a:hover{
    opacity: .8;
  }
  [class^='banav'] ul li a.active,
  [class^='banav'] ul li a:hover.active{
    opacity: 1;
  }
  [class^='banav'] ul li a p{
    font-size: 16px;
    font-weight: 400;
    line-height: 1.2;
    display: flex;
    align-items: center;
  }
  [class^='banav'] ul li a p svg{
    margin-right: 8px;
    width: 14px;
  }
  [class^='banav'] ul li a svg{
    fill: #fff;
    height: auto;
    width: 12px;
  }
</style>
