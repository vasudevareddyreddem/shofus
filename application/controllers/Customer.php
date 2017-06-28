<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Customer extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url', 'html'));
			$this->load->library('session');
			$this->load->helper(array('url','html','form'));
				$this->load->library('email');
			$this->load->model('customer_model'); 
			
 }
 public function addcart(){
	 
	if($this->session->userdata('userdetails'))
	 {
		$post=$this->input->post();
		$customerdetails=$this->session->userdata('userdetails');
		//echo '<pre>';print_r($post);
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
			$this->session->set_flashdata('error','Product already Exits');
			redirect('category/productview/'.base64_encode($post['producr_id']));
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
		$customerdetails=$this->session->userdata('userdetails');
		$data['cart_items']= $this->customer_model->get_cart_products($customerdetails['customer_id']);
		$this->template->write_view('content', 'customer/cart', $data);
		$this->template->render();
	 
 }
 public function checkout(){
	 
	$this->template->write_view('content', 'customer/billingadrres', $data);
	$this->template->render();
	 
 }
 public function index(){
	
	 $test=$this->session->userdata('userdetails');
	 //echo '<pre>';print_r($test);exit;
	 // if($this->session->userdata('userdetails'))
	 // {
		// redirect('');
	 //}else{
		$this->load->view( 'customer/register'); 
	 //}	

	
 } 
 public function registerpost(){
	
	$post=$this->input->post();
	///echo '<pre>';print_r($post);exit;
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
			);
			$customerdetails = $this->customer_model->save_customer($details);
			
			if(count($customerdetails)>0){
			$this->session->set_userdata('userdetails',$details);
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
	//echo '<pre>';print_r($post);
	$pass=md5($post['password']);
	$logindetails = $this->customer_model->login_details($post['email'],$pass);
	//echo '<pre>';print_r($logindetails);exit;
		if(count($logindetails)>0)
		{
			$this->session->set_userdata('userdetails',$logindetails);
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
 

	
	
}
?>