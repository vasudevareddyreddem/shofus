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
		$this->load->library('HybridAuthLib');	
		$this->load->library('user_agent');
 
 }
 

  public function locationsearch(){
		$post=$this->input->post();
			if(count($post['locationarea'])==0){
			redirect('');
		}
		
		$locationdata= $this->home_model->getlocations();
		$loacationname=array();
		foreach ($locationdata as $list){
			if (in_array($list['location_id'], $post['locationarea'])) {
				$loacationname[]=$list['location_name'];
			}
		}
		$locationdatadetails=implode(", ",$loacationname);
		$this->session->set_userdata('location_area',$locationdatadetails);
		$this->session->set_userdata('location_ids',$post['locationarea']);
		$data['homepage_banner'] = $this->home_model->get_home_pag_banner();
		$data['top_offers']= $this->customer_model->get_product_search_top_offers($post['locationarea']);
		$data['tredings']= $this->customer_model->get_product_search_tredings($post['locationarea']);
		$data['offers']= $this->customer_model->get_product_search_offers_for_you($post['locationarea']);
		$data['deals_of_day']= $this->customer_model->get_product_search_deals_day($post['locationarea']);
	  	$data['season_sales']= $this->customer_model->get_product_search_seaaon_sales($post['locationarea']);
		$data['seemore']=$post['locationarea'];
		//echo '<pre>';print_r($data);exit;
		$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
		if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
			$customer_ids_list[]=$list['cust_id'];
			$whishlist_item_ids_list[]=$list['item_id'];
			$whishlist_ids_list[]=$list['id'];
		}
		
		$data['customer_ids_list']=$customer_ids_list;
		$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
		$data['whishlist_ids_list']=$whishlist_ids_list;
		}
		$data['locationnames']=$locationdatadetails;
		
	//$this->template->write_view('content','shared/header');
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content','customer/productsearch', $data);
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
		//echo '<pre>';print_r($customerdetails);
		//echo '<pre>';print_r($post);exit;
		
		if($post['email']!=$customerdetails['cust_email']){
			$emailcheck= $this->customer_model->email_unique_check($post['email']);
			if(count($emailcheck)>0){
				$this->session->set_flashdata('errormsg','Email id already exits.please use another Email id');
				redirect('customer/editprofile');
			}
			
		}
		if($post['mobile']!=$customerdetails['cust_mobile']){
			$mobilecheck= $this->customer_model->mobile_unique_check($post['mobile']);
			if(count($mobilecheck)>0){
				$this->session->set_flashdata('errormsg','Mobile Number already exits.please use another Mobile number');
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
		'pincode'=>$post['pincode'],
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
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	if($this->session->userdata('userdetails')=='')
	 {
		$this->session->set_userdata('beforecart',$post);
	 }
	
	if($this->session->userdata('userdetails'))
	 {
		
		
		$customerdetails=$this->session->userdata('userdetails');
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		if(count($cart_items)>0){
			foreach ($cart_items as $list){
				$productsdetails= $this->customer_model->get_product_details($list['item_id']);
				$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
			}
		}
		$post=$this->input->post();
		$products= $this->customer_model->get_product_details($post['producr_id']);
			$qty=$post['qty'];
			//echo '<pre>';print_r($products);exit;
		
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
		if(isset($products['subcategory_id']) && $products['subcategory_id']==53){
			$uksize=$post['sizevalue'];
			$size='';
			
		}else{
			$uksize='';
			$size=$products['internal_memory'];
		}
		
		$adddata=array(
		'cust_id'=>$customerdetails['customer_id'],
		'item_id'=>$post['producr_id'],
		'qty'=>$post['qty'],
		'item_qty'=>$products['item_quantity'],
		'item_price'=>$item_price,
		'total_price'=>$price,
		'commission_price'=>$commission_price,
		'delivery_amount'=>$delivery_charges,
		'seller_id'=>$products['seller_id'],
		'color'=>isset($products['colour'])?$products['colour']:'',
		'size'=>isset($size)?$size:'',
		'uksize'=>isset($uksize)?$uksize:'',
		'category_id'=>$products['category_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo '<pre>';print_r($adddata);exit;
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		if(count($cart_items)>0){
			
				foreach($cart_items as $pids) { 
							
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
 /*onclick purpose*/
 public function onclickaddcart(){
	 $post=$this->input->post();
	 //echo '<pre>';print_r($post);exit;
	if($this->session->userdata('userdetails')=='')
	 {
		$this->session->set_userdata('beforecart',$post);
	 }
	if($this->session->userdata('userdetails'))
	 {
		 
		
		$customerdetails=$this->session->userdata('userdetails');
		
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$products= $this->customer_model->get_product_details($post['producr_id']);
			$qty=$post['qty'];
			
		
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
		'item_qty'=>$products['item_quantity'],
		'item_price'=>$item_price,
		'total_price'=>$price,
		'commission_price'=>$commission_price,
		'delivery_amount'=>$delivery_charges,
		'seller_id'=>$products['seller_id'],
		'color'=>isset($post['colorvalue'])?$post['colorvalue']:'',
		'size'=>isset($size)?$size:'',
		'uksize'=>isset($uksize)?$uksize:'',
		'category_id'=>$products['category_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo '<pre>';print_r($adddata);exit;
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
			if(count($cart_items)>0){
					foreach($cart_items as $pids) { 
								
									$rid[]=$pids['item_id'];
					}
				if(in_array($post['producr_id'],$rid)){
					$delete= $this->customer_model->delete_cart_items($customerdetails['customer_id'],$post['producr_id']);
					$countlist= $this->customer_model->get_cart_products($customerdetails['customer_id']);
					if(count($delete)>0){
						$this->session->set_flashdata('productsuccess','Product Successfully removed to the cart');
						$data['msg']=2;
						$data['count']=count($countlist);							
						echo json_encode($data);
					
					}

				}else{
					
					$save= $this->customer_model->cart_products_save($adddata);
					$countlist= $this->customer_model->get_cart_products($customerdetails['customer_id']);
					if(count($save)>0){
						$this->session->set_flashdata('productsuccess','Product Successfully added to the cart');
						$data['msg']=1;	
						$data['count']=count($countlist);	
						echo json_encode($data);
					

					}
				
				}
			}else{
			
				$save= $this->customer_model->cart_products_save($adddata);
			if(count($save)>0){
				$data['msg']=1;	
				echo json_encode($data);
			

			}
			}
			
			
	
		
	 }else{
		 $data['msg']=0;	
		echo json_encode($data);
	} 
	 
 }
 /*onclick purpose*/
 public function productviewonclickaddcart(){
	 $post=$this->input->post();
	 //echo '<pre>';print_r($post);exit;
	if($this->session->userdata('userdetails')=='')
	 {
		$this->session->set_userdata('beforecart',$post);
	 }
	if($this->session->userdata('userdetails'))
	 {
		 
		
		$customerdetails=$this->session->userdata('userdetails');
		
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$products= $this->customer_model->get_product_details($post['producr_id']);
			$qty=$post['qty'];
			
		
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
		'item_qty'=>$products['item_quantity'],
		'item_price'=>$item_price,
		'total_price'=>$price,
		'commission_price'=>$commission_price,
		'delivery_amount'=>$delivery_charges,
		'seller_id'=>$products['seller_id'],
		'color'=>isset($post['colorvalue'])?$post['colorvalue']:'',
		'size'=>isset($size)?$size:'',
		'uksize'=>isset($uksize)?$uksize:'',
		'category_id'=>$products['category_id'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo '<pre>';print_r($adddata);exit;
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
			if(count($cart_items)>0){
					foreach($cart_items as $pids) { 
								
									$rid[]=$pids['item_id'];
					}
				if(in_array($post['producr_id'],$rid)){
					
						$this->session->set_flashdata('productsuccess','Product already exits');
						$data['msg']=2;
						echo json_encode($data);
					
				

				}else{
					
					$save= $this->customer_model->cart_products_save($adddata);
					$countlist= $this->customer_model->get_cart_products($customerdetails['customer_id']);
					if(count($save)>0){
						$this->session->set_flashdata('productsuccess','Product Successfully added to the cart');
						$data['msg']=1;	
						$data['count']=count($countlist);	
						echo json_encode($data);
					

					}
				
				}
			}else{
				$countlist= $this->customer_model->get_cart_products($customerdetails['customer_id']);
				$save= $this->customer_model->cart_products_save($adddata);
			if(count($save)>0){
				$data['msg']=1;
				$data['count']=count($countlist);					
				echo json_encode($data);
			

			}
			}
			
			
	
		
	 }else{
		 $data['msg']=0;	
		echo json_encode($data);
	} 
	 
 }
 public function orders(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['orders_lists']= $this->customer_model->order_list($customerdetails['customer_id']);
		
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
		
		//echo "bvb";exit;
		$customerdetails=$this->session->userdata('userdetails');
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
		foreach ($data['cart_items'] as $list){
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
			
		}
		//echo '<pre>';print_r($data);exit;
		if(count($data['cart_items'])>0){
		$this->template->write_view('content', 'customer/cart', $data);
		$this->template->render();	
		}else{
			$this->session->set_userdata('pincode','');
			$this->session->set_userdata('time','');
			$this->session->set_flashdata('success','No Item In the cart.');
			redirect('');
		}
		
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
		$data['whistlist_banners']= $this->customer_model->get_whishlist_banners_list();
		//echo count($data['whistlist_items']);
		if(count($data['whistlist_items'])>0){
		$this->template->write_view('content', 'customer/wishlist', $data);
		$this->template->render();
		}else{
			$this->session->set_flashdata('success','No Item In Wishlist.');
			redirect('');
		}
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 } 
 public function updatecart(){
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		foreach ($cart_items as $list){
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
		}
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
			if($post['ajax']==1){
			$data['msg']=1;
			echo json_encode($data);
			}else{
			redirect('customer/cart');
			}			
			
		}
		
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 } 
 public function qtyupdatecart(){
	 if($this->session->userdata('userdetails'))
	 {
		//$data=array();
		$customerdetails=$this->session->userdata('userdetails');
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		foreach ($cart_items as $list){
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
		}
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
			$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
			$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
			$this->load->view('customer/updateqtycart',$data);			
			
		}
		
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	}
	 
 } 
 public function deletecart(){
	 if($this->session->userdata('userdetails'))
	 {
		
		$customerdetails=$this->session->userdata('userdetails');
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		foreach ($cart_items as $list){
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
		}
		$item_id=base64_decode($this->uri->segment(3));
		$id=base64_decode($this->uri->segment(4));
		//echo '<pre>';print_r($item_id);exit; 
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
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		
		if(count($cart_items)<=0){
			$this->session->set_flashdata('success','No Item In the cart.');
			redirect('');
			
		}
		foreach ($cart_items as $list){
			
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
			if($list['qty']==0){
				$this->session->set_flashdata('qtyerror','Please remove Out of stock product in cart then move to next step!');
				redirect('customer/cart');	
			}else if($list['qty']>$productsdetails['item_quantity']){
				$this->session->set_flashdata('qtyerror','Please decrease this '.$productsdetails['item_name'].' product qty lessthan or equal to '.$productsdetails['item_quantity']);
				redirect('customer/cart');	
			}
		}
		//echo '<pre>';print_r($cart_items);
		//exit;
		if(count($cart_items)>0){
			//$data['locationdata'] = $this->home_model->getlocations();
			$data['customerdetail']= $this->customer_model->get_profile_details($customerdetails['customer_id']);
			$data['carttotal_amount']= $this->customer_model->get_cart_total_amount($customerdetails['customer_id']);
			$data['billingaddresslis']= $this->customer_model->get_customer_billing_list($customerdetails['customer_id']);

			//echo '<pre>';print_r($data);exit;
			$this->template->write_view('content', 'customer/billingadrres',$data);
			$this->template->render();
		}else{
			
			redirect('customer/cart');	
		}

		
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
		if(isset($post['billingaddressid']) && $post['billingaddressid']!=''){
			$getaddress= $this->customer_model->get_customer_select_address($post['billingaddressid']);
				$details=array(
				'cust_id'=>$customerdetails['customer_id'],
				'name'=>$getaddress['name'],
				'emal_id'=>$getaddress['emal_id'],
				'mobile'=>$getaddress['mobile'],
				'address1'=>$getaddress['address1'],
				'pincode'=>$getaddress['pincode'],
				'address2'=>$getaddress['address2'],
				'city'=>$getaddress['city'],
				'state'=>$getaddress['state'],
				'area'=>isset($getaddress['area'])?$getaddress['area']:'',
				'create-at'=>date('Y-m-d H:i:s'),
				);
		
		$this->session->set_userdata('billingaddress',$details);
		}else{
		//echo '<pre>';print_r($customerdetails);exit;
		
		 if(isset($post['addressid']) && $post['addressid']!=''){
			 $updtata=array(
			 'title'=>$post['title'],
			'name'=>$post['name'],
			'emal_id'=>$customerdetails['cust_email'],
			'mobile'=>$post['mobile'],
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'pincode'=>$post['pincode'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			);
			$addressupdatedetails= $this->customer_model->update_address_deails($post['addressid'],$updtata);
		}
		 if(isset($post['featurepurpose']) && $post['featurepurpose']!='' && $post['addressid']==0){
			 $savenewadd=array(
			'cust_id'=>$customerdetails['customer_id'],
			'emal_id'=>$customerdetails['cust_email'],
			 'title'=>$post['title'],
			'name'=>$post['name'],
			'mobile'=>$post['mobile'],
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'pincode'=>$post['pincode'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			'create-at'=>date('Y-m-d H:i:s'),
			);
			$addnewadd= $this->customer_model->save_new_address($savenewadd);

			 
		 }
		if($customerdetails['address1']=='' || $customerdetails['address2']==''){
			
			$details=array(
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'pincode'=>$post['pincode'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			'area'=>isset($post['area'])?$post['area']:'',
			);
			$updatedetails= $this->customer_model->update_deails($customerdetails['customer_id'],$details);

		}
		$details=array(
		'cust_id'=>$customerdetails['customer_id'],
		'name'=>$post['name'],
		'emal_id'=>$customerdetails['cust_email'],
		'mobile'=>$post['mobile'],
		'address1'=>$post['address1'],
		'pincode'=>$post['pincode'],
		'address2'=>$post['address2'],
		'city'=>$post['city'],
		'state'=>$post['state'],
		'area'=>isset($post['area'])?$post['area']:'',
		'create-at'=>date('Y-m-d H:i:s'),
		);
		
	
		
		//echo '<pre>';print_r($details);exit;
		$this->session->set_userdata('billingaddress',$details);

		}		
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
		
		/* out of stock products pupose*/
		$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		
		if(count($cart_items)<=0){
			$this->session->set_flashdata('success','No Item In the cart.');
			redirect('');
			
		}
		foreach ($cart_items as $list){
			
			$productsdetails= $this->customer_model->get_product_details($list['item_id']);
			$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
			if($list['qty']==0){
				$this->session->set_flashdata('qtyerror','Please remove Out of stock product in cart then move to next step!');
				redirect('customer/cart');	
			}else if($list['qty']>$productsdetails['item_quantity']){
				$this->session->set_flashdata('qtyerror','Please decrease this '.$productsdetails['item_name'].' product qty lessthan or equal to '.$productsdetails['item_quantity']);
				redirect('customer/cart');	
			}
		}
		/* out of stock products pupose*/
		
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
						'payment_type'=>1,
						'amount_status'=>1,
						'created_at'=>date('Y-m-d H:i:s'),
					);
				$saveorder= $this->customer_model->save_order_success($ordersucess);
				$getsaveorderstatus= $this->customer_model->get_status_save_order_success($saveorder);
				
				//echo '<pre>';print_r($saveorder);exit;
				/* order sms*/
				/*$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$msg='Order received:we have received your order for '.$_POST['productinfo'].' with order id '.$saveorder.' Amounting to '.$_POST['net_amount_debit'].' You can manage your order at http://cartinhours.com';
				$ch = curl_init();
					 curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$_POST['phone'].'&text='.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
					curl_close ($ch);
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
						'payment_type'=>$getsaveorderstatus['payment_type'],
						'amount_status_paid'=>$getsaveorderstatus['amount_status'],
						'commission_price'=>$items['commission_price'],
						'customer_email'=>$customerdetails['cust_email'],
						'customer_phone'=>$billingaddress['mobile'],
						'customer_address'=>$billingaddress['address1'].' '.$billingaddress['address2'],
						'pincode'=>$billingaddress['pincode'],
						'city'=>$billingaddress['city'],
						'state'=>$billingaddress['state'],
						'order_status'=>1,
						'color'=>$items['color'],
						'size'=>$items['size'],
						'uksize'=>$items['uksize'],
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
						'city'=>$billingaddress['city'],
						'pincode'=>$billingaddress['pincode'],
						'state'=>$billingaddress['state'],
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
 
 
 public function orderpaymenttype(){
	 if($this->session->userdata('userdetails'))
	 {
		$billingaddress=$this->session->userdata('billingaddress');	
		$customerdetails=$this->session->userdata('userdetails');
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
				$ordersucess=array(
					'customer_id'=>$customerdetails['customer_id'],
					'transaction_id'=>'',
					'net_amount'=>'',
					'total_price'=>'',
					'discount'=>'',
					'bank_reference_number'=>'',
					'payment_mode'=>'',
					'card_number'=>'',
					'email'=>'',
					'phone'=>'',
					'order_status'=>1,
					'hash'=>'',
					'payment_type'=>$post['payment'],
					'amount_status'=>0,
					'created_at'=>date('Y-m-d H:i:s'),
				);
				$saveorder= $this->customer_model->save_order_success($ordersucess);
				$getsaveorderstatus= $this->customer_model->get_status_save_order_success($saveorder);
				$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
				
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
						'payment_type'=>$getsaveorderstatus['payment_type'],
						'amount_status_paid'=>$getsaveorderstatus['amount_status'],
						'customer_email'=>$customerdetails['cust_email'],
						'customer_phone'=>$billingaddress['mobile'],
						'customer_address'=>$billingaddress['address1'].' '.$billingaddress['address2'],
						'area'=>$billingaddress['area'],
						'city'=>$billingaddress['city'],
						'pincode'=>$billingaddress['pincode'],
						'state'=>$billingaddress['state'],
						'order_status'=>1,
						'color'=>$items['color'],
						'size'=>$items['size'],
						'uksize'=>$items['uksize'],
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
						'city'=>$billingaddress['city'],
						'pincode'=>$billingaddress['pincode'],
						'state'=>$billingaddress['state'],
						'area'=>$billingaddress['area'],
						'create-at'=>date('Y-m-d H:i:s'),
					);
					$saveorderbillingaddress= $this->customer_model->save_order_billing_address($orderbilling);
					
				/*for billing address*/
				$this->session->set_flashdata('paymentsucess','Payment successfully completed!');
				redirect('customer/ordersuccess/'.base64_encode($saveorder));
	
	  
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
		if(count($cart_items)<=0){
			$this->session->set_flashdata('success','No Item In the cart.');
			redirect('');
			
		}
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
							//echo '<pre>';print_r($data['order_status_details']);
							if($data['order_status_details']['category_id']==19){
								if($data['order_status_details']['subcategory_id']==53){
									$data['color_list']= $this->customer_model->get_color_lists($data['order_status_details']['item_id']);
									$data['uksize_list']= $this->customer_model->get_uksizes_lists($data['order_status_details']['item_id']);
									$data['size_list']=array();
								}else{
									$data['color_list']= $this->customer_model->get_color_lists($data['order_status_details']['item_id']);
									$data['size_list']= $this->customer_model->get_sizes_lists($data['order_status_details']['item_id']);
									$data['uksize_list']=array();
								}
							}
							$data['product_details']= $this->customer_model->get_product_details_for_subcats($data['order_status_details']['item_id']);
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
	 
	 if($this->session->userdata('userdetails')=='')
	 {
		$post=$this->input->post();
		$post['wish']=1;
		$this->session->set_userdata('beforewishlist',$post);
	 }
	
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
	
		
	 //echo $this->uri->segment(1);exit;
	 $redirection_url=$this->agent->referrer();
	 $this->session->set_userdata('redirect_urls',$redirection_url);
		$test=$this->session->userdata('userdetails');
	 //echo '<pre>';print_r($test);exit;
	 if($this->session->userdata('userdetails'))
	  {
		redirect('');
	 }else{
		$this->load->helper('cookie');

		$this->input->cookie('username', TRUE);
		$data['username'] = get_cookie('username');
		$this->input->cookie('password', TRUE);
		$data['password'] = get_cookie('password');
		$this->input->cookie('remember', TRUE);
		$data['remember'] = get_cookie('remember');
					
		
		$this->load->view( 'customer/register',$data); 
	 }	

	
 } 
 public function registerpost(){
	
	$post=$this->input->post();
	$adddata=$this->session->userdata('beforecart');
	$adddwish=$this->session->userdata('beforewishlist');
	$emailcheck = $this->customer_model->email_check($post['email']);
	$mobilecheck = $this->customer_model->mobile_check($post['mobile']);
	//echo '<pre>';print_r($mobilecheck);
	if(count($emailcheck)==0 && count($mobilecheck)==0){
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
			/*addtocartfunctionality*/
					$post=$adddata;
					//echo '<pre>';print_r($post);
					///echo '<pre>';print_r($adddata);exit;
			
					if(count($adddata)>0){
					$customerdetails=$this->session->userdata('userdetails');
					$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
					if(count($cart_items)>0){
						foreach ($cart_items as $list){
							$productsdetails= $this->customer_model->get_product_details($list['item_id']);
							$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
						}
					}
					$products= $this->customer_model->get_product_details($adddata['producr_id']);
						$qty=$adddata['qty'];
						//echo '<pre>';print_r($products);exit;
					
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
							if($products['subcategory_id']==53){
							$uksize=$adddata['sizevalue'];
							$size='';
						}else{
							$uksize='';
							$size=$adddata['sizevalue'];
						}
					
					$adddata=array(
					'cust_id'=>$customerdetails['customer_id'],
					'item_id'=>$adddata['producr_id'],
					'qty'=>$adddata['qty'],
					'item_qty'=>$products['item_quantity'],
					'item_price'=>$item_price,
					'total_price'=>$price,
					'commission_price'=>$commission_price,
					//'delivery_amount'=>$delivery_charges,
					'seller_id'=>$products['seller_id'],
					'color'=>isset($adddata['colorvalue'])?$adddata['colorvalue']:'',
					'uksize'=>isset($uksize)?$uksize:'',
					'size'=>isset($size)?$size:'',
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
			
			
					}else if(isset($adddwish) && $adddwish!=''){
						//echo '<pre>';print_r($adddwish);exit;
						$customerdetails=$this->session->userdata('userdetails');
							$detailsa=array(
							'cust_id'=>$customerdetails['customer_id'],
							'item_id'=>$adddwish['item_id'],
							'create_at'=>date('Y-m-d H:i:s'),
							'yes'=>1,
							);
							$whishlist = $this->customer_model->get_whishlist_list($customerdetails['customer_id']);
							if(count($whishlist)>0){
									foreach($whishlist as $lists) { 
												
													$itemsids[]=$lists['item_id'];
									}
								if(in_array($adddwish['item_id'],$itemsids)){
									$removewhislish=$this->customer_model->remove_whishlist($customerdetails['customer_id'],$adddwish['item_id']);
									if(count($removewhislish)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully Removed to Whishlist');
									redirect('customer/wishlist');
									}
								
								}else{
									$addwhishlist = $this->customer_model->add_whishlist($detailsa);
									if(count($addwhishlist)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully added to Whishlist');
									redirect('customer/wishlist');
									}
								}
								
							}else{
								$addwhishlist = $this->customer_model->add_whishlist($detailsa);
									if(count($addwhishlist)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully added to Whishlist');
									redirect('customer/wishlist');
									}
								
							}
					}else{
						$this->session->set_flashdata('sucesss',"Successfully Login");
						redirect('');
					}
					/*addtocartfunctionality*/
			
			}
		}else{
			
			$this->session->set_flashdata('error',"Password and confirm password do not match");
			redirect('customer');
		}
		
	}else{
		
			if(count($mobilecheck)>0 && count($emailcheck)>0){
				$this->session->set_flashdata('error',"E-mail and Mobile Number already exists.Please use another E-mail and Mobile Number");
			}else if(count($emailcheck)>0){
					$this->session->set_flashdata('error',"E-mail already exists.Please use another E-mail");
			}else if(count($mobilecheck)>0){
				$this->session->set_flashdata('error',"Mobile Number already exists.Please use another Mobile Number");
			}			
		
	
		redirect('customer');	
		
	}


	
 } 
 public function loginpost(){
	 
	$post=$this->input->post();
	$uridata=$this->session->userdata('redirect_urls');
	$adddata=$this->session->userdata('beforecart');
	$adddwish=$this->session->userdata('beforewishlist');
	//echo '<pre>';print_r($uridata);exit;
	$uri_path = parse_url($uridata, PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);

	
	if(isset($uri_segments[3]) && $uri_segments[3]=='resetpassword' || isset( $uri_segments[2]) && $uri_segments[2]=='resetpassword'){
		$session_url='';
	}else if(isset($uri_segments[3])  && $uri_segments[3] =='forgotpassword' || isset( $uri_segments[2]) && $uri_segments[2]=='forgotpassword'){
		$session_url='';
	}else if(isset($uri_segments[3])  && $uri_segments[3] =='locationsearch' || isset( $uri_segments[2]) && $uri_segments[2]=='locationsearch'){
		$session_url='';
	}else if(isset($uridata)  && $uridata =='https://www.facebook.com/' || isset( $uridata) && $uridata=='https://in.linkedin.com/'){
		$session_url='';
	}else{
		$session_url=$this->session->userdata('redirect_urls');
	}
	
	$pass=md5($post['password']);
	$logindetails = $this->customer_model->login_details($post['email'],$pass);
		if(count($logindetails)>0)
		{			
			if($this->session->userdata('location_ids')!=''){
					$loacationid= $this->session->userdata('location_ids');
					$updatearea = $this->customer_model->update_sear_area($logindetails['customer_id'],$loacationid);	
				if(count($updatearea)>0){
					
					if(isset($post['remember']) && $post['remember']==1){
					$usernamecookie = array('name' => 'username','value' => $post["email"],'expire' => time()+86500,'path'   => '/');
					$passwordcookie = array('name' => 'password','value' => $post["password"],'expire' => time()+86500,'path'   => '/');
					$remembercookie = array('name' => 'remember','value' => $post["remember"],'expire' => time()+86500,'path'   => '/');
					$this->input->set_cookie($usernamecookie);
					$this->input->set_cookie($passwordcookie);
					$this->input->set_cookie($remembercookie);
					$this->load->helper('cookie');
					$this->input->cookie('username', TRUE);

					}else{
						$this->load->helper('cookie');
						delete_cookie('username');
						delete_cookie('password');
						delete_cookie('remember');
					}
					$details = $this->customer_model->get_profile_details($logindetails['customer_id']);
					$this->session->set_userdata('userdetails',$details);
				}
			}else{
				
				
				if(isset($post['remember']) && $post['remember']==1){
				$usernamecookie = array('name' => 'username','value' => $post["email"],'expire' => time()+86500,'path'   => '/');
				$passwordcookie = array('name' => 'password','value' => $post["password"],'expire' => time()+86500,'path'   => '/');
				$remembercookie = array('name' => 'remember','value' => $post["remember"],'expire' => time()+86500,'path'   => '/');
				$this->input->set_cookie($usernamecookie);
				$this->input->set_cookie($passwordcookie);
				$this->input->set_cookie($remembercookie);
				$this->load->helper('cookie');
				$this->input->cookie('username', TRUE);
				
				}else{
					$this->load->helper('cookie');
					delete_cookie('username');
						delete_cookie('password');
						delete_cookie('remember');
				}
				$logindetails = $this->customer_model->login_details($post['email'],$pass);
				$this->session->set_userdata('userdetails',$logindetails);				
			}
			//echo '<pre>';print_r($logindetails);exit;
			
			/*addtocartfunctionality*/
					$post=$adddata;
					//echo '<pre>';print_r($post);
					///echo '<pre>';print_r($adddata);exit;
			
					if(count($adddata)>0){
					$customerdetails=$this->session->userdata('userdetails');
					$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
					if(count($cart_items)>0){
						foreach ($cart_items as $list){
							$productsdetails= $this->customer_model->get_product_details($list['item_id']);
							$this->customer_model->cart_item_qty_update($list['item_id'],$productsdetails['item_quantity']);
						}
					}
					$products= $this->customer_model->get_product_details($adddata['producr_id']);
						$qty=$adddata['qty'];
						//echo '<pre>';print_r($products);exit;
					
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
						
						
						if($products['subcategory_id']==53){
							$uksize=$post['sizevalue'];
							$size='';
						}else{
							$uksize='';
							$size=$post['sizevalue'];
						}
					$adddata=array(
					'cust_id'=>$customerdetails['customer_id'],
					'item_id'=>$adddata['producr_id'],
					'qty'=>$adddata['qty'],
					'item_qty'=>$products['item_quantity'],
					'item_price'=>$item_price,
					'total_price'=>$price,
					'commission_price'=>$commission_price,
					//'delivery_amount'=>$delivery_charges,
					'seller_id'=>$products['seller_id'],
					'color'=>isset($adddata['colorvalue'])?$adddata['colorvalue']:'',
					'size'=>isset($size)?$size:'',
					'uksize'=>isset($uksize)?$uksize:'',
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
			/*addtocartfunctionality*/
			
					}else if(isset($adddwish) && $adddwish!=''){
						//echo '<pre>';print_r($adddwish);exit;
						$customerdetails=$this->session->userdata('userdetails');
							$detailsa=array(
							'cust_id'=>$customerdetails['customer_id'],
							'item_id'=>$adddwish['item_id'],
							'create_at'=>date('Y-m-d H:i:s'),
							'yes'=>1,
							);
							$whishlist = $this->customer_model->get_whishlist_list($customerdetails['customer_id']);
							if(count($whishlist)>0){
									foreach($whishlist as $lists) { 
												
													$itemsids[]=$lists['item_id'];
									}
								if(in_array($adddwish['item_id'],$itemsids)){
									$removewhislish=$this->customer_model->remove_whishlist($customerdetails['customer_id'],$adddwish['item_id']);
									if(count($removewhislish)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully Removed to Whishlist');
									redirect('customer/wishlist');
									}
								
								}else{
									$addwhishlist = $this->customer_model->add_whishlist($detailsa);
									if(count($addwhishlist)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully added to Whishlist');
									redirect('customer/wishlist');
									}
								}
								
							}else{
								$addwhishlist = $this->customer_model->add_whishlist($detailsa);
									if(count($addwhishlist)>0){
									$this->session->set_flashdata('productsuccess','Product Successfully added to Whishlist');
									redirect('customer/wishlist');
									}
								
							}
					}else{
						$this->session->set_flashdata('sucesss',"Successfully Login");
						redirect($session_url);
					}
			
			
			
			
			
			
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
		//echo '<pre>';print_r($post);exit;
	$forgotpass = $this->customer_model->forgot_login($post['emailaddress']);
	//echo '<pre>';print_r($forgotpass);exit;
		if(count($forgotpass)>0)
		{			
			
			
			
			$email =filter_var($post['emailaddress'], FILTER_VALIDATE_EMAIL);
				if($email==''){
					$mobile=$post['emailaddress'];
					$email='';
				}else{
					$mobile='';
					$email=$post['emailaddress'];
				}
				
				$six_digit_random_number = mt_rand(100000, 999999);
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				if($mobile!=''){
					
					
					$msg=$six_digit_random_number;
					/*$ch = curl_init();
					 curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobile.'&text=Your cartinhour verification code is '.$msg.'&priority=ndnd&stype=normal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//echo '<pre>';print_r($ch);exit;
					$server_output = curl_exec ($ch);
					curl_close ($ch);*/
					
					
				$this->customer_model->login_verficationcode_mobile_save($mobile,$forgotpass['customer_id'],$six_digit_random_number);
				redirect( 'customer/resetpassword/'.base64_encode($mobile).'/'.base64_encode($forgotpass['customer_id'])); 
					
				}else if(isset($email) && $email!=''){
						$msg='Greetings! You are just a step away from accessing your Cartinhours account We are sharing a verification code to access your account. Once you have verified the code, you will be prompted to set a new password immediately. This is to ensure that only you have access to your account. '.$six_digit_random_number;
						$this->load->library('email');
						$this->email->from('admin@cartinhours.com', 'CartInHours');
						$this->email->to($email);
						$this->email->subject('CartInHours - Forgot Password');
						$html =$msg;
						//echo $html;exit;
						$this->email->message($html);
						if($this->email->send()){
							$this->customer_model->login_verficationcode_save($email,$forgotpass['customer_id'],$six_digit_random_number);
						}else{
						$this->customer_model->login_verficationcode_save($email,$forgotpass['customer_id'],$six_digit_random_number);

						}
						redirect( 'customer/resetpassword/'.base64_encode($email).'/'.base64_encode($forgotpass['customer_id'])); 
				}
			
			
		}else{
			$this->session->set_flashdata('error',"Invalid Email Id / Mobile number!. Please enter registered email id / Mobile number");
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
			//echo $this->db->last_query();exit;
			$email =filter_var(base64_decode($post['email']), FILTER_VALIDATE_EMAIL);
				if($email==''){
					$mobile=base64_decode($post['email']);
					$otpverification = $this->customer_model->check_opt_mobile($mobile,$post['otpcode']);
						if(count($otpverification)>0)
						{
							$users = $this->customer_model->update_password_mobile($post['setpassword'],base64_decode($post['cust_id']),base64_decode($post['email']));
							//echo $this->db->last_query();exit;
							//echo '<pre>';print_r($users);exit;
							if(count($users)>0)
							{
								$this->customer_model->update_password_remove_otp(base64_decode($post['cust_id']),'');

								$this->session->set_flashdata("forsuccess","Password successfully Updated!");
								redirect('customer');
							}
						}else{
						 $this->session->set_flashdata("error","Verification code is Wrong.Please try again!");
						 redirect('customer/resetpassword/'.$post['email'].'/'.$post['cust_id']);
						}
				
				}else{
					$email=base64_decode($post['email']);
					$otpverification = $this->customer_model->check_opt(base64_decode($post['email']),$post['otpcode']);
					if(count($otpverification)>0)
					{
						$users = $this->customer_model->update_password($post['setpassword'],base64_decode($post['cust_id']),base64_decode($post['email']));
						//echo '<pre>';print_r($users);exit;
						if(count($users)>0)
						{
						$this->load->library('email');
						$this->email->from('admin@cartinhours.com', 'CartInHours');
						$this->email->to(base64_decode($post['email']));
						$this->email->subject('CartInHours - Forgot Password');
						$html = "Pasword Successfully changed";
						//echo $html;exit;
						$this->email->message($html);
						$this->email->send();
						
							$this->customer_model->update_password_remove_otp(base64_decode($post['cust_id']),'');
							$this->session->set_flashdata("forsuccess","Password successfully Updated!");
							redirect('customer');
						}
					}else
					{
						$this->session->set_flashdata("error","Verification code is Wrong.Please try again!");
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
		
		//$userinfo = $this->session->userdata('userdetails');
		//$this->customer_model->update_before_loctionsearch($userinfo['customer_id'],'');
		$data = array('admin_id'=> '','admin_name' => '','user_email' => '','seller_id'  => '','seller_name' => '','seller_email' => '','loggedin'  => FALSE);
		$this->session->set_userdata($data);
		
		$beforecart =$this->session->userdata('beforecart');
		$this->session->userdata('location_area');
		$this->hybridauthlib->logoutAllProviders();
        $this->session->unset_userdata($beforecart);
        $this->session->unset_userdata('location_area');
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('');
	}



	
	public function password()
	{
		
		//echo $this->uri->segment(5);exit;
		if($this->uri->segment(5)!=''){
		$data['cust_id'] = $this->uri->segment(3);
		$data['cust_email']= $this->uri->segment(4);
		$this->load->view('customer/fbresetpassword',$data);
		}else{
		$data['cust_id'] = base64_decode($this->uri->segment(4));
		$data['cust_email']= base64_decode($this->uri->segment(3));
		$this->load->view('customer/setpassword',$data);
		}
		
	}
	public function facebookresetpasswordpost(){
	
			$post=$this->input->post();
				if(md5($post['newpassword'])==md5($post['confirmpassword']))
						{
							$fbdetails = $this->customer_model->get_customer_fbdetails(base64_decode($post['cust_id']),base64_decode($post['email']));
							if(count($fbdetails)>0){
								$users = $this->customer_model->socialsetpassword_user(base64_decode($post['cust_id']),md5($post['confirmpassword']),1);
								if(count($users)>0)
								{
								$getdetails = $this->customer_model->get_customer_details(base64_decode($post['cust_id']));	
								$this->session->set_userdata('userdetails',$getdetails);
								$this->session->set_flashdata("forsuccess","Password successfully Updated!");
								redirect('customer');
								}else{
									$this->session->set_flashdata("error","technical problem will occurs please try again.");
									redirect('customer/password/'.$post['cust_id'].'/'.$post['email'].'/'.base64_encode('fb'));
								}
								
							}else{
								$this->session->set_flashdata("error","Yor Email Id was not matching in records.");
								redirect('customer/password/'.$post['cust_id'].'/'.$post['email'].'/'.base64_encode('fb'));
							}
							
						}else{
						 $this->session->set_flashdata("error","New password and confirm password was not matching");
						 redirect('customer/password/'.$post['cust_id'].'/'.$post['email'].'/'.base64_encode('fb'));
						}
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
		
		
		$post=$this->input->post();
		$type=base64_decode($this->uri->segment(3));
		$location=base64_decode($this->uri->segment(4));
		$ids=$this->session->userdata('location_ids');
		if($type=='top' && $location!='location'){
		$data['products'] = $this->home_model->get_top_offers($location);
		}else{
			$data['products'] = $this->home_model->get_search_top_offers($ids);
		}
		if($type=='tren' && $location!='location'){
			$data['products'] = $this->home_model->get_trending_products($location);
		}else{
			$data['products'] = $this->home_model->get_search_trending_products($ids);
		}
		if($type=='offer' && $location!='location'){
			$data['products'] = $this->home_model->get_offer_for_you($location);
		}else{
			$data['products'] = $this->home_model->get_search_offer_for_you($ids);
		}
		if($type=='deal' && $location!='location'){
			$data['products'] = $this->home_model->get_deals_of_the_day($location);
		}else{
			$data['products'] = $this->home_model->get_search_deals_of_the_day($ids);
		}
		if($type=='season' && $location!='location'){
			$data['products'] = $this->home_model->get_season_offers($location);
		}else{
			$data['products'] = $this->home_model->get_search_season_sales($ids);
		}
		$data['type'] = $type;
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
		$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
		if(count($wishlist_ids)>0){ 
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	
		}
		//echo '<pre>';print_r($data);exit;
		$this->template->write_view('content', 'customer/seemore',$data);
		$this->template->render();
	}
	
	public function refundpost(){
	 
	if($this->session->userdata('userdetails'))
	{
		
		$post=$this->input->post();
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
				if(isset($post['size']) && $post['size']!=''){
					$size=$post['size'];
					$uksize='';
				}else{
					$size='';
					$uksize=$post['uksize'];
				}
				$exchangedetails=array(
						'color'=>$post['color'],
						'size'=>isset($size)?$size:'',
						'uksize'=>isset($uksize)?$uksize:'',
						'region'=>isset($post['region'])?$post['region']:'',
						'status_refund'=>$refundtype1,
						'update_time'=>date('Y-m-d H:i:s A'),
						);
						//echo '<pre>';print_r($exchangedetails);exit;
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
 public function nearstores(){
	
	  $locationdatadetails=$this->session->userdata('location_ids');
	 
	
	
	foreach ($locationdatadetails as $list){
		if($list!=''){
			$details=$this->customer_model->get_seller_details($list);
			
			if(count($details)>0){
				foreach ($details as $lis){
				//echo '<pre>';print_r($lis);exit;
				$data['seller_list'][$lis['seller_id']]=$lis;
				$data['seller_list'][$lis['seller_id']]['avg']=$this->customer_model->product_reviews_avg($lis['seller_id']);
				$data['seller_list'][$lis['seller_id']]['categories']=$this->customer_model->product_categories_list($lis['seller_id']);
				
				}
				
			}
		
		
		}	
	}
	if(isset($data) && $data!=''){
		$this->template->write_view('content', 'customer/nearstores',$data);
	}else{
		$data['seller_list']=array();
		$this->template->write_view('content', 'customer/nearstores',$data);
	}
	
	$this->template->render(); 
 }
 public function productlist(){
	 $sid=base64_decode($this->uri->segment(3));
	 $data['seller_cat_list']= $this->customer_model->get_seller_category_details($sid);
	//echo '<pre>';print_r($data['seller_cat_list']);exit;
	$this->template->write_view('content', 'customer/productlist',$data);
	$this->template->render(); 
 }
 public function subscribe(){
	 if($this->session->userdata('userdetails'))
	{
			 $post=$this->input->post();
			 $emailcheck=$this->customer_model->add_subscribe_customer($post['newsletter1']);
			 if(count($emailcheck)>0){
				 $addsubscribe=$this->customer_model->update_subscribe_customer($emailcheck['customer_id'],1);
				 if(count($addsubscribe)>0){
					 $this->session->set_flashdata('successmsg','Your query submitted successfully');
					 redirect('');
					 
				 }else{
					  $this->session->set_flashdata('errormsg','Technical problem will occurred. please try again');
					  redirect('');
				 }
				 
			 }else{
				$this->session->set_flashdata('errormsg','Your enter Wrong email id . Please enter valid email id');
				redirect('');
			 }
		 
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	 }

	 
 }
 public function getbillingaddress(){
	 
	  $customerdetails=$this->session->userdata('userdetails');
	  $post=$this->input->post();
	  $address=$this->customer_model->get_customer_billingaddress($post['addid'],$customerdetails['customer_id']);
		if(count($address)>0){
			$data['msg']=1;
			$data=$address;							
			echo json_encode($data);
		}else{
			$data['msg']=0;
			echo json_encode($data);
		}
 } 
 public function removebillingaddress(){
	 
	  $customerdetails=$this->session->userdata('userdetails');
	  $post=$this->input->post();
	  $deleteaddress=$this->customer_model->remove_customer_billingaddress($post['addid'],$customerdetails['customer_id']);
		if(count($deleteaddress)>0){
			$data['msg']=1;
			echo json_encode($data);
		}else{
			$data['msg']=0;
			echo json_encode($data);
		}
 }
  public function contactus(){
	  $this->template->write_view('content', 'customer/contactus');
	  $this->template->render(); 
  }

  public function contactuspost(){
	  $customerdetails=$this->session->userdata('userdetails');
	  $post=$this->input->post();
	  $details=array(
	  'customer_id'=>isset($customerdetails['customer_id'])?$customerdetails['customer_id']:'',
	  'name'=>$post['name'],
	  'email'=>$post['email'],
	  'subject'=>$post['Subject'],
	  'message'=>$post['message'],
	  'create_at'=>date('Y-m-d H:i:s'),
	  );
	   $savecontactus=$this->customer_model->save_customer_contactus($details);
	   if(count($savecontactus)>0){
		   $this->session->set_flashdata('success','Your query submitted successfully');
			redirect('customer/contactus'); 
	   }else{
			$this->session->set_flashdata('qtyerror','Technical problem will occurred. please try again');
			redirect('customer/contactus'); 
	   }

  }

public function aboutus(){
	  $this->template->write_view('content', 'customer/aboutus');
	  $this->template->render(); 
  }


}		
?>