<?php namespace Controllers;
	
	use Models\PlanSeguimiento as PlanSeguimiento;		
	
	class planseguimientosController{

		private $plansegui;			

		public function __construct(){
			$this->plansegui = new PlanSeguimiento();					
		}

		public function index(){
			$datos = $this->plansegui->listar();
			return $datos;
		}

		public function agregar(){
			if(!$_POST){
				//$datos = $this->plan->listar();
				//return $datos;
			}else{						
				$this->plansegui->set("v_desplan", $_POST['v_desplan']);
				$this->plansegui->set("v_sigla", $_POST['v_sigla']);
				$this->plansegui->set("d_fecini", $_POST['d_fecini']);
				$this->plansegui->set("d_fecfin", $_POST['d_fecfin']);
				$this->plansegui->set("d_fecreg", $_POST['d_fecreg']);
				$this->plansegui->add();
				header("Location: " . URL . "planseguimientos");				
			}
		}

		public function editar($id){
			if(!$_POST){
				$this->plansegui->set("i_codplan", $id);
				$datos = $this->plansegui->view();
				return $datos;
			}else{
				$this->plansegui->set("i_codplan", $_POST['i_codplan']);
				$this->plansegui->set("v_desplan", $_POST['v_desplan']);
				$this->plansegui->set("v_sigla", $_POST['v_sigla']);
				$this->plansegui->set("d_fecini", $_POST['d_fecini']);
				$this->plansegui->set("d_fecfin", $_POST['d_fecfin']);							
				$this->plansegui->edit();
				header("Location: " . URL . "planseguimientos");
			}
		}					

		public function ver($id){
			$this->plansegui->set("i_codplan",$id);
			$datos = $this->plansegui->view();
			return $datos;
		}

		public function eliminar($id){
			$this->plansegui->set("i_codplan",$id);
			$this->plansegui->delete();
			header("Location: " . URL . "planseguimientos");
		}
}
	$planseguimientos = new planseguimientosController();

?>