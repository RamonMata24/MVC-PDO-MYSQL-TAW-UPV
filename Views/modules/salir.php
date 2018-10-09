<?php 
// la session se cierra 
session_start();
if (isset($_SESSION['usuario'])) {
	$_SESSION['usuario'] = null;
	session_destroy();
	
	echo "<h2>Usted ha salido de la Sesión.</h2>";//validamos si habia una sesion iniciada y se muestra el mensaje que se cerro
}else{
	echo "<h2>Usted no ha iniciado Sesión.</h2>";// si no habia una sesion iniciada se muesta un mensaje
	
}

 ?>