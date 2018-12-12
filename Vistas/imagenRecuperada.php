<?php 
include "../ProcesoSubir/conexioneq.php";
$id   = $_POST['id'];
echo $id;
echo "<center><img src='imagenes.php?id=" . $id . "' width=250 height=200 align='center' style='margin-top:30px;'></center>";


?>