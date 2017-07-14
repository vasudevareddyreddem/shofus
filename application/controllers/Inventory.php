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
		$data['unreadcount'] = $this->inventory_model->get_Unread_notification_count();
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
	 	$data['category'] = $this->inventory_model->get_seller_categories();
					//echo "<pre>";print_r($data);exit;
					$this->load->view('customer/inventry/sidebar');
					$this->load->view('customer/inventry/categories',$data);
					$this->load->view('customer/inventry/footer');
	 	}else{
	 		redirect('admin/login');
	 	}
		
	 }else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
		

  }
  
  public function sellerlist()
	{
		
		if($this->session->userdata('userdetails'))
		{	
			$check = $this->session->userdata('userdetails');
				if($check['role_id']==5)
				{
					$data['seller_details'] = $this->inventory_model->get_all_seller_details();
					//echo '<pre>';print_r($data);exit;
					$this->load->view('customer/inventry/header');
					$this->load->view('customer/inventry/sidebar');
					$this->load->view('customer/inventry/index',$data);
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
  public function categorywisesellers()
	{
		$cid = base64_decode($this->uri->segment(3));
		$data['seller_category'] = $this->inventory_model->get_categorywiseseller_list($cid);
		$data['category_name'] = $this->inventory_model->get_categort_details($cid);
		//echo "<pre>";print_r($data);exit;
	  	$this->load->view('customer/inventry/sidebar');
	  	$this->load->view('customer/inventry/category_wise_sellers',$data);
	  	$this->load->view('customer/inventry/footer');
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
  
  /* notification purpose*/
  public function sellernitificationlist(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['notification_details'] = $this->inventory_model->get_sellernotification_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/notificationslist',$data);
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
  
    public function adminnotificationreply(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);
					$lastestnotication = $this->inventory_model->get_notifciations_subject($post['seller_id']);
					$replaynotification = array(
					'replyed_id' => $logindetail['customer_id'],	
					'subject' => $lastestnotication['subject'],	
					'seller_id' => $post['seller_id'],
					'seller_message'=>$post['message'],
					'message_type' =>'REPLIED',
					'read_count' =>0,
					'created_at' => date('Y-m-d H:i:s'),
					);
			//echo '<pre>';print_r($replaynotification);exit;
			$notificationreply = $this->inventory_model->save_notifciations($replaynotification);
			if(count($notificationreply)>0){
			$this->session->set_flashdata('success','Notification replay successfully send!');
			redirect('inventory/sellernitificationlist');	
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

  public function notificationview(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['seller_notification_details'] = $this->inventory_model->get_seller_all_notifications_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$allnitiyes = $this->inventory_model->get_all_notifciations_subject(base64_decode($this->uri->segment(3)));
					//echo '<pre>';print_r($lastestnotication);
					foreach($allnitiyes as $notify){
						$this->inventory_model->notifciations_read_count($notify['notification_id'],0);
						
					}
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/adminnotificationview',$data);
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
				$this->email->subject('Cartinhour - Notification reply');
				//$html = "Your profile successfully Updated!";
				$html = "Hello <b>".$seller_details['seller_name']." </b><br />".$post['serivcerequest']."";
				$this->email->message($html);
				$this->email->send();
				$data=array('status'=>1,'replymsg'=>$post['serivcerequest']);
				 $emailsendcus=$this->inventory_model->notification_statuschanges($sevice_id,$data);
				// echo $this->db->last_query();exit;
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
							$this->session->set_flashdata('success'," Seller activation successful");
						}else{
							$this->session->set_flashdata('success',"Seller deactivation successful");
						}
						redirect('inventory/sellerlist');
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
  public function categorystatus(){
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
					$updatestatus=$this->inventory_model->update_category_status($id,$data);
					//echo $this->db->last_query();exit;
					
					if(count($updatestatus)>0){
						if($status==1){
							$this->session->set_flashdata('success'," Category activation successful");
						}else{
							$this->session->set_flashdata('success',"Category deactivation successful");
						}
						redirect('inventory/categorieslist');
					}
		}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }
  public function subcategorystatus(){
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
					$updatestatus=$this->inventory_model->update_subcategory_status($id,$data);
					//echo $this->db->last_query();exit;
					
					if(count($updatestatus)>0){
						if($status==1){
							$this->session->set_flashdata('success'," Subcategory activation successful");
						}else{
							$this->session->set_flashdata('success',"Subcategory deactivation successful");
						}
						redirect('inventory/subcategorieslist');
					}
		}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }
  public function categoryedit(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['category_details'] = $this->inventory_model->get_categort_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/editcategory',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  } 
  public function subcategoryedit(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['subcategory_details'] = $this->inventory_model->get_subcategore_details(base64_decode($this->uri->segment(3)));
				$data['category_list'] = $this->inventory_model->get_all_categort();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/editsubcategory',$data);
				$this->load->view('customer/inventry/footer');	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  } 
 
  public function categoryadd(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
					$this->load->view('customer/inventry/sidebar');
					$this->load->view('customer/inventry/addcategory');
					$this->load->view('customer/inventry/footer');
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }
   public function addsubcategory(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
					$data['category_list'] = $this->inventory_model->get_all_categort();
					//echo '<pre>';print_r($data);exit;
					$this->load->view('customer/inventry/sidebar');
					$this->load->view('customer/inventry/addsubcategory',$data);
					$this->load->view('customer/inventry/footer');
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }
  public function addcategorypost(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
					$post=$this->input->post();
					//echo "<pre>";print_r($_FILES);
					//echo "<pre>";print_r($post);exit;
					move_uploaded_file($_FILES['categoryfile']['tmp_name'], "assets/sellerfile/category/" . trim($_FILES['categoryfile']['name']));
					$data = array(
					'category_name' => $post['categoryname'], 
					'commission' => $post['commission'], 
					'documetfile' => trim($_FILES['categoryfile']['name']),    
					'status' => 1,    
					'created_at' => date('Y-m-d H:i:s'),    
					'updated_at' => date('Y-m-d H:i:s'),
					);
					$result=$this->inventory_model->insert_cat_data($data);
					if(count($result)>0){

					$this->session->set_flashdata('success',"Category Successfully Added");
					redirect('inventory/categorieslist');
					}
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  } 
  public function addsubcategorypost(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
					$post=$this->input->post();
					//echo "<pre>";print_r($post);exit;
					$addsubcat = array(
					'category_id' => $post['category_list'], 
					'subcategory_name' => $post['categoryname'], 
					'status' => 1,    
					'created_at' => date('Y-m-d H:i:s'),    
					'updated_at' => date('Y-m-d H:i:s'),
					'created_by' =>$logindetail['customer_id'], 
					);
					$results=$this->inventory_model->save_sub_categories($addsubcat);
					//echo "<pre>";print_r($post);exit;
					if(count($results)>0){

					$this->session->set_flashdata('success',"subCategory Successfully Added");
					redirect('inventory/subcategorieslist');
					}
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }
  
  public function subcategoryview(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['subcategory_details'] = $this->inventory_model->get_subcategore_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/subcategoryview',$data);
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
  public function categoryview(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['category_details'] = $this->inventory_model->get_categort_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/categoryview',$data);
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
  public function subcategorieslist(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['subcategory_details'] = $this->inventory_model->get_subcategort_details();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/subcategory_list',$data);
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
  
   public function updatecategorypost(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$post=$this->input->post();
				$category_details = $this->inventory_model->get_categort_details($post['catid']);
					if($_FILES['categoryfile']['name']!=''){
						$imgname=$_FILES['categoryfile']['name'];
						move_uploaded_file($_FILES['categoryfile']['tmp_name'], "assets/sellerfile/category/" . trim($_FILES['categoryfile']['name']));

					}else{
						$imgname=$category_details['documetfile'];
					}
					$updatedata = array(
					'category_name' => $post['categoryname'], 
					'commission' => $post['commission'], 
					'documetfile' => $imgname,
					'created_at' => date('Y-m-d H:i:s'),    
					'updated_at' => date('Y-m-d H:i:s'),
					);
					$details=$this->inventory_model->update_category_details($post['catid'],$updatedata);
					if(count($details)>0){

					$this->session->set_flashdata('success',"Category Successfully Updated!");
					redirect('inventory/categorieslist');
					}	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  } 
  public function editsubcategorypost(){
  	if($this->session->userdata('userdetails'))
	 {		
		$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
					$updatedata = array(
					'category_id' => $post['category_list'], 
					'subcategory_name' => $post['subcategoryname'], 
					'created_at' => date('Y-m-d H:i:s'),    
					'updated_at' => date('Y-m-d H:i:s'),
					);
					//echo '<pre>';print_r($updatedata);exit;
					$details=$this->inventory_model->update_subcategory_details($post['subcategoryid'],$updatedata);
					
					//echo $this->db->last_query();exit;
					if(count($details)>0){

					$this->session->set_flashdata('success',"Subcategory Successfully Updated!");
					redirect('inventory/subcategorieslist');
					}	
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 }else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		} 
  }

	

	

	public function seller_id_database()
	{
		$data['database_id'] = $this->inventory_model->get_seller_databaseid();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_databaseid',$data);
	   	$this->load->view('customer/inventry/footer');
	}


	public function sellerpayments()
	{
		$data['seller_payment'] = $this->inventory_model->get_seller_payments();
		//echo "<pre>";print_r($data);exit;
	   	$this->load->view('customer/inventry/sidebar');
	   	$this->load->view('customer/inventry/seller_payments',$data);
	   	$this->load->view('customer/inventry/footer');
	}
 public function sellerpaymentdetails(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['seller_order_items'] = $this->inventory_model->get_seller_all_payment_details(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/seller_order_item_details',$data);
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


	public function homepagebanner()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['home_banner'] = $this->inventory_model->get_seller_banners();
				//echo "<pre>";print_r($data);exit;
			   	$this->load->view('customer/inventry/sidebar');
			   	$this->load->view('customer/inventry/home_page_banner',$data);
			   	$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
		
	}
	public function banner_active(){


		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$code = $_GET['id'];
		$arr = explode('__',$code);
		$id = base64_decode($arr[0]);		
		//echo "<pre>";print_r($id);exit;
		$sid = base64_decode($arr[1]);
		$status = base64_decode($arr[2]);
		if($status==1){
		$status=0;
		}else{
		$status=1;
		}
		$bannerstatus= $this->inventory_model->banner_status_update($id,$sid,$status);
		//echo "<pre>";print_r($bannerstatus);exit;
		if(count($bannerstatus)>0)
				{
					if($status==1){
						$this->session->set_flashdata('active',"Banner successfully Activate");
					}else{
						$this->session->set_flashdata('deactive',"Banner successfully deactivated.");
					}
					redirect('inventory/homepagebanner');
				}else{
					$this->session->set_flashdata('errormsg',"Opps !.!!");
					redirect('inventory/homepagebanner');
				}
				
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
		
	}

	public function banner_delete(){
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$code = $_GET['id'];
		$arr = explode('__',$code);
		$id = base64_decode($arr[0]);		
		//echo "<pre>";print_r($id);exit;
		$sid = base64_decode($arr[1]);
		$status = base64_decode($arr[2]);
		//echo "<pre>";print_r($status);exit;
		if($status==0){
			$bannerdelete= $this->inventory_model->delete_banner($id,$sid);			
			//echo $this->db->last_query();exit;
		}else{
			$this->session->set_flashdata('errormsg',"This Banner Is Active Please Ask Admin!!");
			redirect('inventory/homepagebanner');
		}
		if(count($bannerdelete)>0)
			{
				if($status==0){
					$this->session->set_flashdata('active',"Banner successfully Delete");
				}else{
					$this->session->set_flashdata('deactive',"Banner Not deleted.");
				}
				redirect('inventory/homepagebanner');
			}else{
				$this->session->set_flashdata('errormsg',"Opps !.!!");
				redirect('inventory/homepagebanner');
			}
				
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
		
	}
	public function bannerpreview(){
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['preview'] = $this->inventory_model->get_banner_preview();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/bannerpreview',$data);
	   			$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
		
	}

	public function homepagepreview()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['topoffers'] = $this->inventory_model->get_top_offers();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/home_preview',$data);
	   			$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
		
	}
	public function topoffers()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['top_offers'] = $this->inventory_model->get_top_offers();
				//echo "<pre>";print_r($data);exit;
			   	$this->load->view('customer/inventry/sidebar');
			   	$this->load->view('customer/inventry/top_offers',$data);
			   	$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
	}
	public function topofferslist()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['top_offerslist'] = $this->inventory_model->get_top_offers_list(base64_decode($this->uri->segment(3)));
				//echo "<pre>";print_r($data);exit;
			   	$this->load->view('customer/inventry/sidebar');
			   	$this->load->view('customer/inventry/top_offerslist',$data);
			   	$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
	}

	public function topoffersstatus()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$offerid = base64_decode($this->uri->segment(3));
				$itemid = base64_decode($this->uri->segment(4));
				$seller_id = base64_decode($this->uri->segment(5));
				$status = base64_decode($this->uri->segment(6));
				//echo "<pre>";print_r($offerid);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				$data=array('status'=>$status);
				$updatestatus=$this->inventory_model->update_topoffers_status($offerid,$itemid,$seller_id,$data);
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('active'," Product activation successful");
					}else{
						$this->session->set_flashdata('deactive',"Product deactivation successful");
					}
					redirect('inventory/topofferslist'.'/'.base64_encode($itemid));
				}
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
		}else
	 	{
		 	$this->session->set_flashdata('loginerror','Please login to continue');
		 	redirect('admin/login	');
		} 	
	}


	/* season sales */
	public function seasonsales()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['season_sales'] = $this->inventory_model->get_season_offers_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/season_sales',$data);
	   			$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
	   	
	}
	public function sellerseasonsalesdetails()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['season_sales_details'] = $this->inventory_model->get_season_sales_details_list(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/season_sales_details',$data);
	   			$this->load->view('customer/inventry/footer');
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
	 	}else
	 	{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login	');
		}
	   	
	}
	public function seasonsale_home_page_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$itemid = base64_decode($this->uri->segment(4));
				$status = base64_decode($this->uri->segment(5));
				//echo "<pre>";print_r($offerid);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				$updatestatus=$this->inventory_model->update_seasonsales_status($seller_id,$itemid,$status);
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Item added home page banner successful");
					}else{
						$this->session->set_flashdata('success',"Item removed home page banner  successful");
					}
					redirect('inventory/sellerseasonsalesdetails'.'/'.base64_encode($seller_id));
				}
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
		}else
	 	{
		 	$this->session->set_flashdata('loginerror','Please login to continue');
		 	redirect('admin/login	');
		} 	
	}
	public function overaall_seasonsale_home_page_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$status = base64_decode($this->uri->segment(4));
				$overall_tems = $this->inventory_model->get_season_sales_details_list(base64_decode($this->uri->segment(3)));
				//echo "<pre>";print_r($overall_tems);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				foreach ($overall_tems as $items){
				
				$updatestatus=$this->inventory_model->update_seasonsales_status($seller_id,$items['item_id'],$status);
				//echo $this->db->last_query();exit;
				}
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Items added home page banner successful");
					}else{
						$this->session->set_flashdata('success',"Items removed home page banner  successful");
					}
					redirect('inventory/seasonsales');
				}
			}else
			{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
			}
		}else
	 	{
		 	$this->session->set_flashdata('loginerror','Please login to continue');
		 	redirect('admin/login	');
		} 	
	}
	

	 public function categorieslist(){
  	
	 
	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				
				$data['category_list'] = $this->inventory_model->get_all_categories_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/category_list',$data);
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