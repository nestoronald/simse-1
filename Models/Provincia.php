<?php namespace Models;
	
	class Provincia{

		private $v_codpro;
		private $v_coddep;
		private $v_despro;				
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
			$sql = "SELECT v_codpro, v_despro, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_provincia";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT v_codpro, v_despro, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_provincia WHERE v_codpro = '{$this->v_codpro}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function listar_prov_dep(){
			$sql = "SELECT p.v_codpro, p.v_despro, p.i_usureg, p.i_usumod, p.i_estreg FROM cntbc_provincia p INNER JOIN cntbc_departamento  d ON p.v_coddep = d.v_coddep  WHERE  p.v_coddep = '{$this->v_coddep}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}
		public function view_prov_dep(){
			$sql = "SELECT p.v_codpro, p.v_despro, p.i_usureg, p.i_usumod, p.i_estreg FROM cntbc_provincia p INNER JOIN cntbc_departamento  d ON p.v_coddep = d.v_coddep  WHERE  p.v_codpro = '{$this->v_codpro}' AND p.v_coddep = '{$this->v_coddep}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>