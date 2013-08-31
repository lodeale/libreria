<?php

class Inicio extends CI_Controller{
	/*
	* tarea:
	* crear base de datos: libencode.
	* Generar tabla usuarios:
		campos: id_usuario, usuario, password, privilegio, activo
	  Generar tabla persona:
	  	campos: id_persona, nombre, apellido, direccion, provincia, tel, email,
	  			dni.
	*/

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

?>