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
        $from=$this->input->post("from");
        $name=$this->input->post("name");
        $to=$this->input->post("to");
        $message=$this->input->post("message");
        $subject=$this->input->post("subject");
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

        $this->email->from($from, $name);
        $this->email->to($to); 
        $this->email->subject($subject);
        $this->email->message($message);  
        $this->email->send();

        //$this->load->model("Mmensajes");
        //$this->Mmensajes->save_message($insert);
        //echo $this->email->print_debugger();

        
		
	}
	
	
}
?>