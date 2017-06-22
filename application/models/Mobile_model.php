<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}
	public function seller_register($data){
		$query =$this->db->insert('sellers', $data);
	 
	 return $insert_id = $this->db->insert_id();
		// $this->db->insert('sellers', $data);
		// return $insert_id = $this->db->insert_id();;
		
	}
	public function seller_mobile_check($mobile){
		 $sql = "SELECT * FROM sellers WHERE seller_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array();
		
	}

	public function seller_login($username, $password) {
	 	$sql = "SELECT seller_id,seller_name,seller_rand_id FROM sellers WHERE (seller_email ='".$username."' AND seller_password ='".$password."') OR (seller_mobile ='".$username."' AND seller_password ='".$password."')";
	 		return $this->db->query($sql)->row_array();
	}
	public function get_seller_category()
	{
		
		$query=$this->db->get('category');
		return $query->result();	
	}
	public function get_seller_subcategory()
	{
		
		$query=$this->db->get('subcategories');
		return $query->result_array();
	}
	public function get_seller_subitem()
	{
		
		$query=$this->db->get('sub_items');
		return $query->result_array();
	}
	public function getdata($id)
	{
		$this->db->select('sellers.seller_id,message');
		$this->db->from('seller_request'); 
		$this->db->join('sellers', 'sellers.seller_id =seller_request.seller_id');  
		$this->db->where('seller_request.seller_id',$id);	
		$this->db->order_by('seller_request.created_at','asc');
    	$query = $this->db->get();
    	return $query->result_array();
	}

	public function seller_basic($id,$data)
	{
	 
	 $this->db->where('seller_id',$id);
	 $query=$this->db->update('sellers',$data);
	 return $query;

	}

	function get_categories_name($cat_id)
{
	$this->db->select('category.category_name')->from('category');
	$this->db->where('category_id',$cat_id);
	return $this->db->get()->row_array();
}


//store details 
	function get_upload_file($id)
	{
		$this->db->select('*')->from('seller_store_details');
		$this->db->where('seller_id',$id);
		return $this->db->get()->row_array();
	}
	function seller_store_details($id,$data){
		
		
			$this->db->where('seller_id',$id);
			$query =  $this->db->update('seller_store_details', $data);
			return $query;

		}


	//seller_personal_details
	function seller_personal_details($data,$id){
		$this->db->where('seller_id',$id);
    	$query =  $this->db->update("sellers",$data);
    	return $query;

	}

	//seller_categories
	 public function insertseller_cat($id,$seller_category)
	{	
		$this->db->where('seller_id',$id);
		$query= $this->db->insert('seller_categories', $seller_category);
		return $query;
	}

	//seller_ads

	public function seller_ads()
	{
		$query=$this->db->get('seller_all_notifications');
		return $query->result();	
	}

	//new _orders
	public function new_orders($id)
{
    $this->db->select('order_id,item_id,product_name,customer_name');
	$this->db->from('orders');
	 $this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','0');
	$this->db->where('orders.seller_id', $id);
    $this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result_array();
}




//my listing
public function getcatsubcatpro($id)

{
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$id);
	//$this->db->group_by('category.category_name');
	$query = $this->db->get();
	return $query->result_array();
	 
	
}
}
