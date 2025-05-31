<?php 
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    die();
}

$sql = "SELECT id, usuario, nombrecompleto, nivel FROM usuarios";
$resultado = $con->query($sql);

if($_SESSION['nivel']==0){
    echo $row['usuario'];
    echo $row['nivel'];
}else if($_SESSION['nivel']==1){
    echo $row['usuario'];
    echo $row['nivel'];
}
?>
