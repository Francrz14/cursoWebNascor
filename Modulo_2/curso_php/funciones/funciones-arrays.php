<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Arrays</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
            font-size: 30px;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <?php
    // array_splice($array, $desde, $hasta);
    // sort($array);
    // rsort($array); //(reverse sort);
    // array_merge($array1,$array2);


    // Ejemplo funcional
    // Definir y asignar valores a los arrays
    $array = array("rojo", "verde", "azul", "amarillo");
    $array1 = array(1, 2, 3);
    $array2 = array("a", "b", "c");

    // Ejecutar las funciones
    array_splice($array, 1, 2); // Eliminar elementos del array
    sort($array); // Ordenar el array de forma ascendente
    rsort($array); // Ordenar el array de forma descendente
    $resultado = array_merge($array1, $array2); // Combinar los dos arrays

    // Mostrar los resultados
    print_r($array1);
    echo "<br><br>"; // Mostrar el array modificado
    print_r($resultado); // Mostrar el resultado de la combinación de arrays
    ?>
</body>
</html>