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
		$data['roles'] = $this->user_model->roles_get();
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'admin/users/index',$data);
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

		);
		//echo "<pre>";print_r($data);exit;
		$success=$this->user_model->insert_users($data);
				if(count($success)>0)
				{
					$this->session->set_userdata('customer_id',$success);
					//echo '<pre>';print_r($success);exit;
					//$from_email = 'mails@cartinhour.com';
		 			//$subject = 'User Registraion';
		 			//$message = "dummy Content";
		 			$email = $this->input->post('email_id');
		 			//print_r($email);exit;
		 			$link = 'Click on this link - <a href="http://localhost/cartinhour/admin/users/set_password/'.base64_encode($success).'">http://localhost/cartinhour/admin/users/set_password/'.base64_encode($success).'</a>';
		 			echo '<pre>';print_r($link);exit;
		 			//send mail
		 			$this->email->from($from_email, 'CartinHour');
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


	public function set_password($code)
	{
		$cst_id = $this->uri->segment(4);
		//print_r($cst_id);exit;
		$this->load->view('admin/users/setpassword',$cst_id);
		//$this->template->render();
	}

	public function updatepassword()
	{
		$cst_id = $this->uri->segment(4);
		$post=$this->input->post();
		$data = array(
			'customer_id'=>$cst_id,
			'cust_password'=>$post['password'],
		);
		print_r($data);exit;
		 
	}
}