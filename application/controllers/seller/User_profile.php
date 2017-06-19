<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class user_profile extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		
		$this->load->model('seller/user_profile_model');
       
		
 	}

 	public function index()
	{
			   
	   	$data['sellers_cat_display'] = $this->user_profile_model->seller_categories();
	   	//$data['seller_orders'] = $this->user_profile_model->total_orders();
	   //echo print_r($data);exit;
	   //echo '<pre>';print_r($some);exit;
		$this->template->write_view('content', 'seller/userprofile/index',$data);
		$this->template->render();


	}

 }