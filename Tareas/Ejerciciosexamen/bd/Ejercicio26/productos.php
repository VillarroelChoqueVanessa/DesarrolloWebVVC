<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}



// Procesar eliminación si es administrador y se envió el formulario
if($_SESSION['nivel'] == '1' && isset($_POST['eliminar'])) {
    $id = intval($_POST['id_producto']);
    $sql = "DELETE FROM producto WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Redirigir para evitar reenvío del formulario
    header("Location: productos.php");
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
        .acciones { margin-top: 10px; }
        .acciones a, .acciones button { 
            display: inline-block; 
            padding: 5px 10px; 
            margin-right: 5px; 
            text-decoration: none; 
            color: white;
            border: none;
            cursor: pointer;
        }
        .editar { background-color: #4CAF50; }
        .eliminar { background-color: #f44336; }
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
            
            <?php if($_SESSION['nivel'] == '1'): ?>
                <div class="acciones">
                    <!-- Enlace para editar (sin funcionalidad aún) -->
                    <a href="#" class="editar">Editar</a>
                    
                    <!-- Formulario para eliminar -->
                    <form method="post" action="productos.php" style="display: inline;">
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
                        <button type="submit" name="eliminar" class="eliminar" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    
    <div class="clear"></div>
    
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>