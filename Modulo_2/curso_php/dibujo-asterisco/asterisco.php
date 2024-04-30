<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios asteriscos</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>

</head>
<body>
    <?php
    for ($i = 4; $i > 0; $i--) {
        for ($j = $i; $j > 0; $j--) {
            echo  "*";
        }
        echo "<br>";
    }
    ?>

</body>
</html>