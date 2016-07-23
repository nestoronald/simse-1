<div class="box-principal">
<h3 class="titulo">Listado de Cuestionarios<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Listado de cuestionarios</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>Cod cuestionario</th>
		      <th>Cuestionario</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>

				<?php if ($datos) {
					foreach ($datos as $item) { ?>
					<tr>
						<td>
							<a href="<?php echo URL; ?>cuestionarios/ver/<?php echo $item->I_CODCUEST; ?>"><?php echo $item->I_CODCUEST; ?></a>
						</td>
						<td>
							<?php echo $item->V_DESCUEST; ?>
						</td>
						<td>
							<a class="btn btn-warning" href="<?php echo URL; ?>cuestionarios/editar/<?php echo $item->I_CODCUEST; ?>">Editar</a>
							<a class="btn btn-danger" href="<?php echo URL; ?>cuestionarios/eliminar/<?php echo $item->I_CODCUEST; ?>">Eliminar</a>
						</td>
					</tr>

					<?php }
				} ?>

		  </tbody>
		</table>
	  </div>
	</div>
</div>
