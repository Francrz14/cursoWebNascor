<?php
require('db_utils.php');
// // INI = archivo.ini
// $host = "localhost";
// $user = "usuario_erp";
// $password = "prueba6969";
// $database = "noticias";
// // Conexión al host, usuario y su contraseña
// $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar la servidor");
// // Nos conectamos a la base de datos
// mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");


$id = $_POST['id'];
$imagen = $_POST['imagen'];
// Consultamos a MySQL para eliminar la noticia con el ID proporcionado
$query = "DELETE FROM noticia WHERE id = '$id'";

if(consulta($query)){
    echo "La noticía se ha eliminado correctamente. <a href='form_MySQL.php'>Volver ha index</a>";
} else {
    "la noticía no se ha eliminado. <a href='form_MySQL.php'>Volver ha index</a>";
}
// Eliminamos el archivo especificado por la ruta $imagen del sistema de archivos.
unlink($imagen);
// Cerramos conexión
// mysqli_close($conexion);
?>