<?php
class Msubjects extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Msubjects()
	{
		$this->table="subjects";
		$this->name_id="subject_id";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_subjects()
	{
		$this->db->from('subjects');
		return $this->db->count_all_results();
	}
}
?>