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
	public function personal_details()
	{	
		$sid = $this->session->userdata('seller_id');
		$this->db->select('sellers.seller_rand_id,sellers.seller_name,sellers.seller_address');
			$this->db->from('sellers');   
		$this->db->where('seller_id', $sid);
    	$query = $this->db->get();
    	return $query->row_array();
	}

	public function profile_pic_save($pic){
		$sid = $this->session->userdata('seller_id');
		$this->db->where('seller_id',$sid);
    	$query =  $this->db->update("sellers",$pic);
    	return $query;
	}
	 public function profile_pic_get()
	 {
	 	$sid = $this->session->userdata('seller_id');
	 	$this->db->select('sellers.profile_pic');
		$this->db->from('sellers');    
		$this->db->where('seller_id', $sid);
    	$query = $this->db->get();
    	return $query->result_array();

	 }
	 public function product_reviews_list($sid){
		 
		$this->db->select('reviews.*,ratings.rating')->from('reviews');
		$this->db->join('ratings', 'ratings.review_id = reviews.review_id', 'left');
		$this->db->order_by("reviews.review_id", "DESC");
		$this->db->where('reviews.seller_id',$sid);
		$this->db->limit(4);
        return $this->db->get()->result_array();
		 
	 }
	 public function product_reviews_lists($sid){
		 
		$this->db->select('reviews.*,ratings.rating')->from('reviews');
		$this->db->join('ratings', 'ratings.review_id = reviews.review_id', 'left');
		$this->db->order_by("reviews.review_id", "DESC");
		$this->db->where('reviews.seller_id',$sid);
        return $this->db->get()->result_array();
		 
	 }
	 public function product_reviews_avg($sid){
		 
		$sql = "SELECT AVG(rating) as avg FROM ratings WHERE seller_id ='".$sid."'";
		return $this->db->query($sql)->row_array();	
		 
	 }
	 public function product_reviews_fiveavg($sid){
		 
		$sql = "SELECT AVG(rating) as avg FROM ratings WHERE seller_id ='".$sid."' AND rating=5";
		return $this->db->query($sql)->row_array();	
		 
	 }


	}

