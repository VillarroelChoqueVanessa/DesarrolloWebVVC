<?php
session_start();
include("conexion.php");

// Verificar permisos
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 0) {
}

// Obtener parámetros
$id = intval($_GET['id']);
$nuevoNivel = intval($_GET['nivel']);

// Validar nivel (solo 0 o 1)
if ($nuevoNivel != 0 && $nuevoNivel != 1) {
}

$stmt = $con->prepare("UPDATE usuarios SET nivel = ? WHERE id = ?");
$stmt->bind_param("ii", $nuevoNivel, $id);

if ($stmt->execute()) {
}
?>