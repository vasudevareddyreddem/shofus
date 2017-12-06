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
		//echo $this->db->last_query();exit;
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
	public function getsubitemsname()
	{
		
	$post=$this->input->post();
	//print_r($subcat);exit;
	$result=$this->products_model->get_subitem_list_subcategorywise($post['subcatid']);
	//echo $this->db->last_query();exit;
	if(count($result)>0){
		echo '<option value="">Select SubItem</option>';
		foreach($result as $alldata)
	{

	echo '<option value="'.$alldata['subitem_id'].'">'.$alldata['subitem_name'].'</option>';
	}
		
	}else{
		echo '<option value="">Select Subitem</option>';	
			
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
	 //echo $this->db->last_query();exit;
	 //echo '<pre>';print_r($post);
	 if(isset($post['categoryid']) && $post['categoryid']==21){
	 $this->load->view('seller/products/groceryproductdetails',$data);
	 }else if(isset($post['categoryid']) && $post['categoryid']==22){
		 $data['subcategory_id']=isset($post['subcategoryid'])?$post['subcategoryid']:'';
		  $this->load->view('seller/products/clothsproductdetails',$data);
	 }else if(isset($post['categoryid']) && $post['categoryid']==23){
		 $data['subcategory_id']=isset($post['subcategoryid'])?$post['subcategoryid']:'';
		  $this->load->view('seller/products/bagsproductdetails',$data);
	 }else if(isset($post['categoryid']) && $post['categoryid']==24){
		 $data['subcategory_id']=isset($post['subcategoryid'])?$post['subcategoryid']:'';
		  $this->load->view('seller/products/footware',$data);
	 }if(isset($post['categoryid']) && $post['categoryid']==20){
		 if($post['subcategoryid']==38){
			$this->load->view('seller/products/cameraaccessories',$data);
			}else if($post['subcategoryid']==36){
			$this->load->view('seller/products/dslr',$data);	
			}else if($post['subcategoryid']==39){
			$this->load->view('seller/products/laptops',$data);	
			}else if($post['subcategoryid']==32){
			$this->load->view('seller/products/headphones',$data);	
			}else if($post['subcategoryid']==35){
			$this->load->view('seller/products/computerspeakers',$data);	
			}else if($post['subcategoryid']==31){
			$this->load->view('seller/products/printers',$data);	
			}else{
			  $this->load->view('seller/products/sameproductdetails',$data);
			}
		
	 }
	 
 }
		
	public function insert()
 		{

		$seller_location=$this->products_model->get_store_location($this->session->userdata('seller_id'));	
		$post=$this->input->post();
		//echo '<pre>';print_r($_FILES);
		//echo '<pre>';print_r($post);
		//exit;
		
		$discount1= ($post['product_price']-$post['special_price']);
		$discount= number_format($discount1,2);
		$offers1= (($discount1) /$post['product_price'])*100;
		$offers= number_format($offers1, 2);
		
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
		if($post['colour']!='' && $post['internal_memeory']!='' && $post['ram']!=''){
			$name=$post['product_name'].' '.ucfirst(strtolower($post['colour'])).' '.str_replace(' ', '', strtoupper($post['internal_memeory'])).' '.$post['ram'].' Ram';
		}else if($post['colour']!='' && $post['internal_memeory']!=''){
			$name=$post['product_name'].' '.ucfirst(strtolower($post['colour'])).' '.str_replace(' ', '', strtoupper($post['internal_memeory']));
		}else if($post['colour']!=''){
			$name=$post['product_name'].' '.ucfirst(strtolower($post['colour']));
		}else{
			$name=$post['product_name'];
		}
		if(isset($post['pattern']) && $post['pattern'] || isset($post['pattern1']) && $post['pattern1'] ){
			if($post['pattern']!=''){
			$pattern=$post['pattern'];
			}if($post['pattern1']!=''){
			$pattern=$post['pattern1'];
			}
		}
		if(isset($post['sleeve']) && $post['sleeve'] || isset($post['sleeve1']) && $post['sleeve1'] ){
			if($post['sleeve']!=''){
			$sleeve=$post['sleeve'];
			}if($post['sleeve1']!=''){
			$sleeve=$post['sleeve1'];
			}
		}
		$data=array(
			'category_id' => isset($post['category_id'])?$post['category_id']:'',		
			'subcategory_id' => isset($post['subcategorylist'])?$post['subcategorylist']:'',
			'subitemid' => isset($post['subitemid'])?$post['subitemid']:'',
			'item_name' => isset($name)?$name:'',
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
			'internal_memeory' =>isset($post['internal_memeory'])?str_replace(' ', '', strtoupper($post['internal_memeory'])):'',
			'camera' => isset($post['camera'])?$post['camera']:'',
			'sim_type' => isset($post['sim_type'])?$post['sim_type']:'',
			'os' => isset($post['os'])?$post['os']:'',
			'colour' => isset($post['colour'])?ucfirst(strtolower($post['colour'])):'',
			'ram' => isset($post['ram'])?str_replace(' ', '', strtoupper($post['ram'])):'',
			'model_name' => isset($post['model_name'])?$post['model_name']:'',
			'model_id' => isset($post['model_id'])?$post['model_id']:'',
			'internal_memory' => isset($post['internal_memory'])?str_replace(' ', '', strtoupper($post['internal_memory'])):'',
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
			'ingredients' => isset($post['ingredients'])?$post['ingredients']:'',
			'key_feature' => isset($post['key_feature'])?$post['key_feature']:'',
			'unit' => isset($post['unit'])?$post['unit']:'',
			'packingtype' => isset($post['packingtype'])?$post['packingtype']:'',
			'disclaimer' => isset($post['disclaimer'])?$post['disclaimer']:'',
			'wash_care' => isset($post['wash_care'])?$post['wash_care']:'',
			'style_code' => isset($post['style_code'])?$post['style_code']:'',
			'look' => isset($post['look'])?$post['look']:'',
			'size' => isset($post['size'])?$post['size']:'',
			'material' => isset($post['material'])?$post['material']:'',
			'occasion' => isset($post['occasion'])?$post['occasion']:'',
			'pattern' => isset($pattern)?$pattern:'',
			'sleeve' => isset($sleeve)?$sleeve:'',
			'fit' => isset($post['fit'])?$post['fit']:'',
			'gender' => isset($post['gender'])?$post['gender']:'',
			'collar_type' => isset($post['collar_type'])?$post['collar_type']:'',
			'set_contents' => isset($post['set_contents'])?$post['set_contents']:'',
			'age' => isset($post['age'])?$post['age']:'',
			'ideal_for' => isset($post['ideal_for'])?$post['ideal_for']:'',
			'style' => isset($post['style'])?$post['style']:'',
			'package_contents' => isset($post['package_contents'])?$post['package_contents']:'',
			'style_code' => isset($post['style_code'])?$post['style_code']:'',
			'type' => isset($post['type'])?$post['type']:'',
			'neck_type' => isset($post['neck_type'])?$post['neck_type']:'',
			'pockets' => isset($post['pockets'])?$post['pockets']:'',
			'blouse_length' => isset($post['blouse_length'])?$post['blouse_length']:'',
			'saree_length' => isset($post['saree_length'])?$post['saree_length']:'',
			'length' => isset($post['length'])?$post['length']:'',
			'waterproof' => isset($post['waterproof'])?$post['waterproof']:'',
			'laptop_compartment' => isset($post['laptop_compartment'])?$post['laptop_compartment']:'',
			'closure' => isset($post['closure'])?$post['closure']:'',
			'wheels' => isset($post['wheels'])?$post['wheels']:'',
			'no_of_pockets' => isset($post['no_of_pockets'])?$post['no_of_pockets']:'',
			'inner_material' => isset($post['inner_material'])?$post['inner_material']:'',
			'product_dimension' => isset($post['product_dimension'])?$post['product_dimension']:'',
			'minimum_focusing_distance' => isset($post['minimum_focusing_distance'])?$post['minimum_focusing_distance']:'',
			'aperture_withmaxfocal_length' => isset($post['aperture_withmaxfocal_length'])?$post['aperture_withmaxfocal_length']:'',
			'aperture_with_minfocal_length' => isset($post['aperture_with_minfocal_length'])?$post['aperture_with_minfocal_length']:'',
			'maximum_focal_length' => isset($post['maximum_focal_length'])?$post['maximum_focal_length']:'',
			'maximum_reproduction_ratio' => isset($post['maximum_reproduction_ratio'])?$post['maximum_reproduction_ratio']:'',
			'lens_construction' => isset($post['lens_construction'])?$post['lens_construction']:'',
			'lens_hood' => isset($post['lens_hood'])?$post['lens_hood']:'',
			'lens_case' => isset($post['lens_case'])?$post['lens_case']:'',
			'lens_cap' => isset($post['lens_cap'])?$post['lens_cap']:'',
			'filter_attachment_size' => isset($post['filter_attachment_size'])?$post['filter_attachment_size']:'',
			'dimension' => isset($post['dimension'])?$post['dimension']:'',
			'weight' => isset($post['weight'])?$post['weight']:'',
			//dslr
			'resolution' => isset($post['resolution'])?$post['resolution']:'',
			'sensor_type' => isset($post['sensor_type'])?$post['sensor_type']:'',
			'lcd_screen_size' => isset($post['lcd_screen_size'])?$post['lcd_screen_size']:'',
			'battery_type' => isset($post['battery_type'])?$post['battery_type']:'',
			'lens_mount' => isset($post['lens_mount'])?$post['lens_mount']:'',
			'exposure_mode' => isset($post['exposure_mode'])?$post['exposure_mode']:'',
			'meter_coupling' => isset($post['meter_coupling'])?$post['meter_coupling']:'',
			'lens_auto_focus' => isset($post['lens_auto_focus'])?$post['lens_auto_focus']:'',
			'focus_length' => isset($post['focus_length'])?$post['focus_length']:'',
			'focus_point' => isset($post['focus_point'])?$post['focus_point']:'',
			'focus_lock' => isset($post['focus_lock'])?$post['focus_lock']:'',
			'manual_focus' => isset($post['manual_focus'])?$post['manual_focus']:'',
			'af_area_mode' => isset($post['af_area_mode'])?$post['af_area_mode']:'',
			'detection_range' => isset($post['detection_range'])?$post['detection_range']:'',
			'number_of_dots_effective_pixels' => isset($post['number_of_dots_effective_pixels'])?$post['number_of_dots_effective_pixels']:'',
			'brightness_setting' => isset($post['brightness_setting'])?$post['brightness_setting']:'',
			'viewfinder' => isset($post['viewfinder'])?$post['viewfinder']:'',
			'viewfindermagnifiaction' => isset($post['viewfindermagnifiaction'])?$post['viewfindermagnifiaction']:'',
			'aspect_ratio' => isset($post['aspect_ratio'])?$post['aspect_ratio']:'',
			'image_size' => isset($post['image_size'])?$post['image_size']:'',
			'image_resolution' => isset($post['image_resolution'])?$post['image_resolution']:'',
			'video_resolution' => isset($post['video_resolution'])?$post['video_resolution']:'',
			'flash_mode' => isset($post['flash_mode'])?$post['flash_mode']:'',
			'flash_range' => isset($post['flash_range'])?$post['flash_range']:'',
			'built_in_flash' => isset($post['built_in_flash'])?$post['built_in_flash']:'',
			'external_flash' => isset($post['external_flash'])?$post['external_flash']:'',
			'audio_recording_device' => isset($post['audio_recording_device'])?$post['audio_recording_device']:'',
			'audio_recording_format' => isset($post['audio_recording_format'])?$post['audio_recording_format']:'',
			'video_compression' => isset($post['video_compression'])?$post['video_compression']:'',
			'face_detection' => isset($post['face_detection'])?$post['face_detection']:'',
			'video_format' => isset($post['video_format'])?$post['video_format']:'',
			'image_format' => isset($post['image_format'])?$post['image_format']:'',
			'microphone' => isset($post['microphone'])?$post['microphone']:'',
			'pictbridge' => isset($post['pictbridge'])?$post['pictbridge']:'',
			'card_type' => isset($post['card_type'])?$post['card_type']:'',
			'supplied_battery' => isset($post['supplied_battery'])?$post['supplied_battery']:'',
			'ac_adapter' => isset($post['ac_adapter'])?$post['ac_adapter']:'',
			'iso_rating' => isset($post['iso_rating'])?$post['iso_rating']:'',
			'iso_sensitivity' => isset($post['iso_sensitivity'])?$post['iso_sensitivity']:'',
			'dust_reduction' => isset($post['dust_reduction'])?$post['dust_reduction']:'',
			'metering_method' => isset($post['metering_method'])?$post['metering_method']:'',
			'metering_system' => isset($post['metering_system'])?$post['metering_system']:'',
			'supported_languages' => isset($post['supported_languages'])?$post['supported_languages']:'',
			'sync_terminal' => isset($post['sync_terminal'])?$post['sync_terminal']:'',
			'view_finder' => isset($post['view_finder'])?$post['view_finder']:'',
			'white_balancing' => isset($post['white_balancing'])?$post['white_balancing']:'',
			'hdmi' => isset($post['hdmi'])?$post['hdmi']:'',
			'self_timer' => isset($post['self_timer'])?$post['self_timer']:'',
			'scene_modes' => isset($post['scene_modes'])?$post['scene_modes']:'',
			'environment' => isset($post['environment'])?$post['environment']:'',
			//laptops
			'series' => isset($post['series'])?$post['series']:'',
			'part_number' => isset($post['part_number'])?$post['part_number']:'',
			'hdd_capacity' => isset($post['hdd_capacity'])?$post['hdd_capacity']:'',
			'screen_size' => isset($post['screen_size'])?$post['screen_size']:'',
			'processorbrand' => isset($post['processorbrand'])?$post['processorbrand']:'',
			'variant' => isset($post['variant'])?$post['variant']:'',
			'chipset' => isset($post['chipset'])?$post['chipset']:'',
			'clock_speed' => isset($post['clock_speed'])?$post['clock_speed']:'',
			'cache' => isset($post['cache'])?$post['cache']:'',
			'screen_type' => isset($post['screen_type'])?$post['screen_type']:'',
			'graphic_processor' => isset($post['graphic_processor'])?$post['graphic_processor']:'',
			'memory_slots' => isset($post['memory_slots'])?$post['memory_slots']:'',
			'rpm' => isset($post['rpm'])?$post['rpm']:'',
			'rpm' => isset($post['rpm'])?$post['rpm']:'',
			'optical_drive' => isset($post['optical_drive'])?$post['optical_drive']:'',
			'wan' => isset($post['wan'])?$post['wan']:'',
			'ethernet' => isset($post['ethernet'])?$post['ethernet']:'',
			'vgaport' => isset($post['vgaport'])?$post['vgaport']:'',
			'usb_port' => isset($post['usb_port'])?$post['usb_port']:'',
			'hdmi_port' => isset($post['hdmi_port'])?$post['hdmi_port']:'',
			'multi_card_slot' => isset($post['multi_card_slot'])?$post['multi_card_slot']:'',
			'web_camera' => isset($post['web_camera'])?$post['web_camera']:'',
			'keyboard' => isset($post['keyboard'])?$post['keyboard']:'',
			'speakers' => isset($post['speakers'])?$post['speakers']:'',
			'mic_in' => isset($post['mic_in'])?$post['mic_in']:'',
			'power_supply' => isset($post['power_supply'])?$post['power_supply']:'',
			'battery_backup' => isset($post['battery_backup'])?$post['battery_backup']:'',
			'battery_cell' => isset($post['battery_cell'])?$post['battery_cell']:'',
			'adapter' => isset($post['adapter'])?$post['adapter']:'',
			'office' => isset($post['office'])?$post['office']:'',
			'fingerprint_point' => isset($post['fingerprint_point'])?$post['fingerprint_point']:'',
			//headphone
			'noise_reduction' => isset($post['noise_reduction'])?$post['noise_reduction']:'',
			'connectivity' => isset($post['connectivity'])?$post['connectivity']:'',
			'headphone_jack' => isset($post['headphone_jack'])?$post['headphone_jack']:'',
			'compatible_for' => isset($post['compatible_for'])?$post['compatible_for']:'',
			//speakers
			'total_power_output' => isset($post['total_power_output'])?$post['total_power_output']:'',
			'sound_system' => isset($post['sound_system'])?$post['sound_system']:'',
			'speaker_driver' => isset($post['speaker_driver'])?$post['speaker_driver']:'',
			'power' => isset($post['power'])?$post['power']:'',
			'wired_wireless' => isset($post['wired_wireless'])?$post['wired_wireless']:'',
			'bluetooth_range' => isset($post['bluetooth_range'])?$post['bluetooth_range']:'',
			//printers
			'model_series' => isset($post['model_series'])?$post['model_series']:'',
			'installation' => isset($post['installation'])?$post['installation']:'',
			'warranty_card' => isset($post['warranty_card'])?$post['warranty_card']:'',
			'functions' => isset($post['functions'])?$post['functions']:'',
			'printer_type' => isset($post['printer_type'])?$post['printer_type']:'',
			'interface' => isset($post['interface'])?$post['interface']:'',
			'printer_output' => isset($post['printer_output'])?$post['printer_output']:'',
			'max_print_resolution' => isset($post['max_print_resolution'])?$post['max_print_resolution']:'',
			'print_speed' => isset($post['print_speed'])?$post['print_speed']:'',
			'scanner_type' => isset($post['scanner_type'])?$post['scanner_type']:'',
			'document_size' => isset($post['document_size'])?$post['document_size']:'',
			'scanning_resolution' => isset($post['scanning_resolution'])?$post['scanning_resolution']:'',
			'copies_from' => isset($post['copies_from'])?$post['copies_from']:'',
			'copy_size' => isset($post['copy_size'])?$post['copy_size']:'',
			'iso_29183' => isset($post['iso_29183'])?$post['iso_29183']:'',
			'noise_level' => isset($post['noise_level'])?$post['noise_level']:'',
			'paper_hold_input' => isset($post['paper_hold_input'])?$post['paper_hold_input']:'',
			'paper_hold_output' => isset($post['paper_hold_output'])?$post['paper_hold_output']:'',
			'paper_size' => isset($post['paper_size'])?$post['paper_size']:'',
			'print_margin' => isset($post['print_margin'])?$post['print_margin']:'',
			'standby' => isset($post['standby'])?$post['standby']:'',
			'operating_temperature_range' => isset($post['operating_temperature_range'])?$post['operating_temperature_range']:'',
			//footware
			'sole_material' => isset($post['sole_material'])?$post['sole_material']:'',
			'fastening' => isset($post['fastening'])?$post['fastening']:'',
			'toe_shape' => isset($post['toe_shape'])?$post['toe_shape']:'',
			'ean_upc' => isset($post['ean_upc'])?$post['ean_upc']:'',

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
			'name' => isset($post['product_name'])?$post['product_name']:'',
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
							 move_uploaded_file($_FILES["descimg"]["tmp_name"][$i], "uploads/products/" . $pics[$i]);
							}
							$i++;
							
						}
						$productspecificationlist= array_combine($post['description'],$pics);
						$i=1;foreach ($productspecificationlist as $key=>$list){
								
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
	$data['subitems'] = $this->products_model->get_subitem_list_subcategorywise($data['productdetails']['subcategory_id']);
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
	
	//echo '<pre>';print_r($post);exit;
	//echo '<pre>';print_r($_FILES);
	$discount1= ($post['product_price']-$post['special_price']);
		$discount= number_format($discount1,2 );
		$offers1= (($discount1) /$post['product_price'])*100;
		$offers= number_format($offers1,2 );
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
		
	if($post['colour']!='' && $post['internal_memeory']!='' && $post['ram']!=''){
			$name=$post['name'].' '.ucfirst(strtolower($post['colour'])).' '.str_replace(' ', '', strtoupper($post['internal_memeory'])).' '.$post['ram'].' Ram';
		}else if($post['colour']!='' && $post['internal_memeory']!=''){
			$name=$post['name'].' '.ucfirst(strtolower($post['colour'])).' '.str_replace(' ', '', strtoupper($post['internal_memeory']));
		}else if($post['colour']!=''){
			$name=$post['name'].' '.ucfirst(strtolower($post['colour']));
		}else{
			$name=$post['name'];
		}
		if(isset($post['pattern']) && $post['pattern'] || isset($post['pattern1']) && $post['pattern1'] ){
			if($post['pattern']!=''){
			$pattern=$post['pattern'];
			}if($post['pattern1']!=''){
			$pattern=$post['pattern1'];
			}
		}
		if(isset($post['sleeve']) && $post['sleeve'] || isset($post['sleeve1']) && $post['sleeve1'] ){
			if($post['sleeve']!=''){
			$sleeve=$post['sleeve'];
			}if($post['sleeve1']!=''){
			$sleeve=$post['sleeve1'];
			}
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
		if($post['editsubitemid']==''){
			$subitem=$post['subitemid'];
		}else{
			$subitem=$post['editsubitemid'];
		}
		$updatedata=array(
			'category_id' => isset($post['category_id'])?$post['category_id']:'',		
			'subcategory_id' => isset($subcatid)?$subcatid:'',		
			'subitemid' => isset($subitem)?$subitem:'',		
			'item_name' => isset($name)?$name:'',
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
			'internal_memeory' =>isset($post['internal_memeory'])?str_replace(' ', '', strtoupper($post['internal_memeory'])):'',
			'camera' => isset($post['camera'])?$post['camera']:'',
			'sim_type' => isset($post['sim_type'])?$post['sim_type']:'',
			'os' => isset($post['os'])?$post['os']:'',
			'colour' => isset($post['colour'])?ucfirst(strtolower($post['colour'])):'',
			'ram' => isset($post['ram'])?str_replace(' ', '', strtoupper($post['ram'])):'',
			'model_name' => isset($post['model_name'])?$post['model_name']:'',
			'model_id' => isset($post['model_id'])?$post['model_id']:'',
			'internal_memory' => isset($post['internal_memory'])?str_replace(' ', '', strtoupper($post['internal_memory'])):'',
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
			'ingredients' => isset($post['ingredients'])?$post['ingredients']:'',
			'key_feature' => isset($post['key_feature'])?$post['key_feature']:'',
			'unit' => isset($post['unit'])?$post['unit']:'',
			'packingtype' => isset($post['packingtype'])?$post['packingtype']:'',
			'disclaimer' => isset($post['disclaimer'])?$post['disclaimer']:'',
			'wash_care' => isset($post['wash_care'])?$post['wash_care']:'',
			'style_code' => isset($post['style_code'])?$post['style_code']:'',
			'look' => isset($post['look'])?$post['look']:'',
			'size' => isset($post['size'])?$post['size']:'',
			'material' => isset($post['material'])?$post['material']:'',
			'occasion' => isset($post['occasion'])?$post['occasion']:'',
			'pattern' => isset($pattern)?$pattern:'',
			'sleeve' => isset($sleeve)?$sleeve:'',
			'fit' => isset($post['fit'])?$post['fit']:'',
			'gender' => isset($post['gender'])?$post['gender']:'',
			'collar_type' => isset($post['collar_type'])?$post['collar_type']:'',
			'set_contents' => isset($post['set_contents'])?$post['set_contents']:'',
			'age' => isset($post['age'])?$post['age']:'',
			'ideal_for' => isset($post['ideal_for'])?$post['ideal_for']:'',
			'style' => isset($post['style'])?$post['style']:'',
			'package_contents' => isset($post['package_contents'])?$post['package_contents']:'',
			'style_code' => isset($post['style_code'])?$post['style_code']:'',
			'type' => isset($post['type'])?$post['type']:'',
			'neck_type' => isset($post['neck_type'])?$post['neck_type']:'',
			'pockets' => isset($post['pockets'])?$post['pockets']:'',
			'blouse_length' => isset($post['blouse_length'])?$post['blouse_length']:'',
			'saree_length' => isset($post['saree_length'])?$post['saree_length']:'',
			'length' => isset($post['length'])?$post['length']:'',
			'waterproof' => isset($post['waterproof'])?$post['waterproof']:'',
			'laptop_compartment' => isset($post['laptop_compartment'])?$post['laptop_compartment']:'',
			'closure' => isset($post['closure'])?$post['closure']:'',
			'wheels' => isset($post['wheels'])?$post['wheels']:'',
			'no_of_pockets' => isset($post['no_of_pockets'])?$post['no_of_pockets']:'',
			'inner_material' => isset($post['inner_material'])?$post['inner_material']:'',
			'product_dimension' => isset($post['product_dimension'])?$post['product_dimension']:'',
			'minimum_focusing_distance' => isset($post['minimum_focusing_distance'])?$post['minimum_focusing_distance']:'',
			'aperture_withmaxfocal_length' => isset($post['aperture_withmaxfocal_length'])?$post['aperture_withmaxfocal_length']:'',
			'aperture_with_minfocal_length' => isset($post['aperture_with_minfocal_length'])?$post['aperture_with_minfocal_length']:'',
			'maximum_focal_length' => isset($post['maximum_focal_length'])?$post['maximum_focal_length']:'',
			'maximum_reproduction_ratio' => isset($post['maximum_reproduction_ratio'])?$post['maximum_reproduction_ratio']:'',
			'lens_construction' => isset($post['lens_construction'])?$post['lens_construction']:'',
			'lens_hood' => isset($post['lens_hood'])?$post['lens_hood']:'',
			'lens_case' => isset($post['lens_case'])?$post['lens_case']:'',
			'lens_cap' => isset($post['lens_cap'])?$post['lens_cap']:'',
			'filter_attachment_size' => isset($post['filter_attachment_size'])?$post['filter_attachment_size']:'',
			'dimension' => isset($post['dimension'])?$post['dimension']:'',
			'weight' => isset($post['weight'])?$post['weight']:'',
			//dslr
			'resolution' => isset($post['resolution'])?$post['resolution']:'',
			'sensor_type' => isset($post['sensor_type'])?$post['sensor_type']:'',
			'lcd_screen_size' => isset($post['lcd_screen_size'])?$post['lcd_screen_size']:'',
			'battery_type' => isset($post['battery_type'])?$post['battery_type']:'',
			'lens_mount' => isset($post['lens_mount'])?$post['lens_mount']:'',
			'exposure_mode' => isset($post['exposure_mode'])?$post['exposure_mode']:'',
			'meter_coupling' => isset($post['meter_coupling'])?$post['meter_coupling']:'',
			'lens_auto_focus' => isset($post['lens_auto_focus'])?$post['lens_auto_focus']:'',
			'focus_length' => isset($post['focus_length'])?$post['focus_length']:'',
			'focus_point' => isset($post['focus_point'])?$post['focus_point']:'',
			'focus_lock' => isset($post['focus_lock'])?$post['focus_lock']:'',
			'manual_focus' => isset($post['manual_focus'])?$post['manual_focus']:'',
			'af_area_mode' => isset($post['af_area_mode'])?$post['af_area_mode']:'',
			'detection_range' => isset($post['detection_range'])?$post['detection_range']:'',
			'number_of_dots_effective_pixels' => isset($post['number_of_dots_effective_pixels'])?$post['number_of_dots_effective_pixels']:'',
			'brightness_setting' => isset($post['brightness_setting'])?$post['brightness_setting']:'',
			'viewfinder' => isset($post['viewfinder'])?$post['viewfinder']:'',
			'viewfindermagnifiaction' => isset($post['viewfindermagnifiaction'])?$post['viewfindermagnifiaction']:'',
			'aspect_ratio' => isset($post['aspect_ratio'])?$post['aspect_ratio']:'',
			'image_size' => isset($post['image_size'])?$post['image_size']:'',
			'image_resolution' => isset($post['image_resolution'])?$post['image_resolution']:'',
			'video_resolution' => isset($post['video_resolution'])?$post['video_resolution']:'',
			'flash_mode' => isset($post['flash_mode'])?$post['flash_mode']:'',
			'flash_range' => isset($post['flash_range'])?$post['flash_range']:'',
			'built_in_flash' => isset($post['built_in_flash'])?$post['built_in_flash']:'',
			'external_flash' => isset($post['external_flash'])?$post['external_flash']:'',
			'audio_recording_device' => isset($post['audio_recording_device'])?$post['audio_recording_device']:'',
			'audio_recording_format' => isset($post['audio_recording_format'])?$post['audio_recording_format']:'',
			'video_compression' => isset($post['video_compression'])?$post['video_compression']:'',
			'face_detection' => isset($post['face_detection'])?$post['face_detection']:'',
			'video_format' => isset($post['video_format'])?$post['video_format']:'',
			'image_format' => isset($post['image_format'])?$post['image_format']:'',
			'microphone' => isset($post['microphone'])?$post['microphone']:'',
			'pictbridge' => isset($post['pictbridge'])?$post['pictbridge']:'',
			'card_type' => isset($post['card_type'])?$post['card_type']:'',
			'supplied_battery' => isset($post['supplied_battery'])?$post['supplied_battery']:'',
			'ac_adapter' => isset($post['ac_adapter'])?$post['ac_adapter']:'',
			'iso_rating' => isset($post['iso_rating'])?$post['iso_rating']:'',
			'iso_sensitivity' => isset($post['iso_sensitivity'])?$post['iso_sensitivity']:'',
			'dust_reduction' => isset($post['dust_reduction'])?$post['dust_reduction']:'',
			'metering_method' => isset($post['metering_method'])?$post['metering_method']:'',
			'metering_system' => isset($post['metering_system'])?$post['metering_system']:'',
			'supported_languages' => isset($post['supported_languages'])?$post['supported_languages']:'',
			'sync_terminal' => isset($post['sync_terminal'])?$post['sync_terminal']:'',
			'view_finder' => isset($post['view_finder'])?$post['view_finder']:'',
			'white_balancing' => isset($post['white_balancing'])?$post['white_balancing']:'',
			'hdmi' => isset($post['hdmi'])?$post['hdmi']:'',
			'self_timer' => isset($post['self_timer'])?$post['self_timer']:'',
			'scene_modes' => isset($post['scene_modes'])?$post['scene_modes']:'',
			'environment' => isset($post['environment'])?$post['environment']:'',
			//laptops
			'series' => isset($post['series'])?$post['series']:'',
			'part_number' => isset($post['part_number'])?$post['part_number']:'',
			'hdd_capacity' => isset($post['hdd_capacity'])?$post['hdd_capacity']:'',
			'screen_size' => isset($post['screen_size'])?$post['screen_size']:'',
			'processorbrand' => isset($post['processorbrand'])?$post['processorbrand']:'',
			'variant' => isset($post['variant'])?$post['variant']:'',
			'chipset' => isset($post['chipset'])?$post['chipset']:'',
			'clock_speed' => isset($post['clock_speed'])?$post['clock_speed']:'',
			'cache' => isset($post['cache'])?$post['cache']:'',
			'screen_type' => isset($post['screen_type'])?$post['screen_type']:'',
			'graphic_processor' => isset($post['graphic_processor'])?$post['graphic_processor']:'',
			'memory_slots' => isset($post['memory_slots'])?$post['memory_slots']:'',
			'rpm' => isset($post['rpm'])?$post['rpm']:'',
			'rpm' => isset($post['rpm'])?$post['rpm']:'',
			'optical_drive' => isset($post['optical_drive'])?$post['optical_drive']:'',
			'wan' => isset($post['wan'])?$post['wan']:'',
			'ethernet' => isset($post['ethernet'])?$post['ethernet']:'',
			'vgaport' => isset($post['vgaport'])?$post['vgaport']:'',
			'usb_port' => isset($post['usb_port'])?$post['usb_port']:'',
			'hdmi_port' => isset($post['hdmi_port'])?$post['hdmi_port']:'',
			'multi_card_slot' => isset($post['multi_card_slot'])?$post['multi_card_slot']:'',
			'web_camera' => isset($post['web_camera'])?$post['web_camera']:'',
			'keyboard' => isset($post['keyboard'])?$post['keyboard']:'',
			'speakers' => isset($post['speakers'])?$post['speakers']:'',
			'mic_in' => isset($post['mic_in'])?$post['mic_in']:'',
			'power_supply' => isset($post['power_supply'])?$post['power_supply']:'',
			'battery_backup' => isset($post['battery_backup'])?$post['battery_backup']:'',
			'battery_cell' => isset($post['battery_cell'])?$post['battery_cell']:'',
			'adapter' => isset($post['adapter'])?$post['adapter']:'',
			'office' => isset($post['office'])?$post['office']:'',
			'fingerprint_point' => isset($post['fingerprint_point'])?$post['fingerprint_point']:'',
			//headphone
			'noise_reduction' => isset($post['noise_reduction'])?$post['noise_reduction']:'',
			'connectivity' => isset($post['connectivity'])?$post['connectivity']:'',
			'headphone_jack' => isset($post['headphone_jack'])?$post['headphone_jack']:'',
			'compatible_for' => isset($post['compatible_for'])?$post['compatible_for']:'',
			//speakers
			'total_power_output' => isset($post['total_power_output'])?$post['total_power_output']:'',
			'sound_system' => isset($post['sound_system'])?$post['sound_system']:'',
			'speaker_driver' => isset($post['speaker_driver'])?$post['speaker_driver']:'',
			'power' => isset($post['power'])?$post['power']:'',
			'wired_wireless' => isset($post['wired_wireless'])?$post['wired_wireless']:'',
			'bluetooth_range' => isset($post['bluetooth_range'])?$post['bluetooth_range']:'',
			//printers
			'model_series' => isset($post['model_series'])?$post['model_series']:'',
			'installation' => isset($post['installation'])?$post['installation']:'',
			'warranty_card' => isset($post['warranty_card'])?$post['warranty_card']:'',
			'functions' => isset($post['functions'])?$post['functions']:'',
			'printer_type' => isset($post['printer_type'])?$post['printer_type']:'',
			'interface' => isset($post['interface'])?$post['interface']:'',
			'printer_output' => isset($post['printer_output'])?$post['printer_output']:'',
			'max_print_resolution' => isset($post['max_print_resolution'])?$post['max_print_resolution']:'',
			'print_speed' => isset($post['print_speed'])?$post['print_speed']:'',
			'scanner_type' => isset($post['scanner_type'])?$post['scanner_type']:'',
			'document_size' => isset($post['document_size'])?$post['document_size']:'',
			'scanning_resolution' => isset($post['scanning_resolution'])?$post['scanning_resolution']:'',
			'copies_from' => isset($post['copies_from'])?$post['copies_from']:'',
			'copy_size' => isset($post['copy_size'])?$post['copy_size']:'',
			'iso_29183' => isset($post['iso_29183'])?$post['iso_29183']:'',
			'noise_level' => isset($post['noise_level'])?$post['noise_level']:'',
			'paper_hold_input' => isset($post['paper_hold_input'])?$post['paper_hold_input']:'',
			'paper_hold_output' => isset($post['paper_hold_output'])?$post['paper_hold_output']:'',
			'paper_size' => isset($post['paper_size'])?$post['paper_size']:'',
			'print_margin' => isset($post['print_margin'])?$post['print_margin']:'',
			'standby' => isset($post['standby'])?$post['standby']:'',
			'operating_temperature_range' => isset($post['operating_temperature_range'])?$post['operating_temperature_range']:'',
			//footware
			'sole_material' => isset($post['sole_material'])?$post['sole_material']:'',
			'fastening' => isset($post['fastening'])?$post['fastening']:'',
			'toe_shape' => isset($post['toe_shape'])?$post['toe_shape']:'',
			'ean_upc' => isset($post['ean_upc'])?$post['ean_upc']:'',
			'item_image'=>$image1,
			'item_image1'=>$image2,
			'item_image2'=>$image3,
			'item_image3'=>$image4,
			'item_image4'=>$image5,
			'item_image5'=>$image6,
			'item_image6'=>$image7,
			'item_image7'=>$image8,
			'seller_location_area'=>$seller_location['area'],
			'name' => isset($post['name'])?$post['name']:'',
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
											move_uploaded_file($_FILES["descimg"]["tmp_name"][$i], "uploads/products/" . $pics[$i]);
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
									$i=1;foreach ($productspecificationlist as $key=>$list){
												
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
			$url=base_url('uploads/products/'.$name);
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
	public function ajaxeditchanges(){
		$post=$this->input->post();
		$productdetails=$this->products_model->get_product_details($post['item_id']);
		//echo '<pre>';print_r($post);
		if($post['valuename']=='product_name'){
			$editdata = array(
			'item_name' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='product_code'){
			$editdata = array(
			'product_code' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='product_cost'){
			
			$discount1= ($post['value']-$productdetails['special_price']);
			$discount= number_format($discount1,2 );
			$offers1= (($discount1) /$post['value'])*100;
			$offers= number_format($offers1,2 );
			$editdata = array(
			'item_cost' => $post['value'],
			'offers' => $offers,
			'discount' => $discount,
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='product_special'){
			$discount1= ($productdetails['item_cost']-$post['value']);
			$discount= number_format($discount1,2 );
			$offers1= (($discount1) /$productdetails['item_cost'])*100;
			$offers= number_format($offers1,2 );
			$editdata = array(
			'special_price' => $post['value'],
			'offers' => $offers,
			'discount' => $discount,
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='qty'){
			$editdata = array(
			'item_quantity' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='status'){
			$editdata = array(
			'item_status' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='status'){
			$editdata = array(
			'item_status' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='brand'){
			$editdata = array(
			'brand' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='Processor'){
			$editdata = array(
			'Processor' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='screen_size'){
			$editdata = array(
			'screen_size' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='internal_memeory'){
			$editdata = array(
			'internal_memeory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='camera'){
			$editdata = array(
			'camera' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='sim_type'){
			$editdata = array(
			'sim_type' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='os'){
			$editdata = array(
			'os' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='colour'){
			$editdata = array(
			'colour' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='ram'){
			$editdata = array(
			'ram' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='model_name'){
			$editdata = array(
			'model_name' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='model_id'){
			$editdata = array(
			'model_id' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='internal_memory'){
			$editdata = array(
			'internal_memory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='expand_memory'){
			$editdata = array(
			'expand_memory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='primary_camera'){
			$editdata = array(
			'primary_camera' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='primary_camera_feature'){
			$editdata = array(
			'primary_camera_feature' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='secondary_camera'){
			$editdata = array(
			'secondary_camera' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='secondary_camera_feature'){
			$editdata = array(
			'secondary_camera_feature' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='video_recording'){
			$editdata = array(
			'video_recording' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='hd_recording'){
			$editdata = array(
			'hd_recording' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='flash'){
			$editdata = array(
			'flash' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='other_camera_features'){
			$editdata = array(
			'other_camera_features' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='battery_capacity'){
			$editdata = array(
			'battery_capacity' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='talk_time'){
			$editdata = array(
			'talk_time' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='standby_time'){
			$editdata = array(
			'standby_time' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='operating_frequency'){
			$editdata = array(
			'operating_frequency' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='preinstalled_browser'){
			$editdata = array(
			'preinstalled_browser' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='wifi'){
			$editdata = array(
			'wifi' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='gps'){
			$editdata = array(
			'gps' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='usb_connectivity'){
			$editdata = array(
			'usb_connectivity' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='bluetooth'){
			$editdata = array(
			'bluetooth' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='nfc'){
			$editdata = array(
			'nfc' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='edge'){
			$editdata = array(
			'edge' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='edge_features'){
			$editdata = array(
			'edge_features' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='music_player'){
			$editdata = array(
			'music_player' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='video_player'){
			$editdata = array(
			'video_player' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='audio_jack'){
			$editdata = array(
			'audio_jack' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='gpu'){
			$editdata = array(
			'gpu' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='sim_size'){
			$editdata = array(
			'sim_size' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='sim_supported'){
			$editdata = array(
			'sim_supported' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='call_memory'){
			$editdata = array(
			'call_memory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='sms_memory'){
			$editdata = array(
			'sms_memory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='phone_book_memory'){
			$editdata = array(
			'phone_book_memory' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='sensors'){
			$editdata = array(
			'sensors' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='java'){
			$editdata = array(
			'java' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='insales_package'){
			$editdata = array(
			'insales_package' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='dislay_resolution'){
			$editdata = array(
			'dislay_resolution' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='display_type'){
			$editdata = array(
			'display_type' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='ingredients'){
			$editdata = array(
			'ingredients' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='service_type'){
			$editdata = array(
			'service_type' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='unit'){
			$editdata = array(
			'unit' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='packingtype'){
			$editdata = array(
			'packingtype' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}else if($post['valuename']=='disclaimer'){
			$editdata = array(
			'disclaimer' => $post['value'],
			'updated_at' => date('Y-m-d H:i:s'),    
			);
		}
		//echo '<pre>';print_r($editdata);exit;
		$editsave=$this->products_model->update_deails($post['item_id'],$editdata);
		if(count($editsave)>0){
			$data['msg']=1;
			if($post['valuename']=='product_cost'){
				$data['cost']=$post['value'];
			}else{
				$data['cost']=$productdetails['item_cost'];
			}
			if($post['valuename']=='product_special'){
				$data['special_cost']=$post['value'];
			}else{
				$data['special_cost']=$productdetails['special_price'];
			}
			echo json_encode($data);
		}else{
			$data['msg']=2;
			if($post['valuename']=='product_cost'){
				$data['cost']=$post['value'];
			}else{
				$data['cost']=$productdetails['item_cost'];
			}
			if($post['valuename']=='product_special'){
				$data['special_cost']=$post['value'];
			}else{
				$data['special_cost']=$productdetails['special_price'];
			}
			echo json_encode($data);
		}
	}
	
	public function relatedproduct_details(){
		$post=$this->input->post();
		$serachvalue=$this->products_model->get_related_products_names_list($post['producname']);
		if(count($serachvalue)>0){
			foreach ($serachvalue as $lis){
				$pnames[]=$lis['item_name'];
			}
			
			
		}else{
			$pnames[]=array();
		}
		//echo '<pre>';print_r($pnames);
		//$tt=implode(",",$pnames);
		//echo '<pre>';print_r($tt);
		if(isset($pnames) && count($pnames)>0){
		$datails=$pnames;
		}else{
		$datails=array('0'=>'No data Found');
		}
		echo json_encode($datails);	
		
	}
		

}