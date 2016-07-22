<?php 
	$tipopreguntas = $preguntas->listarTipoPregunta();
	$tipopregclas = $preguntas->listarTipoPreguntaClase(); 
?>
<div class="box-principal">
<h3 class="titulo">Editar Pregunta <?php echo $datos['i_numpreg']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar pregunta <?php echo $datos['i_numpreg']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">	  		
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label class="control-label">Descripción Resumen Reporte:</label>
				        <input class="form-control" value="<?php echo $datos['v_despreg']; ?>" name="v_despreg" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Descripción Pregunta: </label>
				        <input class="form-control" value="<?php echo $datos['v_resumen']; ?>" name="v_resumen" required>
				    </div>				   
				    <div class="form-group">
				      <label class="control-label">Tipo Pregunta </label>
				      <select name="i_codtipo" class="form-control">
				      	<?php while($row = mysqli_fetch_array($tipopreguntas)){ ?>				      		
				      		<?php if ($row['I_CODTIPO']==$datos['i_codtipo']): ?>
				      		<option value="<?=$row['I_CODTIPO']?>"  selected><?=$row['V_DESTIPO']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['I_CODTIPO']?>"><?=$row['V_DESTIPO']?></option>
				      		<?php endif ?>
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Clase Pregunta:</label>				       
				      <select name="i_codtipclas" class="form-control">
				      	<?php while($row = mysqli_fetch_array($tipopregclas)){ ?>				      		
				      		<?php if ($row['I_CODTIPCLAS']==$datos['i_codtipclas']): ?>
				      		<option value="<?=$row['I_CODTIPCLAS']?>"  selected><?=$row['V_DESTIPOCLAS']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['I_CODTIPCLAS']?>"><?=$row['V_DESTIPOCLAS']?></option>
				      		<?php endif ?>
				      	<?php } ?>
				      </select>
				    </div>
				    <input value="<?php echo $datos['i_codpreg']; ?>" name="i_codpreg" type="hidden" required>
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