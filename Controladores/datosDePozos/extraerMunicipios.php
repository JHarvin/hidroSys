<?php 

include "../../conexion/conexion.php";

$idDepto = $_REQUEST["depto"];

$data = "";
 
$consulta = "SELECT * FROM municipios WHERE iddepto=".$idDepto." ORDER BY nombre ASC";
$result = $conexion->query($consulta);
$fila=$result->fetch_object();

if($result->num_rows != 0){

    foreach ($fila as $dato) {
        $data.="<option value=".$dato->idmunicipio.">".$dato->nombre."</option>";
    }
    
}else{
    $data = 0;
}



echo $data;

?>