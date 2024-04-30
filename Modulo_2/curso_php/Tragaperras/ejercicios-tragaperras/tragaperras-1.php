<?php

/**
 * Minijuegos: Tragaperras (1) - tragaperras-1.php
 *
 * @author Escriba aquí su nombre
 *
 */
session_name("tragaperras-1");
session_start();

// Valores iniciales variables sesión
if (
  !isset($_SESSION["monedas"]) || !isset($_SESSION["fruta1"])
  || !isset($_SESSION["fruta2"]) || !isset($_SESSION["fruta3"])
  || !isset($_SESSION["premio"]) || !isset($_SESSION["cara"])
) {
  header("Location:tragaperras-2-2.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Tragaperras (1).
    Minijuegos.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Tragaperras (1)</h1>

  <?php

// Se genera el formulario
print "  <form action=\"tragaperras-2-2.php\" method=\"get\">\n";
print "    <table style=\"margin-left: auto; margin-right: auto; border: black 4px solid; border-spacing: 10px;\">\n";
print "      <tr>\n";
// Se muestran las tres imágenes de la combinación actual
print "        <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$_SESSION[fruta1].svg\" width=\"160\" alt=\"Imagen\"></td>\n";
print "        <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$_SESSION[fruta2].svg\" width=\"160\" alt=\"Imagen\"></td>\n";
print "        <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$_SESSION[fruta3].svg\" width=\"160\" alt=\"Imagen\"></td>\n";
print "        <td style=\"vertical-align: top; text-align: center\">\n";
// Se muestra la apuesta
print "          <p><button type=\"submit\" name=\"accion\" value=\"apostar\">Aumentar apuesta</button></p>\n";
print "          <p style=\"margin: 0; font-size: 300%; border: black 4px solid; padding: 2px\">$_SESSION[apuesta]</p>\n";
// Se muestra el botón de Jugar
print "          <p><button type=\"submit\" name=\"accion\" value=\"jugar\">Jugar</button></p>\n";
// Si se ha jugado se muestra cara y resultado, si no cara neutra
print "          <p style=\"margin: 1px; font-size: 300%; border: black 4px solid; padding: 2px\">";
if (isset($_SESSION["cara"])) {
    print "<img src=\"img/face-$_SESSION[cara].svg\" alt=\"Mal\" height=\"50\">";
    print "$_SESSION[premio]</p>\n";
} else {
    print "<img src=\"img/face-plain.svg\" alt=\"Normal\" height=\"50\"></p>\n";
}
print "        </td>\n";
print "        <td style=\"vertical-align: top; text-align: center\">\n";
// Se muestra el contador de monedas
print "          <p><button type=\"submit\" name=\"accion\" value=\"moneda\">Meter moneda</button></p>\n";
print "          <p style=\"margin: 0; font-size: 300%; border: black 4px solid; padding: 2px\">$_SESSION[monedas]</p>\n";
print "        </td>\n";
print "      </tr>\n";
print "    </table>\n";
print "  </form>\n";
  ?>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>

</html>