<?php
require('db_utils.php');

if (!isset($_GET['id'])){
    http_response_code(400);
    echo "Faltan los parámetros requeridos";
    exit;
}
$id = $_GET['id']; 
/* consulta base de datos noticia donde los Id*/
$query ="SELECT * FROM noticia WHERE id='$id'";

$resultado = consulta($query);

$data = array();
foreach($resultado as $row){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
exit;

?>