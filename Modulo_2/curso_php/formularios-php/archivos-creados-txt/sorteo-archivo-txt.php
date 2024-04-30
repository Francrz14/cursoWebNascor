<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
    <style>
        body {
            margin: 0 auto;
            background-image: url('https://dropinblog.net/34249715/files/featured/1-que___es_el_php.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .titulo {
            text-align: center;
            font-size: 50px;
            font-family: 'Courier New', Courier, monospace;
            font-style: oblique;
            background-color: whitesmoke;
            margin: 0;
            padding: 40px;
        }

        /* Centralo todo */
        #main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #container {
            width: 100%;
            padding: 20px;
            display: flex;
            background-color: rebeccapurple;
            justify-content: space-evenly;
            background-image: url('https://static.vecteezy.com/system/resources/previews/006/455/761/large_2x/euro-money-banknotes-background-texture-fifty-and-one-hundred-banknotes-only-free-photo.jpg');
            background-size: cover;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .container2 {
            margin: 30px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rebeccapurple;
            font-size: 20px;
        }

        .seccion {
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.5);
            background-color: #f0f0f0;
            padding: 40px;
        }

        .seccion_resultados {

            width: 100%;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.5);
            background-color: #f0f0f0;
            padding: 40px;
        }

        .seccion h2 {
            text-align: center;
        }

        .botones {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 4px 10px;
            background-color: lightcyan;
            border: none;
            color: red;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: blue;
            transform: scale(1.2);
        }

        .botones .one {
            margin-top: 10px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .botones .two {
            margin-top: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        @media screen and (max-width: 480px) {

            body {
                background-color: whitesmoke;
                background-size: contain;
            }

            #container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .seccion {
                width: 80%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <h1 class="titulo">Ejercicio Sorteo</h1>
    <div id="main-container">

        <div id="container">
            <div class="seccion">
                <h2>Formulario Concursantes</h2>
                <form action="" method="post">
                    <label for="concursante">Concursante: </label>
                    <input type="text" name="concursante" id="concursante">
                    <br>
                    <div class="botones">
                        <input type="submit" value="Enviar concursante" class="one"></input>
                        <input type="reset" value="Reset" class="two"></input>
                    </div>
                </form>
            </div>
            <div class="seccion">
                <form action="" method="post">
                    <h2>Formulario Premios</h2>
                    <label for="premio1">Premio 1: </label>
                    <input type="number" name="premio1" id="premio1">
                    <br>
                    <label for="premio2">Premio 2: </label>
                    <input type="number" name="premio2" id="premio2">
                    <br>
                    <label for="premio3">Premio 3: </label>
                    <input type="number" name="premio3" id="premio3">
                    <br>
                    <label for="premio4">Premio 4: </label>
                    <input type="number" name="premio4" id="premio4"><br>
                    <div class="botones">
                        <input type="submit" value="Realizar Sorteo" class="one"></input>
                        <input type="reset" value="Reset" class="two"></input>
                    </div>
                </form>
            </div>
        </div>
        <div id="container2">

            <div class="seccion_resultados">
                <h2>Ganadores y Premios</h2>
                <?php

                if (isset($_POST['premio1'])) {
                    $archivo_txt = fopen('lista-ganadores.txt', 'r');
                    // Leer el contenido del archivo y dividirlo en un array de nombres
                    $archivo_txt = file_get_contents('lista-ganadores.txt');
                    $nombres = explode('<br>', $archivo_txt);

                    // Eliminar etiquetas HTML <br> y espacios adicionales de la lista de nombres
                    $nombres = array_filter(array_map('trim', $nombres));

                    function listaAleatorios($premios, $nombres)
                    {
                        $ganadores = array();
                        $cantidadNombres = count($nombres);
                        while (count($ganadores) < $premios && count($ganadores) < $cantidadNombres) {
                            $ganador = rand(0, $cantidadNombres - 1);
                            if (!in_array($ganador, array_column($ganadores, 0))) {
                                $ganadores[] = array($ganador, $_POST['premio' . count($ganadores) + 1]);
                            }
                        }
                        return $ganadores;
                    }

                    // Contar el número de premios excluyendo el botón de envío
                    $premios = count($_POST);
                    if (isset($_POST['submit'])) {
                        $premios -= 1;
                    }
                    $listaGanadores = listaAleatorios($premios, $nombres);

                    // Mostrar los ganadores y sus premios
                    foreach ($listaGanadores as $ganador) {
                        // Acceder directamente al array de nombres para imprimir el nombre del ganador
                        echo $nombres[$ganador[0]] . " ha ganado " . $ganador[1] . " euros. <br>";
                    }
                    exit;
                } else if (isset($_POST['concursante'])) {
                    $archivo_txt = fopen('lista-ganadores.txt', 'a');
                    if (!$archivo_txt) {
                        $archivo_txt = fopen('lista-ganadores.txt', 'w');
                    }
                    fwrite($archivo_txt, $_POST['concursante'] . "<br>");
                    fclose($archivo_txt);
                    echo "<p>Concursante añadido correctamente.</p>";
                } else {
                    echo "<p>Rellena el formulario por favor</p>";
                }

                ?>
            </div>
        </div>
    </div>
</body>
</html>