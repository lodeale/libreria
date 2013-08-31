<?php

class Inicio extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view("include/header");
		$this->load->view("inicio_view");
		$this->load->view("include/footer");
	
	}
}

?>