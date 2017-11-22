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
		$this->db->where('colour!=','');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_size($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('internal_memeory');
		$this->db->where('internal_memeory!=','');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_ram($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.ram,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('ram');
		$this->db->where('ram!=','');
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
		$this->db->select('products.colour')->from('products');
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.category_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.colour!=','');
		$this->db->group_by('products.colour');
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
		foreach ($query as $listing){
			
			//echo '<pre>';print_r($listing);exit;
			if($listing['brand']!=''){
			$brand[] = $listing['brand'];	
			}
			if($listing['offers']!=''){
			$offers[] =$listing['offers'];
			}if($listing['discount']!=''){
			$discount[] =$listing['discount'];
			}
			if($listing['ram']!=''){
			$ram[] =$listing['ram'];
			}
			if($listing['colour']!=''){
			$colour[] =$listing['colour'];
			}
			if($listing['os']!=''){
			$os[] =$listing['os'];
			}
			if($listing['sim_type']!=''){
			$sim_type[] =$listing['sim_type'];
			}
			if($listing['camera']!=''){
			$camera[] =$listing['camera'];
			}
			if($listing['internal_memeory']!=''){
			$internal_memeory[] =$listing['internal_memeory'];
			}
			if($listing['screen_size']!=''){
			$screen_size[] =$listing['screen_size'];
			}
			if($listing['Processor']!=''){
			$Processor[] =$listing['Processor'];
			}
			$minamount = $listing['mini_amount'];
			$maxamount = $listing['max_amount'];
			$catid = $listing['category_id'];
			$subcatid = $listing['subcategory_id'];
		
		}
		if(isset($brand) && count($brand)>0 ){
			$brands=implode ('","', $brand );
		}else{
		$brands='NULL';

		}
		if(isset($offers) && count($offers)>0){
			$offerss=implode('","',$offers);
		}else{
		$offerss='NULL';
		}
		if(isset($discount) && count($discount)>0 ){
			$discount=implode('","',$discount);
		}else{
		$discount='NULL';
		}
		if(isset($ram) && count($ram)>0 ){
			$ram=implode('","',$ram);
		}else{
		$ram='NULL';
		}
		if(isset($colour) && count($colour)>0 ){
			$colour=implode('","',$colour);
		}else{
		$colour='NULL';
		}
		if(isset($os) && count($os)>0 ){
			$os=implode('","',$os);
		}else{
		$os='NULL';
		}
		if(isset($sim_type) && count($sim_type)>0 ){
			$sim_type=implode('","',$sim_type);
		}else{
		$sim_type='NULL';
		}
		if(isset($camera) && count($camera)>0 ){
			$camera=implode('","',$camera);
		}else{
		$camera='NULL';
		}if(isset($internal_memeory) && count($internal_memeory)>0 ){
			$internal_memeory=implode('","',$internal_memeory);
		}else{
		$internal_memeory='NULL';
		}if(isset($screen_size) && count($screen_size)>0 ){
			$screen_size=implode('","',$screen_size);
		}else{
		$screen_size='NULL';
		}if(isset($Processor) && count($Processor)>0 ){
			$Processor=implode('","',$Processor);
		}else{
		$Processor='NULL';
		}
		$return['filterslist'][] = $this->get_subcategory_filers_products_list_alllist($brands,$discount,$offerss,$ram,$colour,$os,$sim_type,$camera,$internal_memeory,$screen_size,$Processor,$minamount,$maxamount,$catid,$subcatid);
		//echo $this->db->last_query();exit;
		
		//echo '<pre>';print_r($return);exit;
		if(!empty($return))
		{
		return $return;
		}
		
	}
	
	public function get_subcategory_filers_products_list_alllist($b,$d,$f,$ram,$colour,$os,$sim_type,$camera,$internal_memeory,$screen_size,$Processor,$min,$max,$cid,$subcatid){
		
		$min_amt=(($min)-1);
		$maxmum=(int)$max;
		$lessamount=($maxmum)-($min_amt);
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('*')->from('products');
		if($lessamount<='500' || $lessamount<='100'){
		$this->db->where('item_cost <=', '"'.$maxmum.'"',false);
		}else{
			$this->db->where('item_cost <=',$maxmum);
		}
		$this->db->where('item_cost >=', '"'.(int)$min_amt.'"',false);
		if($b!='NULL'){
			$this->db->where_in('brand','"'.$b.'"',false);
		
		}if($f!='NULL'){
			$this->db->where_in('offer_percentage','"'.$f.'"',false);
			//$this->db->where_in('if(`offer_expairdate`>=NOW(),`offer_percentage`,`offers` )', '"'.$f.'"', false);
		}if($d!='NULL'){
			$this->db->where_in('discount','"'.$d.'"',false);
			//$this->db->where_in('if(`offer_expairdate`>="$curr_date",`offer_amount`,`discount` )', '"'.$d.'"', false);

		}
		if($ram!='NULL'){
			$this->db->where_in('ram','"'.$ram.'"',false);
		}if($colour!='NULL'){
			$this->db->where_in('colour','"'.$colour.'"',false);
		}if($os!='NULL'){
			$this->db->where_in('os','"'.$os.'"',false);
		}if($sim_type!='NULL'){
			$this->db->where_in('sim_type','"'.$sim_type.'"',false);
		}if($camera!='NULL'){
			$this->db->where_in('camera','"'.$camera.'"',false);
		}if($internal_memeory!='NULL'){
			$this->db->where_in('internal_memeory','"'.$internal_memeory.'"',false);
		}if($screen_size!='NULL'){
			$this->db->where_in('screen_size','"'.$screen_size.'"',false);
		}if($Processor!='NULL'){
			$this->db->where_in('Processor','"'.$Processor.'"',false);
		}
		
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		
		return $this->db->get()->result_array();
		
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
			///echo '<pre>';print_r($list);
			
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
	$this->db->order_by('fliter_search.id desc');
	$query=$this->db->get()->result_array();
	//echo '<pre>';print_r($query);exit;
	
		foreach ($query as $listing){
			if($listing['brand']!=''){
			$brand[] = $listing['brand'];	
			}
			if($listing['offers']!=''){
			$offers[] =$listing['offers'];
			
			}if($listing['discount']!=''){
			$discount[] =$listing['discount'];
			
			}if($listing['color']!=''){
			$color[] =$listing['color'];
			
			}
			$minamount = $listing['mini_amount'];
			$maxamount = $listing['max_amount'];
			$catid = $listing['category_id'];
			
			
			
		}
		if(isset($brand) && count($brand)>0 ){
			$brands=implode ('","', $brand );
		}else{
		$brands='NULL';

		}
		if(isset($offers) && count($offers)>0){
			$offerss=implode('","', $offers);
		}else{
		$offerss='NULL';
		}
		if(isset($discount) && count($discount)>0 ){
			$discount=implode('","', $discount);
		}else{
		$discount='NULL';
		}
		if(isset($color) && count($color)>0 ){
			$color=implode('","', $color);
		}else{
		$color='NULL';
		}		
		
		//exit;
		//echo '<pre>';print_r($listsorting);exit;
		
		$return['filterslist'][] = $this->get_filers_products_list_alllist($brands,$discount,$offerss,$color,$minamount,$maxamount,$catid);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($return['filterslist']);exit;
		if(!empty($return['filterslist']))
		{
		return $return['filterslist'];
		}
		
		
		
		
		
	}
	public function get_filers_products_list_alllist($b,$d,$f,$c,$min,$max,$cid){
		//echo $b;exit;
		$min_amt=(($min)-1);
		$maxmum=(int)$max;
		$lessamount=($maxmum)-($min_amt);
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('*')->from('products');
		if($lessamount<='500' || $lessamount<='100'){
		$this->db->where('item_cost <=', '"'.$maxmum.'"',false);
		}else{
			$this->db->where('item_cost <=',$maxmum);
		}
		//$this->db->where('if(`offer_expairdate`>="$curr_date",`item_cost`,`special_price` )<=', '"'.$maxmum.'"', false);
		$this->db->where('item_cost >=', '"'.(int)$min_amt.'"',false);
		//$this->db->where('if(`offer_expairdate`>="$curr_date",`item_cost`,`special_price` )>=', '"'.(int)$min_amt.'"', false);
		if($b!='NULL'){
			$this->db->where_in('brand','"'.$b.'"',false);
		
		}if($f!='NULL'){
			$this->db->where_in('if(`offer_expairdate`>="$curr_date",`offer_percentage`,`offers` )', '"'.$f.'"', false);
			//$this->db->where_in('offer_percentage','"'.$f.'"',false);
		}if($d!='NULL'){
			//$this->db->where_in('discount','"'.$d.'"',false);
			$this->db->where_in('if(`offer_expairdate`>="$curr_date",`offer_amount`,`discount` )', '"'.$d.'"', false);

		}if($c!='NULL'){
			$this->db->where_in('colour','"'.$c.'"',false);
		}
		
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_amount($min,$max,$cid){
		$min_amt=(($min)-1);
		$this->db->select('*')->from('products');
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_discount($discount,$min,$max,$cid){
		$min_amt=(($min)-1);
		$this->db->select('*')->from('products');
		$this->db->where('discount',$discount);
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('category_id',$cid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_brand($brand,$min,$max,$cid){
		$min_amt=(($min)-1);
		$this->db->select('*')->from('products');
		$this->db->where('brand',$brand);
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('category_id',$cid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_offer($offers,$min,$max,$cid){
		$min_amt=(($min)-1);
		$this->db->select('*')->from('products');
		$this->db->where('offer_percentage',$offers);
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('category_id',$cid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_two($offers,$brand,$min,$max,$cid){
		$min_amt=(($min)-1);
		$this->db->select('*')->from('products');
		$this->db->where('offer_percentage',$offers);
		$this->db->where('brand',$brand);
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('category_id',$cid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
		
	}
	public function get_filers_products_list_three($offers,$brand,$discount,$min,$max,$cid){
		$min_amt=(($min)+1);
		$this->db->select('products.*',false)->from('products');
		$this->db->where('offer_percentage',$offers);
		$this->db->where('brand',$brand);
		$this->db->where('discount',$discount);
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		$this->db->where('category_id',$cid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
		
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
	
		/*$this->db->select('products.offers')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('offers!=','');
		$this->db->group_by('offers');
		return $this->db->get()->result_array();*/
		$sql = "SELECT offer_percentage, offers, offer_expairdate  FROM `products` WHERE `category_id` = '".$catid."' AND `subcategory_id` = '".$subcat."' AND `item_status` = 1 AND `offers` != '' OR offer_percentage!=''";
		return $this->db->query($sql)->result_array();
		
	}
	
	public function get_all_discount_list_sub($catid,$subcat)
	{
	
		/*$this->db->select('products.discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();*/
		$sql = "SELECT IF(products.offer_expairdate>= DATE('Y-m-d h:i:s A'), offer_amount, discount) AS discount FROM `products` WHERE `category_id` = '".$catid."'  AND `subcategory_id` = '".$subcat."' AND `item_status` = 1 AND `discount` != '' GROUP BY `discount`";
		return $this->db->query($sql)->result_array();
		
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
		$this->db->select('products.item_cost,products.special_price,products.offer_expairdate')->from('products');
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
		$this->db->select('products.colour as color_name')->from('products');
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.colour!=','');
		$this->db->group_by('products.colour');
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
		$this->db->select('products.item_cost,products.special_price,products.offer_expairdate')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->where('special_price!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
	public function get_all_discount_list($catid)
	{
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d h:i:s A');
		/*$this->db->select('IF(products.offer_expairdate>= date(Y-m-d h:i:s A),offer_amount,discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();*/
		$sql = "SELECT IF(products.offer_expairdate>= DATE('Y-m-d h:i:s A'), offer_amount, discount) AS discount FROM `products` WHERE `category_id` = '".$catid."' AND `item_status` = 1 AND `discount` != '' GROUP BY `discount`";
		return $this->db->query($sql)->result_array();
		
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
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');

		/*$this->db->select('products.offer_percentage,products.offers')->from('products');
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.offer_percentage!=','');
		if("products.offer_expairdate >= '".$curr_date."'"){
			$this->db->group_by('products.offer_percentage');
		}else{
		$this->db->group_by('products.offers');
		}
		return $this->db->get()->result_array();*/
		$sql = "SELECT offer_percentage, offers, offer_expairdate  FROM `products` WHERE `category_id` = '".$catid."' AND `item_status` = 1 AND  offers!='' OR offer_percentage!=''";
		return $this->db->query($sql)->result_array();
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
	public function get_all_subcategory_products_list_grocery($subcatid)
	{
	
	$this->db->select('products.*,category.category_id')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('subcategories.subcategory_id', $subcatid);
    $this->db->where('products.item_status', 1);
    $this->db->group_by('products.item_name');
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
	public function get_products_desc_list($pid){
		
		$this->db->select('*')->from('descrotion_list');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_sameunit_products_list($pname){
		
		$this->db->select('products.item_id,products.unit,products.subcategory_id')->from('products');
		$this->db->where('item_name',$pname);
		$this->db->where('item_status',1);
		$this->db->group_by('unit');
		return $this->db->get()->result_array();
	}
	public function get_untiwise_product_details($pid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_id',$pid);
		$this->db->where('item_status',1);
		$this->db->group_by('unit');
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
 public function get_all_previous_data_categor_filter($ip)
 {
  	$this->db->select('*')->from('fliter_search');
	$this->db->where('Ip_address',$ip);
	return $this->db->get()->result_array();
 } 
 public function delete_all_previous_data_categor_filter($id,$ip)
 {
  	$sql1="DELETE FROM fliter_search WHERE Ip_address = '".$ip."' AND  id = '".$id."'";
	return $this->db->query($sql1);
 }
 public function get_all_subitem_list($catid,$subcatid)
 {
  	//$this->db->select('*')->from('sub_items');
  	$this->db->select('sub_items.*')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left'); //
	$this->db->where('products.category_id',$catid);
	$this->db->where('products.subcategory_id',$subcatid);
	$this->db->group_by('products.subitemid');
	return $this->db->get()->result_array();
 }
 public function get_all_subitem_lists($catid)
 {
  	$this->db->select('sub_items.*')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left'); //
	$this->db->where('sub_items.category_id',$catid);
	$this->db->group_by('products.subitemid');
	return $this->db->get()->result_array();
 }

 public function get_category_ids($subcatid)
 {
  	$this->db->select('*')->from('subcategories');
	$this->db->where('subcategory_id',$subcatid);
	return $this->db->get()->row_array();
 } 
 public function get_subitem_list($subitemid)
	{
	
	$this->db->select('products.*,category.category_id')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('products.subitemid', $subitemid);
    $this->db->where('products.item_status', 1);
    $this->db->group_by('products.item_name');
	return $this->db->get()->result_array();
		
	}
	public function get_ll_products()
	{
		$this->db->select('products.item_id,products.item_cost,products.special_price,products.offer_percentage,products.discount,products.offers,products.offer_expairdate')->from('products');
		return $this->db->get()->result_array();	
	}
	public function get_ll_products_update($id,$price,$per)
	{
		$sql1="UPDATE products SET offers ='".$per."', discount ='".$price."' WHERE item_id ='".$id."'";
		return $this->db->query($sql1);
	}
	
}
?>