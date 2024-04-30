<!DOCTYPE html>
<html lang="en">
<head>
<meta charset ="UTF-8" >
<meta name="viewport" content ="width=device-width,
initial-scale=1.0" >
<title>Ejemplo variables PHP </title>
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
// Declaración de variables
$nombre = "Juan García" ;
$edad = 30;
$soltero = true;
$esSoltero = "Si";
// aquí quita el ! para que te salga que NO
if (!$soltero ) $esSoltero = "No";
// Impresión de variables
function imprime (){
    global  $nombre, $edad, $soltero, $esSoltero;
    echo "Nombre: " . $nombre . "<br>";
    echo "Edad: " .  $edad . "<br>" ;
    echo "¿Soltero?: " . $esSoltero . "<br>" ;
}
imprime ()
?>
</body>
</html>