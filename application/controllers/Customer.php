<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Customer extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
				$this->load->library('email');
			$this->load->model('customer_model'); 
			
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
		//echo '<pre>';print_r($_FILES);
		
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
		//'cust_email'=>$post['email'],
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
		//echo '<pre>';print_r($post);exit;
		$adddata=array(
		'cust_id'=>$customerdetails['customer_id'],
		'item_id'=>$post['producr_id'],
		'qty'=>$post['qty'],
		'create_at'=>date('Y-m-d H:i:s'),
		);
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		
			foreach($data['cart_items'] as $pids) { 
						
							$rid[]=$pids['item_id'];
			}
		if(in_array($post['producr_id'],$rid)){
			
			if(isset($post['category_id']) && $post['category_id']=!'' ){
				$this->session->set_flashdata('adderror','Product already Exits');
				redirect('category/view/'.base64_encode($post['category_id']));
				
			}else if(isset($post['wishlist']) && $post['wishlist']=!'' ){
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
 public function cart(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
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
		$update= $this->customer_model->update_cart_qty($customerdetails['customer_id'],$post['product_id'],$post['qty']);
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
		$details=array(
		'cust_id'=>$customerdetails['customer_id'],
		'name'=>$post['name'],
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
		$this->template->write_view('content', 'customer/payment');
		$this->template->render();
	 
	 
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
			);
			$customerdetails = $this->customer_model->save_customer($details);
			
			if(count($customerdetails)>0){
			$getdetails = $this->customer_model->get_customer_details($customerdetails);	
			$this->session->set_userdata('userdetails',$getdetails);
			$this->session->set_flashdata('sucesss',"Successfully registered");
			redirect('');
			}
		}else{
			$this->session->set_flashdata('error',"Password and confirm password was not matching");
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
			$userdetails = $this->customer_model->getcustomer_oldpassword($customerdetail['customer_id']);
			
			$currentpasswords=$userdetails['cust_password'];
			if($currentpostpassword == $currentpasswords ){
				if($newpassword == $conpassword){
						$this->load->model('users_model');
						$passwordchange = $this->customer_model->set_password($customerdetail['customer_id'],$conpassword);
						//echo $this->db->last_query();exit;
						if (count($passwordchange)>0)
							{
								$this->session->set_flashdata('updatpassword',"Password successfully changed!");
								redirect('customer/changepassword');
							}else{
								$this->session->set_flashdata('passworderror',"Something went wrong in change password process!");
								redirect('customer/changepassword');
							}
				}else{
					$this->session->set_flashdata('passworderror',"New password and confirm password was not matching");
					redirect('customer/changepassword');
				}
			}else{
					$this->session->set_flashdata('passworderror',"Your current password is incorrect. Please try again.");
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
	
	
}
?>