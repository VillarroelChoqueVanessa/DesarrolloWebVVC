<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar los números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>Ingrese los números a multiplicar</h1>
    <form action="multiplicacion.php" method="POST">
        <?php
        $n = $_POST['cantidad'];
        for ($i = 0; $i < $n; $i++) {
            echo '<label for="num'.$i.'">Número '.($i+1).':</label>';
            echo '<input type="number" id="num'.$i.'" name="numeros[]" required><br>';
        }
        ?>
        <input type="hidden" name="cantidad" value="<?php echo $n; ?>">
        <button type="submit">Calcular</button>
    </form>
</body>
</html>