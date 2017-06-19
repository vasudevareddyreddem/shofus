<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adddetails_model extends MY_Model 
{
			
	public function __construct()

	{
	parent::__construct();

	}
	public function getcatdata()
	  {
		
		$query=$this->db->get('category');
		return $query->result();
		
	  }
  public function insertseller_cat($data)
	{
		
		$sid= $this->session->userdata('seller_id');	
		$this->db->where('seller_id',$sid);
		$query= $this->db->insert('seller_categories', $data);
		return $query;
	}

	public function insertseller_basic($data)
	{
	 $sid= $this->session->userdata('seller_id');	
	 $this->db->where('seller_id',$sid);
	 $query=$this->db->update('sellers',$data);
	 return $query;

	}
	function get_categories_name($cat_id)
{
	$this->db->select('category.category_name')->from('category');
	$this->db->where('category_id',$cat_id);
	return $this->db->get()->row_array();
}
function get_seller_storedetails_data($sid)
{
	$this->db->select('*')->from('seller_store_details');
	$this->db->where('seller_id',$sid);
	return $this->db->get()->row_array();
}
function get_seller_data($sid)
{
	$this->db->select('*')->from('sellers');
	$this->db->where('seller_id',$sid);
	return $this->db->get()->row_array();
}
	function update_seller_competed($sid,$status){
		$sql1="UPDATE sellers SET register_complete ='".$status."'WHERE seller_id = '".$sid."'";
		return $this->db->query($sql1);

	}
	function seller_personal_details($data,$sid){
		$this->db->where('seller_id',$sid);
    	return $this->db->update("sellers",$data);

	}
	function storedetails_adding($sid,$data){
		$this->db->where('seller_id',$sid);
    	return $this->db->update("seller_store_details",$data);

	}
	function setpassword($sid,$data){
		$this->db->where('seller_id',$sid);
    	return $this->db->update("sellers",$data);

	}
	function getseller_details($sid){
		$this->db->select('*')->from('sellers');
		$this->db->where('seller_id', $sid);
		return $this->db->get()->row_array();

	}
	


  

}


