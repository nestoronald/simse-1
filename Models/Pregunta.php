<?php namespace Models;

	class Pregunta{

		private $i_codpreg;
		private $v_despreg;
		private $v_resumen;
		private $d_fecreg;
		private $i_codtipo;
		private $i_codtipclas;		
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
			$sql = "SELECT i_codpreg, v_despreg, v_resumen, d_fecreg FROM cntbd_pregunta ORDER BY i_codpreg ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$last_data = $this->viewLast();
			$i_codpreg_last = $last_data['I_CODPREG']+1;
			$i_numpreg_last = $last_data['I_NUMPREG']+1;
			$sql = "INSERT INTO cntbd_pregunta(i_codpreg, i_numpreg, v_despreg, v_resumen, d_fecreg, i_codtipo, i_codtipclas)
					VALUES ('$i_codpreg_last', '$i_numpreg_last', '{$this->v_despreg}', '{$this->v_resumen}', NOW(), '{$this->i_codtipo}', '{$this->i_codtipclas}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbd_pregunta WHERE id = '{$this->i_codpreg}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbd_pregunta SET v_despreg = '{$this->v_despreg}', v_resumen = '{$this->v_resumen}', 
					i_codtipo = '{$this->i_codtipo}', i_codtipclas = '{$this->i_codtipclas}' WHERE i_codpreg = '{$this->i_codpreg}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codpreg, i_numpreg, i_codtipo, i_codtipclas, v_despreg, v_resumen, d_fecreg FROM cntbd_pregunta WHERE i_codpreg = '{$this->i_codpreg}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT * FROM cntbd_pregunta ORDER BY i_codpreg DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>