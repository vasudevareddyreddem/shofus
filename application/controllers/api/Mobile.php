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
			// $this->form_validation->set_rules('seller_mobile_number', 'mobile_number', 'trim|required'); 
   //      if ($this->form_validation->run() == FALSE) {
			// $message = array('status'=>FALSE,'message'=>'Phone Number Filed Not empty.');
			// 	$this->response($message, REST_Controller::HTTP_NOT_FOUND);

			// }
        
        
			$this->input->post();
			$mobile_number=$this->input->get('seller_mobile_number');
			$mobile_check=$this->mobile_model->seller_mobile_check($mobile_number);
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
						$message = array
						(
							'seller_id'=>$createseller,
							'status'=>Success,
							'message'=>'Seller Successfully Created!'
						);
						$this->response($message, REST_Controller::HTTP_OK);
					}
				
			}else{
				$message = array('status'=>FALSE,'message'=>'Already mobile Number registered.');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			}

		//seller_login
		public function seller_login_post()
		{
				
        	//$this->input->post();
            $username   = $this->input->get('login_email');
            $password = md5($this->input->get('login_password'));           
            $result   = $this->mobile_model->seller_login($username, $password);
             if(count($result)>0)
            {
				$message = array
				(
					'status'=>Success,
					'seller_details'=>$result,							
					'message'=>'Seller Successfully LoginIn!'
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}	
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'login Faild.'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		//seller_basic_details
		public function seller_basic_details_post()
		{
			$id = $this->input->get('seller_id');
			//echo '<pre>';print_r($id);exit;
			$data = array
			(
				'seller_id' => $id,
				'seller_name' => $this->input->get('seller_name'),
				'seller_email' => $this->input->get('seller_email'),
				'seller_address' => $this->input->get('seller_address')
			);
			//echo print_r($data);exit;
		$seller_basic_details=$this->mobile_model->seller_basic($id,$data);
		
		if(count($seller_basic_details)>0)
            {
				$message = array
				(
					'status'=>Success,
					'seller_basic_details'=>$data,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}	
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Faild'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}	

		//seller_categories
		public function seller_categories_post()
		{
			$id = $this->input->get('seller_id'); 
			$seller_cat_id =$this->input->get('seller_cat_id');
			$seller_cat_names =$this->input->get('seller_cat_name');
			// foreach ($seller_cat_id as $seller_cats_id) {
			// 	$store_id =$seller_cat_id['seller_cat_id'];
			// }
			// foreach ($seller_cat_names as $seller_cat_name) {
			// 	$store_name =$seller_cat_name['seller_cat_name'];
			// }

			$seller_category = array(
			'seller_id' => $id,
			'category_name'=> $seller_cat_names,
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);
			$seller_cats=$this->mobile_model->insertseller_cat($id,$seller_category);
			if(count($seller_cats)>0)
			{
			$message = array
				(
					'status'=>Success,
					'seller_category'=>$seller_category,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Faild'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}



		}

		//store_details
		
		public function seller_strore_details_post()
		{
			
			$id = $this->input->get('seller_id');
			$base64_str = $this->input->get('tanvat_image');
			$image = base64_decode($base64_str);
			$image_name= $image;
			$path ="/assets/sellerfile//" . $image_name;
			$tanvatimage= file_put_contents($path, $image);
		
		
			$data = array(
			'seller_id' => $id, 	
			'store_name' => $this->input->get('store_name'), 
			'addrees1' => $this->input->get('addrees1'),    
			'addrees2' => $this->input->get('addrees2'),    
			'pin_code' => $this->input->get('pin_code'),    
			'other_shops'  =>$this->input->get('other_shops'),
			'other_shops_location'  =>$this->input->get('other_shops_location'),
			'deliveryes'  =>$this->input->get('deliveryes'),
			'weblink'  =>$this->input->get('weblink'),
			'tin_vat'  =>$this->input->get('tin_vat'),
			'tinvatimage'  =>$tanvatimage,
			'tan'  =>$this->input->get('tan'),
			//'tanimage'  =>$tanimg,
			'cst'  =>$this->input->get('cst'),
			//'cstimage'  =>$cetimg,
			'gstin'  =>$this->input->get('gstin'),
			'created_at'  => date('Y-m-d H:i:s'),
			);
			//echo '<pre>';print_r($data);exit;
			$store_details=$this->mobile_model->seller_store_details($id,$data);
			
			if(count($store_details)>0)
			{
			$message = array
				(
					'status'=>Success,
					'seller_store_details'=>$data,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Faild'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		


		//seller_personal_details
		public function seller_personal_details_post()
		{
			$id = $this->input->get('seller_id');
			$data = array
			(
				'seller_id' => $id,
			    'seller_bank_account' => $this->input->get('bank_account'), 
			    'seller_adhar' => $this->input->get('aadhaar_card'),
			    'seller_pan_card' => $this->input->get('pan_card'),    
			    'created_at'  => date('Y-m-d H:i:s'),
			    'updated_at'  => date('Y-m-d H:i:s')
			  
			  );
			//echo print_r($data);exit;
			$seller_personal_details=$this->mobile_model->seller_personal_details($data,$id);

		    if(count($seller_personal_details)>0)
		      {
		      $message = array
				(
					'status'=>Success,
					'seller_personal_details'=>$data,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Faild'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		//seller_categorys
		public function seller_category_get()
		{
			$seller_category = $this->mobile_model->get_seller_category();
			if(count($seller_category)>0)
            {
				$message = array
				(
					'status'=>true,
					'seller_category'=>$seller_category,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}	
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Empty categorys'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		//seller_subcategory
		public function seller_subcategory_get()
		{
			$seller_subcategory = $this->mobile_model->get_seller_subcategory();
			if(count($seller_subcategory)>0){
				$message = array
				(
					'status'=>true,
					'seller_subcategory'=>$seller_subcategory,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Empty subcategorys'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}	
		}
		//seller_subitems
		public function seller_subitem_get()
		{
			$seller_subitem = $this->mobile_model->get_seller_subitem();	
			if(count($seller_subitem)>0){
				$message = array
				(
					'status'=>true,
					'seller_subitems'=>$seller_subitem,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Empty subitems'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		//admin_notifications
		public function admin_notifications_get()
		{
			$id = $this->get('seller_id');
			//echo $id;exit;
			$admin_notify = $this->mobile_model->getdata($id);	
			if(count($admin_notify)>0){
				$message = array
				(
					'status'=>true,
					'admin_notifications'=>$admin_notify,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Please Wait For Notifications'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		}

		//seller_ads
		public function seller_ads_get()
		{
			$seller_notify = $this->mobile_model->seller_ads();	
			if(count($seller_notify)>0){
				$message = array
				(
					'status'=>true,
					'admin_notifications'=>$seller_notify,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'Please Wait For Notifications'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}



		//new_orders
		public function seller_new_orders_get()
		{
			$id = $this->input->get('seller_id');
			$new_order=$this->mobile_model->new_orders($id);
			//echo print_r($result);exit;
			if(count($new_order)>0){
				$message = array
				(
					'status'=>true,
					'New Orders'=>$new_order,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'No Oredrs'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

		//return _orders
		public function seller_returns_orders_get()
		{
			$id = $this->input->get('seller_id');

		}
		
		public function seller_listing_get()
		{
			$id = $this->input->get('seller_id');
			$list = $this->mobile_model->getcatsubcatpro($id);
			if(count($list)>0){
				$message = array
				(
					'status'=>true,
					'my_listings'=>$list,							
				);
				$this->response($message, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>FALSE,
					'message'=>'No Listings'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		}




	}







	


