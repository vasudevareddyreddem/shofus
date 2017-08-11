<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
			$this->load->model('category_model'); 
			
 }
 
 public function subcategorywiseearch(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	
				if(isset($post['searchvalue']) && $post['searchvalue']=='status' && $post['unchecked']!='uncheck'){
					$status=$post['productsvalues'];
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						$this->category_model->update_status_privous_subcategorysearchdata($list['id'],$post['productsvalues']);
					} 
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cusine' && $post['unchecked']!='uncheck'){
					$cus=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cusine'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['cusine']==$post['productsvalues']){
						$this->category_model->update_cusine_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$cus='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='res' && $post['unchecked']!='uncheck'){
					$res=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='res'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['restraent']==$post['productsvalues']){
						$this->category_model->update_res_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$res='';
				}
				
				if($post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['offers']==$post['productsvalues']){
						$this->category_model->update_offer_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$offer='';
				}
				if($post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$this->category_model->update_brand_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$brand='';
				}
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$this->category_model->update_discount_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$discount='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='color' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='color'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['color']==$post['productsvalues']){
						$this->category_model->update_color_privoussubcategory_searchdata($list['id'],'');
						}
					} 
				}else{
					$color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$this->category_model->update_size_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='mobileacc' && $post['unchecked']!='uncheck'){
					$mobileacc=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='mobileacc'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['mobileacc']==$post['productsvalues']){
						$this->category_model->update_mobileacc_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$mobileacc='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cameratype' && $post['unchecked']!='uncheck'){
					$cameratype=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cameratype'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['producttype']==$post['productsvalues']){
						$this->category_model->update_carema_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$cameratype='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='mega_pixel' && $post['unchecked']!='uncheck'){
					$mega_pixel=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='mega_pixel'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['mega_pixel']==$post['productsvalues']){
						$this->category_model->update_megapixel_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$mega_pixel='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='sensor_type' && $post['unchecked']!='uncheck'){
					$sensor_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sensor_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['sensor_type']==$post['productsvalues']){
						$this->category_model->update_sensor_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$sensor_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='battery_type' && $post['unchecked']!='uncheck'){
					$battery_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='battery_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['battery_type']==$post['productsvalues']){
						$this->category_model->update_battery_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$battery_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='display_size' && $post['unchecked']!='uncheck'){
					$display_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='display_size'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['display_size']==$post['productsvalues']){
						$this->category_model->update_display_size_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$display_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='connectivity' && $post['unchecked']!='uncheck'){
					$connectivity=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='connectivity'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['connectivity']==$post['productsvalues']){
						$this->category_model->update_connectivity_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$connectivity='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
					$ram=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['ram']==$post['productsvalues']){
						$this->category_model->update_ram_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$ram='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='voice' && $post['unchecked']!='uncheck'){
					$voice=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='voice'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['voice_calling_facility']==$post['productsvalues']){
						$this->category_model->update_voice_calling_facility_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$voice='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
					$os=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['operatingsystem']==$post['productsvalues']){
						$this->category_model->update_os_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$os='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='internal_storage' && $post['unchecked']!='uncheck'){
					$internal_storage=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_storage'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['internal_storage']==$post['productsvalues']){
						$this->category_model->update_internal_storage_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$internal_storage='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='battery_capacity' && $post['unchecked']!='uncheck'){
					$battery_capacity=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='battery_capacity'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['battery_capacity']==$post['productsvalues']){
						$this->category_model->update_battery_capacity_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$battery_capacity='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='primary_camera' && $post['unchecked']!='uncheck'){
					$primary_camera=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='primary_camera'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['primary_camera']==$post['productsvalues']){
						$this->category_model->update_primary_camera_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$primary_camera='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='processorclockspeed' && $post['unchecked']!='uncheck'){
					$processorclockspeed=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='processorclockspeed'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['processor_clock_speed']==$post['productsvalues']){
						$this->category_model->update_processor_clock_speed_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$processorclockspeed='';
				}
				
				
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>$post['categoryid'],
	'subcategory_id'=>$post['subcategoryid'],
	'mini_amount'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'max_amount'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'cusine'=>isset($cus) ? $cus:'',
	'restraent'=>isset($res) ? $res:'',
	'offers'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'discount'=>isset($discount) ? $discount:'',
	'color'=>isset($color) ? $color:'',
	'size'=>isset($size) ? $size:'',
	'mobileacc'=>isset($mobileacc) ? $mobileacc:'',
	'producttype'=>isset($cameratype) ? $cameratype:'',
	'mega_pixel'=>isset($mega_pixel) ? $mega_pixel:'',
	'sensor_type'=>isset($sensor_type) ? $sensor_type:'',
	'battery_type'=>isset($battery_type) ? $battery_type:'',
	'display_size'=>isset($display_size) ? $display_size:'',
	'connectivity'=>isset($connectivity) ? $connectivity:'',
	'voice_calling_facility'=>isset($voice) ? $voice:'',
	'ram'=>isset($ram) ? $ram:'',
	'operatingsystem'=>isset($os) ? $os:'',
	'internal_storage'=>isset($internal_storage) ? $internal_storage:'',
	'battery_capacity'=>isset($battery_capacity) ? $battery_capacity:'',
	'primary_camera'=>isset($primary_camera) ? $primary_camera:'',
	'processor_clock_speed'=>isset($processorclockspeed) ? $processorclockspeed:'',
	'status'=>isset($status) ? $status:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_sub_searchdata($data1);
	if(count($brand1)>0){
		$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
		foreach ($removesearch as $list){
			$this->category_model->update_amount_privous_subcategory_wise_searchdata($post['mini_mum'],$post['maxi_mum'],$list['id']);
			//echo $this->db->last_query();exit;
		
		}
		redirect('category/subcategoryfiltersearch');
		
	}
		
	
	

} 
 public function subcategoryfiltersearch(){
	 
	$post=$this->input->post();
	$subcategory_porduct_list= $this->category_model->get_search_all_subcategorywise_products();
	//echo '<pre>';print_r($subcategory_porduct_list);exit;
	//echo count($subcategory_porduct_list['mini_amount']);exit;
	$data['cat_subcat_ids']= $this->category_model->get_search_all_subcategory_id();

	$caterory_id=$data['cat_subcat_ids'][0]['category_id'];
	$subcaterory_id=$data['cat_subcat_ids'][0]['subcategory_id'];
		
		if(count($subcategory_porduct_list)>0  && count($subcategory_porduct_list['mini_amount'])>0 || count($subcategory_porduct_list['status'])>0 ){
		foreach ($subcategory_porduct_list as $lists){
				foreach ($lists as $li){
						$idslist[]=$li['item_id'];
						$products[]=$li;
					}
		}
		$result = array_unique($idslist);
		
	//echo '<pre>';print_r($result);exit;
	foreach ($result as $pids){
		$products_list[]=$this->category_model->get_product_details($pids);

	}
	$data['subcategory_porduct_list']=$products_list;
	}else{
	
	$data['subcategory_porduct_list']=array();
	}
	$data['previousdata']= $this->category_model->get_all_previous_search_subcategory_fields();
	$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);

	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list_sub($caterory_id,$subcaterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list_sub($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);

		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		if($subcaterory_id==30){
		$data['comatability_mobile_list']= $this->category_model->get_comatability_mobile_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==34){
		$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		$data['megapuxel_list']= $this->category_model->get_mega_pixel_list($caterory_id,$subcaterory_id);
		$data['sensor_type']= $this->category_model->get_sensor_type_list($caterory_id,$subcaterory_id);
		$data['battery_type']= $this->category_model->get_battery_type_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==35){
		$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
		$data['connectivity_list']= $this->category_model->get_conncetivity_list($caterory_id,$subcaterory_id);
		$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
		$data['voice_calling_facility']= $this->category_model->get_voice_calling_facility_list($caterory_id,$subcaterory_id);
		$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
		$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
		$data['battery_capacity']= $this->category_model->get_battery_capacity_list($caterory_id,$subcaterory_id);
		$data['primary_camera']= $this->category_model->get_primary_camera_list($caterory_id,$subcaterory_id);
		$data['processor_clock_speed']= $this->category_model->get_processor_clock_speed_list($caterory_id,$subcaterory_id);
		
		}
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategorywisefiltersearch',$data);
	//echo '<pre>';print_r($data);exit;
}

public function categorywiseearch(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	
				if(isset($post['searchvalue']) && $post['searchvalue']=='status' && $post['unchecked']!='uncheck'){
					$status=$post['productsvalues'];
				
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						$this->category_model->update_status_privous_searchdata($list['id'],$post['productsvalues']);
					} 
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cusine' && $post['unchecked']!='uncheck'){
					$cus=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cusine'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['cusine']==$post['productsvalues']){
						$this->category_model->update_cusine_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$cus='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='res' && $post['unchecked']!='uncheck'){
					$res=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='res'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['restraent']==$post['productsvalues']){
						$this->category_model->update_res_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$res='';
				}
				
				if($post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['offers']==$post['productsvalues']){
						$this->category_model->update_offer_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$offer='';
				}
				if($post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$this->category_model->update_brand_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$brand='';
				}
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$this->category_model->update_discount_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$discount='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='color' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='color'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['color']==$post['productsvalues']){
						$this->category_model->update_color_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$this->category_model->update_size_privous_searchdata($list['id'],'');
						}
					} 
				}else{
					$size='';
				}
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>base64_decode($post['categoryid']),
	'mini_amount'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'max_amount'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'cusine'=>isset($cus) ? $cus:'',
	'restraent'=>isset($res) ? $res:'',
	'offers'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'discount'=>isset($discount) ? $discount:'',
	'color'=>isset($color) ? $color:'',
	'size'=>isset($size) ? $size:'',
	'status'=>isset($status) ? $status:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_searchdata($data1);
	if(count($brand1)>0){
		$removesearch= $this->category_model->get_all_previous_search_fields();
		foreach ($removesearch as $list){
			$this->category_model->update_amount_privous_searchdata($post['mini_mum'],$post['maxi_mum'],$list['id']);
			//echo $this->db->last_query();exit;
		
		}
		redirect('category/filtersearch');
		
	}
		
	
	

}

function filtersearch(){

	$data=array();
	$data['subcategory_list']= $this->category_model->get_all_subcategory_list();
	$subcategory_porduct_list= $this->category_model->get_search_all_subcategory_products();
	$catid= $this->category_model->get_search_all_category_id();
	//echo '<pre>';print_r($subcategory_porduct_list);exit;
		foreach ($catid as $lists){
		$categoryid=$lists['category_id'];
		}
		foreach ($catid as $lists){
		$categoryids=$lists['category_id'];
		}
		//echo count($subcategory_porduct_list);
		if(count($subcategory_porduct_list)>2){
		foreach ($subcategory_porduct_list as $lists){
				foreach ($lists as $li){
						$idslist[]=$li['item_id'];
						$products[]=$li;
					}
		}
		$result = array_unique($idslist);
		
	//echo '<pre>';print_r($result);exit;
	foreach ($result as $pids){
		$products_list[]=$this->category_model->get_product_details($pids);

	}
	$data['subcategory_porduct_list']=$products_list;
	}else{
	
	$data['subcategory_porduct_list']=array();
	}
	$data['previousdata']= $this->category_model->get_all_previous_search_fields();
	$caterory_id=$categoryid;
	$data['category_id']=$categoryids;
		
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);

		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	$data['category_name']= $this->category_model->get_category_name($caterory_id);

	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/filters_search',$data);
	

}	
 public function categorywiseproductslist(){
	 
	
	$removesearch= $this->category_model->get_all_previous_subcategory_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_subcategort_searchdata($list['id']);
	}
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_subcategort_searchdata($list['id']);
	}
	$post=$this->input->post();
	$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_products_list($post['subcategoryid']);
	$data['cat_subcat_ids']= $this->category_model->get_category_id($post['subcategoryid']);
	$caterory_id=$data['cat_subcat_ids']['category_id'];
	$subcaterory_id=$data['cat_subcat_ids']['subcategory_id'];
	//echo '<pre>';print_r($caterory_id);
	//echo '<pre>';print_r($subcaterory_id);
	
	//exit;
	//$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);

	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list_sub($caterory_id,$subcaterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list_sub($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		if($subcaterory_id==30){
		$data['comatability_mobile_list']= $this->category_model->get_comatability_mobile_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==34){
		$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		$data['megapuxel_list']= $this->category_model->get_mega_pixel_list($caterory_id,$subcaterory_id);
		$data['sensor_type']= $this->category_model->get_sensor_type_list($caterory_id,$subcaterory_id);
		$data['battery_type']= $this->category_model->get_battery_type_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==35){
		$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
		$data['connectivity_list']= $this->category_model->get_conncetivity_list($caterory_id,$subcaterory_id);
		$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
		$data['voice_calling_facility']= $this->category_model->get_voice_calling_facility_list($caterory_id,$subcaterory_id);
		$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
		$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
		$data['battery_capacity']= $this->category_model->get_battery_capacity_list($caterory_id,$subcaterory_id);
		$data['primary_camera']= $this->category_model->get_primary_camera_list($caterory_id,$subcaterory_id);
		$data['processor_clock_speed']= $this->category_model->get_processor_clock_speed_list($caterory_id,$subcaterory_id);


		}
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	//echo '<pre>';print_r($data);exit;
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategorywiseproducts',$data);
	//echo '<pre>';print_r($data);exit;
} 
 public function subcategoryview(){
	 
	$removesearch= $this->category_model->get_all_previous_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
	}
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);
	$data['category_name']= $this->category_model->get_category_name($caterory_id);
	$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id);
	$data['category_id']=$this->uri->segment(3);
	if($caterory_id==18){
		$data['cusine_list']= $this->category_model->get_all_cusine_list($caterory_id);
		$data['myrestaurant']= $this->category_model->get_all_myrestaurant_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);

		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==21){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==20){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
		
	}else if($caterory_id==19){
		$data['brand_list']= $this->category_model->get_all_brand_list($caterory_id);
		$data['price_list']= $this->category_model->get_all_price_list($caterory_id);
		$data['discount_list']= $this->category_model->get_all_discount_list($caterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$data['offer_list']= $this->category_model->get_all_offer_list($caterory_id);
		$data['color_list']= $this->category_model->get_all_color_list($caterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list($caterory_id);
		$data['minimum_price'] = reset($data['price_list']);
		$data['maximum_price'] = end($data['price_list']);
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/subcategoryview',$data);
	$this->template->render();
	
 }
 public function view(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_all_products($caterory_id);
	//echo $this->db->last_query();exit;
	$data['category_name']= $this->category_model->get_category($caterory_id);
	$data['stock']= $this->category_model->get_product_stock($caterory_id);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryproducts', $data);
	$this->template->render();
	
 }
 public function views(){
	 
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['category_list']= $this->category_model->get_list_products($caterory_id);
	$data['listcategory']= $this->category_model->get_list_categories($caterory_id);
	//echo $this->db->last_query();exit;
//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/categoryview', $data);
	$this->template->render();
	
 }
 public function categorysearch(){
	 

	$post = $this->input->post();
	//echo '<pre>';print_r($post);exit;
	$stack = $post['sub_cat_id'];
	$uniqueid=array(0,1);
	  array_push($stack, $uniqueid);
	//$this->session->set_userdata('sessiontag',$stack);
	$this->session->set_userdata('billingaddress',$stack); 
	$dd=$this->session->userdata('billingaddress')	;
	echo '<pre>';print_r($dd);exit;
	
	array_push($stack, "0");
	print_r($stack);
	exit;

	
 }
  
 public function productview(){

	 
	$pid=base64_decode($this->uri->segment(3));

	//echo '<pre>';print_r($pid);exit;
	$data['products_list']= $this->category_model->get_products($pid);
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	//echo '<pre>';print_r($data);exit;
 }

 public function productreview(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	);
	$savereview= $this->category_model->save_review($details);
	if(count($savereview)>0){
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('category/productview/'.base64_encode($post['product_id']));	
	}

	//echo '<pre>';print_r($data);exit;
 }

 
 public function productscompare()
 {

 	$pid=base64_decode($this->uri->segment(3));
 	$category_ld =base64_decode($this->uri->segment(4));
 	//print_r($category_ld);exit;
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['item']=$this->category_model->getsubitemdata($category_ld);
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }


	public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		//print_r($category_ld);exit;
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		//print_r($data);exit;
		$this->load->view('customer/compareone',$data);

	}
	public function compare_items_list_two()
	{
		$items=$this->input->post('item_id');
		$data['compare_two']=$this->category_model->getcompare_item_details($items);
		//print_r($data);exit;
		$this->load->view('customer/comparetwo',$data);
  		

	}	
}
?>