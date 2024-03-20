<script setup>
  import {ref} from 'vue'
  const props = defineProps({
    // errors:{
    //   type: Object,
    //   default: '',
    // },
    // required:{
    //   type: Boolean,
    //   default: false,
    // }
  })
  // const passwordType = ref('password')
</script>
<template>
  <div class="inputDiv_dif_aic_gap64">
    <div class="_dif_aic">
      <div class="label_text16">
        <label for="passwords">新密碼</label>
      </div>
      <div class="input_por">
        <v-field
          class='inputTag_wi100_fs16_pa8_lh1' 
          type="password" 
          name="passwords"
          autocomplete="on"
          placeholder="請輸入密碼，留意大小寫"
          rules="required|max:10"
        ></v-field>
        <error-message name="passwords" class="_formError"></error-message>
      </div>
    </div>
    <div class="_dif_aic">
      <div class="label_text16">
        <label for="passwords">確認密碼</label>
      </div>
      <div class="input_por">
        <v-field
          class='inputTag_wi100_fs16_pa8_lh1' 
          type="password" 
          name="passwords2"
          autocomplete="on"
          placeholder="請輸入密碼，留意大小寫"
          rules="required|max:10"
        ></v-field>
        <error-message name="passwords2" class="_formError"></error-message>
      </div>
    </div>
  </div>
</template>
<style scoped>
</style>
