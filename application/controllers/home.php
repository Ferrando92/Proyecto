<?php
class Home extends CI_Controller
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
	function wibuks_login()
	{
		echo "im here";
	}

	function fblogin()
	{
		$this->load->library('facebook', array(
		     'appId' => '293965007434532',
		     'secret' => '50b3165512692f601d18263658ac4130',
		     ));
		try 
		{
			$this->facebook->destroySession();
			//$this->user = $this->facebook->getUser();
		 	//$accessToken = $this->facebook->getAccessToken();
			//print_r($this->user);
				//$user_profile = $this->facebook->api('/me?,access_token='.$accessToken);//me da sus datos
			$user_profile = $this->facebook->api('/me');
			//$user_location = $this->facebook->api('/'.$user_profile["id"].'?fields=location');
			$email=$user_profile["email"];
			print_r($user_profile);

			//print_r($this->facebook->api->users_getInfo($user_profile["id"], "current_location"));
			$newdata = array(
		   'username'  => $email,
		   'email'     => "mail",
		   'logged_in' => TRUE
				);

			$this->session->set_userdata($newdata);

		} catch (FacebookApiException $e) {
			//print_r($e);
		    $user_profile = null;
		}
		redirect("home"); //una vez logeado somos volvemos al home

	}
	function login()
	{

		if(!isset($this->session->userdata["username"])){
			$this->load->library('facebook', array(
         		'appId' => '293965007434532',
         		'secret' => '50b3165512692f601d18263658ac4130',
        	));
	         
        	$params = array(  "scope" => 'email,read_stream,publish_stream,publish_actions,offline_access',
        		'redirect_uri' => base_url().'index.php/home/fblogin');
            $data["facebook_login"] = $this->facebook->getLoginUrl($params);
	        $data["wibuks_login"]  = base_url().'index.php/home/wibuks_login';
	        $this->lang->load('login', $this->language);	
	    	$this->load->view("head_view");
	   		$this->load->view('login',$data);
   		}
	}
	
    function logout(){

        $this->load->library('facebook', array(
         'appId' => '293965007434532',
         'secret' => '50b3165512692f601d18263658ac4130',
        ));
        $this->session->sess_destroy();;
        $this->facebook->destroySession();
        // Logs off session from website
        redirect('home');
    }
}
?>