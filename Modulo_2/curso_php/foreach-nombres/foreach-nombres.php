<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach Nombres</title>
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
    // Creamos un array llamado $nombres con algunos nombres.
    $nombres = array("Fran", "Pepe", "Santi", "Edu");

    // Iniciamos un bucle foreach que recorre cada elemento del array $nombres.
    foreach ($nombres as $nombre) {

        // Verificamos si el nombre comienza con 'p' o 'P' independientemente de su caso.
        // strtolower() convierte el nombre a minúsculas antes de verificar el inicio.
        if (str_starts_with(strtolower($nombre), 'f')) {
            // Si el nombre comienza con 'p' o 'P', imprimimos "Hola" seguido del nombre y un salto de línea.
            echo "Hola " . $nombre . "<br>";
            // strpos() devuelve la posición de la primera ocurrencia de la letra 'p' en el nombre.
            // strtolower() convierte el nombre a minúsculas antes de buscar la posición de 'p'.
            echo "Está en la posición " . strpos(strtolower($nombre), 'f');
            echo "<br>";
        }
    }
    ?>

    <?php
    // Realiza la acción
    function saludo($nombre)
    {
        echo "Hola, " . $nombre . "!";
        echo "<br>";
    }
    saludo("Juan");
    // Con devolución de datos
    function saludoreturn($nombre)
    {
        return "Hola, " . $nombre . "!";
    }
    $saludo = saludoreturn($nombre);
    echo $saludo;
    ?>
</body>
</html>