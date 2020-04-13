import Vue from 'vue';
import App from './App.vue';
import router from './router';
import './sass/main.scss';

// Vue.config.productionTip = false;
// Vue.config.devtools = false;

import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBi0jMhf869hKll7PKttjAkljnJGJo2RcA'
    },

    installComponents: true
})

import VueCoreVideoPlayer from 'vue-core-video-player';

Vue.use(VueCoreVideoPlayer)

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
