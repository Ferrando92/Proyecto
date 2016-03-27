<?php
class Login extends CI_Controller
{
    const SECRET_ONE = '6fe7c03ac40399293c10bf5648e301df';
    const SECRET_TWO = '50b3165512692f601d18263658ac4130';

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Musuarios");
        $this->load->helper('string');
    }

    /**
        LOGIN/INDEX
    */
    function index()
    {
        if(isset($this->session->userdata["username"])) redirect("home");

        $this->loadFacebookConfiguration(self::SECRET_ONE);
         
        $data["facebook_login"] = $this->getFacebookLogin();
        $data["wibuks_login"]  = base_url().'index.php/home/wibuks_login';

        $this->lang->load('login', $this->language);    
        $this->load->view("head_view");
        $this->load->view('login_view',$data);
    }

    private function loadFacebookConfiguration($secret){
        $this->load->library('facebook', array(
            'appId' => '293965007434532',
            'secret' => $secret,
        ));
    }

    private function getFacebookLogin(){
        $params = array(
            "scope" => 'email, public_profile, offline_access',
            'redirect_uri' => base_url().'index.php/login/fblogin');

        return $this->facebook->getLoginUrl($params);
    }

    /**
        INDEX/wikibuks_login (ajax)
    */
    function wibuks_login()
    {
        $user_email = $this->input->post("mail");
        $password = $this->input->post("pass");
        $success_response = $this->Musuarios->login_success($user_email, $password);

        if(!$success_response)
        {
            echo "JUST NOPE";
            return;
        }

        $user = $success_response[0];
        $this->session->set_userdata($this->buildLoggedUserDataSessionArray($user));

        echo "success";
    }

    private function buildLoggedUserDataSessionArray($user){
        return array(
            'id'        => $user->id_usuario,
            'username'  => $user->username,
            'mail'      => $user->mail,
            'logged_in' => TRUE
        );
    }

    function fblogin()
    {
        $this->load->helper('date');
        $this->loadFacebookConfiguration(self::SECRET_TWO);

        try 
        {
            $this->facebook->destroySession();
            //$this->user = $this->facebook->getUser();
            //$accessToken = $this->facebook->getAccessToken();
            //print_r($this->user);
                //$user_profile = $this->facebook->api('/me?,access_token='.$accessToken);//me da sus datos
            $user_profile = $this->facebook->api('/me');
             //$user_profile["picture"] = $this->facebook->api("/me/picture");
            //$user_location = $this->facebook->api('/'.$user_profile["id"].'?fields=location');
            //print_r($this->facebook->api->users_getInfo($user_profile["id"], "current_location"));
           
        } catch (FacebookApiException $e) {
            //print_r($e);
            $user_profile = null;
        }
        if($id_user=$this->Musuarios->check_fb_signup_data($user_profile["email"]))
        {
           $newdata = array(
           'id'        => $id_user[0]->id_usuario,
           'fb_id'     => $id_user[0]->fb_id,
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
            $password           =md5("test1");
            $insert=array( 
                    'nombre_completo'=>$user_profile["name"],
                    'password'=> $password,
                    'mail'=>$user_profile["email"],
                    'username'=> $user_profile["username"],
                    'fb_id' =>$user_profile["id"],
                    'fecha_registro'=>$fecha_registro,
                    'role'=>0,
                    'estado'=>1,
                    'ip_registro'=>$ip
                     );
             
           $this->Musuarios->insert_new_user($insert);
           $id=$this->Musuarios->check_fb_signup_data($user_profile["email"]);
           $newdata = array(
           'id'        => $id[0]->id_usuario,
           'fb_id'     => $id[0]->fb_id,
           'username'  => $user_profile["name"],
           'mail'      => $user_profile["email"],
           'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
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