<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Faqs extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
	   
	   //$data['sellerlocationdata'] = $this->Personnel_details_model->getlocations();
	  
		
		$this->template->write_view('content', 'seller/faq/index');
		$this->template->render();


	}
	



	
}	
	
	
	?>