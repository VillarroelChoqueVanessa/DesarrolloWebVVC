<?php
// Función para verificar si un número es primo
function esPrimo($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

// Obtener la cantidad ingresada por el usuario
$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;
$mensaje = "";
$primos = [];

// Validar la cantidad ingresada
if ($cantidad <= 0) {
    $mensaje = "Por favor, ingresa un número mayor que 0.";
} else {
    // Generar los primeros n números primos
    $num = 2;
    while (count($primos) < $cantidad) {
        if (esPrimo($num)) {
            $primos[] = $num;
        }
        $num++;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos Generados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h2 {
            color: #2e7d32;
            margin-bottom: 20px;
        }
        ol {
            border: 2px solid #2e7d32;
            background-color: #fff9c4; /* Fondo amarillo claro */
            padding: 20px;
            border-radius: 5px;
            list-style-position: inside;
            text-align: left;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Números Primos Generados</h2>
        <?php if ($mensaje): ?>
            <p class="error"><?= $mensaje ?></p>
        <?php elseif (!empty($primos)): ?>
            <ol>
                <?php foreach ($primos as $primo): ?>
                    <li><?= $primo ?></li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
        <a href="formulario.html">Volver</a>
    </div>
</body>
</html>