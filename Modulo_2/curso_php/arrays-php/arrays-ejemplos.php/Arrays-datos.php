<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Datos PHP</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php
    $coches = array("Honda", "Toyota", "Subaru");
    var_dump($coches);
    echo "<br>";
    print_r($coches);

    // Acceder a un elemento del array
    echo "<br>"."<h3>Accedemos al valor [1] que es Toyota</h3>";
    $elemento = $coches[1];
    echo $elemento ."<hr>";
    // Modificar
    $coches[1] = "Seat";
    $elemento = $coches[1];
    echo $elemento ."<hr>";
    //Añadir dato al array
    array_push($coches, "Seat");
    echo $coches[3] . "<hr>"; 
    // Anadir varios coches al array
    echo "<h3>Añadimos varios coches al array</h3><br>";
    array_push($coches, "Renault", "MG", "Rover");
    echo "<br>";
    foreach ($coches as $vehiculos) {
        echo "$vehiculos <br>";
    }

    //Eliminar elemento del array
    echo "<hr>";
    echo "<h3>Eliminamos el segundo elemento del array</h3><br>";
    unset($coches[1]);
    foreach ($coches as $vehiculos) {
        echo "$vehiculos <br>";
    }
    ?>
</body>
</html>