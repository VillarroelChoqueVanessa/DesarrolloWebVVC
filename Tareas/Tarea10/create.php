<?php
include("conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];

$stmt = $con->prepare("INSERT INTO personas (nombres, apellidos, fecha_nacimiento, sexo, correo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo);

if ($stmt->execute()) {
    echo "Registro creado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>