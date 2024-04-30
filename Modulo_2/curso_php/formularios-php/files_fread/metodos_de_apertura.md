`'r' (lectura):` Abre el archivo para lectura. El puntero del archivo se coloca al principio del archivo.

`'w' (escritura):` Abre el archivo para escritura. Si el archivo no existe, intenta crearlo. Si el archivo ya existe, borra su contenido anterior y comienza a escribir desde el principio.

`'a' (añadir):` Abre el archivo para escritura. Si el archivo no existe, intenta crearlo. Si el archivo ya existe, coloca el puntero al final del archivo y escribe desde allí. El contenido existente no se borra.

`'x' (exclusivo):` Crea y abre el archivo para escritura. Si el archivo ya existe, la llamada a fopen() fallará devolviendo FALSE y generará una advertencia. Si el archivo no existe, se intenta crear.

`'c' (creación):` Abre el archivo para escritura. Si el archivo no existe, intenta crearlo. Si el archivo ya existe, no se trunca el archivo. El puntero del archivo se coloca al principio del archivo. Esta opción se puede combinar con 'w' o 'a'.

`'r+' (lectura/escritura):` Abre el archivo para lectura y escritura. El puntero del archivo se coloca al principio del archivo.

`'w+' (lectura/escritura):` Abre el archivo para lectura y escritura. Si el archivo no existe, intenta crearlo. Si el archivo ya existe, borra su contenido anterior y comienza a escribir desde el principio.

`'a+' (lectura/escritura):` Abre el archivo para lectura y escritura. Si el archivo no existe, intenta crearlo. Si el archivo ya existe, coloca el puntero al final del archivo y escribe desde allí. El contenido existente no se borra.

