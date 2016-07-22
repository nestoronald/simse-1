<?php namespace Controllers;
	
	use Models\ConfigSystem as ConfigSystem;		
	
	class configsystemController{

		private $configsys;			

		public function __construct(){
			$this->configsys = new ConfigSystem();					
		}

		public function index(){
			$datos = $this->configsys->listar();
			return $datos;
		}

		public function editar($id){
			if(!$_POST){
				$this->configsys->set("i_codconfig", $id);
				$datos = $this->configsys->view();
				return $datos;
			}else{
				$this->configsys->set("i_codconfig", $id);				
				$this->configsys->set("v_descrip", $_POST['v_descrip']);
				$this->configsys->set("v_link", $_POST['v_link']);										
				$this->configsys->edit();
				header("Location: " . URL . "configsystem");
			}
		}					
		
}
	$configsystem = new configsystemController();

?>