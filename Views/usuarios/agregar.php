<?php 
	$tipopregclas = $usuarios->listarTipousuarioClase();
?>
<div class="box-principal">
<h3 class="titulo">Agregar usuarios<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un nueva usuario</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>	  		
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">usuario</label>
				        <input class="form-control" name="v_despreg" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Descripción Resumen Reporte</label>
				        <input class="form-control" name="v_resumen" required>
				    </div>			    
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Tipo de usuario</label>	      
				      <select name="i_codtipo" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>
				      		<option value="<?php echo $row['I_CODTIPO']; ?>"><?php echo $row['V_DESTIPO']; ?></option>
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Clase de usuario</label>				        
				        <select name="i_codtipclas" class="form-control">
				      	<?php while($row = mysqli_fetch_array($tipopregclas)){ ?>				      						      		
				      		<option value="<?=$row['I_CODTIPCLAS']?>"><?=$row['V_DESTIPOCLAS']?></option>				      		
				      	<?php } ?>
				      </select>
				    </div>				   
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Registrar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>