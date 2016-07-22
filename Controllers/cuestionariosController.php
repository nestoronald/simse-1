<?php namespace Controllers;
	
	use Models\Cuestionario as Cuestionario;
	use Models\PlanSeguimiento as PlanSeguimiento;		
	
	class cuestionariosController{

		private $cuestionario;
		private $plan;		

		public function __construct(){
			$this->cuestionario = new Cuestionario();
			$this->plan = new PlanSeguimiento();			
		}

		public function index(){
			$datos = $this->cuestionario->listar();
			return $datos;
		}

		public function agregar(){
			if(!$_POST){
				$datos = $this->plan->listar();
				return $datos;
			}else{						
				$this->cuestionario->set("v_descuest", $_POST['v_descuest']);
				$this->cuestionario->set("i_codplan", $_POST['i_codplan']);
				$this->cuestionario->add();
				header("Location: " . URL . "cuestionarios");				
			}
		}

		public function editar($id){
			if(!$_POST){
				$this->cuestionario->set("i_codcuest", $id);
				$datos = $this->cuestionario->view();
				return $datos;
			}else{
				$this->cuestionario->set("i_codcuest", $_POST['i_codcuest']);
				$this->cuestionario->set("v_descuest", $_POST['v_descuest']);
				$this->cuestionario->set("i_codplan", $_POST['i_codplan']);				
				$this->cuestionario->edit();
				header("Location: " . URL . "cuestionarios");
			}
		}
		public function listarPlan(){
			$datos = $this->plan->listar();
			return $datos;
		}			

		public function ver($id){
			$this->cuestionario->set("i_codcuest",$id);
			$datos = $this->cuestionario->view();
			return $datos;
		}

		public function eliminar($id){
			$this->cuestionario->set("i_codcuest",$id);
			$this->cuestionario->delete();
			header("Location: " . URL . "cuestionarios");
		}
}
	$cuestionarios = new cuestionariosController();

?>