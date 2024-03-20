<script setup>
  const props = defineProps({
    // errors:{
    //   type: Object,
    //   default: '',
    //   required: true
    // },
    // text:{
    //   type: String,
    //   default: '',
    //   required: true
    // }
  })
</script>
<template>
  <div class="inputDiv_dif_fdc">
    <div class="label_text16_ls2">
      <label for="verify">驗證碼</label>
    </div>
    <div class="_dif_gap16">
      <div class="input_wi60_por">
        <!-- :class="{ 'error': props.errors['verify'] }" -->
        <v-field
          class="inputTag_wi100_fs16_pa16_bcGray900_bw1_br6_bss_lh1"
          type="text"
          name="verify"
          placeholder="請輸入驗證碼"
          rules="required"
        ></v-field>
        <error-message name="verify" class="_formError"></error-message>
      </div>
      <div class="img_wi40">
        <img class="_fluid" :src="$getSrc('login01.png')"/>
      </div>
    </div>
  </div>
</template>
<style scoped></style>
