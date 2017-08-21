<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Customer extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('customer_model'); 
		$this->load->model('home_model'); 
		$this->load->model('category_model'); 
			
 }
 

  
  

  public function locationsearch(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		if($this->session->userdata('userdetails')){
			$logindetails=$this->session->userdata('userdetails');
			$updatearea = $this->customer_model->update_sear_area($logindetails['customer_id'],$post['locationarea']);	
			//echo $this->db->last_query();exit;
				if(count($updatearea)>0){
					$details = $this->customer_model->get_profile_details($logindetails['customer_id']);
					$this->session->set_userdata('userdetails',$details);
				}
			}

		$data['homepage_banner'] = $this->home_model->get_home_pag_banner();
		$data['top_offers']= $this->customer_model->get_product_search_top_offers($post['locationarea']);
		$data['tredings']= $this->customer_model->get_product_search_tredings($post['locationarea']);
		$data['offers']= $this->customer_model->get_product_search_offers_for_you($post['locationarea']);
		$data['deals_of_day']= $this->customer_model->get_product_search_deals_day($post['locationarea']);
	  	$data['season_sales']= $this->customer_model->get_product_search_seaaon_sales($post['locationarea']);
		//echo '<pre>';print_r($data);exit;
		$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	$this->template->write_view('content', 'customer/productsearch', $data);
	$this->template->render();
	  
  }
  public function account(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

		$this->template->write_view('content', 'customer/profile', $data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
 
 public function editprofile(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['locationdata'] = $this->home_model->getlocations();
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

		$this->template->write_view('content', 'customer/editprofile', $data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
 public function updateprofilepost(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		
		if($post['email']!=$customerdetails['cust_email']){
			$emailcheck= $this->customer_model->email_unique_check($post['email']);
			if(count($emailcheck)>0){
				$this->session->set_flashdata('errormsg','Email id already exits.please use another Email id');
				redirect('customer/editprofile');
			}
			
		}
		
		
		$cust_upload_file= $this->customer_model->get_profile_details($customerdetails['customer_id']);
		if($_FILES['profile']['name']!=''){
			$profilepic=$_FILES['profile']['name'];
			move_uploaded_file($_FILES['profile']['tmp_name'], "uploads/profile/" . $_FILES['profile']['name']);

			}else{
			$profilepic=$cust_upload_file['cust_propic'];
			}
		$details=array(
		'cust_firstname'=>$post['fname'],
		'cust_lastname'=>$post['lname'],
		'cust_email'=>$post['email'],
		'cust_mobile'=>$post['mobile'],
		'cust_propic'=>$profilepic,
		'address1'=>$post['address1'],
		'address2'=>$post['address2'],
		'area'=>$post['area'],
		);
		//echo '<pre>';print_r($details);exit;
		$updatedetails= $this->customer_model->update_deails($customerdetails['customer_id'],$details);
		if(count($updatedetails)>0){
			$this->session->set_flashdata('success','Profile Successfully updated');
			redirect('customer/account');
		}

		//echo '<pre>';print_r($post);exit;
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
 public function addcart(){
	 
	if($this->session->userdata('userdetails'))
	 {
		$post=$this->input->post();
		$customerdetails=$this->session->userdata('userdetails');
		$products= $this->customer_model->get_product_details($post['producr_id']);
			$qty=$post['qty'];
			//echo '<pre>';print_r($post);exit;
		
			$currentdate=date('Y-m-d h:i:s A');
				if($products['offer_expairdate']>=$currentdate){
						$item_price= ($products['item_cost']-$products['offer_amount']);
						$price	=(($qty) * ($item_price));
				}else{
					//echo "expired";
					$item_price= $products['special_price'];
					$price	=(($qty) * ($item_price));
				}
				$commission_price=(($price)*($products['commission'])/100);
				if($products['category_id']==18){
						if($price <500){
							$delivery_charges=35;
						}else{
							$delivery_charges=0;
						}
					}else{
						
						if($price <500){
							$delivery_charges=75;
						}else if(($price > 500) && ($price < 1000)){
							$delivery_charges=35;
						}else if($price >1000){
							$delivery_charges=0;
						}
					}
		
		
		$adddata=array(
		'cust_id'=>$customerdetails['customer_id'],
		'item_id'=>$post['producr_id'],
		'qty'=>$post['qty'],
		'item_price'=>$item_price,
		'total_price'=>$price,
		'commission_price'=>$commission_price,
		'delivery_amount'=>$delivery_charges,
		'seller_id'=>$products['seller_id'],
		'category_id'=>$products['category_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo '<pre>';print_r($adddata);exit;
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		
			foreach($data['cart_items'] as $pids) { 
						
							$rid[]=$pids['item_id'];
			}
		if(in_array($post['producr_id'],$rid)){
			
			if(isset($post['wishlist']) && $post['wishlist']=!'' ){
			$this->session->set_flashdata('adderror','Product already added to the cart');
			redirect('customer/wishlist');	
			}else{
				
			$this->session->set_flashdata('error','Product already Exits');
			redirect('category/productview/'.base64_encode($post['producr_id']));	
			}
			
		}else{
			$save= $this->customer_model->cart_products_save($adddata);
			if(count($save)>0){
			$this->session->set_flashdata('productsuccess','Product Successfully added to the cart');
			redirect('customer/cart');

			}
		
		}
	
		
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
 public function orders(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['orders_list']= $this->customer_model->order_list($customerdetails['customer_id']);
		
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/orders', $data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 } 
 public function cart(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
		
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/cart', $data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 } 
 public function wishlist(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['whistlist_items']= $this->customer_model->get_whishlist_products($customerdetails['customer_id']);
		
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/wishlist', $data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 } 
 public function updatecart(){
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		
		$products= $this->customer_model->get_product_details($post['product_id']);
		//echo '<pre>';print_r($post);exit;
		
		$qty=$post['qty'];
			//echo '<pre>';print_r($post);exit;
		
			$currentdate=date('Y-m-d h:i:s A');
				if($products['offer_expairdate']>=$currentdate){
						$item_price= ($products['item_cost']-$products['offer_amount']);
						$price	=(($qty) * ($item_price));
				}else{
					//echo "expired";
					$item_price= $products['special_price'];
					$price	=(($qty) * ($item_price));
				}
				$commission_price=(($price)*($products['commission'])/100);
				if($products['category_id']==18){
						if($price <500){
							$delivery_charges=35;
						}else{
							$delivery_charges=0;
						}
					}else{
						
						if($price <500){
							$delivery_charges=75;
						}else if(($price > 500) && ($price < 1000)){
							$delivery_charges=35;
						}else if($price >1000){
							$delivery_charges=0;
						}
					}
		
		//echo "<pre>";print_r($post);exit;
		$updatedata=array(
		'qty'=>$post['qty'],
		'item_price'=>$item_price,
		'commission_price'=>$commission_price,
		'total_price'=>$price,
		'delivery_amount'=>$delivery_charges,
		);
		
		$update= $this->customer_model->update_cart_qty($customerdetails['customer_id'],$post['product_id'],$updatedata);
		
		//echo '<pre>';print_r($update);exit;
		if(count($update)>0){
			$this->session->set_flashdata('productsuccess','Product Quantity Successfully Updated!');
			redirect('customer/cart');	
			
		}
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 } 
 public function deletecart(){
	 if($this->session->userdata('userdetails'))
	 {
		$item_id=base64_decode($this->uri->segment(3));
		$id=base64_decode($this->uri->segment(4));
		//echo '<pre>';print_r($item_id);exit; 
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		$delete= $this->customer_model->delete_cart_item($customerdetails['customer_id'],$item_id,$id);
		if(count($delete)>0){
			$this->session->set_flashdata('productsuccess','cart Item Successfully deleted!');
			redirect('customer/cart');	
			
		}
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 }
 public function deletewishlist(){
	 if($this->session->userdata('userdetails'))
	 {
		$whishid=base64_decode($this->uri->segment(3));
		//echo '<pre>';print_r($item_id);exit; 
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		$delete= $this->customer_model->delete_wishlist_item($customerdetails['customer_id'],$whishid);
		if(count($delete)>0){
			$this->session->set_flashdata('productsuccess','Wishlist Item Successfully deleted!');
			redirect('customer/wishlist');	
			
		}
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 }
 public function billing(){
	 
	
	if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['locationdata'] = $this->home_model->getlocations();
		$data['customerdetail']= $this->customer_model->get_profile_details($customerdetails['customer_id']);
		$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
		
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/billingadrres',$data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 } 
 public function billingaddresspost(){
	 
	
	if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		//echo '<pre>';print_r($customerdetails);exit;
		//echo '<pre>';print_r($post);exit;
		if($customerdetails['address1']=='' || $customerdetails['address2']==''){
			
			$details=array(
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'area'=>$post['area'],
			);
			$updatedetails= $this->customer_model->update_deails($customerdetails['customer_id'],$details);

		}
		$details=array(
		'cust_id'=>$customerdetails['customer_id'],
		'name'=>$post['name'],
		'emal_id'=>$customerdetails['cust_email'],
		'mobile'=>$post['mobile'],
		'address1'=>$post['address1'],
		'address2'=>$post['address2'],
		'area'=>$post['area'],
		'create-at'=>date('Y-m-d H:i:s'),
		);
		//echo '<pre>';print_r($details);exit;
		$this->session->set_userdata('billingaddress',$details);		
		$this->session->set_flashdata('success','Billing address successfully saved!');
		redirect('customer/orderpayment');
			
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 } 
 public function orderpayment(){
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
		$items_names= $this->customer_model->get_cart_Items_names($customerdetails['customer_id']);
		foreach ($items_names as $list){
			$productitemnames[]=$list['item_name'];
		}
		$data['billimgdetails']=$this->session->userdata('billingaddress');
		$data['emailid']=$customerdetails['cust_email'];
		$data['productinfo']=implode('-', $productitemnames);
		$data['txnid']=substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$amount=$data['carttotal_amount']['pricetotalvalue']+$data['carttotal_amount']['delivertamount'];
		$MERCHANT_KEY = $this->config->item('MERCHANTKEY');
			$SALT='eCwWELxi';

        $txnid = substr(hash('sha256', mt_rand().microtime()), 0, 20);
		$udf1='';
        $udf2='';
        $udf3='';
        $udf4='';
        $udf5='';
		$fname=$data['billimgdetails']['name'];
		$email=$customerdetails['cust_email'];
		$hashstring = $MERCHANT_KEY.'|'.$data['txnid'].'|'.$amount. '|'.implode('-', $productitemnames).'|'.$fname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$udf5.'||||||'.$SALT;
		$hash = strtolower(hash('sha512',$hashstring));
        $data['hash'] = $hash;
		//echo '<pre>';print_r($hashstring);
		//echo '<pre>';print_r($data);
		//exit;
		$data['hashstring']=$hashstring;
		$this->template->write_view('content', 'customer/payment',$data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
	 
 }
 public function success(){
	 if($this->session->userdata('userdetails'))
	 {
		//$order_id=base64_decode($this->uri->segment(3));
		//echo '<pre>';print_r($_POST);exit;
	$customerdetails=$this->session->userdata('userdetails');
	if($_POST['status']=='success'){
		$carttotal_amount= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
		$toatal=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount'];
		$decimal_two_numbers = number_format($toatal, 2, '.', '');
		
		if($decimal_two_numbers == $_POST['amount']){
			$billingaddress=$this->session->userdata('billingaddress');			
			$customerdetails=$this->session->userdata('userdetails');
			$ordersucess=array(
						'customer_id'=>$customerdetails['customer_id'],
						'transaction_id'=>$_POST['mihpayid'],
						'net_amount'=>$_POST['net_amount_debit'],
						'total_price'=>$_POST['net_amount_debit'],
						'discount'=>$_POST['discount'],
						'bank_reference_number'=>$_POST['bank_ref_num'],
						'payment_mode'=>$_POST['card_type'],
						'card_number'=>$_POST['cardnum'],
						'email'=>$_POST['email'],
						'phone'=>$_POST['phone'],
						'order_status'=>1,
						'hash'=>$_POST['hash'],
						'created_at'=>date('Y-m-d H:i:s'),
					);
				$saveorder= $this->customer_model->save_order_success($ordersucess);
				
				//echo '<pre>';print_r($saveorder);exit;
				/* order sms*/
				/*$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$msg='Order received:we have received your order for '.$_POST['productinfo'].' with order id '.$saveorder.' Amounting to '.$_POST['net_amount_debit'].' You can manage your order at http://cartinhour.com';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=SUCCES&phone="'.$_POST['phone'].'"&text="'.$msg.'"&priority=ndnd&stype=normal');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);*/
				//echo $sms;exit;
				/* order sms*/
				$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
				//echo '<pre>';print_r($cart_items);exit;
				foreach($cart_items as $items){
					$orderitems=array(
						'order_id'=>$saveorder,
						'item_id'=>$items['item_id'],
						'seller_id'=>$items['seller_id'],
						'customer_id'=>$items['cust_id'],
						'qty'=>$items['qty'],
						'item_price'=>$items['item_price'],
						'total_price'=>$items['total_price'],
						'delivery_amount'=>$items['delivery_amount'],
						'commission_price'=>$items['commission_price'],
						'customer_email'=>$customerdetails['cust_email'],
						'customer_phone'=>$billingaddress['mobile'],
						'customer_address'=>$billingaddress['address1'],
						'order_status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
					);
					//echo '<pre>';print_r($orderitems);exit;
					$item_qty=$this->customer_model->get_item_details($items['item_id']);
					$less_qty=$item_qty['item_quantity']-$items['qty'];
					//echo '<pre>';print_r($item_qty);
					//echo '<pre>';print_r($less_aty);
					//exit;
					$this->customer_model->update_tem_qty_after_purchasingorder($items['item_id'],$less_qty,$items['seller_id']);
					$save= $this->customer_model->save_order_items_list($orderitems);
					$statu=array(
						'order_item_id'=>$save,
						'order_id'=>$saveorder,
						'item_id'=>$items['item_id'],
						'status_confirmation'=>1,
						'create_time'=>date('Y-m-d h:i:s A'),
						'update_time'=>date('Y-m-d h:i:s A'),
					);
					$save= $this->customer_model->save_order_item_status_list($statu);
					
					
				}
				
				/*for billing address*/
				$orderbilling=array(
						'cust_id'=>$billingaddress['cust_id'],
						'order_id'=>$saveorder,
						'name'=>$billingaddress['name'],
						'emal_id'=>$billingaddress['emal_id'],
						'mobile'=>$billingaddress['mobile'],
						'address1'=>$billingaddress['address1'],
						'address2'=>$billingaddress['address2'],
						'area'=>$billingaddress['area'],
						'create-at'=>date('Y-m-d H:i:s'),
					);
					$saveorderbillingaddress= $this->customer_model->save_order_billing_address($orderbilling);
					
				/*for billing address*/
				$this->session->set_flashdata('paymentsucess','Payment successfully completed!');
				redirect('customer/ordersuccess/'.base64_encode($saveorder));
						
			
		}else{
			
			$this->session->set_flashdata('error','Your are proceessdig wrong way that way your amount is lossing.please contact customer care!');
			redirect('customer/paymenterror');
		}
		
		
			
		
	}else{
		$data['msg']= '<h2>Fail!</h2>';
		$data['error_msg']= $_POST['error_Message'];
		$this->session->set_flashdata('paymenterror',$_POST['error_Message']);
		redirect('customer/orderpayment');
	}
	  
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
	 
 }
 public function paymentfailure(){
	 if($this->session->userdata('userdetails'))
	 {
		
		//echo '<pre>';print_r($_POST);exit; 
		$data['msg']= '<h2>Fail!</h2>';
		$data['error_msg']= $_POST['error_Message'];
		$this->session->set_flashdata('paymenterror',$_POST['error_Message']);
		redirect('customer/orderpayment');

	 }

 }	 
 public function ordersuccess(){
	 if($this->session->userdata('userdetails'))
	 {

	$order_id=base64_decode($this->uri->segment(3));
	$billinginnfo = $this->session->userdata('billingaddress');
	//echo '<pre>';print_r($billinginnfo);exit;
	  $customerdetails=$this->session->userdata('userdetails');
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		//echo '<pre>';print_r($cart_items);exit;
		foreach($cart_items as $items){
		$delete= $this->customer_model->after_payment_cart_item($customerdetails['customer_id'],$items['item_id'],$items['id']);
		}
		$data['order_items']= $this->customer_model->get_order_items($order_id);
		$data['carttotal_amount']= $this->customer_model->get_successorder_total_amount($order_id);

		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/response',$data);
		$this->template->render();
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
	 
 } 
 public function orederdetails(){
	 if($this->session->userdata('userdetails'))
	 {

	$order_id=base64_decode($this->uri->segment(3));
	$customerdetails=$this->session->userdata('userdetails');
	$customer_items= $this->customer_model->get_order_items_lists($customerdetails['customer_id']);
	$data['customerdetail']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

	foreach ($customer_items as $order_ids){
		$ids[]=$order_ids['order_item_id'];
		
	}
	if(in_array($order_id, $ids)){
		
		$data['item_details']= $this->customer_model->get_order_items_list($customerdetails['customer_id'],$order_id);
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/orderdetails',$data);
		$this->template->render();
	}else{
			$this->session->set_flashdata('permissionerror','you have no permissions to access this floder');
		 redirect('customer/orders');
	}
	
	 
	}else{
		$this->session->set_flashdata('loginerror','Please login to continue');
		redirect('customer');
	}
	 
	 
 }
 public function orderrefund(){
	 if($this->session->userdata('userdetails'))
	 {

		$order_id=base64_decode($this->uri->segment(3));
			if($order_id!=''){
						$customerdetails=$this->session->userdata('userdetails');
						$customer_items= $this->customer_model->get_order_items_lists($customerdetails['customer_id']);
						//echo '<pre>';print_r($customer_items);exit;
						$data['customerdetail']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

						foreach ($customer_items as $order_ids){
							$ids[]=$order_ids['order_item_id'];
							
						}
						if(in_array($order_id, $ids)){
							$data['order_status_details']= $this->customer_model->get_order_items_refund_list($order_id);
							$data['color_list']= $this->customer_model->get_color_lists($data['order_status_details']['item_id']);
							$data['size_list']= $this->customer_model->get_sizes_lists($data['order_status_details']['item_id']);
							$data['product_details']= $this->customer_model->get_product_details_for_subcats($data['order_status_details']['item_id']);
							//echo '<pre>';print_r($data);exit;
							$this->template->write_view('content', 'customer/orderrefund',$data);
							$this->template->render();
						}else{
							$this->session->set_flashdata('permissionerror','you have no permissions to access this floder');
							 redirect('customer/orders');
						}
			}else{
					$this->session->set_flashdata('permissionerror','you have no permissions to access this floder');
					redirect('customer/orders');
			}
	 
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		redirect('customer');
	}
	 
	 
 }
 public function addwhishlist(){
	 
	
	if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		$detailsa=array(
		'cust_id'=>$customerdetails['customer_id'],
		'item_id'=>$post['item_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		'yes'=>1,
		);
		$whishlist = $this->customer_model->get_whishlist_list($customerdetails['customer_id']);
		if(count($whishlist)>0){
				foreach($whishlist as $lists) { 
							
								$itemsids[]=$lists['item_id'];
				}
			if(in_array($post['item_id'],$itemsids)){
				$removewhislish=$this->customer_model->remove_whishlist($customerdetails['customer_id'],$post['item_id']);
				if(count($removewhislish)>0){
				$data['msg']=2;	
				echo json_encode($data);
				}
			
			}else{
				$addwhishlist = $this->customer_model->add_whishlist($detailsa);
				if(count($addwhishlist)>0){
				$data['msg']=1;	
				echo json_encode($data);
				}
			}
			
		}else{
			$addwhishlist = $this->customer_model->add_whishlist($detailsa);
				if(count($addwhishlist)>0){
				$data['msg']=1;	
				echo json_encode($data);
				}
			
		}
		
	
		
	}else{
		$data['msg']=0;	
		echo json_encode($data); 
		$this->session->set_flashdata('loginerror','Please login to continue');
		 //redirect('customer');
	}
	 
 }
 public function index(){
	
	 $test=$this->session->userdata('userdetails');
	 //echo '<pre>';print_r($test);exit;
	 if($this->session->userdata('userdetails'))
	  {
		redirect('');
	 }else{
		$this->load->view( 'customer/register'); 
	 }	

	
 } 
 public function registerpost(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$emailcheck = $this->customer_model->email_check($post['email']);
	if(count($emailcheck)==0){
		$password=md5($post['password']);
		$newpassword=md5($post['confirm_password']);
		if($password == $newpassword ){
			
			$details=array(
			'cust_firstname'=>$post['firstname'],	 	
			'cust_lastname'=>$post['lastname'],
			'cust_email'=>$post['email'],
			'cust_password'=>$password,
			'cust_mobile'=>$post['mobile'],
			'area'=>$this->session->userdata('location_area'),
			'role_id'=>1,
			'status'=>1,
			'create_at'=>date('Y-m-d H:i:s'),
			);
			$customerdetails = $this->customer_model->save_customer($details);
			
			if(count($customerdetails)>0){
			$getdetails = $this->customer_model->get_customer_details($customerdetails);	
			$this->session->set_userdata('userdetails',$getdetails);
			$this->session->set_flashdata('sucesss',"Successfully registered");
			redirect('');
			}
		}else{
			$this->session->set_flashdata('error',"Password and confirm password do not match");
			redirect('customer');
		}
		
	}else{
		$this->session->set_flashdata('error',"E-mail already exists.Please use another email");
		redirect('customer');	
		
	}


	
 } 
 public function loginpost(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$pass=md5($post['password']);
	$logindetails = $this->customer_model->login_details($post['email'],$pass);
	//echo '<pre>';print_r($logindetails);
		if(count($logindetails)>0)
		{			
			if($this->session->userdata('location_area')!=''){
			$updatearea = $this->customer_model->update_sear_area($logindetails['customer_id'],$this->session->userdata('location_area'));	
				if(count($updatearea)>0){
					$details = $this->customer_model->get_profile_details($logindetails['customer_id']);
					$this->session->set_userdata('userdetails',$details);
				}
			}else{
				$logindetails = $this->customer_model->login_details($post['email'],$pass);
				$this->session->set_userdata('userdetails',$logindetails);				
			}
			//echo '<pre>';print_r($logindetails);exit;
			$this->session->set_flashdata('sucesss',"Successfully Login");
			redirect('');
		}else{
			$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
			redirect('customer');
		}
 }
	public function forgotpassword(){
	  
	$this->load->view( 'customer/forgotpassword'); 
	} 
	

	public function forgotpasswordpost(){
	  
		$post=$this->input->post();
	//echo '<pre>';print_r($post);
	$forgotpass = $this->customer_model->forgot_login($post['emailaddress']);
	//echo '<pre>';print_r($forgotpass);exit;
		if(count($forgotpass)>0)
		{			
			$this->load->library('email');
			$this->email->from('admin@cartinhour.com', 'CartInHour');
			$this->email->to($post['emailaddress']);
			$this->email->subject('CartInHour - Forgot Password');
			$html = "Click this link to reset your password. ".site_url('customer/resetpassword/'.base64_encode($forgotpass['cust_email']).'/'.base64_encode($forgotpass['customer_id']));
			//echo $html;exit;
			$this->email->message($html);
			$this->email->send();
			$this->session->set_flashdata('forsuccess','Check Your Email to reset your password!');
			redirect('customer');
		}else{
			$this->session->set_flashdata('error',"Invalid Email Address!");
			redirect('customer/forgotpassword');
		}
	}

	public function resetpassword(){
	
		$data['cust_id'] = $this->uri->segment(4);
		$data['email']= $this->uri->segment(3);
	$this->load->view( 'customer/resetpassword',$data); 
	} 
	
	
	public function resetpasswordpost(){
	
			$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
			if(isset($post['newpassword']) && $post['confirmpassword'] !='' )
				{
					if(md5($post['newpassword'])== md5($post['confirmpassword']))
					{
						$users = $this->customer_model->update_password($post['newpassword'],base64_decode($post['cust_id']),base64_decode($post['email']));
						
						//echo '<pre>';print_r($users);exit;
						if(count($users)>0)
						{
						$this->load->library('email');
						$this->email->from('admin@cartinhour.com', 'CartInHour');
						$this->email->to(base64_decode($post['email']));
						$this->email->subject('CartInHour - Forgot Password');
						$html = "Pasword Successfully changed";
						//echo $html;exit;
						$this->email->message($html);
						$this->email->send();
						
							$this->session->set_flashdata("forsuccess","Password successfully changed!");
							redirect('customer');
						}
					}
					else
					{
						$this->session->set_flashdata("error","Passwords are Not matched!");
						redirect('customer/resetpassword/'.$post['email'].'/'.$post['cust_id']);
					}
		}
	}
	public function changepassword(){
	
		
		if($this->session->userdata('userdetails'))
		{
				$this->template->write_view('content', 'customer/changepassword');
				$this->template->render();
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
		}
	} 


	



	public function changepasswordpost(){
		if($this->session->userdata('userdetails'))
		{
			$customerdetail=$this->session->userdata('userdetails');
		$changepasword = $this->input->post();
		//echo '<pre>';print_r($changepasword);
		$currentpostpassword=md5($changepasword['oldpassword']);
		$newpassword=md5($changepasword['newpassword']);
		$conpassword=md5($changepasword['confirmpassword']);
		$this->load->model('users_model');
			$userdetails = $this->customer_model->getcustomer_oldpassword($customerdetail['customer_id'],$customerdetail['role_id']);
			//print_r($userdetails);exit;			
			$currentpasswords=$userdetails['cust_password'];
			//print_r($currentpasswords);exit;
			if($currentpostpassword == $currentpasswords ){
				if($newpassword == $conpassword){
						$this->load->model('users_model');
						$passwordchange = $this->customer_model->set_password($customerdetail['customer_id'],$customerdetail['role_id'],$conpassword);
						//echo $this->db->last_query();exit;
						if (count($passwordchange)>0)
							{
								$this->session->set_flashdata('updatpassword',"Password successfully changed!");
								redirect('customer/changepassword');
							}
							else
							{
								$this->session->set_flashdata('passworderror',"Something went wrong in change password process!");
								redirect('customer/changepassword');
							}
				}else{
					$this->session->set_flashdata('passworderror',"New password and confirm password was not matching");
					redirect('customer/changepassword');
				}
			}else{
					$this->session->set_flashdata('passworderror',"Your Old password is incorrect. Please try again.");
					redirect('customer/changepassword');
				}
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
		}
	}  	
 
	public function logout(){
		
		$userinfo = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($userinfo );exit;
        $this->session->unset_userdata($userinfo);
        $this->session->unset_userdata('location_area');
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('');
	}



	
	public function password()
	{
		$data['cust_id'] = base64_decode($this->uri->segment(4));
		$data['cust_email']= base64_decode($this->uri->segment(3));
		$this->load->view('customer/setpassword',$data);
	}

	public function setpassword()
	{

		
		$pass_post = $this->input->post();	
		//echo "<pre>";print_r($pass_post);exit;	
		$newpassword=md5($pass_post['password']);
		$conpassword=md5($pass_post['confirmpassword']);
		$cust_email = $pass_post['cust_email'];
		$cust_id = $pass_post['cust_id'];
		//$cust_email = $this->input->post('cust_email');
		//echo "<pre>";print_r($cust_email);exit;
		if($newpassword == $conpassword)
		{
			$customerdetails  = $this->customer_model->get_user($pass_post['cust_id'],$pass_post['cust_email']);
			//echo "<pre>";print_r($customerdetails);exit;
			if(count($customerdetails)>0)
			{
				$passwordset = $this->customer_model->setpassword_user($pass_post['cust_id'],$conpassword);
		//echo "<pre>";print_r($passwordset);exit;
				if (count($passwordset)>0)
				{
					$customer = $this->customer_model->get_customers_details($pass_post['cust_id']);
					//echo "<pre>";print_r($customer);exit;
					if($customer['role_id']==5){
					$this->session->set_userdata('userdetails',$customer);	
					$this->session->set_flashdata('dashboard',"Welcone To Inventory Management!");
					redirect('inventory/dashboard');	
					}else if($customer['role_id']==6){
					$this->session->set_userdata('userdetails',$customer);	
					redirect('deliveryboy/dashboard');	
					}
				
				}
				else
				{
					$this->session->set_flashdata('passworderror',"Something went wrong in set password process!");
					redirect('customer/password/'.base64_encode($pass_post['cust_email']).'/'.base64_encode($pass_post['cust_id']
					));
				}					
			}else{	
			$this->session->set_flashdata('passworderror',"Enter wrong details.please tru again!");
			redirect('customer/password/'.base64_encode($pass_post['cust_email']).'/'.base64_encode($pass_post['cust_id']));			
								
			}				
		}
		else
		{
			$this->session->set_flashdata('passworderror',"New password and confirm password was not matching");
			redirect('customer/password/'.base64_encode($pass_post['cust_email']).'/'.base64_encode($pass_post['cust_id']));
		}
		
	}
	
	

	public function seemore(){
		
		if($this->session->userdata('userdetails')){
			$customerdetails=$this->session->userdata('userdetails');
			$details = $this->customer_model->get_profile_details($customerdetails['customer_id']);
			$data['topoffers'] = $this->home_model->get_search_top_offers($details['area']);
			
		}else{
			$data['topoffers'] = $this->home_model->get_top_offers();
		
		}
		$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
		$this->template->write_view('content', 'customer/seemore',$data);
		$this->template->render();
	}
	
	public function refundpost(){
	 
	if($this->session->userdata('userdetails'))
	{
		
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		if(isset($post['refund_type']) && $post['refund_type']==1){
				$refundtype='Refund';
		}else if(isset($post['refund_type']) && $post['refund_type']==2){
				$refundtype='Exchange';
		}else if(isset($post['refund_type']) && $post['refund_type']==3){
				$refundtype='Replacement';
		}
		if(isset($post['refund_type1']) && $post['refund_type1']==1){
				$refundtype1='Refund';
		}else if(isset($post['refund_type1']) && $post['refund_type1']==2){
				$refundtype1='Exchange';
		}else if(isset($post['refund_type1']) && $post['refund_type1']==3){
				$refundtype1='Replacement';
		}
			if(isset($post['refund_type']) && $post['refund_type']!=''){
						$details=array(
						'region'=>$post['region'],
						'status_refund'=>$refundtype,
						'update_time'=>date('Y-m-d H:i:s A'),
						);
						//echo '<pre>';print_r($details);exit;
						$savereview= $this->customer_model->update_refund_details($post['status_id'],$details);
						if(count($savereview)>0){
							$data=array('order_status'=>5);
							$this->customer_model->update_refund_details_inorders($post['order_item_id'],$data);
							//echo $this->db->last_query();exit;
							$this->session->set_flashdata('successmsg','Your query submitted successfully');
							redirect('customer/orders');
						}
			}
			if(isset($post['refund_type1']) && $post['refund_type1']!=''){
				//echo '<pre>';print_r($post);
				$exchangedetails=array(
						'color'=>$post['color'],
						'size'=>$post['size'],
						'region'=>isset($post['region'])?$post['region']:'',
						'status_refund'=>$refundtype1,
						'update_time'=>date('Y-m-d H:i:s A'),
						);
						$exchangesave= $this->customer_model->update_refund_details($post['status_id'],$exchangedetails);
						if(count($exchangesave)>0){
							$data=array('order_status'=>5);
							$this->customer_model->update_refund_details_inorders($post['order_item_id'],$data);
							//echo $this->db->last_query();exit;
							$this->session->set_flashdata('successmsg','Your query submitted successfully');
							redirect('customer/orders');
						}
				
			}
		

	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
		}
	}
	
	 public function trackorders(){
		 if($this->session->userdata('userdetails'))
		 {

			$customerdetails=$this->session->userdata('userdetails');
			$data['customer_all_order_details']= $this->customer_model->get_order_items_track_list($customerdetails['customer_id']);
			//echo '<pre>';print_r($data['customer_all_order_details']);exit; 
			$this->template->write_view('content', 'customer/trackorders', $data);
			$this->template->render();
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('customer');
		}
	 
	 
 }



}		
?>