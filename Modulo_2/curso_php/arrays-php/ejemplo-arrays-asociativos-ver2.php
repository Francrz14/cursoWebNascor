<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays asociativos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bolder;
        }

        hr {
            width: 30%;
            background-color: blue;
            padding: 2px;
        }
    </style>
</head>
<body>
    <?php
    $videojuego = array("Contra" => "Ps4", "Gran Turismo 7" => "Ps5", "Halo" => "Xbox series X");
    // accedemos a “color”
    echo $videojuego['Contra']; // rojo
    echo "<hr>";
    echo "<h2> Imprime las claves y valores </h2>";
    //Modificar
    $videojuego['Contra'] = "Ps5";
    // Añadir
    $videojuego['Mario Kart'] = "Switch"; //otro item
    echo "<strong>Imprimir las keys y los values:</strong><br>";
    foreach ($videojuego as $videojuegos => $arrayvideojuegos) {
        echo "$videojuegos:  $arrayvideojuegos <br>";
    }
    echo "<hr>";

    //Recoger un value   
    $value = array_keys($videojuego);
    echo " Clave de recogida: " . $value[0];
    echo "<hr>";
    echo "<strong>Imprimir solo keys</strong> <br>";
    foreach ($videojuego as $key) {
        echo "$key <br>";
    }

    //Eliminar
    echo "<hr>";
    echo "Como queda el Array tras <strong>Eliminar:</strong> <br>";
    unset($videojuego["Gran Turismo 7"]);
    
    foreach ($videojuego as $videojuegos => $value) {
        echo "$videojuegos: $value <br>";
    }
    echo "<hr>";
    echo "Como queda el nuevo Array tras <strong>descartar:</strong> <br>";
    $nuevoArray = array_diff($videojuego, [""]);
    foreach ($nuevoArray as $videojuegos) {
        echo "$videojuegos <br>";
    }
    echo "<hr>";
    ?>
</body>
</html>