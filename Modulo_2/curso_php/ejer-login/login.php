<?php
session_start();
define('name', 'Fran Ropero');
define('email', 'ejemplo@gmail.com');
define('pass', '666666');
if (isset($_GET['logout'])) {
    session_destroy();
}
$mensajeError = "";
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
    if ($_POST['name'] == name && $_POST['email'] == email && $_POST['pass'] == pass) {
        $_SESSION['user'] = $_POST['name'];
        $_SESSION['datos_usuario'] = $_POST;
        // $_SESSION['user'] = $_POST['name'];
        // echo "Bienvenido" .$_SESSION['datosusuario']['name'];
    } else {
        $mensajeError = "Usuario no encontrado.";
    }
}
// copy('https://cdn.topgear.es/sites/navi.axelspringer.es/public/media/image/2021/07/lotus-emira-2021-2399003.jpg?tf=3840x', 'mideportivo');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Login</title>
    <style>
        span {
            color: red;
        }

        img:hover {
            border-radius: 30px;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <a href="login.php?logout=true">Cerrar sesión</a>
    <?php if (isset($_SESSION['user'])) {
        // header('localitation: contenido.php');
        // exit;
    ?>
        <h1>Bienvenido <?php echo $_SESSION['user']; 
        ?> <br>
        Tú email es :
        <?php echo $_SESSION['datos_usuario']['email'] ?>
        </h1>
        Mira que foto mas chula ^^ <br><br>
        <img src="https://cdn.topgear.es/sites/navi.axelspringer.es/public/media/image/2021/07/lotus-emira-2021-2399003.jpg?tf=3840x" alt="Deportivo" width="70%">
        <!-- <a href="login.php?logout=true"></a> -->
    <?php } else { ?>
        <span><?php echo $mensajeError; ?></span>
        <h2>Inicia sesión</h2>
        <form action="login.php" method="post">
            <label for="name">Nombre: </label>
            <input type="text" name="name" id="name">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <input type="submit" value="Enviar">
        </form>
    <?php } ?>

    <!-- Descomentar esto antes de empezar -->
    <?php //session_destroy(); 
    // Mini hackeo
    // echo file_get_contents('https://www.defensacentral.com/');
    ?>
</body>
</html>