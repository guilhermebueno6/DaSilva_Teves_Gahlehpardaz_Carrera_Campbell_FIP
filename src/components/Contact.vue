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
        <input type="text" id="name" name="name"><br>

        <label for="subject">Subject</label><br>
        <input type="text" id="subject" name="subject"><br>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="phone">Phone</label><br>
        <input type="text" id="phone" name="phone"><br>

        <label for="message">Message</label><br>
        <input type="text" id="message" name="message"><br>

        <button type="submit" value="Submit">Submit</button>
      </form>
    </div>
  </section>
</template>
<script>
export default {
  name: 'Contact'
}
</script>