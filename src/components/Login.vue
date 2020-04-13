<template>
  <div class="container">
    <div class="adminLogin">
      <div class="logo">
        <img src="@/assets/logo.svg">
      </div>
      <div><h2>Admin Login</h2></div>
      <form>
        <div class="formGroup">
          <label label-for="exampleInputUsername1">
            Username
          </label>
          <br>
          <input type="text" v-model="logDetails.username" id="exampleInputUsername1" placeholder="Enter username">
        </div>
        <div class="formGroup">
          <label label-for="exampleInputPassword1">
            Password
          </label>
          <br>
          <input type="password" v-model="logDetails.password" id="exampleInputPassword1" placeholder="Enter password">
        </div>
        <div>
          <button @click="checkLogin();" variant="primary" class="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Login',
  data: function() {
    return {
      successMessage: null,
      errorMessage: null,
      logDetails: {username: '', password: ''}
    }
  },
  methods: {
    checkLogin(){
      var form_data = new FormData();
      for(var key in this.logDetails){
        form_data.append(key, this.logDetails[key]);
      }
      axios.post('api/user_login.php', form_data)
        .then((response) => {
          console.log(response);
          if(response.data.message.error){
            console.log(response.data.message.message);
            this.errorMessage = response.data.message.message;
          } else {
            this.successMessage = response.data.message.message;
            this.logDetails = {username: '', password: ''};
            localStorage.isRestricted = response.data.message.restricted;
            this.$router.push('/Admin/Dashboard');
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },

    clearMessage(){
      this.errorMessage = '';
      this.successMessage = '';
    },
  }
}
</script>