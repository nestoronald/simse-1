<?php namespace Controllers;

	use Models\TipoPregunta as TipoPregunta;
	
	class tipopreguntasController{

		private $tipopreguntas;

		public function __construct(){
			$this->tipopreguntas = new TipoPregunta();
		}

		public function index(){
			$datos = $this->tipopreguntas->listar();
			return $datos;
		}

		public function agregar(){
			if($_POST){
				$this->tipopreguntas->set("v_destipo", $_POST['v_destipo']);
				$this->tipopreguntas->add();
				header('Location: '. URL . "secciones");
			}
		}

		public function editar($id){
			if($_POST){
				$this->tipopreguntas->set("i_cod_tipo", $_POST['i_cod_tipo']);
				$this->tipopreguntas->set("v_destipo", $_POST['v_destipo']);
				$this->tipopreguntas->edit();
				header('Location: '. URL . "tipopreguntas");
			}else{
				$this->tipopreguntas->set("i_cod_tipo", $i_cod_tipo);
				$datos = $this->tipopreguntas->view();
				return $datos;
			}
		}

		public function eliminar($i_cod_tipo){
			$this->tipopreguntas->set("i_cod_tipo", $i_cod_tipo);
			$this->tipopreguntas->delete();
			header('Location: '. URL . "tipopreguntas");
		}
	}
?>