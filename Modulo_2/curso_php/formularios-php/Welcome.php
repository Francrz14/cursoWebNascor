<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome.php </title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: lightskyblue;
            font-size: 30px;
        }

        h3 {
            margin-top: 3px;
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['email']) && $_POST['email'] != '') {
    ?>
        <h3>Bienvenido <?php echo $_POST["nombre"]; ?></h3>
        <h3>Tu edad es: <?php echo $_POST['edad']; ?></h3>
        <h3>Tu dirección de correo es: <?php echo $_POST["email"]; ?></h3>
    <?php
    } else {
        echo "ERROR, faltan parametros, por favor introduce un email válido";
        http_response_code(404);
        exit;
    }
    ?>

</body>
</html>