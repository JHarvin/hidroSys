<?php
include "../ProcesoSubir/conexioneq.php";
$result = $conexion->query("SELECT * from equipos ORDER BY idequipo");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->descripcion . "</td>";
        echo "<td>" . $fila->tipouso . "</td>";
        echo "<td>" . $fila->marca . "</td>";
        echo "<td>" . $fila->numeroserie. "</td>";
        echo "<td>" . $fila->donadopor . "</td>";
        echo "<td>" . $fila->estado . "</td>";
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