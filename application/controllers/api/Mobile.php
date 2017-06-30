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
        		$mobile_num = $mobile_number;  
        		$message = "Your Temporary Password is : " .$six_digit_random_number;               
        // Sending with PHP CURL
       	$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
			$ret = file($url);
					$data = array(
					'seller_rand_id' => $seller.''.$seller_rand_id,					
					'seller_name' => $this->input->get('seller_name'),
					'seller_email' => $this->input->get('seller_email'),					
					'seller_mobile' => $this->input->get('seller_mobile'),
					'seller_password' => md5($this->input->get('seller_password')),
					//'seller_address' => $this->input->get('seller_address'),
					'created_at'  => date('Y-m-d H:i:s'),
					'updated_at'  => date('Y-m-d H:i:s')
					);
					$createseller=$this->mobile_model->seller_register($data);
					if(count($createseller)>0){
						// $message = array
						// (
						// 	'status'=>1,
						// 	'seller_id'=>$createseller,
						// 	'seller_details' =>$data,
						// 	'message'=>'Seller Successfully Created!'
						// );
						$data['status']=1;
						$this->response($data, REST_Controller::HTTP_OK);
					}
				
			 }
			 //elseif(){
			// 	$message = array
			// 	(
			// 		'status'=>0,
			// 		'message'=>'Already Email registered.'
			// 		);
			// 	$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			// }
			else{
				$message = array
				(
					'status'=>0,
					'message'=>'Already mobile Number And Email registered.'
					);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			}

		//seller_login
		public function seller_login_post()
		{
				
        
            $username   = $this->input->get('username');
            $password = md5($this->input->get('password'));           
			
            $result   = $this->mobile_model->seller_login($username, $password);
			
             if(count($result)>0)
            {
				$result['status']=1;

        	//$this->input->post();
            $seller_username   = $this->input->get('username');
            $seller_password = md5($this->input->get('password'));
            //print_r($seller_password);exit;

            $result   = $this->mobile_model->seller_login($seller_username, $seller_password);
                       
             if(count($result)>0)
            {
				$result['status']=1; 
				$this->response($result, REST_Controller::HTTP_OK);
			}	
			else
			{
				$message = array('status'=>0,'message'=>'Login Faild.');				
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}
		}
		//seller_basic_details
			

		//seller_categories
		public function seller_categories_post()
		{
			$id = $this->get('seller_id'); 
			$seller_cat_id =explode(',',$this->input->get('seller_cat_id'));
			//$adresses = implode(',' , $seller_cat_id->result());
			//echo '<pre>';print_r($seller_cat_id);exit;
			$seller_cat_names =explode(',',$this->input->get('seller_cat_name'));
			//echo '<pre>';print_r($seller_cat_names);exit;

			foreach($seller_cat_id as $adr)
			{
				$adresses = $adr['0'];
			}
			//print_r($adresses);exit;
			$seller_category = array(
			'seller_id' => $id,
			'seller_category_id'=> $adresses,
			'category_name'=> $seller_cat_names,
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);
			$seller_cats=$this->mobile_model->insertseller_cat($id,$seller_category);
			if(count($seller_cats)>0)
			{
			$message = array
				(
					'status'=>1,
					'seller_category'=>$seller_category,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
					'message'=>'Faild'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}



		}

		//store_details
=======
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
>>>>>>> f36cd99b91d2f7ce2c49ac89434f55e73562fa75
		
	}
	
	/*mobile otp verification*/
	public function  otp_verification_post()
	{
		echo "helloo";exit;
	}
	

		


}







	


