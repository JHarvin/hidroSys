<?php
include "../ProcesoSubir/conexioneq.php";
$modi = $_REQUEST['baccion2'];

$nombre = $_REQUEST['nombr'];
$tipo = $_REQUEST['tipp'];
$departamento = $_REQUEST['nombdepto'];
$municipio = $_REQUEST['municipi'];
$institucion = $_REQUEST['insti'];

$mensaje = "";

$consulta = "UPDATE comunidades SET nombre='$nombre', tipo='$tipo', iddepartamento='$departamento',idmunicipio='$municipio',idobservador='$institucion'";
$resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
          
echo $mensaje;

?>