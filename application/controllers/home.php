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
        $this->language ="valenciano";
        $this->lang->load('head', $this->language);
        $this->lang->load('home', $this->language);	
		$this->load->view("head_view",$data);
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
	 function login(){

		//$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
       $this->load->library('facebook', array(
         'appId' => '293965007434532',
         'secret' => '50b3165512692f601d18263658ac4130',
        ));
       	  $accessToken = $this->facebook->getAccessToken();
       	  print_r($accessToken);
       	  print_r($this->facebook);
  			//$user_profile = $this->facebook->api('/me?,access_token='.$accessToken);
        //$user_profile = $this->facebook->api('/me');
        //print_r($user);
        //print_r($this->facebook->getUserAccessToken());echo "------------";
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                echo "-------------------";
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = base_url('index.php/home/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => base_url('index.php/home/login'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view("head_view",$data);
        $this->load->view('login',$data);

	}

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('welcome/login');
    }
}
?>