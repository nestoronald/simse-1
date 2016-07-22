<?php	
	$datos_dep = $reportes->listarDep();
	$datos_ind = $reportes->listarEncInd('10');	
?>
<div class="container">
<h3 class="titulo">Reportes<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Cuadro resumen de reportes</h3>
	  </div>
	  <div class="panel-body">
	  	<form class="form-horizontal" name="frm" action="" method="POST" enctype="multipart/form-data">	  	
		  	<div class="span3">
		  		<span>Periodo de encuesta</span><br>
			  	<select class="input-large">
			  		<option>Seleccione</option>
			  		<?php while($row = mysqli_fetch_array($datos)){  ?>
			  			<?php $periodo = $row["V_PERIODO"]." ".$row["V_DESFRE"]." ".$row["V_YEAR"]; ?> 
			  			<option value="<?php echo $row['I_CODENC'] ?>"><?=$periodo ?></option>
			  		<?php } ?>
			  	</select>
		  	</div>
		  	<div  class="span3">
		  		<span>Unidad de Medida: </span><br>	  		
			  	<select name="cmbunidad">
					<option value="">--- Seleccione ---</option>
					<option value="1" selected="selected">Numerico (N)</option>
					<option value="2">Porcentaje (%)</option>
				</select>
		  	</div>
		  	<div  class="span3">
		  		<span>Departamento: </span><br>
			  	<select name="dep" onChange="javascript:get_prv();" id="dep">
				  	<option value="NN">Elija uno</option> 
					    <?php while($row = mysqli_fetch_array($datos_dep)){ ?>						      	
					      	<option value="<?=$row['v_coddep']?>"><?=$row['v_desdep']?></option>
					    <?php } ?>
				</select>
		  	</div>
		  	<div  class="span3">
				<span>Provincia</span><br>					       
				<select name="prv" id="prv"> 
					<option value="NN">Elija uno</option>   												    						
				</select>
			</div>
			<div class="none">
				<span>Distrito</span><br>					       
				<select name="dis" id="dis"> 
				 <option value="NN">Elija uno</option>   						 
				</select>
			</div>
		</form>

	    <table class="table table-striped table-hover ">		  
		  <tbody>
		  	<tr>
             <td rowspan="3" valign="middle">RESULTADOS ENCUESTA</td>
			 <td align="left">Universo</td>
			 <td colspan="1">18</td>
			 <td colspan="1">25</td>
			 <td colspan="1">196</td>
			 <td colspan="1">1646</td>
			 <td colspan="1">1885</td>			 
		   </tr>
		   <tr>
			 <td align="left">Muestra</td>
			 <td colspan="1" >18</td>
			 <td colspan="1" >25</td>
			 <td colspan="1" >106</td>
			 <td colspan="1" >253</td>
			 <td >402</td>		
		   </tr>
		   <tr>
			 <td align="left">%</td>
			 <td colspan="1">100</td>
			 <td colspan="1">100</td>
			 <td colspan="1">54.08</td>
			 <td colspan="1">15.37</td>
			 <td>21.33</td>		
		   </tr>
		   <?php while($row = mysqli_fetch_array($datos_ind)){ ?>
		   	<tr>
		   		<?php 
		   			$num_ind=$reportes->toRoman($row['i_numind']);
		   			$ind_deta= $num_ind.". Indicador clave: ".$row['v_resumen'];
		   		?>
				<td colspan="2" valign="middle"><?=$ind_deta?></td>
				<td><b>Ministerio</b></td>
			    <td><b>Gobierno Regional</b></td>
				<td><b>Municipalidad Provincial</b></td>
				<td><b>Municipalidad Distrital</b></td>
				<td><b>TOTAL</b></td>
			</tr>
				<?php
					$datos_ind_enc_preg = $reportes->listarEncIndPreg($row['i_codenc'], $row['i_codind'],$row['i_codcuest'],$row['i_codver']); 
					$h=1;
				while($pregunta = mysqli_fetch_array($datos_ind_enc_preg))
				{
					$number = $row['i_numind'].".".$h.". ";
				?>
				<tr> 		       
					 <td colspan="2"> <span><?=$number?></span><?=$pregunta['v_resumen']?> </td>	    
				   	 <td>&nbsp;</td>
				   	 <td>&nbsp;</td>
				   	 <td>&nbsp;</td>
				   	 <td>&nbsp;</td>
				     <td>&nbsp;</td>   
				</tr>
				<?php
					$datos_alternativas = $reportes->listarAlternativas($pregunta['i_codpreg'],$pregunta['i_codpreg']);
					while ( $alternativa = mysqli_fetch_array($datos_alternativas))
					{ ?>
						<tr>				    
						    <td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$alternativa['v_resumen'] ?> </td>
						    <?php						    	
						    	$codorg=1; $total_col=0;
						    	while ($codorg <= 4) {
						    		$respuesta = $reportes->verRespuesta($row['i_codenc'],$pregunta['i_codpreg'],$alternativa['i_codalt'],$codorg);
						    		$total_col+=$respuesta['total'];
						    		?>
									<td><?=$respuesta['total'] ?></td>			    		
						    	<?php $codorg++;
						    	}						    	
						     ?>
						     <td><?=$total_col ?></td>    						   	
						</tr>						
					<?php
					} 
				$h++;
				}
				?>				
		   <?php } ?>
		  </tbody>
		</table> 
	  </div>
	</div>
</div>