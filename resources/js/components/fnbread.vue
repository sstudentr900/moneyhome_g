<!-- 使用方式
  <script>
    const bread = ref([
      {name:'首頁',to:{name:'fnhome'} },
      {name:'債務知識543',to:{name:'fnknowledge',params:{id:1,pagenow:1}} },
    ])
  </script>

  <template>
    <fnbread :arrays="bread"/>
  </template>

  //顯示結果
  <ul>
    <li><router-link :to="{name:'fnhome'}">首頁</router-link></li>
    <li><router-link :to="{name:'fnknowledge'}">債務知識543</router-link></li>
  </ul>
-->
<script setup>
  const props = defineProps({
    class:{
      type: String,
      default:''
    },
    arrays:{
      type: Array,
      required: true
    }
  })
</script>
<template>
  <!-- {{  props.arrays}} -->
  <ul class="fnbread_dif_fs14_coGray900_fw400_mab16" :class="props.class">
    <li v-for="(item,index) in props.arrays" :key="index"> 
      <router-link :to="item.to">{{ item.name }}</router-link>
    </li>
  </ul>
</template>
<style scoped>
  [class^="fnbread"] li+li{
    padding-left: 24px;
    position: relative;
  }
  [class^="fnbread"] li+li::after{
    content: '〉';
    color: #A4A4A4;
    position: absolute;
    top: 1px;
    left: 9px;
    font-size: 12px;
    font-weight: bold;
  }
  @media (max-width: 680px){
    [class^="fnbread"]{
      margin-bottom: 8px;
    }
  }
</style>
