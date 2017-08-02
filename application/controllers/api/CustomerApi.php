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
		$emailcheck = $this->Customerapi_model->email_check($get['email']);
		if(count($emailcheck)==0)
		{
			$password=md5($get['password']);
			$newpassword=md5($get['confirm_password']);
			if($password == $newpassword )
			{			
				$details=array(
				'cust_firstname'=>$get['firstname'],	 	
				'cust_lastname'=>$get['lastname'],
				'cust_email'=>$get['email'],
				'cust_password'=>$password,
				'cust_mobile'=>$get['mobile'],
				//'area'=>$this->session->userdata('location_area'),
				'role_id'=>1,
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				);
				$customerdetails = $this->Customerapi_model->save_customer($details);
			
				if(count($customerdetails)>0){
					$getdetails = $this->Customerapi_model->get_customer_details($customerdetails);	
					$message = array('status'=>1,'customer_id'=>$customerdetails,'message'=>'Register Successfully');
					$this->response($message, REST_Controller::HTTP_OK);
				}
			}else{
			$message = array('status'=>0,'message'=>'Password and confirm password do not match.');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}	
		}else{
			$message = array('status'=>0,'message'=>'E-mail already exists.Please use another email');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);		
		}
	}

	/*  Login Apis */
	public function login_post()
	{	 
	$get=$this->input->get();
	$pass=md5($get['password']);
	$logindetails = $this->Customerapi_model->login_details($get['email'],$pass);
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
	

}







	


