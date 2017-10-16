<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Users extends Admin_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->model('admin/user_model');
		$this->load->helper(array('url', 'html'));
		$this->load->library('email');

	}


	public function index()
	{
		$data['users'] = $this->user_model->get_all_customers();
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'admin/users/index',$data);
		$this->template->render();
	}
	public function create()
	{
		$data['roles'] = $this->user_model->roles_get();
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'admin/users/add' ,$data);
		$this->template->render();
	}

	public function insert()
	{
		$post=$this->input->post();
		$data = array(
			'cust_firstname'=>$post['first_name'],
			'cust_lastname'=>$post['last_name'],
			'cust_email'=>$post['email_id'],
			'role_id'=>$post['role_id'],
			'status'=>1,
			'create_at'=>date('Y-m-d H:i:s'),
		);
		//echo "<pre>";print_r($data);exit;
		$success=$this->user_model->insert_users($data);
				if(count($success)>0)
				{
					
					$details = $this->user_model->get_user_details($success);	
					$this->session->set_userdata('user_details',$details);
					//echo '<pre>';print_r($details);exit;
					//$from_email = 'mails@cartinhour.com';
		 			//$subject = 'User Registraion';
		 			//$message = "dummy Content";
		 			$email = $this->input->post('email_id');
		 			//print_r($email);exit;
		 			$link = 'Click on this link - <a href="http://localhost/cartinhour/customer/password/'.base64_encode($details['cust_email']).'/'.base64_encode($details['customer_id']).'">http://localhost/cartinhour/customer/password/'.base64_encode($details['cust_email']).'/'.base64_encode($details['customer_id']).'</a>';
		 			//echo '<pre>';print_r($link);exit;
		 			//send mail
		 			$this->email->from($from_email, 'CartinHours');
		 			$this->email->to($this->input->post('email_id'));
		 			$this->email->subject($subject);
		 			$this->email->message($link);
		 			$this->email->send();
					$this->session->set_flashdata('message','successfully added');
					redirect('admin/users');
				}
				else
				{
					$this->session->set_flashdata('message','Some error are occured.');
					redirect('admin/users'); 
				}

	}
	
	public function delemp()
	{
		
		$code = $_GET['id'];
		$arr = explode('__',$code);
		$cid = base64_decode($arr[0]);
		$status = base64_decode($arr[1]);
		if($status==1){
		$status=0;
		}else{
		$status=1;
		}
		$customerstatus= $this->user_model->deletecustomerdata($cid,$status);
		if(count($success)>0)
				{
					if($status==1){
						$this->session->set_flashdata('sucesmsg',"Employee successfully Activate");
					}else{
						$this->session->set_flashdata('sucesmsg',"Employee successfully deactivated.");
					}
					redirect('admin/users');
				}else{
					$this->session->set_flashdata('errormsg',"Employee successfully deactivated.");
					redirect('admin/users');
				}
	 }


	// public function set_password($code)
	// {
	// 	//$cst_id = $this->uri->segment(4);
	// 	//print_r($cst_id);exit;
	// 	$this->load->view('admin/users/setpassword');
	// }

	// public function updatepassword()
	// {
	// 	$cst_id = $this->uri->segment(4);
	// 	$post=$this->input->post();
	// 	$data = array(
	// 		'customer_id'=>$cst_id,
	// 		'cust_password'=>$post['password'],
	// 	);
	// 	print_r($data);exit;
		 
	// }
}