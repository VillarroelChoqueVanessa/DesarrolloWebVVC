<?php
include("conexion.php");

$departamento = $_GET['departamento'];
$sql = "SELECT * FROM provincias WHERE departamento_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $departamento);
$stmt->execute();
$resultado = $stmt->get_result();

echo "<option value=''>Seleccione...</option>";
while($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}
?>