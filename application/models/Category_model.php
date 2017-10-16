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
	public function get_same_products_color($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('colour');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_size($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('internal_memeory');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_ram($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.ram,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('ram');
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
	public function get_ram_type_list($catid,$subcat)
	{
		$this->db->select('products.ram')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ram!=','');
		$this->db->group_by('ram');
		return $this->db->get()->result_array();
		
	}
	public function get_color_type_list($catid,$subcat)
	{
		$this->db->select('products.colour')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('colour!=','');
		$this->db->group_by('colour');
		return $this->db->get()->result_array();
		
	}
	public function get_os_type_list($catid,$subcat)
	{
		$this->db->select('products.os')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('os!=','');
		$this->db->group_by('os');
		return $this->db->get()->result_array();
		
	}
	public function get_sim_type_type_list($catid,$subcat)
	{
		$this->db->select('products.sim_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('sim_type!=','');
		$this->db->group_by('sim_type');
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
	public function get_camera_type_list($catid,$subcat)
	{
		$this->db->select('products.camera')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('camera!=','');
		$this->db->group_by('camera');
		return $this->db->get()->result_array();
		
	}
	public function get_internal_memeory_list($catid,$subcat)
	{
		$this->db->select('products.internal_memeory')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('internal_memeory!=','');
		$this->db->group_by('internal_memeory');
		return $this->db->get()->result_array();
	}
	public function get_screen_size_list($catid,$subcat)
	{
		$this->db->select('products.screen_size')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('screen_size!=','');
		$this->db->group_by('screen_size');
		return $this->db->get()->result_array();
	}
	public function get_Processor_list($catid,$subcat)
	{
		$this->db->select('products.Processor')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('Processor!=','');
		$this->db->group_by('Processor');
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
	
	public function update_ram_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET ram ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_colour_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET colour ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_os_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET os ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_sim_type_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET sim_type ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_camera_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET camera ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_internal_memeory_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET internal_memeory ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_screen_size_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET screen_size ='".$data."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function update_Processor_privous_subcategorysearchdata($id,$data)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET Processor ='".$data."' WHERE id ='".$id."'";
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
	$this->db->group_by('subcat_wise_fliter_search.ram');
	$this->db->group_by('subcat_wise_fliter_search.colour');
	$this->db->group_by('subcat_wise_fliter_search.os');
	$this->db->group_by('subcat_wise_fliter_search.sim_type');
	$this->db->group_by('subcat_wise_fliter_search.camera');
	$this->db->group_by('subcat_wise_fliter_search.internal_memeory');
	$this->db->group_by('subcat_wise_fliter_search.screen_size');
	$this->db->group_by('subcat_wise_fliter_search.Processor');
	$query=$this->db->get()->result_array();
		foreach ($query as $sorting){
			
			if($sorting['cusine']!=''){
				$return['cusine'][] = $this->get_subcategorycusine($sorting['cusine'],$sorting['category_id'],$sorting['subcategory_id']);
			}
		
			if($sorting['restraent']!=''){
				$return['restraent'][] = $this->get_subcategoryrestraent($sorting['restraent'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['offers']!=''){
			$return['offers'][] = $this->get_subcategoryoffers($sorting['offers'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['brand']!=''){
			$return['brand'][] = $this->get_subcategorybrand($sorting['brand'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['discount']!=''){
			$return['discount'][] = $this->get_subcategorydiscount($sorting['discount'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['ram']!=''){
			$return['ram'][] = $this->get_subcategoryram($sorting['ram'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['colour']!=''){
			$return['colour'][] = $this->get_subcategorycolour($sorting['colour'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['os']!=''){
			$return['os'][] = $this->get_subcategoryos($sorting['os'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['sim_type']!=''){
			$return['sim_type'][] = $this->get_subcategorysim_type($sorting['sim_type'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['camera']!=''){
			$return['camera'][] = $this->get_subcategorycamera($sorting['camera'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['internal_memeory']!=''){
			$return['internal_memeory'][] = $this->get_subcategoryinternal_memeory($sorting['internal_memeory'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['screen_size']!=''){
			$return['screen_size'][] = $this->get_subcategoryscreen_size($sorting['screen_size'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			if($sorting['Processor']!=''){
			$return['Processor'][] = $this->get_subcategoryProcessor($sorting['Processor'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			}
			
			
			$return['mini_amount'][] = $this->get_subcategoryamount($sorting['mini_amount'],$sorting['max_amount'],$sorting['category_id'],$sorting['subcategory_id'],$sorting['status']);
			//echo $this->db->last_query();exit;
			$return['status'][] = $this->get_subcategorystatus($sorting['status'],$sorting['category_id'],$sorting['subcategory_id']);
			//echo $this->db->last_query();exit;
		}
		if(!empty($return))
		{
		return $return;
		}
		
	}
	public function get_subcategoryinternal_memeory($internal_memeory,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('internal_memeory',$internal_memeory);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryProcessor($Processor,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('item_status',$staus);
		$this->db->where('Processor',$Processor);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryscreen_size($screen_size,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('screen_size',$screen_size);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorycamera($camera,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('camera',$camera);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorysim_type($sim_type,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('sim_type',$sim_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryos($os,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('os',$os);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorycolour($colour,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('colour',$colour);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorydiscount($discount,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('discount',$discount);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorybrand($brand,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('brand',$brand);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryoffers($offer,$cid,$subcat,$staus){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('offers',$offer);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryram($ram,$cid,$subcat,$staus){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$staus);
		if($staus!==0){
		$this->db->where('item_quantity',0);	
		}else{
			$this->db->where('item_quantity >',0);
		}
		$this->db->where('ram',$ram);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorystatus($status,$cid,$subcat){
		$this->db->select('*')->from('products');
		if($status!=0){
			$this->db->where('item_quantity !=',0);
			$this->db->where('item_quantity=',1);
		}else{
		$this->db->where('item_quantity=',0);
		$this->db->where('item_status',1);		
		}
		
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	
	/* food categorywise*/
	public function get_subcategoryamount($min_amunt,$max_amount,$cid,$subcat,$status){
		$min_amt=(($min_amunt)+1);
		if($status==0){
			$sql = "SELECT * FROM products WHERE special_price BETWEEN '".$min_amt."' AND '".$max_amount."' AND category_id ='".$cid."' AND  subcategory_id ='".$subcat."' AND item_status ='".$status."' AND item_quantity ='0'";
		}else{
			$sql = "SELECT * FROM products WHERE special_price BETWEEN '".$min_amt."' AND '".$max_amount."' AND category_id ='".$cid."' AND  subcategory_id ='".$subcat."' AND item_status ='".$status."' AND item_quantity >'0'";
		}
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
	public function get_all_subcategory_list($ip)
	{
	
	$this->db->select('category.category_id,subcategory_name,subcategories.subcategory_id')->from('fliter_search');
	$this->db->join('category', 'category.category_id =fliter_search.category_id', 'left');
	$this->db->join('subcategories', 'subcategories.category_id = category.category_id', 'left');
	$this->db->group_by('fliter_search.category_id');
	$this->db->where('fliter_search.Ip_address',$ip);
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
	//$this->db->group_by('fliter_search.cusine');
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
			
			//echo $sorting['status'];exit;
			//echo '<pre>';print_r($sorting);exit;
			/*if($sorting['cusine']!=''){
				$return['cusine'] = $this->get_cusine($sorting['cusine'],$sorting['category_id']);
			}*/
			if($sorting['restraent']!=''){
				$return['restraent'] = $this->get_restraent($sorting['restraent'],$sorting['category_id']);
			}
			if($sorting['offers']!=''){
			$return['offers'] = $this->get_offers($sorting['offers'],$sorting['category_id'],$sorting['status']);
			}
			if($sorting['brand']!=''){
			$return['brand'] = $this->get_brands($sorting['brand'],$sorting['category_id'],$sorting['status']);
			}
			if($sorting['discount']!=''){
			$return['discount'] = $this->get_discounts($sorting['discount'],$sorting['category_id'],$sorting['status']);
			}
			if($sorting['color']!=''){
				$return['color'] = $this->get_colors($sorting['color'],$sorting['category_id']);
			}
			if($sorting['size']!=''){
			$return['size'] = $this->get_sizes($sorting['size'],$sorting['category_id']);
			}
			$return['mini_amount'] = $this->get_amount($sorting['mini_amount'],$sorting['max_amount'],$sorting['category_id']);
			
			//Echo $this->db->last_query();exit;
			$return['status'] = $this->get_status($sorting['status'],$sorting['category_id']);
			
		}
		if(!empty($return))
		{
		return $return;
		}
		
	}
	public function get_offers($offer,$cid,$status){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
		$this->db->where('offers',$offer);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_brands($brand,$cid,$status){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
		$this->db->where('brand',$brand);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_discounts($discount,$cid,$status){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
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
			$this->db->where('item_status',1);
		}else{
		$this->db->where('item_quantity=',0);
			$this->db->where('item_status',1);		
		}
		//$this->db->where('item_status',1);
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
		$min_amt=(($min_amunt)+1);
		$sql = "SELECT * FROM products WHERE category_id ='".$cid."' AND item_status ='1' AND  item_cost BETWEEN '".$min_amt."' AND '".$max_amount."'";
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
	
	$this->db->select('category.category_id,subcategories.subcategory_name,subcategories.subcategory_id,subcategories.subcategory_image')->from('products');
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
	
	$this->db->select('category.category_id,subcategories.subcategory_name,subcategories.subcategory_id,subcategories.subcategory_image')->from('products');
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
		
		$this->db->select('products.*,item_wishlist.yes,seller_store_details.store_name')->from('products');
		$this->db->join('item_wishlist', 'item_wishlist.item_id = products.item_id', 'left'); //
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left'); //
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