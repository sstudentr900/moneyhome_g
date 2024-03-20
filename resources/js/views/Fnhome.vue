<script setup>
  import fnnav from '../components/fnnav.vue'
  import home_header from '../components/home_header.vue'
  import home_case from '../components/home_case.vue'
  import home_status from '../components/home_status.vue'
  import home_qa from '../components/home_qa.vue'
  import home_make from '../components/home_make.vue'
  import home_article from '../components/home_article.vue'
  import home_report from '../components/home_report.vue'
  import publicFooter from '../components/publicFooter.vue'
  import {onMounted} from 'vue'
  import AOS from 'aos'
  import 'aos/dist/aos.css'
  // import Rellax from 'rellax';
  onMounted(()=>{
    AOS.init()
    console.log('fnhome')
    // new Rellax('.rellax');
  })
</script>

<template>
  <fnnav/>
  <home_header/>
  <home_case/>
  <home_status/>
  <home_qa/>
  <home_make/>
  <home_article/>
  <home_report/>
  <publicFooter/>
</template>

<style>
</style>
