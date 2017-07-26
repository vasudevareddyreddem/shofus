<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
			$this->load->model('category_model'); 
			
 }
 
 public function subcategoryview(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$this->template->write_view('content', 'customer/subcategoryview', $data);
	$this->template->render();
	
 }
 public function view(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_all_products($caterory_id);
	//echo $this->db->last_query();exit;
	$data['category_name']= $this->category_model->get_category($caterory_id);
	$data['stock']= $this->category_model->get_product_stock($caterory_id);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	
 }
 public function views(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_list_products($caterory_id);
	$data['listcategory']= $this->category_model->get_list_categories($caterory_id);
	//echo $this->db->last_query();exit;
//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryview', $data);
	$this->template->render();
	
 }
 public function categorysearch(){
	 

	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit;
	$stack = $post['sub_cat_id'];
	$uniqueid=array(0,1);
	  array_push($stack, $uniqueid);
	//$this->session->set_userdata('sessiontag',$stack);
	$this->session->set_userdata('billingaddress',$stack); 
	$dd=$this->session->userdata('billingaddress')	;
	echo '<pre>';print_r($dd);exit;
	
	array_push($stack, "0");
	print_r($stack);
	exit;

	
 }
  
 public function productview(){

	 
	$pid=base64_decode($this->uri->segment(3));

	//echo '<pre>';print_r($caterory_id);exit;
	$data['products_list']= $this->category_model->get_products($pid);
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	//echo '<pre>';print_r($data);exit;
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
 // public function show_compare(){
 // 	$pid=base64_decode($this->uri->segment(3));
	// $data['compore_products']= $this->category_model->get_products($pid);
	// $this->load->view('customer/show_compare',$data);

 // }
 
 public function productscompare()
 {

 	$pid=base64_decode($this->uri->segment(3));
 	$category_ld =base64_decode($this->uri->segment(4));
 	//print_r($category_ld);exit;
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['item']=$this->category_model->getsubitemdata($category_ld);
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }


	public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		//print_r($category_ld);exit;
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		//print_r($data);exit;
		$this->load->view('customer/compareone',$data);

	}
	public function compare_items_list_two()
	{
		$items=$this->input->post('item_id');
		$data['compare_two']=$this->category_model->getcompare_item_details($items);
		//print_r($data);exit;
		$this->load->view('customer/comparetwo',$data);
  		

	}	
}
?>