<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Customer extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url', 'html'));
			$this->load->library('session');
			$this->load->helper(array('url','html','form'));
			$this->load->model('customer_model'); 
			
 }
 
 public function index(){
	
	 $test=$this->session->userdata('userdetails');
	 //echo '<pre>';print_r($test);exit;
	 // if($this->session->userdata('userdetails'))
	 // {
		// redirect('');
	 //}else{
		$this->load->view( 'customer/register'); 
	 //}	

	
 } 
 public function registerpost(){
	
	$post=$this->input->post();
	///echo '<pre>';print_r($post);exit;
	$emailcheck = $this->customer_model->email_check($post['email']);
	if(count($emailcheck)==0){
		$password=md5($post['password']);
		$newpassword=md5($post['confirm_password']);
		if($password == $newpassword ){
			
			$details=array(
			'cust_firstname'=>$post['firstname'],	 	
			'cust_lastname'=>$post['lastname'],
			'cust_email'=>$post['email'],
			'cust_password'=>$password,
			'cust_mobile'=>$post['mobile'],
			);
			$customerdetails = $this->customer_model->save_customer($details);
			
			if(count($customerdetails)>0){
			$this->session->set_userdata('userdetails',$details);
			$this->session->set_flashdata('sucesss',"Successfully registered");
			redirect('');
			}
		}else{
			$this->session->set_flashdata('error',"Password and confirm password was not matching");
			redirect('customer');
		}
		
	}else{
		$this->session->set_flashdata('error',"E-mail already exists.Please use another email");
		redirect('customer');	
		
	}


	
 } 
 public function loginpost(){
	 
	 	$post=$this->input->post();
	echo '<pre>';print_r($post);exit;
	$emailcheck = $this->customer_model->email_check($post['email']);
 }
 

	
	
}
?>