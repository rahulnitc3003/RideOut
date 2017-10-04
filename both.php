<input id="origin-input" class="controls" type="text" placeholder="Enter an origin location">

<input id="destination-input" class="controls" type="text" placeholder="Enter a destination location">

<div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOs735Nv4ymhLSmNDvkpK3NRCEOOvKlyg&libraries=places&callback=initMap" async defer>
</script>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      mapTypeControl: false,
      center: {
        lat: -33.8688,
        lng: 151.2195
      },
      zoom: 13
    });

    new AutocompleteDirectionsHandler(map);
  }

function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'WALKING';
  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');
  var modeSelector = document.getElementById('mode-selector');
  this.directionsService = new google.maps.DirectionsService;
  this.directionsDisplay = new google.maps.DirectionsRenderer;
  this.directionsDisplay.setMap(map);

  var originAutocomplete = new google.maps.places.Autocomplete(
    originInput, {
      placeIdOnly: true
    });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput, {
      placeIdOnly: true
    });

  this.setupClickListener('changemode-walking', 'WALKING');
  this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener('changemode-driving', 'DRIVING');

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
  var radioButton = document.getElementById(id);
  var me = this;
  radioButton.addEventListener('click', function() {
    me.travelMode = mode;
    me.route();
  });
};
</script>