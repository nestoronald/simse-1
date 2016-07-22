<?php 
	$datos_nivgob = $operadores->listarNivelGob();
	$datos_dep = $operadores->listarDep();
?>
<div class="box-principal">
<h3 class="titulo">Agregar operadores<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un nuevo operadores</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>	  		
	  		<div class="col-md-10">
	  			<form class="form-horizontal" name="frm" action="" method="POST" enctype="multipart/form-data">	
				    <div class="form-group">
				      <label class="control-label">RUC</label>
				        <input class="form-control" name="v_numruc" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Razon Social</label>
				        <input class="form-control" name="v_desrazon" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Descripción del Operador</label>
				        <input class="form-control" name="v_desoperador" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Sigla</label>
				        <input class="form-control" name="v_sigla" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Tipo de organismo</label>				       
				      <select name="i_codtiporg" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>				      		
				      		<option value="<?=$row['i_codtiporg']?>"><?=$row['v_destiporg']?></option>				      		
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Nivel de Gobierno</label>				       
				      <select name="i_codnivel" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos_nivgob)){ ?>				      		
				      		<option value="<?=$row['i_codnivel']?>"><?=$row['v_desnivel']?></option>				      		
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Departamento</label>				       
				      <select name="i_coddep" class="form-control" onChange="javascript:get_prv();" id="dep">
				      	<?php while($row = mysqli_fetch_array($datos_dep)){ ?>				      		
				      		<option value="<?=$row['v_coddep']?>"><?=$row['v_desdep']?></option>				      		
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Provincia</label>				       
				      <select name="prv" class="form-control" onChange="javascript:get_dis();" id="prv"> 
						 <option value="NN">Elija uno</option>   												    						
				  		</select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Distrito</label>				       
				      <select name="dis" class="form-control" id="dis"> 
						 <option value="NN">Elija uno</option>   						 
				  		</select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Dirección</label>
				        <input class="form-control" name="v_direccion" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Telefono</label>
				        <input class="form-control" name="v_numtel" type="text">
				    </div>
				    <div class="form-group">
				      <label class="control-label">Correo</label>
				        <input class="form-control" name="v_email" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Fax</label>
				        <input class="form-control" name="v_numfax" type="text">
				    </div>
				    <div class="form-group">
				      <label class="control-label">Web</label>
				        <input class="form-control" name="v_web" type="text">
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