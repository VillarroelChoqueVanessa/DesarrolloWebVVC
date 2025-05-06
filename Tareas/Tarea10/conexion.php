<?php
$con = new mysqli("localhost", "root", "", "bd_agenda2025");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
?>