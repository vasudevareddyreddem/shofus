<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Promotions extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
				$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/Promotions_model');
		$this->load->model('seller/products_model');
	}

	public function index()
	{		
		
		$data['seller_prducts']=$this->Promotions_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'seller/promotions/index', $data);
		$this->template->render();


	}

	public function seansonsalesoffer()
	{
		$post=$this->input->post();
		//echo '<pre>';print_r($post);
		$var=array_values($post['cat_id']);
		foreach ($var as $value) {
			$int[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
		}
		foreach (array_unique($int) as $cat_ida) {
		$itemcheck=$this->Promotions_model->item_already_exits($cat_ida);
			/* same item add again */
			if(($itemcheck['seller_id'] == $this->session->userdata('seller_id')) && ($itemcheck['expairdate'] >= date('Y-m-d')) ){
				$status=3;
			}else{
					$productprice=$this->Promotions_model->get_offer_product_price($cat_ida);
					$itemscount=$this->Promotions_model->items_counts_in_topoffers(date('Y-m-d'));
					
					//echo count($itemscount);exit;
					/*  item ccount checking purpose */
					if(count($itemscount)>100){
					$status=2;
					}else{
							$offer_price=($productprice['item_cost'] * $post['offeramount']);
							$offer_amount=($offer_price / 100);
							$date = date('Y-m-d h:i:s');
							$date1 = strtotime($date);
							$date2 = strtotime("+7 day", $date1);
							$data=array(
							'item_id'=>$cat_ida,
							'seller_id'=>$this->session->userdata('seller_id'),
							'category_id'=>$productprice['category_id'],
							'subcategory_id'=>$productprice['subcategory_id'],
							'offer_percentage'=>$post['offeramount'],
							'item_pirce'=>$productprice['item_cost'],
							'offer_amount'=>$offer_amount,
							'intialdate'=>date("Y-m-d H:i:s"),  
							'expairdate'=>date('Y-m-d h:i:s', $date2),
							'status'=>1,
							'area'=>$productprice['seller_location_area'],
							'create_at'=>date("Y-m-d H:i:s") 
							);			
							//echo '<pre>';print_r($data);
							$update=$this->Promotions_model->add_offer_to_products($data);
							$status=1;
					}

				}
		}
	
		if($status==1){
			$this->session->set_flashdata('success',"Offer successfully Added!");
		}else if($status==2){
			
		 $this->session->set_flashdata('error',"while adding it should come like 3 of 100 , 4 of 100...once limit completes, limit for top offers for this week has completed. add for next week.limit of top offers for this week has completed");	
		}else if($status==3){
		$this->session->set_flashdata('error',"Item already added.");	
			
		}
		$messages=array('msg'=>$status);
		echo json_encode($messages);
			
	//redirect('showups/addseasonsale');
}
public function addtopoffers()
	{
		$post=$this->input->post();
		//echo '<pre>';print_r($post);
		$var=array_values($post['cat_id']);
		foreach ($var as $value) {
			$int[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
		}
		foreach (array_unique($int) as $cat_ida) {
		$itemcheck=$this->Promotions_model->topoffer_item_already_exits($cat_ida);
			/* same item add again */
			if(($itemcheck['seller_id'] == $this->session->userdata('seller_id')) && ($itemcheck['expairdate'] >= date('Y-m-d')) ){
				$status=3;
			}else{
					$productprice=$this->Promotions_model->get_offer_product_price($cat_ida);
					$itemscount=$this->Promotions_model->topoffer_items_counts_in_topoffers(date('Y-m-d'));
					
					//echo count($itemscount);exit;
					/*  item ccount checking purpose */
					if(count($itemscount)>100){
					$status=2;
					}else{
							$offer_price=($productprice['item_cost'] * $post['offeramount']);
							$offer_amount=($offer_price / 100);
							$date = date('Y-m-d h:i:s');
							$date1 = strtotime($date);
							$date2 = strtotime("+7 day", $date1);
							$data=array(
							'item_id'=>$cat_ida,
							'seller_id'=>$this->session->userdata('seller_id'),
							'category_id'=>$productprice['category_id'],
							'subcategory_id'=>$productprice['subcategory_id'],
							'offer_percentage'=>$post['offeramount'],
							'item_pirce'=>$productprice['item_cost'],
							'offer_amount'=>$offer_amount,
							'intialdate'=>date("Y-m-d H:i:s"),  
							'expairdate'=>date('Y-m-d h:i:s', $date2),
							'status'=>1,
							'area'=>$productprice['seller_location_area'],
							'create_at'=>date("Y-m-d H:i:s") 
							);			
							//echo '<pre>';print_r($data);
							$update=$this->Promotions_model->add_topoffer_to_products($data);
							$status=1;
					}

				}
		}
	
		if($status==1){
			$this->session->set_flashdata('success',"Offer successfully Added!");
		}else if($status==2){
			
		 $this->session->set_flashdata('error',"while adding it should come like 3 of 100 , 4 of 100...once limit completes, limit for top offers for this week has completed. add for next week.limit of top offers for this week has completed");	
		}else if($status==3){
		$this->session->set_flashdata('error',"Item already added.");	
			
		}
		$messages=array('msg'=>$status);
		echo json_encode($messages);
			
	//redirect('showups/addseasonsale');
}
public function dealsoftheday()
	{
		$post=$this->input->post();
		//echo '<pre>';print_r($post);
		$var=array_values($post['cat_id']);
		foreach ($var as $value) {
			$int[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
		}
		foreach (array_unique($int) as $cat_ida) {
		$itemcheck=$this->Promotions_model->dealsoftheday_item_already_exits($cat_ida);
			/* same item add again */
			if(($itemcheck['seller_id'] == $this->session->userdata('seller_id')) && ($itemcheck['expairdate'] >= date('Y-m-d')) ){
				$status=3;
			}else{
					$productprice=$this->Promotions_model->get_offer_product_price($cat_ida);
					$itemscount=$this->Promotions_model->dealsoftheday_items_counts_in_topoffers(date('Y-m-d'));
					
					//echo count($itemscount);exit;
					/*  item ccount checking purpose */
					if(count($itemscount)>100){
					$status=2;
					}else{
							$offer_price=($productprice['item_cost'] * $post['offeramount']);
							$offer_amount=($offer_price / 100);
							$date = date('Y-m-d h:i:s');
							$date1 = strtotime($date);
							$date2 = strtotime("+1 day", $date1);
							$data=array(
							'item_id'=>$cat_ida,
							'seller_id'=>$this->session->userdata('seller_id'),
							'category_id'=>$productprice['category_id'],
							'subcategory_id'=>$productprice['subcategory_id'],
							'offer_percentage'=>$post['offeramount'],
							'item_pirce'=>$productprice['item_cost'],
							'offer_amount'=>$offer_amount,
							'intialdate'=>date("Y-m-d H:i:s"),  
							'expairdate'=>date('Y-m-d h:i:s', $date2),
							'status'=>1,
							'area'=>$productprice['seller_location_area'],
							'create_at'=>date("Y-m-d H:i:s") 
							);			
							//echo '<pre>';print_r($data);
							$update=$this->Promotions_model->add_dealsoftheday_to_products($data);
							$status=1;
					}

				}
		}
	
		if($status==1){
			$this->session->set_flashdata('success',"Offer successfully Added!");
		}else if($status==2){
			
		 $this->session->set_flashdata('error',"while adding it should come like 3 of 100 , 4 of 100...once limit completes, limit for top offers for this week has completed. add for next week.limit of top offers for this week has completed");	
		}else if($status==3){
		$this->session->set_flashdata('error',"Item already added.");	
			
		}
		$messages=array('msg'=>$status);
		echo json_encode($messages);
			
	//redirect('showups/addseasonsale');
}
	
	
}
	



	
	
	
	
	?>