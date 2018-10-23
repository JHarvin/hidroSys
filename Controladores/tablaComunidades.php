<?php
include "../ProcesoSubir/conexioneq.php";
$result = $conexion->query("SELECT*FROM respestaciones,municipios,comunidades,departamentos where comunidades.iddepartamento=departamentos.iddepto and municipios.idmunicipio=comunidades.idmunicipio and comunidades.idobservador=respestaciones.idresponsable");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td hidden>" . $fila->idcomunidad. "</td>";
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->tipo . "</td>";
        echo "<td>" . $fila->nombredepto. "</td>";
        echo "<td>" . $fila->nombremunicipio. "</td>";
        echo "<td>" . $fila->institucion. "</td>";
        
        
        echo "<td width=160>
                            <button type='button' class='btn btn-success' data-toggle='modal' data-target='.detalle-modal-lg' style='width:35px;'><i class='fa fa-eye'></i></button>
                            <button type='button' class='btn btn-success' data-toggle='modal' data-target='.modifi-modal-lg' style='width:35px;'><i class='fa fa-pencil'></i></button>
                            <button type='button' class='btn btn-danger' style='width:35px;'><i class='fa fa-down'></i></button>
        </td>";
     /*   if ($fila->eestado==1) {
            echo "<td>Activo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Desactivar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",1);><i class='fa fa-remove'></i>
               </button></td>";
         }else
         {
            echo "<td>Inactivo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Activar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",2);><i class='fa fa-check'></i>
               </button></td>";
         }
        $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
       $aux.="onclick=\"editar('".$fila->eid_bachillerato."','".$fila->ccodigo."','".$fila->cnombe."','".$fila->cdescripcion."','".$fila->efk_tipo."')\";>";
       $aux.="Modificar</button>";
       echo "<td width='90'>";
     
       echo $aux;*/
        
        
        echo "</tr>";

    }
}
?>