<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Coches Multidimensional</title>
    <style>
        body {
            margin-top: 40px;
            text-align: center;
            font-size: 25px;
        }
    </style>
</head>
<body>
<?php
$coches = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);
  
echo "Marca: ". $coches[0][0]. ": En stock: ".$coches[0][1]. ", Vendidos: ".$coches[0][2].".<br>";
echo "Marca: ". $coches[1][0]. ": En stock: ".$coches[1][1]. ", Vendidos: ".$coches[1][2].".<br>";
echo "Marca: ". $coches[2][0]. ": En stock: ".$coches[2][1]. ", Vendidos: ".$coches[2][2].".<br>";
echo "Marca: ". $coches[3][0]. ": En stock: ".$coches[3][1]. ", Vendidos: ".$coches[3][2].".<br>";
?>
</body>
</html>