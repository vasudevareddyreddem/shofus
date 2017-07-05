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
 
 public function view(){
	 
	echo $caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_all_products($caterory_id);
	$data['category_name']= $this->category_model->get_category($caterory_id);
	$data['stock']= $this->category_model->get_product_stock($caterory_id);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	
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
 
 public function productscompare(){
 	$pid=base64_decode($this->uri->segment(3));
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['subcatdata']=$this->category_model->getsubcatdata();
	$data['item']=$this->category_model->getsubitemdata();
	//$data['compare_item']=$this->category_model->getcompare_item();
		//echo "<pre>";print_r($result);exit;
	 //$data['item']=$this->category_model->getsubitemdata($subcat);
	 //print_r($data);exit;
	
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }




 // public function getitems()
	// {
	// $subcat=$this->input->post('subcategory_id');
	// $result=$this->category_model->getsubitemdata($subcat);
	// //print_r($result);exit;
	
	// echo '<option value="">Select item</option>';
	// foreach($result as $alldata)
	// {
	// echo '<option value="'.$alldata->item_id.'">'.$alldata->item_name.'</option>';
	// }
	// exit;	
	// }

	public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$data['deials']=$this->category_model->getcompare_item_details($items);
		$this->load->view();
		//echo json_encode($data);
		//$data['html'] = $this->load->view( 'customer/compare', $data, TRUE ); //3rd parameter TRUE to return view instead of immediately outputtig it
		echo json_encode($data); 
		//$this->template->write_view('content', 'customer/compare',$data);
		//$this->template->render();
		//echo '<pre>';print_r($data);exit;
  		

	}	
}
?>