<?php

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mlibros');
         $this->lang->load('search', $this->language);  
    }

    function index()
    {
        $this->load->helper('form');
        $this->load->model("Mprovincias");
        $this->load->model("Mcursos");
        $provincias=$this->Mprovincias->get_all_provincias();
        $cursos=$this->Mcursos->get_all_cursos();
        $data["location"]=$provincias;
        $data["cursos"]=$cursos;
        $this->load->view("head_view");
        $this->load->view("search_form",$data);
    }
    
    public function listed() {
        //$buscador="ca";
        if($this->input->post())
        {
            $this->session->unset_userdata('buscando');
            if($this->input->post('ad_title'))
                $buscador["titulo"] = $this->input->post('ad_title');
            if($this->input->post('description'))
                $buscador["descripcion"] = $this->input->post('description');
            if($this->input->post('isbn'))
                $buscador["isbn"] = $this->input->post('isbn');
            if($this->input->post('location')!=0)
                $buscador["localidad"] = $this->input->post('location');
            if($this->input->post('subject')!=0)
                $buscador["id_asignatura"] = $this->input->post('subject');
            if($this->input->post('course')!=0)
                $buscador["id_curso"] = $this->input->post('course');
            $this->session->set_userdata('buscando', $buscador);
        }
        $buscador = $this->session->userdata('buscando');
        $pages = 8; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . "index.php/search/listed"; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->Mlibros->count_search($buscador); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = '<<'; //primer link
        $config['last_link'] = '>>'; //último link
        $config['next_link'] = '>'; //siguiente link
        $config['prev_link'] = '<'; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $data["searches"] = $this->Mlibros->total_posts_paginados($buscador, $config['per_page'], $this->uri->segment(3));

        //cargamos la vista y el array data
        $this->load->view("head_view");
        $this->load->view('search', $data);
    }
     public function page() {
        $this->load->view("head_view");
        $this->load->view("search");

     }
}
/*application/controllers/peliculas.php
 * el controlador
 */