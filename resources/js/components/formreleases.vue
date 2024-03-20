<script setup>
  import {onMounted,watchEffect ,ref} from 'vue'
  const props = defineProps({
    id:{
      type: String,
      default: 'releases',
      // required: true
    },
    text:{
      type: String,
      default: '狀態',
      // required: true
    },
    required:{
      type: Boolean,
      default: false,
    },
    value:{
      type: String,
      default: 'y',
      // required: true
    },
  })
  const releasesnValue = ref('')
  watchEffect(() => {
    releasesnValue.value = props.value
  });
</script>
<template>
  <div class="inputDiv_dif">
    <div class="label_text16">
      <label>{{props.text}}<span class="_coRed" v-if="props.required">*</span></label>
    </div>
    <div class="input_por">
      <label for="releasesy" class='_cup'><v-field id='releasesy' :name="props.id" type="radio" value="y" v-model="releasesnValue"/><span class='_mal6'>使用</span></label>
      <label for="releasesn" class='_mal16_cup'><v-field id='releasesn' :name="props.id" type="radio" value="n" v-model="releasesnValue"/><span class='_mal6'>停用</span></label>
      <error-message :name="props.id" class="_formError"></error-message>
    </div>
  </div>
</template>
<style scoped>
</style>
