<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_banco");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>