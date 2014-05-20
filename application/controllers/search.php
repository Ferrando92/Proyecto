<?php

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mlibros');
    }


    public function index() {
        //$buscador="ca";
        if(!$this->session->userdata('buscando'))
        {
            $buscador = $this->input->post('search');
            $this->session->set_userdata('buscando', $buscador);
        }
        else
         $buscador = $this->session->userdata('buscando');
        $pages = 8; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . "index.php/search/index"; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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