<?php
require('db_utils.php');
// // INI = archivo.ini
// $host = "localhost";
// $user = "usuario_erp";
// $password = "prueba6969";
// $database = "noticias";

// // Conexión al host, usuario y su contraseña
// $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar la servidor");

// echo "Se ha establecido la conexion";
// echo "<br>";

// Conectamos a la base de datos 'noticia'
mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");
echo " Se ha seleccionado la base de datos $database <br><br>";

// Hacemos una consulta a título
$query = "SELECT * FROM noticia";
$resultado = consulta($query);
// $resultado = mysqli_query($conexion, $query) or die("Fallo en la consulta");

// Obtiene la cantidad de resultados de la consulta
$numeroFilas = mysqli_num_rows($resultado);
// $fila = mysqli_fetch_array ($resultado);// cuidado con esto, si lo dejas no te imprime el primer párrafo
// Una vez hacemos la consulta cerramos conexión
mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera Conexión</title>
    <style>
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
        /* Cambiamos las pirmeras celdas con el th */
        /* table th,*/
        table td {
            border: 2px solid black;
            padding: 10px; 
            text-align: left; 
            background-color: lightgray;
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

    </style>
</head>
<body>
    <table>
        <caption><h2>Mi Primera Tabla PHP MySQL</h2></caption>
        <thead><?php echo "<h1>Tenemos $numeroFilas de tablas</h1> <br>"; ?>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th>Categoria</th>
            <th>Fecha</th>
            <th>Imagen</th>
        </thead>
        <?php while ($row = mysqli_fetch_array($resultado)) { ?>

            <tr>
                <td>
                    <?php echo $row["id"]; ?>
                </td>
                <td>
                    <?php echo $row["titulo"]; ?>
                </td>
                <td>
                    <?php echo $row["texto"]; ?>
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
    <!-- Esto si quitas la tabla te imprime datos sin una tabla hecha -->
    <!-- <?php
            echo "<h1>Tenemos $numeroFilas de tablas</h1> <br>";
            while ($row = mysqli_fetch_array($resultado)) {
                echo
                // "id: " . $row["id"] . "<br>" .
                "Título: <b>" . $row["titulo"] . "</b><br>" .
                    "Texto: <b>" . $row["texto"] . "</b><br>" .
                    "Categoría: <b>" . $row["categoria"] . "</b><br>" .
                    "Fecha de publicación: <b>" . $row['fecha'] . "</b><br>";
                // Imprimir las imagenes
                echo     "<img src='" . $row['imagen'] . "' width='120'><hr>";
            }
            ?> -->

</body>
</html>