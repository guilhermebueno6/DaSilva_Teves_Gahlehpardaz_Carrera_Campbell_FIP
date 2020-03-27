
  function initMap() {
    var safeSites = [//For this well need to fetch it on the php for the markers
      ['Toronto Public Health',43.656591, -79.379389, 1],
      ['Fred Victor Housing', 43.653637, -79.372980, 2],
      ['South Riverdale Community Health Centre', 43.661130, -79.339153, 3],
      ['Parkdale Queen West Community Health Centre', 43.642073, -79.429520, 4]
    ];

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(43.575660, -79.830231),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [
      {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ffb7fd"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#ffb7fd"
          }
        ]
      },
      {
        "featureType": "landscape.man_made",
        "stylers": [
          {
            "color": "#eecece"
          }
        ]
      },
      {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eecece"
          }
        ]
      },
      {
        "featureType": "landscape.man_made",
        "elementType": "labels",
        "stylers": [
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "landscape.natural",
        "stylers": [
          {
            "color": "#eacece"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ffaaaa"
          }
        ]
      },
      {
        "featureType": "road",
        "stylers": [
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "labels",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road.local",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "transit",
        "stylers": [
          {
            "color": "#ffaaaa"
          }
        ]
      },
      {
        "featureType": "water",
        "stylers": [
          {
            "color": "#ffaaaa"
          }
        ]
      }
    ]
    
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;
  var customMarker = 'images/marker.png';

  for (i = 0; i < safeSites.length; i++) {  
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(safeSites[i][1], safeSites[i][2]),
      map: map,
      icon: customMarker
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(safeSites[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
    // let pos;
    // pos = {
    //   lat: position.coords.latitude,
    //   lng: position.coords.longitude
    //   }
  }