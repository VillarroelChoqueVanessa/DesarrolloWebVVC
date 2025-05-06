<?php
include("conexion.php");

$sql = "SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas";
$resultado = $con->query($sql);
?>
<table>
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nombres']); ?></td>
            <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha_nacimiento']); ?></td>
            <td><?php echo htmlspecialchars($row['sexo']); ?></td>
            <td><?php echo htmlspecialchars($row['correo']); ?></td>
            <td>
                <button onclick="formEditar(<?php echo $row['id']; ?>)">Editar</button>
                <button onclick="eliminar(<?php echo $row['id']; ?>)">Eliminar</button>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>