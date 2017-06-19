<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Contactus extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
       // $this->load->library('pagination');
		$this->load->library('email');
	}

	public function index()
	{
		
	   
	   //$data['sellerlocationdata'] = $this->Personnel_details_model->getlocations();
	  
		
		$this->template->write_view('content', 'seller_admin/contactus/index');
		$this->template->render();


	}
	
public function send()
{
	
 if(isset($_POST['fromemail']))
	{
		// echo  $this->input->post('captcha')."<br>".$this->session->userdata('captchaWord');  exit;
	
			
	$to_email=trim($this->input->post('fromemail'));
	$name=$this->input->post('name');
  	$mobile=$this->input->post('mobile');
 	$from_email = 'mails@dev2.kateit.in';//change this to yours
	$subject = 'Contact details';
	$message = 'Hi , i am '.$name.' <br> my contact details are <br><br> Email: '.$from_email.' <br> Mobile: '.$mobile.'' ;
	//send mail
	$this->email->set_mailtype("html");
	$this->email->from($from_email);
	$this->email->to($to_email,'Cart in Hour');
	$this->email->subject($subject);
	$this->email->message($message);
	$this->email->send();
	
	/*$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Sport-Psy <$from_email>' . "\r\n";
	$ok=mail($to_email,$subject,$message,$headers);*/
    $this->session->set_flashdata('verify_msg','Thank You! Our team will contact you shortly.');
	$this->session->set_flashdata('err_code',' ');
	echo "<script>window.location='".base_url()."seller_admin/contactus';</script>";
 	}	
	
	
	else{
	$this->session->set_flashdata('verify_msg',' ');
	$this->session->set_flashdata('err_code',' ');
	//echo "0";
 echo "<script>window.location='".base_url()."seller_admin/contactus';</script>";
	}
	
	
	
	
	
	
	
	
}


	
}	
	
	
	?>