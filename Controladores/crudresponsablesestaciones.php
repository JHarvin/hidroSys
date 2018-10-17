<?php
  if(isset($_POST["bandera"])){

    $bandera=$_POST["bandera"];
    
    if($bandera=="guardar"){
      $mysqli=null;
      
      $msj="Error";
      
    
      function obtenerResultado(){
        require "../ProcesoSubir/conexioneq.php"; 
      $result = 0;
      $result1 = 0;
      $result2 = 0;
      $result3 = 0;
      $datos=null;
      $institucion=$_POST["institucion"];
      $responsable=$_POST["responsable"];
      $direccion=$_POST["direccion"];
      $telefono1=$_POST["telefono1"];
      $telefono2=$_POST["telefono2"];
      $foto=$_POST["foto"];
   
      

   $consulta = "SELECT * FROM respestaciones WHERE institucion='$institucion'";
   $result = $conexion->query($consulta);
    if ($result) {
      while ($fila = $result->fetch_object()) {
        $datos=$fila->institucion;
      }//fin while
    }
 //echo "datos ".$datos;
   if($datos==null){

        $consulta2  = "INSERT INTO respestaciones(institucion, responsable, direccion, telefono1, telefono2, foto, activo) VALUES('$institucion','$responsable','$direccion','$telefono1','$telefono2','$foto','1')";
        $result2 =mysqli_query($conexion,$consulta2);
    }
  
    if ($result2) {
      $msj = "Exito";
    } else {
      $msj = "Error";
    }
    return $msj;
  }
   
}        
  
}

  echo obtenerResultado();
?>