<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays asociativos</title>
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
$fruta = array("color"=>"rojo", "sabor"=>"dulce", "nombre"=>"Pera");
// accedemos a “color”
   echo $fruta['color']; // rojo
   echo "<br>";
   //Modificar
   $fruta['color'] = "amarillo";
   // Añadir
   $fruta['temporada'] = "verano"; //otro item
   //eliminar
   unset($fruta["sabor"]); //Unset elimina del array
//array_diff Crea un nuevo array sin el/los elemento/s
   $nuevo_array = array_diff($fruta, ["amarillo"]); 
   foreach ($fruta as $x => $y) {
       echo "$x: $y <br>"; // La forma de imprimir claves
     }
// recoger una clave
     $keys = array_keys($fruta);
     echo $keys[1]; // ”sabor”
     echo "<br>";

  foreach ($fruta as $x) {
       echo "$x <br>"; // amarillo dulce...
     }
 ?>

</body>
</html>