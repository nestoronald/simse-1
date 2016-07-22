<div class="box-principal">
<h3 class="titulo">Configuracion Sistema<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Configuración de Archivos</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>N°</th>
		      <th>Descripción</th>		      
		      <th>Directorio (link)</th>		      
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><span><?php echo $row['i_codconfig']; ?></span></td>
			    	<td><?php echo $row['v_descrip']; ?></td>			    	
			    	<td><?php echo $row['v_link']; ?></td>			    	
			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>configsystem/editar/<?php echo $row['i_codconfig']; ?>">Editar</a>						
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>