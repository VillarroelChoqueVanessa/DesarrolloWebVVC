<?php
$conexion = new mysqli("localhost", "root", "", "bd_biblioteca");
$conexion->set_charset("utf8");

$sql = "SELECT id, imagen, titulo FROM libros";
$resultado = $conexion->query($sql);

echo "<table style='width: 100%; border-collapse: collapse;'><tr>";
$contador = 0;

while($libro = $resultado->fetch_assoc()) {
    if($contador % 5 == 0 && $contador != 0) {
        echo "</tr><tr>";
    }
    echo "<td style='padding:10px; text-align: center;'>";
    echo "<img src='images/" . $libro['imagen'] . "' 
          onclick='mostrarModal(\"" . $libro['imagen'] . "\", \"" . $libro['titulo'] . "\")' 
          style='width: 75px; height: 100px; cursor: pointer;' 
          alt='" . $libro['titulo'] . "'>";
          
    echo "</td>";
    $contador++;
}

echo "</tr></table>";

echo "
<div id='myModal' class='modal' style='display: none;'>
    <div class='modal-content'>
        <img id='modalImg' style='width: 200px; height: 600px;'>
        <p id='modalTitle'></p>
        <button onclick='cerrarModal()' class='modal-btn'>Aceptar</button>
    </div>
</div>";



$conexion->close();
?>