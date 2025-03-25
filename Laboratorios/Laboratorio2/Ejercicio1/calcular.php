<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['numero'];
    $suma = 0;

    for ($i = 0; $i < strlen($n); $i++) {
        if (is_numeric($n[$i])) {
            $suma += $n[$i];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Cálculo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
            font-size: 18px;
            color: #333;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Resultado del Cálculo</h2>
    <div class="result">
        <?php
        if (isset($suma)) {
            echo "La suma de los dígitos es: " . $suma;
        } else {
            echo "Por favor, ingrese un número para calcular.";
        }
        ?>
    </div>
    <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>
