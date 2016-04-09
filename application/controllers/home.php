<?php
class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

	function index()
	{	
        $this->lang->load('home', $this->language);	
		$this->load->view("head_view");
		$this->load->view("home_view");
	}
	
}
?>