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
		$this->load->model("Musuarios");
		
		$id=$this->Musuarios->check_fb_signup_data($this->session->userdata["mail"]);
		print_r($this->session->userdata);

	}
	
}
?>