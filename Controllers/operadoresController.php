<?php namespace Controllers;
	
	use Models\Operador as Operador;	
	use Models\TipoOrganismo as TipoOrganismo;	
	use Models\NivelGobierno as NivelGobierno;	
	use Models\Departamento as Departamento;	
	use Models\Provincia as Provincia;	
	use Models\Distrito as Distrito;	
	
	class operadoresController{

		private $operador;		
		private $nivgob;		
		private $dep;		
		private $prov;		
		private $dis;		

		public function __construct(){
			$this->operador = new Operador();					
			$this->tiporg = new TipoOrganismo();					
			$this->nivgob = new NivelGobierno();					
			$this->dep = new Departamento();					
			$this->prov = new Provincia();					
			$this->dis = new Distrito();					
		}

		public function index(){
			$datos = $this->operador->listar();						
			return $datos;			
		}

		public function agregar(){
			if(!$_POST){
				$datos = $this->tiporg->listar();								
				return $datos;
			}else{						
				$this->operador->set("v_numruc", $_POST['v_numruc']);
				$this->operador->set("v_desrazon", $_POST['v_desrazon']);
				$this->operador->set("v_desoperador", $_POST['v_desoperador']);
				$this->operador->set("v_sigla", $_POST['v_sigla']);
				$this->operador->set("i_codtiporg", $_POST['i_codtiporg']);
				$this->operador->set("i_codnivel", $_POST['i_codnivel']);
				$this->operador->set("v_coddep", $_POST['i_coddep']);
				$this->operador->set("v_codpro", $_POST['prv']);
				$this->operador->set("v_coddis", $_POST['dis']);
				$this->operador->set("v_direccion", $_POST['v_direccion']);
				$this->operador->set("v_numtel", $_POST['v_numtel']);
				$this->operador->set("v_email", $_POST['v_email']);
				$this->operador->set("v_numfax", $_POST['v_numfax']);
				$this->operador->set("v_web", $_POST['v_web']);
				$this->operador->add();
				header("Location: " . URL . "operadores");				
			}
		}

		public function editar($id){
			if(!$_POST){
				$this->operador->set("i_codopera", $id);
				$datos = $this->operador->view();
				return $datos;
			}else{
				$this->operador->set("i_codopera", $_POST['i_codopera']);
				$this->operador->set("v_numruc", $_POST['v_numruc']);
				$this->operador->set("v_desrazon", $_POST['v_desrazon']);
				$this->operador->set("v_desoperador", $_POST['v_desoperador']);
				$this->operador->set("v_sigla", $_POST['v_sigla']);
				$this->operador->set("i_codtiporg", $_POST['i_codtiporg']);
				$this->operador->set("i_codnivel", $_POST['i_codnivel']);
				$this->operador->set("v_coddep", $_POST['dep']);
				$this->operador->set("v_codpro", $_POST['prv']);
				$this->operador->set("v_coddis", $_POST['dis']);
				$this->operador->set("v_direccion", $_POST['v_direccion']);
				$this->operador->set("v_numtel", $_POST['v_numtel']);
				$this->operador->set("v_email", $_POST['v_email']);
				$this->operador->set("v_numfax", $_POST['v_numfax']);
				$this->operador->set("v_web", $_POST['v_web']);				
				$this->operador->edit();
				header("Location: " . URL . "operadores");
			}
		}
		//Listar registros
		public function listarTipOrg(){
			$datos = $this->tiporg->listar();
			return $datos;
		}
		public function listarNivelGob(){
			$datos = $this->nivgob->listar();
			return $datos;
		}
		public function listarDep(){
			$datos = $this->dep->listar();
			return $datos;
		}
		public function listarProv(){
			$datos = $this->dep->listar();
			return $datos;
		}
		public function listarProvDep($coddep){
			$this->prov->set("v_coddep",$coddep);
			$datos = $this->prov->listar_prov_dep();
			return $datos;
		}
		public function listarDis(){
			$datos = $this->dis->listar();
			return $datos;
		}
		public function listarDisProvDep($coddep, $codpro){
			$this->dis->set("v_coddep",$coddep);
			$this->dis->set("v_codpro",$codpro);
			$datos = $this->dis->listar_dis_prov_dep();
			return $datos;
		}
		// ver registro unico
		public function ver($id){
			$this->operador->set("i_codopera",$id);
			$datos = $this->operador->view();
			return $datos;
		}
		public function verDep($id){			
			$this->dep->set("v_coddep",$id);
			$datos = $this->dep->view();
			return $datos;
		}
		public function verProvDep($i_dep, $i_prov){
			$this->prov->set("v_coddep", $i_dep);
			$this->prov->set("v_codpro", $i_prov);			
			$datos = $this->prov->view_prov_dep();
			return $datos;
		}
		public function verDisProvDep($i_dep, $i_prov, $i_dis){
			$this->dis->set("v_coddep", $i_dep);
			$this->dis->set("v_codpro", $i_prov);
			$this->dis->set("v_coddis", $i_dis);			
			$datos = $this->dis->view_dis_prov_dep();
			return $datos;
		}

		public function eliminar($id){
			$this->operador->set("i_codopera",$id);
			$this->operador->delete();
			header("Location: " . URL . "operadores");
		}
}
	$operadores = new operadoresController();

?>