

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Showups extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));		
		$this->load->model('seller/showups_model');
		$this->load->model('seller/Promotions_model');
		$this->load->model('seller/products_model');
		
		
		
	}

	public function homepagebanner()
	{
		$this->template->write_view('content', 'seller/showups/homepagebanner');
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
			'file_name'=>$home_banner,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s')		
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

	public function topoffers()
	{
		$this->template->write_view('content', 'seller/showups/topoffers');
		$this->template->render();
	}
	public function activetopoffers(){
		$data['seller_prducts']=$this->showups_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->showups_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->showups_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/active_topoffers',$data);
		$this->template->render();
	}

	public function addtopoffers()
	{
		$data['seller_prducts']=$this->Promotions_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/addtopoffers',$data);
		$this->template->render();
	}

	public function dealsofday()
	{
		$this->template->write_view('content', 'seller/showups/dealsofday');
		$this->template->render();
	}
	public function activedealsofday(){
		$data['seller_prducts']=$this->showups_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->showups_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->showups_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/active_dealsofday',$data);
		$this->template->render();
	}

	public function adddealsofday()
	{
		$data['seller_prducts']=$this->Promotions_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/adddealsofday',$data);
		$this->template->render();
	}

	public function seasonsale()
	{
		$this->template->write_view('content', 'seller/showups/seasonsale');
		$this->template->render();
	}
	public function activeseasonsale(){
		$data['seller_prducts']=$this->showups_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->showups_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->showups_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/active_seasonsale',$data);
		$this->template->render();
	}

	public function addseasonsale()
	{
		$data['seller_prducts']=$this->Promotions_model->get_seller_products_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/addseasonsale',$data);
		$this->template->render();
	}

}