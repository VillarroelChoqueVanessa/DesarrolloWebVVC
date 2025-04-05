<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}



// Obtener productos
$sql = "SELECT * FROM producto";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos - Tienda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .producto { border: 1px solid #ddd; padding: 15px; margin: 10px; float: left; width: 200px; }
        .producto img { max-width: 100%; height: auto; }
        .clear { clear: both; }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <p>Usuario: <?php echo $_SESSION['usuario']; ?> - Tipo: <?php echo ($_SESSION['nivel'] == '1') ? 'Administrador' : 'Usuario'; ?></p>
    
    <div class="clear"></div>
    
    <?php while($producto = $resultado->fetch_assoc()): ?>
        <div class="producto">
            <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
            <?php if(!empty($producto['imagen'])): ?>
                <img src="imagenes/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            <?php endif; ?>
            <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
            <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
        </div>
    <?php endwhile; ?>
    
    <div class="clear"></div>
    
    <p><a href="cerrar.php">Cerrar sesión</a></p>
</body>
</html>