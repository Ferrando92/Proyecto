<?php
class Sign_up extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        //en esta zona cargaremos la cookie con los datos del usuario
    }
	function index()
	{	//if : logueado cookie redirect a home, else:
		$this->language ="english";
		$this->lang->load('signup', $this->language);
		$this->load->view("formulario_registro");
	}
	function registrar(){
		//realizamos una llamada ajax para comprobar si las credenciales ya existe(Correo,username)
		
		$this->load->database();
		$this->load->model("Musuarios");
		if($this->Musuarios->check_signin_data("test@wibuks.com","ferrando92"))
			echo "existen";
		else
			echo "no existen";
	}
}
?>