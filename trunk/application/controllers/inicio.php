<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper("form");
		$this->load->model("inicio_model");
	}

	function index(){
		$data["libros"] = $this->inicio_model->getLibros();
		$header["opcActivo"] = "inicio";

		$this->load->view("include/header",$header);
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

	public function libros(){
		$data["libros"] = $this->inicio_model->getLibros();
		$header["opcActivo"] = "libros";

		$this->load->view("include/header",$header);
		$this->load->view("libros/libros_view",$data);
		$this->load->view("include/footer");
	}

	public function newLibros(){
		$header["opcActivo"] = "libros";

		$this->load->view("include/header",$header);
		$this->load->view("libros/newLibros");
		$this->load->view("include/footer");
	}

	public function insertLibro(){
		$post = $this->input->post();
		$query = $this->inicio_model->insertLibro($post);
		if($query):
			redirect("inicio/libros");
		else:
			redirect("inicio/newLibros");
		endif;
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect("inicio");
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
