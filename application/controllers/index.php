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
<<<<<<< HEAD
		$this->load->database();//CARGAMOS LA BASE DE DATOS??PROBAR EL AUTOLOAD
=======
		$this->load->database();//Probar autoload
>>>>>>> d054ecb37bfb9e13892fe7ab4b7e14b4b2dc9d13
		$this->language ="spanish";
		$this->lang->load('index', $this->language);
		$this->load->model("Musuarios");
		$user_log = $this->Musuarios->get_user_data(1);//le pasaremos la id del usuario registrado por la cookie
<<<<<<< HEAD
		echo $this->lang->line("welcome_msg").$user_log[0]->nombre_completo."<br>";
=======
		$data["mensaje_bienvenida"]=$this->lang->line("welcome_msg").$user_log[0]->nombre_completo."<br>";
>>>>>>> d054ecb37bfb9e13892fe7ab4b7e14b4b2dc9d13
		//Saca los usernames de todos los usuarios
		$users=$this->Musuarios->get_all_usernames();
		
		/*
		foreach($users as $user)
		{
			echo $user->username;
		} */

		//Todos los datos de los usuarios
		$allusers = $this->Musuarios->get_all_users_data();	
<<<<<<< HEAD
		foreach($allusers as $data_users)
=======
		$this->load->view("home_view",$data);
		
		/*foreach($allusers as $data_users)
>>>>>>> d054ecb37bfb9e13892fe7ab4b7e14b4b2dc9d13
		{
			echo"<br>";
			foreach($data_users as $data =>$valor)
			{
				echo $data.":".$valor."<pre>";
			}
			echo"<br>";
<<<<<<< HEAD
		}
=======
		}*/
>>>>>>> d054ecb37bfb9e13892fe7ab4b7e14b4b2dc9d13
	}
}
?>