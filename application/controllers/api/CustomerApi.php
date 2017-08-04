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
					$six_digit_random_number = mt_rand(100000, 999999);
					$from_email = 'cartinhour.com';
		 			$subject = 'Registraion';
		 			$message = "Dear User,\nYou are Registered Successfully. \n Your OTP is : " .$six_digit_random_number. "\n\n Thanks,\nCart In Hour Team";
			 		//send mail
			 		$this->email->from($from_email, 'CartinHour');		
			 		$this->email->to($email_store);
			 		$this->email->subject($subject);
			 		$this->email->message($message);
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
		$get = $this->input->get();
		//echo "<pre>";print_r($get);exit;
		$mobile = preg_match('/^[0-9]{10}+$/',$get['email_mobile']);
		//echo "<pre>";print_r($mobile);exit;
		if($mobile==1){
			$mobilecheck = $this->Customerapi_model->forget_mobile_check($get['email_mobile']);
			
		}else{
			$emailcheck = $this->Customerapi_model->forget_email_check($get['email_mobile']);
			
		}

		if($get['email_mobile'] == $mobilecheck['cust_mobile'])
		{
			$message = array('status'=>0,'message'=>'This Mobile Number Not In our Database');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
				
				$message = array('status'=>0,'message'=>'This Emaill address Not In our Database');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
	}


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


	public function homepagebanners_get()
	{
		$banners=$this->Customerapi_model->home_page_banners();
		//echo '<pre>';print_r($banners);exit;
		if(count($banners)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$banners['path']='http://cartinhour.com/uploads/banners/';
			$this->response($banners, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Home Banners are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function topoffers_get()
	{

		$top_offers = $this->Customerapi_model->top_offers_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($top_offers)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$top_offers['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($top_offers, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Home Banners are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function dealsoftheday_get()
	{
		$deals = $this->Customerapi_model->deals_of_the_day_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($deals)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$deals['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($deals, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Deals of The Day are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	public function seasonsales_get()
	{
		$ssales = $this->Customerapi_model->season_sales_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($ssales)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$ssales['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($ssales, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Season Sales are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}

	public function trendigproducts_get()
	{
		$treding = $this->Customerapi_model->treding_products_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($treding)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$treding['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($treding, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Trending Products are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}
	public function offersforyou_get()
	{
		$offers = $this->Customerapi_model->offers_for_you_list();
		//echo '<pre>';print_r($top_offers);exit;
		if(count($offers)>0){
			//$images = header('Content-Type: image/jpg');
			//echo '<pre>';print_r($images);exit;
			$offers['path']='http://cartinhour.com/uploads/productsimages/';
			$this->response($offers, REST_Controller::HTTP_OK);	
			
		}else{
			$message = array('status'=>0,'message'=>'Offers For You are not found.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);	
		}
	}








}
