<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_alumnos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>