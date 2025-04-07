<?php session_start();

include("conexion.php");  
$orden = "libro.id";

if (isset($_GET['orden'])) {
    $orden = $_GET['orden'];
}
if (isset($_GET['asendente'])) {
    $asente = $_GET['asendente'];
} else {
    $asente = "asc";
}

$sql = "SELECT * FROM libro ORDER BY $orden $asente";
$resultado = mysqli_query($conexion, $sql);  
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th >Fotografia</th>
            <th ><a href="pregunta4.php?orden=titulo&asendente=<?php echo $asente?>">titulo</a></th>
            <th ><a href="pregunta4.php?orden=autor&asendente=<?php echo $asente?>">Autor</a></th>
            <th ><a href="pregunta4.php?orden=editorial&asendente=<?php echo $asente?>">Editorial</a></th>
            <th ><a href="pregunta4.php?orden=año&asendente=<?php echo $asente?>">Año</a></th>
    
            <?php  ?>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><img src="images/<?php echo $row['fotografia'];  ?></td>
        <td><?php echo $row['titulo'];?></td>
        <td><?php echo $row['autor'];?></td>
        <td><?php echo $row['editorial'];?></td>
        <td><?php echo $row['año'];?></td>
    
    </tr>
    <?php } ?>
 </table>
        </tbody>
    </table>
</body>
</html>