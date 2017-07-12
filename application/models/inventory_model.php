<?php
class Inventory_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_all_seller_details(){
		$this->db->select('*')->from('sellers');		
		$this->db->where('status', 1);
		return $this->db->get()->result_array();
	}
	


	public function get_seller_categories()
	{
		$this->db->select('*')->from('category');
		return $this->db->get()->result_array();
		// $sqll = $this->db->query("SELECT s.seller_name AS `seller`, 
		// GROUP_CONCAT(sc.category_name ORDER BY sc.category_name SEPARATOR ', ') AS categoryname,count(sc.seller_id) as seller_count
		// FROM sellers s, seller_categories sc 
		// WHERE sc.seller_id = s.seller_id  
		// GROUP BY s.seller_id");
		// return $sqll->result_array();
		// $this->db->select('sellers.seller_name,GROUP_CONCAT(DISTINCT seller_categories.category_name ORDER BY seller_categories.category_name) as categoryname')->from('seller_categories');
		// $this->db->join('sellers', 'sellers.seller_id = seller_categories.seller_id', 'LEFT');
		// //$this->db->where('sellers.seller_id = seller_categories.seller_id');
  //       return $this->db->get()->result();
	}

	public function get_seller_names($cid){
	$this->db->select('sellers.*,seller_categories.*')->from('sellers');
	$this->db->join('seller_categories', 'seller_categories.seller_id = sellers.seller_id', 'left');
	$this->db->where('seller_categories.seller_category_id', $cid);
    return $this->db->get()->result_array();

	}

	

	public function get_seller_databaseid()
	{
		 // 	$this->db->select('sellers.*,seller_store_details.*,GROUP_CONCAT(seller_categories.category_name ORDER BY seller_categories.category_name SEPARATOR ', ') AS categoryname ')->from('seller_categories');
		 // 	$this->db->join('sellers', 'sellers.seller_id =seller_categories.seller_id' , 'left');
		 // 	$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left');
		 // return $this->db->get()->result_array();
		 $sqll = $this->db->query("SELECT sellers.*,seller_store_details.*,GROUP_CONCAT(seller_categories.category_name ORDER BY seller_categories.category_name SEPARATOR ', ') AS categoryname 
		 FROM seller_categories LEFT JOIN sellers ON seller_categories.seller_id =sellers.seller_id LEFT JOIN seller_store_details ON 
		 	seller_store_details.seller_id = sellers.seller_id GROUP BY sellers.seller_id");
		 return $sqll->result_array();
		
	}

	public function get_seller_payments()
	{
		$this->db->select('*')->from('orders');
		return $this->db->get()->result();
	}
	public function get_inventory_management()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Inventory management');
		return $this->db->get()->result();
	}
	public function get_catalog_management()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Catalog Management');
		return $this->db->get()->result();
	}
	public function get_both()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Both');
		return $this->db->get()->result();
	}

	public function get_seller_banners()
	{
		$this->db->select('home_banner.*,sellers.seller_name')->from('home_banner');
		$this->db->join('sellers','sellers.seller_id = home_banner.seller_id', 'left');	
		return $this->db->get()->result_array();
	}
	function banner_status_update($id,$status)
	{
		$sql1="UPDATE home_banner SET status ='".$status."'WHERE seller_id = '".$id."'";
		return $this->db->query($sql1);
	}
}
?>