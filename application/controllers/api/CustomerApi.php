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
			
			$checkemail =filter_var($username, FILTER_VALIDATE_EMAIL);
				if($checkemail==''){
					$message = array('status'=>0,'message'=>'Mobile number already exist!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}else{
					$message = array('status'=>0,'message'=>'Email id already exist!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
				
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
					$custdetails=$this->Customerapi_model->get_details_customer($customerdetails);
						$message = array('status'=>1,'cust_id'=>$customerdetails,'details'=>$custdetails, 'message'=>'Registration successfully completed!');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'Invalid login details.Please try again');
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
						$message = array('status'=>1,'details'=>$logindetails, 'message'=>'Logged in Successfully');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'Invalid login details.Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	
	}
	
	/*  Set Password Apis */
	public function socialregister_post()
	{
		$email = $this->input->get('email');
		if($email==''){
		$message = array('status'=>0,'message'=>'Email id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}
		$checkingemail = $this->Customerapi_model->email_checking($email);
		
		if(count($checkingemail)>0){
				$message = array('status'=>1,'customerdetails'=>$checkingemail);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
		
			$social=array(
				'cust_email'=>$email,
				'role_id'=>1,
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$stroe_social_details = $this->Customerapi_model->save_customer($social);
				if(count($stroe_social_details)>0){
					$checkingemail = $this->Customerapi_model->customer_details($stroe_social_details);

					$message = array('status'=>1,'customerdetails'=>$checkingemail,'message'=>'Register Successfully');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Technical problem will occured. Please try again.');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}	
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
	$color=$this->input->get('color');
	$size=$this->input->get('size');
	$uksize=$this->input->get('uksize');
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
	if(count($cart_item_ids)>0){ 
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
								'item_qty'=>$products['item_quantity'],
								'unit'=>$products['unit'],
								'total_price'=>$price,
								'commission_price'=>$commission_price,
								'delivery_amount'=>$delivery_charges,
								'seller_id'=>$products['seller_id'],
								'category_id'=>$products['category_id'],
								'create_at'=>date('Y-m-d H:i:s'),
								'color'=>isset($color)?$color:'',
								'size'=>isset($size)?$size:'',
								'uksize'=>isset($uksize)?$uksize:'',
							);
							
							//echo '<pre>';print_r($adddata);exit;
							$cart_save= $this->Customerapi_model->cart_products_save($adddata);
							if(count($cart_save)>0){
								
								$message = array('status'=>1,'id'=>$cart_save,'message'=>'Product Successfully added to the cart');
								$this->response($message, REST_Controller::HTTP_OK);
							}else{
								$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
								$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							}
					}
	
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
							'item_qty'=>$products['item_quantity'],
							'item_price'=>$item_price,
							'total_price'=>$price,
							'commission_price'=>$commission_price,
							'delivery_amount'=>$delivery_charges,
							'seller_id'=>$products['seller_id'],
							'category_id'=>$products['category_id'],
							'create_at'=>date('Y-m-d H:i:s'),
							'color'=>isset($color)?$color:'',
							'size'=>isset($size)?$size:'',
							'uksize'=>isset($uksize)?$uksize:'',
						);
						$cart_save= $this->Customerapi_model->cart_products_save($adddata);
						if(count($cart_save)>0){
							$message = array('status'=>1,'id'=>$cart_save,'message'=>'Product Successfully added to the cart');
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
		if(isset($cart_item_ids) && count($cart_item_ids)>0){
				foreach($cart_item_ids as $cartids) 
			{ 		
				$cart_ids[]=$cartids['cust_id'];
			}
		}else{
			$cart_ids[]=array();
		}
		$item_lists= $this->Customerapi_model->get_cart_products_list($customer_id);
			if(isset($item_lists) && count($item_lists)>0){
					foreach ($item_lists as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$pitemlist[]=$list;
				}
		}else{
			$pitemlist[]=array();
		}
		
		//echo '<pre>';print_r($item_lists);exit;
		if(count($pitemlist)>0){
			if(!in_array($customer_id,$cart_ids))
			{
				$message = array('status'=>1,'message'=>'Customer having  no products in the cart');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
				$message = array(
				'status'=>1,
				'message'=>'cart items list',
				'list'=>$pitemlist,
				'count'=>$item_lists_count['count'],
				'path'=>base_url('uploads/products/')
				);
				$this->response($message,REST_Controller::HTTP_OK);
			}
		}else{
				$message = array('status'=>1,'message'=>'Customer having  no products in the cart');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
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
		if(count($wish_list_ids)>0){
			
		foreach($wish_list_ids as $cartids) 
		{ 		
			$wish_ids[]=$cartids['item_id'];
		}
		
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
					$message = array('status'=>1,'id'=>$wish,'message'=>'Product Successfully Added to the wishlists');
					$this->response($message, REST_Controller::HTTP_OK);
					}else{
					$message = array('status'=>0,'message'=>'Technical problem occured try again later!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
				}
		}else{
			$data=array(
			'cust_id'=>$customer_id,
			'item_id'=>$item_id,
			'create_at'=>date('Y-m-d H:i:s'),
			'yes'=>1,
			);
			$wish=$this->Customerapi_model->wishlist_save($data);
				if(count($wish)>0){
				$message = array('status'=>1,'id'=>$wish,'message'=>'Product Successfully Added to the wishlists');
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
				
						$currentdate=date('Y-m-d h:i:s A');
						if($cartids['offer_expairdate']>=$currentdate){
						$item_price= ($cartids['item_cost']-$cartids['offer_amount']);
						$percentage= $cartids['offer_percentage'];
						$orginal_price=$cartids['item_cost'];
						}else{
							//echo "expired";
							$item_price= $cartids['special_price'];
							$prices= ($cartids['item_cost']-$cartids['special_price']);
							$percentage= (($prices) /$cartids['item_cost'])*100;
							$orginal_price=$cartids['item_cost'];
						}
					$plist[$cartids['item_id']]=$cartids;
					$plist[$cartids['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$cartids['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$cartids['item_id']]['percentage']=number_format($percentage, 2);
			}
			foreach ($plist as $ls){
				$wishpdetails[]=$ls;
				
			}
		//echo '<pre>';print_r($plist);exit;
		if(!in_array($customer_id,$cart_ids))
		{
			$message = array('status'=>1,'message'=>'Customer having  no products in the wishlist');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else{
			$message = array('status'=>1,'message'=>'wishlist items list','list'=>$wishpdetails,'count'=>$wishlistcount['count'],'path'=>base_url('uploads/products/'));
			$this->response($message,REST_Controller::HTTP_OK);
		}
		}else{
			$message = array('status'=>1,'message'=>'Customer having  no products in the wishlist');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
/* wishlist get api */
	public function orderlist_get()
	{
		$customer_id=$this->input->get('customer_id');
			if($customer_id==''){
			$message = array('status'=>0,'message'=>'Customer id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		$order_list=$this->Customerapi_model->order_list($customer_id);
		//echo '<pre>';print_r($order_list);exit;
		if(count($order_list)>0){
		
			$message = array('status'=>1,'message'=>'order list','list'=>$order_list,'path'=>base_url('uploads/products/'));
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
				//echo '<pre>';print_r($customer_items);exit;

				foreach ($customer_items as $order_ids){
					$ids[]=$order_ids['order_item_id'];
				}
				if(isset($ids) && count($ids)>0){
				if(in_array($order_item_id, $ids)){
					
					$item_details= $this->Customerapi_model->get_order_items_list($customer_id,$order_item_id);
					if(isset($item_details['category_id']) && $item_details['category_id']==19){
						if($item_details['category_id']==19 && $item_details['category_id']==53){
							$color_list= $this->Customerapi_model->get_product_color_details($item_details['item_id']);
							$uksize_list= $this->Customerapi_model->get_product_uksize_details($item_details['item_id']);
							$size_list=[];
						}else{
							$color_list= $this->Customerapi_model->get_product_color_details($item_details['item_id']);
							$size_list= $this->Customerapi_model->get_product_size_details($item_details['item_id']);
							$uksize_list=[];
						}
					}
					
					
					
					//echo '<pre>';print_r($item_details);exit;
					$message = array(
					'status'=>1,'message'=>'order details are found',
					'order details'=>$item_details,
					'colorlist'=>isset($color_list)?$color_list:'',
					'sizelist'=>isset($size_list)?$size_list:'',
					'uksizelist'=>isset($uksize_list)?$uksize_list:'',
					 'path'=>base_url('uploads/products/'),
					
					);
					$this->response($message,REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'You have no permissions');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
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
		$product_details=$this->Customerapi_model->all_product_details($item_id);
		if(count($product_details)>0){
				$currentdate=date('Y-m-d h:i:s A');
						if($product_details['offer_expairdate']>=$currentdate){
						$item_price= ($product_details['item_cost']-$product_details['offer_amount']);
						$percentage= $product_details['offer_percentage'];
						$orginal_price=$product_details['item_cost'];
						}else{
							//echo "expired";
							$item_price= $product_details['special_price'];
							$prices= ($product_details['item_cost']-$product_details['special_price']);
							$percentage= (($prices) /$product_details['item_cost'])*100;
							$orginal_price=$product_details['item_cost'];
						}
			
		$product_details['withcrossmarkprice']=$orginal_price;
		$product_details['withoutcrossmarkprice']=$item_price;
		$product_details['percentage']=number_format($percentage, 2);
		$des=$this->Customerapi_model->all_product_description($item_id);
		//$product_details['descriptions']=$des;
		//$product_details['imagepath']='https://cartinhours.com/uploads/products/';
		//echo '<pre>';print_r($product_details);exit;
		//echo $this->db->last_query();exit;
		$sameproducts_list= $this->Customerapi_model->get_same_products($product_details['subcategory_id'],$product_details['item_name'],$product_details['item_id']);
		$sameproducts_size= $this->Customerapi_model->get_same_products_size($product_details['subcategory_id'],$product_details['item_name'],$product_details['item_id']);
		$sameproducts_colour= $this->Customerapi_model->get_same_products_color($product_details['subcategory_id'],$product_details['item_name'],$product_details['item_id']);
		$sameproducts_ram= $this->Customerapi_model->get_same_products_ram($product_details['subcategory_id'],$product_details['item_name'],$product_details['item_id']);

		//echo '<pre>';print_r($sameproducts_list);exit;
		$color_list=$this->Customerapi_model->get_product_color_details($item_id);
		$size_list=$this->Customerapi_model->get_product_size_details($item_id);
		$specification_list=$this->Customerapi_model->get_product_specification_details($item_id);
		$uk_size_list=$this->Customerapi_model->get_product_uksize_details($item_id);
		
		
			$message = array('status'=>1,'path'=>base_url('uploads/products/'),'message'=>'product details','details'=>$product_details,'colorlist'=>$color_list,'sizelist'=>$size_list,'uksizelist'=>$uk_size_list,'specifications'=>$specification_list,'sameproducts_list'=>$sameproducts_list,'gbsizelist'=>$sameproducts_size,'colourlist'=>$sameproducts_colour,'ramlist'=>$sameproducts_ram,'descriptions'=>$des,'imagepath'=>base_url('uploads/products/'));
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
	/* relatedproduct list */
	public function relatedproducts_get()
	{
		$name=$this->input->get('name');
		$category_id=$this->input->get('category_id');
		$subcategory_id=$this->input->get('subcategory_id');
			if($category_id==''){
			$message = array('status'=>1,'message'=>'category id name is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($subcategory_id==''){
			$message = array('status'=>1,'message'=>'subcategory id is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($name==''){
			$message = array('status'=>1,'message'=>'product name is required!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$searchname=substr($name, 0, 4);
			$relatedproducts= $this->Customerapi_model->get_related_products_list($category_id,$subcategory_id,$searchname);
			if(count($relatedproducts)>0){
				foreach ($relatedproducts as $productslist){
						$currentdate=date('Y-m-d h:i:s A');
					if($productslist['offer_expairdate']>=$currentdate){
					$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
					$percentage= $productslist['offer_percentage'];
					$orginal_price=$productslist['item_cost'];
					}else{
						//echo "expired";
						$item_price= $productslist['special_price'];
						$prices= ($productslist['item_cost']-$productslist['special_price']);
						$percentage= (($prices) /$productslist['item_cost'])*100;
						$orginal_price=$productslist['item_cost'];
					}
					
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);

				}
				foreach ($plist as $list){
				$pitemlist[]=$list;
				}
			}else{
				$pitemlist[]=array();
			}
		if(count($pitemlist[0])>0){
			
		
			$message = array('status'=>1,'message'=>'related product list details','list'=>$pitemlist,'path'=>base_url('uploads/products/'));
			$this->response($message,REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>1,'message'=>'No related product list ');
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
			
			//echo '<pre>';print_r($data1);exit;
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
						$msg=$six_digit_random_number.' is your Cartinhours verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security';
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobile.'&text='.$msg.'&priority=ndnd&stype=normal');
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
					
						//echo '<pre>';print_r($server_output);exit;
						$this->Customerapi_model->login_verficationcode_mobile_save($mobile,$forgotpasscheck['customer_id'],$six_digit_random_number);
						$message = array('status'=>1,'customer_id'=>$forgotpasscheck['customer_id'],'message'=>'Verification code send to your MobileNumber Id.check it once');

					}else if(isset($email) && $email!=''){
						
							$msg=$six_digit_random_number.'is your shofus verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security ';
							$this->load->library('email');
							$this->email->from('admin@shofus.com', 'shofus');
							$this->email->to($email);
							$this->email->subject('shofus - Forgot Password');
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
					$message = array('status'=>0,'message'=>'Email Id is not registered');
				}else if($mobile!=''){
					$message = array('status'=>0,'message'=>'Mobile Number is not registered');
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
					$message = array('status'=>1,'customer_id'=>$customer_id,'message'=>'Password successfully Updated');
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
			//echo '<pre>';print_r($customer_details);exit;
			
			if(isset($customer_details['cust_email]']) && $customer_details['cust_email]']=='' && $customer_details['cust_email']!=$email){
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
						$message = array('status'=>1,'imagepath'=>base_url('uploads/profile/'),'customer_id'=>$customer_id,'message'=>'profile successfully Updated');
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
		
			$message = array('status'=>1,'profilepicpath'=>base_url('uploads/profile/'),'message'=>'customer profile details','details'=>$cust_details);
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
	public function homepagebanner_get()
	{
		$banners=$this->Customerapi_model->home_page_banners();
		//echo '<pre>';print_r($banners);exit;
		if(count($banners)>0){
			$message = array(
				'status'=>1,
				'banners_list'=>$banners,
				'path'=>base_url('uploads/banners/')
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
				'path'=>base_url('uploads/products/')
			);
			//$top_offers['path']='https://cartinhours.com/uploads/productsimages/';
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
				'path'=>base_url('uploads/products/')
			);
			//$deals['path']='https://cartinhours.com/uploads/productsimages/';
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
				'path'=>base_url('uploads/products/')
			);
			//$ssales['path']='https://cartinhours.com/uploads/productsimages/';
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
				'path'=>base_url('uploads/products/')
			);
			//$treding['path']='https://cartinhours.com/uploads/productsimages/';
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
				'path'=>base_url('uploads/products/')
			);
			//$offers['path']='https://cartinhours.com/uploads/productsimages/';
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
					'path'=>base_url('uploads/products/')
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


	
	/* category api*/
	public function categories_get()
	{
		$categories = $this->Customerapi_model->get_categories();
		if(count($categories)>0){
				$message = array
				(
					'status'=>1,
					'categories'=>$categories,
					'path' =>base_url('assets/categoryimages/')
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
					'path' =>base_url('assets/subcategoryimages/')
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
		if(isset($subcategorie_items) && count($subcategorie_items)>0){
						foreach ($subcategorie_items as $productslist){
						
						$currentdate=date('Y-m-d h:i:s A');
							if($productslist['offer_expairdate']>=$currentdate){
							$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
							$percentage= $productslist['offer_percentage'];
							$orginal_price=$productslist['item_cost'];
							}else{
								//echo "expired";
								$item_price= $productslist['special_price'];
								$prices= ($productslist['item_cost']-$productslist['special_price']);
								$percentage= (($prices) /$productslist['item_cost'])*100;
								$orginal_price=$productslist['item_cost'];
							}
						$plist[$productslist['item_id']]=$productslist;
						$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
						$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
						$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
						
					}
					foreach ($plist as $list){
						$pitemlist[]=$list;
					}
			}else{
				$pitemlist[]=array();
			}
		
			if(count($pitemlist[0])>0){
				$message = array
				(
					'status'=>1,
					'Subcategorie Items'=>$pitemlist,
					'path' =>base_url('uploads/products/')
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
		///echo $this->db->last_query();exit;
		if(isset($catwisepro) && count($catwisepro)>0){
				foreach ($catwisepro as $productslist){
				
				$currentdate=date('Y-m-d h:i:s A');
					if($productslist['offer_expairdate']>=$currentdate){
					$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
					$percentage= $productslist['offer_percentage'];
					$orginal_price=$productslist['item_cost'];
					}else{
						//echo "expired";
						$item_price= $productslist['special_price'];
						$prices= ($productslist['item_cost']-$productslist['special_price']);
						$percentage= (($prices) /$productslist['item_cost'])*100;
						$orginal_price=$productslist['item_cost'];
					}
				$plist[$productslist['item_id']]=$productslist;
				$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
				$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
				$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
				
			}
				foreach ($plist as $list){
					$pitemlist[]=$list;
				}
		}else{
			$pitemlist[]=array();
		}
		if(count($pitemlist)>0){
				$message = array
				(
					'status'=>1,
					'products'=>$pitemlist,
					'path' =>base_url('uploads/products/')
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
		
		$top_offer_location = $this->Customerapi_model->top_offers_product_search();
		if(isset($top_offer_location) && count($top_offer_location)>0){
			foreach ($top_offer_location as $productslist){
			
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
			$plist[$productslist['item_id']]=$productslist;
			$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
			$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
			$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
			
		}
		foreach ($plist as $list){
			$pitemlist[]=$list;
		}
		}else{
			$pitemlist[]=array();
		}
		
		//echo '<pre>';print_r($pitemlist);exit;
		//echo $this->db->last_query();exit;
		if(count($pitemlist[0])>0){
				$message = array
				(
					'status'=>1,
					'path' =>base_url('uploads/products/'),
					'location_top_offers'=>$pitemlist,
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Topoffers In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function dealsofthedaylocationwiseproducts_get()
	{
	
		$deals_of_the_day_location = $this->Customerapi_model->deals_of_the_day_product_search();
		if(isset($deals_of_the_day_location) && count($deals_of_the_day_location)>0){
			foreach ($deals_of_the_day_location as $productslist){
			
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
			$plist[$productslist['item_id']]=$productslist;
			$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
			$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
			$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
			
		}
		foreach ($plist as $list){
			$pitemlist[]=$list;
		}
		}else{
			$pitemlist[]=array();
		}
		if(count($pitemlist[0])>0){
				$message = array
				(
					'status'=>1,
					'path' =>base_url('uploads/products/'),
					'location_deals ofthe day'=>$pitemlist,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function seasonsaleslocationwiseproducts_get()
	{
		
		$season_sales_location = $this->Customerapi_model->season_sales_product_search();
		if(isset($season_sales_location) && count($season_sales_location)>0){
					foreach ($season_sales_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$pitemlist[]=$list;
				}
		}else{
			$pitemlist[]=array();
		}
		if(count($pitemlist[0])>0){
				$message = array
				(
					'status'=>1,
					'path' =>base_url('uploads/products/'),
					'location_season sales'=>$pitemlist,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function trendinglocationwiseproducts_get()
	{
	
		$treanding_location = $this->Customerapi_model->treanding_product_search();
		if(isset($treanding_location) && count($treanding_location)>0){
					foreach ($treanding_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$pitemlist[]=$list;
				}
		}else{
			$pitemlist[]=array();
		}
		if(count($pitemlist[0])>0){
				$message = array
				(
					'status'=>1,
					'path' =>base_url('uploads/products/'),
					'location_treading'=>$pitemlist,
					
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}


	public function offersforyoulocationwiseproducts_get()
	{
		$offers_for_you_location = $this->Customerapi_model->offers_for_you_product_search();
		if(isset($offers_for_you_location) && count($offers_for_you_location)>0){
					foreach ($offers_for_you_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$pitemlist[]=$list;
				}
		}else{
			$pitemlist[]=array();
		}
		if(count($pitemlist[0])>0){
				$message = array
				(
					
					'location_offer for you'=>$pitemlist,
					'status'=>1,
					'path' =>base_url('uploads/products/')
					
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
				'path' =>base_url('uploads/products/')
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
						'path' =>base_url('uploads/products/')
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
						'path' =>base_url('uploads/products/')
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
		$pincode=$this->input->get('pincode');	
			
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
			}elseif($pincode==''){
			$message = array('status'=>1,'message'=>'pincode is required!');
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
						'payment_type'=>1,
						'amount_status'=>1,
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
						'pincode'=>$pincode,
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
						'pincode'=>$pincode,
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
			$statuss=$this->input->get('status');
			
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
			
			if($statuss==''){
				$status=1;
			}else{
				$status=$statuss;
			}
			$previousdata= $this->Customerapi_model->get_all_previous_search_fields($Ip_address);

			/*once change category id delete old data*/
			$getcategory_id= $this->Customerapi_model->get_subcategory_id_filterssearh($Ip_address);
			if(count($getcategory_id)>0){
			//echo '<pre>';print_r($getcategory_id);exit;
				$previous= $this->Customerapi_model->get_all_previous_search_fields_withip($getcategory_id[0]['Ip_address'],$getcategory_id[0]['category_id']);
				foreach($previous as $list){
					$this->Customerapi_model->delete_privous_searchdata($list['id'],$getcategory_id[0]['Ip_address']);
				}
				
			
			}
			if($category_id==18){
			if(isset($cusine) && $cusine!=''){
				$cusinedata=explode(',',$cusine);
				foreach ($cusinedata as $clist){
					$cusinefilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'cusine'=>$clist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($cusinefilterdata);
					
				}
			}
			if(isset($restraent) && $restraent!=''){
				$restraentdata=explode(',',$restraent);
				foreach ($restraentdata as $rlist){
					$restraentfilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'restraent'=>$rlist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($restraentfilterdata);
					
				}
			}
			}else{
			if(isset($offers) && $offers!=''){
				$offersdata=explode(',',$offers);
				foreach ($offersdata as $olist){
					$offersfilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'offers'=>$olist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($offersfilterdata);
					
				}
			}
			if(isset($brand) && $brand!=''){
				$branddata=explode(',',$brand);
				foreach ($branddata as $blist){
					$brandfilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'brand'=>$blist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($brandfilterdata);
					
				}
			}
			if(isset($discount) && $discount!=''){
				$discountdata=explode(',',$discount);
				foreach ($discountdata as $dlist){
					$discountfilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'discount'=>$dlist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($discountfilterdata);
					
				}
			}
			if(isset($color) && $color!=''){
				$colordata=explode(',',$color);
				foreach ($colordata as $clist){
					$colorfilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'color'=>$clist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($colorfilterdata);
					
				}
			}
			if(isset($size) && $size!=''){
				$sizedata=explode(',',$size);
				foreach ($sizedata as $slist){
					$sizefilterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'size'=>$slist,
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$this->Customerapi_model->save_searchdata($sizefilterdata);
					
				}
			}
			}
			/*delete old data*/
				$filterdata=array(
					'Ip_address'=>$Ip_address,
					'category_id'=>$category_id,
					'mini_amount'=>isset($mini_amount) ? $mini_amount:'',
					'max_amount'=>isset($max_amount) ? $max_amount:'',
					'status'=>isset($status) ? $status:'',
					'create'=>date('Y-m-d H:i:s'),
				);
				$filtersdata= $this->Customerapi_model->save_searchdata($filterdata);
					if(count($filtersdata)>0){
						$removesearch= $this->Customerapi_model->get_all_previous_search_fields($Ip_address);
							foreach ($removesearch as $list){
								$this->Customerapi_model->update_amount_privous_searchdata($mini_amount,$max_amount,$list['id'],$status);

							}

					}
					$categorywise= $this->Customerapi_model->get_search_all_subcategory_products();
					//echo $this->db->last_query();
					if(count($categorywise)>0){
					foreach($categorywise as $list){
						
						foreach($list as $li){
							foreach($li as $l){
							$idslist[]=$l['item_id'];
							}
						}
					}
				//echo '<pre>';prhttp://localhost/cartinhour/api/customerApi/category_wise_leftside_filters?category_id=20int_r($idslist);
					
					if(isset($idslist) && count($idslist)>0){
							$result = array_unique($idslist);
								foreach ($result as $pids){
										$pdetails=$this->Customerapi_model->product_details($pids);
										
											$currentdate=date('Y-m-d h:i:s A');
											if($pdetails['offer_expairdate']>=$currentdate){
											$item_price= ($pdetails['item_cost']-$pdetails['offer_amount']);
											$percentage= $pdetails['offer_percentage'];
											$orginal_price=$pdetails['item_cost'];
											}else{
											//echo "expired";
											$item_price= $pdetails['special_price'];
											$prices= ($pdetails['item_cost']-$pdetails['special_price']);
											$percentage= (($prices) /$pdetails['item_cost'])*100;
											$orginal_price=$pdetails['item_cost'];
											}
										$products_list[$pids]=$pdetails;
										$products_list[$pids]['withcrossmarkprice']=$orginal_price;
										$products_list[$pids]['withoutcrossmarkprice']=$item_price;
										$products_list[$pids]['percentage']=number_format($percentage, 2);

									}
									foreach ($products_list as $lis){
										$lists[]=$lis;
									}
							$categorywiseproducrlist=$lists;
					}else{
					$categorywiseproducrlist=array();;

					}
				}else{
					$categorywiseproducrlist=array();;
					
				}
						
					$message = array('status'=>1,'filtersresult'=>$categorywiseproducrlist,'message'=>'filter search result and previous search data','previoussearchdata'=>$previousdata,'path'=>base_url('uploads/products/'));
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
					$minamt = min( array_map("max", $data['price_list']) );
					$maxamt= max( array_map("max", $data['price_list']) );
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					$iospurpose=array_merge($data['cusine_list'][0],$data['myrestaurant'][0],$data['price_list'][0],array('Instock'=>1,'Out of stock'=>0),array('Minimum amount'=>$data['minimum_price']['item_cost']),array('Maximum amount'=>$data['maximum_price']['item_cost']));

				}else if($category_id==21){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$minamt = min( array_map("max", $data['price_list']) );
					$maxamt= max( array_map("max", $data['price_list']) );
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
						
					$iospurpose=array_merge($data['brand_list'][0],$data['price_list'][0],$data['discount_list'][0],array('Instock'=>1,'Out of stock'=>0),$data['offer_list'][0],array('Minimum amount'=>$data['minimum_price']['item_cost']),array('Maximum amount'=>$data['maximum_price']['item_cost']));
					 //echo '<pre>';print_r($data);exit;
				}else if($category_id==20){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$offer_list= $this->Customerapi_model->get_all_offer_list($category_id);
					//$data['color_list']= $this->Customerapi_model->get_all_color_list($category_id);
					$data['color_list']= $this->Customerapi_model->get_all_colours_list($category_id);
					$minamt = min( array_map("max", $data['price_list']) );
					$maxamt= max( array_map("max", $data['price_list']) );
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
						if($list['offer_percentage']!=''){
						$ids[]=$list['offer_percentage'];
						}
						}else{
						if($list['offers']!=''){
						$ids[]=$list['offers'];
						}
						}

						}
						foreach (array_unique($ids) as $Li){
						$uniids[]=array('offers'=>number_format($Li, 2));

						}
						//echo '<pre>';print_r($uniids);exit;
					$data['offer_list']=$uniids;
					$iospurpose=array_merge($data['brand_list'][0],$data['price_list'][0],$data['discount_list'][0],array('Instock'=>1,'Out of stock'=>0),$data['offer_list'][0],$data['color_list'][0],array('Minimum amount'=>$data['minimum_price']['item_cost']),array('Maximum amount'=>$data['maximum_price']['item_cost']));

				}else if($category_id==19){
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$data['color_list']= $this->Customerapi_model->get_all_color_list($category_id);
					$data['sizes_list']= $this->Customerapi_model->get_all_size_list($category_id);
					$minamt = min( array_map("max", $data['price_list']) );
					$maxamt= max( array_map("max", $data['price_list']) );
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					$iospurpose=array_merge($data['brand_list'][0],$data['price_list'][0],$data['discount_list'][0],array('Instock'=>1,'Out of stock'=>0),$data['offer_list'][0],$data['color_list'][0],$data['sizes_list'][0],array('Minimum amount'=>$data['minimum_price']['item_cost']),array('Maximum amount'=>$data['maximum_price']['item_cost']));

				}else{
					$data['brand_list']= $this->Customerapi_model->get_all_brand_list($category_id);
					$data['price_list']= $this->Customerapi_model->get_all_price_list($category_id);
					$data['discount_list']= $this->Customerapi_model->get_all_discount_list($category_id);
					$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
					$data['offer_list']= $this->Customerapi_model->get_all_offer_list($category_id);
					$minamt = min( array_map("max", $data['price_list']) );
					$maxamt= max( array_map("max", $data['price_list']) );
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					$iospurpose=array_merge($data['brand_list'][0],$data['price_list'][0],$data['discount_list'][0],array('Instock'=>1,'Out of stock'=>0),$data['offer_list'][0],array('Minimum amount'=>$data['minimum_price']['item_cost']),array('Maximum amount'=>$data['maximum_price']['item_cost']));

				}
				
				$message = array('status'=>1,'categorywiseleftsidefilters_list'=>$data,'message'=>'filter search result','iosapppurpose'=>$iospurpose);
				$this->response($message, REST_Controller::HTTP_OK);
		}
		
		
		
		public function orderreturn_post(){
			$order_item_id=$this->input->get('order_item_id');
			$status_id=$this->input->get('status_id');
			$returntype=$this->input->get('returntype');
			$region=$this->input->get('region');
			$size=$this->input->get('size');
			$color=$this->input->get('color');
			$uksize=$this->input->get('uksize');
			$checking=$this->Customerapi_model->checking_ststus_id($status_id,$order_item_id);
			if(count($checking)>0){
			
			if($status_id==''){
				$message = array('status'=>1,'message'=>'Status id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($returntype==''){
				$message = array('status'=>1,'message'=>'Return type is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($region==''){
				$message = array('status'=>1,'message'=>'Region is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($order_item_id==''){
				$message = array('status'=>1,'message'=>'order item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
				if(isset($returntype) && $returntype==1){
					$refundtype='Refund';
				}else if(isset($returntype) && $returntype==2){
					$refundtype='Exchange';
				}else if(isset($returntype) && $returntype==3){
					$refundtype='Replacement';
				}
				
				$exchangedetails=array(
						'color'=>isset($color)?$color:'',
						'size'=>isset($size)?$size:'',
						'uksize'=>isset($uksize)?$uksize:'',
						'region'=>isset($region)?$region:'',
						'status_refund'=>isset($returntype)?$returntype:'',
						'update_time'=>date('Y-m-d H:i:s A'),
						);
				$exchangesave= $this->Customerapi_model->update_refund_details($status_id,$exchangedetails);
				if(count($exchangesave)>0){
					$custdetails=$this->Customerapi_model->get_customerBilling_details($order_item_id);
					//echo '<pre>';print_r($custdetails);exit;
					if(isset($returntype) && $returntype==1){
							$msg='Refund for Order-item-id : '.$order_item_id.'. is processed successfully. For delays over 4 days, contact your bank.';
							$username=$this->config->item('smsusername');
							$pass=$this->config->item('smspassword');
							$cancelmobilesno=$custdetails['customer_phone'];
							$ch4 = curl_init();
							curl_setopt($ch4, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
							curl_setopt($ch4, CURLOPT_POST, 1);
							curl_setopt($ch4, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$cancelmobilesno.'&text='.$msg.'&priority=ndnd&stype=normal');
							curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
							//echo '<pre>';print_r($ch);exit;
							$server_output = curl_exec ($ch4);
							curl_close ($ch4);
							
					}
					$sellermsg='Return Order-item-id : '.$order_item_id.'. is processed successfully. For the customer reason is .'.$region;
							$messagelis['msg']=$sellermsg;
							$username=$this->config->item('smsusername');
							$pass=$this->config->item('smspassword');
							$sellermobilesno=$custdetails['seller_mobile'];
							$ch5 = curl_init();
							curl_setopt($ch5, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
							curl_setopt($ch5, CURLOPT_POST, 1);
							curl_setopt($ch5, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$sellermobilesno.'&text='.$sellermsg.'&priority=ndnd&stype=normal');
							curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
							//echo '<pre>';print_r($ch);exit;
							$server_output = curl_exec ($ch5);
							curl_close ($ch5);
							$this->load->library('email');
							$this->email->set_newline("\r\n");
							$this->email->set_mailtype("html");
							$this->email->from('shofus.com');
							$this->email->to($custdetails['seller_email']);
							$this->email->subject('shofus - Order Return');
							$html = $this->load->view('email/orderreturn.php', $messagelis, true); 
							//echo $html;exit;
							$this->email->message($html);
							$this->email->send();
							
							$data=array('order_status'=>5);
							$this->Customerapi_model->update_refund_details_inorders($order_item_id,$data);
					$message = array('status'=>1,'message'=>'Your request submitted successfully');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
				
		}else{
			$message = array('status'=>1,'message'=>'status id invalid try again later!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}

				
			
		}
		public function nearbystores_get(){
			
			$storelist= $this->Customerapi_model->all_stores_list();
			
			//echo '<pre>';print_r($storelist);exit;
			if(count($storelist)>0){
					$message = array('status'=>1,'list'=>$storelist,'message'=>'near by stores list');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'NO stores are available. Please try again!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		}
		public function locationwisenearbystores_get(){
			$locationid=$this->input->get('locationid');
			if($locationid==''){
				$message = array('status'=>0,'message'=>'Location id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$ids=explode(',',$locationid);
			foreach ($ids as $list){
				//echo '<pre>';print_r($list);
				$storelist[]= $this->Customerapi_model->location_stores_list($list);
			}
			//echo '<pre>';print_r($storelist);exit;
			if(count($storelist)>0){
					$message = array('status'=>1,'list'=>$storelist,'message'=>'location wise near by stores list');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'NO stores are available. Please try again!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		}
		public function nearbystorescategorylist_get(){
			$seller_id=$this->input->get('seller_id');
			if($seller_id==''){
				$message = array('status'=>0,'message'=>'selled id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$category_list= $this->Customerapi_model->get_seller_category_details($seller_id);
			
			//echo '<pre>';print_r($storelist);exit;
			if(count($category_list)>0){
					$message = array('status'=>1,'list'=>$category_list,'message'=>'Seller categories list');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'NO categories are available. Please try again!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		}
		public function seller_categorylist_wise_products_get(){
			$seller_id=$this->input->get('seller_id');
			$category_id=$this->input->get('category_id');
			if($seller_id==''){
				$message = array('status'=>0,'message'=>'Seller id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if($category_id==''){
				$message = array('status'=>0,'message'=>'category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			$product_list= $this->Customerapi_model->get_sellercategory_wise_productslist($seller_id,$category_id);
			if(isset($product_list) && count($product_list)>0){
			foreach ($product_list as $productslist){
						
						$currentdate=date('Y-m-d h:i:s A');
							if($productslist['offer_expairdate']>=$currentdate){
							$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
							$percentage= $productslist['offer_percentage'];
							$orginal_price=$productslist['item_cost'];
							}else{
								//echo "expired";
								$item_price= $productslist['special_price'];
								$prices= ($productslist['item_cost']-$productslist['special_price']);
								$percentage= (($prices) /$productslist['item_cost'])*100;
								$orginal_price=$productslist['item_cost'];
							}
						$plist[$productslist['item_id']]=$productslist;
						$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
						$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
						$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
						
					}
					foreach ($plist as $list){
						$products_list[]=$list;
					}
			}else{
				$products_list[]=array();
			}
			
			//echo '<pre>';print_r($storelist);exit;
			if(count($products_list)>0){
					$message = array('status'=>1,'list'=>$products_list,'message'=>'Seller categories wise product list');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'NO products are available. Please try again!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		}
		public function overallproducts_list_review_get(){
			
			$product_list= $this->Customerapi_model->get_all_products_review_and_reviewcount();
			if(count($product_list)>0){
				//echo '<pre>';print_r($product_list);exit;
				foreach ($product_list as $List){
				$reviecount=$this->Customerapi_model->get_products_reviews($List['item_id']);
				$avg=$this->Customerapi_model->product_reviews_avg($List['item_id']);
				$data[$List['item_id']]=$List;
				$data[$List['item_id']]['reviewcount']=count($reviecount);
				$data[$List['item_id']]['avg']=$avg['avg'];
				}
				$message = array('status'=>1,'list'=>$data,'message'=>'product review and count list ');
				$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>1,'message'=>'NO products review and count list!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
		}
			public function category_filters_list_post(){
				$category_id=$this->input->get('category_id');
				$option=$this->input->get('option');
		
			if($category_id==''){
				$message = array('status'=>1,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}if($option==''){
				$message = array('status'=>1,'message'=>'option is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			if(isset($option) && $option=='cusine_list'){
				$fliter=$option;
				$val='cuisine';
				$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
				if(count($filtersoption_list)>0){
				foreach ($filtersoption_list as $key=>$list){
					$ls[]=$list['cusine'];
					
				}
				$data=$ls;
				}else{
				$data='';
				}
				
			
			}elseif(isset($option) && $option=='myrestaurant'){
				$fliter=$option;
				$val='restrant';
				$filtersoption_lists= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
				//echo '<pre>';print_r($filtersoption_lists);exit;
				if(count($filtersoption_lists)>0){
				foreach ($filtersoption_lists as $key=>$list){
					$ls[]=$list['seller_name'];
					
				}
				$data=$ls;
				}else{
				$data='';
				}
			
			}else if(isset($option) && $option=='offer_list'){
				$fliter=$option;
				$val='offers';
					$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
					//echo $this->db->last_query();
					if(count($filtersoption_list)>0){
						foreach ($filtersoption_list as $key=>$list){
							$ls[]=$list['offers'];
					
						}
						$offers=$ls;
						}else{
							$offers='';
							}
							
						$cc=array_unique($offers);
						foreach($cc as $cc){
							$lists_ids[]= $cc;
							}
					$data=($lists_ids);						
				//echo '<pre>';print_r($cc);exit;
			}else if(isset($option) && $option=='brand_list'){
				$fliter=$option;
				$val='brand';
				$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
					if(count($filtersoption_list)>0){
						foreach ($filtersoption_list as $key=>$list){
							$ls[]=$list['brand'];
					
						}
						$data=$ls;
						}else{
							$data='';
							}
			}else if(isset($option) && $option=='discount_list'){
				$fliter=$option;
				$val='discount';
				$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
					if(count($filtersoption_list)>0){
						foreach ($filtersoption_list as $key=>$list){
							$ls[]=$list['discount'];
					
						}
						$data=$ls;
						}else{
							$data='';
							}
			}else if(isset($option) && $option=='price_list'){
				$fliter=$option;
				$val='item_cost';
				$datails['filtersoption_list']= $this->Customerapi_model->get_all_filters_product_list($category_id,$fliter,$val);
				//echo $this->db->last_query();
				//$data['minimum'] = reset($datails['filtersoption_list']);
				//$data['maximum'] = end($datails['filtersoption_list']);
					$minamt = min( array_map("max", $datails['filtersoption_list']) );
					$maxamt= max( array_map("max", $datails['filtersoption_list']) );
					$data['minimum'] = array('item_cost'=>$minamt);
					$data['maximum'] = array('item_cost'=>$maxamt);
			}else if(isset($option) && $option=='color_list'){
				$fliter=$option;
				$val='color';
				$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list_color($category_id,$fliter,$val);
					if(count($filtersoption_list)>0){
						foreach ($filtersoption_list as $key=>$list){
							$ls[]=$list['color_name'];
					
						}
						$data=$ls;
						}else{
							$data='';
							}
			}else if(isset($option) && $option=='sizes_list'){
				$fliter=$option;
				$val='size';
				$filtersoption_list= $this->Customerapi_model->get_all_filters_product_list_size($category_id,$fliter,$val);
					if(count($filtersoption_list)>0){
						foreach ($filtersoption_list as $key=>$list){
							$ls[]=$list['p_size_name'];
					
						}
						$data=$ls;
						}else{
							$data='';
							}
			}else if(isset($option) && $option=='avalibility_list'){
					$data= array('Instock'=>1,'Out of stock'=>0);
			}
			$message = array('status'=>1,'list'=>$data,'message'=>'filters options list');
			$this->response($message, REST_Controller::HTTP_OK);
				
			}
			

			public function resendopt_post(){
					$customer_id=$this->input->get('customer_id');
					if($customer_id==''){
					$message = array('status'=>1,'message'=>'customer id is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					$forgotpasscheck = $this->Customerapi_model->forgot_customer_id($customer_id);
					if(count($forgotpasscheck)>0){
									$six_digit_random_number = mt_rand(100000, 999999);
									$username=$this->config->item('smsusername');
									$pass=$this->config->item('smspassword');
										$msg=' Your cartinhour verification code is '.$six_digit_random_number;
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
										curl_setopt($ch, CURLOPT_POST, 1);
										curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$forgotpasscheck['cust_mobile'].'&text='.$msg.'&priority=ndnd&stype=normal');
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										$server_output = curl_exec ($ch);
										curl_close ($ch);
									
										//echo '<pre>';print_r($server_output);
										$this->Customerapi_model->login_verficationcode_mobile_save($forgotpasscheck['cust_mobile'],$forgotpasscheck['customer_id'],$six_digit_random_number);
										
										$message = array('status'=>1,'customer_id'=>$forgotpasscheck['customer_id'],'message'=>'Verification code sent to your mobile number check it once');
										$this->response($message, REST_Controller::HTTP_OK);
							
							}else{
								$message = array('status'=>1,'message'=>'customer id not exist. please try again');
								$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							}
			}
			public function checkdelivery_status_post(){
					$pincode=$this->input->get('pincode');
					if($pincode==''){
					$message = array('status'=>1,'message'=>'pincode is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					$checkpincode = $this->Customerapi_model->get_pincode_details($pincode);
					if(count($checkpincode)>0){

					$message = array('status'=>1,'time'=>$checkpincode['hours']);
					$this->response($message, REST_Controller::HTTP_OK);

					}else{
					$message = array('status'=>1,'time'=>"We don't have service in your pincode");
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}
			public function billing_address_list_post(){
					$customer_id=$this->input->get('customer_id');
					if($customer_id==''){
					$message = array('status'=>1,'message'=>'customer id is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					$billingaddress = $this->Customerapi_model->get_customer_billing_list($customer_id);
					if(count($billingaddress)>0){
						$message = array('status'=>1,'list'=>$billingaddress,'message'=>'billing address list');
						$this->response($message, REST_Controller::HTTP_OK);

					}else{
					$message = array('status'=>1,'message'=>'billing address not found');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}
			public function billing_address_save_post(){
					$customer_id=$this->input->get('customer_id');
					$title=$this->input->get('title');
					$name=$this->input->get('name');
					$mobile=$this->input->get('mobile');
					$address1=$this->input->get('address1');
					$address2=$this->input->get('address2');
					$landmark=$this->input->get('landmark');
					$pincode=$this->input->get('pincode');
					$city=$this->input->get('city');
					$state=$this->input->get('state');
					if($customer_id==''){
					$message = array('status'=>1,'message'=>'Customer id is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($title==''){
					$message = array('status'=>1,'message'=>'Title is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($name==''){
					$message = array('status'=>1,'message'=>'Name is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($mobile==''){
					$message = array('status'=>1,'message'=>'mobile is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($address1==''){
					$message = array('status'=>1,'message'=>'Address1 is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($address2==''){
					$message = array('status'=>1,'message'=>'Address2 is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($landmark==''){
					$message = array('status'=>1,'message'=>'landmark is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($pincode==''){
					$message = array('status'=>1,'message'=>'pincode is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($city==''){
					$message = array('status'=>1,'message'=>'city is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($state==''){
					$message = array('status'=>1,'message'=>'state is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					$billingaddress = $this->Customerapi_model->check_customer_exits($customer_id);
					if(count($billingaddress)>0){
						
						$savenewadd=array(
							'cust_id'=>$billingaddress['customer_id'],
							'emal_id'=>$billingaddress['cust_email'],
							'title'=>$title,
							'name'=>$name,
							'mobile'=>$mobile,
							'address1'=>$address1,
							'address2'=>$address2,
							'landmark'=>$landmark,
							'pincode'=>$pincode,
							'city'=>$city,
							'state'=>$state,
							'create-at'=>date('Y-m-d H:i:s'),
						);
						$addnewadd= $this->Customerapi_model->save_new_address($savenewadd);
						if(count($addnewadd)>0){
							$message = array('status'=>1,'address_id'=>$addnewadd,'message'=>'Your billing address was saved successfully ');
						$this->response($message, REST_Controller::HTTP_OK);
							
						}else{
							$message = array('status'=>1,'message'=>'Technical problem will occurred. please try again after some time');
						$this->response($message, REST_Controller::HTTP_OK);
						}
						
						
						

					}else{
					$message = array('status'=>1,'message'=>'Customer not found. please  try again');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
			}
			public function orderpaymenttype_post(){
					$customer_id=$this->input->get('customer_id');
					$payment_type=$this->input->get('payment_type');
					$name=$this->input->get('name');
					$mobile=$this->input->get('mobile');
					$address1=$this->input->get('address1');
					$address2=$this->input->get('address2');
					$pincode=$this->input->get('pincode');
					$city=$this->input->get('city');
					$state=$this->input->get('state');
					if($customer_id==''){
					$message = array('status'=>1,'message'=>'Customer id is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($payment_type==''){
					$message = array('status'=>1,'message'=>'Payment Type is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($name==''){
					$message = array('status'=>1,'message'=>'Name is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($mobile==''){
					$message = array('status'=>1,'message'=>'mobile is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($address1==''){
					$message = array('status'=>1,'message'=>'Address1 is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($address2==''){
					$message = array('status'=>1,'message'=>'Address2 is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($pincode==''){
					$message = array('status'=>1,'message'=>'pincode is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($city==''){
					$message = array('status'=>1,'message'=>'city is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($state==''){
					$message = array('status'=>1,'message'=>'state is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					
					$ordersucess=array(
					'customer_id'=>$customer_id,
					'transaction_id'=>'',
					'net_amount'=>'',
					'total_price'=>'',
					'discount'=>'',
					'bank_reference_number'=>'',
					'payment_mode'=>'',
					'card_number'=>'',
					'email'=>'',
					'phone'=>'',
					'order_status'=>1,
					'hash'=>'',
					'payment_type'=>$payment_type,
					'amount_status'=>0,
					'created_at'=>date('Y-m-d H:i:s'),
				);
				$saveorder=$this->Customerapi_model->save_order_success($ordersucess);
				$cart_items= $this->Customerapi_model->get_cart_products($customer_id);
				$customerdetails= $this->Customerapi_model->get_customer_details($customer_id);
				//echo '<pre>';print_r($customerdetails);exit;
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
						'customer_email'=>$customerdetails['cust_email'],
						'customer_phone'=>$mobile,
						'pincode'=>$pincode,
						'city'=>$city,
						'state'=>$state,
						'customer_address'=>$address1.' '.$address2,
						'order_status'=>1,
						'color'=>$items['color'],
						'size'=>$items['size'],
						'create_at'=>date('Y-m-d H:i:s'),
					);
					//echo '<pre>';print_r($items);exit;
					$item_qty=$this->Customerapi_model->get_item_details($items['item_id']);
					$less_qty=$item_qty['item_quantity']-$items['qty'];
					//echo '<pre>';print_r($item_qty);
					//echo '<pre>';print_r($less_aty);
					//exit;
					$this->Customerapi_model->update_tem_qty_after_purchasingorder($items['item_id'],$less_qty,$items['seller_id']);
					$save= $this->Customerapi_model->save_order_items_list($orderitems);
					$msg=' Oder-Item-Id: '.$save.' product name: '.$items['item_name'].' product code: '.$items['product_code'].' color: '.$items['colour'];
					$messagelis['msg']=$msg;
					$username=$this->config->item('smsusername');
					$pass=$this->config->item('smspassword');
					$mobilesno=$items['seller_mobile'];
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobilesno.'&text=Customer orederdetails'.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('shofus.com');
					$this->email->to($items['seller_email']);
					$this->email->subject('shofus - Order Confirmation');
					$html = $this->load->view('email/sellerorederconfirmation.php', $messagelis, true); 
					//echo $html;exit;
					$this->email->message($html);
					$this->email->send();
					
			
					//echo '<pre>';print_r($save);exit;
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
						'name'=>$name,
						'mobile'=>$mobile,
						'address1'=>$address1,
						'address2'=>$address2,
						//'area'=>$area,
						'emal_id'=>$customerdetails['cust_email'],
						'pincode'=>$pincode,
						'city'=>$city,
						'state'=>$state,
						'create-at'=>date('Y-m-d H:i:s'),
					);
			$saveorderbillingaddress= $this->Customerapi_model->save_order_billing_address($orderbilling);
			
				$data['order_items']=$this->Customerapi_model->get_order_item_details($saveorder);
				//echo '<pre>';print_r($data);exit;
				
				//echo '<pre>';print_r($data);exit;
				/*semd  email purpose*/
						$this->load->library('email');
						$this->email->set_newline("\r\n");
						$this->email->set_mailtype("html");
						$this->email->from('shofus.com');
						$this->email->to($customerdetails['cust_email']);
						$this->email->subject('shofus - Order Confirmation');
						$html = $this->load->view('email/orderconfirmation.php', $data, true); 
						//echo $html;exit;
						$this->email->message($html);
						$this->email->send();
					
					/*semd  email purpose*/
					
		
		
				
				$cart_items= $this->Customerapi_model->get_cart_products($customer_id);
			
		//echo '<pre>';print_r($cart_items);exit;
		
			foreach($cart_items as $items){
			$delete= $this->Customerapi_model->after_payment_cart_item($customerdetails['customer_id'],$items['item_id'],$items['id']);
			}
			$message = array('status'=>1,'orderid'=>$saveorder,'message'=>'Payment successfully completed!');
			$this->response($message, REST_Controller::HTTP_OK);
				
			}	
			
			
			public function mobilehomebanners_get(){
				
				$bannerslist= $this->Customerapi_model->get_home_banners_list();
				$homepagemiddlebannerslist= $this->Customerapi_model->get_homepagemiddle_banners_list();
				if(count($bannerslist)>0){
					//$message = array('status'=>1,'path'=>'https://cartinhours.com/assets/appbanners/','list'=>$bannerslist,'middlelist'=>$homepagemiddlebannerslist,'path1'=>'https://cartinhours.com/assets/middlehomepagebanners/','message'=>'banners list are available');
					$message = array('status'=>1,'path'=>base_url('assets/appbanners/'),'list'=>$bannerslist,'middlelist'=>$homepagemiddlebannerslist,'path1'=>base_url('assets/middlehomepagebanners/'),'message'=>'banners list are available');
				$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
					$message = array('status'=>1,'message'=>'No banners are available');
				$this->response($message, REST_Controller::HTTP_OK);
				}
					
			}
			public function cancel_order_post(){
				$order_items_id=$this->input->get('order_items_id');
					$status=$this->input->get('status');
					$comments=$this->input->get('comments');
					if($order_items_id==''){
					$message = array('status'=>1,'message'=>'Order Item id is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					if($status==''){
					$message = array('status'=>1,'message'=>'status is required!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					$canceldata=array(
					'status_refund'=>'cancel',
					'status_confirmation'=>5,
					'reason'=>isset($status)?$status:'',
					'comments'=>isset($comments)?$comments:'',
					);
					$canclesaveorder=$this->Customerapi_model->save_cancel_order($order_items_id,$canceldata);
					$custdetails=$this->Customerapi_model->get_customerBilling_details($order_items_id);
				//echo '<pre>';print_r($custdetails);exit;
					if(count($canclesaveorder)>0){
					$msg='Cancellation: We have received your cancellation request for the Order-item-id: '.$order_items_id.'. Please do not accept the product if delivery is attempted. Check your email for more details.@';
					$messagelis['msg']=$msg;
					$username=$this->config->item('smsusername');
					$pass=$this->config->item('smspassword');
					$cancelmobilesno=$custdetails['customer_phone'];
					$ch4 = curl_init();
					curl_setopt($ch4, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch4, CURLOPT_POST, 1);
					curl_setopt($ch4, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$cancelmobilesno.'&text='.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch4);
					curl_close ($ch4);
					/*cancel sms */
					
					
					/*email*/
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('cartinhours.com');
					$this->email->to($custdetails['cust_email']);
					$this->email->subject('Cartinhours - Order Cancellation');
					$html = $this->load->view('email/customerordercancel.php', $messagelis, true); 
					//echo $html;exit;
					$this->email->message($html);
					$this->email->send();
					
					/*email*/
						
						$message = array('status'=>1,'message'=>'Your request successfully submitted');
						$this->response($message, REST_Controller::HTTP_OK);
						
					}else{
						$message = array('status'=>1,'message'=>'Technical problem occured try again later!');
						$this->response($message, REST_Controller::HTTP_OK);
					}

					
			}
			
	public function subcategorywise_subitemlist_get(){
		$sub_category_id=$this->input->get('sub_category_id');
		if($sub_category_id==''){
				$message = array('status'=>0,'message'=>'Sub category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
		}
		$subitems_list= $this->Customerapi_model->get_sub_items_list($sub_category_id);
		if(count($subitems_list)>0){
			$message = array(
				'status'=>1,
				'message'=>'Sub Item List are found',
				'list'=>$subitems_list,
				);
				$this->response($message,REST_Controller::HTTP_OK);
			
		}else{
				$message = array('status'=>0,'message'=>'Sub category having  no sub items');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function subitemwise_productlist_get(){
		
	$sub_item_id=$this->input->get('sub_item_id');
		if($sub_item_id==''){
				$message = array('status'=>0,'message'=>'Sub item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
		}
		$productitems= $this->Customerapi_model->get_sub_itemswise_productlist($sub_item_id);
		if(isset($productitems) && count($productitems)>0){
				foreach ($productitems as $productslist){
							
							$currentdate=date('Y-m-d h:i:s A');
								if($productslist['offer_expairdate']>=$currentdate){
								$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
								$percentage= $productslist['offer_percentage'];
								$orginal_price=$productslist['item_cost'];
								}else{
									//echo "expired";
									$item_price= $productslist['special_price'];
									$prices= ($productslist['item_cost']-$productslist['special_price']);
									$percentage= (($prices) /$productslist['item_cost'])*100;
									$orginal_price=$productslist['item_cost'];
								}
							$plist[$productslist['item_id']]=$productslist;
							$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
							$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
							$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
							
						}
						foreach ($plist as $list){
							$productitemslist[]=$list;
						}
				}else{
					$productitemslist[]=array();
				}
		//echo '<pre>';print_r($item_lists);exit;
		if(count($productitemslist)>0){
			$message = array(
				'status'=>1,
				'message'=>'product List are found',
				'list'=>$productitemslist,
				'path'=>base_url('uploads/products/')
				);
				$this->response($message,REST_Controller::HTTP_OK);
			
		}else{
				$message = array('status'=>0,'message'=>'Sub item having  no products');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
	
	
	public function subcategories_list_get()
	{
		$get = $this->input->get('category_id');
		if($get==''){
				$message = array('status'=>0,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$subcategories = $this->Customerapi_model->get_subcategories_list($get);
		if(count($subcategories)>0){
		foreach ($subcategories as $list){
			$subitems_list= $this->Customerapi_model->get_sub_items_list($list['subcategory_id']);
			$plist[$list['subcategory_id']]=$list;
			$plist[$list['subcategory_id']]['subitempath']=base_url('assets/subitems/');
			$plist[$list['subcategory_id']]['expandablebool']='false';
			$plist[$list['subcategory_id']]['subitems']=$subitems_list;
			
		}

		foreach ($plist as $li){
			$pitem_list[]=$li;
			
		}
		if(count($pitem_list)>0){
						$message = array
						(
							'status'=>1,
							'Subcategories'=>$pitem_list,
							'path' =>base_url('assets/subcategoryimages/')
						);
						$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
				
					$message = array('status'=>0,'message'=>'Sub Category List Empty.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
				}
				
		}else{
			$message = array('status'=>0,'message'=>'Sub Category List Empty.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	
	
	/*andriod test*/
	public function android_test_get()
	{
		$get = $this->input->get('category_id');
		if($get==''){
				$message = array('status'=>0,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$subcategories = $this->Customerapi_model->get_subcategories_list($get);
		if(count($subcategories)>0){
		foreach ($subcategories as $list){
			$subitems_list= $this->Customerapi_model->get_sub_items_list($list['subcategory_id']);
			$plist[$list['subcategory_id']]=$list;
			$plist[$list['subcategory_id']]['subitempath']=base_url('assets/subitems/');
			$plist[$list['subcategory_id']]['expandablebool']='false';
			$plist[$list['subcategory_id']]['subitems']=$subitems_list;
			
		}

		foreach ($plist as $li){
			$pitem_list[]=$li;
			
		}
		if(count($plist)>0){
						$message = array
						(
							'status'=>1,
							'Subcategories'=>$plist,
							'path' =>base_url('assets/subcategoryimages/')
						);
						$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
				
					$message = array('status'=>0,'message'=>'Sub Category List Empty.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
				}
				
		}else{
			$message = array('status'=>0,'message'=>'Sub Category List Empty.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/*andriod test*/
	public function subitem_wiseitem_get()
	{
		$sub_item_id = $this->input->get('subitem_id');
		if($sub_item_id==''){
				$message = array('status'=>0,'message'=>'Sub item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
		}
		$tems_list= $this->Customerapi_model->get_itemwise_items_list($sub_item_id);
		
		if(count($tems_list)>0){
						$message = array
						(
							'status'=>1,
							'itemslist'=>$tems_list,
							'message'=>'Item List are found.'
						);
						$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
				
					$message = array('status'=>0,'message'=>'Item List Empty.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
				}
	}
	public function item_wiseproducts_get()
	{
		$item_id = $this->input->get('item_id');
		if($item_id==''){
				$message = array('status'=>0,'message'=>'Item id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$tems_list= $this->Customerapi_model->get_wise_items_product_list($item_id);
		if(count($tems_list)>0){
						$message = array
						(
							'status'=>1,
							'productlist'=>$tems_list,
							'path'=>base_url('uploads/products/'),
							'message'=>'Product list are found.'
						);
						$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
				
					$message = array('status'=>0,'message'=>'product list Empty.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
				}
	}
public function homeapi_get()
	{
		$top_offer_location = $this->Customerapi_model->top_offers_product_search();
		if(isset($top_offer_location) && count($top_offer_location)>0){
			foreach ($top_offer_location as $productslist){
			
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
			$plist[$productslist['item_id']]=$productslist;
			$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
			$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
			$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
			
		}
		foreach ($plist as $list){
			$toppitemlist[]=$list;
		}
		}else{
			$toppitemlist[]=array();
		}
		$treanding_location = $this->Customerapi_model->treanding_product_search();
		if(isset($treanding_location) && count($treanding_location)>0){
					foreach ($treanding_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$terndingpitemlist[]=$list;
				}
		}else{
			$terndingpitemlist[]=array();
		}
		
		$deals_of_the_day_location = $this->Customerapi_model->deals_of_the_day_product_search();
		if(isset($deals_of_the_day_location) && count($deals_of_the_day_location)>0){
			foreach ($deals_of_the_day_location as $productslist){
			
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
			$plist[$productslist['item_id']]=$productslist;
			$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
			$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
			$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
			
		}
		foreach ($plist as $list){
			$dealpitemlist[]=$list;
		}
		}else{
			$dealpitemlist[]=array();
		}
		$season_sales_location = $this->Customerapi_model->season_sales_product_search();
		if(isset($season_sales_location) && count($season_sales_location)>0){
					foreach ($season_sales_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$seasonpitemlist[]=$list;
				}
		}else{
			$seasonpitemlist[]=array();
		}
		
		$offers_for_you_location = $this->Customerapi_model->offers_for_you_product_search();
		if(isset($offers_for_you_location) && count($offers_for_you_location)>0){
					foreach ($offers_for_you_location as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$offerpitemlist[]=$list;
				}
		}else{
			$offerpitemlist[]=array();
		}
		$message = array
				(
					'status'=>1,
					'topffers'=>$toppitemlist,
					'trending'=>$terndingpitemlist,
					'deals'=>$dealpitemlist,
					'season'=>$seasonpitemlist,
					'offers'=>$offerpitemlist,
					'path' =>base_url('uploads/products/')
				);
				$this->response($message, REST_Controller::HTTP_OK);

	}
	/*newhomepage*/
	public function homepage_get(){
		
		$bannerslist= $this->Customerapi_model->get_home_banners_list();
		$categories=$this->Customerapi_model->get_categorywise_list();
		//echo '<pre>';print_r($bannerslist);exit;
		$position_two= $this->Customerapi_model->get_homepage_position_two_banner(2);
		$position_three= $this->Customerapi_model->get_homepage_position_three_banner(3);
		$position_four= $this->Customerapi_model->get_homepage_position_four_banner(4);
		$topoffer=$this->Customerapi_model->get_topoffer_categorywise();
		$dealsffer=$this->Customerapi_model->get_dealsoftheoffer_categorywise();
		$seasonffer=$this->Customerapi_model->get_seasonofthesaleseoffer_categorywise();
		$trendingffer=$this->Customerapi_model->get_trendingoffer_categorywise();
		$offerforyou=$this->Customerapi_model->get_offerforyou_categorywise();
		$recentlyviewedlist=$this->Customerapi_model->recently_viewed_producrs();
		if(isset($recentlyviewedlist) && count($recentlyviewedlist)>0){
		foreach ($recentlyviewedlist as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$recentlyviewed[]=$list;
				}
		}else{
			$recentlyviewed[]=array();
		}
		$message = array
		(
			'status'=>1,
			'banners1'=>$bannerslist,
			'categorylist'=>$categories,
			'topoffer'=>$topoffer,
			'banners2'=>$position_two,
			'trendingproducts'=>$trendingffer,
			'offersforyou'=>$offerforyou,
			'banners3'=>$position_three,
			'dealsoftheday'=>$dealsffer,
			'seasonsales'=>$seasonffer,
			'banners4'=>$position_four,
			'recentlyviewed'=>$recentlyviewed,
			'categoryimagepath'=>base_url('assets/categoryimages/'),
			'banners1path'=>base_url('assets/appbanners/'),
			'bannerspath'=>base_url('assets/homebanners/'),
			'message'=>'Product list are found.'
		);
		$this->response($message, REST_Controller::HTTP_OK);
				
		
	}
	public function homepageloadmore_get(){
		$categorywise_plist=$this->Customerapi_model->get_category_wise_products_list();
		foreach ($categorywise_plist as $list){
			$cat_wise_plist[]=$list;
		}
		$message = array
		(
			'status'=>1,
			'categorywiseproductlist'=>$cat_wise_plist,
			'imagepath'=>base_url('uploads/products/'),
			'message'=>'Product list are found.'
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}
	public function homepageseemore_get(){
		$category_id = $this->input->get('category_id');
		$topoffer = $this->input->get('topoffer');
		$trendingproducts = $this->input->get('trendingproducts');
		$offersforyou = $this->input->get('offersforyou');
		$dealsoftheday = $this->input->get('dealsoftheday');
		$seasonsales = $this->input->get('seasonsales');
		$categorywiseproductlist = $this->input->get('categorywiseproductlist');
		$recentlyviewed = $this->input->get('recentlyviewed');
		
		if($topoffer==1 && $trendingproducts=='' && $offersforyou=='' && $dealsoftheday=='' && $seasonsales=='' && $recentlyviewed=='' && $categorywiseproductlist=='' || $topoffer=='' && $trendingproducts==1 && $offersforyou=='' && $dealsoftheday=='' && $seasonsales=='' && $recentlyviewed=='' && $categorywiseproductlist=='' || $topoffer=='' && $trendingproducts=='' && $offersforyou==1 && $dealsoftheday=='' && $seasonsales==''  && $recentlyviewed=='' && $categorywiseproductlist=='' ||  $topoffer=='' && $trendingproducts=='' && $offersforyou=='' && $dealsoftheday==1 && $seasonsales==''  && $recentlyviewed=='' && $categorywiseproductlist==''  || $topoffer=='' && $trendingproducts=='' && $offersforyou=='' && $dealsoftheday=='' && $seasonsales==1  && $recentlyviewed=='' && $categorywiseproductlist==''  || $topoffer=='' && $trendingproducts=='' && $offersforyou=='' && $dealsoftheday=='' && $seasonsales==''  && $recentlyviewed==1 && $categorywiseproductlist=='' || $topoffer=='' && $trendingproducts=='' && $offersforyou=='' && $dealsoftheday=='' && $seasonsales==''  && $recentlyviewed=='' && $categorywiseproductlist==1){
			
			if($recentlyviewed!=1){
				if($category_id==''){
				$message = array('status'=>0,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
			if($topoffer==1){
				$seemore='Top Offers';
				$seemorelist=$this->Customerapi_model->get_category_wise_topseemore($category_id);
			}else if($trendingproducts==1){
				$seemore='Trending products';
				$seemorelist=$this->Customerapi_model->get_category_wise_trendingseemore($category_id);
			}else if($offersforyou==1){
				$seemore='Offers for You';
				$seemorelist=$this->Customerapi_model->get_category_wise_offersseemore($category_id);
			}else if($dealsoftheday==1){
				$seemore='Deals Of the Day';
				$seemorelist=$this->Customerapi_model->get_category_wise_dealsseemore($category_id);
			}else if($seasonsales==1){
				$seemore='Season Sales';
				$seemorelist=$this->Customerapi_model->get_category_wise_seasonseemore($category_id);
			}else if($categorywiseproductlist==1){
				$categoryname=$this->Customerapi_model->get_category_deatils($category_id);
				
				$seemore=$categoryname['category_name'];
				$seemorelist=$this->Customerapi_model->get_category_wise_seemore($category_id);
			}else if($recentlyviewed==1){
				$seemore='Recently viewed';
				$seemorelist=$this->Customerapi_model->recently_viewed_producrs();
			}
			//echo '<pre>';print_r($seemorelist);exit;
			if(isset($seemorelist) && count($seemorelist)>0){
				foreach ($seemorelist as $productslist){
							
							$currentdate=date('Y-m-d h:i:s A');
								if($productslist['offer_expairdate']>=$currentdate){
								$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
								$percentage= $productslist['offer_percentage'];
								$orginal_price=$productslist['item_cost'];
								}else{
									//echo "expired";
									$item_price= $productslist['special_price'];
									$prices= ($productslist['item_cost']-$productslist['special_price']);
									$percentage= (($prices) /$productslist['item_cost'])*100;
									$orginal_price=$productslist['item_cost'];
								}
							$plist[$productslist['item_id']]=$productslist;
							$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
							$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
							$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
							
						}
						foreach ($plist as $list){
							$categorywiseseemore_list[]=$list;
						}
				}else{
					$categorywiseseemore_list[]=array();
				}
				$message = array
								(
								'status'=>1,
								'seemore'=>$categorywiseseemore_list,
								'lable'=>$seemore,
								'imagepath'=>base_url('uploads/products/'),
								'message'=>'Product list are found.'
								);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'For more status please enter "one" and left all fields  empty');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
		
		
	}
	
	
	public  function subcategorypage_get(){
		
		$catid = $this->input->get('category_id');
		$customer_id = $this->input->get('customer_id');
		if($catid==''){
				$message = array('status'=>0,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		//echo '<pre>';print_r($categories);exit;
		$position_one= $this->Customerapi_model->step_one_data(1);
		$position_two= $this->Customerapi_model->step_two_data($catid);
		$position_three= $this->Customerapi_model->step_three_data($catid);
		$position_four= $this->Customerapi_model->step_four_data(2);
		$position_five= $this->Customerapi_model->step_five_data($catid);
		$amt= ($position_five['max'])/4;
		$step_five=array($amt,$amt*2,$amt*3,$amt*4);
		if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
		$step_six= $this->Customerapi_model->step_six_data($catid);
		$step_sixlabel='Offer';
		}else if($catid==19 || $catid==24){
			$step_sixlabel='Type';
			$step_six= $this->Customerapi_model->step_six_data($catid);
		}if($catid==21 || $catid==31){
			$step_sixlabel='Offer';
		}if($catid==28 ){
			$step_sixlabel='Offer';
		}if($catid==35 ){
			$step_sixlabel='Type';
		}if($catid==20 ){
			$step_sixlabel='Screen Size';
		}
			if(isset($step_six) && count($step_six)>0){
				foreach ($step_six as $productslist){
							
							$currentdate=date('Y-m-d h:i:s A');
								if($productslist['offer_expairdate']>=$currentdate){
								$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
								$percentage= $productslist['offer_percentage'];
								$orginal_price=$productslist['item_cost'];
								}else{
									//echo "expired";
									$item_price= $productslist['special_price'];
									$prices= ($productslist['item_cost']-$productslist['special_price']);
									$percentage= (($prices) /$productslist['item_cost'])*100;
									$orginal_price=$productslist['item_cost'];
								}
							$plist[$productslist['item_id']]=$productslist;
							$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
							$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
							$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
							
						}
						foreach ($plist as $list){
							$step_sixlist[]=$list;
						}
				}else{
					$step_sixlist[]=array();
				}
		$step_seven= $this->Customerapi_model->step_seven_data(3);
		$step_eight= $this->Customerapi_model->step_eight_data($catid);
		if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
			if($catid==21){
				$step_nine= $this->Customerapi_model->step_dealsnine_data($catid);
				$step_ninelabel='Deals of the day';
			}else {
				$step_nine= $this->Customerapi_model->step_nine_data($catid);
			}
			if($catid==19 || $catid==24){
				$step_ninelabel='Occasion';
			}else if($catid==20){
				$step_ninelabel='Battery Capacity';
			}else if($catid!=21){
				$step_ninelabel='Y';
			}
		}
			if(isset($step_nine) && count($step_nine)>0){
			foreach ($step_nine as $productslist){
						
						$currentdate=date('Y-m-d h:i:s A');
							if($productslist['offer_expairdate']>=$currentdate){
							$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
							$percentage= $productslist['offer_percentage'];
							$orginal_price=$productslist['item_cost'];
							}else{
								//echo "expired";
								$item_price= $productslist['special_price'];
								$prices= ($productslist['item_cost']-$productslist['special_price']);
								$percentage= (($prices) /$productslist['item_cost'])*100;
								$orginal_price=$productslist['item_cost'];
							}
						$plist[$productslist['item_id']]=$productslist;
						$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
						$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
						$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
						
					}
					foreach ($plist as $list){
						$step_ninelist[]=$list;
					}
			}else{
				$step_ninelist[]=array();
			}
			
			if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
				if($catid==21){
					$step_ten= $this->Customerapi_model->step_seasonten_data($catid);
						$step_tenlabel='Season of the day';
				}else if($catid==19 || $catid==24){
					$step_ten= $this->Customerapi_model->step_tenfootwear_data($catid);
				}else{
					$step_ten= $this->Customerapi_model->step_ten_data($catid);
				}
				if($catid==19 || $catid==24){
					$step_tenlabel='Footware';
				}else if($catid!=21 && $catid==20){
					$step_tenlabel='camera';
				}else if($catid==30){
					$step_tenlabel='age';
				}else if($catid!=21){
					$step_tenlabel='Z';
				}
			}
			if(isset($step_ten) && count($step_ten)>0){
			foreach ($step_ten as $productslist){
						
						$currentdate=date('Y-m-d h:i:s A');
							if($productslist['offer_expairdate']>=$currentdate){
							$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
							$percentage= $productslist['offer_percentage'];
							$orginal_price=$productslist['item_cost'];
							}else{
								//echo "expired";
								$item_price= $productslist['special_price'];
								$prices= ($productslist['item_cost']-$productslist['special_price']);
								$percentage= (($prices) /$productslist['item_cost'])*100;
								$orginal_price=$productslist['item_cost'];
							}
						$plist[$productslist['item_id']]=$productslist;
						$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
						$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
						$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
						
					}
					foreach ($plist as $list){
						$step_tenlist[]=$list;
					}
			}else{
				$step_tenlist[]=array();
			}
		$step_eleven= $this->Customerapi_model->step_eleven_data(4);
		$step_twelve= $this->Customerapi_model->step_twelve_data($catid, $customer_id);
		if(isset($step_twelve) && count($step_twelve)>0){
				foreach ($step_twelve as $productslist){
							
							$currentdate=date('Y-m-d h:i:s A');
								if($productslist['offer_expairdate']>=$currentdate){
								$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
								$percentage= $productslist['offer_percentage'];
								$orginal_price=$productslist['item_cost'];
								}else{
									//echo "expired";
									$item_price= $productslist['special_price'];
									$prices= ($productslist['item_cost']-$productslist['special_price']);
									$percentage= (($prices) /$productslist['item_cost'])*100;
									$orginal_price=$productslist['item_cost'];
								}
							$plist[$productslist['item_id']]=$productslist;
							$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
							$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
							$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
							
						}
						foreach ($plist as $list){
							$step_twelvelist[]=$list;
						}
				}else{
					$step_twelvelist[]=array();
				}
				
			$step_thirteen= $this->Customerapi_model->step_thirteen_data($catid);
			if(isset($step_thirteen) && count($step_thirteen)>0){
				foreach ($step_thirteen as $productslist){
							
							$currentdate=date('Y-m-d h:i:s A');
								if($productslist['offer_expairdate']>=$currentdate){
								$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
								$percentage= $productslist['offer_percentage'];
								$orginal_price=$productslist['item_cost'];
								}else{
									//echo "expired";
									$item_price= $productslist['special_price'];
									$prices= ($productslist['item_cost']-$productslist['special_price']);
									$percentage= (($prices) /$productslist['item_cost'])*100;
									$orginal_price=$productslist['item_cost'];
								}
							$plist[$productslist['item_id']]=$productslist;
							$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
							$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
							$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
							
						}
						foreach ($plist as $list){
							$step_thirteenlist[]=$list;
						}
				}else{
					$step_thirteenlist[]=array();
				}
			$step_fourteen= $this->Customerapi_model->step_fourteen_data(5);
			//echo '<pre>';print_r($step_fourteen);exit;
			$message = array
			(
			'status'=>1,
			'banners1'=>$position_one,
			'subcategory'=>$position_two,
			'topbrands'=>$position_three,
			'banners2'=>$position_four,
			'shopbyprice'=>$step_five,
			'shopbyx'=>$step_sixlist,
			'shopbyxlabel'=>$step_sixlabel,
			'banners3'=>$step_seven,
			'subitems'=>$step_eight,
			'shopbyy'=>$step_ninelist,
			'shopbyylabel'=>$step_ninelabel,
			'shopbyz'=>$step_tenlist,
			'shopbyzlable'=>$step_tenlabel,
			'banners4'=>$step_eleven,
			'mostviewed'=>$step_twelve,
			'recommended'=>$step_thirteenlist,
			'banners5'=>$step_fourteen,
			'subcategoryimage'=>base_url('assets/subcategoryimages/'),
			'imagepath'=>base_url('uploads/products/'),
			'bannerspath'=>base_url('assets/categoryimages/'),
			'message'=>'Product list are found.'
			);
		$this->response($message, REST_Controller::HTTP_OK);
		//echo '<pre>';print_r($step_fourteen);exit;
		
	}
	
	/*newhomepage*/

	/*IOS APP HOME PAGE API*/
	public function ioshomepage_get(){
		
		$bannerslist= $this->Customerapi_model->get_home_banners_list();
		$categories=$this->Customerapi_model->get_categorywise_list();
		//echo '<pre>';print_r($bannerslist);exit;
		$position_two= $this->Customerapi_model->get_homepage_position_two_banner(2);
		$position_three= $this->Customerapi_model->get_homepage_position_three_banner(3);
		$position_four= $this->Customerapi_model->get_homepage_position_four_banner(4);
		$topoffer=$this->Customerapi_model->get_topoffer_categorywise();
		$dealsffer=$this->Customerapi_model->get_dealsoftheoffer_categorywise();
		$seasonffer=$this->Customerapi_model->get_seasonofthesaleseoffer_categorywise();
		$trendingffer=$this->Customerapi_model->get_trendingoffer_categorywise();
		$offerforyou=$this->Customerapi_model->get_offerforyou_categorywise();
		$recentlyviewedlist=$this->Customerapi_model->recently_viewed_producrs();
		$categorywise_plist=$this->Customerapi_model->get_category_wise_products_list();
		if(isset($recentlyviewedlist) && count($recentlyviewedlist)>0){
		foreach ($recentlyviewedlist as $productslist){
					
					$currentdate=date('Y-m-d h:i:s A');
						if($productslist['offer_expairdate']>=$currentdate){
						$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
						$percentage= $productslist['offer_percentage'];
						$orginal_price=$productslist['item_cost'];
						}else{
							//echo "expired";
							$item_price= $productslist['special_price'];
							$prices= ($productslist['item_cost']-$productslist['special_price']);
							$percentage= (($prices) /$productslist['item_cost'])*100;
							$orginal_price=$productslist['item_cost'];
						}
					$plist[$productslist['item_id']]=$productslist;
					$plist[$productslist['item_id']]['withcrossmarkprice']=$orginal_price;
					$plist[$productslist['item_id']]['withoutcrossmarkprice']=$item_price;
					$plist[$productslist['item_id']]['percentage']=number_format($percentage, 2);
					
				}
				foreach ($plist as $list){
					$recentlyviewed[]=$list;
				}
		}else{
			$recentlyviewed[]=array();
		}
		foreach ($categorywise_plist as $list){
			$cat_wise_plist[]=$list;
		}
		$message = array
		(
			'status'=>1,
			'banners1'=>$bannerslist,
			'categorylist'=>$categories,
			'topoffer'=>$topoffer,
			'banners2'=>$position_two,
			'trendingproducts'=>$trendingffer,
			'offersforyou'=>$offerforyou,
			'banners3'=>$position_three,
			'dealsoftheday'=>$dealsffer,
			'seasonsales'=>$seasonffer,
			'banners4'=>$position_four,
			'recentlyviewed'=>$recentlyviewed,
			'categorywiseproductlist'=>$cat_wise_plist,
			'categoryimage'=>base_url('assets/categoryimages/'),
			'imagepath'=>base_url('uploads/products/'),
			'banners1path'=>base_url('assets/appbanners/'),
			'bannerspath'=>base_url('assets/homebanners/'),
			'message'=>'Product list are found.'
		);
		$this->response($message, REST_Controller::HTTP_OK);
				
		
	}
	public function homepagefunctionality_hideshow_get(){
			$bannerslist= $this->Customerapi_model->get_home_banners_list();
			$categories=$this->Customerapi_model->get_categorywise_list();
			$position_two= $this->Customerapi_model->get_homepage_position_two_banner(2);
			$position_three= $this->Customerapi_model->get_homepage_position_three_banner(3);
			$position_four= $this->Customerapi_model->get_homepage_position_four_banner(4);
			$topoffer=$this->Customerapi_model->get_topoffer_categorywise();
			$dealsffer=$this->Customerapi_model->get_dealsoftheoffer_categorywise();
			$seasonffer=$this->Customerapi_model->get_seasonofthesaleseoffer_categorywise();
			$trendingffer=$this->Customerapi_model->get_trendingoffer_categorywise();
			$offerforyou=$this->Customerapi_model->get_offerforyou_categorywise();
			$recentlyviewedlist=$this->Customerapi_model->recently_viewed_producrs();
			$categorywise_plist=$this->Customerapi_model->get_ioscategory_wise_products_list();
			if(count($bannerslist)>0){
				$banner1=1;
			}else{
				$banner1=0;
			}
			if(count($categories)>0){
				$categorie=1;
			}else{
				$categorie=0;
			}
			if(count($position_two)>0){
				$banner2=1;
			}else{
				$banner2=0;
			}
			if(count($position_three)>0){
				$banner3=1;
			}else{
				$banner3=0;
			}if(count($position_four)>0){
				$banner4=1;
			}else{
				$banner4=0;
			}if(count($topoffer)>0){
				$top=1;
			}else{
				$top=0;
			}if(count($dealsffer)>0){
				$deal=1;
			}else{
				$deal=0;
			}if(count($seasonffer)>0){
				$seasons=1;
			}else{
				$seasons=0;
			}if(count($trendingffer)>0){
				$treand=1;
			}else{
				$treand=0;
			}if(count($offerforyou)>0){
				$offer=1;
			}else{
				$offer=0;
			}if(count($recentlyviewedlist)>0){
				$recently=1;
			}else{
				$recently=0;
			}
			foreach ($categorywise_plist as $lists){
				$lis[]=$lists['category_name'];
			}
			if($lis[0]='Home & Kitchen'){
			$HomeKitchen=1;
			}else{
				$HomeKitchen=0;
			}if($lis[1]="Men's Fashion"){
			$MensFashion=1;
			}else{
				$MensFashion=0;
			}if($lis[2]="Mobiles & Tablets"){
			$MobilesTablets=1;
			}else{
				$MobilesTablets=0;
			}if($lis[3]="Grocery"){
			$Grocery=1;
			}else{
				$Grocery=0;
			}if($lis[4]="Computers, Laptops & Accessories"){
			$ComputersLaptopsAccessories=1;
			}else{
				$ComputersLaptopsAccessories=0;
			}if($lis[5]="TVs, ACs & Appliances"){
			$TVsACsAppliances=1;
			}else{
				$TVsACsAppliances=0;
			}if($lis[6]="Women's Fashion"){
			$WomensFashion=1;
			}else{
				$WomensFashion=0;
			}if($lis[7]="Car & Bike Accessories"){
			$CarBikeAccessories=1;
			}else{
				$CarBikeAccessories=0;
			}if($lis[8]="Books & Stationary"){
			$BooksStationary=1;
			}else{
				$BooksStationary=0;
			}if($lis[9]="Kids Store"){
			$KidsStore=1;
			}else{
				$KidsStore=0;
			}if($lis[10]="Sports & Fitness"){
			$SportsFitness=1;
			}else{
			$SportsFitness=0;
			}if($lis[11]="Furniture & Home-Living"){
			$FurnitureHomeLiving=1;
			}else{
			$FurnitureHomeLiving=0;
			}if($lis[12]="Gifts Store"){
			$GiftsStore=1;
			}else{
			$GiftsStore=0;
			}if($lis[13]="Bags & Outdoor"){
			$BagsOutdoor=1;
			}else{
			$BagsOutdoor=0;
			}
			//echo '<pre>';print_r($lis);exit;
		$message = array('status'=>1, 'banner1'=>$banner1,'categories'=>$categorie,'Topoffer'=>$top,'banner2'=>$banner2,'treand'=>$treand,'offer'=>$offer,'banner3'=>$banner3,
		'season'=>$seasons,'deals'=>$deal,'recentlyviewed'=>$recently,'banner4'=>$banner4,
		'HomeKitchen'=>$HomeKitchen,'MensFashion'=>$MensFashion,'MobilesTablets'=>$MobilesTablets,'Grocery'=>$Grocery,'ComputersLaptopsAccessories'=>$ComputersLaptopsAccessories,
		'TVsACsAppliances'=>$TVsACsAppliances,'WomensFashion'=>$WomensFashion,'CarBikeAccessories'=>$CarBikeAccessories,'KidsStore'=>$KidsStore,
		'SportsFitness'=>$SportsFitness,'FurnitureHomeLiving'=>$FurnitureHomeLiving,'GiftsStore'=>$GiftsStore,'BagsOutdoor'=>$BagsOutdoor,
		'BooksStationary'=>$BooksStationary,
		'message'=>'Home view');
		$this->response($message, REST_Controller::HTTP_OK);
	}
	public  function subcategoryfunctionality_hideshow_get(){
		$catid = $this->input->get('category_id');
		$customer_id = $this->input->get('customer_id');
		if($catid==''){
				$message = array('status'=>0,'message'=>'Category id is required!');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$position_one= $this->Customerapi_model->step_one_data(1);
		$position_two= $this->Customerapi_model->step_two_data($catid);
		$position_three= $this->Customerapi_model->step_three_data($catid);
		$position_four= $this->Customerapi_model->step_four_data(2);
		$position_five= $this->Customerapi_model->step_five_data($catid);
		if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
		$step_six= $this->Customerapi_model->step_six_data($catid);
		}else if($catid==19 || $catid==24){
			$step_six= $this->Customerapi_model->step_six_data($catid);
		}
		$step_seven= $this->Customerapi_model->step_seven_data(3);
		$step_eight= $this->Customerapi_model->step_eight_data($catid);
		if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
			if($catid==21){
				$step_nine= $this->Customerapi_model->step_dealsnine_data($catid);
				$step_ninelabel='Deals of the day';
			}else {
				$step_nine= $this->Customerapi_model->step_nine_data($catid);
			}
		}
		if($catid==21 || $catid==31 || $catid==19 || $catid==24 || $catid==35 ||  $catid==28 ||  $catid==20){
				if($catid==21){
					$step_ten= $this->Customerapi_model->step_seasonten_data($catid);
				}else if($catid==19 || $catid==24){
					$step_ten= $this->Customerapi_model->step_tenfootwear_data($catid);
				}else{
					$step_ten= $this->Customerapi_model->step_ten_data($catid);
				}
				
			}
		$step_eleven= $this->Customerapi_model->step_eleven_data(4);
		$step_twelve= $this->Customerapi_model->step_twelve_data($catid, $customer_id);
		$step_thirteen= $this->Customerapi_model->step_thirteen_data($catid);
		$step_fourteen= $this->Customerapi_model->step_fourteen_data(5);


		if(count($position_one)>0){
				$banner1=1;
			}else{
				$banner1=0;
		}if(count($position_two)>0){
				$subcategory=1;
			}else{
				$subcategory=0;
		}if(count($position_three)>0){
				$topbrands=1;
			}else{
				$topbrands=0;
		}if(count($position_four)>0){
				$banner2=1;
			}else{
				$banner2=0;
		}if(count($position_five)>0){
				$shopbyprice=1;
			}else{
				$shopbyprice=0;
		}if(count($step_six)>0){
				$shopbyx=1;
			}else{
				$shopbyx=0;
			}
		if(count($step_seven)>0){
				$banner3=1;
			}else{
				$banner3=0;
		}if(count($step_eight)>0){
				$subitems=1;
			}else{
				$subitems=0;
		}if(count($step_nine)>0){
				$shopbyy=1;
			}else{
				$shopbyy=0;
		}if(count($step_ten)>0){
				$shopbyz=1;
			}else{
				$shopbyz=0;
		}if(count($step_eleven)>0){
				$banner4=1;
			}else{
				$banner4=0;
		}if(count($step_twelve)>0){
				$Mostviewed=1;
			}else{
				$Mostviewed=0;
		}if(count($step_thirteen)>0){
				$Recommended=1;
			}else{
				$Recommended=0;
		}if(count($step_fourteen)>0){
				$banner5=1;
			}else{
				$banner5=0;
		}
		$message = array('status'=>1, 'banner1'=>$banner1,'subcategory'=>$subcategory,'topbrands'=>$topbrands,'banner2'=>$banner2,'shopbyprice'=>$shopbyprice,'shopbyx'=>$shopbyx,'banner3'=>$banner3,'subitems'=>$subitems,'shopbyy'=>$shopbyy,'shopbyz'=>$shopbyz,'banner4'=>$banner4,'Mostviewed'=>$Mostviewed,'Recommended'=>$Recommended,'banner5'=>$banner5,
		'message'=>'Subcategory View');
		$this->response($message, REST_Controller::HTTP_OK);
		//echo '<pre>';print_r($position_two);exit;
	}
	/*IOS APP HOME PAGE API*/

}
