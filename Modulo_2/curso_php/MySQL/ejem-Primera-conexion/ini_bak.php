<?php
session_start();
// Validar si hay un usuario conectado
// if (isset($_SESSION['user'])) {
//     echo "Hay sesión de usuario";
// }  else {
//     echo "No hay sesión de usuario";
// }

// Ponemos un aviso para que muestre para logearse
$aviso = "Pulsa en Login para iniciar sessión<a class='close-session' href='login.html'>Login</a>";
function user($email, $password) {

    $mail = "ejemplo@gmail.com";
    $pass = "1234";
    if ($email == $mail && $pass == $password) {
        $_SESSION['user'] = $email;
        return true;
    } else {
        return false;
    } 
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        if (!user($email, $password)) {
            $aviso = "Las credenciales no son correctas <a class='close-session' href='login.html'>Volver a login</a>";
        } else {
            $aviso = "¡Bienvenido $email! <a class='close-session' href='form_MySQL.php?logout=true'>Logout</a>";
        }
    }
}
// Destruimos la sessión y lo mandamos al index.
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: form_MySQL.php");
    exit;
}
?>

