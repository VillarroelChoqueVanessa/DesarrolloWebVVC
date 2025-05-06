<?php 
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM personas WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$person = $result->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <h3>Editar Persona</h3>
        <form id="updateForm" onsubmit="updatePerson(event)">
            <input type="hidden" name="id" value="<?php echo $person['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" value="<?php echo $person['nombres']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?php echo $person['apellidos']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $person['fecha_nacimiento']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <select class="form-control" name="sexo" required>
                    <option value="M" <?php echo $person['sexo'] == 'M' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="F" <?php echo $person['sexo'] == 'F' ? 'selected' : ''; ?>>Femenino</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="correo" value="<?php echo $person['correo']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
<?php $con->close(); ?>
