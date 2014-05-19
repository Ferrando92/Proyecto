<?php
class Masignaturas extends CI_Model {

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
	function Masignaturas()
	{
		$this->table="asignaturas";
		$this->name_id="id_asignatura";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_asignaturas()
	{
		$this->db->from('asignaturas');
		return $this->db->count_all_results();
	}
	function get_all_asignaturas()
	{
		$query = $this->db->get("asignaturas");
		return $query->result();
	}
	function get_asignaturas_by_curso($id)
	{
		$this->db->where("id_curso",$id);
		$query=$this->db->get("asignaturas");
		return $query->result();
	}
}
