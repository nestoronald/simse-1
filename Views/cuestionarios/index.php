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
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><a href="<?php echo URL; ?>cuestionarios/ver/<?php echo $row['i_codcuest']; ?>"><?php echo $row['i_codcuest']; ?></a></td>
			    	<td><?php echo $row['v_descuest']; ?></td>			    	
			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>cuestionarios/editar/<?php echo $row['i_codcuest']; ?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL; ?>cuestionarios/eliminar/<?php echo $row['i_codcuest']; ?>">Eliminar</a>
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>