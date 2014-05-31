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
        if($id_libro= $this->uri->segment(3))
        {
            if($article=$this->Mlibros->get_article_by_id($id_libro))
            {
            $data["articulo"]=$article[0];
            $this->load->view("head_view",$data);
            $this->load->view("article_edit",$data);
           
            }
            else
            {
            $this->load->view("head_view");
            $this->load->view("oops_view");
            }
	   }
    }
    function update()
    {   
        if(!isset($this->session->userdata["username"]))
            redirect("login");

        if($id_libro=$this->uri->segment(3))
        {
            $this->lang->load('article', $this->language);  
            if($this->input->post()) //guardamos los datos del formulario
            {
                $this->load->helper('date');
                $insert=array();
                $insert["titulo"]=$this->input->post("ad_title");
                $insert["descripcion"]=$this->input->post("description");
                $insert["precio"]=$this->input->post("precio");


               $this->Mlibros->update_article($id_libro,$insert);
               redirect("article/view/$id_libro");
            }   
        }
       
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
                $insert["precio"]=$this->input->post("precio");


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
    function delete()
    {   
        if($article_id= $this->uri->segment(3))
        {
           if($this->Mlibros->same_autor($article_id,$this->input->post("user_id")))
           {
               if($article=$this->Mlibros->delete_article($article_id))
                {
                  echo "Borrado";
                }
            }
            else
            {
                echo "fail";
            }
        }
        else
            {
                echo "fail2";
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
     function get_mail()
    {
        if($id=$this->input->post("id_article"))
        {
            $this->load->model("Mlibros");
            $this->load->model("Musuarios");
            $id_user=$this->Mlibros->get_user_by_article($id);
            
            $mail=$this->Musuarios->get_mail_by_id($id_user[0]->id_usuario);
            echo $mail[0]->mail;
        }
    }
}
?>