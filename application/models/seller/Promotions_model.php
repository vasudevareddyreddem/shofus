<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promotions_model extends MY_Model 
{

		
	public function __construct()

	{
	parent::__construct();

	}

	
	function get_offer_product_price($cat_id){
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('item_id', $cat_id);
		return $this->db->get()->row_array();
	}
	function get_seller_products_data($sid){
		$this->db->select('products.*,category.category_name')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left'); //
		$this->db->where('seller_id', $sid);
		return $this->db->get()->result_array();
	}
	function get_seller_subcat_products_data($subcat_id){
		$this->db->select('products.item_id,products.item_name,products.item_code,products.item_cost')->from('products');
		//$this->db->where('seller_id', $sid);
		$this->db->where('subcategory_id', $subcat_id);
		return $this->db->get()->result_array();
	}
	function add_offer_to_products($productid,$data){
		$this->db->where('item_id', $productid);
		return $this->db->update('products', $data);
	}
	function delete_combo_offer_to_products($productid,$data){
		$this->db->where('item_id', $productid);
		return $this->db->update('products', $data);
	}
	
	


	
}