<script setup>
</script>
<template>
  <div class="publicNumber_dif_aic_bgWhite">
    <div class="reduce_dif_cup">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="3" viewBox="0 0 14 3" fill="none">
        <path d="M12.2985 0H1.46517C0.866861 0 0.381836 0.671573 0.381836 1.5C0.381836 2.32843 0.866861 3 1.46517 3H12.2985C12.8968 3 13.3818 2.32843 13.3818 1.5C13.3818 0.671573 12.8968 0 12.2985 0Z" fill="#212121"/>
      </svg>
    </div>
    <div class="input">
      <input type="number" value="1">
    </div>
    <div class="add_cup">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
        <path d="M12.2985 5.41667H7.96517V1.08333C7.96517 0.796016 7.85103 0.520466 7.64787 0.317301C7.4447 0.114137 7.16915 0 6.88184 0C6.59452 0 6.31897 0.114137 6.1158 0.317301C5.91264 0.520466 5.7985 0.796016 5.7985 1.08333V5.41667H1.46517C1.17785 5.41667 0.902302 5.5308 0.699137 5.73397C0.495973 5.93713 0.381836 6.21268 0.381836 6.5C0.381836 6.78732 0.495973 7.06287 0.699137 7.26603C0.902302 7.4692 1.17785 7.58333 1.46517 7.58333H5.7985V11.9167C5.7985 12.204 5.91264 12.4795 6.1158 12.6827C6.31897 12.8859 6.59452 13 6.88184 13C7.16915 13 7.4447 12.8859 7.64787 12.6827C7.85103 12.4795 7.96517 12.204 7.96517 11.9167V7.58333H12.2985C12.5858 7.58333 12.8614 7.4692 13.0645 7.26603C13.2677 7.06287 13.3818 6.78732 13.3818 6.5C13.3818 6.21268 13.2677 5.93713 13.0645 5.73397C12.8614 5.5308 12.5858 5.41667 12.2985 5.41667Z" fill="#212121"/>
      </svg>
    </div>
  </div>
</template>
<style scoped>
[class^='publicNumber']{
  max-width: 120px;
  border: 1px solid #212121;
}
[class^='publicNumber'] input{
  width: 100%;
  border: none;
  font-size: 16px;
  text-align: center;
  line-height: 1;
  padding-bottom: 3px;
}
[class^='publicNumber'] input:focus-visible{
  /* border: none; */
  outline: none;
}
[class^='publicNumber'] input::-webkit-outer-spin-button,
[class^='publicNumber'] input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
        
/* Firefox */
[class^='publicNumber'] input{
  -moz-appearance: textfield;
}
[class^='publicNumber']>div{
  padding: 8px 12px;
}
[class^='publicNumber'] .input{
  padding: 8px 0;
}
</style>
