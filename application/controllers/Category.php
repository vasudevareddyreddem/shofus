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
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['products_list']= $this->category_model->get_all_products($caterory_id);
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 } 
 public function productview(){
	 
	$pid=base64_decode($this->uri->segment(3));
	//echo '<pre>';print_r($caterory_id);exit;
	$data['products_list']= $this->category_model->get_products($pid);
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 }
 public function productreview(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	);
	$savereview= $this->category_model->save_review($details);
	if(count($savereview)>0){
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}

	//echo '<pre>';print_r($data);exit;
 }

	
	
}
?>