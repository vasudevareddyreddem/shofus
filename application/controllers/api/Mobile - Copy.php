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
			$mobile_number=$this->input->get('seller_mobile_number');
			$email=$this->input->get('seller_email');
			$mobile_check=$this->mobile_model->seller_mobile_check($mobile_number);
			//print_r($mobile_check);exit;
			$email_check =$this->mobile_model->seller_email_check($email);
			 //print_r($email_check);exit;
			if($mobile_check==0){
					$mobile = 'Already mobile Number registered.';
				}else{
					echo " 0";
				}
				if($email_check==0){
					$email = 'Already Email Address registered.';
				}else{
					echo "0";
				}
			 if($mobile_check==0 || $email_check==0)
			 {
				


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
					'seller_password' => md5($six_digit_random_number),
					'seller_mobile' => $this->input->get('seller_mobile_number'),
					'seller_name' => $this->input->get('seller_name'),
					'seller_email' => $this->input->get('seller_email'),
					'seller_address' => $this->input->get('seller_address'),
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
			if($email_check==0)
			{

			$message = array
			  	(
			  		'status'=>0,
			  		'message'=>$email
			  		);
			  	$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		
			else
			{

				$message = array
			 	(
			 		'status'=>0,
			 		'message'=>$mobile
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
		
		public function seller_strore_details_post()
		{
			
			$id = $this->input->get('seller_id');
			// $base64_str = $this->input->get('tanvat_image');
			// $image = base64_decode($base64_str);
			// $image_name= $image;
			// $path ="/assets/sellerfile//" . $image_name;
			// $tanvatimage= file_put_contents($path, $image);
		
		
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
			// $message = array
			// 	(
			// 		'status'=>1,
			// 		'seller_store_details'=>$data,							
			// 	);
				$data['status']=1;
				$this->response($data, REST_Controller::HTTP_OK);
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
		  //     $message = array
				// (
				// 	'status'=>1,
				// 	'seller_personal_details'=>$data,							
				// );
				$data['status']=1;
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
		/* End seller register Apis */


		/* start seller Update Profile Apis */

		public function update_stepone_details_post()
		{
			$id = $this->input->get('seller_id');
			//echo $id;
			$stepone = array(					
					'seller_name' => $this->input->get('seller_name'),
					'seller_mobile' => $this->input->get('seller_mobile_number'),
					'seller_email' => $this->input->get('seller_email'),
					'seller_address' => $this->input->get('seller_address'),
					'created_at'  => date('Y-m-d H:i:s'),
					'updated_at'  => date('Y-m-d H:i:s')
					);
			$update_stepone=$this->mobile_model->update_step_one($id,$stepone);

		    if(count($update_stepone)>0)
		      {
		  //     $message = array
				// (
				// 	'status'=>1,
				// 	'Seller_update_stepone'=>$stepone,
				// 	'message'=>'Successfully Updated Stepone'						
				// );
				$stepone['status']=1;
				$stepone['message']='Successfully Updated Stepone';
				$this->response($stepone, REST_Controller::HTTP_OK);
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

		//update seller_steptwo
		public function update_steptwo_details_post()
		{
			$id = $this->get('seller_id'); 
			$seller_cat_id =explode(',',$this->input->get('seller_cat_id'));
			//$adresses = implode(',' , $seller_cat_id->result());
			//echo '<pre>';print_r($adresses);exit;
			$seller_cat_names =explode(',',$this->input->get('seller_cat_name'));
			//echo '<pre>';print_r($seller_cat_names);exit;

			foreach($seller_cat_id->result_array() as $adr)
			{
				$adresses .= $adr['seller_cat_id'] . ',' ;
			}
			$steptwo = array(
			'seller_id' => $id,
			'seller_category_id'=> $seller_cat_id,
			'category_name'=> $seller_cat_names,
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);
			$seller_cats=$this->mobile_model->insertseller_cat($id,$steptwo);
			if(count($seller_cats)>0)
			{
			// $message = array
			// 	(
			// 		'status'=>1,
			// 		'Seller_update_stepone'=>$seller_category,
			// 		'message'=>'Successfully Updated Steptwo'							
			// 	);
				$steptwo['status']=1;
				$steptwo['message']='Successfully Updated Steptwo';
				$this->response($steptwo, REST_Controller::HTTP_OK);
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


		//update seller_stepthree

		public function update_stepthree_details_post()
		{
			$id = $this->input->get('seller_id');
			// $base64_str = $this->input->get('tanvat_image');
			// $image = base64_decode($base64_str);
			// $image_name= $image;
			// $path ="/assets/sellerfile//" . $image_name;
			// $tanvatimage= file_put_contents($path, $image);
		
		
			$stepthree = array(
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
			'tan'  =>$this->input->get('tan'),			
			'cst'  =>$this->input->get('cst'),		
			'gstin'  =>$this->input->get('gstin'),
			'created_at'  => date('Y-m-d H:i:s'),
			);
			//echo '<pre>';print_r($data);exit;
			$update_stepthree=$this->mobile_model->update_step_three($id,$stepthree);
			
			if(count($update_stepthree)>0)	
			{
			// $message = array
			// 	(
			// 		'status'=>1,
			// 		'Seller_update_stepthree'=>$stepthree,
			// 		'message'=>'Successfully Updated Stepthree'
			// 	);
				$stepthree['status']=1;
				$stepthree['message']='Successfully Updated Stepthree';
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

		//update seller_stepthree
		public function update_stepfour_details_post()
		{
			$id = $this->input->get('seller_id');

			$stepfour =array
			(
				'seller_id' => $id,
				'seller_bank_account' => $this->input->get('bank_account'),
				'seller_pan_card ' => $this->input->get('pan_card'),
				'seller_adhar' => $this->input->get('adhar_card')
			);
			$update_stepfour=$this->mobile_model->update_step_four($id,$stepfour);
			
			if(count($update_stepfour)>0)	
			{
			// $message = array
			// 	(
			// 		'status'=>1,
			// 		'Seller_update_stepfour'=>$stepfour,
			// 		'message'=>'Successfully Updated Stepfour'
			// 	);
				$stepfour['status']=1;
				$stepfour['message']='Successfully Updated Stepfour';
				$this->response($stepfour, REST_Controller::HTTP_OK);
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

		/* End seller Update Profile Apis */




		//seller_categorys
		public function seller_category_get()
		{
			$seller_category = $this->mobile_model->get_seller_category();
			if(count($seller_category)>0)
            {
				// $message = array
				// (
				// 	'status'=>1,
				// 	'seller_category'=>$seller_category,							
				// );
				$seller_category['status']=1;
				$this->response($seller_category, REST_Controller::HTTP_OK);
			}	
			else
			{
				$message = array
				(
					'status'=>0,
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
				// $message = array
				// (
				// 	'status'=>1,
				// 	'seller_subcategory'=>$seller_subcategory,							
				// );
				$seller_subcategory['status']=1;
				$this->response($seller_subcategory, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
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
				// $message = array
				// (
				// 	'status'=>1,
				// 	'seller_subitems'=>$seller_subitem,							
				// );
				$seller_subitem['status']=1;
				$this->response($seller_subitem, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
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
				// $message = array
				// (
				// 	'status'=>1,
				// 	'admin_notifications'=>$admin_notify,							
				// );
				$admin_notify['status']=1;
				$this->response($admin_notify, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
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
				// $message = array
				// (
				// 	'status'=>1,
				// 	'admin_notifications'=>$seller_notify,							
				// );
				$seller_notify['status']=1;
				$this->response($seller_notify, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
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
				// $message = array
				// (
				// 	'status'=>1,
				// 	'New Orders'=>$new_order,							
				// );
				$new_order['status']=1;
				$this->response($new_order, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
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
		//listing cats
		public function listing_get()
		{
			$id = $this->input->get('seller_id');
			$lists = $this->mobile_model->listing_category($id);
			if(count($lists)>0){
				// $message = array
				// (
				// 	'status'=>1,
				// 	'my_listings'=>$lists,							
				// );
				$lists['status']=1;
				$this->response($lists, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
					'message'=>'No Listings'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		}

		//my_listing
		public function seller_listing_get()
		{
			$id = $this->input->get('seller_id');
			$list = $this->mobile_model->listing_sub_all($id);
			if(count($list)>0){
				// $message = array
				// (
				// 	'status'=>1,
				// 	'my_listings'=>$list,							
				// );
				$list['status']=1;
				$this->response($list, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
					'message'=>'No Listings'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}

		}

		//Track Approval Requests

		public function track_approval_request_get()
		{
			$id = $this->input->get('seller_id');
			$track =$this->mobile_model->track_approval($id);
			//print_r($track);
			
  				if(count($track)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'track_approvals'=>$track,		 			
					
		 	// 	);
  				$track['status']=1;
	 				$this->response($track, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No track_approvals'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}
		//Total Orders
		public function total_orders_get()
		{
			$id = $this->input->get('seller_id');
			$total_orders = $this->mobile_model->get_total($id);
			//print_r($total_orders);
			if(count($total_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'total_orders'=>$total_orders,		 			
					
		 	// 	);
  				$total_orders['status']=1;
	 			$this->response($message, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//assigned orders
		public function assigned_orders_get()
		{
			$id = $this->input->get('seller_id');
			$assigned_orders = $this->mobile_model->assigned_Orders($id);
			//print_r($assigned_orders);
			if(count($assigned_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Assigned_orders'=>$assigned_orders,		 			
					
		 	// 	);
  					$assigned_orders['status']=1;
	 				$this->response($assigned_orders, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Assigned_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//inprogress_orders
		public function inprogress_orders_get()
		{
			$id = $this->input->get('seller_id');
			$inprogress_orders = $this->mobile_model->inprogress_orders($id);
			//print_r($inprogress_orders);
			if(count($inprogress_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Inprogress_orders'=>$inprogress_orders,		 			
					
		 	// 	);
  				$inprogress_orders['status']=1;
	 			$this->response($message, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Inprogress_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//delivery_orders
		public function delivery_orders_get()
		{
			$id = $this->input->get('seller_id');
			$delivery_orders = $this->mobile_model->delivery_orders($id);
			//print_r($delivery_orders);
			if(count($delivery_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Delivery_orders'=>$delivery_orders,		 			
					
		 	// 	);
  				$delivery_orders['status']=1;
	 				$this->response($delivery_orders, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Delivery_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//cancel_orders
		public function cancel_orders_get()
		{
			$id = $this->input->get('seller_id');
			$cancel_orders = $this->mobile_model->cancel_orders($id);
			if(count($cancel_orders)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Cancel_orders'=>$cancel_orders,		 			
					
		 	// 	);
  				$cancel_orders['cancel_orders']=1;
	 			$this->response($cancel_orders, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Cancel_orders'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//Seller Payments
		public function seller_payments_get()
		{
			$id = $this->input->get('seller_id');
			$payments = $this->mobile_model->payment_details($id);
			if(count($payments)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		'Seller_Payments'=>$payments,		 			
					
		 	// 	);
  				$payments['status']=1;
	 			$this->response($payments, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'No Payments'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}
		}

		//seller_request_service
		public function seller_request_service_post()
		{
			$id = $this->input->get('seller_id');
			$seller_name_get = $this->mobile_model->seller_name($id);
			foreach ($seller_name_get as $seller_name) {
				$name =$seller_name['seller_name'];
			}
			//print_r($name);exit;
			//print_r($seller_name);exit;
			$service = array(
  			'seller_id' => $id,
  			'seller_name'=>$name,
  	  		'phone_number' => $this->input->get('phone_number'),
  	  		'select_plan' => $this->input->get('plan'),
  	    	'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s'),
  	  	);
			//print_r($service);exit;
			$service_save = $this->mobile_model->services_save($service);
			//print_r($service_save);exit;
			if(count($service_save)>0)
  			{
				// $message = array
		 	// 	(
		 	// 		'status'=>1,
		 	// 		//'Request Service'=>$service_save,
		 	// 		'message'=> 'Wait For Reply!!'		 			
					
		 	// 	);
  				$service['status']=1;
	 			$this->response($service, REST_Controller::HTTP_OK);
		 	}
		 	else
		 	{
		 		$message = array
		 		(
		 			'status'=>0,
		 			'message'=>'Empty'
		 		);
	 			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		 	}

		}

		//seller_offers
		public function seller_offers_get()
		{
			$id = $this->input->get('seller_id');
			$offers = $this->mobile_model->listing_category($id);
			// if(count($offers)>0){
			// 	$message = array
			// 	(
			// 		'status'=>1,
			// 		'Offers'=>$offers,							
			// 	);
				$offers['status']=1;
				$this->response($offers, REST_Controller::HTTP_OK);
			}
			else
			{
				$message = array
				(
					'status'=>0,
					'message'=>'No Listings'
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}




}







	


