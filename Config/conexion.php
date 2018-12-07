<?php
$conexion = new mysqli('localhost', 'root', '', 'hidro');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
?>
