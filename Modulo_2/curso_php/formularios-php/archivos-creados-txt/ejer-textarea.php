<?php
// test error
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio textarea</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: lightskyblue;
            font-size: 20px;
        }

        #form_php {
            padding: 30px;
            width: 310px;
            height: auto;
            border: 2px solid black;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f0f0f0; 
            margin-top: 20px;
            box-shadow: 5px 5px 6px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }
        input[type='text'] {
            margin-left: 15px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type='number'] {
            margin-left: 40px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type='email'] {
            margin-left: 33px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[name='dominio'] {
            margin-left: 10px;
            font-size: 16px;
        }

        textarea[name='textarea-php'] {
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .buttons {
            text-align: right;
            margin-right: 18px;
        }

        input[type='submit'],
        input[type='reset'] {
            background-color: greenyellow;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            margin-right: 10px;
            font-size: 16px;
            color: blue;
        }

        .buttons input[type="submit"]:hover,
        .buttons input[type="reset"]:hover {
            opacity: 0.7; 
            transform: scale(1.1);
            border-radius: 7px;
        }
    </style>
</head>
<body>
    <?php
    // test error
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    if (isset($_POST['textarea-php'])) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $dominio = $_POST['dominio'];
        $textarea = $_POST['textarea-php'];
        // si pones 'w' sobreescribe todos los datos y con 'a' los va añadiendo
        $archivo =  fopen("textarea.txt", "a");
        fwrite($archivo, $nombre ."\n" ."\n");
        fwrite($archivo, $edad ."\n\n");
        fwrite($archivo, $email . "\n\n");
        fwrite($archivo, $dominio . "\n\n");
        fwrite($archivo, $textarea. "\n\n");
        fclose($archivo);
        echo "<p>El archivo se ha creado correctamente</p>";
    }
    ?>
    <h2>Creamos un archivo.txt con datos</h2>
    <form action="ejer-textarea.php" method="post" id="form_php">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="dominio">Dominio: </label>
        <input type="text" name="dominio" id="dominio">
        <br><br>
        <label for="textarea-php">Comentarios: </label>
        <br>
        <textarea name="textarea-php" id="textarea-php" cols="30" rows="10" placeholder="Pon aquí tú comentario.."></textarea>
        <br>
        <div class="buttons">
            <input type="submit" value="Enviar">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
</html>