<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

	$active_facturas="";
	$active_productos="";
	$active_clientes="active";
	$active_usuarios="";
	$active_informe="";
	$title="Alumno";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body>
	<?php
	include("navbar.php");
	?>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Alumno</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Alumnos</h4>
		</div>
		<div class="panel-body">
			<?php
				include("modal/registro_alumno.php");
				include("modal/editar_alumno.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				<div class="form-group row">
					<label for="q" class="col-md-2 control-label">Alumno</label>
						<div class="col-md-5">
							<input type="text" class="form-control" id="q" placeholder="Codigo o Nombre del alumno" onkeyup='load(1);'>
						</div>
					</div>
			</form>
			<div id="resultados"></div>
			<div class='outer_div'></div>
		</div>
	</div>
</div>
<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/clientes.js"></script>
</body>
</html>
