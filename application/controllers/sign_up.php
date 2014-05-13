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
		//$this->language ="valenciano";
		$this->lang->load('signup', $this->language);
		$this->load->view("head_view"); //cargamos la cabezera
		$this->load->view("formulario_registro");
	}
	function registrar()
	{
		//Zona de carga
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model("Musuarios");

		//recogemos las variables procedentes de el formulario
		$nombre_completo	=$this->input->post("name");
		$mail 				=$this->input->post("mail");
		$username 			=$this->input->post("username");
		$password 			=$this->input->post("pass");
		$fecha_registro 	=unix_to_human(now(), TRUE, 'eu');
		$telefono			=$this->input->post("phone");
		$poblacion			=$this->input->post("city");
		$role				=0;//obtienen el rol de registrado
		$estado 			=0;//Queda desactivado hasta confirmar email
		$ip 				=$this->input->ip_address();

		//realizamos una llamada ajax para comprobar si las credenciales ya existe(Correo,username)
		if($this->Musuarios->check_signup_data($mail,$username))
		{
			$this->load->view("head_view",$data);
			redirect("sign_up");
		}
		else
		{	
			$insert=array( 
				'nombre_completo'=>$nombre_completo,
				'mail'=>$mail,
				'password'=>md5($password),
				'username'=>$username,
				'telefono'=>$telefono,
				'poblacion'=>$poblacion,
				'fecha_registro'=>$fecha_registro,
				'role'=>$role,
				'estado'=>$estado,
				'ip_registro'=>$ip
				 );
			if($this->Musuarios->insert_new_user($insert))
				$this->load->view("confirm_signup");
			else
				echo"Fallo al insertar en la Base de datos";
}
	}
}
?>