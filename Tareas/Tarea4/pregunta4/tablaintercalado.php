<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 40px auto;
            table-layout: fixed; 
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left; 
            width: 15%; 
        }
        .rojo {
            background-color: red;
            color: black;
        }
        .amarillo {
            background-color: yellow;
            color: black;
        }
        .verde {
            background-color: green;
            color: black;
        }
    </style>
</head>
<body>

    <?php
    if (isset($_GET['filas']) && isset($_GET['columnas'])) {
        $filas = intval($_GET['filas']);
        $columnas = intval($_GET['columnas']);
        $primeraColumna = ["Viva", "Mi", "Bolivia"];

        echo "<table>";
        for ($fila = 0; $fila < $filas; $fila++) {
       
            if ($fila % 3 == 0) {
                $colorFila = "rojo";
            } elseif ($fila % 3 == 1) {
                $colorFila = "amarillo";
            } else {
                $colorFila = "verde";
            }

            echo "<tr>";
            echo "<td class='$colorFila'>" . $primeraColumna[$fila % 3] . "</td>";
            for ($col = 1; $col < $columnas; $col++) {
                $valor = ($fila %3)  + 1; 
                echo "<td class='$colorFila'>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Proporcione los valores de filas y columnas.</p>";
    }
    ?>
    <br>
</body>
</html>