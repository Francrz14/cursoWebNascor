<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Array Multidimensional</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
            font-size: 25px;
        }
        hr {
            width: 30%;
            padding: 2px;
            background-color: black;
        }
    </style>
</head>
<body>
    <?php
     $estudiantes = array(
        array(
            "nombre" => "Juan",
            "edad" => 20,
            "notas" => array(9, 8, 6)
        ),
        array(
            "nombre" => "María",
            "edad" => 22,
            "notas" => array(7, 9, 6)
        ),
        array(
            "nombre" => "Carlos",
            "edad" => 21,
            "notas" => array(8, 9, 7)
        ),
        array(
            "nombre" => "Laura",
            "edad" => 23,
            "notas" => array(6, 8, 9)
        )
    );
    // Edad de María
    $edadMaria = $estudiantes[1]['edad']; //Accedemos a edad
    echo "La edad de María es: $edadMaria <br>";
    echo "<hr>";
    // Segunda nota de Carlos
    $segundaNotaCarlos = $estudiantes[2]['notas'][1]; // Accedemos a la segunda nota de Carlos
    echo "La segunda nota de Carlos es: $segundaNotaCarlos <br>";
    echo "<hr>";
    // Otra forma de imprimir estudiantes con , al final de cada nombre
    $nombreEstudiantes = array_column($estudiantes, 'nombre');
    echo "El nombre de todos los estudiantes con una coma al final es: " . implode(", ", $nombreEstudiantes);
    echo "<hr>";

    // Nombre de todos los estudiantes
    echo "El nombre de todos los estudiantes es :<br>";
    foreach ($estudiantes as $estudiante){
        $todosNombreEstudiantes = $estudiante['nombre']; // Accedemos al nombre
        echo $todosNombreEstudiantes .", <br>";
    } 
    echo "<hr>";
    // Media de las notas de laura
    $notasLaura = $estudiantes[3]['notas']; // Accedemos al array multidi de Laura
    $mediaNotasLaura = array_sum($notasLaura) / count($notasLaura); // Te hace la media de las notas de Laura
    $mediaNotasLauraDosDecimales = number_format($mediaNotasLaura, 2); // Te muestra la nota con dos decimales
    echo "La media de las notas de laura es: $mediaNotasLauraDosDecimales";
    ?>
</body>
</html>