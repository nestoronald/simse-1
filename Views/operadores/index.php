<div class="box-principal">
<h3 class="titulo">Listado de Operadores<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Listado de Operadores</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>N°</th>		            
		      <th>Sigla</th>		      
		      <th>Operador</th>		
		      <th>Departamentos</th>		
		      <th>Provincias</th>		
		      <th>Distrito</th>		
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row = mysqli_fetch_array($datos)){ ?>
		  	<tr>		  			
					<td><a href="<?php echo URL; ?>operadores/ver/<?php echo $row['i_codopera']; ?>"><?php echo $row['i_codopera']; ?></a></td>
			    	<td><?php echo $row['v_sigla']; ?></td>			    	
			    	<td><?php echo $row['v_desoperador']; ?></td>
			    	
			    	<?php $dep = $operadores->verDep($row['v_coddep']);  ?>			    	
			    	<td><?php echo $dep['v_desdep']; ?></td>

			    	<?php $prov = $operadores->verProvDep($row['v_coddep'], $row['v_codpro']); ?>			    	
			    	<td><?php echo $prov['v_despro']; ?></td>

			    	<?php $dis = $operadores->verDisProvDep($row['v_coddep'], $row['v_codpro'], $row['v_coddis']); ?>			    	
			    	<td><?php echo $dis['v_desdis']; ?></td>

			    	<td><a class="btn btn-warning" href="<?php echo URL; ?>operadores/editar/<?php echo $row['i_codopera']; ?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL; ?>operadores/eliminar/<?php echo $row['i_codopera']; ?>">Eliminar</a>
			    	</td>
			</tr>
			<?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>
