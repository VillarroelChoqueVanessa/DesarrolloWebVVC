<?php
// Obtener el número de palabras desde el formulario anterior
$numero_palabras = isset($_POST['numero_palabras']) ? (int)$_POST['numero_palabras'] : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Palabras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h3 {
            color: #4CAF50;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 16px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h3>Ingreso de Palabras</h3>
    <form action="ordenar.php" method="POST">
        <?php
        for ($i = 1; $i <= $numero_palabras; $i++) {
            echo "<label for='palabra_$i'>Palabra $i:</label>";
            echo "<input type='text' id='palabra_$i' name='palabra_$i' required><br><br>";
        }
        ?>
        <input type="submit" value="Ordenar Palabras">
    </form>
</body>
</html>
