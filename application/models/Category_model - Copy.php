<?php
class Category_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_area_pincodes($pin)
	{
		$this->db->select('*')->from('pincodes_list');
		$this->db->where('pincode',$pin);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}
	public function get_same_products($subcat,$name,$item_id)
	{
		$this->db->select('*')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->where('item_id !=', $item_id);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_simular_products($subcat,$name,$item_id)
	{
	$pname=substr($name, 0, 4);
		$this->db->select('*')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->like('item_name', $pname);
		$this->db->where('item_id !=', $item_id);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	/* for subcategory wise*/
	public function get_sensor_type_list($catid,$subcat)
	{
		$this->db->select('products.sensor_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('sensor_type!=','');
		$this->db->group_by('sensor_type');
		return $this->db->get()->result_array();
	}
	public function get_battery_type_list($catid,$subcat)
	{
		$this->db->select('products.battery_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('battery_type!=','');
		$this->db->group_by('battery_type');
		return $this->db->get()->result_array();
	}
	public function get_mega_pixel_list($catid,$subcat)
	{
		$this->db->select('products.mega_pixel')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('mega_pixel!=','');
		$this->db->group_by('mega_pixel');
		return $this->db->get()->result_array();
	}
	public function get_type_mobile_list($catid,$subcat)
	{
		$this->db->select('products.producttype')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('producttype!=','');
		$this->db->group_by('producttype');
		return $this->db->get()->result_array();
		
	}
	public function get_comatability_mobile_list($catid,$subcat)
	{
		$this->db->select('products.compatible_mobiles')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('compatible_mobiles!=','');
		$this->db->group_by('compatible_mobiles');
		return $this->db->get()->result_array();
		
	}
	public function get_display_size_list($catid,$subcat)
	{
		$this->db->select('products.display_size')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('display_size!=','');
		$this->db->group_by('display_size');
		return $this->db->get()->result_array();
		
	}
	public function get_conncetivity_list($catid,$subcat)
	{
		$this->db->select('products.connectivity')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('connectivity!=','');
		$this->db->group_by('connectivity');
		return $this->db->get()->result_array();
		
	}
	public function get_ram_list($catid,$subcat)
	{
		$this->db->select('products.ram')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ram!=','');
		$this->db->group_by('ram');
		return $this->db->get()->result_array();
		
	}
	public function get_voice_calling_facility_list($catid,$subcat)
	{
		$this->db->select('products.voice_calling_facility')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('voice_calling_facility!=','');
		$this->db->group_by('voice_calling_facility');
		return $this->db->get()->result_array();
		
	}
	public function get_os_list($catid,$subcat)
	{
		$this->db->select('products.operatingsystem')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('operatingsystem!=','');
		$this->db->group_by('operatingsystem');
		return $this->db->get()->result_array();
	}
	public function get_internal_storage_list($catid,$subcat)
	{
		$this->db->select('products.internal_storage')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('internal_storage!=','');
		$this->db->group_by('internal_storage');
		return $this->db->get()->result_array();
	}
	public function get_battery_capacity_list($catid,$subcat)
	{
		$this->db->select('products.battery_capacity')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('battery_capacity!=','');
		$this->db->group_by('battery_capacity');
		return $this->db->get()->result_array();
	}
	public function get_primary_camera_list($catid,$subcat)
	{
		$this->db->select('products.primary_camera')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('primary_camera!=','');
		$this->db->group_by('primary_camera');
		return $this->db->get()->result_array();
	}
	public function get_processor_clock_speed_list($catid,$subcat)
	{
		$this->db->select('products.processor_clock_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor_clock_speed!=','');
		$this->db->group_by('processor_clock_speed');
		return $this->db->get()->result_array();
	}
	public function get_wireless_speed_list($catid,$subcat)
	{
		$this->db->select('products.wireless_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('wireless_speed!=','');
		$this->db->group_by('wireless_speed');
		return $this->db->get()->result_array();
	}
	public function get_frequency_band_list($catid,$subcat)
	{
		$this->db->select('products.frequency_band')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('frequency_band!=','');
		$this->db->group_by('frequency_band');
		return $this->db->get()->result_array();
	}
	public function get_broadband_compatibility_list($catid,$subcat)
	{
		$this->db->select('products.broadband_compatibility')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('broadband_compatibility!=','');
		$this->db->group_by('broadband_compatibility');
		return $this->db->get()->result_array();
	}
	public function get_usb_ports_list($catid,$subcat)
	{
		$this->db->select('products.usb_ports')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('usb_ports!=','');
		$this->db->group_by('usb_ports');
		return $this->db->get()->result_array();
	}
	public function get_frequency_list_list($catid,$subcat)
	{
		$this->db->select('products.frequency')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('frequency!=','');
		$this->db->group_by('frequency');
		return $this->db->get()->result_array();
	}
	public function get_antennae_list($catid,$subcat)
	{
		$this->db->select('products.antennae')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('antennae!=','');
		$this->db->group_by('antennae');
		return $this->db->get()->result_array();
	}
	public function get_processor_list($catid,$subcat)
	{
		$this->db->select('products.processor')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor!=','');
		$this->db->group_by('processor');
		return $this->db->get()->result_array();
	}
	public function get_processor_brand_list($catid,$subcat)
	{
		$this->db->select('products.processor_brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor_brand!=','');
		$this->db->group_by('processor_brand');
		return $this->db->get()->result_array();
	}
	public function get_lifestyle_list($catid,$subcat)
	{
		$this->db->select('products.life_style')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('life_style!=','');
		$this->db->group_by('life_style');
		return $this->db->get()->result_array();
	}
	public function get_storage_type_list($catid,$subcat)
	{
		$this->db->select('products.storage_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('storage_type!=','');
		$this->db->group_by('storage_type');
		return $this->db->get()->result_array();
	}
	public function get_graphics_memory_list($catid,$subcat)
	{
		$this->db->select('products.graphics_memory')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('graphics_memory!=','');
		$this->db->group_by('graphics_memory');
		return $this->db->get()->result_array();
	}
	public function get_touch_screen_list($catid,$subcat)
	{
		$this->db->select('products.touch_screen')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('touch_screen!=','');
		$this->db->group_by('touch_screen');
		return $this->db->get()->result_array();
	}
	public function get_weight_list($catid,$subcat)
	{
		$this->db->select('products.weight')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('weight!=','');
		$this->db->group_by('weight');
		return $this->db->get()->result_array();
	}
	public function get_memory_type_list($catid,$subcat)
	{
		$this->db->select('products.memory_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('memory_type!=','');
		$this->db->group_by('memory_type');
		return $this->db->get()->result_array();
	}
	public function get_ram_typee_list($catid,$subcat)
	{
		$this->db->select('products.ram_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ram_type!=','');
		$this->db->group_by('ram_type');
		return $this->db->get()->result_array();
	}
	public function get_network_type_list($catid,$subcat)
	{
		$this->db->select('products.network_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('network_type!=','');
		$this->db->group_by('network_type');
		return $this->db->get()->result_array();
	}
	public function get_speciality_list($catid,$subcat)
	{
		$this->db->select('products.speciality')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('speciality!=','');
		$this->db->group_by('speciality');
		return $this->db->get()->result_array();
	}
	public function get_operating_system_version_name_list($catid,$subcat)
	{
		$this->db->select('products.operating_system_version_name')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('operating_system_version_name!=','');
		$this->db->group_by('operating_system_version_name');
		return $this->db->get()->result_array();
	}
	public function get_resolution_type_list($catid,$subcat)
	{
		$this->db->select('products.resolution_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('resolution_type!=','');
		$this->db->group_by('resolution_type');
		return $this->db->get()->result_array();
	}
	public function get_secondary_camera_list($catid,$subcat)
	{
		$this->db->select('products.secondary_camera')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('secondary_camera!=','');
		$this->db->group_by('secondary_camera');
		return $this->db->get()->result_array();
	}
	public function get_sim_type_list($catid,$subcat)
	{
		$this->db->select('products.sim_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('sim_type!=','');
		$this->db->group_by('sim_type');
		return $this->db->get()->result_array();
	}
	public function get_clock_speed_list($catid,$subcat)
	{
		$this->db->select('products.clock_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('clock_speed!=','');
		$this->db->group_by('clock_speed');
		return $this->db->get()->result_array();
	}
	public function get_cores_list($catid,$subcat)
	{
		$this->db->select('products.cores')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('cores!=','');
		$this->db->group_by('cores');
		return $this->db->get()->result_array();
	}
	public function get_theme_list($catid,$subcat)
	{
		$this->db->select('products.theme')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('theme!=','');
		$this->db->group_by('theme');
		return $this->db->get()->result_array();
	}
	public function get_dial_shape_list($catid,$subcat)
	{
		$this->db->select('products.dial_shape')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('dial_shape!=','');
		$this->db->group_by('dial_shape');
		return $this->db->get()->result_array();
	}
	public function get_compatibleos_list($catid,$subcat)
	{
		$this->db->select('products.compatibleos')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('compatibleos!=','');
		$this->db->group_by('compatibleos');
		return $this->db->get()->result_array();
	}
	public function get_usage_list($catid,$subcat)
	{
		$this->db->select('products.usage')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('usage!=','');
		$this->db->group_by('usage');
		return $this->db->get()->result_array();
	}
	public function get_display_type_list($catid,$subcat)
	{
		$this->db->select('products.display_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('display_type!=','');
		$this->db->group_by('display_type');
		return $this->db->get()->result_array();
	}
	public function get_occasion_list($catid,$subcat)
	{
		$this->db->select('products.occasion')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('occasion!=','');
		$this->db->group_by('occasion');
		return $this->db->get()->result_array();
	}
	public function get_ideal_for_sub($catid,$subcat)
	{
		$this->db->select('products.ideal_for')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ideal_for!=','');
		$this->db->group_by('ideal_for');
		return $this->db->get()->result_array();
	}
	public function get_material_list($catid,$subcat)
	{
		$this->db->select('products.material')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('material!=','');
		$this->db->group_by('material');
		return $this->db->get()->result_array();
	}
	public function get_gemstones_list($catid,$subcat)
	{
		$this->db->select('products.gemstones')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('gemstones!=','');
		$this->db->group_by('gemstones');
		return $this->db->get()->result_array();
	}
	public function get_strap_color_list($catid,$subcat)
	{
		$this->db->select('products.strap_color')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('strap_color!=','');
		$this->db->group_by('strap_color');
		return $this->db->get()->result_array();
	}
	public function get_dial_color_list($catid,$subcat)
	{
		$this->db->select('products.dial_color')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('dial_color!=','');
		$this->db->group_by('dial_color');
		return $this->db->get()->result_array();
	}
	public function get_packof_list($catid,$subcat)
	{
		$this->db->select('products.packof')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('packof!=','');
		$this->db->group_by('packof');
		return $this->db->get()->result_array();
	}
	public function update_dial_color_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET dial_color ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_packof_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET packof ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_strap_color_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET strap_color ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_material_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET material ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_gemstones_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET gemstones ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_ideal_for_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET ideal_for ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_occasion_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET occasion ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_display_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET display_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_usage_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET usages ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_compatibleos_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET compatibleos ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	
	public function update_dial_shape_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET dial_shape ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_theme_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET theme ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_clock_speed_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET clock_speed ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_cores_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET cores ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_secondary_camera_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET secondary_camera ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_sim_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET sim_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_resolution_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET resolution_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_operating_system_version_name_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET operating_system_version_name ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_speciality_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET speciality ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_network_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET network_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_ram_typee_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET ram_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_memory_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET memory_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_weight_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET weight ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_touch_screen_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET touch_screen ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_storage_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET storage_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_graphics_memory_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET graphics_memory ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_life_style_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET life_style ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_processor_brand_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET processor_brand ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_processor_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET processor ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_antennae_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET antennae ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_frequency_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET frequency ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_usb_ports_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET usb_ports ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_frequency_band_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET frequency_band ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_broadband_compatibility_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET broadband_compatibility ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_wireless_speed_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET wireless_speed ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_processor_clock_speed_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET processor_clock_speed ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_primary_camera_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET primary_camera ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_battery_capacity_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET battery_capacity ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_internal_storage_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET internal_storage ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_os_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET operatingsystem ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_voice_calling_facility_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET voice_calling_facility ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_ram_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET ram ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_connectivity_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET connectivity ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_display_size_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET display_size ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_battery_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET battery_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_sensor_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET sensor_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_megapixel_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET mega_pixel ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_carema_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET producttype ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_mobileacc_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET compatible_mobiles ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_size_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET size ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	
	public function update_color_privoussubcategory_searchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET color ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_discount_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET discount ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_brand_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET brand ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_offer_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET offers ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_res_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET restraent ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_cusine_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET cusine ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_status_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET status ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_all_previous_subcategory_search_fields()
	{
		$this->db->select('*')->from('subcat_wise_fliter_search');
		$this->db->where('Ip_address',$this->input->ip_address());
		return $this->db->get()->result_array();
	}
	public function get_all_previous_search_subcategory_fields()
	{
		$this->db->select('*')->from('subcat_wise_fliter_search');
		$this->db->where('Ip_address',$this->input->ip_address());
		return $this->db->get()->result_array();
	}
	public function delete_privous_subcategort_searchdata($id)
	{
		$sql1="DELETE FROM subcat_wise_fliter_search WHERE id = '".$id."'";
		return $this->db->query($sql1);
	}
	public function save_sub_searchdata($data){
		
		$this->db->insert('subcat_wise_fliter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_all_previous_subcategorywise_search_fields()
	{
		$this->db->select('*')->from('subcat_wise_fliter_search');
		$this->db->where('Ip_address',$this->input->ip_address());
		return $this->db->get()->result_array();
	}
	public function update_amount_privous_subcategory_wise_searchdata($min,$max,$id)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET mini_amount ='".$min."', max_amount ='".$max."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_search_all_subcategory_id()
	{
		$this->db->select('subcategories.subcategory_name,subcat_wise_fliter_search.category_id,subcat_wise_fliter_search.subcategory_id')->from('subcat_wise_fliter_search');
		$this->db->join('subcategories', 'subcategories.category_id = subcat_wise_fliter_search.subcategory_id', 'left');
		$this->db->limit(1);
		return $this->db->get()->result_array();
	}
	public function get_all_color_list_sub($catid,$subcatid){
		$this->db->select('product_color_list.color_name')->from('products');
		$this->db->join('product_color_list', 'product_color_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.category_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_color_list.color_name!=','');
		$this->db->group_by('product_color_list.color_name');
		return $this->db->get()->result_array();
	}
	public function get_all_size_list_sub($catid,$subcatid){
		$this->db->select('product_size_list.p_size_name')->from('products');
		$this->db->join('product_size_list', 'product_size_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.category_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name!=','');
		$this->db->group_by('product_size_list.p_size_name');
		return $this->db->get()->result_array();
	}
	public function get_search_all_subcategorywise_products()
	{
	
	
	$this->db->select('*')->from('subcat_wise_fliter_search');
	$this->db->group_by('subcat_wise_fliter_search.cusine');
	$this->db->group_by('subcat_wise_fliter_search.restraent');
	$this->db->group_by('subcat_wise_fliter_search.mini_amount');
	$this->db->group_by('subcat_wise_fliter_search.max_amount');
	$this->db->group_by('subcat_wise_fliter_search.offers');
	$this->db->group_by('subcat_wise_fliter_search.brand');
	$this->db->group_by('subcat_wise_fliter_search.discount');
	$this->db->group_by('subcat_wise_fliter_search.status');
	$this->db->group_by('subcat_wise_fliter_search.size');
	$this->db->group_by('subcat_wise_fliter_search.color');
	$this->db->group_by('subcat_wise_fliter_search.compatible_mobiles');
	$this->db->group_by('subcat_wise_fliter_search.producttype');
	$this->db->group_by('subcat_wise_fliter_search.mega_pixel');
	$this->db->group_by('subcat_wise_fliter_search.sensor_type');
	$this->db->group_by('subcat_wise_fliter_search.battery_type');
	$this->db->group_by('subcat_wise_fliter_search.display_size');
	$this->db->group_by('subcat_wise_fliter_search.connectivity');
	$this->db->group_by('subcat_wise_fliter_search.ram');
	$this->db->group_by('subcat_wise_fliter_search.voice_calling_facility');
	$this->db->group_by('subcat_wise_fliter_search.operatingsystem');
	$this->db->group_by('subcat_wise_fliter_search.internal_storage');
	$this->db->group_by('subcat_wise_fliter_search.battery_capacity');
	$this->db->group_by('subcat_wise_fliter_search.primary_camera');
	$this->db->group_by('subcat_wise_fliter_search.processor_clock_speed');
	$this->db->group_by('subcat_wise_fliter_search.wireless_speed');
	$this->db->group_by('subcat_wise_fliter_search.frequency_band');
	$this->db->group_by('subcat_wise_fliter_search.broadband_compatibility');
	$this->db->group_by('subcat_wise_fliter_search.usb_ports');
	$this->db->group_by('subcat_wise_fliter_search.frequency');
	$this->db->group_by('subcat_wise_fliter_search.antennae');
	$this->db->group_by('subcat_wise_fliter_search.processor');
	$this->db->group_by('subcat_wise_fliter_search.processor_brand');
	$this->db->group_by('subcat_wise_fliter_search.life_style');
	$this->db->group_by('subcat_wise_fliter_search.storage_type');
	$this->db->group_by('subcat_wise_fliter_search.graphics_memory');
	$this->db->group_by('subcat_wise_fliter_search.touch_screen');
	$this->db->group_by('subcat_wise_fliter_search.weight');
	$this->db->group_by('subcat_wise_fliter_search.memory_type');
	$this->db->group_by('subcat_wise_fliter_search.ram_type');
	$this->db->group_by('subcat_wise_fliter_search.network_type');
	$this->db->group_by('subcat_wise_fliter_search.speciality');
	$this->db->group_by('subcat_wise_fliter_search.operating_system_version_name');
	$this->db->group_by('subcat_wise_fliter_search.resolution_type');
	$this->db->group_by('subcat_wise_fliter_search.secondary_camera');
	$this->db->group_by('subcat_wise_fliter_search.sim_type');
	$this->db->group_by('subcat_wise_fliter_search.clock_speed');
	$this->db->group_by('subcat_wise_fliter_search.cores');
	$this->db->group_by('subcat_wise_fliter_search.theme');
	$this->db->group_by('subcat_wise_fliter_search.dial_shape');
	$this->db->group_by('subcat_wise_fliter_search.compatibleos');
	$this->db->group_by('subcat_wise_fliter_search.usages');
	$this->db->group_by('subcat_wise_fliter_search.display_type');
	$this->db->group_by('subcat_wise_fliter_search.occasion');
	$this->db->group_by('subcat_wise_fliter_search.ideal_for');
	$this->db->group_by('subcat_wise_fliter_search.material');
	$this->db->group_by('subcat_wise_fliter_search.gemstones');
	$this->db->group_by('subcat_wise_fliter_search.strap_color');
	$this->db->group_by('subcat_wise_fliter_search.dial_color');
	$this->db->group_by('subcat_wise_fliter_search.packof');
	$query=$this->db->get()->result_array();
		foreach ($query as $sorting){
			
			if($sorting['cusine']!=''){
				$return['cusine'][] = $this->get_subcategorycusine($sorting['cusine'],$sorting['category_id'],$sorting['subcategory_id']);
			}
		
			if($sorting['restraent']!=''){
				$return['restraent'][] = $this->get_subcategoryrestraent($sorting['restraent'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['offers']!=''){
			$return['offers'][] = $this->get_subcategoryoffers($sorting['offers'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['brand']!=''){
			$return['brand'][] = $this->get_subcategorybrand($sorting['brand'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['discount']!=''){
			$return['discount'][] = $this->get_subcategorydiscount($sorting['discount'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['compatible_mobiles']!=''){
			$return['compatible_mobiles'][] = $this->get_subcategorymobileacc($sorting['compatible_mobiles'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['producttype']!=''){
			$return['producttype'][] = $this->get_subcategoryproducttype($sorting['producttype'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['mega_pixel']!=''){
			$return['mega_pixel'][] = $this->get_subcategorymega_pixel($sorting['mega_pixel'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['sensor_type']!=''){
			$return['sensor_type'][] = $this->get_subcategorysensor_type($sorting['sensor_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['battery_type']!=''){
			$return['battery_type'][] = $this->get_subcategorybattery_type($sorting['battery_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['display_size']!=''){
			$return['display_size'][] = $this->get_subcategorydisplay_size($sorting['display_size'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['connectivity']!=''){
			$return['connectivity'][] = $this->get_subcategoryconnectivity($sorting['connectivity'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['voice_calling_facility']!=''){
			$return['voice_calling_facility'][] = $this->get_subcategoryvoice_calling_facility($sorting['voice_calling_facility'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['ram']!=''){
			$return['ram'][] = $this->get_subcategoryram($sorting['ram'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['operatingsystem']!=''){
			$return['operatingsystem'][] = $this->get_subcategoryoperatingsystem($sorting['operatingsystem'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['internal_storage']!=''){
			$return['internal_storage'][] = $this->get_subcategoryinternal_storage($sorting['internal_storage'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['battery_capacity']!=''){
			$return['battery_capacity'][] = $this->get_subcategorybattery_capacity($sorting['battery_capacity'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['primary_camera']!=''){
			$return['primary_camera'][] = $this->get_subcategoryprimary_camera($sorting['primary_camera'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor_clock_speed']!=''){
			$return['processor_clock_speed'][]=$this->get_subcategoryprocessor_clock_speed($sorting['processor_clock_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['wireless_speed']!=''){
			$return['wireless_speed'][] = $this->get_subcategorywireless_speed($sorting['wireless_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['frequency_band']!=''){
			$return['frequency_band'][] = $this->get_subcategoryfrequency_band($sorting['frequency_band'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['broadband_compatibility']!=''){
			$return['broadband_compatibility'][] = $this->get_subcategorybroadband_compatibility($sorting['broadband_compatibility'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['usb_ports']!=''){
			$return['usb_ports'][] = $this->get_subcategoryusb_ports($sorting['usb_ports'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['frequency']!=''){
			$return['frequency'][] = $this->get_subcategoryfrequency($sorting['frequency'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['antennae']!=''){
			$return['antennae'][] = $this->get_subcategoryantennae($sorting['antennae'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor']!=''){
			$return['processor'][] = $this->get_subcategoryprocessor($sorting['processor'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor_brand']!=''){
			$return['processor_brand'][] = $this->get_subcategoryprocessor_brand($sorting['processor_brand'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['life_style']!=''){
			$return['life_style'][] = $this->get_subcategorylife_style($sorting['life_style'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['storage_type']!=''){
			$return['storage_type'][] = $this->get_subcategorystorage_type($sorting['storage_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['graphics_memory']!=''){
			$return['graphics_memory'][] = $this->get_subcategorygraphics_memory($sorting['graphics_memory'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['touch_screen']!=''){
			$return['touch_screen'][] = $this->get_subcategorytouch_screen($sorting['touch_screen'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['weight']!=''){
			$return['weight'][] = $this->get_subcategoryweight($sorting['weight'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['memory_type']!=''){
			$return['memory_type'][] = $this->get_subcategorymemory_type($sorting['memory_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['ram_type']!=''){
			$return['ram_type'][] = $this->get_subcategoryram_type($sorting['ram_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['network_type']!=''){
			$return['network_type'][] = $this->get_subcategorynetwork_type($sorting['network_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['speciality']!=''){
			$return['speciality'][] = $this->get_subcategoryspeciality($sorting['speciality'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['operating_system_version_name']!=''){
			$return['operating_system_version_name'][] = $this->get_subcategoryoperating_system_version_name($sorting['operating_system_version_name'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['resolution_type']!=''){
			$return['resolution_type'][] = $this->get_subcategoryresolution_type($sorting['resolution_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['secondary_camera']!=''){
			$return['secondary_camera'][] = $this->get_subcategorysecondary_camera($sorting['secondary_camera'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['sim_type']!=''){
			$return['sim_type'][] = $this->get_subcategorysim_type($sorting['sim_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['clock_speed']!=''){
			$return['clock_speed'][] = $this->get_subcategoryclock_speed($sorting['clock_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['cores']!=''){
			$return['cores'][] = $this->get_subcategorycores($sorting['cores'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['theme']!=''){
			$return['theme'][] = $this->get_subcategorytheme($sorting['theme'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['dial_shape']!=''){
			$return['dial_shape'][] = $this->get_subcategorydial_shape($sorting['dial_shape'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['compatibleos']!=''){
			$return['compatibleos'][] = $this->get_subcategorycompatibleos($sorting['compatibleos'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['usages']!=''){
			$return['usages'][] = $this->get_subcategoryusages($sorting['usages'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['display_type']!=''){
			$return['display_type'][] = $this->get_subcategorydisplay_type($sorting['display_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['occasion']!=''){
			$return['occasion'][] = $this->get_subcategoryoccasion($sorting['occasion'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['ideal_for']!=''){
			$return['ideal_for'][] = $this->get_subcategoryideal_for($sorting['ideal_for'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['material']!=''){
			$return['material'][] = $this->get_subcategorymaterial($sorting['material'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['gemstones']!=''){
			$return['gemstones'][] = $this->get_subcategorygemstones($sorting['gemstones'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['strap_color']!=''){
			$return['strap_color'][] = $this->get_subcategorystrap_color($sorting['strap_color'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['dial_color']!=''){
			$return['dial_color'][] = $this->get_subcategorydial_color($sorting['dial_color'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['packof']!=''){
			$return['packof'][] = $this->get_subcategorypackof($sorting['packof'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			
			
			$return['mini_amount'][] = $this->get_subcategoryamount($sorting['mini_amount'],$sorting['max_amount'],$sorting['category_id'],$sorting['subcategory_id']);
			$return['status'][] = $this->get_subcategorystatus($sorting['status'],$sorting['category_id'],$sorting['subcategory_id']);
			//echo $this->db->last_query();exit;
		}
		if(!empty($return))
		{
		return $return;
		}
		
	}
		
	public function get_subcategorypackof($packof,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('packof',$packof);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorydial_color($dial_color,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('dial_color',$dial_color);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorystrap_color($strap_color,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('strap_color',$strap_color);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorygemstones($gemstones,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('gemstones',$gemstones);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymaterial($material,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('material',$material);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryideal_for($ideal_for,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ideal_for',$ideal_for);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryoccasion($occasion,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('occasion',$occasion);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorydisplay_type($display_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('display_type',$display_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryusages($usages,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('usages',$usages);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorycompatibleos($compatibleos,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('compatibleos',$compatibleos);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorydial_shape($dial_shape,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('dial_shape',$dial_shape);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorytheme($theme,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('theme',$theme);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorycores($cores,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('cores',$cores);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryclock_speed($clock_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('clock_speed',$clock_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorysim_type($sim_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('sim_type',$sim_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorysecondary_camera($secondary_camera,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('secondary_camera',$secondary_camera);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryresolution_type($resolution_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('resolution_type',$resolution_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryoperating_system_version_name($operating_system_version_name,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('operating_system_version_name',$operating_system_version_name);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryspeciality($speciality,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('speciality',$speciality);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorynetwork_type($network_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('network_type',$network_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}	
	public function get_subcategoryram_type($ram_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ram_type',$ram_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymemory_type($memory_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('memory_type',$memory_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryweight($weight,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('weight',$weight);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorytouch_screen($touch_screen,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('touch_screen',$touch_screen);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorygraphics_memory($graphics_memory,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('graphics_memory',$graphics_memory);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorystorage_type($storage_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('storage_type',$storage_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorylife_style($life_style,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('life_style',$life_style);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor_brand($processor_brand,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor_brand',$processor_brand);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor($processor,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor',$processor);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryantennae($antennae,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('antennae',$antennae);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryfrequency($frequency,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('frequency',$frequency);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryusb_ports($usb_ports,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('usb_ports',$usb_ports);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybroadband_compatibility($broadband_compatibility,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('broadband_compatibility',$broadband_compatibility);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryfrequency_band($frequency_band,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('frequency_band',$frequency_band);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorywireless_speed($wireless_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('wireless_speed',$wireless_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor_clock_speed($processor_clock_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor_clock_speed',$processor_clock_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprimary_camera($primary_camera,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('primary_camera',$primary_camera);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybattery_capacity($battery_capacity,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('battery_capacity',$battery_capacity);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryinternal_storage($internal_storage,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('internal_storage',$internal_storage);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryoperatingsystem($operatingsystem,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('operatingsystem',$operatingsystem);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryram($ram,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ram',$ram);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryvoice_calling_facility($voice_calling_facility,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('voice_calling_facility',$voice_calling_facility);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryconnectivity($connectivity,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('connectivity',$connectivity);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorydisplay_size($display_size,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('display_size',$display_size);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybattery_type($battery_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('battery_type',$battery_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorysensor_type($sensor_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('sensor_type',$sensor_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymobileacc($mobileacc,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('compatible_mobiles',$mobileacc);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryproducttype($producttype,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('producttype',$producttype);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorymega_pixel($mega_pixel,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('mega_pixel',$mega_pixel);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	
	/*sub*/
	public function get_subcategorydiscount($discount,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('discount',$discount);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorybrand($brand,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('brand',$brand);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryoffers($offer,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('offers',$offer);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorycusine($cusine,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('cusine',$cusine);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryrestraent($restraent,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('seller_id',$restraent);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_subcategorystatus($status,$cid,$subcat){
		$this->db->select('*')->from('products');
		if($status!=0){
			$this->db->where('item_quantity !=',0);
		}else{
		$this->db->where('item_quantity=',0);	
		}
		$this->db->where('item_status',1);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	
	/* food categorywise*/
	public function get_subcategoryamount($min_amunt,$max_amount,$cid,$subcat){
		
		$sql = "SELECT * FROM products WHERE category_id ='".$cid."' AND  subcategory_id ='".$subcat."' AND item_status ='1' AND  item_cost BETWEEN '".$min_amunt."' AND '".$max_amount."'";
		return $this->db->query($sql)->result_array();
		//echo $this->db->last_query();exit;
	}
	
	
	/* for subcategory wise*/
	/* for search data*/
	public function category_searflietrs(){
		
	$this->db->select('fliter_search.category_id,fliter_search.value,')->from('fliter_search');
	$query=$this->db->get()->result_array();
	$this->db->group_by('Ip_address',$this->input->ip_address());
	$this->db->where('Ip_address',$this->input->ip_address());

	$query=$this->db->get()->result_array();
		foreach ($query as $list){
			echo '<pre>';print_r($list);
			
		}
	}
	public function get_all_category_search_products($data){
		$this->db->select('*')->from('products');
		$this->db->where('products.item_status',1);
		$this->db->where_in('seller_id',$data);
		$this->db->where_in('cusine',$data);
		return $this->db->get()->result_array();
		
	}
	public function save_searchdata($data){
		
		$this->db->insert('fliter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_all_subcategory_list()
	{
	
	$this->db->select('category.category_id,subcategory_name,subcategories.subcategory_id')->from('fliter_search');
	$this->db->join('category', 'category.category_id =fliter_search.category_id', 'left');
	$this->db->join('subcategories', 'subcategories.category_id = category.category_id', 'left');
	$this->db->group_by('fliter_search.category_id');
	$query=$this->db->get()->result_array();
	foreach($query as $subcategory)
	{
//echo '<pre>';print_r($subcategory);exit;	
	$return = $this->get_all_subcategory($subcategory['category_id']);

	}
	if(!empty($return))
    {
    return $return;
	}
		
	
	}
	
	
	/*------------------*/
	
	
	public function getCategoryData($where = "")
	{
		
		$sql = 
		"
			SELECT * FROM categories
			
		";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();
		}	
	}
	
	public function getSidebarData()
	{
		$productcnts = $this->getproductIds();		
		$allCat = $this->getParentCategories($productcnts);
		$retData = $this->getChildCategories($allCat,$productcnts);
		return $retData;
	}
	
	public function getParentCategories($productcnts)
	{
		$sql = 
		"
			SELECT cat.category_id, cat.category_name FROM category AS cat		
			
			ORDER BY cat.category_id
		";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			$categoryData = $result->result_array();
			$retVal = array();	
			$cnt = 0;
			foreach($categoryData as $category)
			{
				$retVal[$category["category_id"]] = $category;
				$retVal[$category["category_id"]]["prod_cnt"] = isset($productcnts['category'][$category["category_id"]]["cnt"]) ? $productcnts['category'][$category["category_id"]]["cnt"] : 0;
				
				if($retVal[$category["category_id"]]["prod_cnt"] == "0")
				unset($retVal[$category["category_id"]]);
				$cnt++;
			}
		//	echo "<pre>";print_r($retVal);die;
			return $retVal;
		}
	}
	
	public function getChildCategories($allCats,$productcnts)
	{
		$sql = "
			SELECT subcat.category_id,subcat.category_name FROM category AS subcat										
			
			ORDER BY subcat.category_id
		";
	//	echo "<pre>";print_r($productcnts);die;
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			$subcategories = $result->result_array();
			$retVal = array();
			$cnt = 0;
			foreach($allCats as $categories)
			{
				$retVal[$categories["category_id"]] = $categories;
				$retVal[$categories["category_id"]]["sub_categories"] = array();
				$cntsub = 0;
				foreach($subcategories as $subcats)
				{
					$parents = explode(",",$subcats["parent_category_id"]);
					foreach($parents as $parent)
					{
						if($parent == $categories["category_id"])
						{
							$retVal[$categories["category_id"]]["sub_categories"][$subcats["category_id"]] = $subcats;
							$retVal[$categories["category_id"]]["sub_categories"][$subcats["category_id"]]["prod_cnt"] = isset($productcnts["category"][$parent]["subcategory"][$subcats["category_id"]]) ? $productcnts["category"][$parent]["subcategory"][$subcats["category_id"]] : 0;
							
					//		echo $productcnts["category"][$parent]["subcategory"][$subcats["category_id"]];
							
							if($retVal[$categories["category_id"]]["sub_categories"][$subcats["category_id"]]["prod_cnt"] == 0)
							{
								unset($retVal[$categories["category_id"]]["sub_categories"][$subcats["category_id"]]);
							}
							else
							$cntsub++;							
						}
					}
				}
				$cnt++;
			}			
			return $retVal;
		}
	}
	
	public function getproductIds()
	{
		$sql = "SELECT product_id,category_id,subcategory_id fROM product
			
		";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			$retData = array();
			$retData["category"] = array();			
			$products = $result->result_array();			
			foreach($products as $prods)
			{
				$cats = explode(",",$prods['category_id']);
				foreach($cats as $each)
				{
					if(isset($retData["category"][$each]["cnt"]))
					{
						$retData["category"][$each]["cnt"]++;
					}
					else 
					{
						$retData["category"][$each]["cnt"] = 1;
					}
					$subcats = explode(",",$prods['subcategory_id']);
					foreach($subcats as $eachsub)
					{
						if(isset($retData["category"][$each]["subcategory"][$eachsub]))$retData["category"][$each]["subcategory"][$eachsub]++;
						else $retData["category"][$each]["subcategory"][$eachsub] = 1;
					}
				}				
			}
			return $retData;
			
		}
	}
/* added by vasudevareddy */
	
	
	/* cusine list*/
	public function get_product_details($id)
	{
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('item_id',$id);
		return $this->db->get()->row_array();
	}
	public function update_amount_privous_searchdata($min,$max,$id)
	{
		$sql1="UPDATE fliter_search SET mini_amount ='".$min."', max_amount ='".$max."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_cusine_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET cusine ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_offer_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET offers ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_brand_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET brand ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_discount_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET discount ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_color_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET color ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_size_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET size ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_res_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET restraent ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_status_privous_searchdata($id,$data)
	{
		$sql1="UPDATE fliter_search SET status ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function delete_privous_searchdata($id)
	{
		$sql1="DELETE FROM fliter_search WHERE id = '".$id."'";
		return $this->db->query($sql1);
	}
	public function get_all_previous_search_fields()
	{
		$this->db->select('*')->from('fliter_search');
		$this->db->where('Ip_address',$this->input->ip_address());
		return $this->db->get()->result_array();
	}
	public function get_search_all_category_id()
	{
		$this->db->select('fliter_search.category_id')->from('fliter_search');
		return $this->db->get()->result_array();
	}	
	public function get_search_all_subcategory_products()
	{
	
	$this->db->select('fliter_search.*')->from('fliter_search');
	$this->db->group_by('fliter_search.cusine');
	$this->db->group_by('fliter_search.restraent');
	$this->db->group_by('fliter_search.mini_amount');
	$this->db->group_by('fliter_search.max_amount');
	$this->db->group_by('fliter_search.offers');
	$this->db->group_by('fliter_search.brand');
	$this->db->group_by('fliter_search.discount');
	$this->db->group_by('fliter_search.status');
	$this->db->group_by('fliter_search.size');
	$this->db->group_by('fliter_search.color');
	$query=$this->db->get()->result_array();
		foreach ($query as $sorting){
			//echo '<pre>';print_r($sorting);exit;
			if($sorting['cusine']!=''){
				$return['cusine'] = $this->get_cusine($sorting['cusine'],$sorting['category_id']);
			}
			if($sorting['restraent']!=''){
				$return['restraent'] = $this->get_restraent($sorting['restraent'],$sorting['category_id']);
			}
			if($sorting['offers']!=''){
			$return['offers'] = $this->get_offers($sorting['offers'],$sorting['category_id']);
			}
			if($sorting['brand']!=''){
			$return['brand'] = $this->get_brands($sorting['brand'],$sorting['category_id']);
			}
			if($sorting['discount']!=''){
			$return['discount'] = $this->get_discounts($sorting['discount'],$sorting['category_id']);
			}
			if($sorting['color']!=''){
				$return['color'] = $this->get_colors($sorting['color'],$sorting['category_id']);
			}
			if($sorting['size']!=''){
			$return['size'] = $this->get_sizes($sorting['size'],$sorting['category_id']);
			}
			$return['mini_amount'] = $this->get_amount($sorting['mini_amount'],$sorting['max_amount'],$sorting['category_id']);
			$return['status'] = $this->get_status($sorting['status'],$sorting['category_id']);
			
		}
		if(!empty($return))
		{
		return $return;
		}
		
	}
	public function get_offers($offer,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('offers',$offer);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_brands($brand,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('brand',$brand);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_discounts($discount,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('discount',$discount);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_sizes($size,$cid){
		
		$this->db->select('products.*')->from('product_size_list');
		$this->db->join('products', 'products.item_id = product_size_list.item_id', 'left'); //
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name',$size);
		$this->db->where('products.category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_colors($color,$cid){
		
		$this->db->select('products.*')->from('product_color_list');
		$this->db->join('products', 'products.item_id = product_color_list.item_id', 'left'); //
		$this->db->where('products.item_status',1);
		$this->db->where('product_color_list.color_name',$color);
		$this->db->where('products.category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_status($status,$cid){
		$this->db->select('*')->from('products');
		if($status!=0){
			$this->db->where('item_quantity !=',0);
		}else{
		$this->db->where('item_quantity=',0);	
		}
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_cusine($cusine,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('cusine',$cusine);
		$this->db->where('category_id',$cid);
		
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_restraent($restraent,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('seller_id',$restraent);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	
	/* food categorywise*/
	public function get_amount($min_amunt,$max_amount,$cid){
		
		$sql = "SELECT * FROM products WHERE category_id ='".$cid."' AND item_status ='1' AND  item_cost BETWEEN '".$min_amunt."' AND '".$max_amount."'";
		return $this->db->query($sql)->result_array();
		//echo $this->db->last_query();exit;
	}
	
	/*subcatwise*/
	public function get_all_offer_list_sub($catid,$subcat)
	{
	
		$this->db->select('products.offers')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('offers!=','');
		$this->db->group_by('offers');
		return $this->db->get()->result_array();
		
	}
	
	public function get_all_discount_list_sub($catid,$subcat)
	{
	
		$this->db->select('products.discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();
		
	}
	public function get_all_brand_list_sib($catid,$subcat)
	{
	
		$this->db->select('products.brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('brand!=','');
		$this->db->group_by('brand');
		return $this->db->get()->result_array();
		
	}
	public function get_all_cusine_list_sub($catid,$subcat)
	{
	
		$this->db->select('products.cusine')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('cusine!=','');
		$this->db->group_by('cusine');
		return $this->db->get()->result_array();
		
	}
	public function get_all_myrestaurant_list_sub($catid,$subcat)
	{
		$this->db->select('sellers.seller_name,sellers.seller_id')->from('products');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.subcategory_id',$subcat);
		$this->db->where('products.item_status',1);
		$this->db->where('products.seller_id!=','');
		$this->db->group_by('products.seller_id');
		return $this->db->get()->result_array();
	}
	public function get_all_price_list_sub($catid,$subcat)
	{
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
	/*subcatwise*/

	public function get_all_cusine_list($catid)
	{
	
		$this->db->select('products.cusine')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('cusine!=','');
		$this->db->group_by('cusine');
		return $this->db->get()->result_array();
		
	}
	public function get_all_myrestaurant_list($catid)
	{
		$this->db->select('sellers.seller_name,sellers.seller_id')->from('products');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.seller_id!=','');
		$this->db->group_by('products.seller_id');
		return $this->db->get()->result_array();
	}
	
	/* food categorywise*/
	/*electronic category*/
	public function get_all_color_list($catid){
		$this->db->select('product_color_list.color_name')->from('products');
		$this->db->join('product_color_list', 'product_color_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_color_list.color_name!=','');
		$this->db->group_by('product_color_list.color_name');
		return $this->db->get()->result_array();
	}
	public function get_all_size_list($catid){
		$this->db->select('product_size_list.p_size_name')->from('products');
		$this->db->join('product_size_list', 'product_size_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name!=','');
		$this->db->group_by('product_size_list.p_size_name');
		return $this->db->get()->result_array();
	}
	/*electronic category*/
	/* GROCERY categorywise*/
	public function get_all_brand_list($catid){
		
		$this->db->select('products.brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('brand!=','');
		$this->db->group_by('brand');
		return $this->db->get()->result_array();
		
	}

	public function get_all_price_list($catid)
	{
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
	public function get_all_discount_list($catid)
	{
		$this->db->select('products.discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();
	}
	public function get_all_avalibility_list($catid)
	{
		$this->db->select('products.item_status')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('item_quantity!=',0);
		return $this->db->get()->row_array();
	}
	public function get_all_offer_list($catid)
	{
		$this->db->select('products.offers')->from('products');
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.offers!=','');
		$this->db->group_by('products.offers');
		return $this->db->get()->result_array();
	}
	
	/* GROCERY categorywise*/
	
	public function get_category_name($catid)
	{
	
	$this->db->select('category.category_name')->from('category');
    $this->db->where_in('category_id', $catid);
	return $this->db->get()->row_array();
		
	}
	public function get_all_wish_lists_ids()
	{
		$this->db->select('*')->from('item_wishlist');
        return $this->db->get()->result_array();
	}
	public function get_all_cart_lists_ids()
	{
		$this->db->select('*')->from('cart');
        return $this->db->get()->result_array();
	}
	public function get_all_subcategory_products($category_ids)
	{
	
	$this->db->select('products.*')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
	$this->db->join('item_wishlist', 'item_wishlist.item_id =products.item_id', 'left');
		
    $this->db->where_in('products.category_id', $category_ids);
    $this->db->where('products.item_status', 1);
	return $this->db->get()->result_array();
		
	}
	public function get_all_subcategory_product($category_ids,$sid)
	{
	
	$this->db->select('products.*')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');
	if($sid!=''){
	$this->db->where_in('products.seller_id',$sid);
	}	
    $this->db->where('products.category_id', $category_ids);
    $this->db->where('products.item_status', 1);
	return $this->db->get()->result_array();
	
	
	}
	public function product_reviews_avg($itemid){
		 
		$sql = "SELECT AVG(rating) as avg,item_id FROM ratings WHERE item_id ='".$itemid."'";
		return $this->db->query($sql)->row_array();	
	}
	public function product_reviews_count($itemid){
		 
		$sql = "SELECT COUNT(item_id) as count,item_id FROM reviews WHERE item_id ='".$itemid."'";
		return $this->db->query($sql)->row_array();	
		 
	 }	
	public function get_category_id($subcatid)
	{
	
	$this->db->select('subcategories.subcategory_id,subcategories.subcategory_name,subcategories.category_id')->from('subcategories');
    $this->db->where('subcategories.subcategory_id', $subcatid);
	return $this->db->get()->row_array();
		
	}
	public function get_all_subcategory_products_list($subcatid)
	{
	
	$this->db->select('products.*,category.category_id')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('subcategories.subcategory_id', $subcatid);
    $this->db->where('products.item_status', 1);
	return $this->db->get()->result_array();
		
	}
	public function get_all_subcategorys($category_ids)
	{
	
	$this->db->select('category.category_id,subcategories.subcategory_name,subcategories.subcategory_id')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');
	$this->db->group_by('subcategories.subcategory_id');
	$this->db->order_by('subcategories.subcategory_id', 'ASC'); 
	$this->db->where('subcategories.status', 1);	
	$this->db->where_in('subcategories.category_id', $category_ids);	
	return $this->db->get()->result_array();
		
	
	}
	public function get_all_subcategory($category_id)
	{
	
	$this->db->select('category.category_id,subcategories.subcategory_name,subcategories.subcategory_id')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');
	$this->db->group_by('subcategories.subcategory_id');
	$this->db->order_by('subcategories.subcategory_id', 'ASC'); 
	$this->db->where('subcategories.status', 1);	
	$this->db->where('subcategories.category_id', $category_id);	
	return $this->db->get()->result_array();
		
	
	}
	
	public function get_all_products($catid){
		
		
		//echo "<pre>";print_r($catid);exit;
		$this->db->select('products.*,category.category_name,item_wishlist.yes')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left');
		//$this->db->join('reviews', 'reviews.item_id = products.item_id', 'left'); //		//
		$this->db->join('item_wishlist', 'item_wishlist.item_id = products.item_id', 'left'); //		//
		$this->db->where('products.subcategory_id',$catid);
		$this->db->where('products.admin_status',0);
		return $this->db->get()->result_array();
	}
	public function get_list_products($catid){
		
		
		//echo "<pre>";print_r($catid);exit;
		$this->db->select('products.*,category.category_name,item_wishlist.yes')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left');
		//$this->db->join('reviews', 'reviews.item_id = products.item_id', 'left'); //		//
		$this->db->join('item_wishlist', 'item_wishlist.item_id = products.item_id', 'left'); //		//
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.admin_status',0);
		return $this->db->get()->result_array();
	}
	public function get_list_categories($catid){
		
		$this->db->select('subcategories.*')->from('subcategories');
		$this->db->where('category_id',$catid);
		//$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public function get_product_stock($catid){
		
		$this->db->select('products.*')->from('products');
		$this->db->where('subcategory_id',$catid);
		$this->db->where('admin_status',0);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_category($catid){
		
		$this->db->select('category.category_name')->from('subcategories');
		$this->db->join('category', 'category.category_id = subcategories.category_id', 'left'); //
		$this->db->where('subcategories.subcategory_id',$catid);
		return $this->db->get()->row_array();
	}
	public function get_products_sizes_list($pid){
		
		$this->db->select('*')->from('product_size_list');
		$this->db->where('item_id',$pid);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public function get_products_uksizes_list($pid){
		
		$this->db->select('*')->from('product_uksize_list');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_products_colos_list($pid){
		
		$this->db->select('*')->from('product_color_list');
		$this->db->where('item_id',$pid);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public function get_products_reviews($pid){
		
		$this->db->select('reviews.*,ratings.rating,customers.cust_firstname')->from('reviews');
		$this->db->join('ratings', 'ratings.review_id = reviews.review_id', 'left'); 
		$this->db->join('customers', 'customers.customer_id = reviews.customer_id', 'left'); 
		$this->db->where('reviews.item_id',$pid);
		$this->db->order_by("ratings.review_id", "DESC");
		return $this->db->get()->result_array();
	}
	public function get_products_specifications_list($pid){
		
		$this->db->select('*')->from('product_spcifications');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_products($pid){
		
		$this->db->select('products.*,item_wishlist.yes')->from('products');
		$this->db->join('item_wishlist', 'item_wishlist.item_id = products.item_id', 'left'); //
		$this->db->where('products.item_id',$pid);
		return $this->db->get()->row_array();
	}
	public function save_review($data){
		
		$this->db->insert('reviews', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_rating($data){
		
		$this->db->insert('ratings', $data);
		return $insert_id = $this->db->insert_id();
	}


		
	
	public function getsubitemdata($cat_id)
 {
  
  	$this->db->select('*')->from('products');
 	$this->db->where('products.category_id',$cat_id);
  	return $query=$this->db->get()->result();  
 }
 // public function getsubitem_one($category_ld)
 // {
  
 //  	$this->db->select('products.item_name')->from('products');
 // 	$this->db->where('products.category_id',$category_ld);
 //  	return $query=$this->db->get()->result();  
 // }


 public function getcompare_item_details($itemid)
 {
  	$this->db->select('*')->from('products');
	$this->db->where('products.item_id',$itemid);
	return $this->db->get()->row_array();
 }
	
}
?>