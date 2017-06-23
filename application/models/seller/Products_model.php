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

	public function getcatdata()
	{
		
		$query=$this->db->get('category');
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
	
	// public function getcatadddata()
	// {
	// 	$sid = $this->session->userdata('seller_id');
		
	//  $this->db->select('category.category_name,seller_categories.*')->from('seller_categories');
	// $this->db->join('category', 'seller_categories.seller_id = category.category_id','left');
	// $this->db->where('seller_categories.seller_id', $sid);
	// return $this->db->get()->result_array();
	// 	// $query = $this->db->get();
 //  //   	return $query->result();


	// // 	 $query=$this->db->get('category');
	// // 	 return $query->result();
		
	// // }
	public function get_areas($term){
    $this->db->like('item_name', $term, 'after');
    $query = $this->db->get('items');
    return $query->result(); 
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
 public function get_items($keyword){
    // $this->db->select('item_name');
    // $this->db->like('item_name', $q);
    // $query = $this->db->get('items');
    //  if($query->num_rows() > 0){
    //    foreach ($query->result_array() as $row){
    //      $row_set[] = htmlentities(stripslashes($row['item_name'])); //build an array
    //    }
    //    echo print_r($row_set);exit;;
    //    echo json_encode($row_set);

    //  }
        $this->db->select('item_name')->from('items');
        $this->db->like('item_name',$keyword,'after');
        $query = $this->db->get();    
         
        return $query->result();
  }


    // public function autocomplete($term)
    // {
    //     $query = $this->db->query("SELECT item_name
    //         FROM items
    //          LIKE '%".$term."%'
    //         GROUP BY item_name");
    //     echo json_encode($query->result_array());
    // }
 // public function sw_search($keyword)
 //    {
 //        $this->db->select('id, friendly_name');
 //        $this->db->from('business_category');
 //        $this->db->where('suppress', 0);
 //        $this->db->like('friendly_name', $keyword);
 //        $this->db->order_by("friendly_name", "asc");
 
 //        $query = $this->db->get();
 //        foreach($query->result_array() as $row){
 //            //$data[$row['friendly_name']];
 //            $data[] = $row;
 //        }
 //        //return $data;
 //        return $query;
 //    }


public function getproductdata($id)
{
	$sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.item_id', $id);
	
	$this->db->where('products.seller_id', $sid);
		$query=$this->db->get();
		return $query->row();
	
	
	
	
	
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
    $this->db->select('*');
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