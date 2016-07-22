<?php namespace Views;

	$template = new Template();

	class Template{

		public function __construct(){
?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sistema de Información de Monitoreo y Seguimiento | SIMSE</title>
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/general.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		        <span class="sr-only"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">SIMSE</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		      <ul class="nav navbar-nav">
		        <li><a href="<?php echo URL; ?>">Inicio</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Operadores <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>operadores">Listado</a></li>		            
		            <li><a href="<?php echo URL; ?>operadores/agregar">Agregar</a></li>		            
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Preguntas <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>preguntas">Listado</a></li>
		            <li><a href="<?php echo URL; ?>preguntas/agregar">Agregar</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cuestionarios <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>cuestionarios">Listado</a></li>
		            <li><a href="<?php echo URL; ?>cuestionarios/agregar">Agregar</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Plan de Seguimiento <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>planseguimientos">Listado</a></li>
		            <li><a href="<?php echo URL; ?>planseguimientos/agregar">Agregar</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuracion de Sistema <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>configsystem">Listado</a></li>		            
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuario <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>usuarios">Listado</a></li>
		            <li><a href="<?php echo URL; ?>usuarios/agregar">Agregar</a></li>		            
		          </ul>
		        </li>		       
		      </ul>		     
		    </div>
		  </div>
		</nav>
<?php
		}

		public function __destruct(){
?>
	<footer class="navbar-fixed-bottom">
		Todos los derechos reservados &copy 2016 <br>
		DIMSE</b>
	</footer>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="<?php echo URL; ?>Views/template/js/bootstrap.js"></script>
	<script src="<?php echo URL; ?>Views/template/js/ubigeo.js"></script>
	</body>
	</html>
<?php
		}

	}

?>