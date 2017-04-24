<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Transendo | Track Your Trip</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAr-ysFYTqxcjFP32_d4n18YoRmHikAEX4&sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
   $(document).ready(function() {
    
  /*  var polylinePlanCoordinates  = [];
     var polyline_data = <?php echo json_encode( $locations ); ?>;
     for (var i=0;i< polyline_data.length;i++ ){
      polylinePlanCoordinates.push(new google.maps.LatLng(polyline_data[i]['lat'], polyline_data[i]['lng']));
    }
*/
   

  var polylinePlanCoordinates = [
    <?php
    //If konesi.php outputs ANYTHING, the map will fail to load. However, you should
    //change the connection variable to $connection = mysqli_connect("HOST","USERNAME","PASSWORD","DATABASE");
    


  
    //Assuming route that lat and long coordinates are in multiple records and not in a array within a single record
    //Loop through all records and echo out the positions
    

    foreach($locations as $location)
    {
       $lat = $location->lat;
       $lon = $location->lng;
       echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';
    }

    ?>

    ]; 
    
     console.log(polylinePlanCoordinates);

    var mapOptions = {
    zoom: 18,
    center: polylinePlanCoordinates[0],
    mapTypeId: google.maps.MapTypeId.TERRAIN
    };


   


    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


     var marker = new google.maps.Marker({
          position: polylinePlanCoordinates[0],
          map: map,
          label: 'S',
          title: 'Starting Position!'
        });

 

    var flightPath = new google.maps.Polyline({
        path: polylinePlanCoordinates,
        geodesic: true,
        strokeColor: '#cddc39',
        strokeOpacity: 1.0,
        strokeWeight: 5
    });

    flightPath.setMap(map);


     var marker = new google.maps.Marker({
          position: polylinePlanCoordinates[polylinePlanCoordinates.length-1],
          map: map,
          label: 'E',
          title: 'End Position!'
        });


    });
    
    </script>
    </head>
    <body>
        <div id="map-canvas"></div>
    </body>
</html>

