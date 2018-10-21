<?php
      include"comunidadConexion.php";

$nombre = $_REQUEST['nombre'];
$municipio = $_REQUEST['municipio'];
$observador = $_REQUEST['observador'];
$departamento = $_REQUEST['departamento'];
$optradio = $_REQUEST['optradio'];

$insertar ="INSERT INTO comunidades(nombre, tipo, iddepartamento, idmunicipio, idobservador) VALUES ('$nombre', '$optradio', '$departamento', '$municipio', '$observador' )";

$resultado = mysqli_query($mysqli, $insertar);

if(!$resultado){
echo 'erro al ingresar datos';
}else{
  echo "datos ingresados correctamente";
}

mysqli_close($mysqli);
?>