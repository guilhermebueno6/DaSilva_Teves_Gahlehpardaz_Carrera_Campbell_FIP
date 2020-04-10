<template>
  <div id="video">
    <div class="player-container">
      <vue-core-video-player :src="url" preload="metadata"></vue-core-video-player>
    </div>
  </div>
</template>
<script>
const videoFile = require('@/assets/SafeHubsVid.mp4');

export default {
  name: 'Video',
  data: function() {
    return {
      url: videoFile,
    }
  }
}

</script>