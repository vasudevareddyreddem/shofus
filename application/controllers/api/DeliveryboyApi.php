<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class DeliveryboyApi extends REST_Controller {

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
		$this->load->model('Deliveryboyapi_model');
		//$this->load->model('seller/Promotions_model');
	}
    
	/* login post*/
	public function loginpost_post()
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
		$logindetails=$this->Deliveryboyapi_model->login_customer($username,$password);
		if(count($logindetails)>0){
						$message = array('status'=>1,'details'=>$logindetails, 'message'=>'Deliver boy details are found');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>0,'message'=>'!Invalida login details.Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	
	}
	public function address_post()
	{
		$customer_id=$this->input->get('customer_id');
		$role_id=$this->input->get('role_id');	
		$address=$this->input->get('address');	
		if($customer_id==''){
		$message = array('status'=>0,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}elseif($role_id==''){
		$message = array('status'=>0,'message'=>'Role is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($address==''){
		$message = array('status'=>0,'message'=>'Address required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($role_id==6){
					$getdeliverbiy_details=$this->Deliveryboyapi_model->get_deliveryboy_details($customer_id,$role_id);
					if(count($getdeliverbiy_details)>0){
						
						$update=$this->Deliveryboyapi_model->update_deliveryboy_address($customer_id,$address);
						if(count($update)>0){
							$message = array('status'=>1,'message'=>'AddressSuccessfully updated');
							$this->response($message, REST_Controller::HTTP_OK);
							
						}else{
							$message = array('status'=>0,'message'=>'technical problem will occured .try again after some time');
							$this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}
					}else{
						
					$message = array('status'=>0,'message'=>'Customer not found for this details');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					
					echo '<pre>';print_r($getdeliverbiy_details);exit;
					//$getdeliverbiy_details=$this->Deliveryboyapi_model->update_deliveryboy_address($username,$password);

		}else{
			$message = array('status'=>0,'message'=>'Role Id is wrong.please try againa!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			
		}
		
	
	}
	
	public function orders_list_get(){
		
		
		
	}

	


}
