<?php
if(isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'];
    $contador++;
    setcookie('contador', $contador, time() + 3600);
} else {
    $contador = 1;
    setcookie('contador', $contador, time() + 3600);
}
echo 'Has visitado esta página ' . $contador . ' veces.';
?>