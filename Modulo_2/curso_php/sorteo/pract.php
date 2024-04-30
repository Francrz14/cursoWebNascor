<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $premios = 5;
    function sorteo($premios, $numeroNombres){
        $ganadores = array();
        $cantidadParticipantes = $numeroNombres - 1;
        while (count($ganadores) < $premios) {
            $ganador = rand(0, $cantidadParticipantes);
            if (!in_array($ganador, $ganadores)){
                $ganadores[] = $ganador;
            }
        }
        return $ganadores;
    }
    $numeroNombres = count($nombres);
    $listaGanadores = sorteo($premios, $numeroNombres);

    echo "Los ganadores son: ";
    echo "<ol>";
    foreach ($listaGanadores as $mostrarGanadores){
        echo "<li>$nombres[$mostrarGanadores]</li>";
    }
    echo "<ol>";
    ?>
    
</body>
</html>