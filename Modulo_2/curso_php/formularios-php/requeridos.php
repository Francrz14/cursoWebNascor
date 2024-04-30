<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requeridos Form PHP</title>
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
            padding: 20px;
            width: 320px;
            height: auto;
            border: 2px solid black;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f0f0f0;
            margin-top: 20px;
            box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.5);
            margin-bottom: 50px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: white;
            font-size: 16px;
        }
    </style>
</head>
<body> 
    <?php
    // Definimos el array para que no nos de error al mandar el formulario vacio
    $cursos = array();
    // definir variables y establecer valores vacíos
    $name = $email = $gender = $comment = $website = $cursos = "";
    // Definimos variables para mostrar los errores
    $nameError = $emailError = $websiteError = $commentError = $genderError = $cursosError = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //ponemos una condicion para validad si tienen error o no los valores
        // Válidar name
        if (empty($_POST['name'])) {
            $nameError = "Debes introducir un nombre válido";
        } else {
            // Validamos el campo name a través del formulario
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameError = "Sólo se permiten letras y espacios en blanco";
               }   
        }
        // Válidar email
        if (empty($_POST['email'])) {
            $emailError = "Debes introducir un email válido";
        } else {
            // Validamos el campo email a través del formulario
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Formato de E-mail invalido";
               }   
        }
        // Válidar website
        if (empty($_POST['website'])) {
            $websiteError = "Debes introducir un website válido";
        } else {
            // Validamos el website a través del formulario
            $website = test_input($_POST['website']);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteError = "URL inválida";
            }  
        }
        // Válidar comentario
        if (test_input($_POST['comment'])=='') {
            $commentError = "Debes introducir un comentario válido";
        } else {
            $comment = test_input($_POST['comment']);
        }
        // Válidar genero
        // un ratio envía un valor
        if (isset($_POST['gender'])){
            $gender = test_input($_POST["gender"]);          
        } else {
            $genderError = "El genero tiene que ser un campo requerido";
        }
        // Válidamos cursos
        // un checkbox envia un array
        if(isset($_POST['cursos'])) {
            $cursos = $_POST['cursos'];
        } else {
            // Ponemos la variable cursos en array para que no de error al mandarlo vacio
            $cursos = array();
            $cursosError = "Introduce un curso válido";
        }
        // Pasamos el test_imput para para depurar caracteres, anti hacking y errores
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
    }

    // Funcion para depurar caracteres, anti hacking y errores
    // Por la funcion test_input no se pueden pasar Arrays da error,
    // Como en este caso $cursos
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    ?>
    <h1>Validation Form PHP</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form_php">
    <!-- ponemos en cada input cada variable de error para que si no pones nada te de error -->
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><span style="color: blue;"><?php echo $nameError; ?></span>
        <br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>"><span style="color: blue;"><?php echo $emailError; ?></span>
        <br>
        Website: <input type="text" name="website" value="<?php echo $website; ?>"><span style="color: blue;"><?php echo $websiteError; ?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment; ?>"></textarea><span style="color: blue;"><?php echo $commentError; ?></span>
        <br><br>
        Gender: <span style="color: blue;"><?php echo $genderError; ?></span>
        <br>
        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Masculino
        <br>
        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Femenino
        <br>
        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Otro
        <br><br>
        ¿Qué cursos quieres hacer?  <span style="color: blue;"><?php echo $cursosError; ?></span><br>
        <input type="checkbox" name="cursos[0]" id="" value="HTML" <?php if (isset($_POST['cursos']) && isset($_POST['cursos'][0])== 'HTML') echo "checked"; ?>>HTML
        <br> 
        <input type="checkbox" name="cursos[1]" id="" value="CSS" <?php if (isset($_POST['cursos']) && isset($_POST['cursos'][1])== 'CSS') echo "checked"; ?>>CSS
        <br>
        <input type="checkbox" name="cursos[2]" id="" value="Javascript" <?php if (isset($_POST['cursos']) && isset($_POST['cursos'][2])== 'Javascript') echo "checked"; ?>> Javascript
        <br><br>
        <input type="submit" value="Send">
        <input type="reset" value="Reset">

    </form>
    <?php
    // Imprimimos el resultado
    if (isset($name) && isset($email) && isset($website) && isset($comment) && isset($gender) && isset($cursos)) {
        echo "Bienvenido " . $name . "<br><br>";
        echo "Tu dirección de correo es: " . $email . "<br><br>";
        echo "Tu sitio web es: " . $website . "<br><br>";
        echo "Tu comentario es: " . $comment . "<br><br>";
        echo "Tu género es: " . $gender . "<br><br>";
        // Para imprimir Arrays se necesita un foreach
        if (is_array($cursos)) {
            $numeroCursos = count($cursos);
            if($numeroCursos == 1) {
                echo "El curso que has escogido es: " ."<br>";
            } else  {
                echo "Los cursos que has escogido son: ". "<br>";
            }
            foreach ($cursos as $curso) {
                echo $curso . "<br>";
            }
        }
    }
    ?>
</body>
</html>