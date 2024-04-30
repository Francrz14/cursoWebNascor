<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Función para calcular el factorial de un número
function factorialconWhile($numero) {
    $factorial = 1;
    while ($numero > 1) {
        $factorial *= $numero;
        $numero--;
    }
    return $factorial;
}

// Leer el número del usuario
$numero = 4;

// Calcular el factorial del número
$factorial = factorialconWhile($numero);

// Mostrar el resultado
echo "Con While: El factorial de $numero es: $factorial <hr>";
?>
<?php
// Función para calcular el factorial de un número
function factorialFRecursiva($numero) {
    if ($numero == 0) {
        return 1;
    } else {
        return $numero * factorialFRecursiva($numero - 1);
    }
}

// Leer el número del usuario

// Calcular el factorial del número
$factorial = factorialFRecursiva($numero);

// Mostrar el resultado
echo "Con función recursiva: El factorial de $numero es: $factorial <hr>";
?>

</body>
</html>