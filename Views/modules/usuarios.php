<?php 
// se valida el inicio de sesion 
session_start();

if (!isset($_SESSION['usuario'])) {
	header("Location: index.php?action=ingresar");
	exit();
}

 ?>
<h1>Listado De Usuarios</h1>
<br>

<?php 
//se muestra el listado de usurios mediante el obj y el metodo 
$vista_usuarios = new MvcController();

$vista_usuarios->vistaUsuarioController();


 ?>