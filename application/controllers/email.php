<?php
class Email extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
       $this->load->library('email');
    }
	function index()
	{	

	    

        $this->email->initialize($config);

        $this->email->from('yolo@gmail.com', 'YOLO');
        $this->email->to('sferrando.92@gmail.com'); 
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        $this->email->send();

        echo $this->email->print_debugger();

        
		
	}
	
	
}
?>