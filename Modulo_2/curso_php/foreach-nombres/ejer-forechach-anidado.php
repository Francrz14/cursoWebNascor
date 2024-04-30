<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio ForEach anidado PHP</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <h1>Ejercicio Laberinto foreach</h1>
    <?php
    $laberinto = array(
        array("#", "#", "#", "#", "#"),
        array("#", ".", ".", ".", "#"),
        array("#", ".", "#", ".", "#"),
        array("#", ".", ".", ".", "#"),
        array("#", "#", "#", "#", "#")
    );

    echo "<pre>";
    print_r($laberinto);
    echo "<pre>";
    // Declaramos una variable vacia
    $numeroPuntos = 0;
    // bucle que laberinto lo pone en otra variable filas
     foreach ($laberinto as $filas){
        // bucle dentro de otr bucle
        foreach ($filas as $puntos){
            // condicion si encuentra . los encrementa numero punto ++ 
            if ($puntos === "."){
                $numeroPuntos++;
            }
        }
     }
     echo "El laberinto tiene $numeroPuntos puntos. <br><br>";

     $numeroAlmuadillas = 0;
     foreach ($laberinto as $filas){
        foreach ($filas as $Almuadillas){
            if ($Almuadillas === "#"){
                $numeroAlmuadillas++;
            }
        }
     }
     echo "El laberinto tiene $numeroAlmuadillas almuadillas.";
    ?>
</body>
</html>