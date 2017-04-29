var apiKey = 'AIzaSyDcV3dvZfjny181wWJGCl9otO-o2_0mHZM';

var map;
var drawingManager;
var placeIdArray = [];
var polylines = [];
var polys = [];
var snappedCoordinates = [];
var coordinates = [];
var  polylinePlanCoordinates = [];
var polyMarkers = [];
var markers = [];
var currentPolyline = 0;
function initialize() {

  var daynight = document.querySelector('header');
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()

    if (hours < 6 || hours >= 17){
        console.log('night');
         var mapOptions = {
    zoom: 17,
    center: {lat: 0, lng: 0},
     styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
  };
    }
    if(hours >= 6 && hours < 17){
        console.log('day');
         var mapOptions = {
    zoom: 17,
    center: {lat: 0, lng: 0}
  
          };
    }


  map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var tripControl = document.getElementById('style-selector-control');
   map.controls[google.maps.ControlPosition.TOP_RIGHT].push(tripControl);


  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAolQeHX7UuLRE1_psv6Zet2mI7vs4vFWs",
    authDomain: "technocoup-165903.firebaseapp.com",
    databaseURL: "https://technocoup-165903.firebaseio.com",
    projectId: "technocoup-165903",
    storageBucket: "technocoup-165903.appspot.com",
    messagingSenderId: "35617699424"
  };
  firebase.initializeApp(config);

  var database = firebase.database();
  
 coordinates[currentPolyline] = [];

 polyMarkers[currentPolyline] = [];

 polys[currentPolyline] = [];
 
  $('#trip-selector').append('<option value="' + -1 + '">All Trips' + '</option>');
 $('#trip-selector').append('<option value="' + currentPolyline + '">Trip ' + (currentPolyline+1) + '</option>');


  
 
  var userId = '9922367414';  
  database.ref('/users/' + userId + '/locations').on('child_added', function(snapshot) {
   
    newPoint = snapshot.val();
   
    var point = new google.maps.LatLng(newPoint.lat, newPoint.lng);
   
     if(coordinates[currentPolyline].length > 1){
     var lastPoint = coordinates[currentPolyline][coordinates[currentPolyline].length-1];
      var distance = google.maps.geometry.spherical.computeDistanceBetween (lastPoint, point);
  
      if(distance > 1000)
      {
         currentPolyline++;
         $('#trip-selector').append('<option value="' + currentPolyline + '">Trip ' + (currentPolyline+1) + '</option>');
         coordinates[currentPolyline] = [];
         polyMarkers[currentPolyline] = [];
         polys[currentPolyline] = [];

      }
    }
   
    coordinates[currentPolyline].push(point);

     console.log(coordinates[currentPolyline]);
     initMap(coordinates[currentPolyline],  polyMarkers[currentPolyline], polys[currentPolyline]);
  // ... 
  });

/*  
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
    
    */

    $('#trip-selector').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
     
     if(valueSelected == -1)
     {
        polys.forEach(function(poly, index) {
           for (var i=0; i<poly.length; i++) {

            poly[i].setMap(map);
        }
        });
         
     } else {
          polys.forEach(function(poly, index) {
           for (var i=0; i<poly.length; i++) {

            poly[i].setMap(null);
        }
        });
          
          polyMarkers.forEach(function(marks, index) {
             for(i=0; i< marks.length; i++){
              marks[i].setMap(null);
            } 
          });
         

         for (var i=0; i<polys[valueSelected].length; i++) {

              polys[valueSelected][i].setMap(map);
          }

          for(i=0; i< polyMarkers[valueSelected].length; i++){
              polyMarkers[valueSelected][i].setMap(map);
            } 

      }  
     
   });
    

}

function initMap(polyCordinates, pmarkers, polys){

   
   map.setCenter(polyCordinates[polyCordinates.length-1]);
  
  var poly = new google.maps.Polyline({
        path: polyCordinates,
        geodesic: true,
        strokeColor: '#27ae60',
        strokeOpacity: 1.0,
        strokeWeight: 5
    });    
    
     var path = poly.getPath();
    polylines.push(poly);
    placeIdArray = [];
    runSnapToRoad(path, pmarkers, polys);
  
}

// Snap a user-created polyline to roads and draw the snapped path
function runSnapToRoad(path, pmarkers, polys) {
  var pathValues = [];
  for (var i = 0; i < path.getLength(); i++) {
    pathValues.push(path.getAt(i).toUrlValue());
  }

  $.get('https://roads.googleapis.com/v1/snapToRoads', {
    interpolate: true,
    key: apiKey,
    path: pathValues.join('|')
  }, function(data) {
    processSnapToRoadResponse(data);
    drawSnappedPolyline(pmarkers, polys);
  //  getAndDrawSpeedLimits();
  });
}

// Store snapped polyline returned by the snap-to-road service.
function processSnapToRoadResponse(data) {
  snappedCoordinates = [];
  placeIdArray = [];
  for (var i = 0; i < data.snappedPoints.length; i++) {
    var latlng = new google.maps.LatLng(
        data.snappedPoints[i].location.latitude,
        data.snappedPoints[i].location.longitude);
    snappedCoordinates.push(latlng);
    placeIdArray.push(data.snappedPoints[i].placeId);
  }
}


 var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">Vehicle Info</h3>'+
            '<div id="bodyContent">'+
            '<p><b>Owner : </b>Abhishek Wani<br/></p>' + 
            '<p><b>ID No : </b>9922367414' +
            '</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        
        

// Draws the snapped polyline (after processing snap-to-road response).
function drawSnappedPolyline(pmarkers, polys) {
  var snappedPolyline = new google.maps.Polyline({
    path: snappedCoordinates,
    strokeColor: '#27ae60',
    strokeWeight: 5
  });

  snappedPolyline.setMap(map);
  polys.push(snappedPolyline);
   
   
    
    for(i=0; i< pmarkers.length; i++){
        pmarkers[i].setMap(null);
    } 

    /*snappedCoordinates.forEach(function(cor, index){
         var marker = new google.maps.Marker({
          position: cor,
          map: map,
          label: 'S',
          title: 'Starting Position!'
        });
        
        pmarkers.push(marker);
    });*/ 
    
    var marker = new google.maps.Marker({
          position: snappedCoordinates[0],
          map: map,
          label: 'S',
          title: 'Starting Position!'
        });
        
        pmarkers.push(marker);
  
   

        
        var anchor = new google.maps.Point(20,25),
    size = new google.maps.Size(32,32),
    origin = new google.maps.Point(0.5,0.5);
        var icon = new google.maps.MarkerImage('../images/truck32.png',size,origin,anchor);
        
         
    
        
          var endmarker = new google.maps.Marker({
          position: snappedCoordinates[snappedCoordinates.length-1],
          map: map,
          icon: icon,
          flat: true,
          title: 'End Position!'
        });
        
             
        
        
         endmarker.addListener('click', function() {
          infowindow.open(map, endmarker);
        });
        
        pmarkers.push(endmarker);
    
}

// Gets speed limits (for 100 segments at a time) and draws a polyline
// color-coded by speed limit. Must be called after processing snap-to-road
// response.
function getAndDrawSpeedLimits() {
  for (var i = 0; i <= placeIdArray.length / 100; i++) {
    // Ensure that no query exceeds the max 100 placeID limit.
    var start = i * 100;
    var end = Math.min((i + 1) * 100 - 1, placeIdArray.length);

    drawSpeedLimits(start, end);
  }
}

// Gets speed limits for a 100-segment path and draws a polyline color-coded by
// speed limit. Must be called after processing snap-to-road response.
function drawSpeedLimits(start, end) {
    var placeIdQuery = '';
    for (var i = start; i < end; i++) {
      placeIdQuery += '&placeId=' + placeIdArray[i];
    }

    $.get('https://roads.googleapis.com/v1/speedLimits',
        'key=' + apiKey + placeIdQuery,
        function(speedData) {
          processSpeedLimitResponse(speedData, start);
        }
    );
}

// Draw a polyline segment (up to 100 road segments) color-coded by speed limit.
function processSpeedLimitResponse(speedData, start) {
  var end = start + speedData.speedLimits.length;
  for (var i = 0; i < speedData.speedLimits.length - 1; i++) {
    var speedLimit = speedData.speedLimits[i].speedLimit;
    var color = getColorForSpeed(speedLimit);

    // Take two points for a single-segment polyline.
    var coords = snappedCoordinates.slice(start + i, start + i + 2);

    var snappedPolyline = new google.maps.Polyline({
      path: coords,
      strokeColor: color,
      strokeWeight: 6
    });
    snappedPolyline.setMap(map);
    polylines.push(snappedPolyline);
  }
}

function getColorForSpeed(speed_kph) {
  if (speed_kph <= 40) {
    return 'purple';
  }
  if (speed_kph <= 50) {
    return 'blue';
  }
  if (speed_kph <= 60) {
    return 'green';
  }
  if (speed_kph <= 80) {
    return 'yellow';
  }
  if (speed_kph <= 100) {
    return 'orange';
  }
  return 'red';
}

$(window).load(initialize);

 