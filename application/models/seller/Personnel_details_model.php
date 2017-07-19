<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnel_details_model extends MY_Model 

{

	public function __construct()

	{

	parent::__construct();
	}

public function getlocations()
{
$query = $this->db->get('locations');
return $query->result();
}	


public function get_all_storedetail($sid)
{
		$this->db->select("sellers.*,seller_store_details.*")->from('sellers');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left');
		$this->db->where('sellers.seller_id',$sid);
		return $this->db->get()->row_array();

}

public function get_all_locations($sid)
{
		$this->db->select("seller_store_details.other_shops_location")->from('sellers');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left');		
		$this->db->where('sellers.seller_id',$sid);
		return $this->db->get()->row_array();

}
public function get_store_category_detail($sid)
{
		$this->db->select("seller_categories.*,category.category_name")->from('seller_categories');
		$this->db->join('category', 'category.category_id = seller_categories.seller_category_id', 'left');
		$this->db->where('seller_categories.seller_id',$sid);
		return $this->db->get()->result_array();

}

public function getsellersd()
{
$sid= $this->session->userdata('seller_id');
$this->db->where('seller_id',$sid);	
$query = $this->db->get('seller_store_details');
return $query->row();		
}


public function getsellerpd()
{
$sid= $this->session->userdata('seller_id');
$this->db->where('seller_id',$sid);	
$query = $this->db->get('seller_personal_details');
return $query->row();		
}


public function getsellerbd()
{
$sid= $this->session->userdata('seller_id');
$this->db->where('seller_id',$sid);	
$query = $this->db->get('sellers');
return $query->row();		
}

 
// store details update
public function updatesd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
		$this->db->where('seller_id',$sid);
		$query=$this->db->update('seller_store_details',$data);
		return $query; 		
}


// personal details update
public function updatepd($data)
{
	
	$sid= $this->session->userdata('seller_id');		
	$this->db->where('seller_id',$sid);
	$query=$this->db->update('seller_personal_details',$data);
	return $query; 
	
}

function storedetails_adding($sid,$data){
	
	
		$this->db->where('seller_id',$sid);
		return $this->db->update('seller_store_details', $data);

	}
	
function get_seller_details($seller_id)
{
	$this->db->select('*')->from('sellers');
	$this->db->where('seller_id',$seller_id);
	return $this->db->get()->row_array();
}
function get_seller_mobile_check($email)
{
	$this->db->select('*')->from('sellers');
	$this->db->where('seller_mobile',$email);
	return $this->db->get()->row_array();
}
public function set_password($sid,$pass){
		$sql1="UPDATE sellers SET seller_password ='".$pass."' WHERE seller_id = '".$sid."'";
       	return $this->db->query($sql1);
	}

function get_upload_file($seller_id)
{
	$this->db->select('*')->from('seller_store_details');
	$this->db->where('seller_id',$seller_id);
	return $this->db->get()->row_array();
}
function get_categories_name($cat_id)
{
	$this->db->select('category.category_name')->from('category');
	$this->db->where('category_id',$cat_id);
	return $this->db->get()->row_array();
}
function get_old_seller_categories($seller_id)
{
	$this->db->select('*')->from('seller_categories');
	$this->db->where('seller_id',$seller_id);
	return $this->db->get()->result_array();
}
function delet_get_old_seller_categories($catid)
{
		$sql1="DELETE FROM seller_categories WHERE seller_cat_id = '".$catid."'";
		return $this->db->query($sql1);
}
function insertseller_cat($data){
		$this->db->insert('seller_categories', $data);
		return $insert_id = $this->db->insert_id();

	}
public function updatebd($sid,$data)
{

	$this->db->where('seller_id',$sid);
	return $this->db->update('sellers', $data);
}

public function updatebankd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);
		$query=$this->db->update('sellers',$data);
		return $query; 		
}

public function insertFiles($images){
	$sid= $this->session->userdata('seller_id');
	for($i=0; $i<count($images); $i++)
	{
	$data=array('seller_id'=>$sid,'file_name'=>$images[$i]);
	$this->db->insert('kyc_reports',$data);
	}
	return true;
	}
}


	