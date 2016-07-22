<?php namespace Models;
	
	class Distrito{

		private $v_coddis;
		private $v_codpro;
		private $v_coddep;
		private $v_desdis;				
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
			$sql = "SELECT v_coddis, v_desdis, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_distrito";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function listar_dis_prov_dep(){
			$sql = "SELECT d.v_coddis, d.v_desdis, d.i_usureg, d.i_usumod, d.i_estreg FROM cntbc_distrito d INNER JOIN cntbc_departamento  dp ON d.v_coddep = dp.v_coddep INNER JOIN cntbc_provincia  p ON d.v_codpro=p.v_codpro  WHERE  d.v_codpro = '{$this->v_codpro}' AND d.v_coddep = '{$this->v_coddep}' GROUP BY d.v_coddis";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}		
		
		public function view(){
			$sql = "SELECT v_coddis, v_desdis, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, i_usumod, i_estreg FROM cntbc_distrito WHERE v_coddis = '{$this->v_coddis}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		
		public function view_dis_prov_dep(){
			$sql = "SELECT d.v_coddis, d.v_desdis, d.i_usureg, d.i_usumod, d.i_estreg FROM cntbc_distrito d INNER JOIN cntbc_departamento  dp ON d.v_coddep = dp.v_coddep INNER JOIN cntbc_provincia  p ON d.v_codpro=p.v_codpro  WHERE  d.v_coddis = '{$this->v_coddis}' AND d.v_codpro = '{$this->v_codpro}' AND d.v_coddep = '{$this->v_coddep}' GROUP BY d.v_coddis";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}		

	}

?>