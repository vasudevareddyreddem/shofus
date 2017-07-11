

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Showups extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/Promotions_model');
		$this->load->model('seller/products_model');
	}

	public function home_page_banner()
	{
		$this->template->write_view('content', 'seller/showups/home_page_banner');
		$this->template->render();
	}

	public function save_banner(){
		if(isset($_POST)){
			if(!empty($_FILES['picture_one']['name'])){
				$config['upload_path'] = 'uploads/products/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['picture_one']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('picture_one')){
					$uploadData = $this->upload->data();
					$picture_one = $uploadData['file_name'];
				}else{
			$this->prepare_flashmessage("Image format Invalid..", 1);
				//return redirect('admin/fooditems');
				echo "<script>window.location='".base_url()."seller/showups/home_page_banner';</script>";
				}
			}else{
				$picture_one = '';
			}			
		}

		$banner=$this->showups_model->save_banner_image($this->session->userdata('seller_id'));
		//echo '<pre>';print_r($seller_location);exit;
		$data=array(         
			'seller_id' => $this->session->userdata('seller_id'),   
			'item_image'=>$picture_one			
			

			);

			$res=$this->products_model->insert($data);





	}

}