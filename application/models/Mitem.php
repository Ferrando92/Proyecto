<?php
class Mitems extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Mitems()
	{
		$this->table="item";
		$this->name_id="item_id";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_items()
	{
		$this->db->from('item');
		return $this->db->count_all_results();
	}
}
?>