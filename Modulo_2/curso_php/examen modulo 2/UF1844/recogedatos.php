<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoge Datos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 400px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            border: 2px solid blue;
            background-color: lightgrey;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            border-top-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }
    </style>
</head>
<body>

    <h1>Bienvenido a recogedatos.php</h1>
    <div class="container">
        <?php
        // Comprobamos si se han enviando los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // obtenemos los datos del formulario
            $nombre = $_POST['nombre_usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Imprimimos los datos que se han enviado
            echo "<h3 class='datos'>Bienvenido $nombre!</h3>";
            echo "<h3 class='datos'>Tú email es: $email</h3>";
            echo "<h3 class='datos'>Tú contraseña es: $password</h3>";
        } else {
            // si no has introducido los datos del formulario mostramos un error
            echo "<h3 class='datos'>ERROR! No has introducido bien los datos del formulario login</h3>";
        }
        ?>
    </div>
</body>
</html>