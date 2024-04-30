<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
    if (isset($_POST['nombre']) && isset($_POST['email']) && $_POST['email'] != '') {
        $listadoParticipantes = array('nombre' => $_POST['nombre'], 'email' => $_POST['email']);
        $listadoCompleto = $listadoParticipantes;
        array_push($listadoCompleto, $_POST['listado_participantes']); // Agregamos el elemento adicional al array

        foreach ($listadoCompleto as $clave => $concursante) {
            echo "$clave: ";
            foreach ($concursante as $key => $value) {
                echo "$key : $value<br>";
            }
        }
    }
    ?>
</body>
</html>