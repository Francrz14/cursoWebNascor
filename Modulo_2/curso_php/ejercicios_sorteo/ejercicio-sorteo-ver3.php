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

        #container {
            padding: 20px;
            display: flex;
            background-color: rebeccapurple;
            justify-content: space-evenly;
            background-image: url('https://static.vecteezy.com/system/resources/previews/006/455/761/large_2x/euro-money-banknotes-background-texture-fifty-and-one-hundred-banknotes-only-free-photo.jpg');
            font-size: 20px;
        }

        .seccion {
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
    <!-- Crea una aplicación PHP que tenga un array con 6 concursantes para un sorteo aleatorio. 
    Haz un formulario que contenga los campos necesarios para indicar los premios de los ganadores
    en euros y la cantidad de premios que se están estableciendo.
    Realiza el sorteo y mete en un array a los ganadores junto con el premio ganado por orden de cuantía.
    De la lista de premios sólo se puede asignar una vez cada premio y ningún concursante puede ganar dos 
    premios.
    Utiliza CSS y HTML para colocar las listas y el formulario en 3 secciones en horizontal y
    responsive (2 columnas en tablets y una en móviles). -->

    <h1 class="titulo">Ejercicio Sorteo</h1>
    <div id="container">
        <div class="seccion">
            <h2>Formulario</h2>
            <form action="" method="post">
                Cantidad de Premios <input type="number" name="cantidadDePremios" id=""><br>
                Premio 1 <input type="number" name="premio1" id="premio"><br>
                Premio 2 <input type="number" name="premio2" id="premio"><br>
                Premio 3 <input type="number" name="premio3" id="premio"><br>
                Premio 4 <input type="number" name="premio4" id="premio"><br>
                <div class="botones">
                    <input type="submit" value="Realizar Sorteo" class="one"></input>
                    <input type="reset" value="Reset" class="two"></input>
                </div>
            </form>
        </div>
        <div class="seccion">
            <h2>Ganadores y Premios</h2>
            <?php
            if (isset($_POST['cantidadDePremios'])) {
                $nombres = array(
                    "Fran Ropero",
                    "Eduardo Perez",
                    "Santiago Ruano",
                    "Cristina García",
                    "Carlos González",
                    "Laura Díaz",
                    "José Rodríguez",
                    "Ana Sánchez",
                    "Pedro Fernández",
                    "Lucía Pérez"
                );

                $montosPremios = array(
                    1000,
                    2000,
                    3000,
                    4000
                );

                function listaAleatorios($premios, $cantidadNombres, $montosPremios) {
                    $ganadores = array();
                    $indiceparticipantes = $cantidadNombres - 1;
                    while (count($ganadores) < $premios) {
                        $ganador = rand(0, $indiceparticipantes);
                        if (!in_array($ganador, array_column($ganadores, 0))) {
                            $premio = ($ganadores ? ($montosPremios[count($ganadores) - 1]) : $montosPremios[0]);
                            $ganadores[] = array($ganador, $premio);
                        }
                    }
                    return $ganadores;
                }

                $premios = $_POST['cantidadDePremios'];
                $cantidadNombres = count($nombres);
                $listaGanadores = listaAleatorios($premios, $cantidadNombres, $montosPremios);

                // Mostrar los ganadores y sus premios
                foreach ($listaGanadores as $ganador) {
                    echo $nombres[$ganador[0]] . " ha ganado " . $ganador[1] . " euros. <br>";
                }
            }
            ?>

        </div>
</body>

</html>