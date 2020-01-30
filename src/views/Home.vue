<template>
  <div class="home">
    <section class="hero">
      <h1 class="title">
        This is the title
      </h1>
      <h2 class="subtitle">
        This is the subtitle
      </h2>
      <div class="buttons">
        <button class="learn-more">
          Learn More
        </button>
        <button class="contact-us">
          Contact Us
        </button>
      </div>
    </section>
    <InfoCards />
  </div>
</template>
<script>
  import InfoCards from '../components/InfoCards';
  export default {
    name: 'home',
    components: {
      InfoCards
    }
  }
</script>
  


    