<?php namespace Models;

	class Usuario{ 			

		private $i_codusu;
		private $i_codpersona;
		private $i_codrol;
		private $v_usuario;
		private $v_password;//?
		private $v_ubigeo;		
		private $i_usureg;//?		
		private $i_usumod;
		private $i_codarchivo;
		private $i_estreg;
		private $con;
		private $limitini;
		private $limitfin;

		public function __construct(){
			$this->con = new Conexion();
			$this->limitini=380;
			$this->limitfin=400;
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "SELECT i_codusu, i_codpersona, i_codrol, v_usuario, v_ubigeo FROM cntbc_usuario ORDER BY i_codusu ASC LIMIT $this->limitini, $this->limitfin";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		//falta funcionalidad agregar password
		public function add(){
			$last_data = $this->viewLast();
			$i_codusu_last = $last_data['i_codusu']+1;			
			$sql = "INSERT INTO cntbc_usuario(i_codusu, i_codpersona, i_codrol, v_usuario, v_ubigeo, i_usureg, i_estreg, d_fecreg)
					VALUES ('$i_codusu_last', '{$this->i_codpersona}', '{$this->i_codrol}', '{$this->v_usuario}', '{$this->v_ubigeo}', '{$this->i_usureg}', '1', NOW())";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_usuario WHERE i_codusu = '{$this->i_codusu}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_usuario SET i_codpersona = '{$this->i_codpersona}', i_codrol = '{$this->i_codrol}', v_usuario = '{$this->v_usuario}', v_ubigeo = '{$this->v_ubigeo}', i_estreg = '{$this->i_estreg}', d_fecmod = NOW()
					 WHERE i_codusu = '{$this->i_codusu}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codusu, i_codpersona, i_codrol, v_usuario, v_ubigeo FROM cntbc_usuario WHERE i_codusu = '{$this->i_codusu}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT * FROM cntbc_usuario ORDER BY i_codusu DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		//falta asignar a un usuario
	}
?>