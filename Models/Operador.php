<?php namespace Models;

	class Operador{ 			

		private $i_codopera;
		private $v_numruc;
		private $v_desrazon;
		private $v_desoperador;
		private $v_sigla;
		private $i_codtiporg;
		private $i_codnivel;
		private $v_coddis;
		private $v_codpro;
		private $v_coddep;
		private $v_direccion;
		private $v_numtel;
		private $v_numfax;
		private $v_email;
		private $v_web;
		private $d_fecreg;
		private $i_usureg;
		private $d_fecmod;
		private $i_usumod;
		private $i_estreg;
		private $con;
		private $limitini;
		private $limitfin;

		public function __construct(){
			$this->con = new Conexion();
			$this->limitini=0;
			$this->limitfin=10;
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "SELECT i_codopera, v_numruc, v_desrazon, v_desoperador, v_sigla, i_codtiporg, i_codnivel, v_coddep, v_codpro, v_coddis, v_direccion, v_numtel, v_email, v_numfax, v_web, i_estreg FROM cntbc_operador ORDER BY i_codopera ASC LIMIT $this->limitini, $this->limitfin";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$last_data = $this->viewLast();
			$i_codopera_last = $last_data['I_CODOPERA']+1;			
			$sql = "INSERT INTO cntbc_operador(i_codopera, v_numruc, v_desrazon, v_desoperador, v_sigla, i_codtiporg, i_codnivel, v_coddep, v_codpro, v_coddis, v_direccion, v_numtel, v_email, v_numfax, v_web, i_estreg, d_fecreg)
					VALUES ('$i_codopera_last', '{$this->v_numruc}', '{$this->v_desrazon}', '{$this->v_desoperador}', '{$this->v_sigla}', '{$this->i_codtiporg}', '{$this->i_codnivel}', '{$this->v_coddep}', '{$this->v_codpro}', '{$this->v_coddis}', '{$this->v_direccion}', '{$this->v_numtel}', '{$this->v_email}', '{$this->v_numfax}', '{$this->v_web}', '1', NOW())";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_operador WHERE i_codopera = '{$this->i_codopera}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_operador SET v_numruc = '{$this->v_numruc}', v_desrazon = '{$this->v_desrazon}', v_desoperador = '{$this->v_desoperador}', v_sigla = '{$this->v_sigla}', i_codtiporg= '{$this->i_codtiporg}', i_codnivel = '{$this->i_codnivel}', v_coddep = '{$this->v_coddep}', v_codpro='{$this->v_codpro}', v_coddis = '{$this->v_coddis}', v_direccion = '{$this->v_direccion}', v_numtel = '{$this->v_numtel}', v_email = '{$this->v_email}', v_numfax = '{$this->v_numfax}', v_web = '{$this->v_web}', i_estreg = '{$this->i_estreg}', d_fecmod = NOW()
					 WHERE i_codopera = '{$this->i_codopera}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codopera, v_numruc, v_desrazon, v_desoperador, v_sigla, i_codnivel, i_codtiporg, v_coddis, v_codpro, v_coddep, v_direccion, v_numtel, v_email, v_numfax, v_web, i_estreg FROM cntbc_operador WHERE i_codopera = '{$this->i_codopera}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT * FROM cntbc_operador ORDER BY i_codopera DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		//falta asignar a un usuario
	}
?>