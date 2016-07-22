<div class="box-principal">
<h3 class="titulo">Agregar cuestionarios<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un nuevo cuestionario</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>	  		
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">	
				    <div class="form-group">
				      <label class="control-label">Descripción cuestionario:</label>
				        <input class="form-control" name="v_descuest" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Plan de seguimiento:</label>				       
				      <select name="i_codplan" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>				      		
				      		<option value="<?=$row['I_CODPLAN']?>"><?=$row['v_sigla']?></option>				      		
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