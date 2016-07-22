<?php namespace Models;
	
	class NivelGobierno{

		private $i_codnivel;
		private $v_desnivel;				
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
			$sql = "SELECT i_codnivel, v_desnivel, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_nivelgobierno";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT i_codnivel, v_desnivel, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_nivelgobierno WHERE i_codnivel = '{$this->i_codnivel}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>