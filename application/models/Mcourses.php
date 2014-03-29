<?php
class Mcourses extends MY_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	//
	function Mcourses()
	{
		$this->table="courses";
		$this->name_id="course_id";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_courses()
	{
		$this->db->from('course');
		return $this->db->count_all_results();
	}
}
?>