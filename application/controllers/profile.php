<?php
class Profile extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->lang->load('profile', $this->language);  
        $this->load->model("Musuarios");
        $this->load->model("Mlibros");
        if(!isset($this->session->userdata["username"]))
            redirect("home");
    }
	function index()
	{	
	   	$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
        $articulos = $this->Mlibros->get_article_by_user($this->session->userdata["id"]);
    	$data["user"]=$user[0];
        $data["articulos"]=$articulos;
    	//print_r($data["user"]); 
    	$this->load->view("head_view");
    	$this->load->view("profile_view",$data);
	
			
	}
	function edit()
	{	
        $insert=array();
        $insert["nombre_completo"]=$this->input->post("edit_full_name");
        $insert["poblacion"]=$this->input->post("edit_poblacion");
        $insert["telefono"]=$this->input->post("edit_phone");
        if($this->input->post("old_password")&&$this->input->post("new_password")===$this->input->post("new_password2")&&$this->input->post("new_password2")!=null)
        {
            $user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
            print_r($user[0]);
            if($user[0]->password ===md5($this->input->post("old_password")))
            {
                $old=$this->input->post("old_password");
                $new=$this->input->post("new_password");
                $new2=$this->input->post("new_password2");
                $insert["password"]=md5($new=$this->input->post("new_password"));
            }
        }
        echo "<pre>";
        print_r($insert);
        $this->Musuarios->update_data($this->session->userdata["id"],$insert);
    	//$this->load->view("head_view");
		
	}
	function change_password($old,$new)//metodo a espera de vista
	{
		$old=$this->input->post("old_password");
		$new=$this->input->post("new_password");
		$user = $this->Musuarios->get_user_data($this->session->userdata["id"]);
		$this->Musuarios->chanche_password($user[0]->id_usuario,$old,$new);//pedimos la password vieja y la nueva
		$user2 = $this->Musuarios->get_user_data($this->session->userdata["id"]);
	}
}
?>