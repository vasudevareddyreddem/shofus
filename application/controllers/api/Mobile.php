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
    
	
	
	public function  seller_register_post(){
		
			
			$this->input->post();
			$mobile_number=$this->input->get('seller_mobile_number');
			$mobile_check=$this->mobile_model->seller_mobile_check($mobile_number);
			//echo '<pre>';print_r($mobile_check);exit;
			if($mobile_check==0){
				$six_digit_random_number = mt_rand(100000, 999999);
				$seller = 'SEL';
				$seller_rand_id = mt_rand(100000, 999999);
					$data = array(
					'seller_rand_id' => $seller.''.$seller_rand_id,
					'seller_password' => md5($six_digit_random_number),
					'seller_mobile' => $this->input->get('seller_mobile_number'),
					'created_at'  => date('Y-m-d H:i:s'),
					'updated_at'  => date('Y-m-d H:i:s')
					);
					$createseller=$this->mobile_model->seller_register($data);
					if(count($createseller)>0){
						$message = array('seller_id'=>$createseller,'status'=>true,'message'=>'Seller Successfully Created!');
						$this->response($message, REST_Controller::HTTP_OK);
					}
				
			}else{
				$message = array('status'=>FALSE,'message'=>'Already mobile Number registered.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				
			}
			
			//echo '<pre>';print_r($createseller);exit;
	}

}
