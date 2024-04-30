<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangulo</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }
        hr {
            width: 50%;
            height: 5px;
            background-color: black;
            padding: 2px;
        }
    </style>
</head>
<body>
    <?php 
    // Definición de las longitudes de los catetos de un triángulo rectángulo
    $cateto1 = 9;
    $cateto2 = 15;

    // Definición de la función para calcular el área del triángulo
    function areaTriangulo($cateto1, $cateto2){ 
        // Fórmula del área de un triángulo rectángulo: base * altura / 2
        $area = $cateto1 * $cateto2 / 2; 
        // Devuelve el área del triángulo formateado con dos decimales
        return number_format($area, 2);
    }

    // Definición de la función para calcular la hipotenusa del triángulo
    function calcularHipotenusa($cateto1, $cateto2){
        // Fórmula de la hipotenusa de un triángulo rectángulo: sqrt(cateto1^2 + cateto2^2)
        $hipotenusa = sqrt(pow($cateto1, 2) + pow($cateto2, 2));
        // Devuelve la hipotenusa del triángulo formateada con dos decimales
        return number_format($hipotenusa, 2);
    }

    // Muestra el resultado del cálculo del área del triángulo y la hipotenusa en el HTML
    echo "
    <h2>El area del triángulo es : <strong>" . areaTriangulo($cateto1, $cateto2) . "</strong></h2><hr>
    <h2> La hipotenusa del triángulo es : <strong>" . calcularHipotenusa($cateto1, $cateto2) . "</strong></h2>
    ";
    ?>
</body>


</html>