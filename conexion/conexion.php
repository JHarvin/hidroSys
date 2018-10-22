<?php


$conexion = new mysqli('localhost', 'root', '', 'otra');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
?>