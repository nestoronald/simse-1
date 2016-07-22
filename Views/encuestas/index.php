<?php		
	$datos_ind = $encuestas->listarEncInd('10'); // ecuesta VI - 2015
	$d=	mysqli_fetch_array($datos_ind);	
?>
<div class="container">
<h3 class="titulo">Encuestas <hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $d['v_desenc'] ?></h3>
	  </div>
	  <div class="panel-body">
	  	<form class="form-horizontal" name="frm" action="" method="POST" enctype="multipart/form-data">	  	
		  	
		</form>
		<div>
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>		      
		      <th>Nro</th>		            
		      <th>Indicador</th>		      		      
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
			while($row = mysqli_fetch_array($datos_ind)){ 
				$num_ind=$encuestas->toRoman($row['i_numind']);		   		
		   	?>
		   	<tr>
		   		<td><?=$row['i_numind']?></td>
		   		<td><span class="ind">INDICADOR <?=$num_ind ?> : </span> <?=$row['v_tituloind'] ?> <span class="n_preg">( 4 preguntas)</span> </td>		   		
		   		<td><a class="btn btn-warning" href="<?php echo URL; ?>encuestas/editar/<?=$row['i_codenc']?>/<?=$row['i_codind']?>/<?=$row['i_codcuest']?>/<?=$row['i_codver']?>">Editar</a></td>
		   	</tr>
		   	<?php 
		   	} 
		   	?>
		   	</tbody>
		   	</table>
		</div>
	  </div>
	</div>
</div>