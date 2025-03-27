<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona</title>
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

        .btn {
            background: #28a745;
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
            background: #218838;
        }
    </style>
</head>

<body>

    <?php 
    session_start();
    require("verificarsesion.php");
    require("verificarnivel.php");
    include("conexion.php");

    $sql = "SELECT id, nombre FROM profesiones ORDER BY nombre";
    $result = mysqli_query($con, $sql);
    ?>

    <div class="container">
        <h2>Registrar Persona</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            
            <label for="fotografia">Fotografía:</label>
            <input type="file" name="fotografia">

            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>

            <label for="sexo">Sexo:</label>
            <div class="radio-group">
                <input type="radio" name="sexo" value="Masculino">Masculino
                <input type="radio" name="sexo" value="Femenino">Femenino
            </div>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" required>

            <label for="profesion">Profesión:</label>
            <select name="profesion_id">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php } ?>
            </select>

            <input type="submit" class="btn" value="Guardar">
        </form>
    </div>

</body>

</html>
