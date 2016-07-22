<?php namespace Models;

	class Cuestionario{

		private $i_codcuest;
		private $v_descuest;
		private $i_codplan;
		private $d_fecreg;
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
			$sql = "SELECT i_codcuest, v_descuest, i_codplan, d_fecreg FROM cntbc_cuestionario ORDER BY i_codcuest ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$last_data = $this->viewLast();
			$i_codcuest_last = $last_data['I_CODCUEST']+1;			
			$sql = "INSERT INTO cntbc_cuestionario(i_codcuest, v_descuest, i_codplan, d_fecreg)
					VALUES ('$i_codcuest_last', '{$this->v_descuest}', '{$this->i_codplan}', NOW())";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_cuestionario WHERE id = '{$this->i_codcuest}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_cuestionario SET v_descuest = '{$this->v_descuest}', i_codplan = '{$this->i_codplan}'
					 WHERE i_codcuest = '{$this->i_codcuest}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codcuest, v_descuest, i_codplan, d_fecreg FROM cntbc_cuestionario WHERE i_codcuest = '{$this->i_codcuest}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT * FROM cntbc_cuestionario ORDER BY i_codcuest DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		//falta asignar a un usuario
	}
?>