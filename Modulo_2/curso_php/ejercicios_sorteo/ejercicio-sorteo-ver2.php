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
            background-color: rebeccapurple !important;
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
            <form method="post">
                <label for="premios">Cantidad de Premios:</label>
                <input type="number" id="premios" name="premios" min="1" required><br>
                <label for="cantidadNombres">Cantidad de Concursantes:</label>
                <input type="number" id="cantidadNombres" name="cantidadNombres" min="1" max="10" required><br>
                <div class="botones">
                    <input type="submit" value="Realizar Sorteo" class="one"></input>
                    <input type="reset" value="Reset" class="two"></input>
                </div>
            </form>
        </div>
        <div class="seccion">
            <h2>Ganadores y Premios</h2>
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

                // Definir los premios con su valor en euros
                $valoresPremios = array(
                    1 => "1000 €",
                    2 => "2000 €",
                    3 => "3000 €",
                    4 => "4000 €"
                );

                function listaAleatorios($nombres, $valoresPremios)
                {
                    shuffle($nombres); // Mezclar los nombres de forma aleatoria
                    $premios = $_POST["premios"];
                    $ganadores = array(); // Array para almacenar los ganadores y premios

                    // Asignar premios a los ganadores
                    for ($i = 0; $i < $premios; $i++) {
                        $ganador = array_shift($nombres); // Obtener el primer nombre de la lista
                        $premio = array_shift($valoresPremios); // Obtener el primer premio de la lista
                        $ganadores[$ganador] = $premio; // Asignar el premio al ganador
                    }

                    // Mostrar la lista de ganadores y premios
                    echo "<ol>";
                    foreach ($ganadores as $nombre => $premio) {
                        echo "<li>$nombre ==> $premio 💪🍾</li>";
                    }
                    echo "</ol>";
                }

                listaAleatorios($nombres, $valoresPremios);
            }
            ?>
        </div>
</body>
</html>