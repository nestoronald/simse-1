<div class="box-principal">
<h3 class="titulo">Listado de plan Seguimiento<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Listado de Plan Seguimiento</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>Cod plan</th>
		      <th>Plan de Seguimiento</th>
		      <th>Sigla</th>
		      <th>Inicio</th>
		      <th>Fin</th>		      
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><span><?php echo $row['i_codplan']; ?></span></td>
			    	<td><?php echo $row['v_desplan']; ?></td>			    	
			    	<td><?php echo $row['v_sigla']; ?></td>			    	
			    	<td><?php echo $row['d_fecini']; ?></td>			    	
			    	<td><?php echo $row['d_fecfin']; ?></td>			    	
			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>planseguimientos/editar/<?php echo $row['i_codplan']; ?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL; ?>planseguimientos/eliminar/<?php echo $row['i_codplan']; ?>">Eliminar</a>
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>