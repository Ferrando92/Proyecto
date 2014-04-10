<?php
class Mlibros extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Mlibros()
	{
		$this->table="wi_libros";
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
}
?>