<?php
class Tester extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        //en esta zona cargaremos la cookie con los datos del usuario
    }
	function index()
	{	
		//$this->load->database();//Probar autoload
		
		
		$this->load->model("Musuarios");
		$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
		print_r($user);
		$this->Musuarios->chanche_password($user[0]->id_usuario,"pepe","test1");
		$user2 = $this->Musuarios->get_user_data($this->session->userdata["id"]);
		echo "<pre>";
		print_r($user2);
	}
	
}
?>