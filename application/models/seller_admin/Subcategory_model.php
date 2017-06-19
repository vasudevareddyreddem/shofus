<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subcategory_model extends MY_Model 
{

	protected $_table="subcategory";
	protected $primary_key="seller_subcategory_id";
	protected $soft_delete = FALSE;
   // public $before_create = array( 'created_at', 'updated_at' );
    //public $before_update = array( 'updated_at' );

	public function __construct()

	{
	parent::__construct();

	}
	public function getsubcat()
	{
	$sid = $this->session->userdata('seller_id');	
    $this->db->select('*');
	$this->db->from('subcategory');
	$this->db->join('category', 'category.category_id =subcategory.category_id');
	$this->db->join('subcategories', 'subcategories.subcategory_id =subcategory.subcategory_id');
    
	$this->db->where('subcategory.seller_id',$sid);
    $query = $this->db->get();
    return $query->result();
		
		
	}
	
	public function getsubcategorydata($id)
	{
		
		$this->db->select('*');
	$this->db->from('subcategory');
	$this->db->where('subcategory_id', $id);
		$query=$this->db->get();
		return $query->row();
		
		
		
	}
	
	
	 public function getsubcategoryDataforcat($catid){
		$this->db->where('category_id',$catid);
		$data=$this->db->get('subcategories');
		return $data->result();
		}
		
		
		
	public function getcatsubcategorydata($result)
	
	{
		
		$this->db->where('category_id',$result);
		$data=$this->db->get('subcategories');
		return $data->result();
		
		
		
		
	}
	
	
public function search($match)	
{
    $sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('subcategory');
	$this->db->join('category', 'subcategory.category_id = category.category_id');
	$this->db->like('subcategory.subcategory_name',$match);
	$this->db->or_like('category.category_name',$match);
        $this->db->where('subcategory.seller_id',$sid);
	$query = $this->db->get();
	return $query->result();
}	
	
	
	
	
public function getreferralfee($subcatid){
		$this->db->where('subcategory_id',$subcatid);
		$data=$this->db->get('referral_fee');
		return $data->row();
		}	
	
	
public function getshippingcharge($product_weight)

{
$this->db->select('shipping_charges');
	$this->db->from('shipping');
	
	$this->db->where('product_weight >=', $product_weight);
	
$this->db->limit('1');

$query = $this->db->get();
	return $query->row();

}	
	
	
	
}