<div class="box-principal">
<h3 class="titulo">Editar Plan de Seguimiento <?php echo $datos['i_codplan']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Plan de seguimiento <?php echo $datos['i_codplan']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">	  		
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Descripción Plan</label>
				        <input class="form-control" name="v_desplan" type="text" value="<?=$datos['v_desplan']?>" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Sigla</label>
				        <input class="form-control" name="v_sigla" type="text" value="<?=$datos['v_sigla']?>" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Fecha de Inicio</label>
				        <input class="form-control" name="d_fecini" type="text" value="<?=$datos['d_fecini']?>" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Fecha de Fin</label>
				        <input class="form-control" name="d_fecfin" type="text" value="<?=$datos['d_fecfin']?>" required>
				    </div>				    				    				   
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Registrar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>
