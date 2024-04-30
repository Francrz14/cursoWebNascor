<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super global Server</title>
    
</head>
<body>
    <?php
    //Hace de variable de mi nombre
    define("Nombre", "Fran Ropero");

    //Funcion para escribir tu nombre
    function escribirNombre(){
        echo "Mi nombre es " . Nombre . ".<br>";
    }
    escribirNombre();
    echo "<hr>";
    // Función para imprimir todos los datos del servidor usando la superglobal $_SERVER
    function imprimirDatosServidor()
    {
        echo "Datos del servidor:<br>";
        foreach ($_SERVER as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }
    }
    // Llama a la función para imprimir los datos del servidor
    imprimirDatosServidor();

    ?>
</body>
</html>