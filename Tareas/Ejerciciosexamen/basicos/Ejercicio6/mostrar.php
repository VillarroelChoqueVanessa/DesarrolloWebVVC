<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .c{
            color:red;
        }
    </style>
</head>
<body>
<?php
$n=($_GET['n'] ?? '');
$c=($_GET['c'] ?? '');

echo "Nombre: <b>$n</b>";
echo "<br>";
echo "Ciudad: <span class='c'>$c</span>";

?>
</body>
</html>


