<?php
function ordenarPalabras($arr) {
    sort($arr); 
    return $arr;
}

$palabras = [];
foreach ($_POST as $key => $valor) {
    if (strpos($key, 'palabra_') === 0) { // Filtra solo las entradas de palabras
        $palabras[] = $valor;
    }
}

$palabras_ordenadas = ordenarPalabras($palabras);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabras Ordenadas</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            border: 2px solid red;
            background-color: yellow;
            width: 300px;
            margin: 0 auto;
        }
        li {
            padding: 8px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h3>Palabras Ordenadas</h3>
    <ul>
        <?php
        foreach ($palabras_ordenadas as $palabra) {
            echo "<li>" . $palabra . "</li>"; // Sin htmlspecialchars()
        }
        ?>
    </ul>
    <p><a href="formulario.php">Volver al inicio</a></p>
</body>
</html>
