<?php
  if(isset($_REQUEST["bandera"])){
  $baccion      = $_REQUEST["baccion"];
  $bandera      = $_REQUEST["bandera"];
  $visitante    = $_REQUEST["visitante"];
  $estacion     = $_REQUEST["estacion"];
  $fecha        = date("Y/m/d");
  $observacion  = $_REQUEST["observacion"];

  require_once "../../ProcesoSubir/conexion.php";
    
       $mysqli->autocommit(FALSE);
       mysqli_query($mysqli, "BEGIN WORK");
        $consulta = "INSERT INTO hojavisitasestaciones (idhojavisitaestaciones, fechavisita, observacion, id_estacion, id_visitante) VALUES (null,'" . $fecha  . "','" . $observacion . "','" .$estacion  . "','" .  $visitante . "')";  

        $resultado = $mysqli->query($consulta);

        if ($resultado) {
          mysqli_commit($mysqli);
          
          echo 1;
           
        } else {
            mysqli_rollback($mysqli);
            
           echo 2;
           
        }
  }
?>
