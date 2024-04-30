<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoger Datos PHP metodos</title>
</head>

<body>
    <!-- Creamos cun formulario que envia los datos a welcome.php -->
    <form id="form" action="welcome.php" method="POST">
        Name: <input type="text" name="name" value=""><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <?php
    // Devuelve el método de solicitud utilizado para acceder a la página (como POST)
    if ($_SERVER['REQUEST_METHOD'] == "POST") { ?>
        Welcome
        Your email address is:
        <!-- enviamos los datos al servidor de email -->
        <?php echo $_POST["email"]; ?><br>
        Your email address is:
        <!-- enviamos los datos al servidor de email -->
        <?php echo $_POST["email"];
    } else {
        // si no se cumple la condicion te devuelve cubre el formulario
        echo "Cubre el formulario";
    }
    ?>
</body>

</html>