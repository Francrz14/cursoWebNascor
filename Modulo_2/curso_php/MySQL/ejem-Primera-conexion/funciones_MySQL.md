# Funciones básicas de MySQLi en PHP

## mysqli_connect()
Esta función se utiliza para establecer una conexión con la base de datos MySQL. Toma varios parámetros, como el nombre del host, el nombre de usuario, la contraseña y el nombre de la base de datos, y devuelve un identificador de conexión si se realiza con éxito.

## mysqli_select_db()
Esta función se utiliza para seleccionar una base de datos MySQL específica en la que se realizarán las consultas. Toma dos parámetros: el identificador de conexión a la base de datos y el nombre de la base de datos que se va a seleccionar.

## mysqli_query()
Esta función se utiliza para enviar una consulta SQL a la base de datos MySQL. Toma dos parámetros: el identificador de conexión a la base de datos y la consulta SQL que se va a ejecutar. Devuelve un objeto mysqli_result para las consultas SELECT, SHOW, DESCRIBE o EXPLAIN. Para otras consultas (como INSERT, UPDATE, DELETE, etc.), devuelve TRUE si la consulta se realizó con éxito o FALSE si falló.

## mysqli_num_rows()
Esta función se utiliza para obtener el número de filas devueltas por una consulta SELECT. Toma un parámetro, que es el resultado de una consulta SELECT ejecutada previamente. Devuelve el número de filas como un entero.

## mysqli_close()
Esta función se utiliza para cerrar una conexión abierta a la base de datos MySQL. Toma un parámetro, que es el identificador de conexión a la base de datos. Cerrar la conexión es importante para liberar recursos y evitar agotar las conexiones permitidas al servidor de la base de datos.

## mysqli_fetch_array()
Esta función se utiliza para obtener una fila de resultados como un array asociativo, numérico o ambos. Toma un parámetro, que es el resultado de una consulta SELECT ejecutada previamente. Devuelve un array que representa la próxima fila de resultados del conjunto de resultados o NULL si no hay más filas disponibles.