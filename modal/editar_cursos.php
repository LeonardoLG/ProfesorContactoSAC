	<?php
		if (isset($con))
		{
			$a="SELECT idprofesor , nombre from profesor;";
			$query=mysqli_query($con,$a);
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Curso
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
				<div id="resultados_ajax2"></div>
				<div class="form-group">
					<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-8">
				  	<input type="text" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del Curso" required></textarea>
						<input type="hidden" id="mod_id" name="mod_id">
					</div>
			  </div>
			  <div class="form-group">
					<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-8">
					 	<select class="form-control" id="mod_estado" name="mod_estado" required>
							<option value="">-- Selecciona estado --</option>
							<option value="1" selected>Activo</option>
							<option value="0">Inactivo</option>
					  </select>
					</div>
			  </div>
			  <div class="form-group">
					<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del Curso" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
					</div>
			  </div>
				<div class="form-group">
					<label for="idprofesor" class="col-sm-3 control-label">Profesor</label>
					<div class="col-sm-8">
						<select class="form-control" id="mod_profesor" name="mod_profesor" required>
							<option value="">Selecciona Profesor: </option>
							<?php while ($row=mysqli_fetch_array($query)){
							?>
							<option value=<?php echo $row['idprofesor']; ?> selected><?php echo '(',$row['idprofesor'],') ',$row['nombre'];?></option>
						<?php } ?>
						</select>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
