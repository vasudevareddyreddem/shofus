<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url', 'html'));
			$this->load->library('session');
			$this->load->helper(array('url','html','form'));
			$this->load->model('category_model'); 
			
 }
 
 public function view(){
	 
	$caterory_id=$this->uri->segment(3) ;
	$data['products_list']= $this->category_model->get_all_products($caterory_id);
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 } 
 public function productview(){
	 
	$caterory_id=$this->uri->segment(3) ;
	$data['products_list']= $this->category_model->get_all_products($caterory_id);
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 }

	
	
}
?>