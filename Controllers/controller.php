<?php

	class MvcController {

		//llamar a la plantilla

		public function pagina(){
			//include se utiliza para invocar el archivo que contiene el codigo HTML!
			include('Views/template.php');
		}

		// INTERACCION CON EL USUARIO


		public function enlacesPaginasController(){
			// trabajar con los enlaces de las paginas
			//validamos si la variable "action" viene vacia , es decir , cuando se abre la pagina por primera vez se debe cargar la vista index.php


			if (isset($_GET['action'])) {
				//guardar el valor de la variable action en "Views/modules/navegacion.php en el cual se recibe mediante el metodo GET esa variable "

				$enlacesController = $_GET['action'];

			}else{
				//si viene vacio inicializo con index

				$enlacesController = "index";
			}

			//mostrar los archivos de los enlaces de cada una de las secciones: Inicio , nosotros ,etc.
			//PARA ESTO HAY QUE MANDAR AL MODELO PARA QUE SE HAGA DICHO PROCESO Y MUESTRE LA INFORMACION

			$respuesta = Paginas::enlacesPaginasModel($enlacesController);
			include $respuesta;

		}


		//Funcion para el controlador del registro
		public function registroUsuarioController(){
			//se verifica que el campo usuarioRegistro contenga un valor
			if(isset($_POST['usuarioRegistro'])){
				// se manda en un array asociativo los valores mediante el POST
				$datosController = array( 
					  "usuario"=>$_POST['usuarioRegistro'],
					  "email"=>$_POST['emailRegistro'],
					  "password"=>$_POST['passwordRegistro']);
					// se hace uso de la clase Datos con el nombre del metodo y se mandan dos paramentros 
					//el valor del array en la variable datosController y el nombre de la tabla (usuarios).
				$respuesta = Datos::registroUsuarioModel($datosController,"usuarios");
					//se verifica si la respues es success
				if($respuesta == "success"){
					//en caso de que sea success se manda el action con valor de OK la cual tomara valor en el modelo
					header("Location: index.php?action=Ok");
				}
				else{//de otra manera
					//Se quedara en el index
					header("location:index.php");
				}

			}

		}
		//funcion de ingreso 
		public function ingresarUsuarioController(){
			//se evalua la accion acceder
		if(isset($_POST["acceder"])){
			// datosController tiene un array asociativo con los valores del usuario y la contraseña
			$datosController = array(
				 "usuario"=>$_POST["usuarioIngreso"], 
				 "password"=>$_POST["passwordIngreso"]);
					// se hace uso de la clase Datos con el nombre del metodo y se mandan dos paramentros el valor	
					// del array en la variable datosController y el nombre de la tabla (usuarios).
			$respuesta = Datos::ingresarUsuarioModel($datosController, "usuarios");
			//se hace una validacion de usuario y la contraseña 
			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
				session_start();//si el usuario y la contraseña es correcto se inicia la sesion
				$_SESSION["usuario"] = true;//se inicia la sesion
				// y se dirige a la accion usuarios que en el modelo nos lleva al listado
				header("Location: index.php?action=usuarios");
			}else{//De otra manera se marca un fallo en el inicio de sesion y se hace la accion en el modelo
				header("Location: index.php?action=fallo");
			}
		}	
	}
	
	// Funcion para el listado de usuarios
		public function VistaUsuarioController(){
			//se le asigna la clase Datos con la funcion de vista cpn el parametro que es el nombre de la tabla 
			$respuesta = Datos::vistaUsuarioModel("usuarios");
			//Estilo para la tabla o listado Usuarios
			echo '
			<!--Inicio del estilo para la tabla -->
			 <style>
			table {
				font-family: cursive;
				border-collapse: collapse;
				width: 70%;
			}
			
			td, th {
				border: 7px solid #dddddd;
				text-align: center;
				padding: 8px;
			}
			
			tr:nth-child(even) {
				background-color: #D5F5E3;
			}
			</style>
			<!-- Fin del estilo-->
			<!-- Inicio de la tabla -->
			<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>E-mail</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>';
					foreach ($respuesta as $usuario => $item) {
						echo '<tr>
						<td>'.$item["id"].'</td>
							<td>'.$item["usuario"].'</td>
							<td>'.$item["password"].'</td>
							<td>'.$item["email"].'</td>
							<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
							<td><a href="index.php?action=eliminar&id='.$item["id"].'"><button>Borrar</button></a></td>
						</tr>';
					}	
			echo '</tbody>
				</table>';





		}
		// funcion borrar usuario
		public function borrarUsuarioController(){
			//se obtiene el id del usuario a borra mediante el metodo Get
			if(isset($_GET["id"])){
				//se le asigna a datosController el id mediante el metodo get
				$datosController = $_GET["id"];
				//se mandan como parametros el id y el nombte de la tabla
				$respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");
				//si es success
				if($respuesta == "success"){
					//se manda a la tabla usuarios mediante la accion y el modelo 
					header("location:index.php?action=usuarios");
				}
			}
		
		
			
		}

		// para obtener los usuarios al momento de actualizar
		public function cargaUsuario(){
			//se toma el id existente mediante el metodo GET
			if (isset($_GET['id'])) {
				//a la variable id se le asinga el id obtenido
				$id = $_GET['id'];
				//se manda a la clase Datos el id y el nombre de la tabla
				$respuesta = Datos::cargaUsuario($id, 'usuarios');
				//se cra un pequeño form de los campos del usuario con el nombre la contraseña y el email cargados
				echo '<input type="hidden" name="id" value="'.$respuesta["id"].'">
					<label>Usuario:</label><br>
					<input type="text" value="'.$respuesta["usuario"].'" name="usuario" required><br>
					<label>Contraseña:</label><br>
					<input type="text" value="'.$respuesta["password"].'" name="password" required><br>
					<label>Correo:</label><br>
					<input type="email" value="'.$respuesta["email"].'" name="email" required><br>
	
					<input type="submit" value="Actualizar">';
			}
	
			
		}
		//Funcion para actualizar
		public function actualizarUsuarioController(){
			//validacion del id
			if (isset($_POST['id'])) {
				//se manda el array asociativo mediante datosController
				$datosController = array(
					'id' => $_POST['id'],
					'usuario' => $_POST['usuario'],
					'password' => $_POST['password'],
					'email' => $_POST['email']
				);
				//se hace uso de la clase Datos y el metodo y se incluyen los parametrs
				$respuesta = Datos::actualizarUsuarioModel($datosController, 'usuarios');
				//si la reespuesta es succes se toma accion en el modelo
				if($respuesta == "success"){
					header("location:index.php?action=cambio");
				} else {//de otra manera manda un mensaje de error
					echo 'Error al actualizar';
				}
			}
				
		}

	}
	

?>