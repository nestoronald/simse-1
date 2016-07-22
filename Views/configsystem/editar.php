<div class="box-principal">
<h3 class="titulo">Configuración de Archivos <?php echo $datos['i_codconfig']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Configuración de Archivos <?php echo $datos['i_codconfig']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">	  		
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label class="control-label">Descripción :</label>
				        <input class="form-control" value="<?php echo $datos['v_descrip']; ?>" name="v_descrip" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Directorio :</label>
				        <input class="form-control" value="<?php echo $datos['v_link']; ?>" name="v_link" type="text" required>
				    </div>				   
				    
				    <input value="<?php echo $datos['i_codconfig']; ?>" name="i_codconfig" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>				        
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>