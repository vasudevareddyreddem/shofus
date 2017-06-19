<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_profile_model extends MY_Model 
{
	public function __construct()

	{
	parent::__construct();

	}

	public function seller_categories()
	{	
		$sid = $this->session->userdata('seller_id');
		$this->db->select('*');
		$this->db->from('seller_categories');    
		$this->db->where('seller_id', $sid);
    	$query = $this->db->get();
    	return $query->result();
	}


	// public function total_orders(){
	// 	$sid = $this->session->userdata('seller_id');
	// 	$query = $this->db->query("SELECT COUNT(order_id) AS total_order FROM orders WHERE seller_id = 8");
	// //echo  $this->db->last_query();
	// return $query->result();
	}

