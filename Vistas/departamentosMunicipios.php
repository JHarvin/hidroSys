<?php 
include "../ProcesoSubir/conexioneq.php";
$departamento   = $_POST['departamento'];
$sql="SELECT * FROM municipios where iddepto=".$departamento;

$cadena='<select class="form-control" id="lista2" name="lista2">';
$cadena=$cadena.'"<option value="">Municipios</option>"';
$resultado = $conexion->query($sql);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                $cadena=$cadena."<option value='".$fila->idmunicipio."'>".$fila->nombre."</option>";
                               }                                 
                             } else {
                               
                             }
                             echo $cadena."</select>";

?>