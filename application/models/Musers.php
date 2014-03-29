<?php
class Musers extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Musers()
	{
		$this->table="users";
		$this->name_id="user_id";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_users()
	{
		$this->db->from('users');
		return $this->db->count_all_results();
	}


}
?>