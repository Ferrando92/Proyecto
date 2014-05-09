<?php
class Login extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
         $this->load->library('facebook', array(
         'appId' => '293965007434532',
         'secret' => '50b3165512692f601d18263658ac4130',
        ));

		$this->user = $this->facebook->getUser();
    }
	function index()
	{	
		print_r($user);
		 $user_profile= $this->facebook->api('/me');
		 print_r($user_profile);
		if (isset($user)) {
            try {
                //$data['user_profile'] = $this->facebook->api('/me');
                $user_profile= $this->facebook->api('/me');
                echo "-------------------";
            } catch (FacebookApiException $e) {
            	print_r($e);
                $user = null;
            }
        }/*else {
            $this->facebook->destroySession();
        } */

        if (isset($user)) {
        	$logout =$this->facebook->getLogoutUrl();
        	echo "<a href= $logout>Logout</a>";
           //$logout = base_url('index.php/home/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $logout = $this->facebook->getLoginUrl();
            echo "<a href= $logout>Login</a>";
        }
       // $this->load->view("head_view",$data);
       // $this->load->view('login',$data);

	}
}
?>