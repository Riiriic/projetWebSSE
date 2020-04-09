<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>MAP</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css" rel="stylesheet" />
<link rel="stylesheet" href="vieWmap.css">
</head>
<body>
<div id="contient-elt">
<div id="map"></div>

</div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYWxpb3VuZSIsImEiOiJjazdleHl5OHQwNGVtM2ZzNW0xM3JiOXduIn0.k6hPMKQ6eZOLjBzc5WFm7Q';
var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11',
center: [5.016667,47.316667], // position de depart
zoom: 9 
});
// ajout zoom et controle la rotation de la map.
map.addControl(new mapboxgl.NavigationControl());
</script>
</body>
</html>




		
