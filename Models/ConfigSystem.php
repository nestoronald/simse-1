<?php namespace Models;
	
	class ConfigSystem{

		private $i_codconfig;
		private $v_descrip;
		private $v_link;		
		private $con;

		public function __construct(){
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "SELECT i_codconfig, v_descrip, v_link, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_configsystem";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function edit(){
			$sql = "UPDATE cntbc_configsystem SET v_descrip = '{$this->v_descrip}', v_link = '{$this->v_link}' WHERE i_codconfig = '{$this->i_codconfig}'";
			$this->con->consultaSimple($sql);
		}
		
		public function view(){
			$sql = "SELECT i_codconfig, v_descrip, v_link, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_configsystem WHERE i_codconfig = '{$this->i_codconfig}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>