<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Showups_model extends MY_Model 
{
	
	
		
	public function __construct()

	{
	parent::__construct();

	}

  public function seller_homebanners()
  {
    $sid = $this->session->userdata('seller_id');
    $this->db->select('home_banner.*,sellers.seller_rand_id,seller_name')->from('home_banner');
    $this->db->join('sellers', 'sellers.seller_id = home_banner.seller_id', 'left');
    $this->db->where('home_banner.seller_id',$sid);
    $this->db->order_by('home_banner.created_at','desc');
    return $this->db->get()->result_array();
  }

  public function update_banner_status($id,$sid,$data)
  {
    $this->db->where('image_id', $id);
    $this->db->where('seller_id',$sid);
    return $this->db->update('home_banner', $data);
  }
  public function delete_banner($id,$sid){
    $sql1="DELETE FROM home_banner WHERE image_id = '".$id."' AND  seller_id = '".$sid."'";
    return $this->db->query($sql1);
  }
  public function banner_count($date){
    //echo $date;exit;
    $this->db->select('*')->from('home_banner');
    $this->db->where('intialdate',$date);
    $this->db->where('status',1);
    return $this->db->get()->result_array();

  }
  public function banner_exits($name){
    //echo $date;exit;
    $this->db->select('home_banner.*')->from('home_banner');
    $this->db->where('file_name',$name);
    //$this->db->where('image_id',$id);
    return $this->db->get()->row_array();

  }

  public function save_banner_image($data)
{
	$this->db->insert('home_banner',$data);
	//print_r($data); exit;
	return $insert_id = $this->db->insert_id();	
 
}

/*top offers*/
	public function get_top_offers_data($sid){
		$this->db->select('top_offers.*,category.category_name')->from('top_offers');
		$this->db->join('category', 'category.category_id = top_offers.category_id', 'left');
		$this->db->where('top_offers.seller_id', $sid);
		return $this->db->get()->result_array();
	}
	public function gettop_offers()

{
	
	$sid = $this->session->userdata('seller_id');
	$this->db->from('top_offers');
	$this->db->join('subcategories', 'subcategories.subcategory_id =top_offers.subcategory_id');
	$this->db->join('category', 'category.category_id =top_offers.category_id');
	$this->db->where('top_offers.seller_id',$sid);
	//$this->db->where('top_offers.status', 1);
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	//echo '<pre>';print_r($query);exit;
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_topcatdata($category->category_id);
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}
	
	
}

public function get_topcatdata($category_id)
{
  $sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('top_offers');
    $this->db->join('subcategories', 'subcategories.subcategory_id =top_offers.subcategory_id');
   $this->db->join('category', 'category.category_id =top_offers.category_id');
   $this->db->where('top_offers.category_id', $category_id);
    $this->db->where('top_offers.seller_id', $sid);
    //$this->db->where('top_offers.status', 1);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    //return $query->result();
	
	
	 foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_topsubcatedata($subcategory->subcategory_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}	
}

public function get_topsubcatedata($subcategory_id)
{
	
	$sid = $this->session->userdata('seller_id');
    $this->db->select('top_offers.*,products.item_name');
    $this->db->from('top_offers');
    $this->db->join('subcategories', 'subcategories.subcategory_id =top_offers.subcategory_id');
   $this->db->join('products', 'products.item_id =top_offers.item_id');
   $this->db->join('category', 'category.category_id =top_offers.category_id');
   $this->db->where('top_offers.subcategory_id', $subcategory_id);
    $this->db->where('top_offers.seller_id', $sid);
    //$this->db->where('top_offers.status', 1);
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();

	
}
public function update_topoffers_status($id,$data){
	$this->db->where('top_offer_id', $id);
		//$this->db->where('item_id', $id);
		//$this->db->where('seller_id',$sid);
		return $this->db->update('top_offers', $data);
}

/*deals of the day*/

public function get_deals_of_day_data($sid){
		$this->db->select('deals_ofthe_day.*,category.category_name')->from('deals_ofthe_day');
		$this->db->join('category', 'category.category_id = deals_ofthe_day.category_id', 'left');
		$this->db->where('deals_ofthe_day.seller_id', $sid);
		return $this->db->get()->result_array();
	}
	public function getdeals_ofthe_day()

{
	
	$sid = $this->session->userdata('seller_id');
	$this->db->from('deals_ofthe_day');
	$this->db->join('subcategories', 'subcategories.subcategory_id =deals_ofthe_day.subcategory_id');
	$this->db->join('category', 'category.category_id =deals_ofthe_day.category_id');
	$this->db->where('deals_ofthe_day.seller_id',$sid);
	//$this->db->where('deals_ofthe_day.status', 1);
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	//echo '<pre>';print_r($query);exit;
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_dealscatdata($category->category_id);
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}
	
	
}

public function get_dealscatdata($category_id)
{
  $sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('deals_ofthe_day');
    $this->db->join('subcategories', 'subcategories.subcategory_id =deals_ofthe_day.subcategory_id');
   $this->db->join('category', 'category.category_id =deals_ofthe_day.category_id');
   $this->db->where('deals_ofthe_day.category_id', $category_id);
    $this->db->where('deals_ofthe_day.seller_id', $sid);
    //$this->db->where('deals_ofthe_day.status', 1);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    //return $query->result();
	
	
	 foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_dealssubcatedata($subcategory->subcategory_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}	
}

public function get_dealssubcatedata($subcategory_id)
{
	
	$sid = $this->session->userdata('seller_id');
    $this->db->select('deals_ofthe_day.*,products.item_name');
    $this->db->from('deals_ofthe_day');
    $this->db->join('subcategories', 'subcategories.subcategory_id =deals_ofthe_day.subcategory_id');
   $this->db->join('products', 'products.item_id =deals_ofthe_day.item_id');
   $this->db->join('category', 'category.category_id =deals_ofthe_day.category_id');
   $this->db->where('deals_ofthe_day.subcategory_id', $subcategory_id);
    $this->db->where('deals_ofthe_day.seller_id', $sid);
    //$this->db->where('deals_ofthe_day.status', 1);
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();

	
}
public function update_deals_ofthe_day_status($id,$data){
	$this->db->where('deal_offer_id', $id);
		//$this->db->where('item_id', $id);
		//$this->db->where('seller_id',$sid);
		return $this->db->update('deals_ofthe_day', $data);
}

	/*season sales */

public function get_season_sales_data($sid){
		$this->db->select('season_sales.*,category.category_name')->from('season_sales');
		$this->db->join('category', 'category.category_id = season_sales.category_id', 'left');
		$this->db->where('season_sales.seller_id', $sid);
		return $this->db->get()->result_array();
	}
	public function getseason_sales()

{
	
	$sid = $this->session->userdata('seller_id');
	$this->db->from('season_sales');
	$this->db->join('subcategories', 'subcategories.subcategory_id =season_sales.subcategory_id');
	$this->db->join('category', 'category.category_id =season_sales.category_id');
	$this->db->where('season_sales.seller_id',$sid);
	//$this->db->where('season_sales.status', 1);
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	//echo '<pre>';print_r($query);exit;
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_seasonscatdata($category->category_id);
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}
	
	
}

public function get_seasonscatdata($category_id)
{
  $sid = $this->session->userdata('seller_id');
    $this->db->select('*');
    $this->db->from('season_sales');
    $this->db->join('subcategories', 'subcategories.subcategory_id =season_sales.subcategory_id');
   $this->db->join('category', 'category.category_id =season_sales.category_id');
   $this->db->where('season_sales.category_id', $category_id);
    $this->db->where('season_sales.seller_id', $sid);
    //$this->db->where('season_sales.status', 1);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    //return $query->result();
	
	
	 foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_seasonssubcatedata($subcategory->subcategory_id);
        

        
    }
    //print "<pre>";
//print_r($return); 
//print "<pre>"; exit;
     if(!empty($return))
    {
    return $return;
}	
}

public function get_seasonssubcatedata($subcategory_id)
{
	
	$sid = $this->session->userdata('seller_id');
    $this->db->select('season_sales.*,products.item_name');
    $this->db->from('season_sales');
    $this->db->join('subcategories', 'subcategories.subcategory_id =season_sales.subcategory_id');
   $this->db->join('products', 'products.item_id =season_sales.item_id');
   $this->db->join('category', 'category.category_id =season_sales.category_id');
   $this->db->where('season_sales.subcategory_id', $subcategory_id);
    $this->db->where('season_sales.seller_id', $sid);
    //$this->db->where('season_sales.status', 1);
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();

	
}
public function update_season_sales_status($id,$data){
	$this->db->where('season_sales_id', $id);
		//$this->db->where('item_id', $id);
		//$this->db->where('seller_id',$sid);
		return $this->db->update('season_sales', $data);
}





}