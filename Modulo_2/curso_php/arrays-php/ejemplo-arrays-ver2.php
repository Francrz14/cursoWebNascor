<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
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
    // Creación de array
    $colores = array("rojo", "verde", "azul");
    $miArray = array("PHP", 18, [
        "pedro",
        "pablo"
    ], miFuncion());
    $miArray[3]();
    ?>
</body>
</html>