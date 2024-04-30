<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones PHP</title>
    <style>
        html {
            font-size: 40px;
        }
    </style>
</head>
<body>
    <?php
    // Realiza la acción
    function saludo($nombre)
    {
        echo "Hola, " . $nombre . "!" ."<br>";
    }
    saludo("Juan");
    // Con devolución de datos
    function saludoreturn($nombre)
    {
        return "Hola, " . $nombre . "!";
    }
    $nombre = "Juan";
    $saludo = saludoreturn($nombre);
    echo $saludo;
    ?>
</body>
</html>