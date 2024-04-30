<?php
    require('ini.php');
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
    // //  Declaramos variables para recogerlas con el metedo POST
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];
    
    // Comprobamos si se han pasado los parámetros necesarios
    if (!isset($_POST['id']) || $_POST['titulo'] == "") {
        $mensaje = 'Error, faltan parámetros <a class="enlace-estilizado" href="form_MySQL.php">Volver</a>';
        echo $mensaje;
        exit;
    }
    
    //mandamos la peticion MySQL
    $query="UPDATE noticia SET  titulo='$titulo', texto='$texto', imagen='$imagen', categoria='$categoria' WHERE id='$id'" ;
    // Consultamos si se ejecuta correctamente
    $resultado = consulta($query);
    // $resultado = mysqli_query($conexion, $query);
    // Creamos la variable referer para obtener la URL de la página anterior si está disponible
    $referer = $_SERVER['HTTP_REFERER'];

    if (!$resultado){
        $mensaje = "Error, faltan parametros <a href='form_MySQL.php'>Volver</a>";
        echo $mensaje;
        exit;
    }
    // Redirigir al usuario a la página que bino
    header("location: $referer");
    exit;
?>
