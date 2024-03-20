<script setup>
  const props = defineProps({
    class:{
      type: String,
      default:''
    },
    data:{
      type: Array,
      // default:'',
      required: true
    }
  })
</script>

<template>
  <div class="publicNewest_mab64" :class="props.class">
    <div class="title_fs24_fw800_co212121_ellipsis1">最新文章</div>
    <hr class="_matb16">
    <div class="items">
      <router-link 
      v-for="(item,index) in props.data" 
      :key="index"
      :to="{name:'fnknowledgemore', params: { id: item.id }}"
      class="item_fs18_fw400_co282938_mab24_lh12_ellipsis2"
      >
      {{item.title}}
      </router-link>
      <!-- <a class="item_fs18_fw400_co282938_mab24_lh12_ellipsis2">被資產管理公司強制執行電信欠費，留意「時效」有機會..</a>
      <a class="item_fs18_fw400_co282938_mab24_lh12_ellipsis2">被資產管理公司強制執行電信欠費，留意「時效」有機會..</a>
      <a class="item_fs18_fw400_co282938_mab24_lh12_ellipsis2">被資產管理公司強制執行電信欠費，留意「時效」有機會..</a> -->
    </div>
  </div>
</template>
<style scoped>
</style>
