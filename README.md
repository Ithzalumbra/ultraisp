# ultraisp

Instituto de Salud Pública de Chile

1.-Descargar el progrmama "Git Bash"

1.1- Despues de descargado, lo instalan en su computador.

2.- Descargar "WAMP" o equivalente.

3.- Descargar Composer, lo instalan (Es necesario tener wamp o algun servidor instalado en el computador primero), seleccione una version de php superior a 5.6 en la instalacion de composer.

4.- Dejar todos los archivos del proyecto en c:/wamp/www

5.- En la carpeta del proyecto (c:/wamp/www/ultraisp) hacen click derecho y seleccior "Git bash here"

5.2- Despues escribir "composer install" en la consola de Git Bash

5.3- Cuando termine el "composer install", pegar este comando en la consola "bin/cake server -p 8765"

6.- En la carpeta config modificar el archivo app.php donde dice 'Datasources', 'default' cambiar los datos a la base de datos local.

7.- El programa esta listo

Activar el short_open_tag en las configuracion de php.ini o sino no va a funcionar como se debe.

set global sql_mode='';
