<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class inventory extends CI_Controller 
{	
	public function __construct() 
  {

		parent::__construct();
		$this->load->library('email');	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('inventory_model');
		$this->load->model('customer_model'); 
		if($this->session->userdata('userdetails'))
		{
		$logindetail=$this->session->userdata('userdetails');
		
		$data['customerdetails'] = $this->customer_model->get_profile_details($logindetail['customer_id']);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('customer/inventry/header',$data);
		} 
			
 }
	public function account(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);

			$this->load->view('customer/inventry/sidebar');
			$this->load->view('customer/inventry/profile',$data);
			$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	} 
	 
 }
  public function editprofile(){
	 
	 if($this->session->userdata('userdetails'))
	 {
		$customerdetails=$this->session->userdata('userdetails');
		$data['profile_details']= $this->customer_model->get_profile_details($customerdetails['customer_id']);
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/editprofile',$data);
		$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	} 
	 
 }
 public function changepassword(){
	
	if($this->session->userdata('userdetails'))
		{
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/changepassword');
		$this->load->view('customer/inventry/footer');
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
		}
} 


public function changepasswordpost(){
		if($this->session->userdata('userdetails'))
		{
			
		$post = $this->input->post();
		$this->form_validation->set_rules('oldpassword', 'oldpassword', 'required|min_length[6]');
		$this->form_validation->set_rules('newpassword', 'newpassword', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'confirm password', 'required|min_length[6]');
		if ($this->form_validation->run() == FALSE) {
		$data['change_errors'] = validation_errors();
			$this->load->view('customer/inventry/sidebar');
			$this->load->view('customer/inventry/changepassword');
			$this->load->view('customer/inventry/footer');
		}else{
		$customerdetail=$this->session->userdata('userdetails');
		$changepasword = $this->input->post();
		//echo '<pre>';print_r($changepasword);exit;
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
								redirect('inventory/changepassword');
							}
							else
							{
								$this->session->set_flashdata('passworderror',"Something went wrong in change password process!");
								redirect('inventory/changepassword');
							}
				}else{
					$this->session->set_flashdata('passworderror',"New password and confirm password was not matching");
					redirect('inventory/changepassword');
				}
			}else{
					$this->session->set_flashdata('passworderror',"Your Old password is incorrect. Please try again.");
					redirect('inventory/changepassword');
				}
		
		 }
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
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
				redirect('inventory/editprofile');
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
		);
		//echo '<pre>';print_r($details);exit;
		$updatedetails= $this->customer_model->update_deails($customerdetails['customer_id'],$details);
		if(count($updatedetails)>0){
			$this->session->set_flashdata('success','Profile Successfully updated');
			redirect('inventory/account');
		}

		//echo '<pre>';print_r($post);exit;
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	} 
	 
 }
  public function dashboard(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
	 	$check = $this->session->userdata('userdetails');
	 	//print_r($that);exit;
	 	if($check['role_id']==5){
	 	$data['seller_details'] = $this->inventory_model->get_all_seller_details();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('customer/inventry/header');
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/index',$data);
		$this->load->view('customer/inventry/footer');
	 	}else{
	 		redirect('admin/login');
	 	}
		
	 }else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		

  } 
  public function sellerdetails(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['seller_details'] = $this->inventory_model->get_seller_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/sellerdetails',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
	} 
  } 
  public function sellerservicerequests(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['seller_details'] = $this->inventory_model->get_all_seller_notifications();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/servicerequestlist',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
	} 
  }
public function servicerequestview(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['request_details'] = $this->inventory_model->get_notification_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/servicerequestview',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
	} 
  }  
  public function servicerequestreply(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				
				$data['serviceid']=$this->uri->segment(3);
				$data['seller_id']=$this->uri->segment(4);
				$data['seller_details'] = $this->inventory_model->get_all_seller_notifications();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/servicerequest',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
	} 
  } 
  public function servicerequestpost(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				
				$post=$this->input->post();
				$seller_id=base64_decode($post['seller_id']);
				$sevice_id=base64_decode($post['serviceid']);
				$seller_details = $this->inventory_model->get_seller_details($seller_id);
				//echo '<pre>';print_r($post);
				//echo '<pre>';print_r($seller_details);exit;
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from('cartinhor@gmail.com');
				$this->email->to($seller_details['seller_email']);
				$this->email->subject('Cartinhour - Request reply');
				//$html = "Your profile successfully Updated!";
				$html = "Hello <b>".$seller_details['seller_name']." </b><br />".$post['serivcerequest']."";
				$this->email->message($html);
				$this->email->send();
				 $emailsendcus=$this->inventory_model->notification_statuschanges($sevice_id,1);
				 if(count($emailsendcus)>0){
					$this->session->set_flashdata('success','Notification replay Successfully send!');
					redirect('inventory/sellerservicerequests'); 
				 }

				
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
	} 
  }
  public function status(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
					$id = base64_decode($this->uri->segment(3)); 
					$status = base64_decode($this->uri->segment(4));
					if($status==1){
					$status=0;
					}else{
					$status=1;
					}
					
					$data=array('status'=>$status);
					
					$updatestatus=$this->inventory_model->update_seller_status($id,$data);
					//echo $this->db->last_query();exit;
					
					if(count($updatestatus)>0){
						if($status==1){
							$this->session->set_flashdata('success'," Category activation successful");
						}else{
							$this->session->set_flashdata('success',"Category deactivation successful");
						}
						redirect('inventory/dashboard');
					}
		}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		
		
	
		
	  
	  }
	  else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }

	public function categories()
	{
		
		if($this->session->userdata('userdetails'))
		{	
			$check = $this->session->userdata('userdetails');
				if($check['role_id']==5)
				{
					$data['category'] = $this->inventory_model->get_seller_categories();
					//echo "<pre>";print_r($data);exit;
					$this->load->view('customer/inventry/header');
					$this->load->view('customer/inventry/sidebar');
					$this->load->view('customer/inventry/categories',$data);
					$this->load->view('customer/inventry/footer');
				}else
				{
					redirect('admin/login');
				}
		} else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
			} 

	}

	public function category_wise_sellers()
	{
		$cid = base64_decode($this->uri->segment(3));
		//print_r($data);exit;
		$data['seller_category'] = $this->inventory_model->get_seller_names($cid);
		//echo "<pre>";print_r($data);exit;
	  	$this->load->view('customer/inventry/sidebar');
	  	$this->load->view('customer/inventry/category_wise_sellers',$data);
	  	$this->load->view('customer/inventry/footer');
	}

	public function seller_id_database()
	{
		$data['database_id'] = $this->inventory_model->get_seller_databaseid();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_databaseid',$data);
	   	$this->load->view('customer/inventry/footer');
	}


	public function seller_payments()
	{
		$data['seller_payment'] = $this->inventory_model->get_seller_payments();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_payments',$data);
	   	$this->load->view('customer/inventry/footer');
	}

	public function inventory_management()
	{
		$data['inventory_management'] = $this->inventory_model->get_inventory_management();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/inventory_management',$data);
	   	$this->load->view('customer/inventry/footer');
	}
	public function catalog_management()
	{
		$data['catalog_management'] = $this->inventory_model->get_catalog_management();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/catalog_management',$data);
	   	$this->load->view('customer/inventry/footer');
	}

	public function both()
	{
		$data['both'] = $this->inventory_model->get_both();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/both',$data);
	   	$this->load->view('customer/inventry/footer');
	}


	public function home_page_banner()
	{
		$data['home_banner'] = $this->inventory_model->get_seller_banners();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/home_page_banner',$data);
	   	$this->load->view('customer/inventry/footer');
	}
	public function banner_active(){
		$code = $_GET['id'];
		$arr = explode('__',$code);
		$cid = base64_decode($arr[0]);
		$status = base64_decode($arr[1]);
		if($status==1){
		$status=0;
		}else{
		$status=1;
		}
		$bannerstatus= $this->inventory_model->banner_status_update($cid,$status);
		//echo "<pre>";print_r($customerstatus);exit;
		if(count($success)>0)
				{
					if($status==1){
						$this->session->set_flashdata('sucesmsg',"Banner successfully Activate");
					}else{
						$this->session->set_flashdata('sucesmsg',"Banner successfully deactivated.");
					}
					redirect('inventory/home_page_banner');
				}else{
					$this->session->set_flashdata('errormsg',"Banner successfully deactivated.");
					redirect('inventory/home_page_banner');
				}
	}
	public function top_offers()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/top_offers');
	   	$this->load->view('customer/inventry/footer');
	}
	public function deals_of_day()
	{
		$this->load->view('customer/inventry/header');
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/deals_of_day');
	   	$this->load->view('customer/inventry/footer');
	}
	public function season_sales()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/season_sales');
	   	$this->load->view('customer/inventry/footer');
	}
	public function others()
	{
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/others');
	   	$this->load->view('customer/inventry/footer');
	}

	
		public function logout(){
		
		$userinfo = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($userinfo );exit;
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('admin/login');
	}
  
 

  
 




}		
?>