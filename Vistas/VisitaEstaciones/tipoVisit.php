<?php
    include "../../ProcesoSubir/conexion.php";

    $opcion=$_REQUEST["opcion"];
    $cambio=$_REQUEST["cambio"];
   // echo '<input type="text" name="esta" value="'.$cambio.'">';
    if($opcion==="cambioTipo"){
        ?>
        <option value="Visitante">Visitante</option>
        <?php       
        $result=$mysqli->query("SELECT vis.id_visitante, vis.nombre, vis.tipo from visitantes vis where vis.tipo = '".$cambio."' ");
        
        while($fila = $result->fetch_object()){
        ?>
        <option selected="" value="<?php echo $fila->id_visitante;?>"><?php echo $fila->nombre?></option>
        <?php
    }
    
}
?>
