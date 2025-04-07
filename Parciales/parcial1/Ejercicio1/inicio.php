<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="caja">
        <div class="menu1">
            <div class="logo">
            <img src="imagenes/Avatar.png" alt="" width="100px" height="100px">
            </div>
            <p>Nombre Estudiante</p>
            <p>Carnet Universitario</p>
            <p>Repositorio: github.com</p>
            <div class="line">

            </div>
            <div class="icono">
                <img src="imagenes/inicio.png" width="20px" height="20px">Inicio</img>
                <img src="imagenes/clientes.png" width="20px" height="20px">Clientes</img>
                <img src="imagenes/items.png" width="20px" height="20px">Items</img>
                <img src="imagenes/Prestamos.png" width="20px" height="20px">Prestamos</img>
                <img src="imagenes/Usuarios.png" width="20px" height="20px">Usuario</img>

            </div>
        </div>
        <div class="menu2">
            <div class="header">
            <img src="imagenes/configurar.png" width="20px" height="20px"></img>
        <img src="imagenes/Salir.png" width="20px" height="20px"></img>
            </div>
            <div class="lin">

</div >
        <div class="body">
            <div class="inicio">
            <img src="archivo/PrimerParcial.png" width="20px" height="20px">Primer Exmen Parcial</img>
            </div>
            <div class="img1">
                <div class="ca"><h2>Clientes</h2></div>
            <img src="imagenes/clientes.png" width="50px" height="50px"></img> 
            </div>
            <div class="img">
            <div class="c"><h2>Intems</h2></div>
            <img src="imagenes/items.png" width="50px" height="50px"></img> 
            </div>
            <div class="img">
            <div class="c"><h2>Prestamos</h2></div>

            <img src="imagenes/Prestamos.png" width="50px" height="50px"></img> 
            </div>
            <div class="img">
            <div class="c"><h2>Usuario</h2></div>

            <img src="imagenes/Usuarios.png" width="50px" height="50px"></img> 
            </div>
        </div>
    </div>
    </div>


    <?php
        $usuario = $_POST['usuario'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';
        
        // Autenticación simple
        if ($usuario === 'admin' && $contrasena === 'admin') {
            $_SESSION['usuario'] = 'admin';
        } else {
            $_SESSION['usuario'] = 'usuario';
        }
    ?>
</body>
</html>