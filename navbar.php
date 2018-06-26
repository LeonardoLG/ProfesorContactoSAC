	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PROFESOR CONTACTO</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
				<li class="<?php echo $active_usuarios;?>"><a href="profesor.php"><i  class='glyphicon glyphicon-lock'></i> Profesores </a></li>
				<li class="<?php echo $active_clientes;?>"><a href="alumno.php"><i class='glyphicon glyphicon-user'></i> Alumnos</a></li>
				<li class="<?php echo $active_productos;?>"><a href="cursos.php"><i class='glyphicon glyphicon-barcode'></i> Cursos</a></li>
				<li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Facturas <span class="sr-only">(current)</span></a></li>
				<li class="<?php echo $active_informes;?>"><a href="informes.php"><i class='glyphicon glyphicon-search'></i> Informes</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
	<?php
		}
	?>
