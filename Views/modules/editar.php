<?php 

//se valida la sesion del usuario si no pide que se ingrese
	session_start();
	if (!$_SESSION['usuario']) {
		header('location:index.php?action=ingresar');
		exit();
	}
?>

<h1>EDITAR USUARIO</h1>}
<!--Para editar al usuario -->

<form method="POST">
<!-- Mediante el post-->
	
	<?php 
	//se ejecutan los controladores mediante el obj MvcController
		$editar = new MvcController();
		$editar->cargaUsuario();
		$editar->actualizarUsuarioController();
	?>

</form>

