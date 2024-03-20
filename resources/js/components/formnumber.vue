<script setup>
  import {onMounted,watchEffect ,ref} from 'vue'
  const props = defineProps({
    // errors:{
    //   type: Object,
    //   default: '',
    //   required: true
    // },
    id:{
      type: String,
      // default: '',
      required: true
    },
    text:{
      type: String,
      // default: '',
      required: true
    },
    // type:{
    //   type: String,
    //   // default: 'text',
    //   required: true
    // },
    rules:{
      type: String,
      default: '',
    },
    required:{
      type: Boolean,
      default: false,
    },
    value:{
      // type: String,
      // default: '',
      // required: true
    },
  })
  const inputValue = ref('')
  watchEffect(() => {
    inputValue.value = props.value
  });
</script>
<template>
  <div class="inputDiv_dif_fdc">
    <div class="label_text16">
      <label :for="props.id">{{props.text}}<span class="_coRed" v-if="props.required">*</span></label>
    </div>
    <div class="input_wi100_por">
      <v-field
        :id="props.id"
        class="inputTag_wi100_fs16_pa16_bcGray900_bw1_br6_bss_lh1"
        type="number"
        :name="props.id"
        v-model="inputValue"
        :placeholder="`請輸入${props.text}`"
        :rules="`required|${props.rules}`"
      ></v-field>
      <error-message :name="props.id" class="_formError"></error-message>
    </div>
  </div>
</template>
<style scoped>
/* Chrome, Safari, Edge, Opera */
input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
