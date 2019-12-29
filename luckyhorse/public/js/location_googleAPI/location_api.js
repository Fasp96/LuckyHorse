function initialize() {
    var input = document.getElementById('location');
    new google.maps.places.Autocomplete(input);
  }
google.maps.event.addDomListener(window, 'load', initialize);