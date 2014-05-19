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
            $data["articulo"]=$article[0];
            $this->load->view("head_view",$data);
            $this->load->view("article_view",$data);
	  	    }
            else
            {
               $this->load->view("head_view",$data);
            $this->load->view("oops_view",$data);
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
	{
        $this->lang->load('article', $this->language);  
        if(!isset($this->session->userdata["username"]))
            redirect("login");
        else
        {
            if($this->input->post()) //guardamos los datos del formulario
            {
                $this->load->helper('date');
                $insert=array();
                $insert["id_usuario"]=$this->session->userdata["id"];
                $insert["titulo"]=$this->input->post("ad_title");
                $insert["descripcion"]=$this->input->post("description");
                $insert["isbn"]=$this->input->post("isbn");
                $insert["fecha_creacion"]=unix_to_human(now(), TRUE, 'eu');
                $insert["editorial"]=$this->input->post("editorial");
                $insert["anyo"]=$this->input->post("year");
                $insert["id_asignatura"]=$this->input->post("subject");
                $insert["id_curso"]=$this->input->post("course");
                $insert["localidad"]=$this->input->post("location");
                $insert["lib_telefono"]=$this->input->post("phone");
                $insert["lib_mail"]=$this->session->userdata["mail"];


               $id_libro=$this->Mlibros->insert_new_article($insert);
               redirect("article/view/$id_libro");
            }  
            else //mostramos el formulario
            {
                $this->load->helper('form');
                $this->load->model("Mprovincias");
                $this->load->model("Mcursos");
                $provincias=$this->Mprovincias->get_all_provincias();
                $cursos=$this->Mcursos->get_all_cursos();
                $data["location"]=$provincias;
                $data["cursos"]=$cursos;
                $this->load->view("head_view");
                $this->load->view("article_form",$data);
            }
        }

	}
    function get_asignaturas()
    {
        if($id=$this->input->post("id_asignatura"))
        {
            $this->load->model("Masignaturas");
            $asignaturas=$this->Masignaturas->get_asignaturas_by_curso($id);
            foreach ($asignaturas as $asignatura ) {
                echo $asignatura->id_asignatura."/".$asignatura->descripcion."@";
            }
        }
    }
}
?>