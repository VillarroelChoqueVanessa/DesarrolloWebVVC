<link rel="stylesheet" href="styleInf.css">
<?php  session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$profesion_id=$_POST['profesion'];
$correo=$_POST['correo'];
$id=$_POST['id'];

//$sql="UPDATE personas SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',correo='$correo' WHERE id=$id";


$stmt=$con->prepare('UPDATE personas SET nombres=?,apellidos=?,fecha_nacimiento=?,sexo=?,correo=?,profesion_id=? WHERE id=?');


// Vincular parámetros
$stmt->bind_param("sssssii",$nombres, $apellidos,$fecha_nacimiento,$sexo,$correo,$profesion_id, $id);



// Ejecutar la consulta
if ($stmt->execute()) {?>
    <div class="cmensaje">
        <img src="icon/check.png" alt="" width="50px">
        <?php echo "REGISTRO ACTUALIZADO"; ?>
    </div>
<?php
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=read.php">
