<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
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
    // Crear array
    $colores = array("rojo", "verde", "azul");
    // accedemos a “verde”
    echo $colores[1] . "<br><br>";
    //modificamos verde por amarillo
    $colores[1] = "amarillo";
    // Añadir
    $colores[] = "verde"; //añadimos verde al final
    // eliminamos “rojo”
    array_splice($colores, 0, 0);

    print_r($colores);
    ?>

    <?php
    $alumnos = array(
        "pedro",
        "pablo", "pepe"
    );
    foreach ($alumnos as $alumno) {
        echo "<br><br>";
        echo  "$alumno <br><br>";
    }
    print_r($alumnos);
    ?>
</body>

</html>