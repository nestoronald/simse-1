<?php 
	$datos_ind = $encuestas->listarEncInd('10');
	//$num_ind=$encuestas->toRoman($datos['i_numind']);
	$dat = mysqli_fetch_array($datos);
	//var_dump($dat);
 ?>
<div class="container">
<h3 class="titulo"><?=$dat['v_desenc']?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Indicador <span></span>: <?=$dat['v_tituloind']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row-fluid">	
	  		<form class="form-horizontal" name="frm" action="" method="POST" enctype="multipart/form-data">
				<div>
				      <label class="control-label">pregunta 1</label>
				        <input class="form-control" name="v_numruc" value="<?=$datos['v_numruc']?>" type="text" required>
				</div>				    
				<div>
				      <label class="control-label">Tipo de organismo</label>				       
				      <select name="i_codtiporg" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos_tiporg)){ ?>		
				      		<?php if ($row['i_codtiporg']==$datos['i_codtiporg']): ?>				      		
				      		<option value="<?=$row['i_codtiporg']?>" selected><?=$row['v_destiporg']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['i_codtiporg']?>"><?=$row['v_destiporg']?></option>
				      		<?php endif ?>				      		
				      	<?php } ?>
				      </select>
				</div>	
				<input value="<?php echo $datos['i_codopera']; ?>" name="i_codopera" type="hidden" required>
				<div>
				    	<button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				</div>
			</form>
	  	</div>
	  </div>
	</div>
</div>