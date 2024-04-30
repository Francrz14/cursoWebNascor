<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Asociativos</title>
</head>
<body>
    <?php
    // Creamos el Array
    $coche = array("marca"=>"honda", "modelo"=>"CR-Z", "año"=> 2010);
    // Accedemos al valor del elemento por su clave
    echo $coche['modelo']."<br>"; 
    // Modificar el elemento por su clave
    $coche['modelo'] = "civic";
    echo $coche['modelo']."<hr>";
    echo "<hr>";
    // Añadir elemento al array asociativo
    // En Array asociativo no se puede usar array_splice()
    $coche['color'] = "negro";
    echo $coche['color'] ."<br>";
    unset($coche['Marca']);
    foreach ($coche as $clave => $valor) {
        echo "$clave: $valor <br>";
    }
    echo "<hr>";
    asort($coche);
    foreach ($coche as $clave => $valor) {
        echo "$clave: $valor <br>";
    }
    echo "<hr>";
    // foreach ($coche as $coches => $valor){
    //     echo " Datos Vehículo $coches $valor <hr>";
    //     $coches = strtolower($coches);
    //     $valor = strtolower($valor);
    //     if ($valor[0] == "h"){
    //         echo "Mostrar  $valor <hr>";
    //     };
    // }

    ?>
</body>
</html>