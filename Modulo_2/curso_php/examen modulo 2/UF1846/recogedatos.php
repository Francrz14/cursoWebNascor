<?php
// iniciar una sesión
require('ini.php');
?>
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
            font-size: 20px;
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
    <!-- UF1846 Partiendo del ejercicio anterior, añade a ini.php el código que añade el usuario a 
    una base de datos tras el envío del formulario conservando la creación de sesión del 
    ejercicio anterior. Después imprime el email y el nombre del usuario después de consultados 
    a la base de datos por el valor de la variable de sesión. S_SESSION(‘email’); 
    Puedes usar una base de datos real para hacer las pruebas, pero no es necesario adjuntarla. -->
    <h1>Bienvenido a recogedatos.php</h1>
    <div class="container">
        <?php
        // Comprobamos si se han enviando los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // obtenemos los datos del formulario
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Guardamos una variable de sesión con el email del usuario
            $_SESSION['nombre'] = $nombre;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // Insertamos los datos del usuario a la base de datos
            $query ="INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
            // Si no se envian por POST, Mostramos los datos almacenados en la sesión
           if (mysqli_query($conexion, $query)){
                echo "Los datos se han insertado en la base de datos";
                echo "<h3>Datos de la sesión</h3>";
                echo "<p><strong>Nombre de Usuario: </strong>". $_SESSION['nombre'] ."</p>";
                echo "<p><strong>Email: </strong>". $_SESSION['email'] ."</p>";
                echo "<p><strong>Password del Usuario: </strong>". $_SESSION['password'] ."</p>";

           } else {
                echo "Se ha producido un error al insertar los datos: " . mysqli_error($conexion);
           }
        } else {
            // Comprobamos si hay una variable de sesión para el email
            if (!isset($_SESSION['email'])) {
                // Si no hay una sesión activa, redireccionar al formulario de login
                header("Location: login.html");
                exit; 
            }
            // Si no se envian por POST, Mostramos los datos almacenados en la sesión
            echo "<h3>Datos de la sesión</h3>";
            echo "<p><strong>Email: </strong>". $_SESSION['email'] ."</p>";

            // Consultamos la base de datos para obtener el nombre del usuario por el email
            $email = $_SESSION['email'];
            $query = "SELECT nombre FROM usuarios WHERE email='$email'";
            $resultado = mysqli_query($conexion, $query);

            if (mysqli_fetch_row($resultado) > 0) {
                // El mysqli_fetch_assoc() da mejores datos que el mysqli_fetch_row()
                //Mostramos el nombre del usuario
                $columnas = mysqli_fetch_assoc($resultado);
                echo "<;><strong></strong>".$columnas['nombre'] . "</p>";
            } else {
                echo "No se han encontrado resultados";
            }
            // Liberar el resultado
            mysqli_free_result($resultado);
        }
        // Cerramos la sesion en la base de datos
        mysqli_close($conexion);
        ?>
    </div>
</body>
</html>