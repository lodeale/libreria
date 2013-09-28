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


	public function insertLibro($post, $id_c, $id_e, $image){
		$this->db->set("titulo",$post["titulo"]);
		$this->db->set("descripcion",$post["descripcion"]);
		$this->db->set("id_categoria",$id_c);
		$this->db->set("id_editorial",$id_c);
		$this->db->set("fecha_emision",$post["fecha_emision"]);
		$this->db->set("pagina",$post["pagina"]);
		$this->db->set("precio",$post["precio"]);
		$this->db->set("stock",$post["stock"]);
		$this->db->set("imagen",$image);
		$query = $this->db->insert("libros");
		$last_id = $this->db->insert_id();
		if($last_id > 0):
			return $last_id;
		else:
			return false;
		endif;
	}

	public function insertCategoria($post){
		$this->db->set("descripcion",$post["categoria"]);
		$query = $this->db->insert("categoria");
		$last_id = $this->db->insert_id();
		if($last_id > 0):
			return $last_id;
		else:
			return false;
		endif;
	}

	public function insertEditorial($post){
		$this->db->set("descripcion",$post["editorial"]);
		$query = $this->db->insert("editorial");
		$last_id = $this->db->insert_id();
		if($last_id > 0):
			return $last_id;
		else:
			return false;
		endif;
	}

	public function insertAutor($post){
		$this->db->set("nombre_apellido",$post["autor"]);
		$query = $this->db->insert("autores");
		$last_id = $this->db->insert_id();
		if($last_id > 0):
			return $last_id;
		else:
			return false;
		endif;
	}

	public function addLibrosAutores($idL,$idA){
		$this->db->set("id_libro",$idL);
		$this->db->set("id_autor",$idA);
		$query = $this->db->insert("libros_autores");
		$last_id = $this->db->insert_id();
		if($last_id > 0):
			return $last_id;
		else:
			return false;
		endif;
	}



}

/* End of file inicio_model.php */
/* Location: ./application/models/inicio_model.php */