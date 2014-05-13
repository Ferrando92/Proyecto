<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {

        if(!isset($this->session->userdata["username"])){
            $this->load->library('facebook', array(
                'appId' => '293965007434532',
                'secret' => '6fe7c03ac40399293c10bf5648e301df',
            ));
             
            $params = array(  "scope" => 'email,offline_access',
                'redirect_uri' => base_url().'index.php/login/fblogin');
            $data["facebook_login"] = $this->facebook->getLoginUrl($params);
            $data["wibuks_login"]  = base_url().'index.php/home/wibuks_login';
            $this->lang->load('login', $this->language);    
            $this->load->view("head_view");
            $this->load->view('login_view',$data);
        }
        else
            redirect("home");
    }

    function wibuks_login()
    {
        $mail=$this->input->post("mail");
        $pass=$this->input->post("pass");
        $this->load->model("Musuarios");
        if($user=$this->Musuarios->login_success($mail,$pass))
        {
            
            $newdata = array(
           'username'  => $user[0]->username,
           'mail'      => $user[0]->mail,
           'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            echo "success";
            
        }
        else
        {
            echo "JUST NOPE";
           
        }
    }

    function fblogin()
    {
        $this->load->helper('date');
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
            //print_r($this->facebook->api->users_getInfo($user_profile["id"], "current_location"));
           
        } catch (FacebookApiException $e) {
            //print_r($e);
            $user_profile = null;
        }
        $this->load->model("Musuarios");
        if($this->Musuarios->check_fb_signup_data($user_profile["email"]))
        {
           $newdata = array(
           'username'  => $user_profile["name"],
           'mail'      => $user_profile["email"],
           'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            
        }
        else 
        {
            $fecha_registro     =unix_to_human(now(), TRUE, 'eu');
            $role               =0;//obtienen el rol de registrado
            $estado             =0;//Queda desactivado hasta confirmar email
            $ip                 =$this->input->ip_address();
            $insert=array( 
                    'nombre_completo'=>$user_profile["name"],
                    'mail'=>$user_profile["email"],
                    'username'=>$user_profile["name"],
                    'fecha_registro'=>$fecha_registro,
                    'role'=>0,
                    'estado'=>1,
                    'ip_registro'=>$ip
                     );
             echo "nazing";
           $this->Musuarios->insert_new_user($insert);
        }
                
        redirect("home"); //una vez logeado somos volvemos al home

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