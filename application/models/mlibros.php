<?php
class Mlibros extends CI_Model {

	const TABLE = "libros";
	const ID_KEY = "id_libro";
	const USER_ID_KEY = "id_usuario";

	function __construct()
    {
        parent::__construct();
    }

	function count_libros()
	{
		return $this->db->from(self::TABLE)->count_all_results();
	}

	function get_article_by_id($id)
	{
		return $this->db->where(self::ID_KEY, $id)->get(self::TABLE)->result();
	}

	function get_article_by_user($userId)
	{
		return $this->db->where(self::USER_ID_KEY, $userId)->get(self::TABLE)->result();
	}

	function get_user_by_article($articleId)
	{
		return $this->db->select(self::USER_ID_KEY)
						->where(self::ID_KEY, $articleId)
						->get(self::TABLE)
						->result();
	}

	/**
		NO TESTS NO REFACTORING
	**/

	function insert_new_article($data)
	{
		$this->db->insert('libros',$data);
		return mysql_insert_id();
	}
	
	function count_search($search)
	{
		foreach ($search as $field => $value) {
			$this->db->like($field,$value);
		}
		
		$query = $this->db->get('libros');
        return $query->num_rows();

	}
	function same_autor($article, $user)
	{
		$this->db->where("id_usuario",$user);
		$this->db->where("id_libro",$article);
		$query=$this->db->get("libros");
		if($query)
			return true;
		else
			return false;
	}
	function update_article($id_libro,$insert)
	{
		$this->db->where('id_libro', $id_libro);
		$this->db->update('libros', $insert);
	}
	function delete_article($libro)
	{		
		$this->db->where("id_libro",$libro);
		if($this->db->delete("libros"))
			return true;
		else
			return false;
	}
	function total_posts_paginados($buscador, $por_pagina, $segmento) {
		
		if(isset($buscador["titulo"]))
		{
		    $this->db->like('titulo', $buscador["titulo"]);
		}

    	if(isset($buscador["descripcion"]))
    	{
        	$this->db->like('descripcion', $buscador["descripcion"]);
    	}
    	if(isset($buscador["ISBN"]))
    	{
        	$this->db->where('ISBN', $buscador["ISBN"]);
        }
    	if(isset($buscador["localidad"]))
    	{
        	$this->db->where('localidad', $buscador["localidad"]); 
    	}
    	if(isset($buscador["id_asignatura"]))
        $this->db->where('id_asignatura', $buscador['id_asignatura']); 

    	if(isset($buscador["id_curso"]))
        $this->db->where('id_curso', $buscador["id_curso"]); 

        $consulta = $this->db->get('libros', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
	}
}
