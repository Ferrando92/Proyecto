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

		
    }
	function index()
	{	
            try {
            	$this->user = $this->facebook->getUser();//me da la id
             	//$accessToken = $this->facebook->getAccessToken();
       			//print_r($this->user);
       	  		//$user_profile = $this->facebook->api('/me?,access_token='.$accessToken);//me da sus datos
	  			$user_profile = $this->facebook->api('/me?');
	  			$user_location = $this->facebook->api('/'.$user_profile["id"].'?fields=location');
	  			print_r($user_profile);
	  			//print_r($this->facebook->api->users_getInfo($user_profile["id"], "current_location"));

	            } catch (FacebookApiException $e) {
	            	//print_r($e);
	                $user_profile = null;
	            }
    if (isset($user_profile)) {
        	$logout =$this->facebook->getLogoutUrl();
        	echo "<a href= $logout>Going to Logout</a>";
        	$this->facebook->destroySession();
           //$logout = base_url('index.php/home/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } 
        else{
        	$params = array(  "scope" => 'read_stream,publish_stream,publish_actions,offline_access');
            $logout = $this->facebook->getLoginUrl($params);
            echo "<a href= $logout>Login</a>";
        }
       // $this->load->view("head_view",$data);
       // $this->load->view('login',$data);

	}
}
?>