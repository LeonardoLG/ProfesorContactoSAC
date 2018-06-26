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
	$active_clientes="";
	$active_usuarios="";
	$active_informe="active";
	$title="Informe";
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
			<h4><i class='glyphicon glyphicon-search'></i> REPORTE DE INGRESOS y EGRESOS</h4>
		</div>
    <div class="table-responsive">
      <table class="table">
      <tr class="info">
        <th>Numero de Facturas</th>
        <th>Total de ventas</th>
      </tr>
      <?php
        $sql1="select count(*) as num from factura;";
        $query=mysqli_query($con,$sql1);
        $row=mysqli_fetch_array($query);
        $cant_factura=$row['num'];
        $sql1="select sum(total) as suma from factura;";
        $query=mysqli_query($con,$sql1);
        $row=mysqli_fetch_array($query);
        $suma_total=$row['suma'];
      ?>
      <tr>
        <td><?php echo $cant_factura; ?></td>
        <td><?php echo $suma_total; ?></td>
      </tr>
	</div>
</div>
<hr>
	<?php
	include("footer.php");
	?>
</body>
</html>
