<template>
  <div>
    <router-view/>
    <Footer />
  </div>
</template>
<script>
  import Login from '../components/Login.vue';
  import Footer from '../components/partials/Footer.vue';
  export default {
    name: 'Admin',
    components: {
      Login,
      Footer
    }
  }
</script>