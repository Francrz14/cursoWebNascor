<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre = "Fran";
        $apellido = "Ropero";
        $apellido2 = "Lindes";
        $edad = 38;
        $comunidad = "Jaén";
        $ciudad = "Linares";
        echo "<h2>Hola " .$nombre. " " .$apellido. " " .$apellido2. "</h2>";
        echo "<h2>Edad $edad</h2>"; 
        echo "<h2>Comunidad $comunidad </h2>"; 
        echo "<h2>Ciudad $ciudad </h2>" ."<br>"; 
        ?>

<?php
    function datos(){
        global $nombre, $apellido, $apellido2, $edad, $comunidad, $ciudad;
        
        echo "<h2>Hola " .$nombre. " " .$apellido. " " .$apellido2. "</h2>";
        echo "<h2>Edad $edad</h2>"; 
        echo "<h2>Comunidad $comunidad </h2>";
        echo "<h2>Ciudad $ciudad </h2>";
        exit;
    }
    datos();
    
    ?>
</body>
</html>