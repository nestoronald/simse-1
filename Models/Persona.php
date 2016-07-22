<?php namespace Models;

	class Persona{ 			
		
		private $i_codpersona;
		private $v_numdni;
		private $v_apepat;
		private $v_apemat;
		private $v_nombre;
		private $i_codcargo;
		private $v_numtel;
		private $v_email;
		private $d_fecreg;
		private $i_usureg;
		private $d_fecmod;
		private $i_usumod;
		private $i_estreg;
		private $v_coddis;
		private $v_codpro;
		private $v_coddep;
		private $i_codarea;
		private $i_tipoper;
		private $con;
		private $limitini;
		private $limitfin;

		public function __construct(){
			$this->con = new Conexion();
			$this->limitini=510;
			$this->limitfin=525;
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "SELECT i_codpersona, v_numdni, v_apepat, v_apemat, v_nombre, i_codcargo, v_numtel, v_email, d_fecreg, i_usureg, i_estreg, v_coddis, v_codpro, v_coddep, i_codarea, i_tipoper FROM cntbc_persona ORDER BY i_codpersona ASC LIMIT $this->limitini, $this->limitfin";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		
		public function add(){
			$last_data = $this->viewLast();
			$i_codpersona_last = $last_data['i_codpersona']+1;			
			$sql = "INSERT INTO cntbc_persona(i_codpersona, v_numdni, v_apepat, v_apemat, v_nombre, i_codcargo, v_numtel, v_email, d_fecreg, i_usureg, i_estreg, v_coddis, v_codpro, v_coddep, i_codarea, i_tipoper)
					VALUES ('$i_codpersona_last', '{$this->v_numdni}', '{$this->v_apepat}', '{$this->v_apemat}', '{$this->v_nombre}', '{$this->i_codcargo}', '{$this->v_numtel}','{$this->v_email}', NOW(), '{$this->i_usureg}', '{$this->i_estreg}', '{$this->v_coddis}', '{$this->v_codpro}', '{$this->v_coddep}', '{$this->i_codarea}', '{$this->i_tipoper}' )";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_persona WHERE i_codpersona = '{$this->i_codpersona}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_persona SET v_numdni = '{$this->v_numdni}', v_apepat = '{$this->v_apepat}', v_apemat = '{$this->v_apemat}', v_nombre = '{$this->v_nombre}', i_codcargo = '{$this->i_codcargo}', v_numtel = '{$this->v_numtel}', v_email = '{$this->v_email}', i_estreg = '{$this->i_estreg}', v_coddis = '{$this->v_coddis}', v_codpro = '{$this->v_codpro}', v_coddep = '{$this->v_coddep}', i_codarea = '{$this->i_codarea}', i_tipoper = '{$this->i_tipoper}', d_fecmod = NOW()
					 WHERE i_codpersona = '{$this->i_codpersona}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT i_codpersona, v_numdni, v_apepat, v_apemat, v_nombre, i_codcargo, v_numtel, v_email, d_fecreg, i_usureg, v_coddis, v_codpro, v_coddep, i_codarea, i_tipoper FROM cntbc_persona WHERE i_codpersona = '{$this->i_codpersona}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function viewLast(){
			$sql = "SELECT i_codpersona, v_numdni, v_apepat, v_apemat, v_nombre, i_codcargo, v_numtel, v_email, d_fecreg, i_usureg, v_coddis, v_codpro, v_coddep, i_codarea, i_tipoper FROM cntbc_persona ORDER BY i_codpersona DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		
	}
?>