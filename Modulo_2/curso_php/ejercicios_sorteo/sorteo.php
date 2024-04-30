<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $nombres = array( // Define un arreglo con nombres de participantes
        "Fran Ropero",
        "Eduardo Perez",
        "Santiago Ruano",
        "María Martínez",
        "Carlos González",
        "Laura Díaz",
        "José Rodríguez",
        "Ana Sánchez",
        "Pedro Fernández",
        "Lucía Pérez"
    );

    $premios = 3; // Define la cantidad de premios a otorgar
    function listaAleatorios($premios, $cantidadNombres)
    { // Define una función para seleccionar ganadores al azar
        $ganadores = array(); // Arreglo para almacenar los índices de los ganadores
        $cantidadParticipantes = $cantidadNombres - 1; // Calcula la cantidad de participantes
        while (count($ganadores) < $premios) { // Mientras no se haya seleccionado suficientes ganadores
            $ganador = rand(0, $cantidadParticipantes); // Genera un índice aleatorio
            if (!in_array($ganador, $ganadores)) { // Si el ganador no ha sido seleccionado previamente
                $ganadores[] = $ganador; // Agrega el índice del ganador al arreglo de ganadores
            }
        }
        return $ganadores; // Devuelve el arreglo de índices de ganadores
    }

    $cantidadNombres = count($nombres); // Obtiene la cantidad de nombres de participantes
    $listaGanadores = listaAleatorios($premios, $cantidadNombres); // Obtiene la lista de índices de ganadores

    echo "<h2> Los Ganadores Son </h2>"; // Imprime un encabezado
    echo "<ol>"; // Inicia una lista ordenada
    foreach ($listaGanadores as $numeroOrden) { // Itera sobre los índices de los ganadores
        echo "<li>$nombres[$numeroOrden]</li>"; // Imprime cada ganador
    }
    echo "</ol>"; // Cierra la lista ordenada
    ?>
</body>
</html>