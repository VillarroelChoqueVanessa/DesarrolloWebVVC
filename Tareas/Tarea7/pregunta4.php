<?php
include("conexion.php");  
$orden = "usuarios.id";

if (isset($_GET['orden'])) {
    $orden = $_GET['orden'];
}
if (isset($_GET['asendente'])) {
    $asente = $_GET['asendente'];
} else {
    $asente = "asc";
}

$sql = "SELECT * FROM usuarios ORDER BY $orden $asente";
$resultado = mysqli_query($conexion, $sql);  
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <table style="border-collapse: collapse" border="1">
        <thead>
            <tr>
                <th><a href="pregunta4.php">Nombres</a></th>
                <th><a href="pregunta4.php?orden=apellidos&asendente=<?php echo $asente?>">Apellidos</a></th>
                <th><a href="pregunta4.php?orden=correo&asendente=<?php echo $asente?>">Correo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila['nombres']; ?></td>
                    <td><?php echo $fila['apellidos']; ?></td>
                    <td><a href="form_editar_correo.php?correo=<?php echo $fila['correo']; ?>"><?php echo $fila['correo']; ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>