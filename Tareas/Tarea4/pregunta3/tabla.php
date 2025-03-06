<?php
    if(isset($_GET['filas']) && ($_GET['columnas'])) {
        $filas = $_GET['filas'];
        $columnas = $_GET['columnas'];

        echo "<table border='1' style='border-collapse: collapse;'>";

        for($i=0; $i<=$filas; $i++) {
            echo "<tr>";
            for($j=0; $j<=$columnas; $j++) {
                if($i==0 && $j==0){
                    echo "<td style='background-color:blue;border: 1px solid black'></td>";
            }else if($i==0){
                echo "<td style='background-color:blue;border: 1px solid black; color:white;padding: 10px'>$j</td>";
            }else if($j==0){
                echo "<td style='background-color:gray;border: 1px solid black;color white;padding: 10px'>$i</td>";
            }else{
                echo "<td style='padding: 10px;border: 1px solid black'>" . ($i * $j) . "</td>";
           }
       }
       echo "</tr>";
    }    
    echo "</table>";
}else{
    echo "Debe ingresar filas y columnas.";
}

?>