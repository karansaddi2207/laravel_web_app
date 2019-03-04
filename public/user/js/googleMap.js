function loadMap() {
  // The location of Uluru
  var uluru = {lat: 51.4975, lng: 0.1357};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
