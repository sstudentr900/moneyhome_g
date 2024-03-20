<script setup>
  import publicQrcode from './publicQrcode.vue'
  import {ref} from 'vue'
  const props = defineProps({
    class:{
      type: String,
      default:''
    }
  })
  function onSubmit(values) {
    alert(JSON.stringify(values, null, 2));
  }
  // const onSubmit = (values)=>{
  //   // console.log('18',e)
  //   alert(JSON.stringify(values, null, 2));
  //   // 使用 Vee Validate 的 validate 函式來驗證表單
  //   // this.$refs.form.validate().then((valid) => {
  //   //   if (valid) {
  //   //     console.log(' 驗證通過，可以提交表單')
  //   //     // axios
  //   //     //   .get(`http://localhost:3000/user?email=${this.email}&password=${this.password}`)
  //   //     //   .then((res) => {
  //   //     //     // console.log(res);
  //   //     //     // alert("登入成功");
          
  //   //     //     // 假設網路請求成功取得資料集
  //   //     //     // 變數 newName 指資料集裡的第一個物件值
  //   //     //     const newName = res.data[0]; 
  //   //     //     // console.log(newName)
  //   //     //     // 令 data() 裡的 name 為資料集的 name
  //   //     //     this.name = newName.name; 
  //   //     //     this.email = newName.email;
  //   //     //     this.id = newName.id;
  //   //     //     // 使用 Pinia 中的 updateUser action 更新 store 裡的 state 資料
  //   //     //     // (1)訪問 store 中的狀態和執行。這寫法是直接在方法中取得 store 實例(userStore)
  //   //     //     const userStore = useLoginStore(); 
  //   //     //     // (2)操作這實例(userStore)去調用 updateName ，將 axios.get 取得的 newName.name 更新到 store 的 name 狀態中
  //   //     //     userStore.updateName(newName.name); 
  //   //     //     userStore.updateEmail(newName.email); 
  //   //     //     userStore.updateId(newName.id); 
  //   //     //     // 印出來看 newName.name 值
  //   //     //     // console.log("User data updated:", newName.name);
  //   //     //     // 網路請求成功後清空表單欄位(初始化)
  //   //     //     // this.$refs.form.resetForm();
  //   //     //     this.$router.push("/login/main");
  //   //     //   })
  //   //     //   .catch((error) => {
  //   //     //     console.log(error);
  //   //     //     // alert("您尚未成為會員，請先註冊");
  //   //     //     console.log('您尚未成為會員，請先註冊')
  //   //     //   });
  //   //   } else {
  //   //     // 驗證不通過不予提交並顯示錯誤訊息
  //   //     // alert("請確實填寫資料後提交");
  //   //     console.log('請確實填寫資料後提交')
  //   //   }
  //   // });
  // }
</script>

<template>
  <div class="publicContact_dif_jce" :class="props.class">
    <!-- <form action="">
      <div class="_dif_aic_gap16">
        <div class="_dif_mab32_wi50">
          <div class="label_text16_ls2">
            <label for="姓名">姓名<span class="_coRed">*</span></label>
          </div>
          <div class="input_wi100">
            <input class='_wi100' type="text" name="姓名">
          </div>
        </div>
        <div class="_dif_mab32_wi50">
          <div class="label_text16_ls2">
            <label for="電話">電話</label>
          </div>
          <div class="input_wi100">
            <input class='_wi100' type="text" name="電話">
          </div>
        </div>
      </div>
      <div class="_dif_mab32">
        <div class="label_text16_ls2">
          <label for="電郵">電郵<span class="_coRed">*</span></label>
        </div>
        <div class="input_wi100">
          <input class='_wi100' type="text" name="電郵">
        </div>
      </div>
      <div class="_dif_mab32">
        <div class="label_text16_ls2">
          <label for="內容">內容<span class="_coRed">*</span></label>
        </div>
        <div class="input_wi100">
          <textarea class='_wi100' name="內容" rows="4" cols="50"></textarea>
        </div>
      </div>
      <div class="btnDiv_tac">
        <input class='_btn_dii_br0' type="button" value="發送留言">
      </div>
    </form> -->
    <v-form id="form" ref="form" v-slot="{ errors }"  @submit="onSubmit">
      <div class="_dif_aic_gap16">
        <div class="_dif_mab32_wi50">
          <div class="label_text16_ls2">
            <label for="name">姓名<span class="_coRed">*</span></label>
          </div>
          <div class="input_wi100_por">
            <v-field
              class='inputTag_wi100' 
              type="text" 
              name="name"
              placeholder="請輸入姓名"
              rules="required|max:10"
              :class="{ 'error': errors['姓名'] }"
            ></v-field>
            <error-message name="name" class="__formError"></error-message>
          </div>
        </div>
        <div class="_dif_mab32_wi50">
          <div class="label_text16_ls2">
            <label for="phone">電話</label>
          </div>
          <div class="input_wi100_por">
            <v-field
              class='inputTag_wi100' 
              type="text" 
              name="phone"
              placeholder="請輸入電話"
              rules="numeric|max:12"
              :class="{ 'error': errors['phone'] }"
            ></v-field>
            <error-message name="phone" class="_formError"></error-message>
          </div>
        </div>
      </div>
      <div class="_dif_mab32">
        <div class="label_text16_ls2">
          <label for="email">電郵<span class="_coRed">*</span></label>
        </div>
        <div class="input_wi100_por">
          <v-field
              class='inputTag_wi100' 
              type="text" 
              name="email"
              placeholder="請輸入電郵"
              rules="required|email|max:50"
              :class="{ 'error': errors['email'] }"
            ></v-field>
            <error-message name="email" class="_formError"></error-message>
        </div>
      </div>
      <div class="_dif_mab32">
        <div class="label_text16_ls2">
          <label for="content">內容<span class="_coRed">*</span></label>
        </div>
        <div class="input_wi100_por">
          <v-field
              class='inputTag_wi100' 
              as="textarea"
              name="content"
              placeholder="請輸入內容"
              rules="required|max:200"
              :class="{ 'error': errors['content'] }"
              cols="30" 
              rows="10"
            ></v-field>
            <error-message name="content" class="_formError"></error-message>
        </div>
      </div>
      <div class="btnDiv_tac">
        <button class='_btn_dii_br0'>發送留言</button>
        <!-- <input class='_btn_dii_br0' type="submit" value="發送留言"> -->
      </div>
    </v-form>
  </div>
  <publicQrcode :class="props.class"/>
</template>
<style scoped>
  [class^='publicContact'] textarea{
    height: 180px;
  }
  [class^='label']{
    padding-right: 12px;
    flex: 0 0 58px;
    text-align: right;
    color: #fff;
  }
  [class^='inputTag']{
    background: none;
    border: none;
    width: 100%;
    padding: 8px;
    line-height: 1;
    font-size: 16px;
    color: #fff;
    border: 1px solid #FFF;
  }
  [class^='inputTag']:focus-visible {
    border-radius: 0;
    outline: none;
  }
  [class^='btnDiv']{
    margin-left: 58px;
  }
  [class^='btnDiv'] input{
    padding: 12px 36px;
  }
  /*sty2*/
  [class^='publicContact'].style2 [class^='label']{
    color: #212121;
  }
  [class^='publicContact'].style2 [class^='inputTag']{
    border: 1px solid #212121;
    color: #212121;
  }
  [class^='publicContact'].style2 [class*='_btn'] {
    color: #212121;
    border: 1px solid #212121;
  }
  [class^='publicContact'].style2 [class*='_btn']:hover {
    background: #212121;
    color: #fff;
  }
</style>
