<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class inventory extends CI_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('inventory_model'); 
			
 }
  public function dashboard(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {
		
		$data['seller_details'] = $this->inventory_model->get_all_seller_details();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('customer/inventry/header');
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/index',$data);
		$this->load->view('customer/inventry/footer');
	  
	  }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	
  }
 

  
 




}		
?>