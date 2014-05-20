<?php
class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
         $this->session->set_userdata('buscando', null);
    }
	function index()
	{	
		//$this->load->database();//Probar autoload
		
		
		$this->load->model("Musuarios");
		$user_log = $this->Musuarios->get_user_data(1);//le pasaremos la id del usuario registrado por la cookie
		$data["mensaje_bienvenida"]=$this->lang->line("welcome_msg").$user_log[0]->nombre_completo."<br>";
		//Saca los usernames de todos los usuarios
		$users=$this->Musuarios->get_all_usernames();
		
		/*
		foreach($users as $user)
		{
			echo $user->username;
		} */

		//Todos los datos de los usuarios
		$allusers = $this->Musuarios->get_all_users_data();
        
       
        $this->lang->load('home', $this->language);	
		$this->load->view("head_view");
		$this->load->view("home_view",$data);
		
		/*foreach($allusers as $data_users)
		{
			echo"<br>";
			foreach($data_users as $data =>$valor)
			{
				echo $data.":".$valor."<pre>";
			}
			echo"<br>";
		}*/
	}
	
}
?>