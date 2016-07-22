<?php namespace Controllers;

	use Models\TipoPreguntaClase as TipoPreguntaClase;
	
	class tipopreguntasclasesController{

		private $tipopregclas;

		public function __construct(){
			$this->tipopregclas = new TipoPreguntaClase();
		}

		public function index(){
			$datos = $this->tipopregclas->listar();
			return $datos;
		}

		public function agregar(){
			if($_POST){
				$this->tipopregclas->set("v_destipoclas", $_POST['v_destipoclas']);
				$this->tipopregclas->add();
				header('Location: '. URL . "secciones");
			}
		}

		public function editar($id){
			if($_POST){
				$this->tipopregclas->set("i_cod_tipo", $_POST['i_cod_tipo']);
				$this->tipopregclas->set("v_destipoclas", $_POST['v_destipoclas']);
				$this->tipopregclas->edit();
				header('Location: '. URL . "tipopreguntasclases");
			}else{
				$this->tipopregclas->set("i_cod_tipo", $i_cod_tipo);
				$datos = $this->tipopregclas->view();
				return $datos;
			}
		}

		public function eliminar($i_cod_tipo){
			$this->tipopregclas->set("i_cod_tipo", $i_cod_tipo);
			$this->tipopregclas->delete();
			header('Location: '. URL . "tipopreguntasclases");
		}
	}
?>