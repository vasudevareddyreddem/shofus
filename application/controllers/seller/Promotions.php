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

	public function storepromotions()
	{
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$var=array_values($post['cat_id']);
		foreach ($var as $value) {
			$int[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
		}
		foreach (array_unique($int) as $cat_ida) {
			
			
			if($post['offertype']==1 || $post['offertype']==2 || $post['offertype']==3){
				//echo "ddd";exit;
			$data1=array('offer_combo_item_id'=>'');
			$delete=$this->Promotions_model->delete_combo_offer_to_products($cat_ida,$data1);
	
			}
			$productprice=$this->Promotions_model->get_offer_product_price($cat_ida);
			$offer_price=($productprice['item_cost'] * $post['offeramount']);
			$offer_price_pertange=($offer_price / 100);
			//echo $offer_price;
			//echo '--';
			//echo $offer_price_pertange;
			//	echo '<pre>';print_r($productprice);exit;
			$data=array('offer_percentage'=>$post['offeramount'],'offer_amount'=>$offer_price_pertange,'offer_combo_item_id'=>$post['combo'],'offer_type'=>$post['offertype'],'offer_time'=>$post['offertime'],'offer_expairdate'=>$post['expairdate']);
			//echo '<pre>';print_r($data);
			$update=$this->Promotions_model->add_offer_to_products($cat_ida,$data);

			
		}
		if(count($update)>0){
			$data=array('msg'=>1);
			echo json_encode($data);
			$this->session->set_flashdata('success',"Offer successfully Updated!");
			redirect('seller/promotions');
		}
	
		
		
		
	}
	
	
}
	



	
	
	
	
	?>