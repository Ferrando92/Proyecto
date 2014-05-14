<?php
class Profile extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Musuarios");
    }
	function index()
	{	
		
        if(isset($this->session->userdata["username"]))
        {
        	
        	//print_r($this->session->userdata);
        	
        	$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
        	$data["user"]=$user[0];
        	print_r($data["user"]); 
        	$this->load->view("head_view");
        	$this->load->view("profile_view",$data);
		}
		else
			redirect("home");
	}
	function edit()
	{	
		
        if(isset($this->session->userdata["username"]))
        {
        	
        	print_r($this->session->userdata);
        	$this->load->model("Musuarios");
        	$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
        	$data["user"]=$user[0];
        	echo "<pre>";
        	print_r($data["user"]);
        	//$this->load->view("head_view");
		}
		else
			redirect("home");
	}
	function change_password()//metodo a espera de vista
	{
		$old=$this->input->post("old_password");
		$new=$this->input->post("new_password");
		$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
		$this->Musuarios->chanche_password($user[0]->id_usuario,$old,$new);//pedimos la password vieja y la nueva
		$user2 = $this->Musuarios->get_user_data($this->session->userdata["id"]);
	}
}
?>