<?php
class Masignaturas extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
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
}
?>