<h1> Registro De Usuario</h1>
<!-- FORMAULARIO PARA EL REGISTRO DE USUARIO -->
<div id = "div1">
<form method = "POST">
<label>Usuario:</label><br>
<input type = "text" name = "usuarioRegistro" placeholder ="Usuario..." required><br>
<label>Contraseña:</label><br>
<input type = "password" name = "passwordRegistro" placeholder = "Contrasena..." required><br>
<label>Email:</label><br>
<input type = "email" name = "emailRegistro" placeholder = "Correo..." required><br>


<input type ="submit" name = "submit" value= "Save">

</form>
</div>
<?php
////objeto controller con el ejecutamos la funcion registrarUsuarioController
$registro = new MvcController();

$registro->registroUsuarioController();

if (isset($_GET['action'])) {

	if ($_GET['action'] == 'Ok') {
        echo 'Se ha registrado!';
        
	} else {
		echo '¡Error al registrar!';
	}
	
}

?>