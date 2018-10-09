<?php

// el index que muestra al usuario la salida de las vistas y a traves de el enviaremos las distintas acciones del usuario al controlador
// MOSTRAR LA PLANTILLA AL USUARIO (TEMPLATE.PHP) LA CUAL SE ALOJARA EN VIEWS
// requerimos el controller
require_once("Controllers/controller.php");
//invocamos/requerimos el modelo que se utilizara en todos los archivos 
require_once("Models/model.php");
require_once("Models/crud.php");
//Para poder ver el template o plantilla , se hace una peticion mediante un controlador
//CREAMOS EL OBJETO

$mvc = new MvcController();

//muestra la funcion plantilla que se 
$mvc->pagina();


?>