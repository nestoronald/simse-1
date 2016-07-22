<?php namespace Models;
	
	class TipoPreguntaClase{

		private $i_codtipclas;
		private $v_destipoclas;
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
			$sql = "SELECT * FROM cntbc_tipopregclase";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO cntbc_tipopregclase (v_destipoclas) VALUES ('{$this->v_destipoclas}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_tipopregclase WHERE i_codtipclas = '{$this->i_codtipclas}'";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_tipopregclase SET v_destipoclas = '{$this->v_destipoclas}' WHERE i_codtipclas = '{$this->i_codtipclas}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT * FROM cntbc_tipopreguntaclase WHERE i_codtipclas = '{$this->i_codtipclas}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>