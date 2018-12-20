<script>
  function initMap() {
    // The location of Uluru
    var uluru = {lat: 37.941683, lng: 23.652626};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 16, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
  }
  </script>
  <!--Load the API from the specified URL
  * The async attribute allows the browser to render the page while the API loads
  * The key parameter will contain your own API key (which is not needed for this tutorial)
  * The callback parameter executes the initMap() function
  -->
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDba09xc7AdNwUdpEStGjy7Wrlj51OPB4A&callback=initMap">
  </script>