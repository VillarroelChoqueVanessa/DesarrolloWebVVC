<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }

        .radio-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .img-preview {
            display: block;
            margin: 10px auto;
            border-radius: 5px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .btn {
            background: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <?php 
    session_start();
    include("conexion.php");
    require("verificarsesion.php");
    require("verificarnivel.php");

    $id = $_GET['id'];
    $sql = "SELECT id, fotografia, nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id FROM personas WHERE id=$id";
    $resultado = $con->query($sql);
    $row = $resultado->fetch_assoc();

    $sql = "SELECT id, nombre FROM profesiones ORDER BY nombre";
    $result = mysqli_query($con, $sql);
    ?>

    <div class="container">
        <h2>Editar Persona</h2>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            
            <?php if ($row["fotografia"] != "") { ?>
                <img src="images/<?php echo $row["fotografia"]; ?>" class="img-preview" alt="Foto">
            <?php } ?>

            <label for="fotografia">Fotografía:</label>
            <input type="file" name="fotografia">

            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?php echo $row['nombres']; ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>

            <label for="sexo">Sexo:</label>
            <div class="radio-group">
                <input type="radio" name="sexo" value="Masculino" <?php echo ($row['sexo'] == 'Masculino') ? 'checked' : ''; ?>>Masculino
                <input type="radio" name="sexo" value="Femenino" <?php echo ($row['sexo'] == 'Femenino') ? 'checked' : ''; ?>>Femenino
            </div>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo $row['correo']; ?>" required>

            <label for="profesion">Profesión:</label>
            <select name="profesion_id">
                <?php while ($row2 = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row2['id']; ?>" <?php echo ($row['profesion_id'] == $row2['id']) ? "selected" : ""; ?>>
                        <?php echo $row2['nombre']; ?>
                    </option>
                <?php } ?>
            </select>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" class="btn" value="Guardar">
        </form>
    </div>

</body>

</html>
