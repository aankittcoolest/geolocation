<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Geolocation</title>
  </head>
  <body>
      <a href="#" id="get_location">Get Location</a>
      <div id="map">
          <iframe id="google_map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0"  src="https://maps.google.co.jp?output=embed" ></iframe>
      </div>

      <script src="js/Modernizr.js"></script>
      <script>
          var c = function(pos) {
            var lat = pos.coords.latitude,
                long = pos.coords.longitude,
                acc = pos.coords.accuracy,
                coords = lat + ', ' + long;

                document.getElementById('google_map').setAttribute('src', 'https://maps.google.co.jp/?q=' + coords + '&z=60&output=embed');
          }

          var e = function(error) {
            if(error.code === 1) {
                alert("unable to get location");
            } else if(error.code === 2) {
              alert("oops there is no network");
            } else if(error.code === 3) {
              alert("Your network connection seems slow! Burst out on your service provider");
            }
          }

          document.getElementById('get_location').onclick = function()  {
              navigator.geolocation.getCurrentPosition(c, e, {
                  enableHighAccuracy: true,
                  maximumAge: 100000, //cache location for 100 sec
                  timeout: 100000     //timeout after 100 sec
              });
              return false;
          }
      </script>
  </body>
</html>
