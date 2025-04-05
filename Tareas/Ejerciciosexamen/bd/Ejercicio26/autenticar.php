<?php
session_start();

include("conexion.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';
    
   
    
    // Consulta para verificar usuario
    $sql = "SELECT * FROM usuario WHERE nombre = ? AND password = SHA1(?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $fila['nombre'];
        $_SESSION['nivel'] = $fila['nivel'];
        header("Location: productos.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>