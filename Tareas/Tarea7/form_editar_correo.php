<?php
include("conexion.php");

if(isset($_POST['actualizar'])) {
    $oldEmail = $_POST['old_email'];
    $newEmail = $_POST['new_email'];
    
    $sql = "UPDATE usuarios SET correo = '$newEmail' WHERE correo = '$oldEmail'";
    mysqli_query($conexion, $sql);  // Changed from $conn to $conexion
    header("Location: pregunta4.php");
    exit();
}

$correo = $_GET['correo'];
$sql = "SELECT nombres, apellidos FROM usuarios WHERE correo = '$correo'";
$result = mysqli_query($conexion, $sql);  // Changed from $conn to $conexion
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="edit-form">
        <h3>Nombres y Apellidos: <?php echo $user['nombres'] . ' ' . $user['apellidos']; ?></h3>
        <form method="POST">
            <input type="hidden" name="old_email" value="<?php echo $correo; ?>">
            <label>Correo:</label>
            <input type="email" name="new_email" value="<?php echo $correo; ?>">
            <input type="submit" name="actualizar" value="Actualizar" class="button">
        </form>
    </div>
    <a href="pregunta4.php">volver</a>
</body>

</html>