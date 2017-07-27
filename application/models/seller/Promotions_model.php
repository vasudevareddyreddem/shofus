<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promotions_model extends MY_Model 
{

		
	public function __construct()

	{
	parent::__construct();

	}

	
	function get_offer_product_price($cat_id){
		$this->db->select('*')->from('products');
		$this->db->where('item_id', $cat_id);
		return $this->db->get()->row_array();
	}
	function get_seller_products_data($sid){
		$this->db->select('products.*,category.category_name')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left'); //
		$this->db->where('products.seller_id', $sid);
		return $this->db->get()->result_array();
	}
	function get_seller_subcat_products_data($subcat_id){
		$this->db->select('products.item_id,products.item_name,products.item_code,products.item_cost')->from('products');
		//$this->db->where('seller_id', $sid);
		$this->db->where('subcategory_id', $subcat_id);
		return $this->db->get()->result_array();
	}
	function add_offer_to_products($data){
		$this->db->insert('season_sales', $data);
        return $insert_id = $this->db->insert_id();
	}
	function add_offer_to_productss($productid,$data){
		$this->db->where('item_id', $productid);
		return $this->db->update('products', $data);
	}
	function item_already_exits($pid){
		//echo $date;exit;
		$this->db->select('*')->from('season_sales');
		$this->db->where('item_id',$pid);
		return $this->db->get()->row_array();

	}
	function items_counts_in_topoffers($date){
		//echo $date;exit;
		$this->db->select('*')->from('top_offers');
		$this->db->where('expairdate',$date);
		$this->db->where('status',1);
		return $this->db->get()->result_array();

	}
	function add_topoffer_to_products($data){
		$this->db->insert('top_offers', $data);
        return $insert_id = $this->db->insert_id();
	}
	function add_topoffer_to_products_inproducts($productid,$data){
		$this->db->where('item_id', $productid);
		return $this->db->update('products', $data);
	}
	function dealsoftheday_item_already_exits($pid){
		//echo $date;exit;
		$this->db->select('*')->from('deals_ofthe_day');
		$this->db->where('item_id',$pid);
		return $this->db->get()->row_array();

	}
	
	function dealsoftheday_items_counts_in_topoffers($date){
		//echo $date;exit;
		$this->db->select('*')->from('deals_ofthe_day');
		$this->db->where('expairdate',$date);
		$this->db->where('status',1);
		return $this->db->get()->result_array();

	}
	function add_dealsoftheday_to_products($data){
		$this->db->insert('deals_ofthe_day', $data);
        return $insert_id = $this->db->insert_id();
	}
	function topoffer_item_already_exits($pid){
		//echo $date;exit;
		$this->db->select('*')->from('top_offers');
		$this->db->where('item_id',$pid);
		return $this->db->get()->row_array();

	}
	function topoffer_items_counts_in_topoffers($date){
		//echo $date;exit;
		$this->db->select('*')->from('season_sales');
		$this->db->where('expairdate',$date);
		$this->db->where('status',1);
		return $this->db->get()->result_array();

	}
	function delete_combo_offer_to_products($productid,$data){
		$this->db->where('item_id', $productid);
		return $this->db->update('products', $data);
	}
	
	


	
}