<?php
class Musuarios extends CI_Model {

	/*
		var $title   = '';
		var $content = '';
		var $date	= '';
	*/

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   
	//
	function Musers()
	{
		$this->table="usuarios";
		$this->name_id="id_usuario";
		// Llamando al contructor del Modelo
		parent::Model();
	}

	// Cuenta los usuarios que hay en la tabla
	function count_usuarios()
	{
		$this->db->from('usuarios');
		return $this->db->count_all_results();
	}

	function insert_new_user($data)
	{
		$this->db->insert('usuarios',$data);
		return mysql_insert_id();
	}

	function get_all_users_data()
	{
		$query = $this->db->get("usuarios");
		return $query->result();
	}

	function get_all_usernames()
	{
		$this->db->select("username");
		$query=$this->db->get("usuarios");
		return $query->result();//devuelve un array formado por clave => valor
	}

	function get_user_data($id_usuario)
	{	
		$this->db->where("id_usuario",$id_usuario);
		$query = $this->db->get('usuarios');
		return $query->result();
	}

	function get_user_name($id_usuario)
	{
		$this->select("nombre_completo");
		$this->db->where("id_usuario",$id_usuario);
		return $this->db->get("usuarios");
	}

	function login_success($mail,$pass)
	{
		$this->db->where("mail",$mail);
		$this->db->where("password",md5($pass));
		return $this->db->get("usuarios")->result();
	}
	function check_signup_data($mail,$username){
		$this->db->where("username",$username);
		$this->db->where("mail",$mail);
		$query= $this->db->get("usuarios");
		return $query->result();
	}
	function check_fb_signup_data($mail){
		$this->db->select("id_usuario, fb_id");
		$this->db->where("mail",$mail);
		$query= $this->db->get("usuarios");
		return $query->result();
	}

	function chanche_password($id,$old,$new)
	{
		$this->db->where('id_usuario', $id);
		$this->db->where('password', md5($old));
		$this->db->update('usuarios', array('password'=>md5($new)));
	}

	function update_data($id,$insert)
	{
		$this->db->where('id_usuario', $id);
		$this->db->update('usuarios', $insert);
	}
	function get_mail_by_id($id)
	{
		$this->db->select('mail');
		$this->db->where('id_usuario', $id);
		$query=$this->db->get('usuarios');
		return $query->result();
	}
}
?>