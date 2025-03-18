<?php
// pila.php
session_start();

class Pila {
    public $elementos;
    public $tope;

    public function __construct() {
        $this->elementos = isset($_SESSION['pila']) ? $_SESSION['pila'] : [];
        $this->tope = count($this->elementos);
    }

    public function insertar($e) {
        array_push($this->elementos, $e);
        $this->tope++;
        $_SESSION['pila'] = $this->elementos;
    }

    public function eliminar() {
        if ($this->tope > 0) {
            $eliminado = array_pop($this->elementos);
            $this->tope--;
            $_SESSION['pila'] = $this->elementos;
            echo "Elemento eliminado: $eliminado";
        } else {
            echo "La pila está vacía.";
        }
    }

    public function mostrar() {
        if ($this->tope > 0) {
            echo "Elementos en la pila: " . implode(", ", $this->elementos);
        } else {
            echo "La pila está vacía.";
        }
    }
}

$pila = new Pila();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'insertar':
            $pila->insertar($_POST['elemento']);
            break;
        case 'eliminar':
            $pila->eliminar();
            break;
        case 'mostrar':
            $pila->mostrar();
            break;
        case 'salir':
            session_destroy();
            echo "Sesión cerrada.";
            break;
    }
    echo '<br><br><a href="pila.html" class="volver">Volver</a>';
}
?>