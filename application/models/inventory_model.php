<?php
class Inventory_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public function get_seller_details($sid)
	{
		$this->db->select('*')->from('sellers');
		$this->db->where('seller_id',$sid);
		return $this->db->get()->row_array();
	}
	public function update_seller_status($sellerid,$data){
		$this->db->where('seller_id', $sellerid);
		return $this->db->update('sellers', $data);
	}
	public function get_all_seller_details(){
		$this->db->select('*')->from('sellers');		
		return $this->db->get()->result_array();
	}
	public function get_all_seller_notifications(){
<<<<<<< HEAD
D
		$this->db->select('request_for_services.*,sellers.*')->from('request_for_services');
		$this->db->join('sellers', 'sellers.seller_id = request_for_services.seller_id', 'left');
		return $this->db->get()->result_array();
	}
	function notification_statuschanges($servoceid,$data){
	
		$sql1="UPDATE customers SET request_for_services ='".$data."'WHERE service_id = '".$servoceid."'";

=======
>>>>>>> 944516ea390301ffb8a65730c3fe6d705526dccd
		$this->db->select('request_for_services.*,sellers.seller_id,sellers.seller_name,sellers.seller_email,sellers.seller_mobile,')->from('request_for_services');
		$this->db->join('sellers', 'sellers.seller_id = request_for_services.seller_id', 'left');
		return $this->db->get()->result_array();
	}
	public function get_notification_details($service_id){
		$this->db->select('request_for_services.*,sellers.seller_id,sellers.seller_name,sellers.seller_email,sellers.seller_mobile,sellers.seller_rand_id')->from('request_for_services');
		$this->db->join('sellers', 'sellers.seller_id = request_for_services.seller_id', 'left');
		$this->db->where('request_for_services.service_id',$service_id);
		return $this->db->get()->row_array();
	}
	function notification_statuschanges($servoceid,$data){
	
		$sql1="UPDATE request_for_services SET status ='".$data."'WHERE service_id = '".$servoceid."'";
		return $this->db->query($sql1);
	}
	


	public function get_seller_categories()
	{
		$this->db->select('*')->from('category');
		return $this->db->get()->result_array();
	
	}

	public function get_seller_names($cid){
	$this->db->select('sellers.*,seller_categories.*')->from('sellers');
	$this->db->join('seller_categories', 'seller_categories.seller_id = sellers.seller_id', 'left');
	$this->db->where('seller_categories.seller_category_id', $cid);
    return $this->db->get()->result_array();

	}

	

	public function get_seller_databaseid()
	{
	$this->db->select('sellers.*,seller_store_details.*,GROUP_CONCAT(seller_categories.category_name ORDER BY seller_categories.category_name SEPARATOR ",") AS categoryname')->from('seller_categories');
	$this->db->join('sellers', 'sellers.seller_id = seller_categories.seller_id' , 'left');
		  	$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left');
	$this->db->group_by('sellers.seller_id');
	return $this->db->get()->result_array();
		
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
	function banner_status_update($id,$sid,$status)
	{
		$sql1="UPDATE home_banner SET status ='".$status."'WHERE id ='".$id."' AND seller_id = '".$sid."'";
		return $this->db->query($sql1);
	}
}
?>