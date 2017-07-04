<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/Front_Controller.php');



class Front_Controller extends MY_Controller {

	public function __construct() {
			
			//echo "hello";exit;

				parent::__construct();
				$this->load->library('cart');
				$this->load->model('home_model');
				
					$data['catitemdata'] = $this->home_model->getcatsubcatpro();
					$data['catitemdata1'] = $this->home_model->getcatsubcatpro();
					$data['cnt']= count($data['catitemdata1']);
					$data['catdata'] = $this->home_model->getcatsubcat();
					$data['locationdata'] = $this->home_model->getlocations();
					
					//echo '<pre>';print_r($customerdetails);exit;
					if($this->session->userdata('userdetails')){
					$customerdetails=$this->session->userdata('userdetails');

					$data['cartitemcount'] = $this->home_model->cart_item_count($customerdetails['customer_id']);
					}else{
					$data['cartitemcount'] =0;	
					}
					//echo '<pre>';print_r($data['cartitemcount']);exit;
					$this->template->set_template('website'); 
					$this->template->write_view('header', 'shared/header',$data);
					$this->template->write_view('footer', 'shared/footer');
				}

}