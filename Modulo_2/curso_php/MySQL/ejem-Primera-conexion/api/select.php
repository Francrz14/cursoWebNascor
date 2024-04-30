<?php
// Te devuleve un archivo json
require('db_utils.php');

$query ="SELECT * FROM noticia";

$resultado = consulta($query);

$data = array();
foreach($resultado as $row){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
exit;

?>