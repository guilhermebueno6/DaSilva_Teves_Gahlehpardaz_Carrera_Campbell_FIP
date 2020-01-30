<template>
  <div class="card">
    <!-- <object type="image/svg+xml" :data="card.icon" class="icon"></object> -->
    <h2 class="title">{{ card.title }}</h2>
    <p class="description">{{ card.description }}</p>
  </div>
</template>
<script>
export default {
  props: [
    'card'
  ]
};
</script>