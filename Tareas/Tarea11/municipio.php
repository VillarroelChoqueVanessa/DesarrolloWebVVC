<?php
include("conexion.php");

$provincia = $_GET['provincia'];
$sql = "SELECT * FROM municipios WHERE provincia_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $provincia);
$stmt->execute();
$resultado = $stmt->get_result();
echo "<option value=''>Seleccione...</option>";
while($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}
?>