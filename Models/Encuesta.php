<?php namespace Models;
	
	class Encuesta{

		private $i_codenc;
		private $i_codcuest;
		private $i_codver;
		private $v_desenc;
		/*tablas relacionadas*/
		private $i_codind;		

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
			$sql = "SELECT * FROM cntbc_encuesta e INNER JOIN cntbc_frecuencia f ON f.i_codfre = e.i_codfre";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function list_enc_ind(){			
			$sql = "SELECT e.i_codenc,e.i_codind,i.i_numind,i.v_desind,i.v_tituloind,i.v_resumen,en.i_codcuest,en.i_codver,en.v_desenc FROM cntbd_encuestaind e  INNER JOIN cntbd_indicador i ON i.i_codind = e.i_codind
			INNER JOIN cntbc_encuesta en ON en.i_codenc = e.i_codenc WHERE e.i_codenc='{$this->i_codenc}' GROUP BY e.i_codenc,e.i_codind,i.i_numind,i.v_desind,i.v_tituloind,i.v_resumen ORDER BY i.i_numind ASC";			  
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function list_enc_ind_preg(){			
			$sql = "SELECT p.i_codpreg,p.v_despreg,t.v_campo,p.i_codtipo,p.v_resumen,e.i_clave
	                           FROM cntbd_estructcuest e
		                       INNER JOIN cntbd_encuestaind ei ON ei.i_codind = e.i_codind AND ei.i_codpreg = e.i_codpreg
		                       INNER JOIN cntbd_pregunta p ON p.i_codpreg=e.i_codpreg
							   INNER JOIN cntbc_tipopregunta t ON t.i_codtipo=p.i_codtipo
	                           WHERE e.i_estreg IN (1,2) AND e.i_codind='{$this->i_codind}' AND ei.i_codenc='{$this->i_codenc}' AND e.i_codcuest='{$this->i_codcuest}' AND e.i_codver='{$this->i_codver}'
                	           ORDER BY p.i_codpreg ASC";            			  
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function list_enc_pregun_alter_org(){
			$sql = "SELECT COUNT(r.i_codalt) FROM cntbd_respregunta r  INNER JOIN cntbc_operador o ON o.i_codopera=r.i_codopera INNER JOIN cntbd_operaencuest oe ON oe.i_codopera=r.i_codopera AND oe.i_codenc=r.i_codenc  WHERE r.i_estreg='1' AND r.i_codenc='{$this->i_codenc}' AND r.i_codpreg='1' AND r.i_codalt='1' AND o.i_codtiporg='4' AND oe.i_estreg='2'";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO cntbc_encuesta (v_destipo) VALUES ('{$this->v_destipo}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM cntbc_encuesta WHERE i_codenc = '{$this->i_codenc}'";
			$this->con->consultaRetorno($sql);
		}

		public function edit(){
			$sql = "UPDATE cntbc_encuesta SET v_destipo = '{$this->v_destipo}' WHERE i_codenc = '{$this->i_codenc}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT * FROM cntbc_encuesta WHERE i_codenc = '{$this->i_codenc}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>