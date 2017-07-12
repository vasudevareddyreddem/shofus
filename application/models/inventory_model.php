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
	
}
?>