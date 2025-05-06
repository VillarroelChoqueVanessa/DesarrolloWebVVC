<?php
include("conexion.php");

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];

$stmt = $con->prepare('UPDATE personas SET nombres=?, apellidos=?, fecha_nacimiento=?, sexo=?, correo=? WHERE id=?');
$stmt->bind_param("sssssi", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $id);

if ($stmt->execute()) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>