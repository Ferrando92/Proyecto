<?php
class Mcursos extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Mcursos()
	{
		$this->table="cursos";
		$this->name_id="id_curso";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_cursos()
	{
		$this->db->from('cursos');
		return $this->db->count_all_results();
	}
}
?>