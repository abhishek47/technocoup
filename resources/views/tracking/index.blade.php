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
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcV3dvZfjny181wWJGCl9otO-o2_0mHZM&libraries=drawing,places,geometry"></script>
      
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
 <script src="/js/track.js"></script>  
  </head>

  <body>
    <div id="map"></div>
    <div id="bar">
      <p class="auto"><input type="text" id="autoc"/></p>
      <p><a id="clear" href="#">Click here</a> to clear map.</p>
    </div>
  </body>
</html>