<?php
class Mlibros extends CI_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   
	function Mlibros()
	{
		$this->table="libros";
		$this->name_id="id_libro";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_libros()
	{
		$this->db->from('libros');
		return $this->db->count_all_results();
	}
	function insert_new_article($data)
	{
		$this->db->insert('libros',$data);
		return mysql_insert_id();
	}
	function get_article_by_id($id)
	{
		//$this->db->select("*");
		$this->db->where("id_libro",$id);
		$query=$this->db->get("libros");
		return $query->result();
	}
	function get_article_by_user($id)
	{
		//$this->db->select("*");
		$this->db->where("id_usuario",$id);
		$query=$this->db->get("libros");
		return $query->result();
	}
	function count_search($search)
	{
		$this->db->like('titulo',$search);
		$query = $this->db->get('libros');
        return $query->num_rows();

	}
	function total_posts_paginados($buscador, $por_pagina, $segmento) {
        $this->db->like('titulo', $buscador);
        $consulta = $this->db->get('libros', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
	}
}
