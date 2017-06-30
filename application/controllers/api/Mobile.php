<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Mobile extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->helper(array('url', 'html'));
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('mobile_model');
	}
    
	
	/* start seller register Apis */

	public function  seller_register_post()
	{
			$this->input->post();
			$mobile=$this->input->get('mobile');
			$email=$this->input->get('email');
			
			$mobile_check =$this->mobile_model->seller_mobile_check($mobile);
			$email_check =$this->mobile_model->seller_email_check($email);
			//echo '<pre>';print_r($email_check);
			//echo '<pre>';print_r($mobile_check);
			
			if((count($mobile_check)>0 ) && (count($email_check)>0 )) {
				$message = array('status'=>FALSE,'key'=>1,'message'=>'Mobile number and  email already exits. Please use another Mobile number and  email id.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(count($mobile_check)>0){
				
				$message = array('status'=>FALSE,'key'=>1,'message'=>'Mobile number already exits. Please use another Mobile number.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else if(count($email_check)>0){
				
				$message = array('status'=>FALSE,'key'=>1,'message'=>'Email Id already exits. Please use another Email Id.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}else{
				
				/* for otp purpose */
				$six_digit_random_number = mt_rand(100000, 999999);
				$seller = 'SEL';
				$seller_rand_id = mt_rand(100000, 999999);
				$user_id="cartin"; 
				$pwd="9494422779";    
				$sender_id = "CARTIN";          
				$mobile_num = $mobile;  
				$message = "Your Temporary Password is : " .$six_digit_random_number;               
				// Sending with PHP CURL
				$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
				$ret = file($url);
				/*-- */
					$details = array(
						'seller_rand_id' => $seller.''.$seller_rand_id,
						'seller_mobile' => $this->input->get('mobile'),
						'seller_name' => $this->input->get('name'),
						'seller_email' => $this->input->get('email'),
						'seller_password' => md5($this->input->get('password')),
						'mobile_verification' => $six_digit_random_number,
						'created_at'  => date('Y-m-d H:i:s'),
						'updated_at'  => date('Y-m-d H:i:s')
						);

				$savedetails=$this->mobile_model->seller_register($details);
				
				if(count($savedetails)>0){
					$message = array('status'=>true,'key'=>1,'seller_id'=>$savedetails,'message'=>'verification Code send to your Mobile number');
						$this->response($message, REST_Controller::HTTP_OK);
				}
						

			}
		
	}
	

		


}







	


