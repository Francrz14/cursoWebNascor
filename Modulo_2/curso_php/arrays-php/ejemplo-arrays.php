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
// Creación de array
$colores = array("rojo", "verde", "azul");

// Definición de una función
function miFuncion() {
    echo "Esta es una función.";
}

// Creación del array corregido
$miArray = array("PHP", 18, ["pedro", "pablo"], "miFuncion");

// Impresión del contenido del array
echo "<pre>";
print_r($miArray);// cambia a $colores para que muestre los colores
echo "</pre>";
?>
</body>
</html>
