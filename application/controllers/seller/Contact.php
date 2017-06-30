<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
    $this->load->library('email');
    $this->load->model('users_model');

    //$this->load->library('email');
    //$this->load->library('encrypt');
    //$this->load->model('seller/login_model');
}

 public function index() {	 
	$this->load->view('seller/header');
  $this->load->view('seller/contact');
$this->load->view('seller/footer');
        //$this->template->render(); 
  }




  public function login_contact(){
    
      $data = array(
        'first_name' => $this->input->post('fname'),
        'last_name' => $this->input->post('lname'),
        'email' => $this->input->post('email'),
        'phone_number' => $this->input->post('phone'),
        'message' => $this->input->post('message'),
        'created_at'  => date('Y-m-d H:i:s'),
    'updated_at'  => date('Y-m-d H:i:s'),

        );


        $contact = $this->users_model->insertcontact($data);

        if($contact == 1)

      {

        $this->session->set_flashdata('msg1','<div class="alert alert-success text-center" style="color: green;font-size:13px;">Thank You! Our team will contact you shortly..</div>');

                  return redirect(base_url('seller/login'));

      }
      else{
        $this->session->set_flashdata('msg1','<div class="alert alert-danger text-center" style="color: green;font-size:13px;">Whoops!</div>');

      }
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
  echo "<script>window.location='".base_url()."seller/contactus';</script>";
  } 
  
  
  else{
  $this->session->set_flashdata('verify_msg',' ');
  $this->session->set_flashdata('err_code',' ');
  //echo "0";
 echo "<script>window.location='".base_url()."seller/contactus';</script>";
  }
}

  
  }