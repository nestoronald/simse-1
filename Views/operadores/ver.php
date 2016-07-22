<div class="box-principal">
<h3 class="titulo">Pregunta <?php echo $datos['i_codpreg']; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Pregunta <?php echo $datos['i_codpreg']; ?><b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">        
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">

              <b>Cod pregunta: </b><?php echo $datos['i_codpreg']; ?>
            </li>
            <li class="list-group-item">
              <b>Pregunta: </b><?php echo $datos['v_despreg']; ?>
            </li>
            <li class="list-group-item">
              <b>Categoría: </b><?php echo $datos['v_resumen']; ?>
            </li>
            <li class="list-group-item">
              <b>Fecha de Registro: </b><?php echo $datos['d_fecreg']; ?>
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>