<?php
include "../config/conexion.php";
$modi = $_REQUEST["mod"];
$nombre = $_REQUEST['nomb'];
$marca = $_REQUEST['marc'];
$numero = $_REQUEST['num'];
$donado = $_REQUEST['donad'];
$tipous = $_REQUEST['tipou'];
$estado= $_REQUEST['esteq'];
$descripcion = $_REQUEST['descr'];
$mensaje = "";

        $consulta  = "UPDATE equipos SET nombre'" .$nombre. "', marca='" . $marca . "', numeroserie='".$numero."',donadopor='".$donado."',tipouso='".$tipous."',estado='".$estado."',descripcion='".$descripcion."' WHERE idequipo='".$modi."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
        
echo $mensaje;

?>