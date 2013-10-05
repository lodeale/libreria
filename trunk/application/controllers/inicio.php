<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{


	function __construct(){
		parent::__construct();
		$this->load->helper("form");
		$this->load->model("inicio_model");
	}

	function index(){
		//Grabamos el lugar donde estamos
		$this->_setModule("index");
		$data["libros"] = $this->inicio_model->getLibros();
		$header["opcActivo"] = "inicio";

		$this->load->view("include/header",$header);
		$this->load->view("inicio_view",$data);
		$this->load->view("include/footer");
	
	}

	private function _loginTrue(){
		$login = $this->session->userdata("loginTrue");
		if( !$login ):
			$this->session->set_flashdata("error","Usted no es un usuario legitimo.");
			redirect($this->_getModule());
		endif;
	}

	private function _getAccess(){
		$p = $this->session->userdata("privilegio");
		return $p;
	}

	private function _admin(){
		if($this->_getAccess() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

	public function _setModule($name){
		$this->session->set_userdata( array( "mod"=> array("name"=>$name) ) );
	}

	public function _getModule($name){
		$mod = $this->session->userdata("mod");
		return "inicio/" . $mod["name"];
	}

	function do_upload()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->flashdata('error',$this->upload->display_errors());
			redirect($this->_getModule());
		}
		else
		{
			$this->insertLibro($this->upload->data());
		}
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
			redirect($this->_getModule());
		else:
			$this->session->set_flashdata("error","El usuario o contraseña no es correcto");
			redirect($this->_getModule());
		endif;
	}

	public function libros(){
		$this->_setModule("libros");

		$data["libros"] = $this->inicio_model->getLibros();
		$header["opcActivo"] = "libros";
		$header["admin"] = $this->_admin();

		$this->load->view("include/header",$header);
		$this->load->view("libros/libros_view",$data);
		$this->load->view("include/footer");
	}

	public function newLibros(){
		if(!$this->_admin()):
			redirect($this->_getModule());
		endif;

		$this->_setModule("newLibros");

		$header["opcActivo"] = "libros";

		$this->load->view("include/header",$header);
		$this->load->view("libros/newLibros");
		$this->load->view("include/footer");
	}

	public function insertLibro($fileUp){
		$post = $this->input->post();
		$fname = $fileUp["file_name"];

		$id_categoria = $this->inicio_model->insertCategoria($post);
		$id_editorial = $this->inicio_model->insertEditorial($post);
		$id_autor = $this->inicio_model->insertAutor($post);
		$id_libro = $this->inicio_model->insertLibro($post, $id_categoria, $id_editorial, $fname);
		$idla = $this->inicio_model->addLibrosAutores($id_libro, $id_autor);
		if($idla > 0):
			redirect($this->_getModule());
		else:
			redirect($this->_getModule());
		endif;
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect($this->_getModule());
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
