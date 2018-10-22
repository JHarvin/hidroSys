<?php
    include "../../ProcesoSubir/conexioneq.php";

    $opcion=$_REQUEST["opcion"];
    $cambio=$_REQUEST["cambio"];
   // echo '<input type="text" name="esta" value="'.$cambio.'">';
    if($opcion==="cambioTipo"){
        ?>
        <option selected="selected" value="Visitante">Visitante</option>
        <?php       
        $result=$conexion->query("SELECT vis.id_visitante, vis.nombre, vis.tipo from visitantes vis where vis.tipo = '".$cambio."' ");
        
        while($fila = $result->fetch_object()){
        ?>
            <option value="<?php echo $fila->id_visitante;?>"><?php echo $fila->nombre?></option>
            <?php
        }
    }
    if($opcion==="cambioFoto"){
        ?>
        <?php
        if($cambio === "Estaciones"){echo "<img  width='685' height='290' src='../../Vistas/images/volcan.jpg'/>";
    }else{       
        $result  = $conexion->query("SELECT * from estacionmet est where est.id_estacion = '".$cambio."'  ");
        while($fila = $result->fetch_object()){
        ?>
            <img width="685" height="290" src="data:image/jpg;base64,<?php echo base64_encode($fila->foto); ?>"/>
            
        <?php
        }
    }
    }
?>
