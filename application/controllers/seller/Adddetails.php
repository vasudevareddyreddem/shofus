<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Seller_adddetails.php');

class Adddetails extends Seller_adddetails{

	public function __construct() {
		parent::__construct();
		$this->load->model('seller/adddetails_model');
		$this->load->model('seller/products_model');
		$this->load->model('seller/sellercat_model');
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
	}

	 public function index() {	
	 
	  $this->load->view('seller/layouts/header');
	  $this->load->view('seller/adddetails/index');
	}
 
  //store 
	public function updatebasicdetails()
	{  
		$data = array(

		'seller_id' => $this->session->userdata('seller_id'),
		'seller_name' => $this->input->post('seller_name'),
		'seller_email' => $this->input->post('seller_email'),
		'seller_address' => $this->input->post('seller_address'),
		'created_at'  => date('Y-m-d H:i:s'),
		'updated_at'  => date('Y-m-d H:i:s')

		);
		$res=$this->adddetails_model->insertseller_basic($data);
		if(count($res)>0)
		  {
			$this->session->set_flashdata('sucess','personal data successfully added');
			return redirect('seller/adddetails/categories');
		  }else{
			  
			 $this->session->set_flashdata('error','Some error are occured.');
			return redirect('seller/adddetails/updatebasicdetails'); 
		  }


    }

	public function categories() {	 

		$data['getcat'] = $this->products_model->getcatdata();
		$this->load->view('seller/layouts/header');
		$this->load->view('seller/adddetails/sellercategory', $data);

	}
	public function updateseeler_details()
	{  
			$post=$this->input->post();
			$result = array_unique($post['seller_cat']);
			foreach($result as $subcats){
			$carname=$this->adddetails_model->get_categories_name($subcats);
			$data = array(
			'seller_id' => $this->session->userdata('seller_id'),
			'seller_category_id'=> $subcats,
			'category_name'=> $carname['category_name'],
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);
			if($subcats!=''){
			$res=$this->adddetails_model->insertseller_cat($data);
			}
			
			}
			
			if(count($res)>0)
			{
			$this->session->set_flashdata('success','category details updated');
			return redirect('seller/adddetails/storedetails');
			}


    }
	public function storedetails()
	{  
		$this->load->view('seller/layouts/header');
		$this->load->view('seller/adddetails/storedetails');

	}
	public function personaldetails()
	{  
		$this->load->view('seller/layouts/header');
		$this->load->view('seller/adddetails/personaldetails');
	}
	
	
	public function seller_storedetails()
	{  
		$post=$this->input->post();
		//echo '<pre>';print_r($_FILES);
		move_uploaded_file($_FILES['timimages']['tmp_name'], "assets/sellerfile/" . $_FILES['timimages']['name']);
		move_uploaded_file($_FILES['tanimages']['tmp_name'], "assets/sellerfile/" . $_FILES['tanimages']['name']);
		move_uploaded_file($_FILES['cstimag']['tmp_name'], "assets/sellerfile/" . $_FILES['cstimag']['name']);

		//echo '<pre>';print_r($post);
			$data = array(
			'seller_id' => $this->session->userdata('seller_id'), 
			'store_name' => $post['storename'], 
			'addrees1' => $post['address1'],    
			'addrees2' => $post['address2'],    
			'pin_code' => $post['pincode'],    
			'other_shops'  =>$post['other_shops'],
			'other_shops_location'  =>$post['other_shops_location'],
			'deliveryes'  =>$post['deliveryes'],
			'weblink'  =>$post['weblink'],
			'tin_vat'  =>$post['tin'],
			'tinvatimage'  =>$_FILES['timimages']['name'],
			'tan'  =>$post['tan'],
			'tanimage'  =>$_FILES['tanimages']['name'],
			'cst'  =>$post['cst'],
			'cstimage'  =>$_FILES['cstimag']['name'],
			'gstin'  =>$post['gstin'],
			 'created_at'  => date('Y-m-d H:i:s'),
			);
			//echo '<pre>';print_r($data);exit;
			$addstoredetails=$this->adddetails_model->storedetails_adding($data);
			
			if(count($addstoredetails)>0)
			{
			$this->session->set_flashdata('success','category details updated');
			return redirect('seller/adddetails/personaldetails');
			}
			//echo '<pre>';print_r($data);exit;


    }
	
	 public function updatepersonaldetails()
	{  

   $post=$this->input->post();
 
   $data = array(
    'seller_bank_account' => $post['bank_account'], 
    'seller_adhar' => $post['aadhaar_card'],
    'seller_pan_card' => $post['pan_card'],    
    'created_at'  => date('Y-m-d H:i:s'),
    'updated_at'  => date('Y-m-d H:i:s')
  
  );
   //echo '<pre>';print_r($data);exit;
    $result=$this->adddetails_model->seller_personal_details($data,$this->session->userdata('seller_id'));
   
    if(count($result)>0)
      {
		$this->session->set_flashdata('succes','');
		return redirect('seller/adddetails/setpassword');

      }


    }
	public function setpassword()
	{  
		$this->load->view('seller/layouts/header');
		$this->load->view('seller/adddetails/setpassword');


    }
	public function setpasswordpost()
	{  
		$post = $this->input->post();
		$seller_id = $this->session->userdata('seller_id');
		//echo '<pre>';print_r($seller_id);exit;
		$this->form_validation->set_rules('password', 'New password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'conformpassword', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
		$data['change_errors'] = validation_errors();
		$$this->load->view('seller/layouts/header');
		$this->load->view('seller/adddetails/setpassword');
		
		}else{
			//echo '<pre>';print_r($post);exit;
			$newpassword=md5($post['password']);
			$conpassword=md5($post['confirmpassword']);
			if($newpassword == $conpassword){
				$changedata=array('seller_password'=>$conpassword);
				$passwordchange = $this->adddetails_model->setpassword($seller_id,$changedata);
				if(count($passwordchange)>0){
					$completeregistration = $this->adddetails_model->update_seller_competed($seller_id,1);
					$sellerdetails = $this->adddetails_model->getseller_details($seller_id);
					$sellerlogindetails  = array(
					'seller_id'    => $sellerdetails['seller_id'],
					'seller_name'  => $sellerdetails['seller_name'],
					'seller_email' => $sellerdetails['seller_email'],
					'seller_firsttime' => $sellerdetails['first_time'],
					'loggedin'   => TRUE,
					);
					//echo '<pre>';print_r($sellerlogindetails);exit;
					$this->session->set_userdata($sellerlogindetails);
					$this->session->set_flashdata('updatpassword',"Password successfully changed!");
					redirect('seller/dashboard');	
				}
				
			}else{
				$this->session->set_flashdata('matchpassworderror',"New password and confirm password was not matching");
				redirect('seller/adddetails/setpassword');
			}
		}


    }
	
	


}