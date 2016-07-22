<?php namespace Models;
	
	class Indicador{

		private $i_codind;
		private $i_numind;
		private $v_desind;
		private $i_usureg;
		private $i_codaccion;
		private $v_tituloind;
		private $v_resumen;
		private $i_codinst;
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
			$sql = "SELECT * FROM cntbd_indicador  ORDER BY i_numind ASC";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}			

		public function add(){
			$sql = "INSERT INTO cntbd_indicador (i_numind, v_desind, v_tituloind, v_resumen) VALUES ('{$this->i_numind}','{$this->v_desind}','{$this->v_tituloind}','{$this->v_resumen}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbd_indicador WHERE i_codind = '{$this->i_codind}'";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbd_indicador SET i_numind = '{$this->i_numind}', v_desind = '{$this->v_desind}', v_tituloind = '{$this->v_tituloind}', v_resumen = '{$this->v_resumen}' WHERE i_codind = '{$this->i_codind}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codind, i_numind, v_desind, d_fecreg, i_usureg, d_fecmod, i_usumod, i_estreg, i_codaccion, v_tituloind, v_resumen, i_codinst FROM cntbd_indicador WHERE i_codind = '{$this->i_codind}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>