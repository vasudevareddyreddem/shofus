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
		$message = array('status'=>1,'message'=>'Username id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}elseif($password==''){
		$message = array('status'=>1,'message'=>'Password is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}
		$logindetails=$this->Deliveryboyapi_model->login_customer($username,$password);
		if(count($logindetails)>0){
						$message = array('status'=>1,'details'=>$logindetails, 'message'=>'Deliver boy details are found');
						$this->response($message, REST_Controller::HTTP_OK);
					}else{
						$message = array('status'=>1,'message'=>'!Invalida login details.Please try again');
						$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	
	}
	public function address_post()
	{
		$customer_id=$this->input->get('customer_id');
		$role_id=$this->input->get('role_id');	
		$address1=$this->input->get('address1');	
		$address2=$this->input->get('address2');	
		$city=$this->input->get('city');	
		$state=$this->input->get('state');	
		$pincode=$this->input->get('pincode');	
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		
		}elseif($role_id==''){
		$message = array('status'=>1,'message'=>'Role is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($address1==''){
		$message = array('status'=>1,'message'=>'Address1 is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($address2==''){
		$message = array('status'=>1,'message'=>'Address2 is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($city==''){
		$message = array('status'=>1,'message'=>'City is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($state==''){
		$message = array('status'=>1,'message'=>'State is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}elseif($pincode==''){
		$message = array('status'=>1,'message'=>'Pincode is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($role_id==6){
					$getdeliverbiy_details=$this->Deliveryboyapi_model->get_deliveryboy_details($customer_id,$role_id);
					if(count($getdeliverbiy_details)>0){
						
						$adress=array(
						'address1'=>$address1,
						'address2'=>$address2,
						'city'=>$city,
						'state'=>$state,
						'pincode'=>$pincode,
						);
						$update=$this->Deliveryboyapi_model->update_deliveryboy_address($customer_id,$adress);
						if(count($update)>0){
							$message = array('status'=>1,'message'=>'AddressSuccessfully updated');
							$this->response($message, REST_Controller::HTTP_OK);
							
						}else{
							$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
							$this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}
					}else{
						
					$message = array('status'=>1,'message'=>'Customer not found for this details');
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
					
					

		}else{
			$message = array('status'=>1,'message'=>'Role Id is wrong.please try againa!');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			
		}
		
	
	}
	
	public function orders_list_get(){
		
		$customer_id=$this->input->get('customer_id');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$oreders_list=$this->Deliveryboyapi_model->get_deliver_boy_orders_list($customer_id);
		//echo $this->db->last_query();exit;
		$rejectoreders_list=$this->Deliveryboyapi_model->get_deliver_boy_orders_reject_list($customer_id);
		if(count($rejectoreders_list)>0){
				foreach ($rejectoreders_list as $lists){
					$orditemids[]=$lists['order_item_id'];
					$orddeliveryids[]=$lists['delivery_boy_id'];
				}
				foreach ($oreders_list as $orderlists){
					
					
						if(in_array($orderlists['order_item_id'],$orditemids) && in_array($orderlists['delivery_boy_id'],$orddeliveryids) )
						{ 
							$order_lists[]=array();
						}else{
							$order_lists[]=$orderlists;
						}
						
				}
			
		}else{
		
			foreach($oreders_list as $lists){
				
				
					$order_lists[]=$lists;
				}
		}
		if(isset($order_lists) && count($order_lists)>0){
			foreach($order_lists as $lists){
				if(!empty($lists)) {
					$finalorderlists[]=$lists;//this means value does not exist or is FALSE
				}
				
			}
		}else{
			$finalorderlists[]=array();
		}
		
		if(count($finalorderlists)>0){
				$message = array('status'=>1,'count'=>count($finalorderlists),'list'=>$finalorderlists,'count'=>count($finalorderlists), 'message'=>'orders list are found');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'You have no delivery orders list');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
	}
	public function reject_orders_list_get(){
		
		$customer_id=$this->input->get('customer_id');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$rejectoreders_list=$this->Deliveryboyapi_model->get_deliver_boy_orders_reject_orderlist($customer_id);
		
		if(count($rejectoreders_list)>0){
				$message = array('status'=>1,'count'=>count($rejectoreders_list),'list'=>$rejectoreders_list, 'message'=>'reject orders list are found');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'You have no delivery orders list');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
	}	
	public function order_status_change_post(){
		
		$customer_id=$this->input->get('rejectcustomer_id');
		$order_item_id=$this->input->get('order_item_id');
		$status=$this->input->get('status');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'Rejected customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($order_item_id==''){
		$message = array('status'=>1,'message'=>'order item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($status==''){
		$message = array('status'=>1,'message'=>'status is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($status==1){
		$statusupdate=$this->Deliveryboyapi_model->order_status_updated($customer_id,$order_item_id,$status,0);
		$getall_rejected_list=$this->Deliveryboyapi_model->rejected_lists();
		if(count($getall_rejected_list)>0){
			
			foreach ($getall_rejected_list as $lisd){
				//echo '<pre>';print_r($lisd);
				$rrids[]=$lisd['order_item_id'];
				$rcids[]=$lisd['delivery_boy_id'];
			}
			if(in_array($order_item_id, $rrids) && in_array($customer_id, $rcids)){
				$rejected=1;
			}else{
				$addrejected=array(
				'order_item_id'=>$order_item_id,
				'delivery_boy_id'=>$customer_id,
				'created_at'=>date('Y-m-d H:i:s'),
				);
				$rejected=$this->Deliveryboyapi_model->insertrected_order_id($addrejected);
			}
			
		}else{
			
			$addrejected=array(
			'order_item_id'=>$order_item_id,
			'delivery_boy_id'=>$customer_id,
			'created_at'=>date('Y-m-d H:i:s'),
			);
			$rejected=$this->Deliveryboyapi_model->insertrected_order_id($addrejected);
		}
		if(count($statusupdate)>0 && count($rejected)>0){
				$message = array('status'=>1, 'message'=>'Succssfully rejected your ordered item');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'You have no delivery orders list');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		}else{
			$message = array('status'=>1,'message'=>'status is wrong. Please try again');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
	}
	public function order_Packing_status_change_post(){
		
		$order_item_id=$this->input->get('order_item_id');
		$status=$this->input->get('status');
		if($order_item_id==''){
		$message = array('status'=>1,'message'=>'order item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($status==''){
		$message = array('status'=>1,'message'=>'status is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($status==2){
				$statusupdate=$this->Deliveryboyapi_model->order_Packing_status_updated($order_item_id,$status);
				if(count($statusupdate)>0){
					$message = array('status'=>1, 'message'=>'Packing Order status Succssfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
			$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
		}else{
			$message = array('status'=>1,'message'=>'order status was wrong. please try again');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
		
	}
	public function order_raod_status_change_post(){
		
		$order_item_id=$this->input->get('order_item_id');
		$status=$this->input->get('status');
		if($order_item_id==''){
		$message = array('status'=>1,'message'=>'order item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($status==''){
		$message = array('status'=>1,'message'=>'status is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($status==3){
				$statusupdate=$this->Deliveryboyapi_model->order_road_status_updated($order_item_id,$status);
				if(count($statusupdate)>0){
					$message = array('status'=>1, 'message'=>'Order on Road status Succssfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
			$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
		}else{
			$message = array('status'=>1,'message'=>'order status was wrong. please try again');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
		
	}
	public function order_delivered_status_change_post(){
		
		$order_item_id=$this->input->get('order_item_id');
		$status=$this->input->get('status');
		if($order_item_id==''){
		$message = array('status'=>1,'message'=>'order item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($status==''){
		$message = array('status'=>1,'message'=>'status is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		if($status==4){
				$statusupdate=$this->Deliveryboyapi_model->order_delivered_status_updated($order_item_id,$status);
				if(count($statusupdate)>0){
					$details=$this->Deliveryboyapi_model->get_order_item_details($order_item_id);
					//echo '<pre>';print_r($details);exit;
					$msg=' Order Product Name: '.$details['item_name'].'Item successfully delivered';
					$messagelis['msg']=$msg;
					$username=$this->config->item('smsusername');
					$pass=$this->config->item('smspassword');
					$mobilesno=$details['customer_phone'];
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobilesno.'&text='.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from('cartinhours.com');
					$this->email->to($details['customer_email']);
					$this->email->subject('Cartinhours - Order Delivered');
					$html = $this->load->view('email/sellerorederconfirmation.php', $messagelis, true); 
					//echo $html;exit;
					$this->email->message($html);
					$this->email->send();
					$message = array('status'=>1, 'message'=>'Order delivered status Succssfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
			$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
		}else{
			$message = array('status'=>1,'message'=>'order delivered status was wrong. please try again');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
		
	}
	public function deliverycashpayment_post(){
		
		$order_item_id=$this->input->get('order_item_id');
		$amount=$this->input->get('amount');
		$amountstatus=$this->input->get('amountstatus');
		$payment_type=$this->input->get('payment_type');
		$payment_type=$this->input->get('payment_type');
		if($order_item_id==''){
		$message = array('status'=>1,'message'=>'order item id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($amount==''){
		$message = array('status'=>1,'message'=>'Amount is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($amountstatus==''){
		$message = array('status'=>1,'message'=>'Amountstatus is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($payment_type==''){
		$message = array('status'=>1,'message'=>'Payment type is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$getdetails=$this->Deliveryboyapi_model->get_order_details($order_item_id);
		
		//echo '<pre>';print_r($getdetails);exit;
		
		$totalamt=$getdetails['total_price']+$getdetails['delivery_amount'];
		if($totalamt==$amount){
			$getdetailss=$this->Deliveryboyapi_model->get_order_details_status($order_item_id,$amount,$amountstatus,$payment_type);
			$this->Deliveryboyapi_model->order_payment_status($getdetails['order_id'],$payment_type);
			if(count($getdetailss)>0){
					$message = array('status'=>1, 'message'=>'Order Amount status Succssfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
			
		}else{
			$message = array('status'=>1,'message'=>'Please enter correct amount');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		

		
	}
	public function completed_orders_list_get(){
		$customer_id=$this->input->get('customer_id');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$completeoreders_list=$this->Deliveryboyapi_model->get_delivered_orders_list($customer_id);
		
		if(count($completeoreders_list)>0){
				$message = array('status'=>1,'count'=>count($completeoreders_list),'list'=>$completeoreders_list, 'message'=>'delivered orders list are found');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'You have no delivered orders list');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function activestatus_post(){
		
		$customer_id=$this->input->get('customer_id');
		$status=$this->input->get('status');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'Customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}else if($status==''){
		$message = array('status'=>1,'message'=>'status is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
		$statusupdate=$this->Deliveryboyapi_model->customer_active_status($customer_id,$status);
		if(count($statusupdate)>0){
			$message = array('status'=>1, 'message'=>'status Succssfully updated');
			$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'technical problem will occured .try again after some time');
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
	}
	
	public function return_orders_list_get(){
		
		$customer_id=$this->input->get('customer_id');
		if($customer_id==''){
		$message = array('status'=>1,'message'=>'customer id is required!');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		$returnoreders_list=$this->Deliveryboyapi_model->get_deliver_boy_orders_return_orderlist($customer_id);
		
		if(count($returnoreders_list)>0){
				$message = array('status'=>1,'count'=>count($returnoreders_list),'list'=>$returnoreders_list, 'message'=>'return orders list are found');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
		$message = array('status'=>1,'message'=>'You have no return orders list');
		$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		}
		
	} 

	


}
