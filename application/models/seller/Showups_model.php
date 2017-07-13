<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Showups_model extends MY_Model 
{
	
	
		
	public function __construct()

	{
	parent::__construct();

	}

  public function save_banner_image($data)
{
	$this->db->insert('home_banner',$data);
	//print_r($data); exit;
	return $insert_id = $this->db->insert_id();	
 
}
function get_seller_products_data($sid){
		$this->db->select('products.*,category.category_name')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left'); //
		$this->db->where('products.seller_id', $sid);
		return $this->db->get()->result_array();
	}
	public function getcatsubcatpro()

{
	
	$sid = $this->session->userdata('seller_id');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
	$this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$sid);
	$this->db->where('products.item_status', 1);
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
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('products.category_id', $category_id);
    $this->db->where('products.seller_id', $sid);
    $this->db->where('products.item_status', 1);
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
    $this->db->where('products.item_status', 1);
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();
	
	
	
	
	
	
	
	
}

}