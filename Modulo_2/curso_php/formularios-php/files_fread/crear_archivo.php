<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    // La 'x' es para crear el nuevoarchivo.txt
    $archivo =  fopen('nuevoarchivo.txt', 'x');
    fwrite($archivo, '<h2>Mi primer fwhite()</h2><br><p>Hola desde mi nuevo archivo</p>');
    echo readfile('nuevoarchivo.txt');
    fclose($archivo);
    // La 'a' se utiliza para abrir un archivo para escritura, pero agrega contenido al final 
    // del archivo sin eliminar el contenido existente.
    $archivo =  fopen('nuevoarchivo.csv', 'a');
    fwrite($archivo, '<h2>Mi primer fwhite()</h2><br><p>Hola desde mi nuevo archivo</p>');
    echo file_get_contents('nuevoarchivo.csv');
    fclose($archivo);
    ?>
</body>
</html>