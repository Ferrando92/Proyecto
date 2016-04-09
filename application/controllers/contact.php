<?php
class Contact extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

	function index()
	{	
	   $this->load->view("head_view");
       $this->load->view("contact_view");
	}
}
?>