<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asociativo</title>
</head>
<body>
<?php
    // Crear array asociativo
    $fruta = array("color"=>"rojo", "sabor"=>"dulce", "nombre"=>"Pera");
    // accedemos a “color”
    echo $fruta['color'] . "<br>"; // rojo
    echo "<hr>"; 
    //Modificar
    $fruta['color'] = "amarillo"; 
    // Añadir
    $fruta['temporada'] = "verano"; //otro item
    echo "<b>Imprimir claves y valores:</b> <br>";
    foreach ($fruta as $x => $y) {
        echo "$x: $y <br>"; // La forma de imprimir una clave Color: amarillo Sabor: dulce...
      }
      echo "<hr>"; 
      // recoger una clave
      $keys = array_keys($fruta);
      echo "Clave recogida: " .$keys[0];
      echo "<hr>";
      echo "<b>Imprimir sólo valores:</b> <br>";
    foreach ($fruta as $x) {
        echo "$x <br>"; // amarillo dulce...
      }
    //eliminar
    echo "<hr>";
    echo "Cómo queda el array tras <b>eliminar:</b> <br>";
    unset($fruta["sabor"]); //Unset elimina del array
    foreach ($fruta as $x) {
        echo "$x <br>"; // amarillo Pera...
      }
    echo "<hr>"; 
    echo "Cómo queda el nuevo array tras <b>descartar:</b> <br>";
    $nuevo_array = array_diff($fruta, ["amarillo"]); //array_diff Crea un nuevo array sin el elemento
    foreach ($nuevo_array as $x) {
        echo "$x <br>"; // amarillo dulce...
      }
?>
</body>
</html>