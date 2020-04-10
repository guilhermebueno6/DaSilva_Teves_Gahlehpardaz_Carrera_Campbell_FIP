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
          <a href="#about">Learn More</a>
        </button>
        <button class="contact-us">
          <a href="#contact">Contact Us</a>
        </button>
      </div>
    </section>
    <InfoCards />
    <About />
    <Locate />
    <Video />
    <Contact />
  </div>
</template>
<script>
  import InfoCards from '../components/InfoCards';
  import About from '../components/About';
  import Locate from '../components/Locate';
  import Video from '../components/Video';
  import Contact from '../components/Contact';
  export default {
    name: 'home',
    components: {
      InfoCards,
      About,
      Locate,
      Video,
      Contact
    }
  }
</script>

  


    