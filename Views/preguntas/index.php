<div class="box-principal">
<h3 class="titulo">Listado de preguntas<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Listado de preguntas</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>Cod pregunta</th>
		      <th>Pregunta</th>		      
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><a href="<?php echo URL; ?>preguntas/ver/<?php echo $row['i_codpreg']; ?>"><?php echo $row['i_codpreg']; ?></a></td>
			    	<td><?php echo $row['v_despreg']; ?></td>			    	
			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>preguntas/editar/<?php echo $row['i_codpreg']; ?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL; ?>preguntas/eliminar/<?php echo $row['i_codpreg']; ?>">Eliminar</a>
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>