<?php namespace Controllers;
	
	use Models\Pregunta as Pregunta;
	use Models\TipoPregunta as TipoPregunta;	
	use Models\TipoPreguntaClase as TipoPreguntaClase;	
	
	class preguntasController{

		private $pregunta;
		private $tipopregunta;
		private $tipopreguntaclase;

		public function __construct(){
			$this->pregunta = new Pregunta();
			$this->tipopregunta = new TipoPregunta();
			$this->tipopreguntaclase = new TipoPreguntaClase();
		}

		public function index(){
			$datos = $this->pregunta->listar();
			return $datos;
		}

		public function agregar(){
			if(!$_POST){
				$datos = $this->tipopregunta->listar();
				return $datos;
			}else{		
				$this->pregunta->set("v_despreg", $_POST['v_despreg']);				
				$this->pregunta->set("v_resumen", $_POST['v_resumen']);				
				$this->pregunta->set("i_codpreg", $_POST['i_codpreg']);
				$this->pregunta->set("i_codtipo", $_POST['i_codtipo']);
				$this->pregunta->set("i_codtipclas", $_POST['i_codtipclas']);
				$this->pregunta->add();
				header("Location: " . URL . "preguntas");				
			}
		}

		public function editar($id){
			if(!$_POST){
				$this->pregunta->set("i_codpreg", $id);
				$datos = $this->pregunta->view();
				return $datos;
			}else{
				$this->pregunta->set("v_despreg", $_POST['v_despreg']);				
				$this->pregunta->set("v_resumen", $_POST['v_resumen']);				
				$this->pregunta->set("i_codpreg", $_POST['i_codpreg']);
				$this->pregunta->set("i_codtipo", $_POST['i_codtipo']);
				$this->pregunta->set("i_codtipclas", $_POST['i_codtipclas']);
				$this->pregunta->edit();
				header("Location: " . URL . "preguntas");
			}
		}
		public function listarTipoPregunta(){
			$datos = $this->tipopregunta->listar();
			return $datos;
		}
		public function listarTipoPreguntaClase(){
			$datos = $this->tipopreguntaclase->listar();
			return $datos;
		}		

		public function ver($id){
			$this->pregunta->set("i_codpreg",$id);
			$datos = $this->pregunta->view();
			return $datos;
		}

		public function eliminar($id){
			$this->pregunta->set("i_codpreg",$id);
			$this->pregunta->delete();
			header("Location: " . URL . "preguntas");
		}
}
	$preguntas = new preguntasController();

?>