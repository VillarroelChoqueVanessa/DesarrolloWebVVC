<?php
    if(isset($_GET['num1']) && $_GET['num2']){
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $suma = $num1 + $num2;

        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr>";

        echo "<td style='border: 1px solid black; background-color: green; padding: 10px'>$num1</td>";
        echo "<td style='border: 1px solid black; background-color: white; padding: 10px'>+</td>";
        echo "<td style='border: 1px solid black; background-color: green; padding: 10px'>$num2</td>";
        echo "<td style='border: 1px solid black; background-color: white; padding: 10px'>=</td>";
        echo "<td style='border: 1px solid black; background-color: green; padding: 10px'>$suma</td>";

        echo "</tr>";
        echo "</table>";

    }
    else{
        echo "Debe ingresar dos números.";
    }
?>