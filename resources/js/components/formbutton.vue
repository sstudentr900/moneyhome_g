<script setup>
  const props = defineProps({
    'text':{
      type: String,
      default: '',
      required: true
    },
    'loadingShow':{
      type: Boolean,
      default: false,
      required: true
    },
  })
</script>
<template>
  <button class="link_btn_wi100_pa16_fs16_coWhite_bgGreen_br4_dif_aic_jcc_fw400">
    {{ props.text }}
    <div class="_loading_mal8" v-if="props.loadingShow"></div>
  </button>
</template>
<style scoped></style>
