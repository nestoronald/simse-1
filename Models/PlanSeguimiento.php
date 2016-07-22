<?php namespace Models;
	
	class PlanSeguimiento{

		private $i_codplan;
		private $v_desplan;
		private $v_sigla;
		private $d_fecini;
		private $d_fecfin;
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
			$sql = "SELECT i_codplan, v_desplan, v_sigla, v_mision, v_vision, DATE_FORMAT(`D_FECINI` , '%d/%m/%Y' ) as d_fecini, DATE_FORMAT(`D_FECFIN` , '%d/%m/%Y' ) as d_fecfin, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, DATE_FORMAT(`D_FECMOD` , '%d/%m/%Y' ) as d_fecmod, i_usumod, i_estreg FROM cntbc_planseguimi";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$last_data = $this->viewLast();
			$i_codplan_last = $last_data['I_CODPLAN']+1;
			$sql = "INSERT INTO cntbc_planseguimi (i_codplan, v_desplan, v_sigla, d_fecini, d_fecfin, d_fecreg) VALUES ('$i_codplan_last', '{$this->v_desplan}', '{$this->v_sigla}', '{$this->d_fecini}', '{$this->d_fecfin}', NOW())";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_planseguimi WHERE i_codplan = '{$this->i_codplan}'";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_planseguimi SET v_desplan = '{$this->v_desplan}', v_sigla = '{$this->v_sigla}', d_fecini = '{$this->d_fecini}', d_fecfin = '{$this->d_fecfin}' WHERE i_codplan = '{$this->i_codplan}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codplan, v_desplan, v_sigla, v_mision, v_vision, DATE_FORMAT(`D_FECINI` , '%d/%m/%Y' ) as d_fecini, DATE_FORMAT(`D_FECFIN` , '%d/%m/%Y' ) as d_fecfin, DATE_FORMAT(`D_FECREG` , '%d/%m/%Y' ) as d_fecreg, i_usureg, DATE_FORMAT(`D_FECMOD` , '%d/%m/%Y' ) as d_fecmod, i_usumod, i_estreg FROM cntbc_planseguimi WHERE i_codplan = '{$this->i_codplan}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT * FROM cntbc_planseguimi ORDER BY i_codplan DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>