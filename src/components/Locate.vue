<template>
  <div id="locate">
    <GmapMap ref="hiv-aids-connection" :center="center" :zoom="9">
      <GmapInfoWindow :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
        <p class="place-title">{{infoName}}</p>
        <p>{{infoStreet}} {{infoCity}} {{infoZip}}</p>
        <p><a v-bind:href="'tel:' + infoPhone">{{infoPhone}}</a></p>
        <p>{{infoHours}}</p>
      </GmapInfoWindow>
      <GmapMarker v-for="(item, key) in markers" :key="key" :position="getPosition(item)" :clickable="true" @click="toggleInfo(item, key)" :icon="markerOptions"/>
    </GmapMap>
  </div>
</template>
<script>
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
//import gmapsInit from '../utils/gmaps';

Vue.use(VueAxios, axios)

const mapMarker = require('@/assets/marker.svg');

export default {
  name: 'Locate',
  data: function() {
    return {
      center: {
        lat: 43.4, 
        lng: -80.3
      },
      markers: null,
      markerOptions: {
        url: mapMarker,
        size: {width: 60, height: 60, f: 'px', b: 'px',},
        scaledSize: {width: 30, height: 30, f: 'px', b: 'px',},
      },
      infoPosition: null,
      infoName: null,
      infoStreet: null,
      infoCity: null,
      infoZip: null,
      infoPhone: null,
      infoHours: null,
      infoOpened: false,
      infoCurrentKey: null,
      infoOptions: {
        pixelOffset: {
          width: -15,
          height: -60
        }
      },
    }
  },
  async mounted() {
    Vue.axios.get('/api/index.php').then(
      response => {
        this.markers = response.data;
      },
      err => {
        console.log(err)
      }
    );
  },
  methods: {
    getPosition: function(marker) {
      return {
        lat: parseFloat(marker.place_lat),
        lng: parseFloat(marker.place_lng)
      }
    },
    toggleInfo: function(marker, key) {
      this.infoPosition = this.getPosition(marker);
      this.infoName = marker.place_name;
      this.infoStreet = marker.place_street;
      this.infoCity = marker.place_city;
      this.infoZip = marker.place_zip;
      this.infoPhone = marker.place_phone;
      this.infoHours = marker.place_hours;
      if (this.infoCurrentKey == key) {
        this.infoOpened = !this.infoOpened;
      } else {
        this.infoOpened = true;
        this.infoCurrentKey = key;
      }
    }
  }
}
</script>

