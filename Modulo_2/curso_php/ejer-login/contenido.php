<?php
session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
    if ($_POST['name'] == name && $_POST['email'] == email && $_POST['pass'] == pass) {
        $_SESSION['user'] = $_POST['name'];
        $_SESSION['datosUsuario'] = $_POST;
        $_SESSION['email'] = $_POST['email'];
        // $_SESSION['user'] = $_POST['name'];
        // echo "Bienvenido" .$_SESSION['datosusuario']['name'];
    } else {
        $mensajeError = "Usuario no encontrado.";
    }
}

// Comprobar si el usuario no está logueado el usuario
if (!isset($_SESSION['user'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está logueado
    header("Location: login.php");
    exit; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido Protegido</title>
</head>
<body>
    <a href="login.php?logout=true">Salir</a>
<h1>Bienvenido <?php echo $_SESSION['user']; ?> </h1>
<p>Con email: <?php echo $_SESSION['datos_usuario']['email']; ?></p>
<p>Mira qué foto más chula ^^</p>   
<img src="https://cdn.topgear.es/sites/navi.axelspringer.es/public/media/image/2021/07/lotus-emira-2021-2399003.jpg?tf=3840x" alt="Deportivo" width="50%">
</body>
</html>
