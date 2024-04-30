<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form PHP</title>
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
            width: 310px;
            height: 250px;
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
    <h1>Validation Form PHP</h1>
    <form action="<?php echo htmlspecialchars($_SERVER('PHP_SELF')) ?>" method="post" id="form_php">
        Name: <input type="text" name="name" value=""><br>
        E-mail: <input type="<text" name="email"><br>
        Website: <input type="text" name="website"><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>

        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other <br><br>
        <input type="submit" value="Send">
        <input type="reset" value="Reset">

    </form>
    <?php
    // definir variables y establecer valores vacíos
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    if (isset($name) && isset($email) && isset($website) && isset($comment) && isset($gender)) {
        echo "Bienvenido " . $name . "<br><br>";
        echo "Tu dirección de correo es: " . $email . "<br><br>";
        echo "Tu sitio web es: " . $website . "<br><br>";
        echo "Tu comentario es: " . $comment . "<br><br>";
        echo "Tu género es: " . $gender . "<br><br>";
    }
    ?>
</body