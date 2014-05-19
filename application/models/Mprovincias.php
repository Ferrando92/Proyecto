<?php
class Mprovincias extends CI_Model {

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
	function Mprovincias()
	{
		$this->table="provincias";
		$this->name_id="id_provincia";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_provincias()
	{
		$this->db->from('provincias');
		return $this->db->count_all_results();
	}
	function get_all_provincias()
	{
		$query = $this->db->get("provincias");
		return $query->result();
	}
}