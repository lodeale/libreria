<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper("form");
		$this->load->model("inicio_model");
	}

	function index(){
		$data["libros"] = $this->inicio_model->getLibros();
		
		$this->load->view("include/header");
		$this->load->view("inicio_view",$data);
		$this->load->view("include/footer");
	
	}

	public function login(){
		$query = $this->inicio_model->validLogin($this->input->post());
		if($query):
			$data_session = array(
					"loginTrue"=>TRUE,
					"user"=>$query[0]->usuario,
					"privilegio"=>$query[0]->privilegio,
					"activo"=>$query[0]->activo,
					"id"=>$query[0]->id_usuario
				); 
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("correcto","Bienvenido a LibEncode");
			redirect("inicio");
		else:
			$this->session->set_flashdata("error","El usuario o contraseña no es correcto");
			redirect("inicio");
		endif;
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
