<?php
$con = new mysqli("localhost", "root", "", "bd_agenda");
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
?>