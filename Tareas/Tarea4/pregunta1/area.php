<?php
    if(isset($_GET['b']) && isset($_GET['h'])){
        $b = $_GET['b'];
        $h = $_GET['h'];
        $area = ($b * $h)/2;
        echo "El área de un triángulo es: ".$area;
    }else{
        echo "Debes enviar las dimensiones base y altura.";
    }
?>