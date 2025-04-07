<?php session_start();
include("conexion.php");
$nombre = $_POST['nombre'];
$password = sha1($_POST['password']);
$stmt = $con->prepare('SELECT nombre,nivel FROM usuarios AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Usuario encontrado";
    $_SESSION['nombre'] = $nombre;
    $_SESSION['nivel'] = $result->fetch_assoc()['nivel'];
    header("Location:pregunta4.php");

} else {
    echo "Error datos de autenticación incorrectos";
    ?>
    <meta http-equiv="refresh" content="3;url=login.html">
    <?php
}

?>