<?php

	class Paginas{
		//funcion con el parametro $enlacesModel que se recibe atravez de controlador

		public function enlacesPaginasModel($enlacesModel){
			// validacion

			if ($enlacesModel == "ingresar" || 
				$enlacesModel == "registro" ||
				$enlacesModel == "usuarios" ||
				$enlacesModel == "editar" ||
				$enlacesModel == "eliminar" ||
				$enlacesModel == "salir" ) {

				//mostramos el url concatenado con la variable $enlacesModel
				$module = "Views/modules/".$enlacesModel.".php";

			}		

			//una vez que action viene vacio (validando en el controlador) entonces se consulta si la variable $enlacesModel es igual a la cadea "index" para de ser asi se muestre index.php

			else if ($enlacesModel == "index") {
				$module = "Views/modules/registro.php";


			}
			else if ($enlacesModel == "Ok"){

				$module = "Views/modules/registro.php";

			}
			else if ($enlacesModel == "fallo"){

				$module = "Views/modules/ingresar.php";

			}
			else if ($enlacesModel == "usuarios"){

				$module = "Views/modules/usuarios.php";

			}
			else if ($enlacesModel == "editar"){

				$module = "Views/modules/editar.php";

			}
			else if ($enlacesModel == "eliminar"){

				$module = "Views/modules/usuarios.php";

			}else if ($enlacesModel == "cambio"){

				$module = "Views/modules/usuarios.php";

			}
			
				// Validar una LISTA BLANCA
			else{

				$module = "Views/modules/registro.php";

			}

			return $module;

		}





	}

?>