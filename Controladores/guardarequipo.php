<?php
include "../ProcesoSubir/conexion.php";
$nom = $_POST['nombre'];
$descrip = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$marc = $_POST['marc'];
$numserie = $_POST['numserie'];
$donadores = $_POST['Donantes'];
$estado = $_POST['estado'];
$mensaje = "";

        $consulta  = "INSERT INTO equipos(nombre,descripcion,tipouso,marca,numeroserie,donadopor,estado) VALUES('$nom','$descrip','$tipo','$marc','$numserie','$donadores','$estado')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }  
include "../Vistas/equipos.php";

?>