<?php
include("conexion.php");

$sql = "SELECT * FROM departamentos";
$resultado = $con->query($sql);

echo "<option value=''>Seleccione...</option>";
while($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}
?>