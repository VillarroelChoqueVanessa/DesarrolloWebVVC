<?php

    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $correo = $_POST['correo'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
       
    </style>
</head>
<body>
    <h1>Datos del Cliente</h1>
    
            <strong>Nombre:</strong>
            <?php echo ($nombres); ?>
        
            <strong>Apellido:</strong>
            <?php echo ($apellidos); ?>
        
            <strong>Sexo:</strong>
            <?php echo ($sexo); ?>
        
            <strong>Dirección:</strong>
            <?php echo ($direccion); ?>
        
            <strong>Celular:</strong>
            <?php echo ($celular); ?>
        
            <strong>Correo:</strong>
            <?php echo ($correo); ?>
    </body>
</html>
<?php

?>