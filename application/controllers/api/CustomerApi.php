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
		$get=$this->input->get();
		//echo "<pre>";print_r($get);exit;
		$mobile = preg_match('/^[0-9]{10}+$/',$get['mobile_email']);

		if($mobile==1){
			$mobile_store = $get['mobile_email'];
			//echo "<pre>";print_r($mobile_store);exit;
		}else{
			$mobile_store =NULL;
		}
		//echo "<pre>";print_r($mobile_store);exit;
		$email =filter_var($get['mobile_email'], FILTER_VALIDATE_EMAIL);
		 if($email==$get['mobile_email']){
		 	$email_store = $get['mobile_email'];
		 }else{
		 	$email_store = NULL;
		 }
		//echo "<pre>";print_r($email);exit;
		$mobilecheck = $this->Customerapi_model->mobile_check($get['mobile_email']);
		//echo $this->db->last_query();exit;
		$emailcheck = $this->Customerapi_model->email_check($get['mobile_email']);
		if(count($mobilecheck)>0)
		{
			$message = array('status'=>0,'message'=>'Mobile number already exits. Please use another Mobile number.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(count($emailcheck)>0){
				
				$message = array('status'=>0,'message'=>'Email Id already exits. Please use another Email Id.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
					//send otp
				if($email){

					$this->load->library('email');
					$six_digit_random_number = mt_rand(100000, 999999);
		 			
			 		//send mail
			 		$this->email->from('admin@cartinhour.com', 'CartInHour');		
			 		$this->email->to($get['mobile_email']);
			 		$this->email->subject('CartInHour - Registraion');
			 		$message_otp = "Dear User,\nYou are Registered Successfully. \n Your OTP is : " .$six_digit_random_number. "\n\n Thanks,\nCart In Hour Team";
			 		$this->email->message($message_otp);
			 		$this->email->send();
				}else{
					$six_digit_random_number = mt_rand(100000, 999999);
					$user_id="cartin"; 
					$pwd="9494422779";    
					$sender_id = "CARTIN";          
					$mobile_num = $mobile_store;  
					$message = "Your OTP is : " .$six_digit_random_number;               
					// Sending with PHP CURL
					$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
					$ret = file($url);
				}
				$details=array(
				'cust_email'=>$email_store,
				'cust_mobile'=>$mobile_store,
				'otp_verification'=>$six_digit_random_number,
				'role_id'=>1,
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$customerdetails = $this->Customerapi_model->save_customer($details);
				if(count($customerdetails)>0){

					$message = array('status'=>1,'customer_id'=>$customerdetails,'message'=>'Register Successfully');
					$this->response($message, REST_Controller::HTTP_OK);
				}
				
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


	/*  Login Apis */
	public function login_post()
	{	 
	$get=$this->input->get();
		//$pass=md5($get['password']);
		$logindetails = $this->Customerapi_model->login_details($get['email']);
		//echo '<pre>';print_r($logindetails);exit;
		if(count($logindetails)>0)
		{	
		$message = array('status'=>1,'customer_id'=>$logindetails['customer_id'],'message'=>'Successfully Login');
				$this->response($message, REST_Controller::HTTP_OK);		
		}else{
			$message = array('status'=>0,'message'=>'Invalid Email Address or Password');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
 	}

 	/*  changepassword Apis */
	public function changepassword_post()
	{
		$get=$this->input->get();
		//echo "<pre>";print_r($get);exit;
		$oldpassword=md5($get['oldpassword']);
		$newpassword=md5($get['newpassword']);
		$conformpassword=md5($get['confirmpassword']);
		$cust_id = $this->Customerapi_model	->oldpassword($get['customer_id']);		
		$currentpasswords=$cust_id['cust_password'];
		if($oldpassword == $currentpasswords )
		{
			if($newpassword == $conformpassword)
			{
				$changepassword = $this->Customerapi_model->set_customer_password($get['customer_id'],$conformpassword);
				if (count($changepassword)>0)
				{
					$message = array
					(
						'status'=>1,
						'message'=>'Password successfully changed!'
					);
					$this->response($message, REST_Controller::HTTP_OK);
				}
				else
				{
					$message = array('status'=>0,'message'=>'Something went wrong in change password process!');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
				}else
				{
					$message = array('status'=>0,'message'=>'New password and confirm password was not matching');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
		}else
		{
			$message = [
			
				'status'=>0,
				'message'=>'Your Old password is incorrect. Please try again'
			];
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	/*  forgotpassword Apis */
	public function forgotpassword_post()
	{
		//$this->load->library('form_validation');
		//$this->form_validation->set_rules('forgot_pass', 'forgot password', 'required');
		//if($this->form_validation->run() == FALSE)
		//{
			//$message = array('status'=>0,'message'=>validation_errors());
			//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		//}else 
		//{
			$get=$this->input->get();
			//echo "<pre>";print_r($get);exit;
			$mobile = preg_match('/^[0-9]{10}+$/',$get['forgot_pass']);
			//echo "<pre>";print_r($mobile);exit;
			$email =filter_var($get['forgot_pass'], FILTER_VALIDATE_EMAIL);
			if($mobile==1){
				$mobilecheck = $this->Customerapi_model->mobile_check($get['forgot_pass']);
				if($mobilecheck['cust_mobile'] == $get['forgot_pass'])
				{
				$six_digit_random_number = mt_rand(100000, 999999);
						$user_id="cartin"; 
						$pwd="9494422779";    
						$sender_id = "CARTIN";          
						$mobile_num = $get['forgot_pass'];  
						$message = "Your OTP is : " .$six_digit_random_number;               
						// Sending with PHP CURL
						$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
						$ret = file($url);
						$data = array(
						'otp_verification' => $six_digit_random_number,
						);
						$forgot_otp=$this->Customerapi_model->forgot_otp($get['customer_id'],$data);
						if(count($forgot_otp)>0){
							$message = array('status'=>1,'message'=>'Otp Send Your Mobile Number.');
							$this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}else{
							$message = array('status'=>0,'message'=>'Otp Not Send Your Mobile Number.');
							$this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}
				
				}else{
					$message = array('status'=>0,'message'=>'No user found with this Mobile Number.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}else{
				$emailcheck = $this->Customerapi_model->email_check($email);
				//echo $this->db->last_query();exit;
				if($emailcheck['cust_email'] == $get['forgot_pass'])
				{
				$six_digit_random_number = mt_rand(100000, 999999);
				 		//send mail
				 			$this->load->library('email');
							$this->email->from('admin@cartinhour.com', 'CartInHour');
							$this->email->to($get['forgot_pass']);
							$this->email->subject('CartInHour - Forgot Password');
							$otp = "Dear User, \n Your OTP is : " .$six_digit_random_number. "\n\n Thanks,\nCart In Hour Team";
							$this->email->message($otp);
							$this->email->send();
							$data = array(
						'otp_verification' => $six_digit_random_number,
						);
						$forgot_otp=$this->Customerapi_model->forgot_otp($get['customer_id'],$data);
						if(count($forgot_otp)>0){
							$message = array('status'=>1,'message'=>'Otp Send Your EMail Address');
								$this->response($message, REST_Controller::HTTP_OK);
						}else{
							$message = array('status'=>0,'message'=>'Otp Not Send Your Emaill Address.');
							$this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}
				 		
				
				}else{
					$message = array('status'=>0,'message'=>'No user found with this Email.');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
		//}			
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
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			//$single_product['path']='http://cartinhour.com/uploads/productsimages/';
			//$this->response($single_product, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Products not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}

	}

	/* Item revirw*/ 
	public function itemreview_post()
	{
	 
		$get=$this->input->get();
		//echo '<pre>';print_r($get);exit;
		$review=array(
		'customer_id'=>$get['customer_id'],	
		'item_id'=>$get['item_id'],
		'name'=>$get['name'],
		'email'=>$get['email'],
		'review_content'=>$get['review'],
		);
		//echo '<pre>';print_r($review);exit;
		$review_store= $this->Customerapi_model->store_review($review);
		//echo $this->db->last_query();exit;
		if(count($review_store)>0){
			$message = array
			(
				'status'=>1,
				'Review'=>'Review Successfully Thank You!',
			);
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array
			(
				'status'=>0,
				'Review'=>'Review Failed!',
			);
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


	/* add wishlists */ 
	public function addwishlist_post()
	{
		$get = $this->input->get();
		$item_ids=explode(",",$get['item_id']);
		// echo "<pre>";print_r($item_ids);exit;
		// $ids[] = $get['item_id'];
		// echo "<pre>";print_r($ids);exit;
		// for($i=0;$i<sizeof($ids);$i++)
  //  		{
  //    		$dataSet[$i] = array ('item_id' => $ids[$i]);
  //  		}
		// echo "<pre>";print_r($dataSet);exit;
		foreach($item_ids as $item_id){
		$data=array(
		'cust_id'=>$get['customer_id'],
		'item_id'=>$item_id,
		'create_at'=>date('Y-m-d H:i:s'),
		'yes'=>1,
		);
		$wish=$this->Customerapi_model->wishlist_save($data);
		//echo $this->db->last_query();exit;
		}
		
		
		if(count($wish)>0){
			$message = array(
				'status'=>1,
				'message'=>'Successfully Added wishlists');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array(
			'status'=>0,
			'message'=>'Failed To Added wishlists'
			);
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}



	}

	/* wishlist get api */
	public function wishlists_get()
	{
		$get = $this->input->get();
		$wishlist = $this->Customerapi_model->get_customer_whishlists($get['customer_id']);
		//echo $this->db->last_query();exit;
		if(count($wishlist)>0){
				$message = array
				(
					'status'=>1,
					'wishlists'=>$wishlist,
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'Your wishlist Is Empty.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	/* delete wishlist  api */
	public function deletewishlist_post()
	{
		$get = $this->input->get();
		//print_r($get);exit;
		$wishlist_delete= $this->Customerapi_model->customer_wishlist_delete($get['customer_id'],$get['item_id']);
		//echo $this->db->last_query();exit;
		if(count($wishlist_delete)>0){
				$message = array
				(
					'status'=>1,
					'message'=>'Wishlist Item Successfully deleted..',
				);
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'message'=>'Wishlist Item Failed To deleted!');
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
		$get = $this->input->get();
		$subcategories = $this->Customerapi_model->get_subcategories($get['category_id']);
		if(count($subcategories)>0){
				$message = array
				(
					'status'=>1,
					'Subcategories'=>$subcategories,
					'path' =>'http://cartinhour.com/assets/subcategoryimages/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			//$withoutsubs = $this->Customerapi_model->get_withoutsubcategories($get['category_id'],$get['subcategory_id']);
			//$message = array
				//(
				//	'status'=>1,
				//	'Product_item'=>$withoutsubs,
				//);
				//$this->response($message, REST_Controller::HTTP_OK);
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
		$get = $this->input->get();
		$catwisepro = $this->Customerapi_model->get_category_products($get['category_id']);
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
					'location_top_offers'=>$top_offer_location,
					'path'=>'http://cartinhour.com/uploads/products/'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array('status'=>0,'message'=>'No Products In This Locations.');
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
					'location_deals ofthe day'=>$deals_of_the_day_location,
					'path'=>'http://cartinhour.com/uploads/products/'
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
					'location_season sales'=>$season_sales_location,
					'path'=>'http://cartinhour.com/uploads/products/'
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
					'location_treading'=>$treanding_location,
					'path'=>'http://cartinhour.com/uploads/products/'
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
					'location_offer for you'=>$offers_for_you_location,
					'path'=>'http://cartinhour.com/uploads/products/'
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

	/* Add to cart */
	public function addtocart_post()
	{
		$get = $this->input->get();
		$products= $this->Customerapi_model->get_product_details($get['item_id']);
		//$cart_ids=explode(",",$get['item_id']);
		//echo "<pre>";print_r($cart_ids);exit;
		//if($products['offer_percentage']!='' && $products['offer_type']!=4){
			if(date('m/d/Y') <= $products['offer_expairdate']){
				$item_price= ($products['item_cost']-$products['offer_amount']);
				$price	=(($get['quentity']) * ($item_price));
				//echo "<pre>";print_r($price);exit;
			}else{
				$item_price= $products['item_cost'];
				$price	=(($get['quentity']) * ($item_price));
				//echo "<pre>";print_r($price);exit;
			}
		//}else{
			//$price= (($get['qty']) * ($products['item_cost']));
			//$item_price=$products['item_cost'];
			
		//}
		$commission_price=(($price)*($products['commission'])/100);
		if($products['category_id']==18){
			if($price <=500){
				$delivery_charges=35;
			}else{
				$delivery_charges=0;
			}
		}else{
			
			if($price <=500){
				$delivery_charges=75;
			}else if(($price >= 500) && ($price <=1000)){
				$delivery_charges=35;
			}else if($price >=1000){
				$delivery_charges=0;
			}
		}

		$addcart=array(
		'cust_id'=>$get['customer_id'],
		'item_id'=>$get['item_id'],
		'qty'=>$get['quentity'],
		'item_price'=>$item_price,
		'total_price'=>$price,
		'commission_price'=>$commission_price,
		'delivery_amount'=>$delivery_charges,
		'seller_id'=>$products['seller_id'],
		'category_id'=>$products['category_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo "<pre>";print_r($addcart);exit;
		$cart_item_ids= $this->Customerapi_model->get_cart_products($get['customer_id']);
		foreach($cart_item_ids as $cartids) 
		{ 		
			$cart_id[]=$cartids['item_id'];
		}
		//echo "<pre>";print_r($cart_id);exit;
		if(in_array($get['item_id'],$cart_id))
		{
			if($get['item_id'] && $get['item_id']=!'' )
			{
				$message = array
				(
					'status'=>0,
					'Cart'=>'Product already Exits',
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
			}
		}else
		{
			$cart_save= $this->Customerapi_model->cart_products_save($addcart);
			if(count($cart_save)>0)
			{
				$message = array
				(
					'status'=>1,
					'Cart'=>'Successfully added to the cart',
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}	
		}
	}


	public function updatecart_post()
	{
		$get = $this->input->get();
		$products= $this->Customerapi_model->get_product_details($get['item_id']);
		//$cart_ids=explode(",",$get['item_id']);
		//echo "<pre>";print_r($cart_ids);exit;
		//if($products['offer_percentage']!='' && $products['offer_type']!=4){
			if(date('m/d/Y') <= $products['offer_expairdate']){
				$item_price= ($products['item_cost']-$products['offer_amount']);
				$price	=(($get['quentity']) * ($item_price));
				//echo "<pre>";print_r($price);exit;
			}else{
				$item_price= $products['item_cost'];
				$price	=(($get['quentity']) * ($item_price));
				//echo "<pre>";print_r($price);exit;
			}
		//}else{
			//$price= (($get['qty']) * ($products['item_cost']));
			//$item_price=$products['item_cost'];
			
		//}
		$commission_price=(($price)*($products['commission'])/100);
		if($products['category_id']==18){
			if($price <=500){
				$delivery_charges=35;
			}else{
				$delivery_charges=0;
			}
		}else{
			
			if($price <=500){
				$delivery_charges=75;
			}else if(($price >= 500) && ($price <=1000)){
				$delivery_charges=35;
			}else if($price >=1000){
				$delivery_charges=0;
			}
		}

		$updatedata=array(
		'qty'=>$get['quentity'],
		'item_price'=>$item_price,
		'commission_price'=>$commission_price,
		'total_price'=>$price,
		'delivery_amount'=>$delivery_charges,
		);
		//echo "<pre>";print_r($updatedata);exit;
		$cart_update= $this->Customerapi_model->update_cart_item_quentity($get['customer_id'],$get['item_id'],$updatedata);
		//echo $this->db->last_query();
		if(count($cart_update)>0){
			$message = array
				(
					'status'=>1,
					'Cart'=>'Cart Updated Successfully',
				);
				$this->response($message, REST_Controller::HTTP_OK);
			
		}else{
			$message = array
				(
					'status'=>0,
					'Cart'=>'Failed To Update Cart Item!',
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}




}
