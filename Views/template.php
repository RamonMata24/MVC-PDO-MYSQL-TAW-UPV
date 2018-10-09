<!DOCTYPE html>
<html>
<head>
	<title>PLANTILLA | MVC </title>
	
	<style>
				body {
				font-family: cursive;
				}
				#div1{
					font-family: fantasy;
				}
				header{
					position: relative;
					margin: auto;
					text-align: center;
					padding: 15px;

				}
				nav{
					position: relative;
					margin: auto;
					width: 100%;
					height: auto;
					background: #283747;
				}
			    nav ul{	
					position: relative;
					margin: auto;
					width: 50%;
					text-align: center;

				}
				nav ul li{
					display: inline-block;
					width: 24%;
					line-height: 50px;
					list-style: none;
				}
				nav ul li a{
					color: white;
					padding: 20%;
					text-decoration: none;
				}
				section{
					position: relative;
					padding: 2%;
				}
				section h1{
					position: relative;
					margin: auto;
					padding: 5%;
					text-align: left;
				}
				section form{
					position: relative;
					margin: auto;
					width: 400px;
				}
				section form input{
					display: inline-block;
					padding: 10px;
					width: 195px;
					margin: 5px;
				}
				section form input[type = "submit"] {
					position: relative;
					margin: 20px auto;
					left: 4.5%;
				}
				table {
					position: relative;
					margin: auto;
					width: 100px;
					left: -10%;
				}
				table thead tr th {
					padding: 10px;
				}
				table tbody tr td {
					padding: 10px;
					
				}
				
	</style>

</head>
<body>

	<header>
		<h1> TAW - PHP - MVC</h1>
		<h3>Universidad Politécnica De Victoria</h3>
	</header>

<section>
	
	<?php    
		include('modules/navegacion.php');
	 //MOSTRAREMOS UN CONTROLADOR QUE MUESTRA LA PLANTILLA
	$mvc = new MvcController();
	//mostramos la funcion 
	$mvc-> enlacesPaginasController();


	?>
</section>


</body>
</html>