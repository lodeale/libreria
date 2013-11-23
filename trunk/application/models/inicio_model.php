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

	public function getLibros($id=null){
		if(!empty($id)):
			$this->db->where("id_libro",$id);
		endif;
		$query = $this->db->get("libros");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;
	}

	public function getLibrosCompleto($id=null){
		$this->db->select("l.id_libro, autores.id_autor, autores.nombre_apellido, l.titulo, l.descripcion, l.fecha_emision, l.pagina, l.precio, l.stock, l.imagen, e.id_editorial, e.descripcion as editorial, c.id_categoria, c.descripcion as categoria");

		$this->db->from("libros as l, categoria as c, editorial as e, autores");
		$this->db->join("(SELECT l.id_libro, a.id_autor FROM libros as l JOIN libros_autores as la ON la.id_libro = l.id_libro JOIN autores as a ON a.id_autor = la.id_autor) alibro","alibro.id_libro = l.id_libro","left");
		$this->db->where("c.id_categoria = l.id_categoria");
		$this->db->where("e.id_editorial = l.id_editorial");
		$this->db->where("alibro.id_autor = autores.id_autor");

		if(!empty($id)):
			$this->db->where("l.id_libro",$id);
		endif;

		$query = $this->db->get();
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;
	}

	public function updateStockProductos($id){
		$query = $this->db->query("UPDATE libros SET stock = stock - 1 WHERE id_libro = $id");
		if ($query):
			return True;
		else:
			return False;
		endif;
		
	}

	public function getAutor($id=null){
		if(!empty($id)):
			$this->db->where("id_autor",$id);
		endif;
		$query = $this->db->get("autores");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;	
	}

	public function getAutorLibro($idlibro = null){
		if(!empty($idlibro)):
			$this->db->where("id_libro",$idlibro);
		endif;
		$query = $this->db->get("libros_autores");
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

	public function updateLibro($post){
		$this->db->set("titulo",$post["titulo"]);
		$this->db->set("descripcion",$post["descripcion"]);
		$this->db->set("id_categoria",$post["categoria"]);
		$this->db->set("id_editorial",$post["editorial"]);
		$this->db->set("fecha_emision",$post["fecha_emision"]);
		$this->db->set("pagina",$post["pagina"]);
		$this->db->set("precio",$post["precio"]);
		$this->db->set("stock",$post["stock"]);
		$this->db->where("id_libro",$post["id_libro"]);
		$query = $this->db->update("libros");
		if($query):
			return True;
		else:
			return False;
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

	public function getCategoria($id=null){
		if(!empty($id)):
			$this->db->where("id_categoria",$id);
		endif;
		$query = $this->db->get("categoria");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
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

	public function getEditorial($id=null){
		if(!empty($id)):
			$this->db->where("id_editorial",$id);
		endif;
		$query = $this->db->get("editorial");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
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
		if($query):
			return True;
		else:
			return False;
		endif;
	}

	public function getComentarios($id_libro){
		$this->db->where("id_libro = $id_libro");
		$this->db->order_by("id_comentario","desc");
		$query = $this->db->get("comentarios");
		if($query->num_rows > 0):
			return $query->result();
		else:
			return array();
		endif;
	}

	public function insertComentario($id=null,$user=null, $post){
		$this->db->set("id_usuario",$id);
		$this->db->set("id_libro",$post["id_libro"]);
		$this->db->set("nombre",$user);
		$this->db->set("comentario",$post["comentario"]);
		$this->db->set("fecha",date("Y-m-d",time()));
		$this->db->set("hora",date("H:i:s",time()));
		$query = $this->db->insert("comentarios");
		if($query):
			return True;
		else:
			return False;
		endif;
	}



}

/* End of file inicio_model.php */
/* Location: ./application/models/inicio_model.php */