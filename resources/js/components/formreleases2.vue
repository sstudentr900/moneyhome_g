<script setup>
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
    }
  })
</script>
<template>
  <div class="inputDiv_dif">
    <div class="label_text16">
      <label :for="props.id">{{ props.text }} <span class="_coRed" v-if="props.required">*</span></label>
    </div>
    <div class="input_por">
      <label class="puplicSwitch">
        <!-- rules="required" -->
        <v-field
          class="inputTag"
          type="checkbox"
          :name="props.id"
        ></v-field>
        <span></span>
      </label>
      <error-message :name="props.id" class="_formError"></error-message>
    </div>
  </div>
</template>
<style scoped>
  /*puplicSwitch*/
  .puplicSwitch{
    display: block;
    width: 200px;
  }
  .puplicSwitch input {
    display: none;
  }
  
  .puplicSwitch span {
    cursor: pointer;
    width: 52px;
    height: 24px;
    background: #BEBEBE;
    display: block;
    border-radius: 20px;
    position: relative;
  }
  
  .puplicSwitch span:after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 10px;
    transition: 0.3s;
  }
  
  .puplicSwitch.active span,
  .puplicSwitch input:checked+span {
    background: #DC5B64;
  }
  
  .puplicSwitch.active span:after,
  .puplicSwitch input:checked+span:after {
    left: calc(100% - 2px);
    transform: translateX(-100%);
  }
</style>
