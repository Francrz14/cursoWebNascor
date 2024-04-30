<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
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
        .container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
        }
        .section {
            flex: 1;
            margin: 0 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="number"] {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <h2>Formulario</h2>
            <form method="post">
                <label for="premios">Cantidad de Premios:</label>
                <input type="number" id="premios" name="premios" min="1" required>
                <label for="cantidadNombres">Cantidad de Concursantes:</label>
                <input type="number" id="cantidadNombres" name="cantidadNombres" min="1" max="10" required>
                <button type="submit">Realizar Sorteo</button>
            </form>
        </div>
        <div class="section">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombres = array(
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

                $premios = $_POST['premios'];

                // Definir los premios con su valor en euros
                $valoresPremios = array(
                    1 => "1000 euros",
                    2 => "2000 euros",
                    3 => "3000 euros",
                    4 => "4000 euros"
                );

                function listaAleatorios($premios, $cantidadNombres)
                {
                    $ganadores = array();
                    $cantidadParticipantes = $cantidadNombres - 1;
                    while (count($ganadores) < $premios) {
                        $ganador = rand(0, $cantidadParticipantes);
                        if (!in_array($ganador, $ganadores)) {
                            $ganadores[] = $ganador;
                        }
                    }
                    return $ganadores;
                }

                $cantidadNombres = $_POST['cantidadNombres'];
                $listaGanadores = listaAleatorios($premios, $cantidadNombres);

                echo "<h2>Los Ganadores Son</h2>";
                echo "<ol>";
                // Iterar sobre los ganadores y asignarles un premio
                foreach ($listaGanadores as $key => $numeroOrden) {
                    // Obtener el premio correspondiente
                    $premio = isset($valoresPremios[$key + 1]) ? $valoresPremios[$key + 1] : "No hay premio disponible";
                    echo "<li>$nombres[$numeroOrden] - $premio</li>";
                }
                echo "</ol>";
            }
            ?>
        </div>
    </div>
</body>
</html>

