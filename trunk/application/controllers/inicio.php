<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("inicio_model");
	}

	function index(){
		$data["libros"] = $this->inicio_model->getLibros();
		
		$this->load->view("include/header");
		$this->load->view("inicio_view",$data);
		$this->load->view("include/footer");
	
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
