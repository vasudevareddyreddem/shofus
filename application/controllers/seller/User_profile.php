<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class user_profile extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		
		$this->load->model('seller/user_profile_model');
		$this->load->library('session');
       
		
 	}

 	public function index()
	{
			   
	   	$data['sellers_cat_display'] = $this->user_profile_model->seller_categories();
	   	//$data['seller_orders'] = $this->user_profile_model->total_orders();
	   //echo print_r($data);exit;
	   //echo '<pre>';print_r($some);exit;
		$this->template->write_view('content', 'seller/userprofile/index',$data);
		$this->template->render();


	}
	public function profile_pic()
	{
		$result['profiles'] = $this->user_profile_model->profile_pic_get();
		//print_r($data);exit;
		$this->template->write_view('content', 'seller/userprofile/profilepic',$result);
		$this->template->render();
	}

	public function profile_pic_store()
	{
		if(isset($_POST)){
			if(!empty($_FILES['picture']['name'])){
				$config['upload_path'] = 'uploads/profile/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['picture']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('picture')){
					$uploadData = $this->upload->data();
					$picture = $uploadData['file_name'];
				}else{
			$this->prepare_flashmessage("Image format Invalid..", 1);
				//return redirect('admin/fooditems');
				echo "<script>window.location='".base_url()."seller/user_profile/profile_pic';</script>";
				}
			}else{
				$picture = '';
			}
		}

		$pic = array(
			'seller_id' => $this->session->userdata('seller_id'),
			'profile_pic'=>$picture

			);
		$res=$this->user_profile_model->profile_pic_save($pic);
		if($res)

			{
				$this->session->set_flashdata('message',"Profile Pic Updated Successfully",0);

				echo "<script>window.location='".base_url()."seller/user_profile/profile_pic';</script>";

			}
			else
			{

				$this->set_flashdata('message',"Failed to Insert..", 1);
				//return redirect(base_url('seller/user_profile/profile_pic'));
				echo "<script>window.location='".base_url()."seller/user_profile/profile_pic';</script>";
			}
	}

 }