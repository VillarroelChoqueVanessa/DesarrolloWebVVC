<?php
if ($_SESSION["nivel"]==1)
{
    echo "usted no esta autorizado a realizar esta operación";
    ?>
    <meta http-equiv="refresh" content="3;url=indice.html">
    <?php
    die();
}
?>