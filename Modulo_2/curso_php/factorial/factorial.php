<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorial PHP</title>
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
<!-- La utilidad de la función Factorial:
Es habitual utilizar funciones Factoriales para calcular combinaciones y permutaciones. 
Gracias al Factorial se pueden llegar a calcular también probabilidades.

Por ejemplo:

Si tenemos 4 cuadros de colores y queremos colgarlos en la pared, uno detrás de otro podemos 
llegar a calcular la cantidad de combinaciones posibles:
4! = 1 * 2 * 3 * 4 = 24 combinaciones posibles -->

    <?php 
    // Definición de la función para calcular el factorial de un número
    function calcularFactorial($numero){
        // Inicialización de la variable $factorial
        $factorial = 1;

        // Bucle while para calcular el factorial
        while ($numero > 1){
            // Multiplicación del factorial actual por el número actual
            $factorial *= $numero;
            // Disminución del número para calcular el siguiente factorial
            $numero--;
        }

        // Devolución del resultado del factorial
        return $factorial;
    }

    // Llamada a la función calcularFactorial() con el argumento 5 y almacenamiento del resultado en la variable $resultado
    $resultado = calcularFactorial(5);

    // Impresión del resultado del factorial con un mensaje
    echo "El factorial de 5 es: $resultado" . "<br>";

    // Impresión de la fórmula utilizada para calcular el factorial
    echo "La fórmula que emplea es: 5 * 4 * 3 * 2 * 1 = " . $resultado;
    

     // Definición de la función factorialRecursivo
     function factorialRecursivo($numero){
        // Comprobamos si el número es 0 o 1, en cuyo caso el factorial es 1
        if($numero == 0 || $numero == 1){
            return 1; // Devolvemos 1 como caso base
        } else {
            // Si el número no es 0 o 1, calculamos el factorial recursivamente
            // Multiplicamos $numero por el resultado de la llamada recursiva con $numero - 1
            return $numero * factorialRecursivo($numero - 1);
        }
    }

    // Llamada a la función factorialRecursivo con el argumento 5 y almacenamiento del resultado en la variable $resultado
    $resultado = factorialRecursivo(5);

    // Impresión de un salto de línea seguido del mensaje con el resultado del factorial recursivo
    echo "El factorial recursivo de 5 es: $resultado";

    exit;
    ?>
</body>
</html>