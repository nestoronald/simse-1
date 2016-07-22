<?php namespace Controllers;

	use Models\Encuesta as Encuesta;
	use Models\Departamento as Departamento;
	use Models\TipoOrganismo as TipoOrganismo;
	use Models\Indicador as Indicador;
	use Models\Alternativa as Alternativa;
	use Models\Respuesta as Respuesta;
	use Models\Library as Library;
	
	class encuestasController{

		private $encuesta;
		private $dep;
		private $tiporg;
		private $ind;
		private $alternativa;
		private $respuesta;
		private $lib;

		public function __construct(){
			$this->encuesta = new Encuesta();
			$this->dep = new Departamento();
			$this->tiporg = new TipoOrganismo();
			$this->ind = new Indicador();
			$this->alternativa = new Alternativa();
			$this->respuesta = new Respuesta();
			$this->lib = new Library();
		}

		public function index(){
			$datos = $this->encuesta->listar();
			return $datos;
		}
		public function editar($i_codenc){			
			if(!$_POST){				
				// $this->ind->set("i_codind", $i_codind);
				// $datos = $this->ind->view();
				$datos = $this->listarEncInd($i_codenc);
				return $datos;
			}else{
				$this->indicador->set("v_despreg", $_POST['v_despreg']);												
				$this->indicador->edit();
				header("Location: " . URL . "indicadors");
			}
			return $datos;
		}
		public function listarDep(){
			$datos = $this->dep->listar();
			return $datos;
		}
		public function listarTipOrg(){
			$datos = $this->tiporg->listar();
			return $datos;
		}
		public function listarEncInd($id){			
			$this->encuesta->set("i_codenc", $id);
			$datos = $this->encuesta->list_enc_ind();			
			return $datos;
		}
		public function listarEncIndPreg($i_codenc, $i_codind, $i_codcuest, $i_codver){			
			$this->encuesta->set("i_codenc", $i_codenc);
			$this->encuesta->set("i_codind", $i_codind);
			$this->encuesta->set("i_codcuest", $i_codcuest);
			$this->encuesta->set("i_codver", $i_codver);
			$datos = $this->encuesta->list_enc_ind_preg();			
			return $datos;
		}
		public function listarAlternativas($id_preg){			
			$this->alternativa->set("i_codpreg", $id_preg);			
			$datos = $this->alternativa->list_group();
			return $datos;
		}
		public function verRespuesta($i_codenc, $i_codpreg, $i_codalt, $i_codtiporg){
			$this->respuesta->set("i_codenc", $i_codenc);
			$this->respuesta->set("i_codpreg", $i_codpreg);			
			$this->respuesta->set("i_codalt", $i_codalt);
			$this->respuesta->set("i_codtiporg", $i_codtiporg);
			$datos = $this->respuesta->ver();
			return $datos;
		}
		public function toRoman($number){
			$this->lib->set("number", $number);
			$datos = $this->lib->to_roman();
			return $datos;
		}
	}
	$encuestas = new  encuestasController();
?>