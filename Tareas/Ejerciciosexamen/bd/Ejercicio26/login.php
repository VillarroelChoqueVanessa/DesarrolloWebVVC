<?php
session_start();
if(isset($_SESSION['usuario'])) {
    header("Location: productos.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Tienda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .login-form { max-width: 300px; margin: 0 auto; }
        .login-form input { width: 100%; padding: 10px; margin: 5px 0; }
        .login-form button { background: #4CAF50; color: white; padding: 10px; border: none; width: 100%; }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Iniciar Sesión</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p style="color:red;">Usuario o contraseña incorrectos</p>
        <?php } ?>
        <form action="autenticar.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>