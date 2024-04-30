<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Imprimir los números del 1 al 10
$numero = 1;
while ($numero <= 10) {
echo $numero . "<br>";
$numero++;

}
?>

<?php
// forEach
$alumnos = array("pedro", "pablo",
"pepe");
foreach ($alumnos as $alumno) {
echo "$alumno <br>";

}
?>
</body>
</html>