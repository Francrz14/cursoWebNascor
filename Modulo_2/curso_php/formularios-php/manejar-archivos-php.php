<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejar archivos PHP</title>
</head>
<body>
    <!-- Con este fragmento te saldran los errores si los hay -->
    <?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    ?>
    <?php
    if (isset($_FILES['archivo'])) {
        $imagenNombre = $_FILES['archivo']['name'];
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], "./archivos-php/" . $imagenNombre)) {
            echo "<h3>Genial Archivo subido</h3>";
        } else {
            echo "<h3>Error, el archivo no se ha subido correctamente.</h3>";
        }
    }

    ?>

    <form action="manejar-archivos-php.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>
</html>