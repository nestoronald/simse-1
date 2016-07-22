<?php namespace Models;
	
	class Departamento{

		private $v_coddep;
		private $v_desdep;				
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
			$sql = "SELECT v_coddep, v_desdep, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_departamento";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT v_coddep, v_desdep, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_departamento WHERE v_coddep = '{$this->v_coddep}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>