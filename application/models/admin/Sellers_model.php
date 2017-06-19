<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sellers_model extends MY_Model 

{

	protected $_table="sellers";

	protected $primary_key="seller_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );


 public function __construct()

	{

	parent::__construct();
}

 public function search(){

    $match = $this->input->post('search');
	$this->db->like('seller_name',$match);
	$this->db->or_like('seller_email',$match);
	$this->db->or_like('seller_mobile',$match);
	$this->db->or_like('seller_address',$match);
	$this->db->or_like('seller_shop',$match);
	$this->db->or_like('seller_license',$match);
	$query = $this->db->get('sellers');
	return $query->result();

}

public function getReportFiles($id)
{
	
	$this->db->where('seller_id',$id);
	$query = $this->db->get('kyc_reports');
	return $query->result();
	
	
	
	
}
public function getproductdata($id)
{
	
	$this->db->select('*');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id', $id);
		$query=$this->db->get();
		return $query->result();
	
	
	
	
	
}

public function updatestatus($data,$id)
{
	$this->db->where('item_id',$id);
		$query=$this->db->update('products',$data);
		return $query; 
	
	
	
	
	
	
	
}

}