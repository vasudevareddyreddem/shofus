<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class inventory extends CI_Controller 
{	
	public function __construct() 
	{		parent::__construct();
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('inventory_model');
		$this->load->model('customer_model'); 
		$this->load->model('seller/adddetails_model'); 
		if($this->session->userdata('userdetails'))
		{
		$logindetail=$this->session->userdata('userdetails');
		$data['customerdetails'] = $this->customer_model->get_profile_details($logindetail['customer_id']);
		$data['unreadcount'] = $this->inventory_model->get_Unread_notification_count();
		$this->load->view('customer/inventry/header',$data);
		} 
}
	public function account(){
	 if($this->session->userdata('userdetails'))
	 {$customerdetails=$this->session->userdata('userdetails');
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
	 {$customerdetails=$this->session->userdata('userdetails');
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
	 {$customerdetails=$this->session->userdata('userdetails');
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
	 {	$check = $this->session->userdata('userdetails');
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
	{if($this->session->userdata('userdetails'))
		{	$check = $this->session->userdata('userdetails');
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
				$this->inventory_model->seller_new_comming_list(base64_decode($this->uri->segment(3)),1);
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
					$replynotification = array(
					'replyed_id' => $logindetail['customer_id'],	
					'subject' => $lastestnotication['subject'],	
					'seller_id' => $post['seller_id'],
					'seller_message'=>$post['message'],
					'message_type' =>'REPLIED',
					'read_count' =>0,
					'created_at' => date('Y-m-d H:i:s'),
					);
			//echo '<pre>';print_r($replynotification);exit;
			$notificationreply = $this->inventory_model->save_notifciations($replynotification);
			if(count($notificationreply)>0){
			$this->session->set_flashdata('success','Notification reply successfully sent!');
			redirect('inventory/sellernitificationlist');	
			}
				
			}else{
				$this->session->set_flashdata('loginerror','you have  no permissions');
				redirect('admin/login');
		}
	} else{
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
	}else{
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
	 } else{
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
	}else{
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
					$this->session->set_flashdata('success','Notification reply Successfully sent!');
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
					$product_list=$this->inventory_model->get_seller_products_list($id);
					//echo '<pre>';print_r($product_list);exit;
						if(count($updatestatus)>0){
						foreach($product_list as $list){
							$updatestatus=$this->inventory_model->activate_product_status($list['item_id'],$id,$status);
						}
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
					//echo '<pre>';print_r(base64_decode($this->uri->segment(5)));exit;
					$updatestatus=$this->inventory_model->update_category_status($id,$data);
					//echo $this->db->last_query();exit;
						if(count($updatestatus)>0){
						
						if($this->uri->segment(5)!='' && base64_decode($this->uri->segment(5))==1){
							$catdata=$this->inventory_model->get_category_details($id);
							if($status==1){
							$sub='Category activation successfully';
						}else{
							$sub='Category deactivation successfully';
						}	
						if($status==1){
							$submsg='Category activation successfully. Please UPdate Your categorieslist';
						}else{
							$submsg='Category deactivation successfully';
						}
							$data = array(
						'seller_id' => $catdata['seller_id'],
						'seller_category_id'=> $catdata['category_id'],
						'category_name'=> $catdata['category_name'],
						'created_at'=> date('Y-m-d h:i:s'),
						'updated_at'=>  date('Y-m-d h:i:s'),
						);
						//echo "<pre>";print_r($data); exit;
						$res=$this->inventory_model->save_categorydata($data);
						$addnotifications = array(
						'seller_id' =>$catdata['seller_id'],
						'subject'=>$sub,
						'seller_message'=>$sub,
						'message_type' =>'REPLY',
						'category_status' =>1,
						'created_at' => date('Y-m-d H:i:s'),
						);
						$contact = $this->adddetails_model->save_notifciations($addnotifications);
						$data=array('first_time'=>0);
						$this->inventory_model->update_category_status($id,$data);
						}
						if($status==1){
							$this->session->set_flashdata('success'," Category activation successfully");
						}else{
							$this->session->set_flashdata('success',"Category deactivation successfully");
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
					$alreadyexits = $this->inventory_model->get_name_existss($post['categoryname']);
						if(count($alreadyexits)>0){
							$this->session->set_flashdata('error',"Category Name already exits.please use another category Name.");
							redirect('inventory/categoryadd');
							
						}
					
					if($_FILES['cat_image']['name']!=''){
					$catimg=$_FILES['cat_image']['name'];
					move_uploaded_file($_FILES['cat_image']['tmp_name'], "assets/categoryimages/" . $_FILES['cat_image']['name']);

					}else{
					$catimg='';
					}
					move_uploaded_file($_FILES['categoryfile']['tmp_name'], "assets/sellerfile/category/" . trim($_FILES['categoryfile']['name']));
					$data = array(
					'category_name' => $post['categoryname'],
					'category_image'=>$catimg,
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
					$alreadyexits = $this->inventory_model->get_sub_name_existss($post['categoryname']);
						if(count($alreadyexits)>0){
							$this->session->set_flashdata('error',"Sub category Name already exits.please use another Sub category Name.");
							redirect('inventory/addsubcategory');
						}
					if($_FILES['sub_image']['name']!=''){
					$subimg=$_FILES['sub_image']['name'];
					move_uploaded_file($_FILES['sub_image']['tmp_name'], "assets/subcategoryimages/" . $_FILES['sub_image']['name']);
					}else{
					$subimg='';
					}
					$addsubcat = array(
					'category_id' => $post['category_list'], 
					'subcategory_name' => $post['categoryname'],
					'subcategory_image'=>$subimg,
					'commission' => $post['commission'], 
					'status' => 1,    
					'created_at' => date('Y-m-d H:i:s'),    
					'updated_at' => date('Y-m-d H:i:s'),
					'created_by' =>$logindetail['customer_id'], 
					);
					$results=$this->inventory_model->save_sub_categories($addsubcat);
					//echo "<pre>";print_r($post);exit;
					if(count($results)>0){
					$this->session->set_flashdata('success',"SubCategory Successfully Added");
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
  public function subcategorylistview(){
  	if($this->session->userdata('userdetails'))
	 {		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5){
				$data['subcatelist'] = $this->inventory_model->get_subcategort_details_list(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
				$this->load->view('customer/inventry/category_wise_subcategoryview',$data);
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
				if($_FILES['cat_image']['name']!=''){
					$catimg=$_FILES['cat_image']['name'];
					move_uploaded_file($_FILES['cat_image']['tmp_name'], "assets/categoryimages/" . $_FILES['cat_image']['name']);

					}else{
					$catimg=$category_details['category_image'];
					}
				//print_r($category_details);exit;
					if($_FILES['categoryfile']['name']!=''){
						$imgname=$_FILES['categoryfile']['name'];
						move_uploaded_file($_FILES['categoryfile']['tmp_name'], "assets/sellerfile/category/" . trim($_FILES['categoryfile']['name']));

					}else{
						$imgname=$category_details['documetfile'];
					}
					$updatedata = array(
					'category_name' => $post['categoryname'],
					'category_image'=>$catimg,
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
					$subcategory_image_get=$this->inventory_model->getoldimage($post['category_list'],$post['subcategoryid']);
					//echo '<pre>';print_r($subcategory_image_get);exit;
					if($_FILES['sub_image']['name']!=''){
					$subimg=$_FILES['sub_image']['name'];
					move_uploaded_file($_FILES['sub_image']['tmp_name'], "assets/subcategoryimages/" . $_FILES['sub_image']['name']);

					}else{
					$subimg=$subcategory_image_get['subcategory_image'];
					}
					$updatedata = array(
					'category_id' => $post['category_list'], 
					'subcategory_name' => $post['subcategoryname'],
					'subcategory_image'=>$subimg,
					'commission' => $post['commission'], 
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
				$data['homebanners'] = $this->inventory_model->get_banner_preview_display();
				$data['topoffers'] = $this->inventory_model->get_top_offers_preview();
				$data['deals_of_the_day'] = $this->inventory_model->get_deals_of_the_day_preview();
				$data['season_sales'] = $this->inventory_model->get_season_sales_preview();
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/home_preview',$data);
	   			$this->load->view('customer/inventry/footer');
	   			$this->load->view('customer/inventry/footerpriview');
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
/*top offers*/
	public function topoffers()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['top_offers'] = $this->inventory_model->get_top_offers_list();
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
	public function sellertopoffresdetails()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['top_offers_details'] = $this->inventory_model->get_top_offers_details_list(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/top_offers_details',$data);
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
	public function topoffers_home_page_status()
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
				if($status==0){
					$updatestatus=$this->inventory_model->update_topoffers_status_ok($seller_id,$itemid,$status,0);

					}else{
					$updatestatus=$this->inventory_model->update_topoffers_status($seller_id,$itemid,$status);

					}
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Item added from home page banner successfully");
					}else{
						$this->session->set_flashdata('success',"Item removed from home page banner  successfully");
					}
					redirect('inventory/sellertopoffresdetails'.'/'.base64_encode($seller_id));
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
public function overaall_topoffers_home_page_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$status = base64_decode($this->uri->segment(4));
				$overall_tems = $this->inventory_model->get_top_offers_details_list(base64_decode($this->uri->segment(3)));
				//echo "<pre>";print_r($overall_tems);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				if($status==0){
						foreach ($overall_tems as $items){
						$updatestatus=$this->inventory_model->update_topoffers_status_ok($seller_id,$items['item_id'],$status,0);
						//echo $this->db->last_query();exit;
						}
				}else{
					foreach ($overall_tems as $items){
					$updatestatus=$this->inventory_model->update_topoffers_status($seller_id,$items['item_id'],$status);
					//echo $this->db->last_query();exit;
					}
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
					redirect('inventory/topoffers');
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
				if($status==0){
				$updatestatus=$this->inventory_model->update_seasonsales_status_ok($seller_id,$itemid,$status,0);
				}else{
				$updatestatus=$this->inventory_model->update_seasonsales_status($seller_id,$itemid,$status);
				}
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
				if($status==0){
						foreach ($overall_tems as $items){
						$updatestatus=$this->inventory_model->update_seasonsales_status_ok($seller_id,$items['item_id'],$status,0);
						}
				}else{
						foreach ($overall_tems as $items){
						$updatestatus=$this->inventory_model->update_seasonsales_status($seller_id,$items['item_id'],$status);
						}
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
	/*------*/
	
	/*deals of the day*/
	public function dealsoftheday()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['season_sales'] = $this->inventory_model->get_delasoftheday_offers_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/deals_ofthe_day',$data);
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
	public function sellerdelasofthedaydetails()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['dealsofthe_day_details'] = $this->inventory_model->get_dealsoftheday_details_list(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/dealsofthe_day_details',$data);
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
	public function dealsoftheday_home_page_status()
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
				if($status==0){
					$updatestatus=$this->inventory_model->update_dealsoftheday_status_ok($seller_id,$itemid,$status,0);
				}else{
					$updatestatus=$this->inventory_model->update_dealsoftheday_status($seller_id,$itemid,$status);

				}
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Item added home page banner successful");
					}else{
						$this->session->set_flashdata('success',"Item removed home page banner  successful");
					}
					redirect('inventory/sellerdelasofthedaydetails'.'/'.base64_encode($seller_id));
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
	public function overaall_dealsoftheday_home_page_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$status = base64_decode($this->uri->segment(4));
				$overall_tems = $this->inventory_model->get_dealsoftheday_details_list(base64_decode($this->uri->segment(3)));
				//echo "<pre>";print_r($overall_tems);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				
				if($status==0){
					foreach ($overall_tems as $items){
								$updatestatus=$this->inventory_model->update_dealsoftheday_status_ok($seller_id,$items['item_id'],$status,0);
						}
				}else{
					foreach ($overall_tems as $items){
					$updatestatus=$this->inventory_model->update_dealsoftheday_status($seller_id,$items['item_id'],$status);
					}
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
					redirect('inventory/dealsoftheday');
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
	
	/*----------------*/
	/* home page banner*/
	public function homepagebanner()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['home_banner'] = $this->inventory_model->get_seller_banners();
				//
				
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
	public function sellerhomepagebannerdetails()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$data['homepage_banner_details'] = $this->inventory_model->get_homepage_banner_details_list(base64_decode($this->uri->segment(3)));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('customer/inventry/sidebar');
	   			$this->load->view('customer/inventry/homepage_banner_details',$data);
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
		public function home_page_banner_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$imageid = base64_decode($this->uri->segment(4));
				$status = base64_decode($this->uri->segment(5));
				//echo "<pre>";print_r($offerid);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				if($status==0){
					$updatestatus=$this->inventory_model->update_banner_status_ok($seller_id,$imageid,$status,0);
				}else{
					$updatestatus=$this->inventory_model->update_banner_status($seller_id,$imageid,$status);
				}
				
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Image added home page banner successful");
					}else{
						$this->session->set_flashdata('success',"Image removed home page banner  successful");
					}
					redirect('inventory/sellerhomepagebannerdetails'.'/'.base64_encode($seller_id));
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
	public function overaall_home_page_banner_status()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$seller_id = base64_decode($this->uri->segment(3));
				$status = base64_decode($this->uri->segment(4));
				$overall_tems = $this->inventory_model->get_homepage_banner_details_list(base64_decode($this->uri->segment(3)));
				//	echo "<pre>";print_r($overall_tems);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				 if($status==0){
					 
					foreach ($overall_tems as $items){
						$updatestatus=$this->inventory_model->update_banner_status_ok($seller_id,$items['image_id'],$status,0);
					} 
				 }else{
					 
					foreach ($overall_tems as $items){
						$updatestatus=$this->inventory_model->update_banner_status($seller_id,$items['image_id'],$status);
					}  
				 }
				//echo "<pre>";print_r($status);exit;
				
				
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('success'," Images added home page banner successful");
					}else{
						$this->session->set_flashdata('success',"Images removed home page banner  successful");
					}
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
	public function previewok(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);
		if(count($post)>0){ 
		$overrtopoffers=$this->inventory_model->get_topoffers_update_preview_ok();
		//echo '<pre>';print_r($overrtopoffers);exit;
		foreach($overrtopoffers as $list){
			$this->inventory_model->set_topoffers_update_preview_notok($list['top_offer_id'],0);
		}
		if(count($post['topoffers'])>0){
			foreach($post['topoffers'] as $list){
				$this->inventory_model->update_topoffers_preview_ok($list,1);
			}
		}
		$overrdeals_of_the_day=$this->inventory_model->get_deals_of_the_day_update_preview_ok();
		foreach($overrdeals_of_the_day as $list){
			$this->inventory_model->set_deals_of_the_day_update_preview_notok($list['deal_offer_id'],0);
		}
		if(count($post['deals_of_the_day'])>0){
			foreach($post['deals_of_the_day'] as $list){
				$this->inventory_model->update_deals_of_the_day_preview_ok($list,1);
			}
		}
		$overrseason_sales=$this->inventory_model->get_season_sales_update_preview_ok();
		foreach($overrseason_sales as $list){
			$this->inventory_model->set_season_sales_update_preview_notok($list['season_sales_id'],0);
		}
		if(count($post['season_sales'])>0){
			foreach($post['season_sales'] as $list){
				$this->inventory_model->update_season_sales_preview_ok($list,1);
			}
		}
		$overrbannerimage=$this->inventory_model->get_banner_update_preview_ok();
		foreach($overrbannerimage as $list){
			$this->inventory_model->set_banner_update_preview_notok($list['image_id'],0);
		}
		if(count($post['bannerimage'])>0){
			foreach($post['bannerimage'] as $list){
				$this->inventory_model->update_banner_sales_preview_ok($list,1);
			}
		}
		$this->session->set_flashdata('success','Successfully home page banner  and  items are added');
		redirect('inventory/homepagepreview');
		}else{
			$this->session->set_flashdata('error','Plase select products for home page preview');
			redirect('inventory/homepagepreview');
		}
	}
	/* home page banner*/
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
		 redirect('admin/login');
	} 
  }
public function logout(){
	$userinfo = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($userinfo );exit;
        $this->session->unset_userdata($userinfo);
		//$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('admin/login');
	}
public function subimportcategory(){
	$post=$this->input->post();
		$logindetail=$this->session->userdata('userdetails');
if((!empty($_FILES["importcategoryfile"])) && ($_FILES['importcategoryfile']['error'] == 0)) {
				$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
				$fileName	= basename($_FILES['importcategoryfile']['name']);
				$fileSize	= $_FILES["importcategoryfile"]["size"];
				$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
				if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
					include( 'simplexlsx.class.php');
					$getWorksheetName = array();
					$xlsx = new SimpleXLSX( $_FILES['importcategoryfile']['tmp_name'] );
					$getWorksheetName = $xlsx->getWorksheetName();
					//echo $xlsx->sheetsCount();exit;
					for($j=1;$j <= $xlsx->sheetsCount();$j++){
						$cnt=$xlsx->sheetsCount()-1;
						$arry=$xlsx->rows($j);
						unset($arry[0]);
						//echo "<pre>";print_r($arry);exit;
						foreach($arry as $key=>$fields)
							{
								if(isset($fields[0]) && $fields[0]!=''){
								$totalfields[] = $fields;	
									if(empty($fields[0])) {
										$data['errors'][]="Subcategory Name is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[0]!=''){
										$regex ="/^[ A-Za-z0-9_@.,}{@#&$*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[0]))	  	
										{
										$data['errors'][]='Subcategory Name wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}
									}
									if(empty($fields[1])) {
										$data['errors'][]="Commision is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[1]!=''){
										$regex ="/^[0-9]+$/"; 
										if(!preg_match( $regex, $fields[1]))
										{
										$data['errors'][]="Commision must be digits. Row Id is :  ".$key.'<br>';
										$error=1;
										}
									}
								}else{
									$data['errors'][]='Please Fillout all Fields';
									$this->session->set_flashdata('addsuccess',$data['errors']);
									redirect('inventory/addsubcategory');	
								}
							}
								if(count($data['errors'])>0){
								$this->session->set_flashdata('addsuccess',$data['errors']);
								redirect('inventory/addsubcategory');	
								}
						}
						
						
					}
	}
					if(count($data['errors'])<=0){
						foreach($totalfields as $data){
								//echo "<pre>";print_r($fieldss);
							$addsubcat = array(
							'category_id' => $post['category_list'], 
							'subcategory_name' =>$data[0],
							'commission' => $data[1], 
							'status' => 1,    
							'created_at' => date('Y-m-d H:i:s'),    
							'updated_at' => date('Y-m-d H:i:s'),
							'created_by' =>$logindetail['customer_id'], 
							);
							//echo "<pre>";print_r($addsubcat);
							$results=$this->inventory_model->save_sub_categories($addsubcat);
							//echo $this->db->last_query();exit;
						}
						if(count($results)>0){
							$this->session->set_flashdata('success','Successfully Added');
							redirect('inventory/subcategorieslist');	
						}
					
					
				}
				
	       }
		 public function importcategory(){
			
		$post=$this->input->post();
		//echo '<pre>';print_r($_FILES);exit;
		$logindetail=$this->session->userdata('userdetails');
	if((!empty($_FILES["importaegoryfile"])) && ($_FILES['importaegoryfile']['error'] == 0)) {
				$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
				$fileName	= basename($_FILES['importaegoryfile']['name']);
				$fileSize	= $_FILES["importaegoryfile"]["size"];
				$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
				if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
					include( 'simplexlsx.class.php');
					$getWorksheetName = array();
					$xlsx = new SimpleXLSX( $_FILES['importaegoryfile']['tmp_name'] );
					$getWorksheetName = $xlsx->getWorksheetName();
					//echo $xlsx->sheetsCount();exit;
					for($j=1;$j <= $xlsx->sheetsCount();$j++){
						$cnt=$xlsx->sheetsCount()-1;
						$arry=$xlsx->rows($j);
						unset($arry[0]);
						//echo "<pre>";print_r($arry);exit;
						foreach($arry as $key=>$fields)
							{
								if(isset($fields[0]) && $fields[0]!=''){
								$totalfields[] = $fields;	
									if(empty($fields[0])) {
										$data['errors'][]="category Name is required. Row Id is :  ".$key.'<br>';
										$error=1;
									}else if($fields[0]!=''){
										$regex ="/^[ A-Za-z0-9_@.,}{@#&*)(_+-]*$/"; 
										if(!preg_match( $regex, $fields[0]))	  	
										{
										$data['errors'][]='category Name wont allow "  <> []. Row Id is :  '.$key.'<br>';
										$error=1;
										}else{
											$result = $this->inventory_model->get_name_existss($fields[0]);
											if(count($result)>0){
											$data['errors'][]="category Name already exits .please use another category Name. Row Id is :  ".$key.'<br>';
											$error=1;	
											}

										}
									}
									
									
								}else{
									$data['errors'][]='Please Fillout all Fields';
									$this->session->set_flashdata('addsuccess',$data['errors']);
									redirect('inventory/categoryadd');	
								}
							}
								if(count($data['errors'])>0){
								$this->session->set_flashdata('addsuccess',$data['errors']);
								redirect('inventory/categoryadd');	
								}
						
						
						}
						
						
					}
	}
					
					if(count($data['errors'])<=0){
						foreach($totalfields as $data){

						//echo "<pre>";print_r($fieldss);
						$data = array(
						'category_name' => $data[0], 
						'documetfile' => '',
						'status' => 1,    
						'created_at' => date('Y-m-d H:i:s'),    
						'updated_at' => date('Y-m-d H:i:s'),
						);
						$results=$this->inventory_model->insert_cat_data($data);
						//echo "<pre>";print_r($addsubcat);
						}
						if(count($results)>0){
							$this->session->set_flashdata('success','Successfully Added');
							redirect('inventory/categorieslist');	
						}
					
					
				}
				
	       }
 public function productquantity(){ 
	if($this->session->userdata('userdetails'))
	{		
		$data['quantity'] = $this->inventory_model->total_quantity();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/product_quantity',$data);
		$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	} 
  }
 public function categorywisequantity()
  {
  	if($this->session->userdata('userdetails'))
	{	$sellerid = base64_decode($this->uri->segment(3));
		//echo "<pre>";print_r($id);exit;
		$data['category_wise'] = $this->inventory_model->categorywise_quantity($sellerid);
		//echo "<pre>";print_r($data);exit;
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/categorywise_quantity',$data);
		$this->load->view('customer/inventry/footer');
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	}
  }
  public function categorywiseproductlist()
  {
  	if($this->session->userdata('userdetails'))
	{	
		$category_id = base64_decode($this->uri->segment(3));
		$sellerid = base64_decode($this->uri->segment(4));
		//echo "<pre>";print_r($category_id);
		//echo "<pre>";print_r($sellerid);exit;
		$data['product_details'] = $this->inventory_model->categorywise_product_quantity($category_id,$sellerid);
		//echo "<pre>";print_r($data);exit;
		$data['seller_id']= $this->uri->segment(4);
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/categorywise_productlist',$data);
		$this->load->view('customer/inventry/footer');
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	}
  }
  public function addbannerslist()
  {
  	if($this->session->userdata('userdetails'))
	{	
		$data['bannerslist']=$this->inventory_model->get_save_mobileapp_banners_list();
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/mobileappbannerlist',$data);
		$this->load->view('customer/inventry/footer');
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	}
  }
  public function addbanners()
  {
  	if($this->session->userdata('userdetails'))
	{	
		
		$data['bannerslist']=$this->inventory_model->get_save_mobileapp_banners_list();
		$this->load->view('customer/inventry/sidebar');
		$this->load->view('customer/inventry/addmobilebanners');
		$this->load->view('customer/inventry/footer');
		
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	}
  } 
  public function addbannerspost()
  {
  	if($this->session->userdata('userdetails'))
	{	
		
		$post=$this->input->post();
		
		if($_FILES['img1']['name']!=''){
				$img1=$_FILES['img1']['name'];
				move_uploaded_file($_FILES['img1']['tmp_name'],"assets/appbanners/" .$_FILES['img1']['name']);
			}else{
				$img1='';
			}
		if($_FILES['img2']['name']!=''){
				$img2=$_FILES['img2']['name'];
				move_uploaded_file($_FILES['img2']['tmp_name'],"assets/appbanners/" .$_FILES['img2']['name']);
			}else{
				$img2='';
			}
		if($_FILES['img3']['name']!=''){
				$img3=$_FILES['img3']['name'];
				move_uploaded_file($_FILES['img3']['tmp_name'],"assets/appbanners/" .$_FILES['img3']['name']);
			}else{
				$img3='';
			}
		if($_FILES['img4']['name']!=''){
				$img4=$_FILES['img4']['name'];
				move_uploaded_file($_FILES['img4']['tmp_name'],"assets/appbanners/" .$_FILES['img4']['name']);
			}else{
				$img4='';
			}
		if($_FILES['img5']['name']!=''){
				$img5=$_FILES['img5']['name'];
				move_uploaded_file($_FILES['img5']['tmp_name'],"assets/appbanners/" .$_FILES['img5']['name']);
			}else{
				$img5='';
			}
		if($_FILES['img6']['name']!=''){
				$img6=$_FILES['img6']['name'];
				move_uploaded_file($_FILES['img6']['tmp_name'],"assets/appbanners/" .$_FILES['img6']['name']);
			}else{
				$img6='';
			}
		if($_FILES['img7']['name']!=''){
				$img7=$_FILES['img7']['name'];
				move_uploaded_file($_FILES['img7']['tmp_name'],"assets/appbanners/" .$_FILES['img7']['name']);
			}else{
				$img7='';
			}
		if($_FILES['img8']['name']!=''){
				$img8=$_FILES['img8']['name'];
				move_uploaded_file($_FILES['img8']['tmp_name'], "assets/appbanners/" .$_FILES['img8']['name']);
			}else{
				$img8='';
			}
		if($_FILES['img9']['name']!=''){
				$img9=$_FILES['img9']['name'];
				move_uploaded_file($_FILES['img9']['tmp_name'], "assets/appbanners/" .$_FILES['img9']['name']);
			}else{
				$img9='';
			}
			if(isset($img1) && $img1!=''){
				$detais=array('img1'=>isset($img1)?$img1:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img2) && $img2!=''){
				$detais=array('img1'=>isset($img2)?$img2:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img3) && $img3!=''){
				$detais=array('img1'=>isset($img3)?$img3:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img4) && $img4!=''){
				$detais=array('img1'=>isset($img4)?$img4:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img5) && $img5!=''){
				$detais=array('img1'=>isset($img5)?$img5:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img6) && $img6!=''){
				$detais=array('img1'=>isset($img6)?$img6:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img7) && $img7!=''){
				$detais=array('img1'=>isset($img7)?$img7:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img8) && $img8!=''){
				$detais=array('img1'=>isset($img8)?$img8:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			if(isset($img9) && $img9!=''){
				$detais=array('img1'=>isset($img9)?$img9:'','create_at'=>date('Y-m-d H:i:s'));
				$savedata=$this->inventory_model->save_mobileapp_banners_list($detais);
			}
			
				
				if(count($savedata)>0){
					$this->session->set_flashdata('success','banners Successfully Added');
					redirect('inventory/addbannerslist');
				}else{
					$this->session->set_flashdata('error',' some technical problem will occured. Please try again');
					redirect('inventory/addbanners');
				}
	}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('admin/login');
	}
  }
  public function addbannerstatus()
	{
		if($this->session->userdata('userdetails'))
	 	{		
			$logindetail=$this->session->userdata('userdetails');
			if($logindetail['role_id']==5)
			{
				$imageid = base64_decode($this->uri->segment(3));
				$status = base64_decode($this->uri->segment(4));
				//echo "<pre>";print_r($offerid);exit;
				if($status==1)
				{
					$status=0;
				}else{
					$status=1;
				}
				$updatestatus=$this->inventory_model->update_bannerimg_status($imageid,$status);
				//echo $this->db->last_query();exit;
				if(count($updatestatus)>0)
				{
					if($status==0)
					{
						$this->session->set_flashdata('success'," Image successfully deactivate");
					}else{
						$this->session->set_flashdata('success',"Image successfully activate");
					}
					redirect('inventory/addbannerslist');
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
}		
?>