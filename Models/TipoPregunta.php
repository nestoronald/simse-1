<?php namespace Models;
	
	class TipoPregunta{

		private $i_codtipo;
		private $v_destipo;
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
			$sql = "SELECT * FROM cntbc_tipopregunta";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO cntbc_tipopregunta (v_destipo) VALUES ('{$this->v_destipo}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_tipopregunta WHERE i_codtipo = '{$this->i_codtipo}'";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_tipopregunta SET v_destipo = '{$this->v_destipo}' WHERE i_codtipo = '{$this->i_codtipo}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT * FROM cntbc_tipopregunta WHERE i_codtipo = '{$this->i_codtipo}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>