<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO constructor PHP</title>
</head>
<body>
    <?php
    // Creamos un objeto con class
    class Coche {
        // Propiedades
        private $nombre;
        private $modelo;
        private $color;
        // Iniciamos los argumentos
        function __construct($nombre, $modelo, $color) {
            $this->nombre = $nombre;
            $this->modelo = $modelo;
            $this->color = $color;
        }
        // Accedemos al valor de la propiedad privada nombre
        function get_name() {
            return $this->nombre;
        }
        // Accedemos al valor de la propiedad privada modelo
        function get_model(){
            return $this->modelo;
        }
        // Accedemos al valor de la propiedad privada color
        function get_color() {
            return $this->color;
        }
    }
    // Se ejecuta una nueva instacia basado en los argumento que has introducido en el __construct()
    $honda = new Coche("Honda", "CR-Z", "Azul");
    // Imprimimos 
    echo "<h1>Tengo un ". $honda->get_name() . ' '.$honda->get_model(). " de color ". $honda->get_color()."</h1> ";
    ?>
</body>
</html>