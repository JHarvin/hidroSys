<?php
$conexion = new mysqli('localhost', 'root', '', 'db_hidrosys');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
