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
	public function save_notifciations($data)
	{
		
		$this->db->insert('notifications', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_catrgore($data)
	{
		
		$this->db->insert('category', $data);
		return $insert_id = $this->db->insert_id();
	} 
	public function get_oldcategoreis_seller_categories($sid)
	{
	
	$this->db->select('*')->from('category');
	$this->db->where('seller_id',$sid);
	return $this->db->get()->result_array();
	} 
	function delet_get_cat_seller_categories($catid)
{
		$sql1="DELETE FROM category WHERE category_id = '".$catid."'";
		return $this->db->query($sql1);
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
	function check_email_exits($semail)
	{
		$sql = "SELECT seller_email FROM sellers WHERE seller_email ='".$semail."'";
        return $this->db->query($sql)->row_array();
	}
	function check_email_editing($sid)
	{
		$sql = "SELECT * FROM sellers WHERE seller_id ='".$sid."'";
        return $this->db->query($sql)->row_array();
	}

function get_seleted_areas()
{
	$this->db->select('*')->from('locations');
	return $this->db->get()->result_array();
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


