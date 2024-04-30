<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoger datos formulario</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: lightskyblue;
            font-size: 20px;
        }

        input[type="text"]{
            margin-bottom: 5px;
            margin-left: 10px;
        }
        
        input[type="number"]{
            margin-bottom: 5px;
            margin-left: 34px;
        }
        
        input[type="email"]{
            margin-bottom: 5px;
            margin-left: 21px;
        }

        input[type="submit"]{
            border-radius: 10px;
            margin-bottom: 5px;
            margin-right: 10px;
            padding: 4px 15px;
            background-color: white;
        }

        input[type="reset"]{
            border-radius: 10px;
            padding: 4px 15px;
            margin-bottom: 5px;
            background-color: white;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            color: lightskyblue; 
        }

        #form_php{
            padding: 20px;
            width: 260px;
            height: 140px;
            border: 2px solid black;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f0f0f0; 
            margin-top: 20px;
            box-shadow: 5px 5px 6px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }

    </style>
</head>
<body>
    <!-- Se crea un formulario con Nombre, Edad, Email, lo enviamos al formulario 
    Welcome.php por el metodo POST -->
    <h2>Mi primer formulario en PHP</h2>
    <form action="Welcome.php" method="post" id="form_php">
        Nombre: <input type="text" name="nombre" id=""><br>
        Edad: <input type="number" name="edad" id=""><br>
        E-mail: <input type="email" name="email" id=""><br><br>
        <!-- Creamos un boton submit para eniar el formulario, y otro para resetearlo -->
        <input type="submit" value="Enviar">
        <input type="reset" value="Reset">
    </form>
    <?php

        if (isset($_POST['nombre'])){ ?> 
        Bienvenido <?php echo $_POST["nombre"]; ?><br><br>
        Tú edad es: <?php echo $_POST['edad']; ?><br><br>
        Tú dirección de correo es: <?php echo $_POST["email"];
        } else {
            echo "Rellena el formulario";
        }
    ?>
    
</body>
</html>