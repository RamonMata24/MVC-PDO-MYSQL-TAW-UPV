
<h1>Ingresar: Inicio de Sesión</h1>

<!-- FORMUALRIO DE INICIO DE SESION-->

<div id = "div1">
<form method="POST">
	<label>Usuario:</label><br>
	<input type="text" name="usuarioIngreso" required placeholder="Usuario...">
	<br>
	<label>Contraseña:</label><br>
	<input type="password" name="passwordIngreso" required placeholder="Contraseña...">
	<br>
	<input type="submit" name="acceder" value="Acceder">
</form>
</div>

<?php 
	$registro = new MvcController();

	//Invocamos la funcion ingresarUsuarioController
	$registro -> ingresarUsuarioController();

	if(isset($_GET["action"])){
	  if($_GET["action"] == "Fallo"){
	    echo "Hubo un problema al iniciar!";
	  }
	}

?>