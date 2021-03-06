<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);

?>
<?php
$lat = $_REQUEST["lat"];
$lon = $_REQUEST["lon"];

if ($lat == "") {
    $lat = 13.6362046;
}

if ($lon == "") {
    $lon = -88.7860364;
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      
      }
      #map {
        width: 100%;
        height: 80%;
      }
      #coords{width: 500px;}
    </style>

<script type="text/javascript">



</script>

    
    

</head>

<body>

<body >
    <div id="map"></div>

    
    
    
    <script>


var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function ()
{

    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa


          },function(error){console.log(error);});

}



function setMapa (coords)
{
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 14,
        center:new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>),

      });

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>),

      });
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
      //cuando el usuario a soltado el marcador
      marker.addListener('click', toggleBounce);//para que el marcador salte

      marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coordsLa").value = this.getPosition().lat();
    document.getElementById("coordsLo").value=this.getPosition().lng();
      });
}

//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

// Carga de la libreria de google maps

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlijOXxiXq64CV0DrTwULTOmR-eogwVW8&callback=initMap"></script>

   
  </body>
</html>
