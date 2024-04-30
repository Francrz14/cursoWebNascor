<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grid3 Ejercicio PHP</title>
    <link rel="stylesheet" type="text/css" href="grid3.css">
</head>
<body>
    <?php
	// Declaramos un array multidimensional con 4 arrays dentro
    $elementos = array(
        array("¿Cómo somos?", "Honestos, ágiles y eficientes", "imagenes/llegar.png"),
        array("¿Qué se nos da bien?", "Dotar a las compañías de las soluciones que lideran el mercado, asegurando el éxito de la implantación y su calidad.", "imagenes/que_se_nos_da_bien.png"),
        array("¿Cómo hemos llegado hasta aquí?", "Con pasión y esfuerzo en nuestro trabajo, y con la colaboración de nuestros clientes desde hace más de 25 años.", "imagenes/nueva-imagen.webp"),
        array("Cómo trabajamos", "Con nuestra propia metodología que implanta que nos asegura el éxito y la calidad de los proyectos, implantando las soluciones de manera más efectiva.", "imagenes/quienes_somos.png")
    );

	// Usamos un foreach para iterar con el array y ponemos una condicion para poner
	// la clase ordenInverso en los div 2 y 4
    $ordenInversoDiv = "";
    foreach ($elementos as $datos => $dato) {
        // mira si los $datos 1 y 3 son verdaderos, en este caso se ejecuta y sale la class
        // ordenInverso para los div 2 y 4.
        if ($datos == 1 || $datos == 3) {
            $ordenInversoDiv = "ordenInverso";
        } else {
            $ordenInversoDiv = "";
        }
        ?>
		<!-- Se muestra el resultado, no hace falta poner 4 div con class caja, si
		no se repetiran 4 div por cada div class texto que pongas extra -->
        <div class="caja">
            <!-- Imprime la ultima posicion del array en la imagen, y la clase ordenInversoDiv -->
            <img src="<?php echo $dato[2]; ?>" class="<?php echo $ordenInversoDiv; ?>">
            <div class="texto">
                <h2><?php echo $dato[0]; ?></h2>
                <p><?php echo $dato[1]; ?></p>
            </div>
        </div>
    <?php } ?>
</body>
</html>