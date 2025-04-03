<?php
include("conexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar'])) {
    // Insertar datos en la base de datos
    for ($i = 1; $i <= $_POST['cantidad_alumnos']; $i++) {
        $nombres = mysqli_real_escape_string($conexion, $_POST["nombres_$i"]);
        $apellidos = mysqli_real_escape_string($conexion, $_POST["apellidos_$i"]);
        $cu = mysqli_real_escape_string($conexion, $_POST["cu_$i"]);
        $sexo = mysqli_real_escape_string($conexion, $_POST["sexo_$i"]);
        $codigocarrera = intval($_POST["carrera_$i"]);
        
        $foto = "";
        if (isset($_FILES["foto_$i"]) && $_FILES["foto_$i"]["error"] == 0) {
            // Validar tipo de archivo
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $filename = $_FILES["foto_$i"]["name"];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            
            if (in_array($ext, $allowed)) {
                $foto = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES["foto_$i"]["tmp_name"], "fotos/" . $foto);
            }
        }
        
        $stmt = mysqli_prepare($conexion, "INSERT INTO Alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssi", $foto, $nombres, $apellidos, $cu, $sexo, $codigocarrera);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    header("Location: Fdatos.php?success=1&cantidad=".$_POST['cantidad_alumnos']);
    exit();
}

$carreras = [];
$sql = "SELECT codigo, carrera FROM carreras ORDER BY carrera";
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $carreras[$row["codigo"]] = $row["carrera"];
    }
}

$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : (isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Alumnos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['success'])): ?>
            
            
            <h2>Lista de Alumnos Registrados</h2>
            <table class="alumnos-list">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Fotografía</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>CU</th>
                        <th>Sexo</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT a.*, c.carrera FROM Alumnos a JOIN carreras c ON a.codigocarrera = c.codigo ORDER BY a.id DESC LIMIT ?";
                    $stmt = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $cantidad);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $contador = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $contador++ . '</td>';
                            echo '<td>';
                            if (!empty($row["fotografia"])) {
                                echo '<img src="fotos/' . htmlspecialchars($row["fotografia"]) . '" alt="Foto" class="foto-alumno">';
                            } else {
                                echo 'Sin foto';
                            }
                            echo '</td>';
                            echo '<td>' . htmlspecialchars($row["nombres"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["apellidos"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["cu"]) . '</td>';
                            echo '<td>' . ($row["sexo"] == 'M' ? 'Masculino' : 'Femenino') . '</td>';
                            echo '<td>' . htmlspecialchars($row["carrera"]) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No hay alumnos registrados</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            
            <div class="form-actions">
                <a href="Fintroduccion.html" class="btn-volver">Volver al formulario</a>
            </div>
            
        <?php else: ?>
            <h1>Ingreso de Datos de Alumnos</h1>
            
            <form action="Fdatos.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cantidad_alumnos" value="<?php echo $cantidad; ?>">
                
                <table>
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Fotografía</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>CU</th>
                            <th>Sexo</th>
                            <th>Carrera</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $cantidad; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <input type="file" name="foto_<?php echo $i; ?>" accept="image/*">
                            </td>
                            <td>
                                <input type="text" name="nombres_<?php echo $i; ?>" required>
                            </td>
                            <td>
                                <input type="text" name="apellidos_<?php echo $i; ?>" required>
                            </td>
                            <td>
                                <input type="text" name="cu_<?php echo $i; ?>" required>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="sexo_<?php echo $i; ?>" value="M" required> Masculino
                                </label>
                                <label>
                                    <input type="radio" name="sexo_<?php echo $i; ?>" value="F"> Femenino
                                </label>
                            </td>
                            <td>
                                <select name="carrera_<?php echo $i; ?>" required>
                                    <?php foreach ($carreras as $codigo => $carrera): ?>
                                        <option value="<?php echo $codigo; ?>"><?php echo htmlspecialchars($carrera); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                
                <div class="form-actions">
                    <input type="submit" name="insertar" value="Insertar">
                    <input type="reset" value="Borrar">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
