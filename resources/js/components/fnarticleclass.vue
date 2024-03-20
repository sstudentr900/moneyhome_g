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
  <div class="publicArticles_mab64" :class="props.class">
    <div class="title_fs24_fw800_co212121_ellipsis1">文章分類</div>
    <hr class="_matb16">
    <div class="items">
      <div class="item" v-for="(item,index) in props.data" :key="index">
        <router-link 
        v-if="item.count" 
        :to="{name:'fnknowledge', params: { category: item.id,pagenow: 1 }}"
        class="item_fs18_fw400_co282938_mab16_ellipsis1"
        >
        {{item.class}}({{ item.count }})
        </router-link>
      </div>
      <!-- <a class="item_fs18_fw400_co282938_mab16_ellipsis1">借據 (2)</a>
      <a class="item_fs18_fw400_co282938_mab16_ellipsis1">支付命令 (6)</a>
      <a class="item_fs18_fw400_co282938_mab16_ellipsis1">強制執行 (12)</a>
      <a class="item_fs18_fw400_co282938_mab16_ellipsis1">本票裁定 (3)</a> -->
    </div>
  </div>
</template>
<style scoped>
</style>
