<?php
$temp = floatval($_POST['temperatura']);
$unidad = $_POST['unidad'];

$celsius = 0;
$fahrenheit = 0;
$kelvin = 0;

switch ($unidad) {
    case 'celsius':
        $celsius = $temp;
        $fahrenheit = ($temp * 9/5) + 32;
        $kelvin = $temp + 273.15;
        break;
    case 'fahrenheit':
        $celsius = ($temp - 32) * 5/9;
        $fahrenheit = $temp;
        $kelvin = ($temp - 32) * 5/9 + 273.15;
        break;
    case 'kelvin':
        $celsius = $temp - 273.15;
        $fahrenheit = ($temp - 273.15) * 9/5 + 32;
        $kelvin = $temp;
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Conversión</title>
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
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        p {
            margin-top: 20px;
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
    <h2>Resultados de Conversión</h2>
    <table>
        <tr>
            <th>Celsius</th>
            <th>Fahrenheit</th>
            <th>Kelvin</th>
        </tr>
        <tr>
            <td><?= number_format($celsius, 2) ?></td>
            <td><?= number_format($fahrenheit, 2) ?></td>
            <td><?= number_format($kelvin, 2) ?></td>
        </tr>
    </table>
    <p><a href="formulario.html">Volver</a></p>
</body>
</html>
