<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Track My Vehicle | Technocoup</title>
    <style>
      html, body, #map {
        height: 100%;
        margin: 0px;
        padding: 0px
      }

      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }

      #bar {
        width: 240px;
        background-color: rgba(255, 255, 255, 0.75);
        margin: 8px;
        padding: 4px;
        border-radius: 4px;
      }

      #autoc {
        width: 100%;
        box-sizing: border-box;
      }
       .map-control {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        font-family: 'Roboto','sans-serif';
        margin: 10px;
        /* Hide the control initially, to prevent it from appearing
           before the map loads. */
        display: none;
      }
      /* Display the control once it is inside the map. */
      #map .map-control { display: block; position: absolute; top: 5px;
        right: 50%;, z-index: 5; background-color: #fff;padding: 5px;border: 1px solid #999;}

      .selector-control {
        font-size: 14px;
        line-height: 30px;
        padding-left: 5px;
        padding-right: 5px;
        width: 200px;
      }

      .map-control p {
            margin: 0px;
          margin-bottom: 7px;
          margin-left: 2px;
          font-size: 13px;
          font-weight: bold;
      }


    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcV3dvZfjny181wWJGCl9otO-o2_0mHZM&libraries=drawing,places,geometry"></script>
      
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
 <script src="/js/track.js"></script>  
  </head>

  <body>
     <div id="style-selector-control"  class="map-control">
      <p>Filter Your Trips</p>
      <select id="trip-selector" class="selector-control">
      </select>
    </div>
    <div id="map"></div>
   
  </body>
</html>