<?php
   $n = isset($_GET['n']) ? intval($_GET["n"]) :0;
   switch ($n) {
    case 1:
        echo"Lunes";
        break;
        case 2:
            echo "Martes";
            break;
            case 3:
                echo "Miercoles";
                break;
                case 4:
                    echo "Jueves";
                    break;
                    case 5:
                        echo "Viernes";
                        break;
                        case 6:
                            echo "Sabado";
                            break;
                            case 7:
                                echo "Domingo";
                                break;
                                default:
                                echo "Error: El numero debe ser 1 a 7";
                                break;  
                            }

?>