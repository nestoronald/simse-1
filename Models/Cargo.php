<?php namespace Models;
	
	class Cargo{
		
		private $i_codcargo;
		private $v_descargo;		
		private $i_usureg;		
		private $i_usumod;
		private $i_estreg;				
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
			$sql = "SELECT i_codcargo, v_descargo, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_cargo";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT i_codcargo, v_descargo, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_cargo WHERE i_codcargo = '{$this->i_codcargo}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>