<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM personas WHERE id = $id";
$resultado = $con->query($sql);
$row = mysqli_fetch_array($resultado);
?>

<form id="form-editar" onsubmit="event.preventDefault(); editar();">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label">Nombres:</label>
        <input type="text" class="form-control" name="nombres" value="<?php echo $row['nombres']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos" value="<?php echo $row['apellidos']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Sexo:</label>
        <select class="form-select" name="sexo" required>
            <option value="M" <?php if($row['sexo']=='M') echo 'selected'; ?>>Masculino</option>
            <option value="F" <?php if($row['sexo']=='F') echo 'selected'; ?>>Femenino</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo:</label>
        <input type="email" class="form-control" name="correo" value="<?php echo $row['correo']; ?>" required>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>