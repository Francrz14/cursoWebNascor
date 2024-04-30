<?php
// test error
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Coche {
        // Propiedades públicas
        private $name;
        private $color;
        private $weight;

        
        // Funcion por defecto Pública
        function set_name($nuevoValor) {
            $this->name = $nuevoValor;
        }
        // Funcion Protegida cambiamos a pubic para que vaya
        public function set_color($nuevoValor) {
            $this->color = $nuevoValor;
        }
        // Funcion Privada cambiamos a public para que vaya
        protected function set_weight($nuevoValor) {
            $this->weight = $nuevoValor;
        }
        // Esto es una funcion VOID
        protected function get_name() {
            echo $this->name;
            return $this->name;
        }
    }

class Modelo extends Coche {
    public function get_nameFromChild($nuevoValor){
        // echo $nuevoValor->get_name();
        return $nuevoValor->get_name();
    }
}
    // $Honda = new Coche("Honda", "Azul", "1200kg");
    // $Honda->set_name('Honda CR-Z'); 
    // $Honda->set_color('Azul');
    // $Honda->set_weight('1200kg');

    $toyota = new Modelo('Prius', 'Rojo', '1500kg');
    $toyota->set_name('Prius');
    $toyota->set_color('Rojo');
    $toyota->set_weight('1500kg');
    echo $toyota->get_nameFromChild($toyota);
    // Imprimimos
    // echo "<h2> Nombre del Coche: " . $Honda->name . "</h2>". "<br>";
    // echo "<h2> Color del coche: " . $Honda->color . "</h2>". "<br>";
    // echo "<h2> El coche pesa: " .$Honda->weight . "</h2>". "<br>";
    
    ?>
</body>
</html>