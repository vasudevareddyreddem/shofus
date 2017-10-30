<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Products extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/products_model');
		$this->load->model('seller/dashboard_model');
		$this->load->model('inventory_model');
		
       // $this->load->library('pagination');
		
	}

	public function index()
	{
		
		
	   
	   $data['catitemdata'] = $this->products_model->getcatsubcatpro();
	   $data['seller_prducts'] = $this->products_model->get_seller_products($this->session->userdata('seller_id'));
	   $data['status_details'] = $this->products_model->get_seller_details($this->session->userdata('seller_id'));
	   //echo '<pre>';print_r($data);exit;
	   $data['catitemdata1'] = $this->products_model->getcatsubcatpro();
		$data['cnt']= count($data['catitemdata1']);
		
		$this->template->write_view('content', 'seller/products/index', $data);
		$this->template->render();

	}
	
	public function create()
	{
		$data = $this->dashboard_model->bank_status();
  //echo "<pre>";print_r($data);exit;
	  if($data['bank_complete']==0){
	  	//echo "<pre>";print_r($data);exit;
	    redirect('seller/dashboard/');
	  }else{
		$sid = $this->session->userdata('seller_id');
		$data['category_details'] = $this->products_model->get_seller_catdata($sid);
		$color_details = $this->products_model->get_colores();
		$size_details = $this->products_model->get_sizes_list();
		$uksize_details = $this->products_model->get_uksizes_list();
		$data['items'] = $this->products_model->auto_items();
		$result=$this->products_model->get_typeahead_products();
		if(isset($result) && count($result)>0){
		foreach ($result as $list){
			
			$pnames[]=$list['item_name'];
			
		}
		$data['pdata']=implode("','",$pnames);
		}else{
			$data['pdata']='';
		}
		foreach($color_details  as $colors){
			
			$color_list[]=$colors['color_name'];
		}
		foreach($size_details  as $sizes){
			
			$sizes_list[]=$sizes['size_name'];
		}
		foreach($uksize_details  as $sizes){
			
			$uksizes_list[]=$sizes['size_name'];
		}
		
		$data['color_lists']=implode(",",$color_list);
		$data['sizes_lists']=implode(",",$sizes_list);
		$data['uksizes_lists']=implode(",",$uksizes_list);
		//echo '<pre>';print_r($data);exit;
		
		$this->template->write_view('content', 'seller/products/add', $data);
		$this->template->render();
	}

	}
	public function get_subcaregories_list()
	{
		$sid = $this->session->userdata('seller_id'); 
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$data['subcategory_details'] = $this->products_model->get_subcategoies($post['catid']);
		$this->load->view('seller/products/subcategorylist',$data);
		

	}
	
	public function getajaxsubcat()
	{
		
	$cat=$this->input->post('category_id');
	$result=$this->products_model->getsubcatdata($cat);
	
	if(count($result)>0){
		echo '<option value="">Select Subcategory</option>';
		foreach($result as $alldata)
	{

	echo '<option value="'.$alldata->subcategory_id.'">'.$alldata->subcategory_name.'</option>';
	}
		
	}else{
		echo '<option value="">Select Subcategory</option>';	
			
	}
	
	exit;	
		
	}

	public function getajaxsubitem()
	{
	$subcat=$this->input->post('subcategory_id');
	$result=$this->products_model->getsubitemdata($subcat);
	echo '<option value="">Select Subitem</option>';
	foreach($result as $alldata)
	{
	echo '<option value="'.$alldata->subitem_id.'">'.$alldata->subitem_name.'</option>';
	}
	exit;	
	}	


public function item_status(){ 

		$pid = base64_decode($this->uri->segment(4)); 
		$status = base64_decode($this->uri->segment(5));
			if($status==1){
			$status=0;
			}else{
			$status=1;
			}
			
			//echo '<pre>';print_r($status);exit; 
			
			$data=array('item_status'=>$status);
			
			$updatestatus=$this->products_model->update_product_status($pid,$data);
			//echo $this->db->last_query();exit;
			
			if(count($updatestatus)>0){
				if($status==1){
					$this->session->set_flashdata('success'," Product activation successfully");
				}else{
					$this->session->set_flashdata('success',"Product deactivation successfully");
				}
				redirect('seller/products');
			}


 }
 public function getolditemdata(){
	 $post = $this->input->post();
	 $data['item_details']=$this->products_model->get_sae_product_details($post['productname'],$post['categoryid'],$post['subcategoryid']);
	 $this->load->view('seller/products/sameproductdetails',$data);
	 
 }
		
	public function insert()
 		{

		$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	
		$post=$this->input->post();
		//echo '<pre>';print_r($_FILES);
		//echo '<pre>';print_r($productspecificationlist);
		//exit;
		
		$discount= ($post['product_price']-$post['special_price']);
		$offers= (($discount) /$post['product_price'])*100;
			if($_FILES['picture1']['name']!=''){
				$profilepic1=microtime().basename($_FILES["picture1"]["name"]);
				move_uploaded_file($_FILES['picture1']['tmp_name'], "uploads/products/" . $profilepic1);
			}else{
				$profilepic1='';
			}
			if($_FILES['picture2']['name']!=''){
				$profilepic2=microtime().basename($_FILES["picture2"]["name"]);
				move_uploaded_file($_FILES['picture2']['tmp_name'], "uploads/products/" . $profilepic2);
			}else{
				$profilepic2='';
			}
			if($_FILES['picture3']['name']!=''){
				$profilepic3=microtime().basename($_FILES["picture3"]["name"]);
				move_uploaded_file($_FILES['picture3']['tmp_name'], "uploads/products/" . $profilepic3);
			}else{
				$profilepic3='';
			}
			if($_FILES['picture4']['name']!=''){
				$profilepic4=microtime().basename($_FILES["picture4"]["name"]);
				move_uploaded_file($_FILES['picture4']['tmp_name'], "uploads/products/" . $profilepic4);
			}else{
				$profilepic4='';
			}
			if($_FILES['picture5']['name']!=''){
				$profilepic5=microtime().basename($_FILES["picture5"]["name"]);
				move_uploaded_file($_FILES['picture5']['tmp_name'], "uploads/products/" . $profilepic5);
			}else{
				$profilepic5='';
			}
			if($_FILES['picture6']['name']!=''){
				$profilepic6=microtime().basename($_FILES["picture6"]["name"]);
				move_uploaded_file($_FILES['picture6']['tmp_name'], "uploads/products/" . $profilepic6);
			}else{
				$profilepic6='';
			}
			if($_FILES['picture7']['name']!=''){
				$profilepic7=microtime().basename($_FILES["picture7"]["name"]);
				move_uploaded_file($_FILES['picture7']['tmp_name'], "uploads/products/" . $profilepic7);
			}else{
				$profilepic7='';
			}
			if($_FILES['picture8']['name']!=''){
				$profilepic8=microtime().basename($_FILES["picture8"]["name"]);
				move_uploaded_file($_FILES['picture8']['tmp_name'], "uploads/products/" . $profilepic8);
			}else{
				$profilepic8='';
			}
		//echo '<pre>';print_r($_FILES);
		//echo '<pre>';print_r($post);exit;
		
		
		$data=array(
			'category_id' => isset($post['category_id'])?$post['category_id']:'',		
			'subcategory_id' => isset($post['subcategorylist'])?$post['subcategorylist']:'',
			'item_name' => isset($post['product_name'])?$post['product_name']:'',
			'item_cost' => isset($post['product_price'])?$post['product_price']:'',
			'special_price' => isset($post['special_price'])?$post['special_price']:'',
			'offers' =>  isset($offers)?$offers:'',
			'discount' => isset($discount)?$discount:'',
			'item_quantity' =>isset($post['pqty'])?$post['pqty']:'',
			'highlights' =>isset($post['highlights'])?$post['highlights']:'',
			//'description' =>isset($post['description'])?$post['description']:'',
			'item_status' => 1,
			'warranty_summary' => isset($post['warranty_summary'])?$post['warranty_summary']:'',
			'warranty_type' =>isset($post['warranty_type'])?$post['warranty_type']:'',
			'service_type' =>isset($post['service_type'])?$post['service_type']:'',
			'return_policy' =>isset($post['return_policy'])?$post['return_policy']:'',
			'brand' =>isset($post['pbrand'])?$post['pbrand']:'',
			'product_code' =>isset($post['product_code'])?$post['product_code']:'',
			'Processor' =>isset($post['Processor'])?$post['Processor']:'',
			'screen_size' => isset($post['screen_size'])?$post['screen_size']:'',
			'internal_memeory' =>isset($post['internal_memeory'])?$post['internal_memeory']:'',
			'camera' => isset($post['camera'])?$post['camera']:'',
			'sim_type' => isset($post['sim_type'])?$post['sim_type']:'',
			'os' => isset($post['os'])?$post['os']:'',
			'colour' => isset($post['colour'])?$post['colour']:'',
			'ram' => isset($post['ram'])?$post['ram']:'',
			'model_name' => isset($post['model_name'])?$post['model_name']:'',
			'model_id' => isset($post['model_id'])?$post['model_id']:'',
			'internal_memory' => isset($post['internal_memory'])?$post['internal_memory']:'',
			'expand_memory' => isset($post['expand_memory'])?$post['expand_memory']:'',
			'primary_camera' => isset($post['primary_camera'])?$post['primary_camera']:'',
			'primary_camera_feature' => isset($post['primary_camera_feature'])?$post['primary_camera_feature']:'',
			'secondary_camera' => isset($post['secondary_camera'])?$post['secondary_camera']:'',
			'secondary_camera_feature' => isset($post['secondary_camera_feature'])?$post['secondary_camera_feature']:'',
			'video_recording' => isset($post['video_recording'])?$post['video_recording']:'',
			'hd_recording' => isset($post['hd_recording'])?$post['hd_recording']:'',
			'flash' => isset($post['flash'])?$post['flash']:'',
			'other_camera_features' => isset($post['other_camera_features'])?$post['other_camera_features']:'',
			'battery_capacity' => isset($post['battery_capacity'])?$post['battery_capacity']:'',
			'talk_time' => isset($post['talk_time'])?$post['talk_time']:'',
			'standby_time' => isset($post['standby_time'])?$post['standby_time']:'',
			'operating_frequency' => isset($post['operating_frequency'])?$post['operating_frequency']:'',
			'preinstalled_browser' => isset($post['preinstalled_browser'])?$post['preinstalled_browser']:'',
			'2g' => isset($post['2g'])?$post['2g']:'',
			'3g' => isset($post['3g'])?$post['3g']:'',
			'4g' => isset($post['4g'])?$post['4g']:'',
			'wifi' =>isset($post['wifi'])?$post['wifi']:'',
			'gps' => isset($post['gps'])?$post['gps']:'',
			'edge' => isset($post['edge'])?$post['edge']:'',
			'edge_features' => isset($post['edge_features'])?$post['edge_features']:'',
			'bluetooth' => isset($post['bluetooth'])?$post['bluetooth']:'',
			'nfc' => isset($post['nfc'])?$post['nfc']:'',
			'usb_connectivity' =>  isset($post['usb_connectivity'])?$post['usb_connectivity']:'',
			'music_player' => isset($post['music_player'])?$post['music_player']:'',
			'video_player' => isset($post['video_player'])?$post['video_player']:'',
			'audio_jack' => isset($post['audio_jack'])?$post['audio_jack']:'',
			'gpu' => isset($post['gpu'])?$post['gpu']:'',
			'sim_size' => isset($post['sim_size'])?$post['sim_size']:'',
			'sim_supported' => isset($post['sim_supported'])?$post['sim_supported']:'',
			'call_memory' => isset($post['call_memory'])?$post['call_memory']:'',
			'sms_memory' => isset($post['sms_memory'])?$post['sms_memory']:'',
			'phone_book_memory' => isset($post['phone_book_memory'])?$post['phone_book_memory']:'',
			'sensors' => isset($post['sensors'])?$post['sensors']:'',
			'java' => isset($post['java'])?$post['java']:'',
			'insales_package' => isset($post['insales_package'])?$post['insales_package']:'',
			'dislay_resolution' => isset($post['dislay_resolution'])?$post['dislay_resolution']:'',
			'display_type' => isset($post['display_type'])?$post['display_type']:'',
			'item_image'=>isset($profilepic1)?$profilepic1:'',
			'item_image1'=>isset($profilepic2)?$profilepic2:'',
			'item_image2'=>isset($profilepic3)?$profilepic3:'',
			'item_image3'=>isset($profilepic4)?$profilepic4:'',
			'item_image4'=>isset($profilepic5)?$profilepic5:'',
			'item_image5'=>isset($profilepic6)?$profilepic6:'',
			'item_image6'=>isset($profilepic7)?$profilepic7:'',
			'item_image7'=>isset($profilepic8)?$profilepic8:'',
			'seller_location_area'=>$seller_location['area'],
			'created_at'=>date('Y-m-d H:i:s'),
			'seller_id' => $this->session->userdata('seller_id'),             


			);
			//echo '<pre>';print_r($data);exit;

			$results=$this->products_model->insert($data);
			if(count($results)>0)
			{	
					/*if($_FILES['descimg']['name']!='')
					{
						$i=0;
						foreach($_FILES['descimg']['name'] as $file){
						if(!empty($file))
						   {     
							 move_uploaded_file($_FILES["descimg"]["tmp_name"][$i], "assets/descriptionimages/" . $_FILES['descimg']['name'][$i]);
							}
							$i++;
						}
					}*/
						if($post['addcategoryname']!=''){
						$data = array(
						'category_name' => $post['addcategoryname'], 
						'seller_id' => $this->session->userdata('seller_id'), 
						'documetfile' => '',
						'status' => 0,    
						'created_at' => date('Y-m-d H:i:s'),    
						'updated_at' => date('Y-m-d H:i:s'),
						);
						$catresults=$this->inventory_model->insert_cat_data($data);
						
							if(count($results)>0){
								
								if($post['addsubcategoryname']!=''){
									$addsubcat = array(
								'category_id' => $catresults, 
								'subcategory_name' =>$post['addsubcategoryname'], 
								'commission' => '', 
								'status' => 0,    
								'created_at' => date('Y-m-d H:i:s'),    
								'updated_at' => date('Y-m-d H:i:s'),
								'created_by' =>$this->session->userdata('seller_id'),  
								);
								//echo "<pre>";print_r($addsubcat);
								$results=$this->inventory_model->save_sub_categories($addsubcat);
								}
							}
						}
						if($post['addcategoryname']!=''){
						$data = array(
						'category_name' => $post['addcategoryname'], 
						'seller_id' => $this->session->userdata('seller_id'), 
						'documetfile' => '',
						'status' => 0,    
						'first_time' =>1,    
						'created_at' => date('Y-m-d H:i:s'),    
						'updated_at' => date('Y-m-d H:i:s'),
						);
						$results=$this->inventory_model->insert_cat_data($data);
						}
						
						
						if(isset($post['description']) && count($post['description'])>0){
						if($_FILES['descimg']['name'][0]!=''){
						$i=0;
						foreach($_FILES['descimg']['name'] as $file){
						if(!empty($file))
						   { 
							$pics[]=microtime().basename($file);					   
							 move_uploaded_file($_FILES["descimg"]["tmp_name"][$i], "assets/descriptionimages/" . $pics[$i]);
							}
							$i++;
							
						}
						$productspecificationlist= array_combine($post['description'],$pics);
						foreach ($productspecificationlist as $key=>$list){
								
							if($key!=''){
								$adddesc=array(
								'item_id' =>$results,
								'description' => $key,
								'image' => $list,
								'create_at' => date('Y-m-d H:i:s'),
								'status' =>1,
								);
								//echo '<pre>';print_r($adddesc);exit;
								$this->products_model->insert_product_descriptions($adddesc);
								
							}
							$i++;
						}
						}else{
							$productspecificationlist= $post['description'];
							foreach ($productspecificationlist as $key=>$list){
								
							if($list!=''){
								$adddesc=array(
								'item_id' =>$results,
								'description' => $list,
								'image' => '',
								'create_at' => date('Y-m-d H:i:s'),
								'status' =>1,
								);
								//echo '<pre>';print_r($adddesc);exit;
								$this->products_model->insert_product_descriptions($adddesc);
								
							}
							$i++;
							}
							
						}
							
						}
				
				
				$this->session->set_flashdata('addcus',"Item Successfully added..", 0);
				redirect('seller/products/create');
			}
			else
			{

				$this->prepare_flashmessage("Failed to Insert..", 1);
				//return redirect(base_url('admin/fooditems'));
		echo "<script>window.location='".base_url()."seller/products/".$this->uri->segment(4)."/".$this->uri->segment(5)."';</script>";
			}
}


public function edit()
{
	$productid = base64_decode($this->uri->segment(4));
	$cat_id = base64_decode($this->uri->segment(5));
	$data['items'] = $this->products_model->auto_items();
	$data['subcatdata'] = $this->products_model->getsubcatdata($cat_id);
	$data['getcat'] = $this->products_model->getcateditdata();
	$data['productdetails']=$this->products_model->getproductdata($productid);
	$data['productcolors']=$this->products_model->get_product_colors($productid);
	$data['productsizes']=$this->products_model->get_product_sizes($productid);
	$data['productuksizes']=$this->products_model->get_product_uksizes($productid);
	$data['productdescriptions']=$this->products_model->get_product_desc($productid);
	//echo '<pre>';print_r($data['productdescriptions']);exit;
	
		//echo '<pre>';print_r($data);exit;
		$sid = $this->session->userdata('seller_id'); 
		$data['category_details'] = $this->products_model->get_seller_catdata($sid);
		$color_details = $this->products_model->get_colores();
		$size_details = $this->products_model->get_sizes_list();
		$uksize_details = $this->products_model->get_uksizes_list();
		$data['items'] = $this->products_model->auto_items();
		//echo $this->db->last-query();exit;
		//echo '<pre>';print_r($data);exit;
		foreach($color_details  as $colors){
			
			$color_list[]=$colors['color_name'];
		}
		foreach($size_details  as $sizes){
			
			$sizes_list[]=$sizes['size_name'];
		}
		foreach($uksize_details  as $uksizes){
			
			$uksizes_list[]=$uksizes['size_name'];
		}
		
		$data['color_lists']=implode(",",$color_list);
		$data['sizes_lists']=implode(",",$sizes_list);
		$data['uksizes_lists']=implode(",",$uksizes_list);
	$this->template->write_view('content', 'seller/products/edit', $data);
	$this->template->render();
	
}
public function removedescription(){
		
	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit; 
			
				$removedesc=$this->products_model->remove_desc($post['descid']);
				if(count($removedesc) > 0)
				{
				$data['msg']=1;
				echo json_encode($data);	
				}
		
	}
	public function removecolors(){
		
	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit; 
			
				$removecolor=$this->products_model->delete_product_colors($post['colid']);
				if(count($removecolor) > 0)
				{
				$data['msg']=1;
				echo json_encode($data);	
				}
		
	}
	public function removesizes(){
		
	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit; 
			
				$removesizes=$this->products_model->delete_product_sizes($post['sizeid']);
				if(count($removesizes) > 0)
				{
				$data['msg']=1;
				echo json_encode($data);	
				}
		
	}	
	public function removeuksizes(){
		
	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit; 
			
				$removesizes=$this->products_model->product_uksize_list($post['sizeid']);
				if(count($removesizes) > 0)
				{
				$data['msg']=1;
				echo json_encode($data);	
				}
		
	}
	public function getproductdocumentfile(){
		
	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit; 
			
				$getdocument=$this->products_model->get_subcategory_document($post['subcategroyid']);
				if(count($getdocument) > 0)
				{
				echo json_encode($getdocument);	
				}
		
	}

public function update()

{
	
	//$id = $this->uri->segment(4);
	$post=$this->input->post();
	
	//echo '<pre>';print_r($post['description']);
	//echo '<pre>';print_r($_FILES);
	
	$productdetails=$this->products_model->getproductdata($post['product_id']);
		if($_FILES['picture1']['name']!=''){
		$image1=microtime().basename($_FILES["picture1"]["name"]);
		move_uploaded_file($_FILES['picture1']['tmp_name'], "uploads/products/" . $image1);

		}else{
		$image1=$productdetails['item_image'];
		}
		if($_FILES['picture2']['name']!=''){
		$image2=microtime().basename($_FILES["picture2"]["name"]);
		move_uploaded_file($_FILES['picture2']['tmp_name'], "uploads/products/" . $image2);

		}else{
		$image2=$productdetails['item_image1'];
		}
		if($_FILES['picture3']['name']!=''){
		$image3=microtime().basename($_FILES["picture3"]["name"]);
		move_uploaded_file($_FILES['picture3']['tmp_name'], "uploads/products/" . $image3);

		}else{
		$image3=$productdetails['item_image2'];
		}
		if($_FILES['picture4']['name']!=''){
		$image4=microtime().basename($_FILES["picture4"]["name"]);
		move_uploaded_file($_FILES['picture4']['tmp_name'], "uploads/products/" . $image4);

		}else{
		$image4=$productdetails['item_image3'];
		}
		if($_FILES['picture5']['name']!=''){
		$image5=microtime().basename($_FILES["picture5"]["name"]);
		move_uploaded_file($_FILES['picture5']['tmp_name'], "uploads/products/" . $image5);
		}else{
		$image5=$productdetails['item_image4'];
		}
		if($_FILES['picture6']['name']!=''){
		$image6=microtime().basename($_FILES["picture6"]["name"]);
		move_uploaded_file($_FILES['picture6']['tmp_name'], "uploads/products/" . $image6);
		}else{
		$image6=$productdetails['item_image5'];
		}
		if($_FILES['picture7']['name']!=''){
		$image7=microtime().basename($_FILES["picture7"]["name"]);
		move_uploaded_file($_FILES['picture7']['tmp_name'], "uploads/products/" . $image7);
		}else{
		$image7=$productdetails['item_image6'];
		}
		if($_FILES['picture8']['name']!=''){
		$image8=microtime().basename($_FILES["picture8"]["name"]);
		move_uploaded_file($_FILES['picture8']['tmp_name'], "uploads/products/" . $image8);
		}else{
		$image8=$productdetails['item_image7'];
		}
		
	
	
	$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));
	$product_details=$this->products_model->get_producr_details($this->uri->segment(4));
//echo '<pre>';print_r($product_details);exit;	
		
		$post=$this->input->post();
		
	//echo $id; exit;

	
		if($post['subcategorylist']==''){
			$subcatid=$post['editsubcategorylist'];
		}else{
			$subcatid=$post['subcategorylist'];
		}
		$updatedata=array(
			'category_id' => isset($post['category_id'])?$post['category_id']:'',		
			'item_name' => isset($post['product_name'])?$post['product_name']:'',
			'item_cost' => isset($post['product_price'])?$post['product_price']:'',
			'special_price' => isset($post['special_price'])?$post['special_price']:'',
			'offers' =>  isset($offers)?$offers:'',
			'discount' => isset($discount)?$discount:'',
			'item_quantity' =>isset($post['pqty'])?$post['pqty']:'',
			'highlights' =>isset($post['highlights'])?$post['highlights']:'',
			//'description' =>isset($post['description'])?$post['description']:'',
			'item_status' => 1,
			'warranty_summary' => isset($post['warranty_summary'])?$post['warranty_summary']:'',
			'warranty_type' =>isset($post['warranty_type'])?$post['warranty_type']:'',
			'service_type' =>isset($post['service_type'])?$post['service_type']:'',
			'return_policy' =>isset($post['return_policy'])?$post['return_policy']:'',
			'brand' =>isset($post['pbrand'])?$post['pbrand']:'',
			'product_code' =>isset($post['product_code'])?$post['product_code']:'',
			'Processor' =>isset($post['Processor'])?$post['Processor']:'',
			'screen_size' => isset($post['screen_size'])?$post['screen_size']:'',
			'internal_memeory' =>isset($post['internal_memeory'])?$post['internal_memeory']:'',
			'camera' => isset($post['camera'])?$post['camera']:'',
			'sim_type' => isset($post['sim_type'])?$post['sim_type']:'',
			'os' => isset($post['os'])?$post['os']:'',
			'colour' => isset($post['colour'])?$post['colour']:'',
			'ram' => isset($post['ram'])?$post['ram']:'',
			'model_name' => isset($post['model_name'])?$post['model_name']:'',
			'model_id' => isset($post['model_id'])?$post['model_id']:'',
			'internal_memory' => isset($post['internal_memory'])?$post['internal_memory']:'',
			'expand_memory' => isset($post['expand_memory'])?$post['expand_memory']:'',
			'primary_camera' => isset($post['primary_camera'])?$post['primary_camera']:'',
			'primary_camera_feature' => isset($post['primary_camera_feature'])?$post['primary_camera_feature']:'',
			'secondary_camera' => isset($post['secondary_camera'])?$post['secondary_camera']:'',
			'secondary_camera_feature' => isset($post['secondary_camera_feature'])?$post['secondary_camera_feature']:'',
			'video_recording' => isset($post['video_recording'])?$post['video_recording']:'',
			'hd_recording' => isset($post['hd_recording'])?$post['hd_recording']:'',
			'flash' => isset($post['flash'])?$post['flash']:'',
			'other_camera_features' => isset($post['other_camera_features'])?$post['other_camera_features']:'',
			'battery_capacity' => isset($post['battery_capacity'])?$post['battery_capacity']:'',
			'talk_time' => isset($post['talk_time'])?$post['talk_time']:'',
			'standby_time' => isset($post['standby_time'])?$post['standby_time']:'',
			'operating_frequency' => isset($post['operating_frequency'])?$post['operating_frequency']:'',
			'preinstalled_browser' => isset($post['preinstalled_browser'])?$post['preinstalled_browser']:'',
			'2g' => isset($post['2g'])?$post['2g']:'',
			'3g' => isset($post['3g'])?$post['3g']:'',
			'4g' => isset($post['4g'])?$post['4g']:'',
			'wifi' =>isset($post['wifi'])?$post['wifi']:'',
			'gps' => isset($post['gps'])?$post['gps']:'',
			'edge' => isset($post['edge'])?$post['edge']:'',
			'edge_features' => isset($post['edge_features'])?$post['edge_features']:'',
			'bluetooth' => isset($post['bluetooth'])?$post['bluetooth']:'',
			'nfc' => isset($post['nfc'])?$post['nfc']:'',
			'usb_connectivity' =>  isset($post['usb_connectivity'])?$post['usb_connectivity']:'',
			'music_player' => isset($post['music_player'])?$post['music_player']:'',
			'video_player' => isset($post['video_player'])?$post['video_player']:'',
			'audio_jack' => isset($post['audio_jack'])?$post['audio_jack']:'',
			'gpu' => isset($post['gpu'])?$post['gpu']:'',
			'sim_size' => isset($post['sim_size'])?$post['sim_size']:'',
			'sim_supported' => isset($post['sim_supported'])?$post['sim_supported']:'',
			'call_memory' => isset($post['call_memory'])?$post['call_memory']:'',
			'sms_memory' => isset($post['sms_memory'])?$post['sms_memory']:'',
			'phone_book_memory' => isset($post['phone_book_memory'])?$post['phone_book_memory']:'',
			'sensors' => isset($post['sensors'])?$post['sensors']:'',
			'java' => isset($post['java'])?$post['java']:'',
			'insales_package' => isset($post['insales_package'])?$post['insales_package']:'',
			'dislay_resolution' => isset($post['dislay_resolution'])?$post['dislay_resolution']:'',
			'display_type' => isset($post['display_type'])?$post['display_type']:'',
			'item_image'=>$image1,
			'item_image1'=>$image2,
			'item_image2'=>$image3,
			'item_image3'=>$image4,
			'item_image4'=>$image5,
			'item_image5'=>$image6,
			'item_image6'=>$image7,
			'item_image7'=>$image8,
			'seller_location_area'=>$seller_location['area'],
			'created_at'=>date('Y-m-d H:i:s'),

			);
			
			//echo '<pre>';print_r($updatedata);
			
			$result=$this->products_model->update_deails($post['product_id'],$updatedata);
			if(count($result)>0)
			{
				/* pecification purpose*/
				if(isset($post['description']) && count($post['description'])>0){						
											
							if($_FILES['descimg']['name'][0]!=''){
									foreach ($_FILES['descimg']['name'] as $key=>$files){
										if($files!=''){
										$ids[]=$key;
										}
									}
									//echo '<pre>';print_r($post['olddescimg']);
									//echo '<pre>';print_r($ids);exit;
									foreach ($post['olddescimg'] as $key=>$files){
										if (in_array($key, $ids))  
										{
											unset($key);
										}else{
										
										$imslist[]=$files;
										}
											
										
									}

									$i=0;
									foreach($_FILES['descimg']['name'] as $file){
										//echo '<pre>';print_r($file);
										if($file!='')
											{ 
											$pics[]=microtime().basename($file);					   
											move_uploaded_file($_FILES["descimg"]["tmp_name"][$i], "assets/descriptionimages/" . $pics[$i]);
											}
											$i++;

										}
										//echo count($imslist);exit;
										if(isset($imslist) && count($imslist)>0){
										$oldimgesnewimage=array_merge($pics,$imslist);	
										}else{
											$oldimgesnewimage=$pics;
										}
										
										
										$getdescriptionimgs=$this->products_model->get_product_desc($post['product_id']);
							if(count($getdescriptionimgs)>0){
								foreach ($getdescriptionimgs as $list){
									$this->products_model->delete_oldproducts_desc($list['desc_id']);
								}
							}
						$productspecificationlist= array_combine($post['description'],$oldimgesnewimage);
						//echo '<pre>';print_r($productspecificationlist);exit;
						
							foreach ($productspecificationlist as $key=>$list){
								
							if($key!=''){
								$adddesc=array(
								'item_id' =>$post['product_id'],
								'description' => $key,
								'image' => $list,
								'create_at' => date('Y-m-d H:i:s'),
								'status' =>1,
								);
								//echo '<pre>';print_r($adddesc);exit;
								$this->products_model->insert_product_descriptions($adddesc);
								
							}
							$i++;
						}
										
										
							}else{
								$productspecificationlist= array_combine($post['description'],$post['olddescimg']);
									$getdescriptionimgs=$this->products_model->get_product_desc($post['product_id']);
							if(count($getdescriptionimgs)>0){
								foreach ($getdescriptionimgs as $list){
									$this->products_model->delete_oldproducts_desc($list['desc_id']);
								}
							}
									foreach ($productspecificationlist as $key=>$list){
												
											if($key!=''){
												$adddesc=array(
												'item_id' =>$post['product_id'],
												'description' => $key,
												'image' => $list,
												'create_at' => date('Y-m-d H:i:s'),
												'status' =>1,
												);
												//echo '<pre>';print_r($adddesc);exit;
												$this->products_model->insert_product_descriptions($adddesc);
												
											}
											$i++;
										}
							}

								
							
						}
	
						/* -----*/
					
				
				
				$this->session->set_flashdata('success',"Successfully Updated..", 0);
				redirect('seller/products');
			}else{
				$this->prepare_flashmessage("Failed to Insert..", 1);
				redirect('seller/products');
			}	
		
}


public function delete()

  {

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);
		$result=$this->products_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('seller/products');

//echo "<script>window.location='".base_url()."seller/products/".$this->uri->segment(5)."/".$this->uri->segment(6)."';</script>";

		}



	}
public function search()
    
  {
     $cat_id = $this->uri->segment(3);
	 $subcat_id = $this->uri->segment(4);
             $match = $this->input->post('search');
             
			 
			 
               // $result1 = $this->products_model->search($match,$cat_id,$subcat_id);
                //$result2 = count($result1);
                //echo $result2;exit;
              //$this->load->library('pagination');
            //$this->load->view('welcome_message');
            $result=$this->products_model->search($match,$cat_id,$subcat_id);
            $data['itemdata'] =  $result;
			$data['catname'] = $this->products_model->getcatname($cat_id);
		$data['subcatname'] = $this->products_model->getsubcatname($subcat_id);
       //$data['itemdata'] = $this->products_model->getitems($cat_id,$subcat_id);
            $this->template->write_view('content', 'seller/products/index',$data);

            $this->template->render();

    }
public function track_requests()
{
	

$data['approvalrequestdata'] = $this->products_model->getproductapproval();
$this->template->write_view('content', 'seller/products/approval_request', $data);
		$this->template->render();



}

public function returns()

{
		$data['returncatitemdata'] = $this->products_model->returns();
		
		$this->template->write_view('content', 'seller/products/returns', $data);
		$this->template->render();
}
	public function uploadproducts(){
		
		$post=$this->input->post();
		$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	

		echo "<pre>";print_r($post);
		echo "<pre>";print_r($_FILES);
			if((!empty($_FILES["categoryfile"])) && ($_FILES['categoryfile']['error'] == 0)) {

			$limitSize	= 1000000000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
			$fileName	= basename($_FILES['categoryfile']['name']);
			$fileSize	= $_FILES["categoryfile"]["size"];
			$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
						
		
		
						if($post['category_ids']==18){
							if(substr($_FILES['categoryfile']['name'], 0, 16)=='foodcategoryfile'){
								if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
										include_once('simplexlsx.class.php');
										$getWorksheetName = array();
										$xlsx = new SimpleXLSX( $_FILES['categoryfile']['tmp_name'] );
										$getWorksheetName = $xlsx->getWorksheetName();
										//echo $xlsx->sheetsCount();exit;
												for($j=1;$j <= $xlsx->sheetsCount();$j++){
												$cnt=$xlsx->sheetsCount()-1;
												$arry=$xlsx->rows($j);
												unset($arry[0]);

														//echo "<pre>";print_r($arry);exit;
														foreach($arry as $key=>$fields)
														{
																
																$totalfields[] = $fields;
																if(empty($fields[1])) {
																	$data['errors'][]="Product name is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[1]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[1]))	  	
																	{
																	$data['errors'][]='Product name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[2])){
																	$data['errors'][]="Sku code is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[2]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[2]))	  	
																	{
																	$data['errors'][]='Sku code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}else{
																		$result = $this->products_model->get_skuid_exists($fields[2]);
																		if(count($result)>0){
																		$data['errors'][]="Sku code already exits .please use another Sku code. Row Id is :  ".$key.'<br>';
																		$error=1;	
																		}

																	}

																}
																if(empty($fields[3])) {
																	$data['errors'][]="Other Unique code is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[3]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[3]))	  	
																	{
																	$data['errors'][]='Other Unique code wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[4])) {
																	$data['errors'][]="Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[4]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[4]))	  	
																	{
																	$data['errors'][]='Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[5])) {
																	$data['errors'][]="Special Price is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[5]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[5]))	  	
																	{
																	$data['errors'][]='Special Price  can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[6]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[6]))	  	
																	{
																	$data['errors'][]='Offer can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if($fields[7]!=''){
																	$regex ="/^[0-9.]+$/"; 
																	if(!preg_match( $regex, $fields[7]))	  	
																	{
																	$data['errors'][]='Discount can only consist of digits. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[8])) {
																	$data['errors'][]="Qty is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[8]!=''){
																	$regex ="/^[0-9]+$/"; 
																	if(!preg_match( $regex, $fields[8]))
																	{
																	$data['errors'][]="Qty must be digits. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[9])) {
																	$data['errors'][]="Meta keywords is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[9]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[9]))	  	
																	{
																	$data['errors'][]='Meta keywords can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[10])) {
																	$data['errors'][]="Meta title is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[10]!=''){
																	$regex ="/^[a-zA-Z0-9.-_& ]+$/"; 
																	if(!preg_match( $regex, $fields[10]))	  	
																	{
																	$data['errors'][]='Meta title can only consist of alphanumaric, space and dot. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[11])) {
																	$data['errors'][]="Status is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[11]!=''){
																	$regex ="/^[0-1]+$/"; 
																	if(!preg_match( $regex, $fields[11]))
																	{
																	$data['errors'][]="Status must be  0 or 1. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[12])) {
																	$data['errors'][]="Product description is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[12]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[12]))	  	
																	{
																	$data['errors'][]='Product description wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[13])) {
																	$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[13]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[13]))	  	
																	{
																	$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[14])) {
																	$data['errors'][]="Sub Item is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[14]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[14]))	  	
																	{
																	$data['errors'][]='Sub Item wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[15])) {
																	$data['errors'][]="Sufficient is required. Row Id is :  ".$key.'<br>';
																	$error=1;
																}else if($fields[15]!=''){
																	$regex ="/^[0-9]+$/"; 
																	if(!preg_match( $regex, $fields[15]))
																	{
																	$data['errors'][]="Sufficient must be digits. Row Id is :  ".$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[16])) {
																	$data['errors'][]="Product specifications name is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[16]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[16]))	  	
																	{
																	$data['errors'][]='Product specifications name wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[17])) {
																	$data['errors'][]="Product specifications value is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[17]!=''){
																	$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\/,|=^?$%*)(_+-]*$/"; 
																	if(!preg_match( $regex, $fields[17]))	  	
																	{
																	$data['errors'][]='Product specifications value wont allow "  <> []. Row Id is :  '.$key.'<br>';
																	$error=1;
																	}
																}
																if(empty($fields[18])) {
																	$data['errors'][]="Image is required. Row Id is :  ".$key;
																$error=1;
																}else if($fields[18]!=''){
																		$image_link = $fields[18];
																		$split_image1 = pathinfo($image_link);
																		$imagename=$split_image1['filename'].".".$split_image1['extension'];
																		$split_image = pathinfo($imagename,PATHINFO_EXTENSION);;
																		if($split_image != "jpg" && $split_image !="png" && $split_image != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[19])&& $fields[19]!=''){
																		$img1 = $fields[19];
																		$img12 = pathinfo($img1);
																		$imagename22=$img12['filename'].".".$img12['extension'];
																		$split_image212 = pathinfo($imagename22,PATHINFO_EXTENSION);;
																		if($split_image212 != "jpg" && $split_image212 !="png" && $split_image212 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[20])&& $fields[20]!=''){
																		$img2 = $fields[20];
																		$img122 = pathinfo($img2);
																		$imagename2233=$img122['filename'].".".$img122['extension'];
																		$image3 = pathinfo($imagename2233,PATHINFO_EXTENSION);;
																		if($image3 != "jpg" && $image3 !="png" && $image3 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[21])&& $fields[21]!=''){
																		$img4 = $fields[21];
																		$img133 = pathinfo($img4);
																		$imagename5656=$img133['filename'].".".$img133['extension'];
																		$image4 = pathinfo($imagename5656,PATHINFO_EXTENSION);;
																		if($image4 != "jpg" && $image4 !="png" && $image4 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[22])&& $fields[22]!=''){
																		$image5 = $fields[22];
																		$image55 = pathinfo($image5);
																		$imagename555=$image55['filename'].".".$image55['extension'];
																		$image5555 = pathinfo($imagename555,PATHINFO_EXTENSION);;
																		if($image5555 != "jpg" && $image5555 !="png" && $image5555 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[23])&& $fields[23]!=''){
																		$image6 = $fields[23];
																		$image66 = pathinfo($image6);
																		$imagename666=$image66['filename'].".".$image66['extension'];
																		$image6666 = pathinfo($imagename666,PATHINFO_EXTENSION);;
																		if($image6666 != "jpg" && $image6666 !="png" && $image6666 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[24])&& $fields[24]!=''){
																		$image7 = $fields[24];
																		$image77 = pathinfo($image7);
																		$imagename777=$image77['filename'].".".$image77['extension'];
																		$image7777 = pathinfo($imagename777,PATHINFO_EXTENSION);;
																		if($image7777 != "jpg" && $image7777 !="png" && $image7777 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[25])&& $fields[25]!=''){
																		$image8 = $fields[25];
																		$image88 = pathinfo($image8);
																		$imagename888=$image88['filename'].".".$image88['extension'];
																		$image8888 = pathinfo($imagename888,PATHINFO_EXTENSION);;
																		if($image8888 != "jpg" && $image8888 !="png" && $image8888 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[26])&& $fields[26]!=''){
																		$image9 = $fields[26];
																		$image99 = pathinfo($image9);
																		$imagename999=$image99['filename'].".".$image99['extension'];
																		$image9999 = pathinfo($imagename999,PATHINFO_EXTENSION);;
																		if($image9999 != "jpg" && $image9999 !="png" && $image9999 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[27])&& $fields[27]!=''){
																		$image01 = $fields[27];
																		$image001 = pathinfo($image01);
																		$imagename0001=$image001['filename'].".".$image001['extension'];
																		$image00001 = pathinfo($imagename0001,PATHINFO_EXTENSION);;
																		if($image00001 != "jpg" && $image00001 !="png" && $image00001 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
																if(isset($fields[28])&& $fields[28]!=''){
																		$image11 = $fields[28];
																		$image111 = pathinfo($image11);
																		$imagename1111=$image111['filename'].".".$image111['extension'];
																		$image11111 = pathinfo($imagename1111,PATHINFO_EXTENSION);;
																		if($image11111 != "jpg" && $image11111 !="png" && $image11111 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																		
																}
																if(isset($fields[29])&& $fields[29]!=''){
																		$image12 = $fields[29];
																		$image112 = pathinfo($image12);
																		$imagename1112=$image112['filename'].".".$image112['extension'];
																		$image11112 = pathinfo($imagename1112,PATHINFO_EXTENSION);;
																		if($image11112 != "jpg" && $image11112 !="png" && $image11112 != "jpeg" ) {
																		$data['errors'][]='Uploaded file is not a valid image. Only JPG PNG  files are allowed. Row Id is :  '.$key.'<br>';
																		$error=1;
																		}
																	
																}
														}
														//echo '<pre>';print_r($data);exit;
												if(count($data['errors'])>0){
												$this->session->set_flashdata('addsuccess',$data['errors']);
												redirect('/seller/products/create');
												}

											}
											if(count($data['errors'])<=0){
													foreach($totalfields as $data){
														$path='/home/cartinhour/public_html/uploads/products/';
														//echo '<pre>';print_r($data);
															$image_link = $data[18];
															$split_image = pathinfo($image_link);
															$imagename=round(microtime(true)).$split_image['filename'].".".$split_image['extension'];
															copy($data[18], $path.$imagename);
															if(isset($data[19])&& $data[19]!=''){
																$image_link1 = $data[19];
																$split_image1 = pathinfo($image_link1);
																$imagename1=round(microtime(true)).$split_image1['filename'].".".$split_image1['extension'];
																copy($data[19], $path.$imagename1);
															}
															if(isset($data[20])&& $data[20]!=''){
																	$image_link2 = $data[20];
																	$split_image2 = pathinfo($image_link2);
																	$imagename2=round(microtime(true)).$split_image2['filename'].".".$split_image2['extension'];
																	copy($data[20], $path.$imagename2);
															}
															if(isset($data[21])&& $data[21]!=''){
																	$image_link3 = $data[21];
																	$split_image3 = pathinfo($image_link3);
																	$imagename3=round(microtime(true)).$split_image3['filename'].".".$split_image3['extension'];
																	copy($data[21], $path.$imagename3);
																	
															}
															if(isset($data[22])&& $data[22]!=''){
																	$image_link4 = $data[22];
																	$split_image4 = pathinfo($image_link4);
																	$imagename4=round(microtime(true)).$split_image4['filename'].".".$split_image4['extension'];
																	copy($data[22], $path.$imagename4);
																	
															}
															if(isset($data[23])&& $data[23]!=''){
																	$image_link5 = $data[23];
																	$split_image5 = pathinfo($image_link5);
																	$imagename5=round(microtime(true)).$split_image5['filename'].".".$split_image5['extension'];
																	copy($data[23], $path.$imagename5);
																	
															}
															if(isset($data[24])&& $data[24]!=''){
																$image_link6 = $data[24];
																$split_image6 = pathinfo($image_link6);
																$imagename6=round(microtime(true)).$split_image6['filename'].".".$split_image6['extension'];
																copy($data[24], $path.$imagename6);
															
															}
															if(isset($data[25])&& $data[25]!=''){
																$image_link7 = $data[25];
																$split_image7 = pathinfo($image_link7);
																$imagename7=round(microtime(true)).$split_image7['filename'].".".$split_image7['extension'];
																copy($data[25], $path.$imagename7);
															
															}
															if(isset($data[26])&& $data[26]!=''){
																	$image_link8 = $data[26];
																	$split_image8 = pathinfo($image_link8);
																	$imagename8=round(microtime(true)).$split_image8['filename'].".".$split_image8['extension'];
																	copy($data[26], $path.$imagename8);
																	
															}
															if(isset($data[27])&& $data[27]!=''){
																$image_link9 = $data[27];
																$split_image9 = pathinfo($image_link9);
																$imagename9=round(microtime(true)).$split_image9['filename'].".".$split_image9['extension'];
																copy($data[27], $path.$imagename9);
															}
															if(isset($data[28])&& $data[28]!=''){
																$image_link10 = $data[28];
																$split_image10 = pathinfo($image_link10);
																$imagename10=round(microtime(true)).$split_image10['filename'].".".$split_image10['extension'];
																copy($data[28], $path.$imagename10);
															
															}
															if(isset($data[29])&& $data[29]!=''){
																$image_link11 = $data[29];
																$split_image11 = pathinfo($image_link11);
																$imagename11=round(microtime(true)).$split_image11['filename'].".".$split_image11['extension'];
																copy($data[29], $path.$imagename11);
																
															}
															
															$adddetails=array(
																	'category_id' => $post['category_ids'],			
																	'subcategory_id' =>$post['subcategory_ids'],
																	'seller_id' =>$this->session->userdata('seller_id'), 
																	'item_name' => $data[1],
																	'skuid' => $data[2],
																	'item_code' => $data[3],
																	'item_cost' => $data[4],
																	'special_price' => $data[5],
																	'offers' =>$data[6],
																	'discount' =>$data[7],
																	'item_quantity' =>$data[8],
																	'keywords' =>$data[9],
																	'title' =>$data[10],
																	'item_status' => $data[11],
																	'item_description' =>$data[12],
																	'item_sub_name' =>$data[13],
																	'cusine' =>$data[14],
																	'sufficient_for' =>$data[15],
																	'item_image'=>isset($imagename)?$imagename:'',
																	'item_image1'=>isset($imagename1)?$imagename1:'',
																	'item_image2'=>isset($imagename2)?$imagename2:'',
																	'item_image3'=>isset($imagename3)?$imagename3:'',
																	'item_image4'=>isset($imagename4)?$imagename4:'',
																	'item_image5'=>isset($imagename5)?$imagename5:'',
																	'item_image6'=>isset($imagename6)?$imagename6:'',
																	'item_image7'=>isset($imagename7)?$imagename7:'',
																	'item_image8'=>isset($imagename8)?$imagename8:'',
																	'item_image9'=>isset($imagename9)?$imagename9:'',
																	'item_image10'=>isset($imagename10)?$imagename10:'',
																	'item_image11'=>isset($imagename11)?$imagename11:'',
																	'seller_location_area'=>$seller_location['area'],
																	'created_at'=>date('Y-m-d H:i:s'),

																);
																//echo '<pre>';print_r($adddetails);exit;
																	$results=$this->products_model->save_prodcts($adddetails);
																		if(count($results)>0){
																				/* for spcification purpose*/
																				$arr1=explode(",",$data[14]);
																				$arr2=explode(",",$data[15]);
																				foreach (array_combine($arr1,$arr2) as $key=>$list){
																					if($list!='' && $key!=''){
																					$addspc=array(
																					'item_id' =>$results,
																					'spc_name' => $key,
																					'spc_value' => $list,
																					'create_at' => date('Y-m-d H:i:s'),
																					);
																					$this->products_model->insert_product_spcifications($addspc);
																					}
																				}
																				/* for spcification purpose*/
																		}

											       }
													
											}
											if(count($results)>0){
											$this->session->set_flashdata('addcus','Items are successfully added');
											redirect('/seller/products/create');	
											}
											
										
								}else{
									$this->session->set_flashdata('error','Your are uploaded  wrong File');
									redirect('/seller/products/create');	
								}
								
							}else{
								$this->session->set_flashdata('error','Your are uploaded  wrong File. Please upload coreect file!');
								redirect('/seller/products/create');
							}
							
						}else if($post['category_ids']==20){
							
							
						}else if($post['category_ids']==21){
							
							
						}else{
						
						
						}
		
		//exit;
		
		
			}else{
				$this->session->set_flashdata('error','Due to technical problem please try aftre some time.');
				redirect('/seller/products/create');
				
			}
			
			
		
	}

	function addcategory(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post['categoryname']);exit;
		$alreadyexits = $this->products_model->get_name_existss($post['categoryname']);
		if(count($alreadyexits)>0){
			
			$data['msg']=0;
			echo json_encode($data);exit;
		}
		$adddata = array(
		'category_name' => $post['categoryname'],
		'status' => 0,
		'first_time' =>1,    
		'created_at' => date('Y-m-d H:i:s'),    
		'updated_at' => date('Y-m-d H:i:s'),
		'seller_id' =>$this->session->userdata('seller_id'), 

		);
		$result=$this->products_model->insert_cat_data($adddata);
		if(count($result)>0){
			$data['msg']=1;
			echo json_encode($data);
		}else{
			$data['msg']=2;
			echo json_encode($data);
		}

	}
	function addsubcategory(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post['categoryname']);exit;
		$alreadyexits = $this->products_model->get_subcatname_existss($post['subcategoryname']);
		if(count($alreadyexits)>0){
			
			$data['msg']=0;
			echo json_encode($data);exit;
		}
		$addsubcat = array(
		'category_id' => $post['categoryid'], 
		'subcategory_name' => $post['subcategoryname'],
		'status' => 0,    
		'created_at' => date('Y-m-d H:i:s'),    
		'updated_at' => date('Y-m-d H:i:s'),
		'created_by' =>$this->session->userdata('seller_id'), 
		);
		$result=$this->products_model->save_sub_categories($addsubcat);
		if(count($result)>0){
			$data['msg']=1;
			echo json_encode($data);
		}else{
			$data['msg']=2;
			echo json_encode($data);
		}

	}
	public function imageslist(){
		$data['imglist']=$this->products_model->get_images_list($this->session->userdata('seller_id'));
		$this->template->write_view('content', 'seller/products/imageslist',$data);
		$this->template->render();
	}
	public function imageurllist(){
		$this->template->write_view('content', 'seller/products/imageurl');
		$this->template->render();
	}
	public function getimageurl(){
		$post=$this->input->post();
		$name=microtime().basename($_FILES["picture1"]["name"]);
		move_uploaded_file($_FILES["picture1"]["tmp_name"], "uploads/products/" .$name);	
		$imgdata = array(
		'img_name' => $name,
		'created_at' => date('Y-m-d H:i:s'),    
		'seller_id' =>$this->session->userdata('seller_id'), 
		);
		$saveimage=$this->products_model->save_imageurl_data($imgdata);
		if(count($saveimage)>0){
			$url=base_url('assets/imageurl/'.$name);
			//$sendurl = str_replace(" ", "%20", $url);
			$sendurl = $url;
			$data['msg']=1;
			$data['url']=$name;
			echo json_encode($data);
		}else{
			$data['msg']=2;
			echo json_encode($data);
		}
	}
		

}