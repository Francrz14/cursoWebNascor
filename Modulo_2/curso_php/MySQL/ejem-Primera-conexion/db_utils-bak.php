<?php
// Función para conectar a la base de datos.
function conexionBD() {

    $host = "localhost";
    $user = "usuario_erp";
    $password = "prueba6969";
    $database = "noticias";
    // Conexión al host, usuario y su contraseña
    $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar la servidor");
    // Nos conectamos a la base de datos
    mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");
    // Verifica si hay errores en la conexión
    if (mysqli_connect_errno()) {
        // Si hay un error, muestra un mensaje y termina el script
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }
    return $conexion;
}
// Función para consultar a la base de datos
function consulta($query) {
    $conexion = conexionBD();
    $resultado = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $resultado;
}
// Función para contar el número de filas
function contarFilas($query) {
    $resultado = consulta($query);
    $numeroFilas = mysqli_num_rows($resultado);
    return $numeroFilas;
}

function escape($query) {
    $conexion = conexionBD();
    return mysqli_real_escape_string($conexion, $query);
}

function fecthArray($resultado) {
    return mysqli_fetch_array($resultado);
}

?>
