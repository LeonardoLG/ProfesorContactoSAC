<?php 
 /**
  * se encrga de conigurar la rtua de la aplicacion el titulo del sitio
  * donamicamente
  * cuando empezemos a crear diferentes secciones , enotnces nos llenaran muchos archicos
  * y caundo queramos cambiar algunas cosas , pues cambiamos constantes instanciadas aqui
  */
 
 /**
  * Tambien sirve para configuraciones  de acceso a la base de datos
  */
 
 	//acceso a la base de datos con la siguiente configuracion
 	define('DB_HOST', 'localhost');
 	define('DB_USUARIO', 'root');
 	define('DB_PASSWORD', '');
 	define('DB_NOMBRE', 'crud_mvc2');

	//Ruta de la aplicacion
 	define('RUTA_APP', dirname(dirname(__FILE__)));

 	//Ruta url Ejemplo : http://localhost/render2web_mvc2/
 	define('RUTA_URL', 'http://localhost/crud_mvc2');

 	define('NOMBRESITIO', 'CRUD MVC - PROBANDO');
 	

	
 	