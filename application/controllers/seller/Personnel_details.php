<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Personnel_details extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('seller/products_model');
		$this->load->model('seller/Personnel_details_model');
		$this->load->model('seller/adddetails_model');
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
       // $this->load->library('pagination');
		
 	}

	public function index()
	{
			   
	   $sid= $this->session->userdata('seller_id');
	   $data['getcat'] = $this->products_model->getcatdata();
	   $data['seller_categorudetails'] = $this->Personnel_details_model->get_store_category_detail($sid);
	   $data['seller_storedetails'] = $this->Personnel_details_model->get_all_storedetail($sid);
	   $data['select_areas']=$this->adddetails_model->get_seletedareas();
	   $location = $this->Personnel_details_model->get_all_locations($sid);
	   //echo '<pre>';print_r($location);exit;
	   //$data = array();
	   $data['orther_shops'] = explode(",",$location['other_shops_location']);
	   //$locations_list = explode(";",$data['orther_shops']);
			//$location_array = array();
	   //echo '<pre>';print_r($data);exit;	
			
		$this->template->write_view('content', 'seller/personneldetails/index', $data);
		$this->template->render();


	}
	
public function updatestore()
{
    $data = array(
	'seller_business_name' => $this->input->post('seller_business_name'),
	'number_oulets' => $this->input->post('out_lets'),
	'number_oulets' => $this->input->post('out_lets'),
	'seller_location' => $this->input->post('seller_location'),
	'seller_servicetime' => $this->input->post('sellr_servicetime'),
	'delivery_own_us' => $this->input->post('own_us'),
	'orther_shop_location' => $this->input->post('other_shop'),
	'any_web_link' => $this->input->post('web_link')
	
	);
$res=$this->Personnel_details_model->updatesd($data);
if($res)
			{

                 $this->prepare_flashmessage("Display Details are Updated Successfully..", 0);
				return redirect('seller/Personnel_details');
			}
			else
			{

				$this->prepare_flashmessage("Failed to Insert..", 1);
				return redirect('seller/Personnel_details');
			}	
}	

//personal details update
public function updatepd()
{
	$data=$this->input->post();
    unset($data['submit']);

		$filename="report_".rand(1000,time());//time();
		$config['upload_path'] ='uploads/reports/';
		$config['allowed_types'] = '*';
		$config['file_name']= $filename;
		$config['overwrite']= FALSE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$imageDetailArray = array();
		$images=array(); 
		for($i=0; $i<count($_FILES['report_file']['name']); $i++)
		{
		$_FILES['userfile']['name']= $_FILES['report_file']['name'][$i];
		$_FILES['userfile']['type']= $_FILES['report_file']['type'][$i];
		$_FILES['userfile']['tmp_name']= $_FILES['report_file']['tmp_name'][$i];
		$_FILES['userfile']['error']= $_FILES['report_file']['error'][$i];
		$_FILES['userfile']['size']= $_FILES['report_file']['size'][$i];
	     $this->upload->do_upload(); 
		$imageDetailArray=$this->upload->data();
		$images[]=$imageDetailArray['raw_name'].$imageDetailArray['file_ext']; // images names we need to inert into images table 
		}
	
	
	 $data = array(
	
	
	'seller_bank_account' => $this->input->post('bank_account'),
	'seller_pan_card ' => $this->input->post('pan_card'),
	'seller_adhar' => $this->input->post('adhar_card')
	
	);


$res=$this->Personnel_details_model->updatepd($data);
if($res &&  count($images)>0)
			{
			$img_result=$this->Personnel_details_model->insertFiles($images);
			}
if($res)
		{
        $this->prepare_flashmessage("Personnel Details are Updated Successfully..", 0);
				return redirect('seller/Personnel_details');
			}
			else
			{
				$this->prepare_flashmessage("Failed to Insert..", 1);
			
			return redirect('seller/Personnel_details');
			}	
}


public function updatebd()
{
	
	$post = $this->input->post();
	$sid = $this->session->userdata('seller_id');
	$details=$this->Personnel_details_model->get_seller_details($sid);
	///echo '<pre>';print_r($details);exit;
	if($details['seller_email']!= $post['seller_email']){
		
		$email_check=$this->Personnel_details_model->get_seller_email_check($post['seller_email']);
		//ECHO '<pre>';print_r($email_check);
		if(count($email_check)>0){
		$this->session->set_flashdata('errormessage',"Email ID already exits. Please use another Email id!");
		redirect('seller/Personnel_details');
		}
	}
	if($details['seller_mobile']!= $post['seller_mobile']){
		
		$mobile_check=$this->Personnel_details_model->get_seller_mobile_check($post['seller_mobile']);
		//ECHO '<pre>';print_r($mobile_check);
		if(count($mobile_check)>0){
		$this->session->set_flashdata('errormessage',"Mobile NUmber already exits. Please use another Another Mobile number!");
		redirect('seller/Personnel_details');
		}
	}
	//ECHO '<pre>';print_r($post);exit;
	$data = array(
	'seller_name' => $post['seller_name'],
	'seller_email' =>  $post['seller_email'],
	'seller_mobile' =>  $post['seller_mobile'],
	);
	$result=$this->Personnel_details_model->updatebd($sid,$data);
	if(count($result)>0)
		{
		$this->prepare_flashmessage("Basic Details are Updated Successfully..", 0);
		$this->session->set_flashdata('updatemessage',"Basic Details are Updated Successfully!");
		return redirect('seller/Personnel_details');
		}else
			{
			$this->prepare_flashmessage("Failed to Insert..", 1);
			return redirect('seller/Personnel_details');
			}	
	
}

public function changepassword(){
	$sid = $this->session->userdata('seller_id');
	$customerdetail=$this->session->userdata('userdetails');
		$changepasword = $this->input->post();
		//echo '<pre>';print_r($changepasword);
		$currentpostpassword=md5($changepasword['oldpassword']);
		$newpassword=md5($changepasword['newpassword']);
		$conpassword=md5($changepasword['confirmpassword']);
		$this->load->model('users_model');
			$userdetails=$this->Personnel_details_model->get_seller_details($sid);

			//echo '<pre>';print_r($userdetails);exit;			
			$currentpasswords=$userdetails['seller_password'];
			//print_r($currentpasswords);exit;
			if($currentpostpassword == $currentpasswords ){
				if($newpassword == $conpassword){
						$this->load->model('users_model');
						$passwordchange = $this->Personnel_details_model->set_password($sid,$conpassword);
						//echo $this->db->last_query();exit;
						if (count($passwordchange)>0)
							{
								$this->session->set_flashdata('tab',5);
								$this->session->set_flashdata('updatpassword',"Password successfully changed!");
								redirect('seller/Personnel_details');
							}
							else
							{
								$this->session->set_flashdata('tab',5);
								$this->session->set_flashdata('passworderror',"Something went wrong in change password process!");
								redirect('seller/Personnel_details');
							}
				}else{
					$this->session->set_flashdata('tab',5);
					$this->session->set_flashdata('passworderror',"New password and confirm password was not matching");
					redirect('seller/Personnel_details');
				}
			}else{
					$this->session->set_flashdata('tab',5);
					$this->session->set_flashdata('passworderror',"Your Old password is incorrect. Please try again.");
					redirect('seller/Personnel_details');
				}
		
	} 




public function seller_storedetails()
	{  
		$post=$this->input->post();
		//echo "<pre>";print_r($post);exit;
		//echo '<pre>';print_r($_FILES);
					$seller_upload_file=$this->Personnel_details_model->get_upload_file($this->session->userdata('seller_id'));
		//echo '<pre>';print_r($seller_upload_file);
			if($_FILES['timimages']['name']!=''){
			$tinimg=$_FILES['timimages']['name'];
			move_uploaded_file($_FILES['timimages']['tmp_name'], "assets/sellerfile/" . $_FILES['timimages']['name']);

			}else{
			$tinimg=$seller_upload_file['tinvatimage'];
			}

			if($_FILES['tanimages']['name']!=''){
			$tanimg=$_FILES['tanimages']['name'];
			move_uploaded_file($_FILES['tanimages']['tmp_name'], "assets/sellerfile/" . $_FILES['tanimages']['name']);

			}else{
			$tanimg=$seller_upload_file['tanimage'];
			}
			if($_FILES['cstimag']['name']!=''){
			$cetimg=$_FILES['cstimag']['name'];
			move_uploaded_file($_FILES['cstimag']['tmp_name'], "assets/sellerfile/" . $_FILES['cstimag']['name']);

			}else{
			$cetimg=$seller_upload_file['cstimage'];
			}
			
			if($_FILES['gstimag']['name']!=''){
			$gstinimage=$_FILES['gstimag']['name'];
			move_uploaded_file($_FILES['gstimag']['tmp_name'], "assets/sellerfile/" . $_FILES['gstimag']['name']);

			}else{
			$gstinimage=$seller_upload_file['gstinimage'];
			}

			$location_name = $post['other_shops_location'];
			//echo '<pre>';print_r($location_name);exit;
			$lock_string = implode(",", $location_name);
			//echo '<pre>';print_r($lock_string);exit;
			$locations_list = explode(";",$lock_string);
			$location_array = array();
			foreach($locations_list as $store_locations)
			{
			    $location_array[] = array('other_shops_location' =>$store_locations);
			}

		//echo '<pre>';print_r($location_array);exit;
			$data = array(
			'store_name' => $post['storename'], 
			'addrees1' => $post['address1'],    
			'addrees2' => $post['address2'],    
			'pin_code' => $post['pincode'],    
			'other_shops'  =>$post['other_shops'],
			'other_shops_location'  =>$store_locations,
			//'deliveryes'  =>$post['deliveryes'],
			'weblink'  =>$post['weblink'],
			'tin_vat'  =>$post['tin'],
			'tinvatimage'  =>$tinimg,
			'tan'  =>$post['tan'],
			'tanimage'  =>$tanimg,
			'cst'  =>$post['cst'],
			'cstimage'  =>$cetimg,
			'gstinimage'  =>$gstinimage,
			 'created_at'  => date('Y-m-d H:i:s'),
			);
			//echo '<pre>';print_r($data);exit;
			$addstoredetails=$this->Personnel_details_model->storedetails_adding($this->session->userdata('seller_id'),$data);
			
			if(count($addstoredetails)>0)
			{
			$this->session->set_flashdata('tab',3);
			$this->session->set_flashdata('storeupdatemessage','Store details updated');
			return redirect('seller/Personnel_details');
			}
			//echo '<pre>';print_r($data);exit;


    }
	
	
	public function seller_categories(){
			$post=$this->input->post();
			//echo'<pre>';print_r($post);exit;
			$result = array_unique($post['seller_cat']);
			
			$catresult=$this->Personnel_details_model->get_old_seller_categories($this->session->userdata('seller_id'));
			foreach($catresult as $delcats){
				
				$this->Personnel_details_model->delet_get_old_seller_categories($delcats['seller_cat_id']);
			}
			
			//echo'<pre>';print_r($result);//exit;
			foreach($result as $subcats){
			$carname=$this->Personnel_details_model->get_categories_name($subcats);

			$data = array(
			'seller_id' => $this->session->userdata('seller_id'),
			'seller_category_id'=> $subcats,
			'category_name'=> $carname['category_name'],
			'created_at'=> date('Y-m-d h:i:s'),
			'updated_at'=>  date('Y-m-d h:i:s'),
			);
			//echo'<pre>';print_r($data);exit;
			if($subcats!=''){
				$res=$this->Personnel_details_model->insertseller_cat($data);
			}
			}
			
			if(count($res)>0)
			{
			$this->session->set_flashdata('tab','2');
			$this->session->set_flashdata('catupdatemessage','Category details updated');
			return redirect('seller/Personnel_details');
			}
		
	}
	
	
public function personal_details_updatebd()
{
	
	$post = $this->input->post();
	$sid = $this->session->userdata('seller_id');
	//ECHO '<pre>';print_r($post);exit;
	$data = array(
	'seller_bank_account' => $post['bank_account'],
	'seller_account_name' => $post['account_name'],
    'seller_aaccount_ifsc_code' => $post['ifsccode'],
	);
	$result=$this->Personnel_details_model->updatebd($sid,$data);
	if(count($result)>0)
		{
		$this->prepare_flashmessage("Personal Details are Updated Successfully..", 0);
		$this->session->set_flashdata('tab',4);

		$this->session->set_flashdata('perupdatemessage',"Bank Details are Updated Successfully!");
		return redirect('seller/Personnel_details');
		}else
			{
			$this->session->set_flashdata('tab',4);
			$this->prepare_flashmessage("Failed to Insert..", 1);
			return redirect('seller/Personnel_details');
			}	
	
}


public function updatebankdetails()
{
	
	$data=$this->input->post();
    unset($data['submit']);

		$filename="report_".rand(1000,time());//time();
		$config['upload_path'] ='uploads/reports/';
		$config['allowed_types'] = '*';
		$config['file_name']= $filename;
		$config['overwrite']= FALSE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$imageDetailArray = array();
		$images=array(); 
		for($i=0; $i<count($_FILES['report_file']['name']); $i++)
		{
		$_FILES['userfile']['name']= $_FILES['report_file']['name'][$i];
		$_FILES['userfile']['type']= $_FILES['report_file']['type'][$i];
		$_FILES['userfile']['tmp_name']= $_FILES['report_file']['tmp_name'][$i];
		$_FILES['userfile']['error']= $_FILES['report_file']['error'][$i];
		$_FILES['userfile']['size']= $_FILES['report_file']['size'][$i];
	     $this->upload->do_upload(); 
		$imageDetailArray=$this->upload->data();
		$images[]=$imageDetailArray['raw_name'].$imageDetailArray['file_ext']; // images names we need to inert into images table 
		}
	
	$data = array(
	
	
	'seller_bank' => $this->input->post('seller_bank'),
	'seller_pan' => $this->input->post('seller_pan')
	
	);
$res=$this->Personnel_details_model->updatebankd($data);	
	if($res &&  count($images)>0)
			{
			$img_result=$this->Personnel_details_model->insertFiles($images);
			}
			
if($res)
	{
        $this->prepare_flashmessage("Bank Details are Updated Successfully..", 0);
		return redirect('seller/Personnel_details');
			}
			else
			{
				$this->prepare_flashmessage("Failed to Insert..", 1);
				return redirect('seller/Personnel_details');
			}						
	}	
}	
?>