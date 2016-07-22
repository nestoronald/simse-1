<?php namespace Models;
	
	class TipoOrganismo{

		private $i_codtiporg;
		private $v_destiporg;				
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
			$sql = "SELECT i_codtiporg, v_destiporg, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg, v_abrev FROM cntbc_tiporganismo";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT i_codtiporg, v_destiporg, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg, v_abrev FROM cntbc_tiporganismo WHERE i_codtiporg = '{$this->i_codtiporg}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>