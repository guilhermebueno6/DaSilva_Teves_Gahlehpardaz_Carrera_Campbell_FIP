<template>
  <div class="container">
    <section class="hero">
      <h1 class="title">
        Get The Facts
      </h1>
      <p class="subtitle">
        9:00AM to 5:00PM <br> Monday to Friday
      </p>
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
    <About />
    <Locate />
  </div>
</template>
<script>
  import InfoCards from '../components/InfoCards';
  import About from '../components/About';
  import Locate from '../components/Locate';
  export default {
    name: 'home',
    components: {
      InfoCards,
      About,
      Locate
    }
  }
</script>

  


    