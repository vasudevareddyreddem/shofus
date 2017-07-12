

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Showups extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));		
		$this->load->model('seller/showups_model');
	}

	public function home_page_banner()
	{
		$this->template->write_view('content', 'seller/showups/home_page_banner');
		$this->template->render();
	}

	public function save_banner(){
		if(isset($_POST)){
			if(!empty($_FILES['home_banner']['name'])){
				$config['upload_path'] = 'uploads/banners/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['home_banner']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('home_banner')){
					$uploadData = $this->upload->data();
					$home_banner = $uploadData['file_name'];
				}else{
			$this->prepare_flashmessage("Image format Invalid..", 1);
				//return redirect('admin/fooditems');
				echo "<script>window.location='".base_url()."seller/showups/home_page_banner';</script>";
				}
			}else{
				$home_banner = '';
			}			
		}

		
		//echo '<pre>';print_r($seller_location);exit;
		$data=array(         
			'seller_id' => $this->session->userdata('seller_id'),   
			'file_name'=>$home_banner			
			);
		//echo '<pre>';print_r($data);exit;
			$banner=$this->showups_model->save_banner_image($data);
			if(count($banner)>0)
				{
				$this->session->set_flashdata('message','Banner successfully added');
				redirect('seller/showups/home_page_banner');
				}else{
				$this->session->set_flashdata('message','Some error are occured.');
				redirect('seller/showups/home_page_banner'); 
				}

	}

}