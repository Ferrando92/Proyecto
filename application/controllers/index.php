<?php
class index extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        //en esta zona cargaremos la cookie con los datos del usuario
    }
	function home()
	{	
		$this->load->database();
		$this->language ="spanish";
		$this->lang->load('index', $this->language);
		$this->load->model("Musuarios");
		$user_log = $this->Musuarios->get_user_data(1);//le pasaremos la id del usuario registrado por la cookie
		echo $this->lang->line("welcome_msg").$user_log[0]->nombre_completo."<br>";
		//Saca los usernames de todos los usuarios
		$users=$this->Musuarios->get_all_usernames();
		
		/*
		foreach($users as $user)
		{
			echo $user->username;
		} */

		//Todos los datos de los usuarios
		$allusers = $this->Musuarios->get_all_users_data();	
		foreach($allusers as $data_users)
		{
			echo"<br>";
			foreach($data_users as $data =>$valor)
			{
				echo $data.":".$valor."<pre>";
			}
			echo"<br>";
		}
	}
}
?>