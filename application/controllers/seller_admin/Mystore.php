<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Mystore extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('seller_admin/products_model');
		$this->load->model('seller_admin/Personnel_details_model');
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
	   
	   //$data['sellerlocationdata'] = $this->Personnel_details_model->getlocations();
	   $data['partsellerlocationdata'] = $this->Personnel_details_model->getsellerlocation();
	   $data['catitemdata'] = $this->products_model->getcatsubcatpro();
		
		$this->template->write_view('content', 'seller_admin/mystore/index', $data);
		$this->template->render();


	}
	



	
}	
	
	
	?>