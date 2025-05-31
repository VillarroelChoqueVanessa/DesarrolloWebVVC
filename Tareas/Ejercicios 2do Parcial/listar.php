<?php 
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    die();
}

$sql = "SELECT id, usuario, nombrecompleto, nivel FROM usuarios";
$resultado = $con->query($sql);

?>
<a href="cerrar.php">Cerrar Sesion</a>

<div>
    <table>
        <thead>
            <tr>
                <th>Correos</th>
                <th>Nombre Completo</th>
                <th>Nivel</th>
                    <th>Operación</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['usuario']) ?></td>
                <td><?= htmlspecialchars($row['nombrecompleto']) ?></td>
                <td><?= ($row['nivel'] == 0) ? 'Administrador' : 'Usuario' ?></td>
                <td>
                    <button class="btn btn-sm btn-primary" 
                            onclick="cambiarnivel(<?= $row['id'] ?>, <?= $row['nivel'] == 0 ? 1 : 0 ?>)">
                        <?= $row['nivel'] == 0 ? 'Cambiar a Usuario' : 'Cambiar a Administrador' ?>
                    </button>
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>

