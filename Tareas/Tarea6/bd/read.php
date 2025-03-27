<?php session_start();
require("verificarsesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            padding: 10px 20px;
        }

        .btn-logout {
            background: #ff4444;
            text-align: center;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #cc0000;
        }

        .container {
            
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color:#218838;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        img {
            border-radius: 5px;
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            margin: 5px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .btn-primary {
            background: #007bff;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background: #bd2130;
        }

        .btn-success {
            background: #28a745;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="header">
    <a class="btn-logout" href="cerrar.php">Cerrar Sesión</a>
</div>

<div class="container">
    <h2>Lista de Personas</h2>

    <?php
    include("conexion.php");
    $sql="SELECT fotografia,personas.id,nombres,apellidos,fecha_nacimiento,sexo,correo,profesiones.nombre as profesion FROM personas
          LEFT JOIN profesiones ON personas.profesion_id=profesiones.id";  

    $resultado=$con->query($sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>Fotografía</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fec. Nacimiento</th>
                <th>Sexo</th>
                <th>Correo</th>
                <th>Profesión</th>
                <?php if($_SESSION['nivel']==1){ ?>
                <th>Operaciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row=mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <td><img src="images/<?php echo $row['fotografia']; ?>" alt="Foto"></td>
                <td><?php echo $row['nombres'];?></td>
                <td><?php echo $row['apellidos'];?></td>
                <td><?php echo $row['fecha_nacimiento'];?></td>
                <td><?php echo $row['sexo'];?></td>
                <td><?php echo $row['correo'];?></td>
                <td><?php echo $row['profesion'];?></td>
                <?php if($_SESSION['nivel']==1){ ?>
                <td>
                    <a href="formeditar.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Editar</a>
                    <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Eliminar</a>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if($_SESSION['nivel']==1){ ?>
    <a class="btn btn-success" href="forminsertar.php">Insertar Nueva Persona</a>
    <?php } ?>
</div>

</body>
</html>
