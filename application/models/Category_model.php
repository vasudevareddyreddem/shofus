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
		$this->db->where('name',$name);
		$this->db->group_by('colour');
		$this->db->where('colour!=','');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_size($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('name', $name);
		$this->db->group_by(trim('internal_memeory'));
		$this->db->where('internal_memeory!=','');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_ram($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.ram,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->like('name', $name);
		$this->db->group_by(trim('ram'));
		$this->db->where('ram!=','');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_unit($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.unit,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('name',$name);
		$this->db->where('item_status',1);
		$this->db->group_by('unit');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_simular_products($subcat,$name,$item_id)
	{
		$this->db->select('*')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('name', $name);
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
		$this->db->select('products.colour as color_name')->from('products');
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.subcategory_id',$subcatid);
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
			$this->db->where_in('if(`offer_expairdate`>="DATE(Y-m-d h:i:s A)",`offer_percentage`,`offers` )', '"'.$f.'"', false);
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
		$this->db->where('item_cost >=', '"'.(int)$min_amt.'"',false);
		if($b!='NULL'){
			$this->db->where_in('brand','"'.$b.'"',false);
		}if($f!='NULL'){
			$this->db->where_in('if(`offer_expairdate`>="DATE(Y-m-d h:i:s A)",`offer_percentage`,`offers` )', '"'.$f.'"', false);
		}if($d!='NULL'){
			$this->db->where_in('if(`offer_expairdate`>="DATE(Y-m-d h:i:s A)",`offer_amount`,`discount` )', '"'.$d.'"', false);

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
	
	$this->db->select('products.item_id,products.subitemid,products.category_id,products.item_name,products.item_status,products.item_cost,products.unit,products.special_price,products.item_quantity,products.item_image,products.offer_percentage,products.offer_amount,products.offer_expairdate,products.ingredients,products.key_feature,products.disclaimer,products.unit')->from('products');
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
	public function get_subitemwise_unit_products_list($subitem_id,$unit){
		
		$this->db->select('products.item_id,products.unit,products.subcategory_id,products.subitemid,products.itemwise_id')->from('products');
		$this->db->where('unit',$unit);
		$this->db->where('subitemid',$subitem_id);
		$this->db->where('item_status',1);
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
 public function get_subitem_list($subitem_id,$item_id)
	{
	
	$this->db->select('products.item_id,products.subcategory_id,products.subitemid,products.itemwise_id,products.item_name,products.ingredients,products.key_feature,products.disclaimer,products.item_cost,products.special_price,products.offer_percentage,products.discount,products.offers,products.offer_expairdate,products.unit,products.item_status,products.item_quantity,products.item_image,category.category_id')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('products.itemwise_id', $item_id);
    $this->db->where('products.subitemid', $subitem_id);
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
	public function mobileviewsubcategorywiseproducts_list($subcat_id){
		$this->db->select('products.*,category.category_id')->from('products');
		$this->db->join('category', 'category.category_id =products.category_id', 'left');	
		$this->db->where('products.subcategory_id', $subcat_id);
		$this->db->where('products.item_status', 1);
		return $this->db->get()->result_array();
	}
	public function get_category_details($subcat_id){
		$this->db->select('*')->from('subcategories');
		$this->db->where('subcategories.subcategory_id', $subcat_id);
		return $this->db->get()->row_array();
	}
	public function get_mobileview_filers_products_list_alllist($b,$f,$c,$min,$max,$cid,$subcat){
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
		}if($c!='NULL'){
			$this->db->where_in('colour','"'.$c.'"',false);
		}
		
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		$this->db->where('subcategory_id',$subcat);
		
		return $this->db->get()->result_array();
		
	}
	public function save_mobileviewfilter_data($data){
		$this->db->insert('fliter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_Mobile_search_all_subcategory_products()
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
			$subcatid = $listing['subcategory_id'];
			
			
			
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
		
		$return['filterslist'][] = $this->get_mobile_filers_products_list_alllist($brands,$discount,$offerss,$color,$minamount,$maxamount,$catid,$subcatid);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($return['filterslist']);exit;
		if(!empty($return['filterslist']))
		{
		return $return['filterslist'];
		}
		
		
		
		
		
	}
	public function get_mobile_filers_products_list_alllist($b,$d,$f,$c,$min,$max,$cid,$subcatid){
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
		$this->db->where('subcategory_id',$subcatid);
		
		return $this->db->get()->result_array();
		
	}
	/* subitemwise*/
	public function get_all_itemproducts_list($subcatid,$subitem_id){
		$this->db->select('products.item_id,products.subitemid,products.category_id,products.item_name,products.item_status,products.item_cost,products.unit,products.special_price,products.item_quantity,products.item_image,products.offer_percentage,products.offer_amount,products.offer_expairdate,sub_items.subitem_name,products.ingredients,products.key_feature,products.disclaimer,products.unit')->from('products');
		$this->db->join('sub_items', 'sub_items.subitem_id =products.subitemid', 'left');	
		$this->db->where('item_status',1);
		$this->db->where('subitemid',$subitem_id);
		$this->db->where('products.subcategory_id',$subcatid);
		return $this->db->get()->result_array();
	}
	public function get_subitem_all_brand_list($subcatid,$subitem_id){
		
		$this->db->select('products.brand')->from('products');
		$this->db->where('subitemid',$subitem_id);
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('brand!=','');
		$this->db->group_by('brand');
		return $this->db->get()->result_array();
		
	}
	public function get_subitem_all_price_list($subcatid,$subitem_id){
		$this->db->select('products.item_cost,products.special_price,products.offer_expairdate')->from('products');
		$this->db->where('subitemid',$subitem_id);
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->where('special_price!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
	public function get_subitem_all_offer_list($subcatid,$subitem_id){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');

		$sql = "SELECT offer_percentage, offers, offer_expairdate  FROM `products` WHERE `subitemid` = '".$subitem_id."' AND `subcategory_id` = '".$subcatid."' AND `item_status` = 1  AND  offers!='' OR offer_percentage!=''";
		return $this->db->query($sql)->result_array();
	}
	public function get_subitem_all_discount_list($subcatid,$subitem_id)
	{
		$sql = "SELECT IF(products.offer_expairdate>= DATE('Y-m-d h:i:s A'), offer_amount, discount) AS discount FROM `products` WHERE `subitemid` = '".$subitem_id."' AND  `subcategory_id` = '".$subcatid."' AND `item_status` = 1 AND `discount` != '' GROUP BY `discount`";
		return $this->db->query($sql)->result_array();
	}
	public function get_subitem_all_color_list($subcatid,$subitem_id){
		$this->db->select('products.colour')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.colour!=','');
		$this->db->group_by('products.colour');
		return $this->db->get()->result_array();
	}
	public function get_Processor_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.Processor')->from('products');
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('item_status',1);
		$this->db->where('Processor!=','');
		$this->db->group_by('Processor');
		return $this->db->get()->result_array();
	}
	public function get_screen_size_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.screen_size')->from('products');
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('item_status',1);
		$this->db->where('screen_size!=','');
		$this->db->group_by('screen_size');
		return $this->db->get()->result_array();
	}
	public function get_ram_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.ram')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('ram!=','');
		$this->db->group_by('ram');
		return $this->db->get()->result_array();
		
	}
	public function get_os_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.os')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('os!=','');
		$this->db->group_by('os');
		return $this->db->get()->result_array();
		
	}
	public function get_sim_type_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.sim_type')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('sim_type!=','');
		$this->db->group_by('sim_type');
		return $this->db->get()->result_array();
		
	}
	public function get_camera_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.camera')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('camera!=','');
		$this->db->group_by('camera');
		return $this->db->get()->result_array();
	}
	public function get_internal_memeory_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.internal_memeory')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('internal_memeory!=','');
		$this->db->group_by('internal_memeory');
		return $this->db->get()->result_array();
	}
	public function get_printer_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.printer_type')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('printer_type!=','');
		$this->db->group_by('printer_type');
		return $this->db->get()->result_array();
	}
	public function get_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.type')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('type!=','');
		$this->db->group_by('type');
		return $this->db->get()->result_array();
	}
	public function get_maxcopies_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.copies_from')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('copies_from!=','');
		$this->db->group_by('copies_from');
		return $this->db->get()->result_array();
	}
	public function get_paper_size_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.paper_size')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('paper_size!=','');
		$this->db->group_by('paper_size');
		return $this->db->get()->result_array();
	}
	public function get_headphone_jack_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.headphone_jack')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('headphone_jack!=','');
		$this->db->group_by('headphone_jack');
		return $this->db->get()->result_array();
	}
	public function get_noise_reduction_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.noise_reduction')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('noise_reduction!=','');
		$this->db->group_by('noise_reduction');
		return $this->db->get()->result_array();
	}
	public function get_usbr_port_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.usb_port')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('usb_port!=','');
		$this->db->group_by('usb_port');
		return $this->db->get()->result_array();
	}
	public function get_compatible_for_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.compatible_for')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('compatible_for!=','');
		$this->db->group_by('compatible_for');
		return $this->db->get()->result_array();
	}public function get_scanner_type_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.scanner_type')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('scanner_type!=','');
		$this->db->group_by('scanner_type');
		return $this->db->get()->result_array();
	}public function get_resolution_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.resolution')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('resolution!=','');
		$this->db->group_by('resolution');
		return $this->db->get()->result_array();
	}public function get_f_stop_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.f_stop')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('f_stop!=','');
		$this->db->group_by('f_stop');
		return $this->db->get()->result_array();
	}public function get_minimum_focusing_distance_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.minimum_focusing_distance')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('minimum_focusing_distance!=','');
		$this->db->group_by('minimum_focusing_distance');
		return $this->db->get()->result_array();
	}public function get_aperture_withmaxfocal_length_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.aperture_withmaxfocal_length')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('aperture_withmaxfocal_length!=','');
		$this->db->group_by('aperture_withmaxfocal_length');
		return $this->db->get()->result_array();
	}public function get_picture_angle_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.picture_angle')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('picture_angle!=','');
		$this->db->group_by('picture_angle');
		return $this->db->get()->result_array();
	}public function get_size_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.size')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('size!=','');
		$this->db->group_by('size');
		return $this->db->get()->result_array();
	}public function get_weight_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.weight')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('weight!=','');
		$this->db->group_by('weight');
		return $this->db->get()->result_array();
	}public function get_occasion_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.occasion')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('occasion!=','');
		$this->db->group_by('occasion');
		return $this->db->get()->result_array();
	}public function get_material_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.material')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('material!=','');
		$this->db->group_by('material');
		return $this->db->get()->result_array();
	}public function get_collar_type_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.collar_type')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('collar_type!=','');
		$this->db->group_by('collar_type');
		return $this->db->get()->result_array();
	}public function get_gender_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.gender')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('gender!=','');
		$this->db->group_by('gender');
		return $this->db->get()->result_array();
	}public function get_sleeve_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.sleeve')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('sleeve!=','');
		$this->db->group_by('sleeve');
		return $this->db->get()->result_array();
	}public function get_look_list_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.look')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('look!=','');
		$this->db->group_by('look');
		return $this->db->get()->result_array();
	}public function get_style_code_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.style_code')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('style_code!=','');
		$this->db->group_by('style_code');
		return $this->db->get()->result_array();
	}public function get_inner_material_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.inner_material')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('inner_material!=','');
		$this->db->group_by('inner_material');
		return $this->db->get()->result_array();
	}public function get_waterproof_itemwise($subcatid,$subitem_id)
	{
		$this->db->select('products.waterproof')->from('products');
		$this->db->where('products.subitemid',$subitem_id);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('item_status',1);
		$this->db->where('waterproof!=','');
		$this->db->group_by('waterproof');
		return $this->db->get()->result_array();
	}
	/* SEARCH PURPOSE*/
	public function get_subitem_all_previous_search_fields()
	{
		$this->db->select('*')->from('subitem_wise_filter_search');
		$this->db->where('Ip_address',$this->input->ip_address());
		return $this->db->get()->result_array();
	}
	public function subitem_wise_update_deails($id,$data){
		$this->db->where('id', $id);
		return $this->db->update('subitem_wise_filter_search', $data);
	}
	
	public function save_subitemsearchdata($data){
		
		$this->db->insert('subitem_wise_filter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_subitemwise_search_result_data($ip)
	{
	$this->db->select('subitem_wise_filter_search.*')->from('subitem_wise_filter_search');
	//$this->db->group_by('fliter_search.cusine');
	$this->db->group_by('subitem_wise_filter_search.offer');
	$this->db->group_by('subitem_wise_filter_search.brand');
	$this->db->group_by('subitem_wise_filter_search.discount');
	$this->db->group_by('subitem_wise_filter_search.colour');
	$this->db->group_by('subitem_wise_filter_search.size');
	$this->db->group_by('subitem_wise_filter_search.ram');
	$this->db->group_by('subitem_wise_filter_search.os');
	$this->db->group_by('subitem_wise_filter_search.sim_type');
	$this->db->group_by('subitem_wise_filter_search.camera');
	$this->db->group_by('subitem_wise_filter_search.internal_memeory');
	$this->db->group_by('subitem_wise_filter_search.screen_size');
	$this->db->group_by('subitem_wise_filter_search.Processor');
	$this->db->group_by('subitem_wise_filter_search.printer_type');
	$this->db->group_by('subitem_wise_filter_search.type');
	$this->db->group_by('subitem_wise_filter_search.max_copies');
	$this->db->group_by('subitem_wise_filter_search.paper_size');
	$this->db->group_by('subitem_wise_filter_search.headphone_jack');
	$this->db->group_by('subitem_wise_filter_search.noise_reduction');
	$this->db->group_by('subitem_wise_filter_search.usb_port');
	$this->db->group_by('subitem_wise_filter_search.compatible_for');
	$this->db->group_by('subitem_wise_filter_search.scanner_type');
	$this->db->group_by('subitem_wise_filter_search.resolution');
	$this->db->group_by('subitem_wise_filter_search.f_stop');
	$this->db->group_by('subitem_wise_filter_search.minimum_focusing_distance');
	$this->db->group_by('subitem_wise_filter_search.aperture_withmaxfocal_length');
	$this->db->group_by('subitem_wise_filter_search.picture_angle');
	$this->db->group_by('subitem_wise_filter_search.weight');
	$this->db->group_by('subitem_wise_filter_search.occasion');
	$this->db->group_by('subitem_wise_filter_search.material');
	$this->db->group_by('subitem_wise_filter_search.collar_type');
	$this->db->group_by('subitem_wise_filter_search.gender');
	$this->db->group_by('subitem_wise_filter_search.sleeve');
	$this->db->group_by('subitem_wise_filter_search.look');
	$this->db->group_by('subitem_wise_filter_search.style_code');
	$this->db->group_by('subitem_wise_filter_search.inner_material');
	$this->db->group_by('subitem_wise_filter_search.waterproof');
	//$this->db->order_by('subitem_wise_filter_search.id desc');
	$this->db->where('ip_address',$ip);
	$query=$this->db->get()->result_array();
	//echo '<pre>';print_r($query);exit;
	
		foreach ($query as $listing){
			
			if($listing['offer']!=''){ $offer[] =$listing['offer']; }
			if($listing['brand']!=''){ $brand[] = $listing['brand']; }
			if($listing['discount']!=''){ $discount[] =$listing['discount']; }
			if($listing['colour']!=''){ $colour[] =$listing['colour']; }
			if($listing['size']!=''){ $size[] =$listing['size']; }
			if($listing['ram']!=''){ $ram[] =$listing['ram']; }
			if($listing['os']!=''){ $os[] =$listing['os']; }
			if($listing['sim_type']!=''){ $sim_type[] =$listing['sim_type']; }
			if($listing['camera']!=''){ $camera[] =$listing['camera']; }
			if($listing['internal_memeory']!=''){ $internal_memeory[] =$listing['internal_memeory']; }
			if($listing['screen_size']!=''){ $screen_size[] =$listing['screen_size']; }
			if($listing['Processor']!=''){ $Processor[] =$listing['Processor']; }
			if($listing['printer_type']!=''){ $printer_type[] =$listing['printer_type']; }
			if($listing['type']!=''){ $type[] =$listing['type']; }
			if($listing['max_copies']!=''){ $max_copies[] =$listing['max_copies']; }
			if($listing['paper_size']!=''){ $paper_size[] =$listing['paper_size']; }
			if($listing['headphone_jack']!=''){ $headphone_jack[] =$listing['headphone_jack']; }
			if($listing['noise_reduction']!=''){ $noise_reduction[] =$listing['noise_reduction']; }
			if($listing['usb_port']!=''){ $usb_port[] =$listing['usb_port']; }
			if($listing['compatible_for']!=''){ $compatible_for[] =$listing['compatible_for']; }
			if($listing['scanner_type']!=''){ $scanner_type[] =$listing['scanner_type']; }
			if($listing['resolution']!=''){ $resolution[] =$listing['resolution']; }
			if($listing['f_stop']!=''){ $f_stop[] =$listing['f_stop']; }
			if($listing['minimum_focusing_distance']!=''){ $minimum_focusing_distance[] =$listing['minimum_focusing_distance']; }
			if($listing['aperture_withmaxfocal_length']!=''){ $aperture_withmaxfocal_length[] =$listing['aperture_withmaxfocal_length']; }
			if($listing['picture_angle']!=''){ $picture_angle[] =$listing['picture_angle']; }
			if($listing['weight']!=''){ $weight[] =$listing['weight']; }
			if($listing['occasion']!=''){ $occasion[] =$listing['occasion']; }
			if($listing['material']!=''){ $material[] =$listing['material']; }
			if($listing['collar_type']!=''){ $collar_type[] =$listing['collar_type']; }
			if($listing['gender']!=''){ $gender[] =$listing['gender']; }
			if($listing['sleeve']!=''){ $sleeve[] =$listing['sleeve']; }
			if($listing['look']!=''){ $look[] =$listing['look']; }
			if($listing['style_code']!=''){ $style_code[] =$listing['style_code']; }
			if($listing['inner_material']!=''){ $inner_material[] =$listing['inner_material']; }
			if($listing['waterproof']!=''){ $waterproof[] =$listing['waterproof']; }
			$minamount = $listing['minimum_price'];
			$maxamount = $listing['maximum_price'];
			$subcatid = $listing['subcategory_id'];
			$subitemid = $listing['subitemid'];
		}
		if(isset($brand) && count($brand)>0 ){
			$brand=implode ('","', $brand );
			}else{ $brand='NULL'; }
		if(isset($offer) && count($offer)>0){
			$offer=implode('","', $offer);
		}else{ $offer='NULL'; }
		if(isset($discount) && count($discount)>0 ){
			$discount=implode('","', $discount);
		}else{ $discount='NULL'; }
		if(isset($colour) && count($colour)>0 ){
			$colour=implode('","', $colour);
		}else{ $colour='NULL'; }		
		if(isset($size) && count($size)>0 ){
			$size=implode('","', $size);
		}else{ $size='NULL'; }		
		if(isset($ram) && count($ram)>0 ){
			$ram=implode('","', $ram);
		}else{ $ram='NULL'; }		
		if(isset($os) && count($os)>0 ){
			$os=implode('","', $os);
		}else{ $os='NULL'; }		
		if(isset($sim_type) && count($sim_type)>0 ){
			$sim_type=implode('","', $sim_type);
		}else{ $sim_type='NULL'; }		
		if(isset($camera) && count($camera)>0 ){
			$camera=implode('","', $camera);
		}else{ $camera='NULL'; }		
		if(isset($internal_memeory) && count($internal_memeory)>0 ){
			$internal_memeory=implode('","', $internal_memeory);
		}else{ $internal_memeory='NULL'; }		
		if(isset($screen_size) && count($screen_size)>0 ){
			$screen_size=implode('","', $screen_size);
		}else{ $screen_size='NULL'; }		
		if(isset($Processor) && count($Processor)>0 ){
			$Processor=implode('","', $Processor);
		}else{ $Processor='NULL'; }		
		if(isset($printer_type) && count($printer_type)>0 ){
			$printer_type=implode('","', $printer_type);
		}else{ $printer_type='NULL'; }		
		if(isset($type) && count($type)>0 ){
			$type=implode('","', $type);
		}else{ $type='NULL'; }		
		if(isset($max_copies) && count($max_copies)>0 ){
			$max_copies=implode('","', $max_copies);
		}else{ $max_copies='NULL'; }		
		if(isset($paper_size) && count($paper_size)>0 ){
			$paper_size=implode('","', $paper_size);
		}else{ $paper_size='NULL'; }		
		if(isset($headphone_jack) && count($headphone_jack)>0 ){
			$headphone_jack=implode('","', $headphone_jack);
		}else{ $headphone_jack='NULL'; }		
		if(isset($noise_reduction) && count($noise_reduction)>0 ){
			$noise_reduction=implode('","', $noise_reduction);
		}else{ $noise_reduction='NULL'; }		
		if(isset($usb_port) && count($usb_port)>0 ){
			$usb_port=implode('","', $usb_port);
		}else{ $usb_port='NULL'; }		
		if(isset($compatible_for) && count($compatible_for)>0 ){
			$compatible_for=implode('","', $compatible_for);
		}else{ $compatible_for='NULL'; }		
		if(isset($scanner_type) && count($scanner_type)>0 ){
			$scanner_type=implode('","', $scanner_type);
		}else{ $scanner_type='NULL'; }		
		if(isset($resolution) && count($resolution)>0 ){
			$resolution=implode('","', $resolution);
		}else{ $resolution='NULL'; }		
		if(isset($f_stop) && count($f_stop)>0 ){
			$f_stop=implode('","', $f_stop);
		}else{ $f_stop='NULL'; }		
		if(isset($minimum_focusing_distance) && count($minimum_focusing_distance)>0 ){
			$minimum_focusing_distance=implode('","', $minimum_focusing_distance);
		}else{ $minimum_focusing_distance='NULL'; }		
		if(isset($aperture_withmaxfocal_length) && count($aperture_withmaxfocal_length)>0 ){
			$aperture_withmaxfocal_length=implode('","', $aperture_withmaxfocal_length);
		}else{ $aperture_withmaxfocal_length='NULL'; }		
		if(isset($picture_angle) && count($picture_angle)>0 ){
			$picture_angle=implode('","', $picture_angle);
		}else{ $picture_angle='NULL'; }		
		if(isset($weight) && count($weight)>0 ){
			$weight=implode('","', $weight);
		}else{ $weight='NULL'; }		
		if(isset($occasion) && count($occasion)>0 ){
			$occasion=implode('","', $occasion);
		}else{ $occasion='NULL'; }		
		if(isset($material) && count($material)>0 ){
			$material=implode('","', $material);
		}else{ $material='NULL'; }		
		if(isset($collar_type) && count($collar_type)>0 ){
			$collar_type=implode('","', $collar_type);
		}else{ $collar_type='NULL'; }		
		if(isset($gender) && count($gender)>0 ){
			$gender=implode('","', $gender);
		}else{ $gender='NULL'; }		
		if(isset($sleeve) && count($sleeve)>0 ){
			$sleeve=implode('","', $sleeve);
		}else{ $sleeve='NULL'; }		
		if(isset($look) && count($look)>0 ){
			$look=implode('","', $look);
		}else{ $look='NULL'; }		
		if(isset($style_code) && count($look)>0 ){
			$style_code=implode('","', $style_code);
		}else{ $style_code='NULL'; }		
		if(isset($inner_material) && count($inner_material)>0 ){
			$inner_material=implode('","', $inner_material);
		}else{ $inner_material='NULL'; }		
		if(isset($waterproof) && count($waterproof)>0 ){
			$waterproof=implode('","', $waterproof);
		}else{ $waterproof='NULL'; }		
		
		//exit;
		//echo '<pre>';print_r($listsorting);exit;
		
		$return['filterslist'] = $this->get_subitemwise_filters_search($subcatid,$subitemid,$minamount,$maxamount,$offer,$brand,$discount,$colour,$size,$ram,$os,$sim_type,$camera,$internal_memeory,$screen_size,$Processor,$printer_type,$type,$max_copies,$paper_size,$headphone_jack,$noise_reduction,$usb_port,$compatible_for,$scanner_type,$resolution,$f_stop,$minimum_focusing_distance,$aperture_withmaxfocal_length,$picture_angle,$weight,$occasion,$material,$collar_type,$gender,$sleeve,$look,$style_code,$inner_material,$waterproof);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($return['filterslist']);exit;
		if(!empty($return['filterslist']))
		{
		return $return['filterslist'];
		}
	}
	public function get_subitemwise_filters_search($subcatid,$subitemid,$minamount,$maxamount,$offer,$brand,$discount,$colour,$size,$ram,$os,$sim_type,$camera,$internal_memeory,$screen_size,$Processor,$printer_type,$type,$max_copies,$paper_size,$headphone_jack,$noise_reduction,$usb_port,$compatible_for,$scanner_type,$resolution,$f_stop,$minimum_focusing_distance,$aperture_withmaxfocal_length,$picture_angle,$weight,$occasion,$material,$collar_type,$gender,$sleeve,$look,$style_code,$inner_material,$waterproof){
		
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.item_id,products.category_id,products.subcategory_id,products.subitemid,products.itemwise_id,products.item_name,products.item_status,products.item_cost,products.special_price,products.item_quantity,products.offer_percentage,products.offer_amount,products.offer_expairdate,products.offer_type,products.discount,products.offers,products.item_image')->from('products');
		$this->db->where('item_cost <=', $maxamount);
		$this->db->where('item_cost >=', $minamount);
		if($offer!='NULL'){
			$this->db->where_in('if(`offer_expairdate`>="DATE(Y-m-d h:i:s A)",`offer_percentage`,`offers` )', '"'.$offer.'"', false);
		}if($brand!='NULL'){
			$this->db->where_in('brand','"'.$brand.'"',false);
		}if($colour!='NULL'){
			$this->db->where_in('colour','"'.$colour.'"',false);
		}if($size!='NULL'){
			$this->db->where_in('size','"'.$size.'"',false);
		}if($ram!='NULL'){
			$this->db->where_in('ram','"'.$ram.'"',false);
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
		}if($printer_type!='NULL'){
			$this->db->where_in('printer_type','"'.$printer_type.'"',false);
		}if($type!='NULL'){
			$this->db->where_in('type','"'.$type.'"',false);
		}if($max_copies!='NULL'){
			$this->db->where_in('max_copies','"'.$max_copies.'"',false);
		}if($paper_size!='NULL'){
			$this->db->where_in('paper_size','"'.$paper_size.'"',false);
		}if($headphone_jack!='NULL'){
			$this->db->where_in('headphone_jack','"'.$headphone_jack.'"',false);
		}if($noise_reduction!='NULL'){
			$this->db->where_in('noise_reduction','"'.$noise_reduction.'"',false);
		}if($usb_port!='NULL'){
			$this->db->where_in('usb_port','"'.$usb_port.'"',false);
		}if($compatible_for!='NULL'){
			$this->db->where_in('compatible_for','"'.$compatible_for.'"',false);
		}if($scanner_type!='NULL'){
			$this->db->where_in('scanner_type','"'.$scanner_type.'"',false);
		}if($resolution!='NULL'){
			$this->db->where_in('resolution','"'.$resolution.'"',false);
		}if($f_stop!='NULL'){
			$this->db->where_in('f_stop','"'.$f_stop.'"',false);
		}if($minimum_focusing_distance!='NULL'){
			$this->db->where_in('minimum_focusing_distance','"'.$minimum_focusing_distance.'"',false);
		}if($aperture_withmaxfocal_length!='NULL'){
			$this->db->where_in('aperture_withmaxfocal_length','"'.$aperture_withmaxfocal_length.'"',false);
		}if($picture_angle!='NULL'){
			$this->db->where_in('picture_angle','"'.$picture_angle.'"',false);
		}if($weight!='NULL'){
			$this->db->where_in('weight','"'.$weight.'"',false);
		}if($occasion!='NULL'){
			$this->db->where_in('occasion','"'.$occasion.'"',false);
		}if($material!='NULL'){
			$this->db->where_in('material','"'.$material.'"',false);
		}if($collar_type!='NULL'){
			$this->db->where_in('collar_type','"'.$collar_type.'"',false);
		}if($gender!='NULL'){
			$this->db->where_in('gender','"'.$gender.'"',false);
		}if($sleeve!='NULL'){
			$this->db->where_in('sleeve','"'.$sleeve.'"',false);
		}if($look!='NULL'){
			$this->db->where_in('look','"'.$look.'"',false);
		}if($style_code!='NULL'){
			$this->db->where_in('style_code','"'.$style_code.'"',false);
		}if($inner_material!='NULL'){
			$this->db->where_in('inner_material','"'.$inner_material.'"',false);
		}if($waterproof!='NULL'){
			$this->db->where_in('waterproof','"'.$waterproof.'"',false);
		}
		
		$this->db->where('item_status',1);
		$this->db->where('subcategory_id',$subcatid);
		$this->db->where('subitemid',$subitemid);
		
		return $this->db->get()->result_array();
	}
	public function get_subitemwise_data_category_id($ip)
	{
		$this->db->select('subitem_wise_filter_search.subcategory_id,subitem_wise_filter_search.subitemid')->from('subitem_wise_filter_search');
		$this->db->where('ip_address',$ip);
		return $this->db->get()->row_array();
	}
	public function get_all_previous_subitemwise_search_fields($ip)
	{
		$this->db->select('*')->from('subitem_wise_filter_search');
		$this->db->where('Ip_address',$ip);
		return $this->db->get()->result_array();
	}
	public function get_all_previous_subitem_search_fields($ip)
	{
		$this->db->select('*')->from('subitem_wise_filter_search');
		$this->db->where('Ip_address',$ip);
		return $this->db->get()->result_array();
	}
	public function delete_privous_subitemwise_searchdata($id)
	{
		$sql1="DELETE FROM subitem_wise_filter_search WHERE id = '".$id."'";
		return $this->db->query($sql1);
	}
	public function get_all_subwise_item_list($subcatid,$subitemid)
	{
	//$this->db->select('*')->from('sub_items');
	$this->db->select('items_list.*')->from('products');
	$this->db->join('items_list', 'items_list.id = products.itemwise_id', 'left'); //
	$this->db->where('products.subcategory_id',$subcatid);
	$this->db->where('products.subitemid',$subitemid);
	$this->db->where('products.itemwise_id !=','');
	$this->db->group_by('items_list.id');
	return $this->db->get()->result_array();
	}
	/*subcategory list*/
	public function get_category_subcategory_list($catid){
		$this->db->select('subcategories.*')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left'); //
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left'); //
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.subcategory_id !=','');
		$this->db->group_by('products.subcategory_id');
		$query=$this->db->get()->result_array();
		foreach ($query as $lists){
			$data=$this->get_subcategory_subitems_list($lists['subcategory_id']);
			$subcat[$lists['subcategory_id']]=$lists;
			$subcat[$lists['subcategory_id']]['subitems']=$data;
			
		}
		if(!empty($subcat))
		{
		return $subcat;
		}
		
	}
	public function get_subcategory_subitems_list($subcatid){
		$this->db->select('sub_items.*')->from('products');
		$this->db->join('sub_items', 'sub_items.subcategory_id = products.subcategory_id', 'left'); //
		$this->db->where('products.subcategory_id',$subcatid);
		$this->db->where('products.subitemid !=','');
		$this->db->group_by('sub_items.subitem_id');
		return $this->db->get()->result_array();
	}
}
?>