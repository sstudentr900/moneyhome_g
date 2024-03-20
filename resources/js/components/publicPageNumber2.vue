<script setup>
  import { useRoute,useRouter } from 'vue-router';
  const route = useRoute()
  const router = useRouter()
  const props = defineProps({
    previous:{
      type: Number,
    
    }, 
    next:{
      type: Number,
      // default: 1
    },
    totle:{
      type: Number,
      // default: 1
    },
    fn:{
      type: Function, 
      default: ()=>{},
    }
  })
  const page = (number)=>{
    console.log(route.params.id)
    props.fn(number)
  }
</script>
<template>
  <div class="fnpagenumber">
    <div class="previous" @click="page(props.previous)" :class="{disabled:route.params.id==1}">
      <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.91327 6.44971C1.83487 6.37195 1.77264 6.27943 1.73017 6.1775C1.68771 6.07558 1.66585 5.96625 1.66585 5.85582C1.66585 5.7454 1.68771 5.63607 1.73017 5.53414C1.77264 5.43222 1.83487 5.3397 1.91327 5.26194L5.75258 1.431C5.83098 1.35324 5.89321 1.26072 5.93567 1.15879C5.97814 1.05686 6 0.947536 6 0.837115C6 0.726693 5.97814 0.617364 5.93567 0.515435C5.89321 0.413505 5.83098 0.320993 5.75258 0.243234C5.59586 0.0874439 5.38386 0 5.16288 0C4.9419 0 4.7299 0.0874439 4.57318 0.243234L0.733869 4.08255C0.263949 4.55305 0 5.19084 0 5.85582C0 6.52081 0.263949 7.1586 0.733869 7.6291L4.57318 11.4684C4.72898 11.6229 4.93926 11.7101 5.1587 11.711C5.26878 11.7116 5.37791 11.6905 5.47982 11.6489C5.58173 11.6073 5.67442 11.5459 5.75258 11.4684C5.83098 11.3907 5.89321 11.2981 5.93567 11.1962C5.97814 11.0943 6 10.985 6 10.8745C6 10.7641 5.97814 10.6548 5.93567 10.5529C5.89321 10.4509 5.83098 10.3584 5.75258 10.2807L1.91327 6.44971Z" fill="white"/>
      </svg>
      <p>上一則</p>
    </div>
    <div class="next" @click="page(props.next)" :class="{disabled:route.params.id==props.totle}">
      <p>下一則</p>
      <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4.08673 6.44971C4.16513 6.37195 4.22736 6.27943 4.26983 6.1775C4.31229 6.07558 4.33415 5.96625 4.33415 5.85582C4.33415 5.7454 4.31229 5.63607 4.26983 5.53414C4.22736 5.43222 4.16513 5.3397 4.08673 5.26194L0.247421 1.431C0.169022 1.35324 0.106794 1.26072 0.0643282 1.15879C0.0218625 1.05686 0 0.947536 0 0.837115C0 0.726693 0.0218625 0.617364 0.0643282 0.515435C0.106794 0.413505 0.169022 0.320993 0.247421 0.243234C0.40414 0.0874439 0.616141 0 0.83712 0C1.0581 0 1.2701 0.0874439 1.42682 0.243234L5.26613 4.08255C5.73605 4.55305 6 5.19084 6 5.85582C6 6.52081 5.73605 7.1586 5.26613 7.6291L1.42682 11.4684C1.27102 11.6229 1.06074 11.7101 0.841302 11.711C0.731219 11.7116 0.622093 11.6905 0.520182 11.6489C0.418271 11.6073 0.325579 11.5459 0.247421 11.4684C0.169022 11.3907 0.106794 11.2981 0.0643282 11.1962C0.0218625 11.0943 0 10.985 0 10.8745C0 10.7641 0.0218625 10.6548 0.0643282 10.5529C0.106794 10.4509 0.169022 10.3584 0.247421 10.2807L4.08673 6.44971Z" fill="white"/>
      </svg>
    </div>
  </div>
</template>
<style scoped>
  .fnpagenumber{
    display: flex;
    justify-content: center;
    gap: 16px;
    user-select: none;
  }
  .fnpagenumber>div{
    background: rgba(33, 33, 33, 1);
    padding: 24px;
    color: #FFF;
    text-align: center;
    font-size: 18px;
    font-weight: 400;
    line-height: 20px; /* 111.111% */
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 280px;
    width: 100%;
    cursor: pointer;
  }
  .fnpagenumber>div.disabled{
    opacity: .3;
    pointer-events: none;
    cursor: default;
  }
  .fnpagenumber>div svg{
    margin-top: 4px;
  }
  .fnpagenumber .previous p{
    margin-left: 16px;
  }
  .fnpagenumber .next p{
    margin-right: 16px;
  }
  @media (max-width: 480px){
    .fnpagenumber .previous p{
      margin-left: 8px;
    }
    .fnpagenumber .next p{
      margin-right: 8px;
    }
  }
</style>
