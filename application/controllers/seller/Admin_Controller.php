<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');
class Admin_Controller extends MY_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->model('admin/request_model');
      		$this->load->model('seller/dashboard_model');
      		$this->load->model('seller/Orders_model');
      		$this->load->model('seller/user_profile_model');
			$seller_id=$this->session->userdata('seller_id');
			$data['sellerdetails'] = $this->dashboard_model->get_seller_details($seller_id);
      		$result=$this->Orders_model->order_by('orders.created_at',$order = 'DESC')->new_orders();
			$data['ordersdata'] =  $result;
			$result['sellernotify'] =  $this->request_model->getdata();		
       		$data['catdata'] = $this->dashboard_model->getcatsubcat();
       		$data['bank_link'] = $this->dashboard_model->bank_status();
       		$result['profiles'] = $this->user_profile_model->profile_pic_get();
       		$result['bank_link'] = $this->dashboard_model->bank_status();
       		//echo "<pre>";print_r($data);exit;
			$this->template->set_template('seller');
			$this->template->write_view('header', 'seller/shared/header',$result);
			$this->template->write_view('sidebar', 'seller/shared/sidebar',$data);
			$this->template->write_view('footer', 'seller/shared/footer');
			if (!$seller_id) {
             return redirect(base_url('seller/login'));
		}

        
	}
}