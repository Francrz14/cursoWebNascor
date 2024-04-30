<?php
require('ini.php');
require('db_utils.php');
// session_start();

// // // INI = archivo.ini
// // $host = "localhost";
// // $user = "usuario_erp";
// // $password = "prueba6969";
// // $database = "noticias";

// // // Conexión al host, usuario y su contraseña
// // $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar la servidor");

// // echo "Se ha establecido la conexion";
// // echo "<br>";

// //Logearse

// $aviso = "";
// function user($email, $password) {

//     $mail = "ejemplo@gmail.com";
//     $pass = "1234";
//     if ($email == $mail && $pass == $password) {
//         $_SESSION['user'] = $email;
//         return true;
//     } else {
//         return false;
//     } 
// }
// if ($_SERVER['REQUEST_METHOD'] == "POST") {

//     if (isset($_POST['email']) && isset($_POST['pass'])) {
//         $email = $_POST['email'];
//         $password = $_POST['pass'];

//         if (!user($email, $password)) {
//             $aviso = "Las credenciales no son correctas <a href='login.html'>Volver a login</a>";
//         } else {
//             $aviso = "¡Bienvenido $email! <a class='close-session' href='form_MySQL.php?logout=true'>Logout</a>";
//         }
//     }
// }

// if (isset($_GET['logout'])) {
//     session_destroy();
//     header("Location: login.html");
//     exit;
// }

// Conectamos a la base de datos 'noticia'
// mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");
// echo " Se ha seleccionado la base de datos $database <br><br>";4
$user_id = 3;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $user_id = $_POST['user_id'];
        $categoria = $_POST['categoria'];
        // Definimos una ruta por defecto
        $imagen = "img/default.jpg";
        // Comprobamos si se a enviado un archivo
        if (isset($_FILES['archivo'])) {
            // Construimos la ruta del archivo utilizando el name del input file
            $ruta_imagen = 'img/' . $_FILES['archivo']['name'];
            if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_imagen)) {
                // Si no se puede mostrar el archivo, mandamos un mensage de error que nos devuleve al
                // form_MySQL.php
                $mensaje = "Error, no se ha subido la noticia <a class='enlace-estilizado' href='form_MySQL.php'>Volver</a>";
                echo $mensaje;
                exit;
            }
            // Actualizamos la variable imagen con la ruta de la imagen cargada
            $imagen = $ruta_imagen;
        } // Hacemos una consulta MySQL para insertar un nuevo registro a la tabla noticía
        $query = "INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', 
        imagen='$imagen', user_id='$user_id' ";
        // Ejecutamos la consulta MySQL
        mysqli_query(conexionBD(), $query);
    }
}
// Variables LIMIT
$comienzo = 0;
$num = 4;
$avanzar = $num;
$atras = 0;
if (isset($_GET['comienzo'])) {
    $comienzo = $_GET['comienzo'];
    $avanzar = $comienzo + $num;
    $atras = $comienzo - $num;
}

// Hacemos una consulta a noticia
// $query = "SELECT * FROM noticia ";

// Limitamos la consulta a 3 post por página
// $query = "SELECT * FROM noticia LIMIT 0, 3";
// $query = "SELECT * FROM noticia LIMIT $comienzo, $num";
// $resultado = consulta($query);
// $resultado = mysqli_query($conexion, $query) or die("Fallo en la consulta");

// Mostrarlo ordenado por categoria
$columna = "id";
if (isset($_GET['columna'])) {
    $columna = $_GET['columna'];
}
$query = "SELECT * FROM noticia ORDER BY $columna LIMIT $comienzo, $num";
$resultado = consulta($query);
$query = "SELECT DISTINCT categoria FROM noticia ORDER BY categoria";
$resultadoCategorias = consulta($query);
// mysqli_query($conexion, $query) or die("Ha fallado la consulta.");
// Obtiene la cantidad de resultados de la consulta
$query = "SELECT * FROM noticia";
$numeroFilas = contarFilas($query);

// $numeroFilas = mysqli_num_rows($resultado);
// $fila = mysqli_fetch_array ($resultado);// cuidado con esto, si lo dejas no te imprime el primer párrafo
// Una vez hacemos la consulta cerramos conexión
// mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/MySQL/ejem-Primera-conexion/icon_sonic.jpg">
    <title>Primera Conexión</title>
    <style>
        body {
            margin: 0;

        }

        header {
            display: flex;
            justify-content: space-between;
            background-color: #007bff;
            padding: 40px;
        }

        header h2 {
            padding-right: 40%;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        table {
            border-radius: 8px;
            border: 2px solid black;
            padding: 6px;
            width: 100%;
            border-spacing: 7px;
            background-color: lightcyan;
            font-size: 18px;
            text-align: center;
        }

        a {
            font-size: 22px;
        }

        /* Cambiamos las primeras celdas con el th */
        /* table th,*/
        table td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
            background-color: lightgray;
        }

        table td.center {
            text-align: left;
        }

        /* Manipulamos el ancho de la primera celda */
        table th:nth-child(1),
        table td:nth-child(1) {
            width: 5%;
        }

        /* Manipulamos el ancho de la segunda celda */
        table th:nth-child(2),
        table td:nth-child(2) {
            width: 11%;
        }

        /* Manipulamos el ancho de la quinta celda */
        table th:nth-child(5),
        table td:nth-child(5) {
            width: 8%;
        }

        table td img {
            max-width: 100px;
        }

        .send {

            margin-top: 10px;
            max-width: 28%;
            margin-left: auto;
            margin-right: auto;
        }

        .send td {
            font-size: 20px;
            padding: 20px;
            text-align: left;
        }

        .send td h2 {
            text-align: center;
        }

        input[type="text"] {
            width: 370px;
            padding: 6px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }


        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"].boton-eliminar {
            padding: 10px 15px !important;
            background-color: red !important;
            color: white !important;
            border-radius: 4px !important;
            border: red !important;
            margin: 10px 30px 10px 0px !important;
            float: right;
        }

        input[type="submit"].boton-eliminar:hover {
            background-color: darkred !important;
        }

        .close-session {
            color: white;
            padding: 15px;
            background-color: #3498db;
            text-decoration: none;
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .close-session:hover {
            text-decoration: underline;
        }

        .enlace-estilizado {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff !important;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .enlace-estilizado:hover {
            background-color: #5388c1 !important;
        }

        footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            background-color: lightgrey;
            padding: 40px;
        }

        footer span {
            margin-top: 20px;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <header>
        <figure>
            <a href="https://cursosnascor.com/listado-cursos?presencial=Todas&provincia=1&tematica=Todas&gad_source=1&gclid=Cj0KCQjw8pKxBhD_ARIsAPrG45lCg4BOemjsErKvWBnk9MysoYY0h4P304uFFtiBVO0JWT_0azPy-moaArj6EALw_wcB" target="_blank">
                <img src="./img/nascor.webp" alt="Nascor Formación" width="150px">
            </a>
        </figure>
        <a class="close-session" href="login.html">Login</a>
        <h2>Mi Primera Tabla PHP MySQL</h2>
    </header>
    <div class="container">
        <?php echo $aviso; ?>
        <table>
            <caption>
            </caption>
            <thead>
                <?php echo "<h1>Tenemos $numeroFilas notícias</h1> <br>"; ?>
                <th><a href="form_MySQL.php?columna=id">Id</a></th>
                <th><a href="form_MySQL.php?columna=titulo">Título</a></th>
                <th><a href="form_MySQL.php?columna=texto">Texto</a></th>
                <th><a href="form_MySQL.php?columna=categoria">Categoría</a></th>
                <th><a href="form_MySQL.php?columna=fecha">Fecha</a></th>
                <th><a href="form_MySQL.php?columna=imagen">Imagen</a></th>
            </thead>
            <?php while ($row = mysqli_fetch_array($resultado)) { ?>

                <tr>
                    <td>
                        <?php echo $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["titulo"]; ?>
                    </td>
                    <td class="center">
                        <?php
                        $strFinal = substr($row["texto"], 0, 200);

                        echo substr($row["texto"], 0, 200);
                        if ($strFinal < $row["texto"]) {
                            echo " ... ";
                        }
                        echo " <br><a href='noticia.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a><br>";
                        // OCULTAMOS MODIFICAR Y ELIMINAR
                        if (isset($_SESSION['user'])) {
                            echo " <br><a href='noticia.php?id=" . $row['id'] . "&modificar=true'>Modificar noticia -></a><br>";
                            // echo " <a href='noticia.php?id=" . $row['id'] ."&update=true'>Modificar noticia -></a>";
                        ?>
                            <form action="eliminar.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
                                <input type="submit" value="Eliminar" class="boton-eliminar">
                            </form>
                        <?php } ?>
                        <!-- <?php echo $row["texto"]; ?> -->
                        <!-- Esto es para limitar el texto a 280 caracteres -->
                        <!-- <?php echo substr($row["texto"], 0, 280); ?> -->
                    </td>
                    <td>
                        <?php echo $row["categoria"]; ?>
                    </td>
                    <td>
                        <?php echo $row["fecha"]; ?>
                    </td>
                    <td>
                        <img src=" <?php echo $row["imagen"]; ?>">
                    </td>
                </tr>
            <?php } ?>

        </table>
        <!-- Enlace de paginación -->
        <?php
        if ($comienzo > 0) {
        ?>
            <a class="enlace-estilizado" href="form_MySQL.php?comienzo=<?php echo $atras; ?>"> &lt;<= Atrás <?php echo $num; ?></a>
                <?php } ?>
                <?php if ($comienzo + $num <= $numeroFilas) { ?>
                    <a class="enlace-estilizado" href="form_MySQL.php?comienzo=<?php echo $avanzar; ?>">Avanzar => <?php echo $num ?></a>
                <?php }
                //OCULTAR FORMULARIO
                if (isset($_SESSION['user'])) {
                ?>
                    <table class="send">
                        <tr>
                            <td>
                                <h2>Enviar noticía nueva</h2>
                                <form action="form_MySQL.php" name="formulario" method="post" enctype="multipart/form-data">
                                    <label for="titulo">Título: </label><br>
                                    <input type="text" name="titulo" id="titulo"><br>
                                    <label for="texto">Texto: </label><br>
                                    <input type="text" name="texto" id="texto"><br>
                                    <input type="file" name="archivo" id="archivo"><br><br>
                                    <label for="categorias">Categoría: </label><br>
                                    <input list="categorias" type="text" name="categoria" id="categoria">
                                    <datalist id="categorias">
                                        <?php while ($row = mysqli_fetch_array($resultadoCategorias)) { ?>
                                            <option value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></option>
                                        <?php } ?>
                                    </datalist><br><br>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <!-- <input type="text" name="categoria" id="categoria"><br><br> -->
                                    <input type="submit" value="Añadir">
                                </form>
                            </td>
                        </tr>
                    </table>
                <?php } ?>
    </div>
    <footer>
        <figure>
            <a href="https://cursosnascor.com/listado-cursos?presencial=Todas&provincia=1&tematica=Todas&gad_source=1&gclid=Cj0KCQjw8pKxBhD_ARIsAPrG45lCg4BOemjsErKvWBnk9MysoYY0h4P304uFFtiBVO0JWT_0azPy-moaArj6EALw_wcB" target="_blank">
                <img src="./img/nascor.webp" alt="Nascor Formación" width="150px">
            </a>
        </figure>
        <span>FranCr-Z14&copy; todos los derechos reservados</span>
    </footer>
</body>

</html>