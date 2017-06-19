<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Performance extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('seller_admin/orders_model');
		//$this->load->model('seller_admin/Personnel_details_model');
       // $this->load->library('pagination');
		
	}

 public function index() {
	 
	 $year = $this->input->post('per_year');
	 $month = $this->input->post('per_month');
	 if($month == ""){
	$month = date("m");
	 }
	
	if($year == ""){
	$year = date("Y");
	}
	
	  
	   $result = $this->orders_model->getperformancedaily($month,$year);
	 
	 $data['dailywise']=$result;
	$this->template->write_view('content', 'seller_admin/performance/index', $data);
		$this->template->render();
  }
  
  public function performance_profile()
  
  {
	  
	  $month = $this->input->post('per_month');
	 $year = $this->input->post('per_year');
	 $result = $this->orders_model->getperformancedaily($month,$year);
	 //echo $month; echo $year; exit;
	 //print_r($result); exit;
	 $data['dailywise']=$result;
	  $this->template->write_view('content', 'seller_admin/performance/performance_view', $data);
		$this->template->render();
	  
	  
  }
  
  }