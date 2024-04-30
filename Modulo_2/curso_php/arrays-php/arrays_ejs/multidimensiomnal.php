<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Multi dimensional</title>
</head>
<body>
    <?php
     // Multidimensionales
     $frutas = array(
        array("color"=>"rojo", "sabor"=>"dulce", "nombre"=>"Pera"),
        array("color"=>"verde", "sabor"=>"amargo", "nombre"=>"Lima"),
        array("color"=>"amarillo", "sabor"=>"amargo", "nombre"=>"Lima")
     );
     foreach ($frutas as $fruta) {
        echo "<h2>".$fruta["nombre"]."</h2>
        <ul>";
        foreach ($fruta as $clave=>$dato){
            echo "<li>".$clave.": ". $dato."</li>";
        }
          
        echo "</ul>";
      }
      
    ?>
</body>
</html>