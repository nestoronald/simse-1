<?php namespace Models;
	
	class Alternativa{
		private $i_codalt;
		private $v_desalt;
		private $v_resumen;
		private $i_codpreg;
		private $v_orienta;
		private $i_clave;		
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
			$sql = "SELECT * FROM cntbd_alternativa";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function list_group(){
			$sql = "SELECT a.v_desalt, a.v_resumen, count(a.i_codalt), a.i_codalt FROM cntbd_alternativa a WHERE a.i_estreg=1 AND a.i_codpreg='{$this->i_codpreg}' AND a.v_resumen is not null GROUP BY a.v_resumen ORDER BY a.v_resumen ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}		

		public function add(){
			$sql = "INSERT INTO cntbd_alternativa (i_codalt, v_desalt, v_resumen, i_usumod) VALUES ('{$this->i_codalt}','{$this->v_desalt}','{$this->v_resumen}','{$this->i_usumod}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbd_alternativa WHERE i_codalt = '{$this->i_codalt}' ";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbd_alternativa SET v_desalt = '{$this->v_desalt}', v_resumen = '{$this->v_resumen}' WHERE i_codalt = '{$this->i_codalt}'";
			$this->con->consultaSimple($sql);
		}

	}

?>