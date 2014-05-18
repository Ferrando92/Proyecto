<?php
class Email extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
          
    }
	function send_contact()
	{
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'wibuks.dev@gmail.com';
        $config['smtp_pass']    = SMTP_PASS;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $this->email->initialize($config);

        $this->email->from('yolo@gmail.com', 'YOLO');
        $this->email->to('sferrando.92@gmail.com'); 
        $this->email->subject('Email Test');
        $this->email->message('FUNSIONA NO MAS class.');  
        $this->email->send();

        echo $this->email->print_debugger();

        
		
	}
	
	
}
?>