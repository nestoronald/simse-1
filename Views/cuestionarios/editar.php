<?php 
	$plan = $cuestionarios->listarPlan();	
?>
<div class="box-principal">
<h3 class="titulo">Editar Cuestionario <?php echo $datos['i_codcuest']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar cuestionario <?php echo $datos['i_codcuest']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">	  		
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label class="control-label">Descripción cuestionario:</label>
				        <input class="form-control" value="<?php echo $datos['v_descuest']; ?>" name="v_descuest" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Plan de seguimiento:</label>				       
				      <select name="i_codplan" class="form-control">
				      	<?php while($row = mysqli_fetch_array($plan)){ ?>				      		
				      		<?php if ($row['i_codplan']==$datos['i_codplan']): ?>
				      		<option value="<?=$row['i_codplan']?>"  selected><?=$row['v_sigla']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['i_codplan']?>"><?=$row['v_sigla']?></option>
				      		<?php endif ?>
				      	<?php } ?>
				      </select>
				    </div>
				    
				    <input value="<?php echo $datos['i_codcuest']; ?>" name="i_codcuest" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>