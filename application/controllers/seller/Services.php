<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Services extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->library('email');
		$this->load->model('seller/login_model');
	}

	public function index()
	{
		
	   
		$this->template->write_view('content', 'seller/services/index');
		$this->template->render();


	}
	

//contact detalis store 
public function details(){
	$sid = $this->session->userdata('seller_id');
	$sname = $this->session->userdata('seller_name');  
		
  		$data = array(
  		'seller_id' => $sid,
  		'seller_name'=>$sname,
  	  	'phone_number' => $this->input->post('phone_number'),
  	  	'select_plan' => $this->input->post('plan'),
  	    'created_at'  => date('Y-m-d H:i:s'),
		'updated_at'  => date('Y-m-d H:i:s'),

  	  	);

  	  	$contact = $this->login_model->insertservices($data);
  	  	if($contact == 1)
			{
	
				echo "1";
			}
			else{
				echo "0";

			}
	}
	
	
	
	
}
	?>