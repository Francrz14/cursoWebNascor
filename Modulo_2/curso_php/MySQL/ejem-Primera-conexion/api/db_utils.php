<?php
// Esto es necesario para que no te diga estatus 0, para que funcione bien.
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Función para conectar a la base de datos.
function conexionBD()
{
    $host = "localhost";
    $user = "usuario_erp";
    $password = "prueba6969";
    $database = "noticias";

    // Conexión al host, usuario y su contraseña
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar la conexión
    if (!$conexion) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    return $conexion;
}
// Función para consultar a la base de datos
function consulta($query)
{
    $conexion = conexionBD();
    $resultado = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    return $resultado;
}
// Función para contar el número de filas
function contarFilas($query)
{
    $resultado = consulta($query);
    $numeroFilas = mysqli_num_rows($resultado);
    return $numeroFilas;
}

function escape($query)
{
    $conexion = conexionBD();
    return mysqli_real_escape_string($conexion, $query);
}

function fecthArray($resultado)
{
    return mysqli_fetch_array($resultado);
}
