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
        // Propiedades
        private $nombre;
        private $modelo;

        // Métodos
        function set_name($nombre) {
            $this->nombre = $nombre;
        }

        function get_name(){
            return $this->nombre;
        }
    }

    $honda = new Coche('honda','hona', 'add');
    $toyota = new Coche('honda','hona', 'add');
    $honda->set_name('Honda');
    $toyota->set_name('Toyota');

    echo $honda->get_name();
    echo "<br>";
    echo $toyota->get_name();
    ?>
</body>
</html>