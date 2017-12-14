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
		$data['banner_button']=$this->showups_model->banner_count(date('Y-m-d'));
		$this->template->write_view('content', 'seller/showups/homepagebanner',$data);
		$this->template->render();
	}
	public function addhomebanner()
	{
		$data['banner_count'] = $this->showups_model->banner_limit();
		//echo '<pre>';print_r($data['banner_count']);exit;
		$this->template->write_view('content', 'seller/showups/addhomebanner',$data);
		$this->template->render();
	}
	public function catehorybanner()
	{
		$data['banner_count'] = $this->showups_model->banner_limit();
		//echo '<pre>';print_r($data['banner_count']);exit;
		$this->template->write_view('content', 'seller/banners/addbanner',$data);
		$this->template->render();
	}
	public function catehorybannerlist()
	{
		$data['banner_list'] = $this->showups_model->banner_list($this->session->userdata('seller_id'));
		//echo '<pre>';print_r($data['banner_count']);exit;
		$this->template->write_view('content', 'seller/banners/list',$data);
		$this->template->render();
	}
	public function getrelateddata()
	{
		$post=$this->input->post();
		$sid=$this->session->userdata('seller_id');
		if($post['option']==1){
			$details=$this->showups_model->category_data($sid);
		}if($post['option']==2){
			$details=$this->showups_model->subcategory_data($sid);
		}if($post['option']==3){
			$details=$this->showups_model->subitem_data($sid);
		}if($post['option']==4){
			$details=$this->showups_model->item_data($sid);
		}if($post['option']==5){
			$details=$this->showups_model->products_data($sid);
		}
		if(count($details)>0){
		$data['msg']=1;
		$data['detail']=$details;
		echo json_encode($details);exit;
		}else{
			$data['msg']=0;
			echo json_encode($data);exit;
		}
		
	}
	public function savebanners(){
			$post=$this->input->post();
			move_uploaded_file($_FILES['image']['tmp_name'], "assets/banners/" . $_FILES['image']['name']);
			$date = date('Y-m-d H:s:i');
			$date2= date('Y-m-d H:s:i', strtotime($date. ' + '.$post['expirydate'].' days'));
			$data=array(         
				'seller_id' => $this->session->userdata('seller_id'),
				'position'=>$post['position'],  
				'name'=>$_FILES['image']['name'],    
				'link'=>$post['link'],  
				'selected_id'=>$post['selecteddata'],  
				'seller_id' => $this->session->userdata('seller_id'),
				'created_at'=>date('Y-m-d H:i:s'),		
				'expirydate'=>$date2		
			);
			//echo '<pre>';print_r($data);exit;
			$banners=$this->showups_model->save_banners_list_image($data);
			if(count($banners)>0){
				$this->session->set_flashdata('success',"Banner successfully Added!");
				redirect('seller/showups/catehorybannerlist/');
			}else{
				$this->session->set_flashdata('error',"Stechnical error occurred! Please try again later.");
				redirect('seller/showups/catehorybanner/');
			}
					
	}
	
	
	public function save_banner(){
		
		$bannercheck=$this->showups_model->banner_exits($_FILES['home_banner']['name']);
		if(count($bannercheck)>0){
			$this->session->set_flashdata('deactive',"Item already added.");
			redirect('seller/showups/homepagebanner');
		}else{
				$bannercount=$this->showups_model->banner_count(date('Y-m-d H:i:s A'));
				if(count($bannercount)<=5){
					$date = date('Y-m-d h:i:s');
					$date1 = strtotime($date);
					$date2 = strtotime("+1 day", $date1);
						move_uploaded_file($_FILES['home_banner']['tmp_name'], "uploads/banners/" . $_FILES['home_banner']['name']);
					$data=array(         
						'seller_id' => $this->session->userdata('seller_id'),
						'intialdate'=>date("Y-m-d H:i:s"),  
						'expairydate'=>date('Y-m-d h:i:s', $date2),   
						'file_name'=>$_FILES['home_banner']['name'],
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s')		
						);
						//echo '<pre>';print_r($data);exit;
						$banner=$this->showups_model->save_banner_image($data);
						if(count($banner)>0){
							$this->session->set_flashdata('active',"Banner successfully Added!");
							redirect('seller/showups/homepagebanner');
						}else{
							$this->session->set_flashdata('deactive',"Sorry, a technical error occurred! Please try again later.");
							redirect('seller/showups/homepagebanner');
						}
						
				}else{
					$this->session->set_flashdata('deactive',"while adding it should come like 1 of 6 , 2 of 6...once limit completes, limit for Home banner for Today has completed. add for next day.limit of Home banner for today has completed.");
					redirect('seller/showups/homepagebanner');
				}
		}
	}
	public function banner_status()
	{
		 $id = base64_decode($this->uri->segment(4));
		
		$sellerid = base64_decode($this->uri->segment(5));
		$status = base64_decode($this->uri->segment(6));
		$activestatus=$this->showups_model->banner_count(date('Y-m-d H:i:s A'));
		//echo "<pre>";print_r($activestatus);exit;
		if($status==0){
			if(count($activestatus)>5){
				$this->session->set_flashdata('deactive',"6 Banners active");
				redirect('seller/showups/homepagebanner');
			}else{
				
					if($status==1)
					{
						$status=0;
					}else{
						$status=1;
					}
					$data=array('status'=>$status);
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
		}else{
			
			if($status==1)
			{
				$status=0;
			}else{
				$status=1;
			}
			$data=array('status'=>$status);
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
	public function categorybanner_delete()
	{
		$id = base64_decode($this->uri->segment(4));
		$status = base64_decode($this->uri->segment(6));
		if($status == 1){
			$this->session->set_flashdata('deactive'," Opps!! Your Banner Is active");
			redirect('seller/showups/catehorybannerlist');
		}else{
			$updatestatus=$this->showups_model->delete_categorybanner($id);
			$this->session->set_flashdata('active'," Your Banner Delete successful");
			redirect('seller/showups/catehorybannerlist');
		}
	}
	
	
public function categorybanner_status()
	{
		$id = base64_decode($this->uri->segment(4));
		$status = base64_decode($this->uri->segment(5));
		//echo "<pre>";print_r($activestatus);exit;
		if($status==1)
			{
				$status=0;
			}else{
				$status=1;
			}
			$data=array('status'=>$status);
			$updatestatus=$this->showups_model->update_categorybanner_status($id,$data);
			//echo $this->db->last_query();exit;
			if(count($updatestatus)>0){
					if($status==1)
					{
					$this->session->set_flashdata('active'," Banner activation successful");
					}else{
					$this->session->set_flashdata('deactive',"Banner deactivation successful");
					}
					redirect('seller/showups/catehorybannerlist/');
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
		$products_ids=$this->Promotions_model->get_offer_adding_seller_products_data($this->session->userdata('seller_id'));
		if(isset($products_ids) && count($products_ids)>0){
			foreach ($products_ids as $cat_ida) {
				$date = new DateTime("now");
				$curr_date = $date->format('Y-m-d h:i:s A');
				$itemcheck=$this->Promotions_model->dealsoftheday_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				$season_itemcheck=$this->Promotions_model->season_sales_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				if(count($itemcheck)>0 && $itemcheck['expairdate']>=$curr_date || count($season_itemcheck)>0 && $season_itemcheck['expairdate']>=$curr_date ){
					$deals_ids_lists[]=array();
				}else{
					$deals_ids_lists[]=$cat_ida['item_id'];
				}
				
			}
			//echo '<pre>';print_r($deals_ids_lists);exit;
			$data['seller_prducts']=$deals_ids_lists; 
		}else{
			$data['seller_prducts']=array();
		}
		
		$data['catitemdata'] = $this->products_model->getcatsubcatpro();
		
		//echo '<pre>';print_r($data);exit; 
		//$data['seller_prducts']=array();
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
		$products_ids=$this->Promotions_model->get_offer_adding_seller_products_data($this->session->userdata('seller_id'));
		if(isset($products_ids) && count($products_ids)>0){
			foreach ($products_ids as $cat_ida) {
				$date = new DateTime("now");
				$curr_date = $date->format('Y-m-d h:i:s A');
				$itemcheck=$this->Promotions_model->topoffer_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				$season_itemcheck=$this->Promotions_model->season_sales_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				if(count($itemcheck)>0 && $itemcheck['expairdate']>=$curr_date  || count($season_itemcheck)>0 && $season_itemcheck['expairdate']>=$curr_date){
					$deals_ids_lists[]=array();
				}else{
					$deals_ids_lists[]=$cat_ida['item_id'];
				}
				
			}
			
			$data['seller_prducts']=$deals_ids_lists; 
		}else{
			$data['seller_prducts']=array();
		}
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
		$products_ids=$this->Promotions_model->get_offer_adding_seller_products_data($this->session->userdata('seller_id'));
		if(isset($products_ids) && count($products_ids)>0){
			foreach ($products_ids as $cat_ida) {
				$date = new DateTime("now");
				$curr_date = $date->format('Y-m-d h:i:s A');
				$itemcheck=$this->Promotions_model->topoffer_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				$deals_itemcheck=$this->Promotions_model->dealsoftheday_item_already_exits($cat_ida['item_id']);
				//echo $this->db->last_query();
				if(count($itemcheck)>0 && $itemcheck['expairdate']>=$curr_date || count($deals_itemcheck)>0 && $deals_itemcheck['expairdate']>=$curr_date  ){
					$deals_ids_lists[]=array();
				}else{
					$deals_ids_lists[]=$cat_ida['item_id'];
				}
				
			}
			
			$data['seller_prducts']=$deals_ids_lists; 
		}else{
			$data['seller_prducts']=array();
		}
		$data['catitemdata'] = $this->products_model->getcatsubcatpro();
	    $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		$this->template->write_view('content', 'seller/showups/addseasonsale',$data);
		$this->template->render();
	}

}