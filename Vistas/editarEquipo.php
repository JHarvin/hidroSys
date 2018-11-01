<?php
include "../conexion/conexion.php";
$modi = $_REQUEST['mod'];
$nombre = $_REQUEST['nomb'];
$marca = $_REQUEST['marc'];
$numero = $_REQUEST['num'];
$donado = $_REQUEST['donad'];
$tipous = $_REQUEST['tipou'];
$estado= $_REQUEST['esteq'];
$descripcion = $_REQUEST['descr'];
$mensaje = "";

$consulta = "UPDATE equipos SET nombre'" . $nombre . "', descripcion='" . $descripcion . "', tipouso='" . $tipous . "',marca='" . $marca . "',numeroserie='" . $numero . "',donadopor='" . $donado . "',estado='" . $estado . "' WHERE idequipo='" . $modi . "'";
$resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
        
echo $mensaje;

?>