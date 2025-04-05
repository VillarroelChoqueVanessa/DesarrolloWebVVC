<?php
$conexion = mysqli_connect("localhost", "root", "", "batienda");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>