<?php
class Article extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->lang->load('article', $this->language);  
        $this->load->model("Musuarios");
        $this->load->model("Mlibros");
    }
    function index()
    {   
        

    }
	function view()
	{	
        if($article_id= $this->uri->segment(3))
           if($article=$this->Mlibros->get_article_by_id($article_id))
            {
            print_r($article);
	  	    }
            else
            {
                echo "El articulo que buscas no existe o fue borrado :(";
            }
	}

	function edit()
	{	
        if( $this->uri->segment(3))
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
        else
            redirect("article");
	}
	function create()
	{ $this->lang->load('article', $this->language);  
        if(!isset($this->session->userdata["username"]))
            redirect("login");
        else
        {
            if($this->input->post()) //guardamos los datos del formulario
            {
                print_r($this->input->post());
            }  
            else //mostramos el formulario
                $this->load->view("head_view");
                $this->load->view("article_form");
        }

	}
}
?>