<?php
// Función para conectar a la base de datos.
function conexionBD() {
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
// validar credenciales
function parse_credentials($file)
{
  $datos = parse_ini_file($file);
  $host = $datos['host'];
  $user = $datos['user'];
  $password = $datos['password'];
  $smtp_password = $datos['smtpPassword'];

  return array($host, $user, $password,$smtp_password);
}
?>
