<?php namespace Models;
	
	class Respuesta{
		private $i_codopera;
		private $i_codenc;
		private $i_codpreg;
		private $i_codalt;
		private $v_desreptex;
		private $i_index;		
		private $i_usureg;		
		private $i_usumod;
		private $i_estreg;
		/*tipo de organizacion*/
		private $i_codtiporg;
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
			$sql = "SELECT * FROM cntbd_respregunta";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}				

		public function add(){
			$sql = "INSERT INTO cntbd_respregunta (i_codopera, i_codenc, i_codpreg, i_codalt, v_desreptex, i_usumod) VALUES ('{$this->i_codopera}','{$this->i_codenc}','{$this->i_codpreg}','{$this->i_codalt}','{$this->v_desreptex}','{$this->i_usumod}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbd_respregunta WHERE i_codopera = '{$this->i_codopera}' AND i_codenc = '{$this->i_codenc}' AND i_codpreg = '{$this->i_codpreg}' ";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbd_respregunta SET i_codalt = '{$this->i_codalt}', v_desreptex = '{$this->v_desreptex}' WHERE i_codopera = '{$this->i_codopera}' AND i_codenc = '{$this->i_codenc}' AND i_codpreg = '{$this->i_codpreg}'";
			$this->con->consultaSimple($sql);
		}
		public function ver(){
			$sql = "SELECT COUNT(r.i_codalt) as total FROM cntbd_respregunta r  INNER JOIN cntbc_operador o ON o.i_codopera=r.i_codopera INNER JOIN cntbd_operaencuest oe ON oe.i_codopera=r.i_codopera AND oe.i_codenc=r.i_codenc  WHERE r.i_estreg='1' AND r.i_codenc='{$this->i_codenc}' AND r.i_codpreg='{$this->i_codpreg}' AND r.i_codalt='{$this->i_codalt}' AND o.i_codtiporg='{$this->i_codtiporg}' AND oe.i_estreg='2'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>