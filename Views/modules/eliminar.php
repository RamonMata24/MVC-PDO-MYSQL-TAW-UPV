<?php 
//la sesion iniciada se valida de otro caso pide que se ingrese
    
session_start();

if (!isset($_SESSION['usuario'])) {
	header("Location: index.php?action=Ingreso");
	exit();
}
	//objeto controler eliminar con la cual hacemos su uso para la ejecucion del borrarUsuarioController
$eliminar = new MvcController();

$eliminar->borrarUsuarioController();//se hace uso delborrarUsuarioController (funcion del controlador)

?>