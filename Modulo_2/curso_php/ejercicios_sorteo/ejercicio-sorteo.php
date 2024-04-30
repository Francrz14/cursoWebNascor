<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Evaluable</title>
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
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .botones .two {
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
    <div id="container">
        <div class="seccion">
            <h2>Premios</h2>
            <form action="" method="post" id="form_php">
                Premios: <input type="number" name="premios" id=""><br>
                Cantidad en euros:
                <select name="premio_euros" id="">
                    <option value="1000">1000 €</option>
                    <option value="2000">2000 €</option>
                    <option value="3000">3000 €</option>
                    <option value="4000">4000 €</option>
                </select><br><br>
                <div class="botones">
                    <input type="submit" value="Enviar" class="one">
                    <input type="reset" value="Reset" class="two">
                </div>
            </form>
        </div>
        <div class="seccion">
            <h2>Ganadores y Premios</h2>
            <?php
            // Lista de concursantes
            $concursantes = array("Fran", "Santiago", "Eduardo", "María", "Cristina", "Laura");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $premios = $_POST["premios"];
                
                // Verificar si el campo de premios está vacío
                if (empty($premios)) {
                    echo "<p>Por favor, introduce el número de premios.</p>";
                } else {
                    // Validar si hay más concursantes que premios
                    if ($premios > count($concursantes)) {
                        echo "<p>No hay suficientes concursantes para otorgar $premios premios.</p>";
                    } else {
                        // Realizar el sorteo
                        $ganadores = (array) array_rand($concursantes, $premios);

                        // Mostrar los ganadores y sus premios
                        echo "<ol>";
                        foreach ($ganadores as $ganador) {
                            $premio_euros = $_POST["premio_euros"];
                            echo "<li>$concursantes[$ganador] ==> $premio_euros € 💪🍾</li>";
                        }
                        echo "</ol>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>