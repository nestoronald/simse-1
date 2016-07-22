<?php 
	$datos_tiporg = $operadores->listarTipOrg();
	$datos_nivgob = $operadores->listarNivelGob();
	$datos_dep = $operadores->listarDep();	
	$prov_dep = $operadores->listarProvDep($datos['v_coddep']);	
	$dis_prov_dep = $operadores->listarDisProvDep($datos['v_coddep'],$datos['v_codpro']);	
?>
<div class="box-principal">
<h3 class="titulo">Editar Operador <?php echo $datos['i_codopera']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Operador <?php echo $datos['i_codopera']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">	  		
	  		<div class="col-md-9">
	  			<form class="form-horizontal" name="frm" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label class="control-label">RUC</label>
				        <input class="form-control" name="v_numruc" value="<?=$datos['v_numruc']?>" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Razon Social</label>
				        <input class="form-control" name="v_desrazon" value="<?=$datos['v_desrazon']?>" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Descripción del Operador</label>
				        <input class="form-control" name="v_desoperador" value="<?=$datos['v_desoperador']?>" type="text" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Sigla</label>
				        <input class="form-control" name="v_sigla" value="<?=$datos['v_sigla']?>" type="text" required>
				    </div>
				    <div class="form-group">
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
				    <div class="form-group">
				      <label class="control-label">Nivel de Gobierno</label>				       
				      <select name="i_codnivel" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos_nivgob)){ ?>		
				      		<?php if ($row['i_codnivel']==$datos['i_codnivel']): ?>				      		
				      		<option value="<?=$row['i_codnivel']?>" selected><?=$row['v_desnivel']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['i_codnivel']?>"><?=$row['v_desnivel']?></option>
				      		<?php endif ?>				      		
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Departamento</label>				       
				      <select name="dep" class="form-control" onChange="javascript:get_prv();" id="dep">
				      	<option value="NN">Elija uno</option> 
				      	<?php while($row = mysqli_fetch_array($datos_dep)){ ?>		
				      		<?php if ($row['v_coddep']==$datos['v_coddep']): ?>				      		
				      		<option value="<?=$row['v_coddep']?>" selected><?=$row['v_desdep']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['v_coddep']?>"><?=$row['v_desdep']?></option>
				      		<?php endif ?>				      		
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Provincia</label>				       
				      <select name="prv" class="form-control" onChange="javascript:get_dis();" id="prv">
				      	<option value="NN">Elija uno</option> 
						<?php while($row = mysqli_fetch_array($prov_dep)){ ?>		
				      		<?php if ($row['v_codpro']==$datos['v_codpro']): ?>				      		
				      		<option value="<?=$row['v_codpro']?>" selected><?=$row['v_despro']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['v_codpro']?>"><?=$row['v_despro']?></option>
				      		<?php endif ?>				      		
				      	<?php } ?>  												    						
				  	  </select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Distrito</label>				       
				      <select name="dis" class="form-control" id="dis"> 
						 <option value="NN">Elija uno</option>
						 <?php while($row = mysqli_fetch_array($dis_prov_dep)){ ?>		
				      		<?php if ($row['v_coddis']==$datos['v_coddis']): ?>				      		
				      		<option value="<?=$row['v_coddis']?>" selected><?=$row['v_desdis']?></option>
				      		<?php else: ?>
				      		<option value="<?=$row['v_coddis']?>"><?=$row['v_desdis']?></option>
				      		<?php endif ?>
				      	 <?php } ?>    						 
				  		</select>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Dirección</label>
				        <input class="form-control" name="v_direccion" type="text" value="<?=$datos['v_direccion']?>" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Telefono</label>
				        <input class="form-control" name="v_numtel" type="text" value="<?=$datos['v_numtel']?>">
				    </div>
				    <div class="form-group">
				      <label class="control-label">Correo</label>
				        <input class="form-control" name="v_email" type="text" value="<?=$datos['v_email']?>" required>
				    </div>
				    <div class="form-group">
				      <label class="control-label">Fax</label>
				        <input class="form-control" name="v_numfax" type="text" value="<?=$datos['v_numfax']?>">
				    </div>
				    <div class="form-group">
				      <label class="control-label">Web</label>
				        <input class="form-control" name="v_web" type="text" value="<?=$datos['v_web']?>">
				    </div>
				    
				    <input value="<?php echo $datos['i_codopera']; ?>" name="i_codopera" type="hidden" required>
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