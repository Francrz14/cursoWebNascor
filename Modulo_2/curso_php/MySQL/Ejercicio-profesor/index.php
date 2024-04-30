<?php
// Meter el sssion start y 
// la funcion en un archvo destinado a cabecera.
require('ini.php');
require ("db_utils.php");
// Comprobamos si recibimos datos por post para insertarlos en la base de datos. 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    /// *** LOGIN *** ///
    if (!isset($_POST['password'])) {
        http_response_code(400);
        $aviso = "Debes introducir un password <a class='button' href='login.html'>login</a>";

    } else {
        ///Lógica seguridad/usuarios///
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!user($email, $password)) {
            $aviso = "Usuario o contraseña no válidos: Vuelve a intentarlo <a href='login.html'>Volver al formulario</a>";
        } 
    }
    $aviso = "Hola $email.  <a class='button' href='index.php?logout=true'>logout</a>";


    //FIN Lógica seguridad/usuarios ///
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo'])) {
    /// Envían el formulario de inserción de posts
    // Recogemos los datos del formulario
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $categoria = $_POST['categoria'];
    // Tratamiento de imagen
    $imagen = "img/default.jpg";
    if (isset($_FILES["file"]) && $_FILES['file']['size'] > 0) {
        $imagePath = "img/" . $_FILES["file"]["name"];
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $imagePath)) {
            $mensaje = "ERROR: No se ha subido la noticia <a href='index.php'>Volver</a>";
            echo $mensaje;
            exit;
        }
        $imagen = $imagePath;
    }
    // Creamos la consulta sql
    $q = "INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', imagen='$imagen'";
    // Procedemos a insertar los datos.
    mysqli_query(conexion(), $q);
} else if (isset($_SESSION['user'])){
    $aviso = "Hola ".$_SESSION['email']. "<a class='button' href='index.php?logout=true'>logout</a>";
}


// Hacemo una consulta a una tabla
// if (isset($_GET['desde']))
// $desde = $_GET['desde'];
// $hasta = $desde +5;
// Añadiremos LIMIT
$num = 5;
$comienzo = 0;
if (isset($_GET['comienzo'])) {

    $comienzo = $_GET['comienzo'];
}
$columna = "id";
if (isset($_GET['columna'])) {
    $columna = $_GET['columna'];
}
$query = "SELECT * FROM noticia ORDER BY $columna LIMIT $comienzo, $num";

$result = consulta($query);
$query = "SELECT * FROM noticia";
$nfilas = contar_filas($query); // Obtiene la cantidad de resultados de la consulta
//$fila = mysqli_fetch_array($result);

$query = "SELECT DISTINCT categoria FROM noticia ORDER BY categoria";
$resultCats = consulta($query);
// Cerramos la conexión

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a Mysql</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            width: 60%;
            max-width: 400px;
            margin: 20px auto;
            /*padding: 20px;*/
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .eliminar {
            background-color: red !important;
            width: 100% !important
        }

        td {
            border: 1px solid black;
            padding: 10px
        }

        table {
            margin: 40px
        }

        img {
            height: 80px;
        }

        span {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button:active {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <!-- Comenzamos la tabla de datos -->
    <?php echo $aviso; ?>
    <table>
        <tr>
            <th colspan="6">

                <?php echo "Tenemos $nfilas noticias<hr>"; ?>
            </th>
        </tr>
        <!-- Fila de campos de la tabla de datos -->
        <tr>
            <th><a href="index.php?columna=id"> Id<a></th>
            <th><a href="index.php?columna=titulo"> Título<a></th>
            <th><a href="index.php?columna=texto"> Texto<a></th>
            <th><a href="index.php?columna=categoria"> Categoria<a></th>
            <th><a href="index.php?columna=fecha"> Fecha<a></th>
            <th><a href="index.php?columna=imagen"> Imagen </a></th>
        </tr>
        <?php

        // Bucle sobre los resultados obtenidos. 
        while ($row = mysqli_fetch_array($result)) {

            ?>
            <!-- Dibijamos las filas -->
            <tr>
                <!-- Dibijamos las celdas -->
                <td>
                    <?php echo $row["id"]; ?>
                </td>
                <td>
                    <?php echo $row["titulo"]; ?>
                </td>
                <td>
                    <?php
                    $strFinal = substr($row["texto"], 0, 100);

                    echo substr($row["texto"], 0, 100);
                    if ($strFinal < $row["texto"]) {
                        echo "... ";
                    }
                    echo " <br><a href='noticia.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a><br>";
                   
                    // Si no hay session user no se muestra la edición ni eliminación
                    // Añadir la lógica para que si es un usuario logueado,
                    // Veamos sólo sus post o que éstos sean los que aparezcan 
                    // Con la opción de editar y los otros no.
                    if (isset($_SESSION['user'])){
                    echo " <br><a href='noticia.php?id=" . $row['id'] . "&modificar=true'>Modificar noticia ->  </a><br>";
                    
                    ?>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
                        <input type="submit" value="Eliminar" class="eliminar">
                    </form>
                    <?php } ?>
                </td>
                <td>
                    <?php echo $row["categoria"]; ?>
                </td>
                <td>
                    <?php echo $row["fecha"]; ?>
                </td>
                <td>
                    <img src="<?php echo $row["imagen"]; ?>">
                </td>
            </tr>
        <?php }
        ?>
        <!-- Una nueva línea para albergar el formulario -->

    </table>
    <!-- Enlaces paginación -->
    <?php if ($comienzo > 0) {
        ?>
        <a href="index.php?comienzo=<?php echo $comienzo - $num; ?>">
            << Retroceder <?php echo $num; ?>
        </a>
    <?php } ?>
    <?php if ($comienzo + $num <= $nfilas) { ?>
        <a href="index.php?comienzo=<?php echo $comienzo + $num; ?>">
            Avanzar >>
            <?php echo $num; ?>
        </a>
    <?php } 
    // Formuylario de anvío de noticia. 
    // Con upload file
    //Ocultamos si session user.
 
    if (isset($_SESSION['user'])){
    ?>

    <form name="form" action="index.php" method="POST" enctype="multipart/form-data">
        Título:<br>
        <input type="text" name="titulo"><br>
        Texto:<br>
        <input type="text" name="texto"><br>
        Categoría:<br>

        <input list="categorias" type="text" name="categoria" value=""><br>
        <datalist id="categorias">
            <?php while ($row = mysqli_fetch_array($resultCats)) { ?>
                <option value="<?php echo $row['categoria']; ?>">
                    <?php echo $row['categoria']; ?>
                </option>
            <?php } ?>
        </datalist>

        <input type="file" name="file">
        <input type="submit" value="Añanir">
    </form>
    <?php } ?>
</body>

</html>