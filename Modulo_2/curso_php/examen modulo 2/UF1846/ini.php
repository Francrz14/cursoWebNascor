<?php
session_start();

$nombreServidor = "localhost";
$nombreUsuario = "usuario_erp";
$contraseña = "prueba6969";
$baseDatos = "noticias";


$conexion = mysqli_connect($nombreServidor, $nombreUsuario, $contraseña, $baseDatos);

if(!$conexion){
    die("Conexión fallida, por favor mire que los datos son correctos". mysqli_connect_error());
}

?>