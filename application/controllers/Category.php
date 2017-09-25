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
						if($list['compatible_mobiles']==$post['productsvalues']){
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
				if(isset($post['searchvalue']) && $post['searchvalue']=='wireless_speed' && $post['unchecked']!='uncheck'){
					$wireless_speed=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='wireless_speed'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['wireless_speed']==$post['productsvalues']){
						$this->category_model->update_wireless_speed_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$wireless_speed='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='frequency_band' && $post['unchecked']!='uncheck'){
					$frequency_band=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='frequency_band'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['frequency_band']==$post['productsvalues']){
						$this->category_model->update_frequency_band_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$frequency_band='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='broadband_compatibility' && $post['unchecked']!='uncheck'){
					$broadband_compatibility=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='broadband_compatibility'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['broadband_compatibility']==$post['productsvalues']){
						$this->category_model->update_broadband_compatibility_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$broadband_compatibility='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='usb_ports' && $post['unchecked']!='uncheck'){
					$usb_ports=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_ports'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['usb_ports']==$post['productsvalues']){
						$this->category_model->update_usb_ports_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$usb_ports='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='frequency' && $post['unchecked']!='uncheck'){
					$frequency=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='frequency'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['frequency']==$post['productsvalues']){
						$this->category_model->update_frequency_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$frequency='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='antennae' && $post['unchecked']!='uncheck'){
					$antennae=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='antennae'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['antennae']==$post['productsvalues']){
						$this->category_model->update_antennae_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$antennae='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='processor' && $post['unchecked']!='uncheck'){
					$processor=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='processor'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['processor']==$post['productsvalues']){
						$this->category_model->update_processor_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$processor='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='processor_brand' && $post['unchecked']!='uncheck'){
					$processor_brand=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='processor_brand'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['processor_brand']==$post['productsvalues']){
						$this->category_model->update_processor_brand_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$processor_brand='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='life_style' && $post['unchecked']!='uncheck'){
					$life_style=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='life_style'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['life_style']==$post['productsvalues']){
						$this->category_model->update_life_style_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$life_style='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='storage_type' && $post['unchecked']!='uncheck'){
					$storage_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='storage_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['storage_type']==$post['productsvalues']){
						$this->category_model->update_storage_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$storage_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='graphics_memory' && $post['unchecked']!='uncheck'){
					$graphics_memory=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='graphics_memory'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['graphics_memory']==$post['productsvalues']){
						$this->category_model->update_graphics_memory_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$graphics_memory='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='touch_screen' && $post['unchecked']!='uncheck'){
					$touch_screen=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='touch_screen'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['touch_screen']==$post['productsvalues']){
						$this->category_model->update_touch_screen_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$touch_screen='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
					$weight=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['weight']==$post['productsvalues']){
						$this->category_model->update_weight_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$weight='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='memory_type' && $post['unchecked']!='uncheck'){
					$memory_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='memory_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['memory_type']==$post['productsvalues']){
						$this->category_model->update_memory_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$memory_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram_type' && $post['unchecked']!='uncheck'){
					$ram_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['ram_type']==$post['productsvalues']){
						$this->category_model->update_ram_typee_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$ram_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='network_type' && $post['unchecked']!='uncheck'){
					$network_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='network_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['network_type']==$post['productsvalues']){
						$this->category_model->update_network_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$network_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='speciality' && $post['unchecked']!='uncheck'){
					$speciality=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='speciality'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['speciality']==$post['productsvalues']){
						$this->category_model->update_speciality_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$speciality='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='osversion' && $post['unchecked']!='uncheck'){
					$osversion=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='osversion'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['operating_system_version_name']==$post['productsvalues']){
						$this->category_model->update_operating_system_version_name_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$osversion='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='resolution_type' && $post['unchecked']!='uncheck'){
					$resolution_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['resolution_type']==$post['productsvalues']){
						$this->category_model->update_resolution_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$resolution_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='secondary_camera' && $post['unchecked']!='uncheck'){
					$secondary_camera=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='secondary_camera'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['secondary_camera']==$post['productsvalues']){
						$this->category_model->update_secondary_camera_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$secondary_camera='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
					$sim_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['sim_type']==$post['productsvalues']){
						$this->category_model->update_sim_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$sim_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='clock_speed' && $post['unchecked']!='uncheck'){
					$clock_speed=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='clock_speed'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['clock_speed']==$post['productsvalues']){
						$this->category_model->update_clock_speed_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$clock_speed='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='cores' && $post['unchecked']!='uncheck'){
					$cores=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='cores'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['cores']==$post['productsvalues']){
						$this->category_model->update_cores_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$cores='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='theme' && $post['unchecked']!='uncheck'){
					$theme=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='theme'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['theme']==$post['productsvalues']){
						$this->category_model->update_theme_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$theme='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='dial_shape' && $post['unchecked']!='uncheck'){
					$dial_shape=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='dial_shape'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['dial_shape']==$post['productsvalues']){
						$this->category_model->update_dial_shape_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$dial_shape='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='compatibleos' && $post['unchecked']!='uncheck'){
					$compatibleos=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatibleos'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['compatibleos']==$post['productsvalues']){
						$this->category_model->update_compatibleos_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$compatibleos='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='usage' && $post['unchecked']!='uncheck'){
					$usage=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usage'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['usages']==$post['productsvalues']){
						$this->category_model->update_usage_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last-query();exit;
						}
					} 
				}else{
					$usage='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='display_type' && $post['unchecked']!='uncheck'){
					$display_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='display_type'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['display_type']==$post['productsvalues']){
						$this->category_model->update_display_type_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$display_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
					$occasion=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['occasion']==$post['productsvalues']){
						$this->category_model->update_occasion_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$occasion='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ideal_for' && $post['unchecked']!='uncheck'){
					$ideal_for=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ideal_for'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['ideal_for']==$post['productsvalues']){
						$this->category_model->update_ideal_for_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$ideal_for='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
					$material=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['material']==$post['productsvalues']){
						$this->category_model->update_material_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$material='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='gemstones' && $post['unchecked']!='uncheck'){
					$gemstones=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gemstones'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['gemstones']==$post['productsvalues']){
						$this->category_model->update_gemstones_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$gemstones='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='strap_color' && $post['unchecked']!='uncheck'){
					$strap_color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='strap_color'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['strap_color']==$post['productsvalues']){
						$this->category_model->update_strap_color_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$strap_color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='dial_color' && $post['unchecked']!='uncheck'){
					$dial_color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='dial_color'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['dial_color']==$post['productsvalues']){
						$this->category_model->update_dial_color_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$dial_color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='packof' && $post['unchecked']!='uncheck'){
					$packof=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='packof'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['packof']==$post['productsvalues']){
						$this->category_model->update_packof_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$packof='';
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
	'compatible_mobiles'=>isset($mobileacc) ? $mobileacc:'',
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
	'wireless_speed'=>isset($wireless_speed) ? $wireless_speed:'',
	'frequency_band'=>isset($frequency_band) ? $frequency_band:'',
	'broadband_compatibility'=>isset($broadband_compatibility) ? $broadband_compatibility:'',
	'usb_ports'=>isset($usb_ports) ? $usb_ports:'',
	'frequency'=>isset($frequency) ? $frequency:'',
	'antennae'=>isset($antennae) ? $antennae:'',
	'processor'=>isset($processor) ? $processor:'',
	'processor_brand'=>isset($processor_brand) ? $processor_brand:'',
	'life_style'=>isset($life_style) ? $life_style:'',
	'storage_type'=>isset($storage_type) ? $storage_type:'',
	'graphics_memory'=>isset($graphics_memory) ? $graphics_memory:'',
	'touch_screen'=>isset($touch_screen) ? $touch_screen:'',
	'weight'=>isset($weight) ? $weight:'',
	'memory_type'=>isset($memory_type) ? $memory_type:'',
	'ram_type'=>isset($ram_type) ? $ram_type:'',
	'network_type'=>isset($network_type) ? $network_type:'',
	'speciality'=>isset($speciality) ? $speciality:'',
	'operating_system_version_name'=>isset($osversion) ? $osversion:'',
	'resolution_type'=>isset($resolution_type) ? $resolution_type:'',
	'secondary_camera'=>isset($secondary_camera) ? $secondary_camera:'',
	'sim_type'=>isset($sim_type) ? $sim_type:'',
	'clock_speed'=>isset($clock_speed) ? $clock_speed:'',
	'cores'=>isset($cores) ? $cores:'',
	'theme'=>isset($theme) ? $theme:'',
	'dial_shape'=>isset($dial_shape) ? $dial_shape:'',
	'compatibleos'=>isset($compatibleos) ? $compatibleos:'',
	'usages'=>isset($usage) ? $usage:'',
	'display_type'=>isset($display_type) ? $display_type:'',
	'occasion'=>isset($occasion) ? $occasion:'',
	'ideal_for'=>isset($ideal_for) ? $ideal_for:'',
	'material'=>isset($material) ? $material:'',
	'gemstones'=>isset($gemstones) ? $gemstones:'',
	'strap_color'=>isset($strap_color) ? $strap_color:'',
	'dial_color'=>isset($dial_color) ? $dial_color:'',
	'packof'=>isset($packof) ? $packof:'',
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
		
		foreach($subcategory_porduct_list as $list){
						
						foreach($list as $li){
							foreach($li as $l){
							$idslist[]=$l['item_id'];
							}
						}
					}
					//echo '<pre>';print_r($idslist);exit;
					if(isset($idslist) && count($idslist)>0){
							$result = array_unique($idslist);
							//echo '<pre>';print_r($result);exit;
							foreach ($result as $pids){
								$products_list[]=$this->category_model->get_product_details($pids);
							}
								$data['subcategory_porduct_list']=$products_list;
							foreach($data['subcategory_porduct_list'] as $list){
								//echo '<pre>';print_r($list);
								$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
								$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
							}

							$data['avg_count']=$reviewrating;
							$data['rating_count']=$reviewcount;

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
		if($subcaterory_id==36){
		$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		$data['wireless_speed']= $this->category_model->get_wireless_speed_list($caterory_id,$subcaterory_id);
		$data['frequency_band']= $this->category_model->get_frequency_band_list($caterory_id,$subcaterory_id);
		$data['broadband_compatibility']= $this->category_model->get_broadband_compatibility_list($caterory_id,$subcaterory_id);
		$data['usb_ports']= $this->category_model->get_usb_ports_list($caterory_id,$subcaterory_id);
		$data['frequency_list']= $this->category_model->get_frequency_list_list($caterory_id,$subcaterory_id);
		$data['antennae_list']= $this->category_model->get_antennae_list($caterory_id,$subcaterory_id);

		}
		if($subcaterory_id==39){
			$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
			$data['processor_list']= $this->category_model->get_processor_list($caterory_id,$subcaterory_id);
			$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
			$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
			$data['processor_brand']= $this->category_model->get_processor_brand_list($caterory_id,$subcaterory_id);
			$data['lifestyle_list']= $this->category_model->get_lifestyle_list($caterory_id,$subcaterory_id);
			$data['storage_type']= $this->category_model->get_storage_type_list($caterory_id,$subcaterory_id);
			$data['graphics_memory']= $this->category_model->get_graphics_memory_list($caterory_id,$subcaterory_id);
			$data['touch_screen']= $this->category_model->get_touch_screen_list($caterory_id,$subcaterory_id);
			$data['weight_list']= $this->category_model->get_weight_list($caterory_id,$subcaterory_id);
			$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
			$data['memory_type']= $this->category_model->get_memory_type_list($caterory_id,$subcaterory_id);
			$data['ram_type']= $this->category_model->get_ram_typee_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==40){
				$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
				$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
				$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
				$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
				$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
				$data['battery_capacity']= $this->category_model->get_battery_capacity_list($caterory_id,$subcaterory_id);
				$data['network_type']= $this->category_model->get_network_type_list($caterory_id,$subcaterory_id);
				$data['speciality_list']= $this->category_model->get_speciality_list($caterory_id,$subcaterory_id);
				$data['primary_camera']= $this->category_model->get_primary_camera_list($caterory_id,$subcaterory_id);
				$data['operating_system_version_name']= $this->category_model->get_operating_system_version_name_list($caterory_id,$subcaterory_id);
				$data['processor_brand']= $this->category_model->get_processor_brand_list($caterory_id,$subcaterory_id);
				$data['resolution_type']= $this->category_model->get_resolution_type_list($caterory_id,$subcaterory_id);
				$data['secondary_camera']= $this->category_model->get_secondary_camera_list($caterory_id,$subcaterory_id);
				$data['sim_type']= $this->category_model->get_sim_type_list($caterory_id,$subcaterory_id);
				$data['clock_speed']= $this->category_model->get_clock_speed_list($caterory_id,$subcaterory_id);
				$data['cores']= $this->category_model->get_cores_list($caterory_id,$subcaterory_id);


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
		
		if($subcaterory_id!=10 ||$subcaterory_id!=53){
			
			$data['ideal_for']= $this->category_model->get_ideal_for_sub($caterory_id,$subcaterory_id);

		}
		if($subcaterory_id==8 || $subcaterory_id==14 || $subcaterory_id==19 || $subcaterory_id==20 || $subcaterory_id==52 || $subcaterory_id==28 || $subcaterory_id==29){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==10){
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['compatibleos']= $this->category_model->get_compatibleos_list($caterory_id,$subcaterory_id);
			$data['usage_list']= $this->category_model->get_usage_list($caterory_id,$subcaterory_id);
			$data['display_type']= $this->category_model->get_display_type_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==11 || $subcaterory_id==21 || $subcaterory_id==25){
					$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==53){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['occasion']= $this->category_model->get_occasion_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==13 || $subcaterory_id==16 || $subcaterory_id==17 || $subcaterory_id==23){
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		}if($subcaterory_id==15){
			$data['material']= $this->category_model->get_material_list($caterory_id,$subcaterory_id);
			$data['gemstones']= $this->category_model->get_gemstones_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==50){
			$data['strap_color']= $this->category_model->get_strap_color_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
			$data['material']= $this->category_model->get_material_list($caterory_id,$subcaterory_id);
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['dial_color']= $this->category_model->get_dial_color_list($caterory_id,$subcaterory_id);

			}
			if($subcaterory_id==22){
				$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
				$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
				$data['packof']= $this->category_model->get_packof_list($caterory_id,$subcaterory_id);
			}
			if($subcaterory_id==51){
				$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
				$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
				$data['packof']= $this->category_model->get_packof_list($caterory_id,$subcaterory_id);
				$data['occasion']= $this->category_model->get_occasion_list($caterory_id,$subcaterory_id);

			}
			if($subcaterory_id==27){
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['usage_list']= $this->category_model->get_usage_list($caterory_id,$subcaterory_id);
			$data['display_type']= $this->category_model->get_display_type_list($caterory_id,$subcaterory_id);
			}

				
		
	}
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
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
	foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	
	$data['avg_count']=$reviewrating;
	$data['rating_count']=$reviewcount;
	
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
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
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
	//echo '<pre>';print_r($data['subcategory_porduct_list']);exit;
	foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	
	$data['avg_count']=$reviewrating;
	$data['rating_count']=$reviewcount;
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
		if($subcaterory_id==36){
		$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		$data['wireless_speed']= $this->category_model->get_wireless_speed_list($caterory_id,$subcaterory_id);
		$data['frequency_band']= $this->category_model->get_frequency_band_list($caterory_id,$subcaterory_id);
		$data['broadband_compatibility']= $this->category_model->get_broadband_compatibility_list($caterory_id,$subcaterory_id);
		$data['usb_ports']= $this->category_model->get_usb_ports_list($caterory_id,$subcaterory_id);
		$data['frequency_list']= $this->category_model->get_frequency_list_list($caterory_id,$subcaterory_id);
		$data['antennae_list']= $this->category_model->get_antennae_list($caterory_id,$subcaterory_id);

		}
		if($subcaterory_id==39){
			$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
			$data['processor_list']= $this->category_model->get_processor_list($caterory_id,$subcaterory_id);
			$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
			$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
			$data['processor_brand']= $this->category_model->get_processor_brand_list($caterory_id,$subcaterory_id);
			$data['lifestyle_list']= $this->category_model->get_lifestyle_list($caterory_id,$subcaterory_id);
			$data['storage_type']= $this->category_model->get_storage_type_list($caterory_id,$subcaterory_id);
			$data['graphics_memory']= $this->category_model->get_graphics_memory_list($caterory_id,$subcaterory_id);
			$data['touch_screen']= $this->category_model->get_touch_screen_list($caterory_id,$subcaterory_id);
			$data['weight_list']= $this->category_model->get_weight_list($caterory_id,$subcaterory_id);
			$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
			$data['memory_type']= $this->category_model->get_memory_type_list($caterory_id,$subcaterory_id);
			$data['ram_type']= $this->category_model->get_ram_typee_list($caterory_id,$subcaterory_id);
		}if($subcaterory_id==40){
				$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
				$data['ram_list']= $this->category_model->get_ram_list($caterory_id,$subcaterory_id);
				$data['operating_system']= $this->category_model->get_os_list($caterory_id,$subcaterory_id);
				$data['internal_storage']= $this->category_model->get_internal_storage_list($caterory_id,$subcaterory_id);
				$data['display_size']= $this->category_model->get_display_size_list($caterory_id,$subcaterory_id);
				$data['battery_capacity']= $this->category_model->get_battery_capacity_list($caterory_id,$subcaterory_id);
				$data['network_type']= $this->category_model->get_network_type_list($caterory_id,$subcaterory_id);
				$data['speciality_list']= $this->category_model->get_speciality_list($caterory_id,$subcaterory_id);
				$data['primary_camera']= $this->category_model->get_primary_camera_list($caterory_id,$subcaterory_id);
				$data['operating_system_version_name']= $this->category_model->get_operating_system_version_name_list($caterory_id,$subcaterory_id);
				$data['processor_brand']= $this->category_model->get_processor_brand_list($caterory_id,$subcaterory_id);
				$data['resolution_type']= $this->category_model->get_resolution_type_list($caterory_id,$subcaterory_id);
				$data['secondary_camera']= $this->category_model->get_secondary_camera_list($caterory_id,$subcaterory_id);
				$data['sim_type']= $this->category_model->get_sim_type_list($caterory_id,$subcaterory_id);
				$data['clock_speed']= $this->category_model->get_clock_speed_list($caterory_id,$subcaterory_id);
				$data['cores']= $this->category_model->get_cores_list($caterory_id,$subcaterory_id);

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
		if($subcaterory_id!=10 ||$subcaterory_id!=53){
			
			$data['ideal_for']= $this->category_model->get_ideal_for_sub($caterory_id,$subcaterory_id);

		}
		if($subcaterory_id==8 || $subcaterory_id==14 || $subcaterory_id==19 || $subcaterory_id==20 || $subcaterory_id==52 || $subcaterory_id==28 || $subcaterory_id==29){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==10){
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['compatibleos']= $this->category_model->get_compatibleos_list($caterory_id,$subcaterory_id);
			$data['usage_list']= $this->category_model->get_usage_list($caterory_id,$subcaterory_id);
			$data['display_type']= $this->category_model->get_display_type_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==11 || $subcaterory_id==21 || $subcaterory_id==25){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==53){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['occasion']= $this->category_model->get_occasion_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==13 || $subcaterory_id==16 || $subcaterory_id==17 || $subcaterory_id==23){
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==15){
			$data['material']= $this->category_model->get_material_list($caterory_id,$subcaterory_id);
			$data['gemstones']= $this->category_model->get_gemstones_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==50){
			$data['strap_color']= $this->category_model->get_strap_color_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
			$data['material']= $this->category_model->get_material_list($caterory_id,$subcaterory_id);
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['dial_color']= $this->category_model->get_dial_color_list($caterory_id,$subcaterory_id);


		}
		if($subcaterory_id==22){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
			$data['packof']= $this->category_model->get_packof_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==51){
			$data['theme_list']= $this->category_model->get_theme_list($caterory_id,$subcaterory_id);
			$data['producttype_list']= $this->category_model->get_type_mobile_list($caterory_id,$subcaterory_id);
			$data['packof']= $this->category_model->get_packof_list($caterory_id,$subcaterory_id);
			$data['occasion']= $this->category_model->get_occasion_list($caterory_id,$subcaterory_id);
		}
		if($subcaterory_id==27){
			$data['dial_shape']= $this->category_model->get_dial_shape_list($caterory_id,$subcaterory_id);
			$data['usage_list']= $this->category_model->get_usage_list($caterory_id,$subcaterory_id);
			$data['display_type']= $this->category_model->get_display_type_list($caterory_id,$subcaterory_id);
		}
		
		
		
	}
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategorywiseproducts',$data);
	//echo '<pre>';print_r($data);exit;
} 
 public function subcategoryview(){
	 
	
	$data['quick']=base64_decode($this->uri->segment(4));
	$data['subcatid']=base64_decode($this->uri->segment(5));
	//echo '<pre>';print_r($wishlist_ids);exit;
	$removesearch= $this->category_model->get_all_previous_search_fields();
	foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
	}
	$caterory_id=base64_decode($this->uri->segment(3));
	$data['subcategory_list']= $this->category_model->get_all_subcategory($caterory_id);
	$data['category_name']= $this->category_model->get_category_name($caterory_id);
	$sid=$this->uri->segment(4);
	if($sid!='' && is_int($sid)){
		//echo base64_decode($this->uri->segment(4));
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,base64_decode($sid));
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}else if(isset($data['subcatid']) && $data['subcatid']!=''){
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,'');
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}else{
		$data['subcategory_porduct_list']= $this->category_model->get_all_subcategory_product($caterory_id,$sid);
		foreach($data['subcategory_porduct_list'] as $list){
			//echo '<pre>';print_r($list);
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			
		}
	}
	if(isset($reviewrating) && count($reviewrating)>0){
		$data['avg_count']=$reviewrating;
	}
	if(isset($reviewcount) && count($reviewcount)>0){
		$data['rating_count']=$reviewcount;
	}
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
	
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
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
	$data['products_specufucation']= $this->category_model->get_products_specifications_list($pid);
	$data['sizes_list']= $this->category_model->get_products_sizes_list($pid);
	$data['uksizes_list']= $this->category_model->get_products_uksizes_list($pid);
	$data['colors_list']= $this->category_model->get_products_colos_list($pid);
	$data['colorcnt']= count($data['colors_list']);
	$data['sizecnt']= count($data['sizes_list']);
	$data['uksizecnt']= count($data['uksizes_list']);
	$data['bothsizecnt']= count($data['sizes_list'])+ count($data['uksizes_list']);

	//echo '<pre>';print_r($data);exit;
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($customer_ids_list);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	
 }

 public function productreview(){
	 
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'customer_id'=>$post['customer_id'],
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	'seller_id'=>$post['seller_id'],
	'create_at'=>date('Y-m-d H:i:s A'),
	);
	$savereview= $this->category_model->save_review($details);
	
	if(count($savereview)>0){
		
		if($post['count']!=''){
			$addrataing=array(
			'customer_id'=>$post['customer_id'],
			'review_id'=>$savereview,
			'item_id'=>$post['product_id'],
			'name'=>$post['name'],
			'email'=>$post['email'],
			'rating'=>$post['count'],
			'seller_id'=>$post['seller_id'],
			'create_at'=>date('Y-m-d H:i:s A'),
		);
		$saverating= $this->category_model->save_rating($addrataing);
		//echo $this->db->last_query();exit;
		}
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
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
	$data['first_item']=$pid;
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
		$category =$this->input->post('category_id');
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		$this->load->view('customer/comparetwo',$data);
  		

	}	
}
?>