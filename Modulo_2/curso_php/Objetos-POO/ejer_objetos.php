<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer objetos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: lightcyan;

        }

        #form_php {
            padding: 15px 30px 15px 30px;
            width: 280px;
            height: auto;
            border: 2px solid blue;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f0f0f0; 
            margin-top: 20px;
            box-shadow: 5px 5px 6px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }

        figure {
            margin: 0;
            padding: 8px;
        }

        figure img {
            width: 100%;
            height: auto;
            display: block; 
        }

        label, strong {
            color: blue;
            font-weight: 700;
        }

        input {
            margin-bottom: 10px;
        }

        input[type="text"]{
            margin-left: 30px;
        }

        input[type="email"]{
            margin-left: 40px;
        }

        input[name="empleo"]{
            margin-left: 34px;
        }

        input[name="titulacion"]{
            margin-left: 17px;
        }

        input[type="submit"] {
            margin-top: 15px;
            font-size: 16px;
            color: blue;
            background-color: greenyellow;
            border-radius: 3px;
            border-color: greenyellow;
            box-shadow: 5px 5px 6px rgba(0,0,0,0.5);
        }
        input[type="submit"]:hover {
            transform: scale(1.1);
            font-weight: bolder;
        }

        textarea {
            margin-top: 20px;
            padding: 6px;
        }

        .alinear {
            text-align: left;
            padding: 10px 30px 30px 30px;
            width: 280px;
            height: auto;
            border: 2px solid blue;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #f0f0f0; 
            margin-top: 20px;
            box-shadow: 5px 5px 6px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }

        .alinear h2 {
            text-align: center;
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
    <h1>Ejercicio Objetos</h1>
    <form action="ejer_objetos.php" name="objetos" method="post" id="form_php">
        <figure>
        <img src="https://static.vecteezy.com/system/resources/previews/019/951/954/non_2x/people-contact-logo-vector.jpg" alt="imagen_contacto">
        </figure>
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="empleo">Empleo: </label>
        <input type="text" name="empleo" id="empleo">
        <br>
        <label for="titulacion">Titulación: </label>
        <input type="text" name="titulacion" id="titulacion">
        <br>
        <label for="">Comentarios:</label>
        <textarea name="comentario" id="comentario" cols="33" rows="10" placeholder="Escribe aquí tú comentario"></textarea>
        <br>
        <input type="submit" value="Enviar Formulario">
    </form>
<?php
    // Recogemos los datos del formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $empleo = $_POST['empleo'];
        $titulacion = $_POST['titulacion'];
        $comentarios = $_POST['comentario'];

        // Creamos un nuevo objeto de la clase Persona y le asigna la variable
        // $datosPersona
        $datosPersona = new Persona ($nombre, $email, $empleo, $titulacion, $comentarios);

        // Imprimir los datos de la persona
        echo "<div class='alinear'>";
        echo "<h2>Datos de la Persona</h2>";
        echo "<p><strong>Nombre:</strong> " . $datosPersona->get_name() . "</p>";
        echo "<p><strong>Email:</strong> " . $datosPersona->get_email() . "</p>";
        echo "<p><strong>Empleo:</strong> " . $datosPersona->get_empleo() . "</p>";
        echo "<p><strong>Titulación:</strong> " . $datosPersona->get_titulacion() . "</p>";
        echo "<p><strong>Comentarios:</strong> " . $datosPersona->get_comentarios() . "</p>";
        echo "</div>";

    } else {
        echo "No se ha recibido ningun dato, por favor rellena el formulario";
    }

    // Creamos un objeto con class
    class Persona {
        // Propiedades
        private $nombre;
        private $email;
        private $empleo;
        private $titulacion;
        private $comentarios;
        // Iniciamos los argumentos
        function __construct($nombre, $email, $empleo, $titulacion, $comentarios) {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->empleo = $empleo;
            $this->titulacion = $titulacion;
            $this->comentarios = $comentarios;
        }
        // Accedemos al valor de la propiedad privada nombre
        function get_name() {
            return $this->nombre;
        }
        // Accedemos al valor de la propiedad privada email
        function get_email(){
            return $this->email;
        }
        // Accedemos al valor de la propiedad privada empleo
        function get_empleo() {
            return $this->empleo;
        }
        // Accedemos al valor de la propiedad privada titulación
        function get_titulacion(){
            return $this->titulacion;
        }
        // Accedemos al valor de la propiedad privada comentarios
        function get_comentarios() {
            return $this->comentarios;
        }
    }
    
    ?>
</body>
</html>