
<div class="box-principal">
<h3 class="titulo">Listado de usuarios<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Listado de usuarios</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>Nro</th>
		      <th>Usuario</th>		      
		      <th>Apellido Paterno</th>		      
		      <th>Apellido Materno</th>		      
		      <th>Nombres</th>		      
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><a href="<?php echo URL; ?>usuarios/ver/<?php echo $row['i_codusu']; ?>"><?php echo $row['i_codusu']; ?></a></td>
			    	<td><?php echo $row['v_usuario']; ?></td>
			    	<?php
			    	$cod_persona = $row['i_codpersona'];
			    	$persona = $usuarios->verPersona("1");
			    	var_dump($usuarios->index());
			    	?>			    	
			    	<td><?php echo $persona['v_apepat']; ?></td>			    	
			    	<td><?php echo $persona['v_apemat']; ?></td>			    	
			    	<td><?php echo $persona['v_nombre']; ?></td>			    	
			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>usuarios/editar/<?php echo $row['i_codusu']; ?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL; ?>usuarios/eliminar/<?php echo $row['i_codusu']; ?>">Eliminar</a>
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>