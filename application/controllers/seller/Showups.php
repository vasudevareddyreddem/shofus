

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Showups extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->helper(array('url','html','form'));
		$this->load->library(array('form_validation','session'));		
		$this->load->model('seller/showups_model');
		$this->load->model('seller/Promotions_model');
		$this->load->model('seller/products_model');
		
		
		
	}

	public function homepagebanner()
	{
		$data['seller_banner'] = $this->showups_model->seller_homebanners();
		//$data['auto'] = $this->showups_model->auto_update();
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/showups/homepagebanner',$data);
		$this->template->render();
	}
	public function addhomebanner()
	{
		$data['banner_count'] = $this->showups_model->banner_limit();
		//$one = 0;
		//$data['auto'] = $this->showups_model->auto_update();
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/showups/addhomebanner',$data);
		$this->template->render();
	}

	// public function activehomebanner()
	// {
	// 	$data['seller_banner'] = $this->showups_model->seller_homebanners();
	// 	//
	// 	$this->template->write_view('content', 'seller/showups/active_homebanner',$data);
	// 	$this->template->render();
	// }

	public function save_banner(){
		if(isset($_POST)){
			if(!empty($_FILES['home_banner']['name'])){
				$config['upload_path'] = 'uploads/banners/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['home_banner']['name'];
				//$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('home_banner')){
					$uploadData = $this->upload->data();
					$home_banner = $uploadData['file_name'];
				}else{
					$this->session->set_flashdata('message','Image format Invalid..');
				//$this->prepare_flashmessage("Image format Invalid..", 1);
				//return redirect('admin/fooditems');
				echo "<script>window.location='".base_url()."seller/showups/homepagebanner';</script>";
				}
			}else{
				
				$home_banner = '';
			}			
		}

		$date = date('Y-m-d h:i:s');
		$date1 = strtotime($date);
		$date2 = strtotime("+1 day", $date1);
		$bannercheck=$this->showups_model->banner_exits($home_banner);
		//echo "<pre>";print_r($bannercheck);exit;
		//echo $this->db->last_query();exit;
		if(($bannercheck['seller_id'] == $this->session->userdata('seller_id')) && ($bannercheck['expairydate'] >= date('Y-m-d')) ){
				$status=3;
			}else{
				$bannercount=$this->showups_model->banner_count(date('Y-m-d'));
				//echo $this->db->last_query();exit;
				if(count($bannercount)>5)
				{
					$status=2;
					}else
					{
						$data=array(         
						'seller_id' => $this->session->userdata('seller_id'),
						'intialdate'=>date("Y-m-d H:i:s"),  
						'expairydate'=>date('Y-m-d h:i:s', $date2),   
						'file_name'=>$home_banner,
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s')		
						);
						//echo '<pre>';print_r($data);exit;
						$banner=$this->showups_model->save_banner_image($data);
						$status=1;

					}
			}
			if($status==1){
			$this->session->set_flashdata('active',"Banner successfully Added!");
			redirect('seller/showups/homepagebanner');

		}else if($status==2){
			
		 $this->session->set_flashdata('deactive',"only 6 Images Per Day");
		 redirect('seller/showups/homepagebanner');	
		}else if($status==3){
		$this->session->set_flashdata('deactive',"Item already added.");
		redirect('seller/showups/homepagebanner');	
			
		}
		

	}
	public function banner_status()
	{
		$id = base64_decode($this->uri->segment(4));
		$sellerid = base64_decode($this->uri->segment(5));
		$status = base64_decode($this->uri->segment(6));
		//echo "<pre>";print_r($status);exit;
		if($status==1)
		{
			$status=0;
		}else{
			$status=1;
		}
		
			
		$data=array
		(
			
			'status'=>$status
		);
			$updatestatus=$this->showups_model->update_banner_status($id,$sellerid,$data);
			//echo $this->db->last_query();exit;
			if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('active'," Banner activation successful");
					}else{
						$this->session->set_flashdata('deactive',"Banner deactivation successful");
					}
					redirect('seller/showups/homepagebanner');
				}


	}

	public function banner_delete()
	{
		$id = base64_decode($this->uri->segment(4));
		$sellerid = base64_decode($this->uri->segment(5));
		$status = base64_decode($this->uri->segment(6));
		if($status == 1){
			$this->session->set_flashdata('deactive'," Opps!! Your Banner Is active");
			redirect('seller/showups/homepagebanner');
		}else{
			$updatestatus=$this->showups_model->delete_banner($id,$sellerid);
			$this->session->set_flashdata('active'," Your Banner Delete successful");
			redirect('seller/showups/homepagebanner');
		}
	}

	public function topoffers()
	{
		$data['seller_prducts']=$this->showups_model->get_top_offers_data($this->session->userdata('seller_id'));
		//echo "<pre>";print_r($data);exit;
		$data['catitemdata'] = $this->showups_model->gettop_offers();		
		$data['catitemdata1'] = $this->showups_model->gettop_offers();
		$data['cnt']= count($data['catitemdata1']);
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/showups/topoffers',$data);
		$this->template->render();
	}
	public function activetopoffers()
	{
		$data['seller_prducts']=$this->showups_model->get_top_offers_data($this->session->userdata('seller_id'));
		//echo "<pre>";print_r($data);exit;
		$data['catitemdata'] = $this->showups_model->gettop_offers();		
		$data['catitemdata1'] = $this->showups_model->gettop_offers();
		$data['cnt']= count($data['catitemdata1']);
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/showups/active_topoffers',$data);
		$this->template->render();
	}


	public function topofferactive(){
		$itemid = base64_decode($this->uri->segment(4));
		$status = base64_decode($this->uri->segment(5));
		//echo "<pre>";print_r($status);exit;
		if($status==1)
		{
			$status=0;
		}else{
			$status=1;
		}
		$data=array
		(
			'status'=>$status
		);
			$updatestatus=$this->showups_model->update_topoffers_status($itemid,$data);
		//echo "<pre>";print_r($status);exit;
		
		//echo "<pre>";print_r($data);exit;
		// if($status==1){
		// 	$this->session->set_flashdata('deactive'," No premition");
		// 	redirect('seller/showups/activetopoffers');
		// 	//echo 'No premition';
		// }else{
			
		// }
		//echo "<pre>";print_r($updatestatus);exit;
		if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('active'," offer activation successful");
					}else{
						$this->session->set_flashdata('deactive',"offer deactivation successful");
					}
					redirect('seller/showups/topoffers');
				}
		


	}

	public function addtopoffers()
	{
		$data['seller_prducts']=$this->Promotions_model->get_seller_products_data($this->session->userdata('seller_id'));
		$data['catitemdata'] = $this->products_model->getcatsubcatpro();
		
		//echo '<pre>';print_r($data);exit; 
		$data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/addtopoffers',$data);
		$this->template->render();
	}

	public function dealsofday()
	{
		$data['seller_prducts']=$this->showups_model->get_deals_of_day_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->showups_model->getdeals_ofthe_day();
	   $data['catitemdata1'] = $this->showups_model->getdeals_ofthe_day();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/dealsofday',$data);
		$this->template->render();
	}
	// public function activedealsofday(){
	// 	$data['seller_prducts']=$this->showups_model->get_deals_of_day_data($this->session->userdata('seller_id'));
	// 	 $data['catitemdata'] = $this->showups_model->getdeals_ofthe_day();
	//    $data['catitemdata1'] = $this->showups_model->getdeals_ofthe_day();
	// 	$data['cnt']= count($data['catitemdata1']);
	// 	$this->template->write_view('content', 'seller/showups/active_dealsofday',$data);
	// 	$this->template->render();
	// }
	public function dealsofdayactive(){
		$itemid = base64_decode($this->uri->segment(4));
		$status = base64_decode($this->uri->segment(5));
		//echo "<pre>";print_r($status);exit;
		if($status==1)
		{
			$status=0;
		}else{
			$status=1;
		}
		$data=array
		(
			'status'=>$status
		);
			$updatestatus=$this->showups_model->update_deals_ofthe_day_status($itemid,$data);
		//echo "<pre>";print_r($status);exit;
		
		//echo "<pre>";print_r($data);exit;
		// if($status==1){
		// 	$this->session->set_flashdata('deactive'," No premition");
		// 	redirect('seller/showups/activedealsofday');
		// 	//echo 'No premition';
		// }else{
			
		// }
		//echo "<pre>";print_r($updatestatus);exit;
		if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('active'," offer activation successful");
					}else{
						$this->session->set_flashdata('deactive',"offer deactivation successful");
					}
					redirect('seller/showups/dealsofday');
				}
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
		$data['seller_prducts']=$this->showups_model->get_season_sales_data($this->session->userdata('seller_id'));
		 $data['catitemdata'] = $this->showups_model->getseason_sales();
	   $data['catitemdata1'] = $this->showups_model->getseason_sales();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/seasonsale',$data);
		$this->template->render();
	}
	// public function activeseasonsale(){
	// 	$data['seller_prducts']=$this->showups_model->get_season_sales_data($this->session->userdata('seller_id'));
	// 	 $data['catitemdata'] = $this->showups_model->getseason_sales();
	//    $data['catitemdata1'] = $this->showups_model->getseason_sales();
	// 	$data['cnt']= count($data['catitemdata1']);
	// 	$this->template->write_view('content', 'seller/showups/active_seasonsale',$data);
	// 	$this->template->render();
	// }

	public function seasonsaleactive(){
		$itemid = base64_decode($this->uri->segment(4));
		$status = base64_decode($this->uri->segment(5));
		//echo "<pre>";print_r($status);exit;
		if($status==1)
		{
			$status=0;
		}else{
			$status=1;
		}
		$data=array
		(
			'status'=>$status
		);
			$updatestatus=$this->showups_model->update_season_sales_status($itemid,$data);
		//echo "<pre>";print_r($status);exit;
		
		//echo "<pre>";print_r($data);exit;
		// if($status==1){
		// 	$this->session->set_flashdata('deactive'," No premition");
		// 	redirect('seller/showups/activeseasonsale');
		// 	//echo 'No premition';
		// }else{
			
		// }
		//echo "<pre>";print_r($updatestatus);exit;
		if(count($updatestatus)>0)
				{
					if($status==1)
					{
						$this->session->set_flashdata('active'," offer activation successful");
					}else{
						$this->session->set_flashdata('deactive',"offer deactivation successful");
					}
					redirect('seller/showups/seasonsale');
				}
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