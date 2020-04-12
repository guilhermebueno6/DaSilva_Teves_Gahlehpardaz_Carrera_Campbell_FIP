<template>
  <section id="contact">
    <div class="social-card">
      <h2>Check Out Our Facebook and Twitter.</h2>
      <p><i class="fab fa-facebook-square"></i>@RHAConnection</p>
      <p><i class="fab fa-twitter"></i>@RHAConnection</p>
    </div>

    <h2>Contact Us</h2>
    <p>Get the facts, and the help you need.</p>
    <div class="contact-card">
      <img src="@/assets/OeXcIHFwtsM-unsplash.jpg">
      <form>
        <h2>Don't Hesitate To Contact Us, It's Anonymous.</h2>
        <label for="name">Full Name</label><br>
        <input v-model="name" type="text" id="name" name="name"><br>

        <label for="subject">Subject</label><br>
        <input v-model="subject" type="text" id="subject" name="subject"><br>

        <label for="email">Email</label><br>
        <input v-model="email" type="email" id="email" name="email"><br>

        <label for="phone">Phone</label><br>
        <input v-model="phone" type="tel" id="phone" name="phone"><br>

        <label for="message">Message</label><br>
        <input v-model="message" type="text" id="message" name="message"><br>

        <div><button type="submit" @click="submit()" value="Submit">Submit</button>
        <span v-if="formSubmitted">Sent</span></div>
      </form>
    </div>
  </section>
</template>
<script>
import emailjs from 'emailjs-com';

export default {
  name: 'Contact',
  data () {
    return {
      name: null,
      subject: null,
      email: null,
      phone: null,
      message: null,
      formSubmitted: false,
      formInvalid: false
    }
  },
  methods: {
    submit () {
      event.preventDefault()
      if(this.name !== null && this.subject !== null && this.email !== null && this.phone !== null && this.message !== null){
        this.formInvalid = false
        this.formSubmitted = false
        emailjs.init('user_odsIGV4ptj8xmBBPW7S0R')
        emailjs.send(
          'default_service',
          'template_QLNza751',
          {name: this.name, subject: this.subject, email: this.email, phone: this.phone, message: this.message}
        ).then((response) => {
          this.formSubmitted = true
          console.log('Success', response)
          this.name = ""
          this.subject = ""
          this.email = ""
          this.phone = "" 
          this.message = ""
        }, (error) => {
          console.log('Failed', error)
        })
      } else {
        this.formInvalid = true
      }
    }
  }
}
</script>