<?php
    require('ini.php');
    require('db_utils.php');
// if ($_SERVER['HTTP_REFERER'] == 'http://localhost/php-curso/MySQL/ejem-Primera-conexion/form_MySQL.php') {
// }
if (!isset($_GET['id'])) {
    $mensage = "Error: No se proporcionó un ID de noticia.";
} else {
    $id = $_GET['id'];
    // INI = archivo.ini
    // $host = "localhost";
    // $user = "usuario_erp";
    // $password = "prueba6969";
    // $database = "noticias";

    // // Conexión al host, usuario y su contraseña
    // $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar la servidor");
    // mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");
    // Hacemos la consulta SQL en la base de datos y almacenamos el resultado en la variable $resultado
    $query = "SELECT * FROM noticia WHERE id=$id";
    // Recuperamos la próxima fila de resultados del conjunto de resultados y almacenarla en la variable $noticia
    $resultado = consulta($query);
    // mysqli_query($conexion, $query);

    $query = "SELECT DISTINCT categoria FROM noticia ORDER BY categoria";
    $resultadoCategorias = consulta($query);
    // $resultadoCategorias = mysqli_query($conexion, $query) or die("Ha fallado la consulta.");
    $noticia = mysqli_fetch_array($resultado);
    $titulo = $noticia['titulo'];
    $texto = $noticia['texto'];
    $imagen = $noticia['imagen'];
    $categoria = $noticia['categoria'];
    $fecha = $noticia['fecha'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enlace noticia PHP</title>
    <style>
        body {
            display: flex;

            justify-content: space-around;
            align-items: flex-start;
        }

        /* Estilos para la tarjeta */
        .carta {
            max-width: 35%;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.4);

        }

        /* Estilos para el encabezado de la tarjeta */
        .header-carta {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Estilos para el cuerpo de la tarjeta */
        .body-carta {
            overflow: hidden;
            padding: 30px;
            text-align: justify;
        }

        /* Estilos para el pie de la tarjeta */
        .footer-carta,
        .category {
            text-align: center;
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .carta .body-carta img {
            max-width: 90%;
            display: block;
            margin: 0 auto;

            /* border-top-left-radius: 8px;
            border-top-right-radius: 8px; */
        }

        .container {
            width: 600px;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 20px;
        }


        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            margin-top: 5px;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 5px;
        }

        select:focus {
            outline: none;
            border-color: dodgerblue;
            box-shadow: 0 0 5px rgba(0, 0, 255, 0.5);
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
    </style>
</head>
<body>
    <div class="carta">

        <div class="header-carta">
            <h2><?php echo $titulo; ?></h2>
        </div>
        <div class="body-carta">
            <img src=" <?php echo $imagen; ?>">
            <p class="texto-carta">
                <?php echo $texto; ?>
            </p>
        </div>
        <div class="category">
            <?php echo $categoria; ?>
        </div>
        <div class="footer-carta ">
            <?php echo $fecha; ?>
        </div>
    </div>
    <a class="enlace-estilizado" href="form_MySQL.php">Volver al index</a>
    <?php
    if (isset($_GET['modificar']) && isset($_SESSION['user'])) { ?>

        <div>
            <header class="header-carta">
                <h2>Formulario de Tarjeta</h2>
            </header>
            <form action="modificar.php" method="post" class="container">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
                </div>
                <div class="form-group">
                    <label for="imagen">URL de la imagen:</label>
                    <input type="text" id="imagen" name="imagen" value="<?php echo $imagen; ?>">
                </div>
                <div class="form-group">
                    <label for="texto">Texto:</label>
                    <textarea id="texto" name="texto" rows="8"><?php echo $texto; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria">
                        <?php
                        while ($cat = mysqli_fetch_array($resultadoCategorias)) {
                            echo "<option value='" . $cat['categoria'] . "'>" . $cat['categoria'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
                </div> -->
                <div class="form-group">
                    <button type="submit">Modificar Tarjeta</button>
                </div>
            </form>
        </div>
    <?php  } ?>

</body>
</html>