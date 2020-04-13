<template>
  <div>
    <Nav />
    <div class="container">
      <Hero />
      <InfoCards />
      <About />
      <Locate />
      <Video />
      <Contact />
    </div>
    <Footer />
  </div>
</template>
<script>
  import Nav from '../components/partials/Nav.vue';
  import Hero from '../components/Hero';
  import InfoCards from '../components/InfoCards';
  import About from '../components/About';
  import Locate from '../components/Locate';
  import Video from '../components/Video';
  import Contact from '../components/Contact';
  import Footer from '../components/partials/Footer.vue';
  export default {
    name: 'home',
    components: {
      Nav,
      Hero,
      InfoCards,
      About,
      Locate,
      Video,
      Contact,
      Footer
    }
  }
</script>