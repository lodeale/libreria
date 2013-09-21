<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_model extends CI_Model {

	public function validLogin($post){
		$user = $post["user"];
		$pass = $post["pass"];
		$this->db->select("id_usuario, usuario, activo, privilegio");
		$this->db->from("usuarios");
		//SELECT id_usuario, usuario, activo, privilegio FROM usuarios
		// WHERE usuarios = $user OR password = $pass;
		$this->db->where("usuario",$user);
		$this->db->where("password",sha1($pass));
		$query = $this->db->get();
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;

	}

	public function getLibros(){
		//SELECT * FROM libros
		$query = $this->db->get("libros");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;
	}


	public function insertLibro($post){
		$this->db->set("titulo",$post["titulo"]);
		$this->db->set("descripcion",$post["descripcion"]);
		$query = $this->db->insert("libros");
		$last_id = $this->db->insert_id();
		if($query):
			return true;
		else:
			return false;
		endif;
	}

}

/* End of file inicio_model.php */
/* Location: ./application/models/inicio_model.php */