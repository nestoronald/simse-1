<?php namespace Controllers;
	
	use Models\Usuario as Usuario;			
	use Models\Persona as Persona;			
	use Models\Area as Area;			
	use Models\Cargo as Cargo;			
	use Models\Departamento as Departamento;	
	use Models\Provincia as Provincia;	
	use Models\Distrito as Distrito;	
	
	class usuariosController{

		private $usuario;		
		private $persona;		
		private $area;		
		private $cargo;		
		private $dep;		
		private $prov;		
		private $dis;		

		public function __construct(){
			$this->usuario = new Usuario();		
			$this->persona = new Persona();		
			$this->area = new Area();		
			$this->cargo = new Cargo();		
			$this->dep = new Departamento();					
			$this->prov = new Provincia();					
			$this->dis = new Distrito();					
		}

		public function index(){
			$datos = $this->usuario->listar();						
			return $datos;			
		}

		public function agregar(){
			if(!$_POST){
				$datos = $this->dep->listar();								
				return $datos;
			}else{						
				//insertar en tabla persona
				$this->persona->set("v_numdni", $_POST['v_numdni']);
				$this->persona->set("v_apepat", $_POST['v_apepat']);
				$this->persona->set("v_apemat", $_POST['v_apemat']);
				$this->persona->set("v_nombre", $_POST['v_nombre']);
				$this->persona->set("i_codarea", $_POST['i_codarea']);
				$this->persona->set("i_codcargo", $_POST['i_codcargo']);
				$this->persona->set("v_coddep", $_POST['i_coddep']);
				$this->persona->set("v_codpro", $_POST['prv']);
				$this->persona->set("v_coddis", $_POST['dis']);				
				$this->persona->set("v_numtel", $_POST['v_numtel']);
				$this->persona->set("v_email", $_POST['v_email']);								
				$this->persona->add();
				//insertar en tabla usuario
				$persona_last = $this->verUltimaPersona();
				$this->usuario->set("i_codpersona", $persona_last["i_codpersona"]);
				$this->usuario->set("i_codrol", $_POST['i_codrol']);
				$this->usuario->set("v_usuario", $_POST['v_usuario']);
				$this->usuario->set("i_usureg", $_POST['i_usureg']);

				header("Location: " . URL . "usuarioes");				
			}
		}

		public function editar($id){
			if(!$_POST){
				$this->usuario->set("i_codusu", $id);
				$datos = $this->usuario->view();
				return $datos;
			}else{
				//Actualizar persona
				$this->persona->set("i_codpersona", $_POST['i_codpersona']);
				$this->persona->set("v_numdni", $_POST['v_numdni']);
				$this->persona->set("v_apepat", $_POST['v_apepat']);
				$this->persona->set("v_apemat", $_POST['v_apemat']);
				$this->persona->set("v_nombre", $_POST['v_nombre']);
				$this->persona->set("i_codarea", $_POST['i_codarea']);
				$this->persona->set("i_codcargo", $_POST['i_codcargo']);
				$this->persona->set("v_coddep", $_POST['i_coddep']);
				$this->persona->set("v_codpro", $_POST['prv']);
				$this->persona->set("v_coddis", $_POST['dis']);				
				$this->persona->set("v_numtel", $_POST['v_numtel']);
				$this->persona->set("v_email", $_POST['v_email']);
				$this->persona->edit();
				//Actualizar usuario				
				$this->usuario->set("i_codpersona", $_POST['i_codpersona']);
				$this->usuario->set("i_codrol", $_POST['i_codrol']);
				$this->usuario->set("v_usuario", $_POST['v_usuario']);
				$this->usuario->set("i_estreg", $_POST['i_estreg']);
				$this->usuario->edit();
				header("Location: " . URL . "usuarios");
			}
		}
		//Listar registros
			
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
			$this->usuario->set("i_codopera",$id);
			$datos = $this->usuario->view();
			return $datos;
		}
		public function verPersona($cod_persona){
			$this->persona->set("i_codpersona",$cod_persona);
			$datos = $this->persona->view();
			return $datos;
		}
		public function verUltimaPersona(){			
			$datos = $this->persona->viewLast();
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
			$this->usuario->set("i_codopera",$id);
			$this->usuario->delete();
			header("Location: " . URL . "usuarioes");
		}
}
	$usuarios = new usuariosController();

?>