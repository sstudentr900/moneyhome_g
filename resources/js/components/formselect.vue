<script setup>
  import { Field } from 'vee-validate';
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
    options:{
      type: Array,
      // default: '',
      // required: true
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
        class="inputTag_wi100_fs16_pa16_bw1_bss"
        as="select"
        :name="props.id"
        :rules="`required|${props.rules}`"
        v-model="inputValue"
      >
        <option value="" disabled>請選類別</option>
        <option v-for="(option,index) in options" :key="index" :value="option.id">{{ option.class }}</option>
      </v-field>
      <error-message :name="props.id" class="_formError"></error-message>
    </div>
  </div>
</template>
<style scoped>
select{
  padding: 8px 16px;
  border-radius: 0;
  border-color: #dee2e6;
}
select:focus-visible{
  outline: none;
}
</style>
