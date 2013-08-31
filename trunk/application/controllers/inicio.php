<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
	}

	function index(){
		$this->load->view("include/header");
		$this->load->view("inicio_view");
		$this->load->view("include/footer");
	
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */