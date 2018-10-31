<?php
include "../config/conexion.php";

$nombre = $_POST['nomb'];
$marca = $_POST['marc'];
$numero = $_POST['num'];
$donado = $_POST['donad'];
$grado = $_POST['grado'];
$estado= $_POST['esteq'];
$descripcion = $_POST['descr'];
$mensaje = "";

        $consulta  = "UPDATE equipos SET nombre'" .$nombre. "', marca='" . $marca . "', numeroserie='".$numero."',donadopor='".$donado."',tipouso='".$grado."',estado='".$estado."',descripcion='".$descripcion."' WHERE nombre='".$nombre."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
        
echo $mensaje;

?>