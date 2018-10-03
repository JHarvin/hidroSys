<?php
//$conexion = mysqli_connect("localhost", "root", "", "hidrodb");//para la consultas

$conexion = new mysqli('localhost', 'root', '', 'hidrodb');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
?>