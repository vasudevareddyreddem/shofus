<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class CustomerApi extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->helper(array('url', 'html'));
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Customerapi_model');
		//$this->load->model('seller/Promotions_model');
	}
    
	/*  register Apis */

	public function register_post()
	{
		
		$username=$this->input->get('username');
		$password=$this->input->get('password');	
		if($username==''){
		$message = array('status'=>0,'message'=>'Username id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}elseif($password==''){
		$message = array('status'=>0,'message'=>'Password is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}
		$cheking =$this->Customerapi_model->mobile_checking($username);
		if(count($cheking)>0){
				$message = array('status'=>0,'message'=>'Mobile number / Email id already exits!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
			$email =filter_var($username, FILTER_VALIDATE_EMAIL);
				if($email==''){
					$mobile=$username;
					$email='';
				}else{
					$mobile='';
					$email=$username;
				}
			$details=array(
				'cust_email'=>$email,
				'cust_mobile'=>$mobile,
				'cust_password'=>md5($password),
				'role_id'=>1,
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$customerdetails = $this->Customerapi_model->save_customer($details);
				if(count($customerdetails)>0){
						$message = array('status'=>1,'cust_id'=>$customerdetails, 'message'=>'Registration successfully completed!');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'!Invalida login details.Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			
		}
		
	
	}
	/* login post*/
	public function login_post()
	{
		$username=$this->input->get('username');
		$password=$this->input->get('password');	
		if($username==''){
		$message = array('status'=>0,'message'=>'Username id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}elseif($password==''){
		$message = array('status'=>0,'message'=>'Password is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}
		$logindetails=$this->Customerapi_model->login_customer($username,$password);
		if(count($logindetails)>0){
						$message = array('status'=>1,'details'=>$logindetails, 'message'=>'Customer details are found');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'!Invalida login details.Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	
	}
	
	/*  Set Password Apis */
	public function socialregister_post()
	{
		$get = $this->input->get(); 
		$mobile = preg_match('/^[0-9]{10}+$/',$get['social_login']);

		if($mobile==1){
			$mobile_store = $get['social_login'];
		}else{
			$mobile_store =NULL;
		}
		$email =filter_var($get['social_login'], FILTER_VALIDATE_EMAIL);
		 if($email==$get['social_login']){
		 	$email_store = $get['social_login'];
		 }else{
		 	$email_store = NULL;
		 }
		 $social=array(
				'cust_email'=>$email_store,
				'cust_mobile'=>$mobile_store,
				'role_id'=>1,
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$stroe_social_details = $this->Customerapi_model->save_customer($social);
				if(count($stroe_social_details)>0){
					$message = array('status'=>1,'customer_id'=>$stroe_social_details,'message'=>'Register Successfully');
					$this->response($message, REST_Controller::HTTP_OK);
				}

	}

	/*  Set Password Apis */
	public function setpassword_post()
	{
		$get=$this->input->get();
		//echo "<pre>";print_r($get);exit;
		$password=md5($get['password']);		
		$confirmpassword=md5($get['confirm_password']);
		if($password == $confirmpassword){
			$data=array(
				'cust_password'=>$confirmpassword,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$storepass = $this->Customerapi_model->set_customer_password($get['customer_id'],$confirmpassword);
				if(count($storepass)>0){

					$message = array('status'=>1,'customer_id'=>$get['customer_id'],'message'=>' Successfully Set Your Password');
					$this->response($message, REST_Controller::HTTP_OK);
				}
		}else{
			$message = array('status'=>0,'message'=>'Password And confirmpassword Does Not Match');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}

	}
	/* otp vwrification */
	public function  otpverification_post()
	{	
			$get=$this->input->get();
			$otp_verifing=$this->Customerapi_model->customer_details($get['customer_id']);
			//echo "<pre>";print_r($otp_verifing);exit;			
			if($otp_verifing['otp_verification'] == $get['otp'])
			{
					$otp=$this->Customerapi_model->verifing_otp($get['customer_id'],1);

					if(count($otp)>0){
						
						$message = array('status'=>1,'customer_id'=>$get['customer_id'],'message'=>'Your Otp is verified!');
						$this->response($message, REST_Controller::HTTP_OK);
					}
			}else{
				$message = array('status'=>0,'message'=>'Invalid verification code. Please try again.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

	}
	/* add to cart */
	public function addtocart_post(){
		
	$customer_id=$this->input->get('customer_id');
	$item_id=$this->input->get('item_id');	
	$qty=$this->input->get('qty');
	if($customer_id==''){
		$message = array('status'=>1,'message'=>'Customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}elseif($item_id==''){
		$message = array('status'=>1,'message'=>'Item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}else if($qty==''){
		$message = array('status'=>1,'message'=>'Qty is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}
	$cart_item_ids= $this->Customerapi_model->get_cart_products($customer_id);
		foreach($cart_item_ids as $cartids) 
		{ 		
			$cart_id[]=$cartids['item_id'];
		}
		if(in_array($item_id,$cart_id))
		{
			$message = array('status'=>1,'message'=>'Product already exits');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
				$products= $this->Customerapi_model->get_product_details($item_id);
				$currentdate=date('Y-m-d h:i:s A');
				if($products['offer_expairdate']>=$currentdate){
						$item_price= ($products['item_cost']-$products['offer_amount']);
						$price	=(($qty) * ($item_price));
				}else{
					//echo "expired";
					$item_price= $products['special_price'];
					$price	=(($qty) * ($item_price));
				}
				$commission_price=(($price)*($products['commission'])/100);
				if($products['category_id']==18){
						if($price <500){
							$delivery_charges=35;
						}else{
							$delivery_charges=0;
						}
					}else{
						
						if($price <500){
							$delivery_charges=75;
						}else if(($price > 500) && ($price < 1000)){
							$delivery_charges=35;
						}else if($price >1000){
							$delivery_charges=0;
						}
					}
					//echo '<pr>';print_r($products);exit;
					$adddata=array(
						'cust_id'=>$customer_id,
						'item_id'=>$item_id,
						'qty'=>$qty,
						'item_price'=>$item_price,
						'total_price'=>$price,
						'commission_price'=>$commission_price,
						'delivery_amount'=>$delivery_charges,
						'seller_id'=>$products['seller_id'],
						'category_id'=>$products['category_id'],
						'create_at'=>date('Y-m-d H:i:s'),
					);
					$cart_save= $this->Customerapi_model->cart_products_save($adddata);
					if(count($cart_save)>0){
						$message = array('status'=>1,'message'=>'Product Successfully added to the cart');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}
	
	
		
	}
	/*remove item in cart*/
	public function removeitemincart_post()
	{
		$customer_id=$this->input->get('customer_id');
		$item_id=$this->input->get('item_id');	
		$cart_id=$this->input->get('id');	
			if($customer_id==''){
				$message = array('status'=>1,'message'=>'Customer id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
			}elseif($item_id==''){
				$message = array('status'=>1,'message'=>'Item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
			}else if($cart_id==''){
				$message = array('status'=>1,'message'=>'Id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$cart_item_ids= $this->Customerapi_model->get_cart_products($customer_id);
			//echo '<pre>';print_r($cart_item_ids);exit;
			foreach($cart_item_ids as $cartids) 
			{ 		
				$incart_id[]=$cartids['id'];
				$initem_id[]=$cartids['item_id'];
			}
			if(!in_array($item_id,$initem_id))
			{
				$message = array('status'=>1,'message'=>'Product not exits.Please try again');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(!in_array($cart_id,$incart_id)){
				$message = array('status'=>1,'message'=>'Product not exits.Please try again');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
				$delete= $this->Customerapi_model->delete_cart_item($customer_id,$item_id,$cart_id);
				if(count($delete)>0){
						$message = array('status'=>1,'message'=>'cart Item Successfully Removed!');
						$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
	}
	/*update cart*/
	public function updatecart_post(){
		
	$customer_id=$this->input->get('customer_id');
	$item_id=$this->input->get('item_id');	
	$qty=$this->input->get('qty');
	$cart_id=$this->input->get('id');	
	if($customer_id==''){
		$message = array('status'=>1,'message'=>'Customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}elseif($item_id==''){
		$message = array('status'=>1,'message'=>'Item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}else if($qty==''){
		$message = array('status'=>1,'message'=>'Qty is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}else if($cart_id==''){
		$message = array('status'=>1,'message'=>'Id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}
	$cart_item_ids= $this->Customerapi_model->get_cart_products($customer_id);
		foreach($cart_item_ids as $cartids) 
		{ 		
			$cart_ids[]=$cartids['item_id'];
		}
		if(!in_array($item_id,$cart_ids))
		{
			$message = array('status'=>1,'message'=>'Product nots exits');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
				$products= $this->Customerapi_model->get_product_details($item_id);
				$currentdate=date('Y-m-d h:i:s A');
				if($products['offer_expairdate']>=$currentdate){
						$item_price= ($products['item_cost']-$products['offer_amount']);
						$price	=(($qty) * ($item_price));
				}else{
					//echo "expired";
					$item_price= $products['special_price'];
					$price	=(($qty) * ($item_price));
				}
				$commission_price=(($price)*($products['commission'])/100);
				if($products['category_id']==18){
						if($price <500){
							$delivery_charges=35;
						}else{
							$delivery_charges=0;
						}
					}else{
						
						if($price <500){
							$delivery_charges=75;
						}else if(($price > 500) && ($price < 1000)){
							$delivery_charges=35;
						}else if($price >1000){
							$delivery_charges=0;
						}
					}
					//echo '<pr>';print_r($products);exit;
					$updatadata=array(
						'cust_id'=>$customer_id,
						'item_id'=>$item_id,
						'qty'=>$qty,
						'item_price'=>$item_price,
						'total_price'=>$price,
						'commission_price'=>$commission_price,
						'delivery_amount'=>$delivery_charges,
						'seller_id'=>$products['seller_id'],
						'category_id'=>$products['category_id'],
						'create_at'=>date('Y-m-d H:i:s'),
					);
					//echo '<pr>';print_r($adddata);exit;
					$update_data= $this->Customerapi_model->update_cart_item_quentity($customer_id,$item_id,$cart_id,$updatadata);
					if(count($update_data)>0){
						$message = array('status'=>1,'message'=>'Product Successfully Updated to the cart');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}
	
	
		
	}
	
	/*update cart*/
	public function cartitemlist_get()
	{
		$customer_id=$this->input->get('customer_id');
		if($customer_id==''){
				$message = array('status'=>1,'message'=>'Customer id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
		}
		$cart_item_ids= $this->Customerapi_model->get_cart_products($customer_id);
		$item_lists_count= $this->Customerapi_model->get_cart_products_list_count($customer_id);
		foreach($cart_item_ids as $cartids) 
		{ 		
			$cart_ids[]=$cartids['cust_id'];
		}
		$item_lists= $this->Customerapi_model->get_cart_products_list($customer_id);
		//echo '<pre>';print_r($item_lists);exit;
		if(!in_array($customer_id,$cart_ids))
		{
			$message = array('status'=>1,'message'=>'Customer having  no products in the cart');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
			$message = array('status'=>1,'message'=>'cart items list','list'=>$item_lists,'count'=>$item_lists_count['count']);
			$this->response($message,REST_Controller::HTTP_OK);
		}
	}
	/*alraedy wishlist Items in wishlist*/
	public function alreadyitemidwishlist_get()
	{
		
		
		$item_lists= $this->Customerapi_model->get_all_wish_lists_ids();
		//echo '<pre>';print_r($item_lists);exit;
		if(count($item_lists)>0)
		{
			$message = array('status'=>1,'message'=>'wishlist ids list','list'=>$item_lists);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>1,'message'=>'wishlist ids are not fount');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* cart list*/
	/* add wishlists */ 
	public function addwishlist_post()
	{
		$customer_id=$this->input->get('customer_id');
		$item_id=$this->input->get('item_id');	
			if($customer_id==''){
				$message = array('status'=>0,'message'=>'Customer id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
			}elseif($item_id==''){
				$message = array('status'=>0,'message'=>'Item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
			}
		$wish_list_ids= $this->Customerapi_model->get_wish_list_products($customer_id);
		foreach($wish_list_ids as $cartids) 
		{ 		
			$wish_ids[]=$cartids['item_id'];
		}
		//echo '<pre>';print_r($cart_ids);exit;
		if(in_array($item_id,$wish_ids))
		{
			$message = array('status'=>0,'message'=>'product already added in wishlist');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
			$data=array(
			'cust_id'=>$customer_id,
			'item_id'=>$item_id,
			'create_at'=>date('Y-m-d H:i:s'),
			'yes'=>1,
			);
			$wish=$this->Customerapi_model->wishlist_save($data);
				if(count($wish)>0){
				$message = array('status'=>1,'message'=>'Product Successfully Added to the wishlists');
				$this->response($message, REST_Controller::HTTP_OK);
				}else{
				$message = array('status'=>0,'message'=>'Technical problem occured try again later!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
		
		}
	/* wishlist get api */
	public function wishlists_get()
	{
		$customer_id=$this->input->get('customer_id');
			if($customer_id==''){
			$message = array('status'=>1,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		$wishlist = $this->Customerapi_model->get_customer_whishlists($customer_id);
		$wishlistcount = $this->Customerapi_model->get_customer_whishlists_count($customer_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($wishlist)>0){
			foreach($wishlist as $cartids) 
		{ 		
			$cart_ids[]=$cartids['cust_id'];
		}
		//echo '<pre>';print_r($cart_ids);exit;
		if(!in_array($customer_id,$cart_ids))
		{
			$message = array('status'=>1,'message'=>'Customer having  no products in the wishlist');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
			$message = array('status'=>1,'message'=>'wishlist items list','list'=>$wishlist,'count'=>$wishlistcount['count']);
			$this->response($message,REST_Controller::HTTP_OK);
		}
		}else{
			$message = array('status'=>1,'message'=>'Customer having  no products in the wishlist');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}/* wishlist get api */
	public function orderlist_get()
	{
		$customer_id=$this->input->get('customer_id');
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		$order_list=$this->Customerapi_model->order_list($customer_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($order_list)>0){
		
			$message = array('status'=>1,'message'=>'order list','list'=>$order_list);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Customer having  no orders');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* for order details*/
	public function orderdetails_get()
	{
		$customer_id=$this->input->get('customer_id');
		$order_item_id=$this->input->get('order_item_id');
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($order_item_id==''){
			$message = array('status'=>0,'message'=>'Order Item id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
				$customer_items= $this->Customerapi_model->get_order_items_lists($customer_id);

				foreach ($customer_items as $order_ids){
					$ids[]=$order_ids['order_item_id'];
				}
				
				if(in_array($order_item_id, $ids)){
					
					$item_details= $this->Customerapi_model->get_order_items_list($customer_id,$order_item_id);
					$message = array('status'=>1,'message'=>'order details are found','order details'=>$item_details);
					$this->response($message,REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'You have no permissions');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		
	}
	/* prduct details page*/
	public function productdetails_get()
	{
		$item_id=$this->input->get('item_id');
			if($item_id==''){
			$message = array('status'=>0,'message'=>'Item id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		$product_details=$this->Customerapi_model->product_details($item_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($product_details)>0){
		
			$message = array('status'=>1,'path'=>'http://cartinhour.com/uploads/products/','message'=>'product details','details'=>$product_details);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'product Id is not valid one');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* product track details page*/
	public function ordertrack_get()
	{
		$customer_id=$this->input->get('customer_id');
			if($customer_id==''){
			$message = array('status'=>1,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$customer_orders_track_detals= $this->Customerapi_model->get_order_items_track_list($customer_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($customer_orders_track_detals)>0){
		
			$message = array('status'=>1,'message'=>'order track details','track details'=>$customer_orders_track_detals);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>1,'message'=>'customer having no orders');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* product review list */
	public function reviewlist_get()
	{
		$item_id=$this->input->get('item_id');
			if($item_id==''){
			$message = array('status'=>1,'message'=>'item id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$review_details= $this->Customerapi_model->get_products_reviews($item_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($review_details)>0){
		
			$message = array('status'=>1,'count'=>count($review_details),'message'=>'product review details','list'=>$review_details);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>1,'message'=>'product having no review');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* homesearch  api */
	public function homesearch_get()
	{
		$searchvalue=$this->input->get('searchvalue');
			if($searchvalue==''){
			$message = array('status'=>1,'message'=>'search value is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$data1 = $this->Customerapi_model->get_search_functionality_products($searchvalue);
			$data2 = $this->Customerapi_model->get_search_functionality_sub_category($searchvalue);
			$search=array_merge($data1,$data2);
		if(count($search)>0){
		
			$message = array('status'=>1,'message'=>'result list are found.','list'=>$search);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>1,'message'=>'No result found');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/* delete wishlist  api */
	public function deletewishlist_post()
	{
	$customer_id=$this->input->get('customer_id');
	$item_id=$this->input->get('item_id');	
	$wish_id=$this->input->get('id');	
	if($customer_id==''){
		$message = array('status'=>1,'message'=>'Customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}elseif($item_id==''){
		$message = array('status'=>1,'message'=>'Item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}else if($wish_id==''){
		$message = array('status'=>1,'message'=>'Id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}
	
	$wish_list_ids= $this->Customerapi_model->get_wish_list_products($customer_id);
		foreach($wish_list_ids as $cartids) 
		{ 		
			$wish_ids[]=$cartids['id'];
			$wishitem_ids[]=$cartids['item_id'];
		}
		//echo '<pre>';print_r($cart_ids);exit;
		if(!in_array($wish_id,$wish_ids))
		{
			$message = array('status'=>1,'message'=>'product not exits');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if(!in_array($item_id,$wishitem_ids))
		{
			$message = array('status'=>1,'message'=>'product not exits');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}else{
				$wishlist_delete= $this->Customerapi_model->customer_wishlist_delete($customer_id,$item_id,$wish_id);
				if(count($wishlist_delete)>0){
				$message = array('status'=>1,'message'=>'Wishlist Item Successfully deleted');
				$this->response($message, REST_Controller::HTTP_OK);
				}else{
				$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}

		}
	
	}
	/* add review  api */
	public function productreview_post()
	{
	$customer_id=$this->input->get('customer_id');
	$product_id=$this->input->get('product_id');	
	$email=$this->input->get('email');	
	$name=$this->input->get('name');	
	$Rate=$this->input->get('Rate');	
	$review=$this->input->get('review');	
	$seller_id=$this->input->get('seller_id');	
	if($customer_id==''){
		$message = array('status'=>0,'message'=>'Customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}elseif($product_id==''){
		$message = array('status'=>0,'message'=>'Product id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
	}else if($email==''){
		$message = array('status'=>0,'message'=>'Email is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}else if($name==''){
		$message = array('status'=>0,'message'=>'Name is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}else if($review==''){
		$message = array('status'=>0,'message'=>'Review is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}else if($seller_id==''){
		$message = array('status'=>0,'message'=>'seller id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
	}
	
	$details=array(
	'customer_id'=>$customer_id,
	'item_id'=>$product_id,
	'name'=>$name,
	'email'=>$email,
	'review_content'=>$review,
	'seller_id'=>$seller_id,
	'create_at'=>date('Y-m-d H:i:s A'),
	);
	$savereview= $this->Customerapi_model->save_review($details);
		if(count($savereview)>0){
			
			if($Rate!=''){
				$addrataing=array(
				'customer_id'=>$customer_id,
				'review_id'=>$savereview,
				'item_id'=>$product_id,
				'name'=>$name,
				'email'=>$email,
				'rating'=>$Rate,
				'seller_id'=>$seller_id,
				'create_at'=>date('Y-m-d H:i:s A'),
			);
			$saverating= $this->Customerapi_model->save_rating($addrataing);
			}
			$message = array('status'=>1,'message'=>'review Successfully Submitted');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Technical problem occured try again later!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}

	
	}
	
	/*  forgotpassword Apis */
	public function forgotpassword_post()
	{
		$username=$this->input->get('username');
		if($username==''){
		$message = array('status'=>0,'message'=>'username is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$email =filter_var($username, FILTER_VALIDATE_EMAIL);
		if($email==''){
			$mobile=$username;
			$email='';
		}else{
			$mobile='';
			$email=$username;
		}
		$forgotpasscheck = $this->Customerapi_model->forgot_login($username);
		if(count($forgotpasscheck)>0){
			
					$six_digit_random_number = mt_rand(100000, 999999);
					$username=$this->config->item('smsusername');
					$pass=$this->config->item('smspassword');
					if($mobile!=''){		
						$msg=' Your cartinhour verification code is '.$six_digit_random_number;
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=SUCCES&phone="'.$mobile.'"&text="'.$msg.'"&priority=ndnd&stype=normal');
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
						//echo '<pre>';print_r($server_output);exit;
						$this->Customerapi_model->login_verficationcode_mobile_save($mobile,$forgotpasscheck['customer_id'],$six_digit_random_number);
						$message = array('status'=>1,'customer_id'=>$forgotpasscheck['customer_id'],'message'=>'Verification code send to your MobileNumber Id.check it once');

					}else if(isset($email) && $email!=''){
						
							$msg='Greetings! You are just a step away from accessing your Cartinhour account We are sharing a verification code to access your account. Once you have verified the code, you will be prompted to set a new password immediately. This is to ensure that only you have access to your account. Verification code is: '.$six_digit_random_number;
							$this->load->library('email');
							$this->email->from('admin@cartinhour.com', 'CartInHour');
							$this->email->to($email);
							$this->email->subject('CartInHour - Forgot Password');
							$html =$msg;
							//echo $html;exit;
							$this->email->message($html);
							$this->email->send();
							$this->Customerapi_model->login_verficationcode_save($email,$forgotpasscheck['customer_id'],$six_digit_random_number);
							$message = array('status'=>1,'customer_id'=>$forgotpasscheck['customer_id'],'message'=>'Verification code send to your Email Id.check it once');
					}
				
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
				if($email!=''){
					$message = array('status'=>0,'message'=>'Invalid Email Id. Please use another Email Id');
				}else if($mobile!=''){
					$message = array('status'=>0,'message'=>'Invalid Mobile Number. Please use another Mobile Number');
				}
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}

				
	}
	public function resetpassword_post(){
		
			$customer_id=$this->input->get('customer_id');
			$otp=$this->input->get('otp');	
			$password=$this->input->get('password');	
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);

			}elseif($otp==''){
			$message = array('status'=>0,'message'=>'OTP is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($password==''){
			$message = array('status'=>0,'message'=>'Password is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$otpverification = $this->Customerapi_model->check_opt_mobile($customer_id,$otp);
			if(count($otpverification)>0){
				$resetpassword = $this->Customerapi_model->update_password($password,$customer_id);
				if(count($resetpassword)>0){
					$this->Customerapi_model->update_password_remove_otp($customer_id,'');
					$message = array('status'=>1,'message'=>'Password successfully Updated');
					$this->response($message, REST_Controller::HTTP_OK);	
				}else{
					$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
				

			}else{
				$message = array('status'=>0,'message'=>'Verification code is Wrong.Please try again');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		
	}
	public function savecustomerprofile_post(){
		
			$customer_id=$this->input->get('customer_id');
			$fname=$this->input->get('fname');	
			$lname=$this->input->get('lname');	
			$email=$this->input->get('email');	
			$mobile=$this->input->get('mobile');	
			$address1=$this->input->get('address1');	
			$address2=$this->input->get('address2');	
			$area=$this->input->get('location');	
			$image=$this->input->get('profilepic');	
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);

			}elseif($fname==''){
			$message = array('status'=>0,'message'=>'First Name is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($lname==''){
			$message = array('status'=>0,'message'=>'Last Name is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($email==''){
			$message = array('status'=>0,'message'=>'Email is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($mobile==''){
			$message = array('status'=>0,'message'=>'Mobile is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($address1==''){
			$message = array('status'=>0,'message'=>'Address1 is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$customer_details=$this->Customerapi_model->get_customer_details($customer_id);
			
			if($customer_details['cust_email]']=='' && $customer_details['cust_email']!=$email){
				$email_check=$this->Customerapi_model->email_check($email);
				if(count($email_check)>0){
					$message = array('status'=>0,'message'=>'EmailId Already Exits.please use another Email Id');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
			$saveprofile=array(
					'cust_firstname'=>$fname,
					'cust_lastname'=>$lname,
					'cust_email'=>$email,
					'cust_mobile'=>$mobile,
					'address1'=>$address1,
					'address2'=>isset($address2)?$address2:'',
					'area'=>isset($area)?$area:'',
					'cust_propic'=>isset($image)?$image:'',
					'create_at'=>date('Y-m-d H:i:s'),
					);

					$saveprofile = $this->Customerapi_model->save_customer_profile($customer_id,$saveprofile);
					if(count($saveprofile)>0){
						$message = array('status'=>1,'customer_id'=>$customer_id,'message'=>'profile successfully Updated');
						$this->response($message, REST_Controller::HTTP_OK);	
					}else{
						$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			
			
				
	}
	public function changepassword_post(){
		
			$customer_id=$this->input->get('customer_id');
			$oldpassword=$this->input->get('oldpassword');	
			$confirmpassword=$this->input->get('confirmpassword');	
			
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);

			}elseif($oldpassword==''){
			$message = array('status'=>0,'message'=>'Oldpassword is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($confirmpassword==''){
			$message = array('status'=>0,'message'=>'Confirmpassword is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$checkoldpassword = $this->Customerapi_model->oldpassword($customer_id,$oldpassword);
			if(count($checkoldpassword)>0){
					$changepassword = $this->Customerapi_model->set_customer_password($customer_id,$confirmpassword);
					//echo $this->db->last_query();exit;
					if(count($changepassword)>0){
						$message = array('status'=>1,'customer_id'=>$customer_id,'message'=>'password successfully Updated');
					$this->response($message, REST_Controller::HTTP_OK);	
					}else{
						$message = array('status'=>0,'customer_id'=>$customer_id,'message'=>'Technical problem will occurred .Please try again');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}else{
				$message = array('status'=>0,'customer_id'=>$customer_id,'message'=>'Old password is wrong .please try again');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

				
	}
	/* customer profile*/	
	public function customer_profile_get()
	{
		$customer_id=$this->input->get('customer_id');
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		$cust_details=$this->Customerapi_model->customer_details($customer_id);
		//echo '<pre>';print_r($wishlist);exit;
		if(count($cust_details)>0){
		
			$message = array('status'=>1,'profilepicpath'=>'http://cartinhour.com/uploads/profile/','message'=>'customer profile details','details'=>$cust_details);
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Customer details  not found');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/*  locations Apis */
	public function locations_get()
	{
		$locations=$this->Customerapi_model->get_locations_list();
		//echo '<pre>';print_r($locations);exit;
		if(count($locations)>0){
			$message = array('status'=>1,'locations_list'=>$locations);
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Locations list are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	/*  home page banners Apis */
	public function homepagebanners_get()
	{
		$banners=$this->Customerapi_model->home_page_banners();
		//echo '<pre>';print_r($banners);exit;
		if(count($banners)>0){
			$message = array(
				'status'=>1,
				'banners_list'=>$banners,
				'path'=>'http://cartinhour.com/uploads/banners/'
			);
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Home Banners are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*  Topoffers Apis */
	public function topoffers_get()
	{

		$top_offers = $this->Customerapi_model->top_offers_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($top_offers)>0){
			$message = array(
				'status'=>1,
				'top_offers'=>$top_offers,
				'path'=>'http://cartinhour.com/uploads/products/'
			);
			//$top_offers['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Top Offers are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*  deals of the day Apis */
	public function dealsoftheday_get()
	{
		$deals = $this->Customerapi_model->deals_of_the_day_list();
		//echo '<pre>';print_r($deals);exit;
		if(count($deals)>0){
			$message = array(
				'status'=>1,
				'dealsoftheday'=>$deals,
				'path'=>'http://cartinhour.com/uploads/products/'
			);
			//$deals['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Deals of The Day are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*  season sales Apis */
	public function seasonsales_get()
	{
		$ssales = $this->Customerapi_model->season_sales_list();
		//echo '<pre>';print_r($ssales);exit;
		if(count($ssales)>0){
			$message = array(
				'status'=>1,
				'Seasonsales'=>$ssales,
				'path'=>'http://cartinhour.com/uploads/products/'
			);
			//$ssales['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Season Sales are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*  trending products Apis */
	public function trendigproducts_get()
	{
		$treding = $this->Customerapi_model->treding_products_list();
		//echo '<pre>';print_r($treding);exit;
		if(count($treding)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$message = array(
				'status'=>1,
				'Trendingproducts'=>$treding,
				'path'=>'http://cartinhour.com/uploads/products/'
			);
			//$treding['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Trending Products are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*  offers for you Apis */
	public function offersforyou_get()
	{
		$offers = $this->Customerapi_model->offers_for_you_list();
		//echo '<pre>';print_r($offers);exit;
		if(count($offers)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$message = array(
				'status'=>1,
				'offersforyou'=>$offers,
				'path'=>'http://cartinhour.com/uploads/product/'
			);
			//$offers['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Offers For You are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/* Singel product view */
	public function singleproductview_get()
	{
		$get = $this->input->get();
		$single_product = $this->Customerapi_model->getsingle_products($get['item_id']);
		//echo '<pre>';print_r($single_product);exit;
		if(count($single_product)>0){
			$message = array
				(
					'status'=>1,
					'single_product'=>$single_product,
					'path'=>'http://cartinhour.com/uploads/products/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Products not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}

	}

	

	/* item wise review*/
	public function itemreviews_get()
	{
		$get = $this->input->get();
		$item_review_get = $this->Customerapi_model->itemwise_reviews($get['item_id']);
		//echo '<pre>';print_r($item_review_get);exit;
		if(count($item_review_get)>0){
			$message = array(
				'status'=>1,
				'Item Review'=>$item_review_get,
			);
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'No Reviews In this Item');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}


	

	

	/* customersorders api*/
	public function customersorders_get()
	{
		$get = $this->input->get();
		$cust_orders= $this->Customerapi_model->customer_oreders_list($get['customer_id']);
		//echo '<pre>';print_r($cust_orders);exit;
		if(count($cust_orders)>0){
				$message = array
				(
					'status'=>1,
					'Orders'=>$cust_orders,
				);
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Your Orders List Is Empty');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/* category api*/
	public function categories_get()
	{
		$categories = $this->Customerapi_model->get_categories();
		if(count($categories)>0){
				$message = array
				(
					'status'=>1,
					'categories'=>$categories,
					'path' =>'http://cartinhour.com/assets/categoryimages/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'Category List Empty.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/* Sub category api*/
	public function subcategories_get()
	{
		$get = $this->input->get('category_id');
		$subcategories = $this->Customerapi_model->get_subcategories($get);
		if(count($subcategories)>0){
				$message = array
				(
					'status'=>1,
					'Subcategories'=>$subcategories,
					'path' =>'http://cartinhour.com/assets/subcategoryimages/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
		
			$message = array('status'=>0,'message'=>'Sub Category List Empty.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	/* Sub Category wise items*/
	public function subcategoriewiseitems_get()
	{
		$get = $this->input->get();
		$subcategorie_items = $this->Customerapi_model->get_subcategorie_items($get['subcategory_id']);
		//print_r($subcategorie_items['some']);exit;
		
			if(count($subcategorie_items)>0){
				$message = array
				(
					'status'=>1,
					'Subcategorie Items'=>$subcategorie_items,
					'path'=>'http://cartinhour.com/uploads/products/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Items In This Subcategory');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
		
		//echo "<pre>";print_r($subcategorie_items);exit;
		
	}

	/* category wise products api*/
	public function categorywiseproducts_get()
	{
		$get = $this->input->get('category_id');
		$catwisepro = $this->Customerapi_model->get_category_products($get);
		if(count($catwisepro)>0){
				$message = array
				(
					'status'=>1,
					'products'=>$catwisepro,
					'path'=>'http://cartinhour.com/uploads/products/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Category.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}



	/*  location wise products*/
	public function topofferlocationwiseproducts_get()
	{
		//top_offers_product_search
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$top_offer_location = $this->Customerapi_model->top_offers_product_search($location_ids);
		//echo $this->db->last_query();exit;
		if(count($top_offer_location)>0){
				$message = array
				(
					'status'=>1,
					'path'=>'http://cartinhour.com/uploads/products/',
					'location_top_offers'=>$top_offer_location,
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Topoffers In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function dealsofthedaylocationwiseproducts_get()
	{
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$deals_of_the_day_location = $this->Customerapi_model->deals_of_the_day_product_search($location_ids);
		//echo $this->db->last_query();exit;
		if(count($deals_of_the_day_location)>0){
				$message = array
				(
					'status'=>1,
					'path'=>'http://cartinhour.com/uploads/products/',
					'location_deals ofthe day'=>$deals_of_the_day_location,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function seasonsaleslocationwiseproducts_get()
	{
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$season_sales_location = $this->Customerapi_model->season_sales_product_search($location_ids);
		//echo $this->db->last_query();exit;
		if(count($season_sales_location)>0){
				$message = array
				(
					'status'=>1,
					'path'=>'http://cartinhour.com/uploads/products/',
					'location_season sales'=>$season_sales_location,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function trendinglocationwiseproducts_get()
	{
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$treanding_location = $this->Customerapi_model->treanding_product_search($location_ids);
		//echo $this->db->last_query();exit;
		if(count($treanding_location)>0){
				$message = array
				(
					'status'=>1,
					'path'=>'http://cartinhour.com/uploads/products/',
					'location_treading'=>$treanding_location,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}


	public function offersforyoulocationwiseproducts_get()
	{
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$offers_for_you_location = $this->Customerapi_model->offers_for_you_product_search($location_ids);
		//echo $this->db->last_query();exit;
		if(count($offers_for_you_location)>0){
				$message = array
				(
					'status'=>1,
					'path'=>'http://cartinhour.com/uploads/products/',
					'location_offer for you'=>$offers_for_you_location,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function customertempcart_get()
	{
		$get = $this->input->get();
		$tempcart = $this->Customerapi_model->temp_cart($get['customer_id']);
		//echo '<pre>';print_r($tempcart);exit;
		if(count($tempcart)>0){
			$message = array(
				'status'=>1,
				'Temp Cart'=>$tempcart,
				'path'=>'http://cartinhour.com/uploads/products/'
			);
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Your Cart Is empty');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}



	

	public function totalproductslocationwise_get()
	{
		$get = $this->input->get();
		$location_ids=explode(",",$get['location_id']);
		$top_offer_location = $this->Customerapi_model->top_offers_product_search($location_ids);
		$deals_of_the_day_location = $this->Customerapi_model->deals_of_the_day_product_search($location_ids);

		$season_sales_location = $this->Customerapi_model->season_sales_product_search($location_ids);

		$treanding_location = $this->Customerapi_model->treanding_product_search($location_ids);

		$offers_for_you_location = $this->Customerapi_model->offers_for_you_product_search($location_ids);
		

		 if(count($top_offer_location && $deals_of_the_day_location && $season_sales_location && $treanding_location && $offers_for_you_location)>0){
		 	$somearray = array(
		 			'status'=>1,
		 			'Total Products'=> array(
			 			'Location_Top_offers'=>$top_offer_location,
						'Location_Deals Of The Day'=>$deals_of_the_day_location,
						'Location_Season Sales'=>$season_sales_location,
						'Location_Tranding Products'=>$treanding_location,
						'Location_Offers For You'=>$offers_for_you_location,
						'path'=>'http://cartinhour.com/uploads/products/'
		 			)
		 			
		 		);
		 		$this->response($somearray, REST_Controller::HTTP_OK);
			
		 }else{
		 	$message = array('status'=>0,'message'=>'No Products In This Locations.');
		 	$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		 }
	}

	public function homepagetotalproducts_get()
	{
		$top_offers = $this->Customerapi_model->top_offers_list();
		$deals = $this->Customerapi_model->deals_of_the_day_list();
		$ssales = $this->Customerapi_model->season_sales_list();
		$treding = $this->Customerapi_model->treding_products_list();
		$offers = $this->Customerapi_model->offers_for_you_list();
		if(count($top_offers && $deals && $ssales && $treding && $offers)>0){
		 	$total = array(
		 			'status'=>1,
		 			'Total Products'=> array(
			 			'Top_offers'=>$top_offers,
						'Deals Of The Day'=>$deals,
						'Season Sales'=>$ssales,
						'Tranding Products'=>$treding,
						'Offers For You'=>$offers,
						'path'=>'http://cartinhour.com/uploads/products/'
		 			)
		 			
		 		);
		 			
				$this->response($total, REST_Controller::HTTP_OK);
			
		 }else{
		 	$message = array('status'=>0,'message'=>'No Products In This Locations.');
		 	$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		 }
	}



	public function customers_get(){
		$get = $this->input->get();
		$customers= $this->Customerapi_model->get_customers();
		//echo '<pre>';print_r($tempcart);exit;
		if(count($customers)>0){
			$message = array(
				'status'=>1,
				'Customers'=>$customers,
			);
			$this->response($message, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Customers List Empty');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	public function orderpayment_post(){
		
		$customer_id=$this->input->get('customer_id');
		$transaction_id=$this->input->get('transaction_id');	
		$net_amount=$this->input->get('net_amount');	
		$discount=$this->input->get('discount');	
		$bank_reference_number=$this->input->get('bank_reference_number');	
		$payment_mode=$this->input->get('payment_mode');	
		$card_number=$this->input->get('card_number');	
		$hash=$this->input->get('hash');	
		$email=$this->input->get('email');	
		$phone=$this->input->get('phone');	
		$billing_mobile=$this->input->get('billing_mobile');	
		$billing_email=$this->input->get('billing_email');	
		$billing_address=$this->input->get('billing_address1');	
		$billing_address2=$this->input->get('billing_address2');	
		$billing_name=$this->input->get('billing_name');	
		$area=$this->input->get('area');	
			
		if($customer_id==''){
			$message = array('status'=>1,'message'=>'customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($transaction_id==''){
			$message = array('status'=>1,'message'=>'transaction id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($net_amount==''){
			$message = array('status'=>1,'message'=>'net amount is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($discount==''){
			$message = array('status'=>1,'message'=>'discount is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($bank_reference_number==''){
			$message = array('status'=>1,'message'=>'bank reference number is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($payment_mode==''){
			$message = array('status'=>1,'message'=>'payment mode is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($card_number==''){
			$message = array('status'=>1,'message'=>'card number is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($hash==''){
			$message = array('status'=>1,'message'=>'hash is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($email==''){
			$message = array('status'=>1,'message'=>'email is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($phone==''){
			$message = array('status'=>1,'message'=>'phone is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($billing_address==''){
			$message = array('status'=>1,'message'=>'billing address is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($billing_email==''){
			$message = array('status'=>1,'message'=>'billing email is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($billing_mobile==''){
			$message = array('status'=>1,'message'=>'billing mobile is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($billing_name==''){
			$message = array('status'=>1,'message'=>'billing name is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($area==''){
			$message = array('status'=>1,'message'=>'area is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$ordersucess=array(
						'customer_id'=>$customer_id,
						'transaction_id'=>$transaction_id,
						'net_amount'=>$net_amount,
						'total_price'=>$net_amount,
						'discount'=>$discount,
						'bank_reference_number'=>$bank_reference_number,
						'payment_mode'=>$payment_mode,
						'card_number'=>$card_number,
						'email'=>$email,
						'phone'=>$phone,
						'order_status'=>1,
						'hash'=>$hash,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					
				$saveorder= $this->Customerapi_model->save_order_success($ordersucess);
				
				$cart_items= $this->Customerapi_model->get_cart_products($customer_id);
				$customerdetails= $this->Customerapi_model->get_customer_details($customer_id);
				//echo '<pre>';print_r($cart_items);exit;
				foreach($cart_items as $items){
					$orderitems=array(
						'order_id'=>$saveorder,
						'item_id'=>$items['item_id'],
						'seller_id'=>$items['seller_id'],
						'customer_id'=>$items['cust_id'],
						'qty'=>$items['qty'],
						'item_price'=>$items['item_price'],
						'total_price'=>$items['total_price'],
						'delivery_amount'=>$items['delivery_amount'],
						'commission_price'=>$items['commission_price'],
						'customer_email'=>$billing_email,
						'customer_phone'=>$billing_mobile,
						'customer_address'=>$billing_address,
						'order_status'=>1,
						'color'=>$items['color'],
						'size'=>$items['size'],
						'create_at'=>date('Y-m-d H:i:s'),
					);
					//echo '<pre>';print_r($orderitems);exit;
					$item_qty=$this->Customerapi_model->get_item_details($items['item_id']);
					$less_qty=$item_qty['item_quantity']-$items['qty'];
					//echo '<pre>';print_r($item_qty);
					//echo '<pre>';print_r($less_aty);
					//exit;
					$this->Customerapi_model->update_tem_qty_after_purchasingorder($items['item_id'],$less_qty,$items['seller_id']);
					$save= $this->Customerapi_model->save_order_items_list($orderitems);
					$statu=array(
						'order_item_id'=>$save,
						'order_id'=>$saveorder,
						'item_id'=>$items['item_id'],
						'status_confirmation'=>1,
						'create_time'=>date('Y-m-d h:i:s A'),
						'update_time'=>date('Y-m-d h:i:s A'),
					);
					$save= $this->Customerapi_model->save_order_item_status_list($statu);
					
					
				}
				/*for billing address*/
				$orderbilling=array(
						'cust_id'=>$customer_id,
						'order_id'=>$saveorder,
						'name'=>$billing_name,
						'emal_id'=>$billing_email,
						'mobile'=>$billing_mobile,
						'address1'=>$billing_address,
						'address2'=>$billing_address2,
						'area'=>$area,
						'create-at'=>date('Y-m-d H:i:s'),
					);
				$saveorderbillingaddress= $this->Customerapi_model->save_order_billing_address($orderbilling);
			$message = array('status'=>1,'orderid'=>$saveorder,'message'=>'Payment successfully completed!');
			$this->response($message, REST_Controller::HTTP_OK);
	}
	
	public function ordersuccess_post(){
		$customer_id=$this->input->get('customer_id');
		$orderid=$this->input->get('orderid');	
		if($customer_id==''){
				$message = array('status'=>1,'message'=>'customer id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($orderid==''){
			$message = array('status'=>1,'message'=>'orderid is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$cart_items= $this->Customerapi_model->get_cart_products($customer_id);
		//echo '<pre>';print_r($cart_items);
		foreach($cart_items as $items){
		$delete= $this->Customerapi_model->after_payment_cart_item($customer_id,$items['item_id'],$items['id']);
		}
		$order_items= $this->Customerapi_model->get_order_items($orderid);
		$carttotal_amount= $this->Customerapi_model->get_successorder_total_amount($orderid);
		$message = array('status'=>1,'orderitemslist'=>$order_items,'totalcartamount'=>$carttotal_amount,'message'=>'order details page details');
		$this->response($message, REST_Controller::HTTP_OK);
		
	}
	public function category_wise_search_post(){
			$Ip_address=$this->input->get('Ip_address');
			$category_id=$this->input->get('category_id');
			$mini_amount=$this->input->get('mini_amount');
			$max_amount=$this->input->get('max_amount');
			$cusine=$this->input->get('cusine');
			$restraent=$this->input->get('restraent');
			$offers=$this->input->get('offers');
			$brand=$this->input->get('brand');
			$discount=$this->input->get('discount');
			$color=$this->input->get('color');
			$size=$this->input->get('size');
			$status=$this->input->get('status');
			
			if($Ip_address==''){
			$message = array('status'=>1,'message'=>'Ip address is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($category_id==''){
			$message = array('status'=>1,'message'=>'category id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($mini_amount==''){
			$message = array('status'=>1,'message'=>'Minimum Amount is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($max_amount==''){
			$message = array('status'=>1,'message'=>'Maximum Amount required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
			
			/*once change category id delete old data*/
			$getcategory_id= $this->Customerapi_model->get_subcategory_id_filterssearh();
			if($getcategory_id[0]['category_id']!=$category_id){
				$previous= $this->Customerapi_model->get_all_previous_search_fields_withip($getcategory_id[0]['Ip_address'],$getcategory_id[0]['category_id']);
				foreach($previous as $list){
					$this->Customerapi_model->delete_privous_searchdata($list['id'],$getcategory_id[0]['Ip_address']);
				}
				
			}
			/*delete old data*/
				$filterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'mini_amount'=>isset($mini_amount) ? $mini_amount:'',
					'max_amount'=>isset($max_amount) ? $max_amount:'',
					'cusine'=>isset($cusine) ? $cusine:'',
					'restraent'=>isset($restraent) ? $restraent:'',
					'offers'=>isset($offers) ? $offers:'',
					'brand'=>isset($brand) ? $brand:'',
					'discount'=>isset($discount) ? $discount:'',
					'color'=>isset($color) ? $color:'',
					'size'=>isset($size) ? $size:'',
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$filtersdata= $this->Customerapi_model->save_searchdata($filterdata);
					if(count($filtersdata)>0){
						$removesearch= $this->Customerapi_model->get_all_previous_search_fields();
							foreach ($removesearch as $list){
								$this->Customerapi_model->update_amount_privous_searchdata($mini_amount,$max_amount,$list['id']);

							}

					}
					$categorywise= $this->Customerapi_model->get_search_all_subcategory_products();
					//echo '<pre>';print_r($categorywise);
						if(count($categorywise)>0){
							foreach ($categorywise as $lists){
								foreach ($lists as $li){
								$idslist[]=$li['item_id'];
								$products[]=$li;
							}
						}
						$result = array_unique($idslist);

						//echo '<pre>';print_r($result);exit;
							foreach ($result as $pids){
								$products_list[]=$this->Customerapi_model->product_details($pids);

							}
							$categorywiseproducrlist=$products_list;
						}else{

						$categorywiseproducrlist=array();
						}
						$previousdata= $this->Customerapi_model->get_all_previous_search_fields($Ip_address);
					$message = array('status'=>1,'previoussearchdata'=>$previousdata,'filtersresult'=>$categorywiseproducrlist,'message'=>'filter search result and previous search data ');
					$this->response($message, REST_Controller::HTTP_OK);
	}
	public function category_wise_leftside_filters_get(){
			$category_id=$this->input->get('category_id');
			if($category_id==''){
			$message = array('status'=>1,'message'=>'category id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
				if($category_id==18){
					$data['cusine_list']= $this->Customerapi_model->get_all_cusine_list($category_id);
					$data['myrestaurant']= $this->Customerapi_model->get_all_myrestaurant_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
				}else if($category_id==21){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
				}else if($category_id==20){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$data['color_list']= $this->Customerapi_model->get_all_color_list($category_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
				}else if($category_id==19){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$data['color_list']= $this->Customerapi_model->get_all_color_list($category_id);
					$data['sizes_list']= $this->Customerapi_model->get_all_size_list($category_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
				}else{
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
				}
				$message = array('status'=>1,'categorywiseleftsidefilters_list'=>$data,'message'=>'filter search result');
				$this->response($message, REST_Controller::HTTP_OK);
		}
		
		public function subcategoriewise_leftside_filters_get(){
			$category_id=$this->input->get('category_id');
			$subcategory_id=$this->input->get('subcategory_id');
			if($category_id==''){
			$message = array('status'=>1,'message'=>'category id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($subcategory_id==''){
			$message = array('status'=>1,'message'=>'Subcategory id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
			if($category_id==18){
					$data['cusine_list']= $this->Customerapi_model->get_all_cusine_list_sub($category_id,$subcategory_id);
					$data['myrestaurant']= $this->Customerapi_model->get_all_myrestaurant_list_sub($category_id,$subcategory_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list_sub($category_id,$subcategory_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
			}else if($category_id==21){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list_sib($category_id,$subcategory_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list_sub($category_id,$subcategory_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list_sub($category_id,$subcategory_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list_sub($category_id,$subcategory_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
			}else if($category_id==20){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list_sib($category_id,$subcategory_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list_sub($category_id,$subcategory_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list_sub($category_id,$subcategory_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list_sub($category_id,$subcategory_id);
					$data['color_list']= $this->Customerapi_model->get_all_color_list_sub($category_id,$subcategory_id);
					$data['minimum_price'] = reset($data['price_list']);
					$data['maximum_price'] = end($data['price_list']);
						if($subcategory_id==30){
							$data['comatability_mobile_list']= $this->Customerapi_model->get_comatability_mobile_list($category_id,$subcategory_id);
						}
						if($subcategory_id==34){
							$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
							$data['megapuxel_list']= $this->Customerapi_model->get_mega_pixel_list($category_id,$subcategory_id);
							$data['sensor_type']= $this->Customerapi_model->get_sensor_type_list($category_id,$subcategory_id);
							$data['battery_type']= $this->Customerapi_model->get_battery_type_list($category_id,$subcategory_id);
						}
						if($subcategory_id==35){
							$data['display_size']= $this->Customerapi_model->get_display_size_list($category_id,$subcategory_id);
							$data['connectivity_list']= $this->Customerapi_model->get_conncetivity_list($category_id,$subcategory_id);
							$data['ram_list']= $this->Customerapi_model->get_ram_list($category_id,$subcategory_id);
							$data['voice_calling_facility']= $this->Customerapi_model->get_voice_calling_facility_list($category_id,$subcategory_id);
							$data['operating_system']= $this->Customerapi_model->get_os_list($category_id,$subcategory_id);
							$data['internal_storage']= $this->Customerapi_model->get_internal_storage_list($category_id,$subcategory_id);
							$data['battery_capacity']= $this->Customerapi_model->get_battery_capacity_list($category_id,$subcategory_id);
							$data['primary_camera']= $this->Customerapi_model->get_primary_camera_list($category_id,$subcategory_id);
							$data['processor_clock_speed']= $this->Customerapi_model->get_processor_clock_speed_list($category_id,$subcategory_id);
						}
						if($subcategory_id==36){
							$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
							$data['wireless_speed']= $this->Customerapi_model->get_wireless_speed_list($category_id,$subcategory_id);
							$data['frequency_band']= $this->Customerapi_model->get_frequency_band_list($category_id,$subcategory_id);
							$data['broadband_compatibility']= $this->Customerapi_model->get_broadband_compatibility_list($category_id,$subcategory_id);
							$data['usb_ports']= $this->Customerapi_model->get_usb_ports_list($category_id,$subcategory_id);
							$data['frequency_list']= $this->Customerapi_model->get_frequency_list_list($category_id,$subcategory_id);
							$data['antennae_list']= $this->Customerapi_model->get_antennae_list($category_id,$subcategory_id);
						}
						if($subcategory_id==39){
							$data['display_size']= $this->Customerapi_model->get_display_size_list($category_id,$subcategory_id);
							$data['processor_list']= $this->Customerapi_model->get_processor_list($category_id,$subcategory_id);
							$data['ram_list']= $this->Customerapi_model->get_ram_list($category_id,$subcategory_id);
							$data['operating_system']= $this->Customerapi_model->get_os_list($category_id,$subcategory_id);
							$data['processor_brand']= $this->Customerapi_model->get_processor_brand_list($category_id,$subcategory_id);
							$data['lifestyle_list']= $this->Customerapi_model->get_lifestyle_list($category_id,$subcategory_id);
							$data['storage_type']= $this->Customerapi_model->get_storage_type_list($category_id,$subcategory_id);
							$data['graphics_memory']= $this->Customerapi_model->get_graphics_memory_list($category_id,$subcategory_id);
							$data['touch_screen']= $this->Customerapi_model->get_touch_screen_list($category_id,$subcategory_id);
							$data['weight_list']= $this->Customerapi_model->get_weight_list($category_id,$subcategory_id);
							$data['internal_storage']= $this->Customerapi_model->get_internal_storage_list($category_id,$subcategory_id);
							$data['memory_type']= $this->Customerapi_model->get_memory_type_list($category_id,$subcategory_id);
							$data['ram_type']= $this->Customerapi_model->get_ram_typee_list($category_id,$subcategory_id);
						}
						if($subcategory_id==40){
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
								$data['ram_list']= $this->Customerapi_model->get_ram_list($category_id,$subcategory_id);
								$data['operating_system']= $this->Customerapi_model->get_os_list($category_id,$subcategory_id);
								$data['internal_storage']= $this->Customerapi_model->get_internal_storage_list($category_id,$subcategory_id);
								$data['display_size']= $this->Customerapi_model->get_display_size_list($category_id,$subcategory_id);
								$data['battery_capacity']= $this->Customerapi_model->get_battery_capacity_list($category_id,$subcategory_id);
								$data['network_type']= $this->Customerapi_model->get_network_type_list($category_id,$subcategory_id);
								$data['speciality_list']= $this->Customerapi_model->get_speciality_list($category_id,$subcategory_id);
								$data['primary_camera']= $this->Customerapi_model->get_primary_camera_list($category_id,$subcategory_id);
								$data['operating_system_version_name']= $this->Customerapi_model->get_operating_system_version_name_list($category_id,$subcategory_id);
								$data['processor_brand']= $this->Customerapi_model->get_processor_brand_list($category_id,$subcategory_id);
								$data['resolution_type']= $this->Customerapi_model->get_resolution_type_list($category_id,$subcategory_id);
								$data['secondary_camera']= $this->Customerapi_model->get_secondary_camera_list($category_id,$subcategory_id);
								$data['sim_type']= $this->Customerapi_model->get_sim_type_list($category_id,$subcategory_id);
								$data['clock_speed']= $this->Customerapi_model->get_clock_speed_list($category_id,$subcategory_id);
								$data['cores']= $this->Customerapi_model->get_cores_list($category_id,$subcategory_id);


						}
		
					}else if($category_id==19){
						$data['brand_list']= $this->Customerapi_model->get_all_brand_list_sib($category_id,$subcategory_id);
						$data['price_list']= $this->Customerapi_model->get_all_price_list_sub($category_id,$subcategory_id);
						$data['discount_list']= $this->Customerapi_model->get_all_discount_list_sub($category_id,$subcategory_id);
						$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
						$data['offer_list']= $this->Customerapi_model->get_all_offer_list_sub($category_id,$subcategory_id);
						$data['color_list']= $this->Customerapi_model->get_all_color_list_sub($category_id,$subcategory_id);
						$data['sizes_list']= $this->Customerapi_model->get_all_size_list_sub($category_id,$subcategory_id);
						$data['minimum_price'] = reset($data['price_list']);
						$data['maximum_price'] = end($data['price_list']);
							if($subcategory_id!=10 ||$subcategory_id!=53){
								$data['ideal_for']= $this->Customerapi_model->get_ideal_for_sub($category_id,$subcategory_id);
							}
							if($subcategory_id==8 || $subcategory_id==14 || $subcategory_id==19 || $subcategory_id==20 || $subcategory_id==52 || $subcategory_id==28 || $subcategory_id==29){
								$data['theme_list']= $this->Customerapi_model->get_theme_list($category_id,$subcategory_id);
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
							}
							if($subcategory_id==10){
								$data['dial_shape']= $this->Customerapi_model->get_dial_shape_list($category_id,$subcategory_id);
								$data['compatibleos']= $this->Customerapi_model->get_compatibleos_list($category_id,$subcategory_id);
								$data['usage_list']= $this->Customerapi_model->get_usage_list($category_id,$subcategory_id);
								$data['display_type']= $this->Customerapi_model->get_display_type_list($category_id,$subcategory_id);
							}
							if($subcategory_id==11 || $subcategory_id==21 || $subcategory_id==25){
										$data['theme_list']= $this->Customerapi_model->get_theme_list($category_id,$subcategory_id);
							}
							if($subcategory_id==53){
								$data['theme_list']= $this->Customerapi_model->get_theme_list($category_id,$subcategory_id);
								$data['occasion']= $this->Customerapi_model->get_occasion_list($category_id,$subcategory_id);
							}
							if($subcategory_id==13 || $subcategory_id==16 || $subcategory_id==17 || $subcategory_id==23){
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
							}if($subcategory_id==15){
								$data['material']= $this->Customerapi_model->get_material_list($category_id,$subcategory_id);
								$data['gemstones']= $this->Customerapi_model->get_gemstones_list($category_id,$subcategory_id);
							}
							if($subcategory_id==50){
								$data['strap_color']= $this->Customerapi_model->get_strap_color_list($category_id,$subcategory_id);
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
								$data['material']= $this->Customerapi_model->get_material_list($category_id,$subcategory_id);
								$data['dial_shape']= $this->Customerapi_model->get_dial_shape_list($category_id,$subcategory_id);
								$data['dial_color']= $this->Customerapi_model->get_dial_color_list($category_id,$subcategory_id);

							}
							if($subcategory_id==22){
								$data['theme_list']= $this->Customerapi_model->get_theme_list($category_id,$subcategory_id);
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
								$data['packof']= $this->Customerapi_model->get_packof_list($category_id,$subcategory_id);
							}
							if($subcategory_id==51){
								$data['theme_list']= $this->Customerapi_model->get_theme_list($category_id,$subcategory_id);
								$data['producttype_list']= $this->Customerapi_model->get_type_mobile_list($category_id,$subcategory_id);
								$data['packof']= $this->Customerapi_model->get_packof_list($category_id,$subcategory_id);
								$data['occasion']= $this->Customerapi_model->get_occasion_list($category_id,$subcategory_id);

							}
							if($subcategory_id==27){
								$data['dial_shape']= $this->Customerapi_model->get_dial_shape_list($category_id,$subcategory_id);
								$data['usage_list']= $this->Customerapi_model->get_usage_list($category_id,$subcategory_id);
								$data['display_type']= $this->Customerapi_model->get_display_type_list($category_id,$subcategory_id);
							}

					}
				$message = array('status'=>1,'subcategorywiseleftsidefilters_list'=>$data,'message'=>'filter search result');
				$this->response($message, REST_Controller::HTTP_OK);
			
		}
		public function subcategory_wise_search_post(){
			
			//echo 'fddf';exit;
			$Ip_address=$this->input->get('Ip_address');
			$category_ids=$this->input->get('category_id');
			$subcategory_id=$this->input->get('subcategory_id');
			$mini_amount=$this->input->get('mini_amount');
			$max_amount=$this->input->get('max_amount');
			
			$getcategory_id= $this->Customerapi_model->get_subcategory_iddata_filterssearh();
			//echo '<pre>';print_r($getcategory_id);exit;
			if($getcategory_id[0]['subcategory_id']!=$subcategory_id && $getcategory_id[0]['Ip_address']==$Ip_address){
				$previousdata= $this->Customerapi_model->get_all_previous_subcategorywise_search_fields($Ip_address);
				foreach ($previousdata as $list){
					$this->Customerapi_model->delete_subcategory_privous_searchdata($list['id'],$Ip_address);
				}
			}
			//echo '<pre>';print_r($previousdata);exit;
			if($Ip_address==''){
				$message = array('status'=>1,'message'=>'Ip address is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($category_ids==''){
				$message = array('status'=>1,'message'=>'category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($subcategory_id==''){
				$message = array('status'=>1,'message'=>'subcategory id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($mini_amount==''){
				$message = array('status'=>1,'message'=>'Minimum Amount is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}elseif($max_amount==''){
				$message = array('status'=>1,'message'=>'Maximum Amount required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$cus=$this->input->get('cusine');
			$restraent=$this->input->get('restraent');
			$offer=$this->input->get('offers');
			$brand=$this->input->get('brand');
			$discount=$this->input->get('discount');
			$color=$this->input->get('color');
			$size=$this->input->get('size');
			$mobileacc=$this->input->get('mobileacc');
			$producttype=$this->input->get('producttype');
			$mega_pixel=$this->input->get('mega_pixel');
			$sensor_type=$this->input->get('sensor_type');
			$battery_type=$this->input->get('battery_type');
			$display_size=$this->input->get('display_size');
			$connectivity=$this->input->get('connectivity');
			$voice_calling_facility=$this->input->get('voice_calling_facility');
			$ram=$this->input->get('ram');
			$operatingsystem=$this->input->get('operatingsystem');
			$internal_storage=$this->input->get('internal_storage');
			$battery_capacity=$this->input->get('battery_capacity');
			$primary_camera=$this->input->get('primary_camera');
			$processor_clock_speed=$this->input->get('processor_clock_speed');
			$wireless_speed=$this->input->get('wireless_speed');
			$frequency_band=$this->input->get('frequency_band');
			$broadband_compatibility=$this->input->get('broadband_compatibility');
			$usb_ports=$this->input->get('usb_ports');
			$frequency=$this->input->get('frequency');
			$antennae=$this->input->get('antennae');
			$processor=$this->input->get('processor');
			$processor_brand=$this->input->get('processor_brand');
			$life_style=$this->input->get('life_style');
			$storage_type=$this->input->get('storage_type');
			$graphics_memory=$this->input->get('graphics_memory');
			$touch_screen=$this->input->get('touch_screen');
			$weight=$this->input->get('weight');
			$memory_type=$this->input->get('memory_type');
			$ram_type=$this->input->get('ram_type');
			$network_type=$this->input->get('network_type');
			$speciality=$this->input->get('speciality');
			$operating_system_version_name=$this->input->get('operating_system_version_name');
			$resolution_type=$this->input->get('resolution_type');
			$secondary_camera=$this->input->get('secondary_camera');
			$sim_type=$this->input->get('sim_type');
			$clock_speed=$this->input->get('clock_speed');
			$cores=$this->input->get('cores');
			$theme=$this->input->get('theme');
			$dial_shape=$this->input->get('dial_shape');
			$compatibleos=$this->input->get('compatibleos');
			$usages=$this->input->get('usages');
			$display_type=$this->input->get('display_type');
			$occasion=$this->input->get('occasion');
			$ideal_for=$this->input->get('ideal_for');
			$material=$this->input->get('material');
			$gemstones=$this->input->get('gemstones');
			$strap_color=$this->input->get('strap_color');
			$dial_color=$this->input->get('dial_color');
			$packof=$this->input->get('packof');
			$status=$this->input->get('status');
			
			$filters=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_ids,
					'subcategory_id'=>$subcategory_id,
					'mini_amount'=>isset($mini_amount) ? $mini_amount:'',
					'max_amount'=>isset($max_amount) ? $max_amount:'',
					'cusine'=>isset($cus) ? $cus:'',
					'restraent'=>isset($restraent) ? $restraent:'',
					'offers'=>isset($offer) ? $offer:'',
					'brand'=>isset($brand) ? $brand:'',
					'discount'=>isset($discount) ? $discount:'',
					'color'=>isset($color) ? $color:'',
					'size'=>isset($size) ? $size:'',
					'compatible_mobiles'=>isset($mobileacc) ? $mobileacc:'',
					'producttype'=>isset($producttype) ? $producttype:'',
					'mega_pixel'=>isset($mega_pixel) ? $mega_pixel:'',
					'sensor_type'=>isset($sensor_type) ? $sensor_type:'',
					'battery_type'=>isset($battery_type) ? $battery_type:'',
					'display_size'=>isset($display_size) ? $display_size:'',
					'connectivity'=>isset($connectivity) ? $connectivity:'',
					'voice_calling_facility'=>isset($voice_calling_facility) ? $voice_calling_facility:'',
					'ram'=>isset($ram) ? $ram:'',
					'operatingsystem'=>isset($operatingsystem) ? $operatingsystem:'',
					'internal_storage'=>isset($internal_storage) ? $internal_storage:'',
					'battery_capacity'=>isset($battery_capacity) ? $battery_capacity:'',
					'primary_camera'=>isset($primary_camera) ? $primary_camera:'',
					'processor_clock_speed'=>isset($processorclockspeed) ? $processorclockspeed:'',
					'wireless_speed'=>isset($wireless_speed) ? $wireless_speed:'',
					'frequency_band'=>isset($frequency_band) ? $frequency_band:'',
					'broadband_compatibility'=>isset($broadband_compatibility) ? $broadband_compatibility:'',
					'usb_ports'=>isset($usb_ports) ? $usb_ports:'',
					'frequency'=>isset($frequency) ? $frequency:'',
					'antennae'=>isset($antennae) ? $antennae:'',
					'processor'=>isset($processor) ? $processor:'',
					'processor_brand'=>isset($processor_brand) ? $processor_brand:'',
					'life_style'=>isset($life_style) ? $life_style:'',
					'storage_type'=>isset($storage_type) ? $storage_type:'',
					'graphics_memory'=>isset($graphics_memory) ? $graphics_memory:'',
					'touch_screen'=>isset($touch_screen) ? $touch_screen:'',
					'weight'=>isset($weight) ? $weight:'',
					'memory_type'=>isset($memory_type) ? $memory_type:'',
					'ram_type'=>isset($ram_type) ? $ram_type:'',
					'network_type'=>isset($network_type) ? $network_type:'',
					'speciality'=>isset($speciality) ? $speciality:'',
					'operating_system_version_name'=>isset($operating_system_version_name) ? $operating_system_version_name:'',
					'resolution_type'=>isset($resolution_type) ? $resolution_type:'',
					'secondary_camera'=>isset($secondary_camera) ? $secondary_camera:'',
					'sim_type'=>isset($sim_type) ? $sim_type:'',
					'clock_speed'=>isset($clock_speed) ? $clock_speed:'',
					'cores'=>isset($cores) ? $cores:'',
					'theme'=>isset($theme) ? $theme:'',
					'dial_shape'=>isset($dial_shape) ? $dial_shape:'',
					'compatibleos'=>isset($compatibleos) ? $compatibleos:'',
					'usages'=>isset($usage) ? $usage:'',
					'display_type'=>isset($display_type) ? $display_type:'',
					'occasion'=>isset($occasion) ? $occasion:'',
					'ideal_for'=>isset($ideal_for) ? $ideal_for:'',
					'material'=>isset($material) ? $material:'',
					'gemstones'=>isset($gemstones) ? $gemstones:'',
					'strap_color'=>isset($strap_color) ? $strap_color:'',
					'dial_color'=>isset($dial_color) ? $dial_color:'',
					'packof'=>isset($packof) ? $packof:'',
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
					);
				$filtersdata= $this->Customerapi_model->save_sub_searchdata($filters);
					if(count($filtersdata)>0){
						$removesearch= $this->Customerapi_model->get_all_previous_subcategorywise_search_fields($Ip_address);
						foreach ($removesearch as $list){
						$this->Customerapi_model->update_amount_privous_subcategory_wise_searchdata($mini_amount,$max_amount,$list['id']);

					}
				}
				$subcategorywise= $this->Customerapi_model->get_search_all_subcategorywise_products();
				//echo '<pre>';print_r($subcategorywise);exit;
					if(count($subcategorywise)>0){
							foreach ($subcategorywise as $lists){
							foreach ($lists as $li){
							$idslist[]=$li['item_id'];
							$products[]=$li;
							}
							}
						$result = array_unique($idslist);

				//echo '<pre>';print_r($result);exit;
						foreach ($result as $pids){
							$products_list[]=$this->Customerapi_model->get_product_details($pids);

						}
						$subcategory_porduct_list=$products_list;
					}else{

						$subcategory_porduct_list=array();
					}
				$message = array('status'=>1,'subcategorywisefilterresult'=>$subcategory_porduct_list,'message'=>'filter search result');
				$this->response($message, REST_Controller::HTTP_OK);
					//echo '<pre>';print_r($subcategory_porduct_list);exit;
			
		}



}
