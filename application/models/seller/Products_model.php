<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends MY_Model 
{

	protected $_table="products";

		protected $primary_key="item_id";

		protected $soft_delete = FALSE;

		//public $before_create = array( 'created_at', 'updated_at' );

		//public $before_update = array( 'updated_at' );
		
	public function __construct()

	{
	parent::__construct();

	}

	function get_name_existss($name)
    {
	   $sql = "SELECT * FROM category WHERE category_name ='".$name."' AND status='1'";
        return $this->db->query($sql)->row_array();
     }
	 function get_subcatname_existss($name)
    {
	   $sql = "SELECT * FROM subcategories WHERE subcategory_name ='".$name."' AND status='1'";
        return $this->db->query($sql)->row_array();
     }
	 function insert_cat_data($data){
		$this->db->insert('category', $data);
		return $insert_id = $this->db->insert_id();
	}
	function save_sub_categories($data){
		$this->db->insert('subcategories', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function get_seller_catdata($sid)
	{
		$this->db->select('seller_categories.*,category.documetfile')->from('seller_categories');
		$this->db->join('category', 'category.category_id = seller_categories.seller_category_id', 'left');
		$this->db->where('seller_categories.seller_id',$sid);
        return $this->db->get()->result_array();
	}
	
	public function update_product_status($pid,$data){
		$this->db->where('item_id', $pid);
		return $this->db->update('products', $data);
	}
	public function get_seller_products($sid)
	{
		$this->db->select('*')->from('products');
		$this->db->where('seller_id',$sid);
		$this->db->where('item_status',1);
        return $this->db->get()->result_array();
	}
	public function get_seller_details($sid)
	{
		$this->db->select('sellers.seller_id,sellers.status')->from('sellers');
		$this->db->where('seller_id',$sid);
        return $this->db->get()->row_array();
	}
	public function get_subcategoies($cid)
	{
		$this->db->select('*')->from('subcategories');
		$this->db->where('category_id',$cid);
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}
	public function get_colores()
	{
		$this->db->select('*')->from('colorslist');
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}
	public function get_sizes_list()
	{
		$this->db->select('*')->from('sizes_list');
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}
	public function get_uksizes_list()
	{
		$this->db->select('*')->from('uk_sizes_list');
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}
	public function save_prodcts($data)
	{
		
		$this->db->insert('products', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function update_deails($pid,$data){
		$this->db->where('item_id', $pid);
		return $this->db->update('products', $data);
	}
	public function insert_product_sizes($data)
	{
		
		$this->db->insert('product_size_list', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function insert_product_uksizes($data)
	{
		
		$this->db->insert('product_uksize_list', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function insert_product_colors($data)
	{
		
		$this->db->insert('product_color_list', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function insert_product_spcifications($data)
	{
		
		$this->db->insert('product_spcifications', $data);
		return $insert_id = $this->db->insert_id();
	} 
	public function get_producr_details($id)
	{
		$this->db->select('*')->from('products');
		$this->db->where('item_id',$id);
        return $this->db->get()->row_array();
	}
	public function get_subcategory_document($id)
	{
		$this->db->select('subcategories.document')->from('subcategories');
		$this->db->where('subcategory_id',$id);
        return $this->db->get()->row_array();
	}
	public function get_skuid_exists($skuid)
	{
		$this->db->select('*')->from('products');
		$this->db->where('skuid',$skuid);
        return $this->db->get()->row_array();
	} 
	public function getcatdata()
	{
		
		$this->db->select('*')->from('category');
		$this->db->where('status',1);
        return $this->db->get()->result_array();

		
	}
	public function auto_items()
	{
		
		$query=$this->db->get('items');
		return $query->result_array();

		
	}
	public function getcateditdata()
	{
		
		$query=$this->db->get('category');
		return $query->result();
		
	}
	
	
	public function getitems($cat_id,$subcat_id)
	{
		$sid = $this->session->userdata('seller_id');  
		
	$this->db->select('*');
	$this->db->from('products');
    $this->db->where('category_id', $cat_id);
	$this->db->where('subcategory_id', $subcat_id);
	$this->db->where('seller_id', $sid);
	
    $query = $this->db->get();
    
    return $query->result();
		
		
	}
	

	public function get_areas($term){
    $this->db->like('item_name', $term, 'after');
    $query = $this->db->get('items');
    return $query->result(); 
}	
public function get_store_location($sid){
   $this->db->select('seller_store_details.area')->from('seller_store_details');
   $this->db->where('seller_id',$sid);
return $this->db->get()->row_array();
}
	
	
public function getsubcatdata($cat_id)
	{
	$sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('subcategories');
	$this->db->where('subcategories.category_id', $cat_id);
		$query=$this->db->get();
		return $query->result();
		
	}	
	
	
	// item data
	public function getsubitemdata($subcat_id)
 {
  
  $this->db->select('*');
 $this->db->from('sub_items');
 $this->db->where('sub_items.subcategory_id', $subcat_id);
  $query=$this->db->get();
  return $query->result();
  
 }
 


public function getproductdata($id)
{
	$sid = $this->session->userdata('seller_id');
	$this->db->select('products.*,subcategories.subcategory_name');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
	$this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.item_id', $id);
	$this->db->where('products.seller_id', $sid);
	$query=$this->db->get();
	return $query->row_array();
	
}
function remove_spcification($id){
		$sql1="DELETE FROM product_spcifications WHERE specification_id = '".$id."'";
		return $this->db->query($sql1);
	}
	function delete_product_colors($id){
		$sql1="DELETE FROM product_color_list WHERE p_color_id = '".$id."'";
		return $this->db->query($sql1);
	}
	function delete_product_sizes($id){
		$sql1="DELETE FROM product_size_list WHERE p_size_id = '".$id."'";
		return $this->db->query($sql1);
	}
	function product_uksize_list($id){
		$sql1="DELETE FROM product_uksize_list WHERE p_size_id = '".$id."'";
		return $this->db->query($sql1);
	}
	function delete_product_spc($id){
		$sql1="DELETE FROM product_spcifications WHERE specification_id = '".$id."'";
		return $this->db->query($sql1);
	}
public function get_product_colors($pid){
		$this->db->select('*')->from('product_color_list');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_product_sizes($pid){
		$this->db->select('*')->from('product_size_list');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_product_uksizes($pid){
		$this->db->select('*')->from('product_uksize_list');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}
	public function get_product_spc($pid){
		$this->db->select('*')->from('product_spcifications');
		$this->db->where('item_id',$pid);
		return $this->db->get()->result_array();
	}

public function getcatname($cat_id)
{
	
	$this->db->select('category_name');
	$this->db->from('category');
	$this->db->where('category_id', $cat_id);
	$query=$this->db->get();
	return $query->row();
	
	
	
	
}

public function getsubcatname($subcat_id)
{
	
	$this->db->select('subcategory_name');
	$this->db->from('subcategories');
	$this->db->where('subcategory_id', $subcat_id);
	$query=$this->db->get();
	return $query->row();
}

function search($match,$cat_id,$subcat_id)	
{
    $sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('products');
	
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   
   
	//$this->db->like('subcategories.subcategory_name',$match);
	//$this->db->or_like('category.category_name',$match);
       $this->db->where('products.seller_id',$sid);
		$this->db->where('products.category_id', $cat_id);
	$this->db->where('products.subcategory_id', $subcat_id);
	$this->db->like('products.item_name',$match);
	//$this->db->or_like('products.item_code',$match);
	$query = $this->db->get();
	return $query->result();
}


public function getcatsubcatpro()

{
	
	$sid = $this->session->userdata('seller_id');
	$this->db->select('category.*');
    $this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
	$this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$sid);
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	//echo '<pre>';print_r($query);exit;
	
	
	
	
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_catedata($category->category_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}
	
	
}

public function get_catedata($category_id)
{
  $sid = $this->session->userdata('seller_id');
    $this->db->select('subcategories.*');
    $this->db->from('products');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('products.category_id', $category_id);
    $this->db->where('products.seller_id', $sid);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    //return $query->result();
	
	
	 foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_subcatedata($subcategory->subcategory_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}	
}


public function get_subcatedata($subcategory_id)
{
	
	$sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('products.subcategory_id', $subcategory_id);
    $this->db->where('products.seller_id', $sid);    
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();
	
	
	
	
	
	
	
	
}

public function returns()

{
	$sid = $this->session->userdata('seller_id');
	$this->db->from('products');
	//$this->db->join('orders', 'orders.seller_id = products.seller_id');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$sid);
	//$this->db->where('orders.order_status','4');
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	
	
	
	
	
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->returndocs = $this->get_returncatedata($category->category_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}

}
public function get_returncatedata($category_id)
{
  $sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('products');
	//$this->db->join('orders', 'orders.seller_id = products.seller_id');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   //$this->db->where('orders.order_status','4');
   $this->db->where('products.category_id', $category_id);
    $this->db->where('products.seller_id', $sid);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    //return $query->result();
	
	
	 foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->returndocs12 = $this->get_returnsubcatedata($subcategory->subcategory_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}
	
	
	
	
	
	
	
	
}


public function get_returnsubcatedata($subcategory_id)
{
	
	$sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('products');
	$this->db->join('orders', 'orders.seller_id = products.seller_id');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('orders.order_status','4');
   $this->db->where('products.subcategory_id', $subcategory_id);
    $this->db->where('orders.seller_id', $sid);
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();
	
	
	
	
	
	
	
	
}



public function getproductapproval()
{
	$sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id', $sid);
	 
		$query=$this->db->get();
		return $query->result();
	
}
	
}