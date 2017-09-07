<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/Front_Controller.php');
class Front_Controller extends MY_Controller {

	public function __construct() {
			parent::__construct();
				$this->load->library('cart');
				$this->load->model('home_model');
				
				$data['allcategories_list']= $this->home_model->get_all_category_with_products();
				$data['sidecaregory_list']= $this->home_model->get_sidebar_category_list();
				$data['locationdata'] = $this->home_model->getlocations();
					if($this->session->userdata('userdetails')){
					$customerdetails=$this->session->userdata('userdetails');
						$data['cartitemcount'] = $this->home_model->cart_item_count($customerdetails['customer_id']);
						$data['details'] = $this->home_model->customer_details($customerdetails['customer_id']);
					}else{
					$data['cartitemcount'] =0;
					$data['details'] = '';					
					}
					//echo '<pre>';print_r($data);exit;
					$this->template->set_template('website'); 
					$this->template->write_view('header', 'shared/header',$data);
					$this->template->write_view('footer', 'shared/footer');
				}

}