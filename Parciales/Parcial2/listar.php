<?php session_start();

include("conexion.php");


$sql = "SELECT imagen,libros.id,titulo,anio,editoriales.editorial  FROM libros
    LEFT JOIN editoriales ON libros.ideditorial=editoriales.id";

$resultado=$con->query($sql);
?>

<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th>imagen</th>
            <th>titulo</th>
            <th>anio</th>
            <th>editorial</th>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><img src="images/<?php echo $row['imagen'];  ?>" ></td>
        <td><?php echo $row['titulo'];?></td>
        <td><?php echo $row['anio'];?></td>
        <td><?php echo $row['editorial'];?></td>
    </tr>
    <?php } ?>
 </table>
