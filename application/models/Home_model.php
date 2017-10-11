<?php

defined('BASEPATH') OR exit('No direct script access allowed');



 

class Home_model extends CI_Model

{

    function __construct()

    {

        // Call the Model constructor

        parent::__construct();

    }    
	public function cart_item_count($cust_id)
	{
	$this->db->select('*')->from('cart');
	$this->db->where('cust_id', $cust_id);
	return $this->db->get()->result_array();
	}
	public function customer_details($cust_id)
	{
	$this->db->select('customers.cust_firstname,customers.cust_lastname')->from('customers');
	$this->db->where('customer_id', $cust_id);
	return $this->db->get()->row_array();
	}
	
	public function get_search_functionality_products($areaid)
	{
	$this->db->select('products.item_id,products.item_name,products.yes,subcategories.subcategory_id,subcategories.subcategory_name')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
	//$this->db->where('item_name',$areaid);
	$this->db->like('item_name', $areaid);
	$this->db->where('products.item_status',1);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 

	}
	public function get_search_functionality_sub_category($areaid)
	{
	$this->db->select('category.category_name,subcategories.category_id,subcategories.subcategory_id,subcategories.subcategory_name,subcategories.yes')->from('subcategories');
	$this->db->join('category', 'category.category_id = subcategories.category_id', 'left');
	$this->db->like('subcategory_name', $areaid);
	$this->db->where('subcategories.status',1);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 
	}
	public function get_search_functionality_category($areaid)
	{
	$this->db->select('*')->from('category');
	$this->db->like('category_name', $areaid);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 
	}
	
	public function get_search_top_offers($areaid)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('top_offers.*,products.*')->from('top_offers');
		$this->db->join('products', 'products.item_id = top_offers.item_id', 'left');
		$this->db->where_in('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('top_offers.offer_percentage ASC');
		$this->db->where('top_offers.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('top_offers.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}
	public function get_search_trending_products($areaid)
	{
		$this->db->select('*')->from('products');
		$this->db->where_in('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage ASC');
		$this->db->limit(5);
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_search_offer_for_you($areaid)
	{
		$this->db->select('*')->from('products');
		$this->db->where_in('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage ASC');
		$this->db->limit(5);
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_search_deals_of_the_day($areaid)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('deals_ofthe_day.*,products.*')->from('deals_ofthe_day');
		$this->db->join('products', 'products.item_id = deals_ofthe_day.item_id', 'left');
		$this->db->where_in('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('deals_ofthe_day.offer_percentage ASC');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function get_search_season_sales($areaid)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
		$this->db->where_in('seller_location_area',$areaid);
		$this->db->order_by('season_sales.offer_percentage ASC');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	
	}
	public function get_season_offers($id)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
		$this->db->where('seller_location_area',$id);
		$this->db->order_by('season_sales.offer_percentage ASC');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	
	}
	public function get_top_offers($id)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('top_offers.*,products.*')->from('top_offers');
		$this->db->join('products', 'products.item_id = top_offers.item_id', 'left');
		$this->db->order_by('top_offers.offer_percentage ASC');
		if(isset($id) && $id!=''){
		$this->db->where('products.seller_location_area',$id);	
		}
		$this->db->where('top_offers.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('top_offers.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}
	public function get_trending_products($id)
	{
		$this->db->select('*')->from('products');
		if(isset($id) && $id!=''){
		$this->db->where('products.seller_location_area',$id);	
		}
		$this->db->order_by('products.offer_percentage ASC');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();

	}
	public function get_offer_for_you($id)
	{
		$this->db->select('*')->from('products');
        if(isset($id) && $id!=''){
		$this->db->where('products.seller_location_area',$id);	
		}
		$this->db->order_by('products.offer_percentage ASC');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();

	}
	public function get_deals_of_the_day($id)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('deals_ofthe_day.*,products.*')->from('deals_ofthe_day');
		$this->db->join('products', 'products.item_id = deals_ofthe_day.item_id', 'left');
		$this->db->order_by('deals_ofthe_day.offer_percentage DESC');
		if(isset($id) && $id!=''){
		$this->db->where('products.seller_location_area',$id);	
		}
		$this->db->where('deals_ofthe_day.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}

	public function get_home_pag_banner()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('*')->from('home_banner');
		$this->db->order_by('home_banner.image_id desc');
		$this->db->where('home_banner.home_page_status',1);
		$this->db->where('home_banner.expairydate >=', $curr_date);
		$this->db->where('home_banner.preview_ok',1);
		return $this->db->get()->result_array();

	}
	public function get_season_sales()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
		$this->db->order_by('season_sales.offer_percentage ASC');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}
	
	public function Search_functionality($searchvalue)
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage ASC');
		$this->db->limit(5);
		return $this->db->get()->result_array();

	}
		
		
		
		public function getcatsubcat()
	{
		
		$query=$this->db->get('category');
		//return $data->result();
		
		foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        
      $return[$category->category_id]->subcat = $this->get_subcat($category->category_id);
      

        
    }
		
	if(!empty($return))
    {
    return $return;

	}	
		
		
		
	}
	
	
	public function get_subcat($category_id)
{
    
	$this->db->select('*');
	$this->db->from('subcategories');
    $this->db->where('category_id', $category_id);
	$this->db->group_by('subcategory_name');
    $query = $this->db->get();
    
    return $query->result();
}
	
public function getproductdatacount($cat_id,$subcat_id)
{
	
$this->db->select('*');
	$this->db->from('products');
	$this->db->join('category', 'category.category_id = products.category_id');
    $this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id');
	$this->db->where('category.category_name', $cat_id);
	$this->db->where('subcategories.subcategory_name', $subcat_id);
	$this->db->where('products.item_status', 1);
		$query=$this->db->get();	
	
return $query->num_rows();	
	
}
	
public function getproductdata($cat_id,$subcat_id,$limit,$offset)

{
	$location = $this->session->userdata('location_name');
$this->db->select('*');
	$this->db->from('products');
	$this->db->join('category', 'category.category_id = products.category_id');
    $this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id');
	$this->db->join('sellers', 'sellers.seller_id = products.seller_id');
	$this->db->where('category.category_name', $cat_id);
	$this->db->where('subcategories.subcategory_name', $subcat_id);
	$this->db->where('products.item_status', 1);
	$this->db->where('sellers.seller_location', $location);
	$this->db->limit( $limit, $offset );
		$query=$this->db->get();
		return $query->result();	
	
	
	
	

}	

public function getcategories()	
{
	$this->db->select('*')->from('category');
		return $this->db->get()->result_array();
}
public function getsubcategories($subcatid)	
{
		$this->db->select('subcategories.*,category.category_name')->from('subcategories');
		$this->db->join('category', 'category.category_id = subcategories.category_id', 'left');

		$this->db->where('subcategories.subcategory_id', $subcatid);

		return $this->db->get()->result_array();
}
public function getproducts($subid)	
{
		$this->db->select('products.*,category.category_name,subcategories.subcategory_name')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->join('category', 'category.category_id = subcategories.category_id', 'left');

		$this->db->where('products.subcategory_id', $subid);

		return $this->db->get()->result_array();
}
	
	public function get_all_category_with_products()
	{
	
		$this->db->select('category.category_name,category.category_id,')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
		$this->db->join('category', 'category.category_id =products.category_id', 'left');
		$this->db->group_by('category.category_id');
		$this->db->order_by('category.category_id', 'ASC');
		$this->db->where('category.status', 1);		
		return $this->db->get()->result_array();
	}
	public function get_sidebar_category_list()
	{
		$this->db->select('category.category_name,category.category_id,,category.category_image')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
		$this->db->join('category', 'category.category_id =products.category_id', 'left');
		$this->db->group_by('category.category_id');
		$this->db->order_by('category.category_id', 'ASC');
		$this->db->where('category.status', 1);		
		return $this->db->get()->result_array();
	}
	
	
	public function getcatsubcatpro()
	{
	
		$this->db->select('category.category_name,category.category_id,')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
		$this->db->join('category', 'category.category_id =products.category_id', 'left');

		$this->db->group_by('category.category_id');
		$this->db->order_by('category.category_id', 'ASC');
		$this->db->where('category.status', 1);		
		$query=$this->db->get()->result_array();
		
		//echo '<pre>';print_r($query);exit;
		 foreach($query as $category)
        {
         
		 $return[$category['category_name']] = $category;
		 $return[$category['category_name']]['subcat'] = $this->get_catedata($category['category_id']);


        
		}
		if(!empty($return))
    {
    return $return;
}
	
	}
public function get_catedata($category_id)
{
  
	$this->db->select('subcategories.subcategory_name,subcategories.subcategory_id')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');
	$this->db->group_by('subcategories.subcategory_id');
	$this->db->order_by('subcategories.subcategory_id', 'ASC'); 
	  $this->db->where('subcategories.category_id', $category_id);	

	$query=$this->db->get()->result_array();
	//echo '<pre>';print_r($query);exit;
	 foreach($query as $subcategory)
	{
	 $return[$subcategory['subcategory_name']] = $subcategory;
	 $return[$subcategory['subcategory_name']]['product_list'] = $this->get_subcatedata($subcategory['subcategory_id']);

	}
	if(!empty($return))
    {
    return $return;
}
}

public function get_subcatedata($subcategory_id)
{
	
	//echo '<pre>';print_r($subcategory_id);exit;
	$this->db->select('products.*')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('products.subcategory_id', $subcategory_id);
    $this->db->where('products.item_status', 1);
	 return $this->db->get()->result_array();
}
	
public function getsubcatdata($cat_id)

{


$this->db->select('*');
	$this->db->from('subcategories');
	$this->db->join('category', 'category.category_id = subcategories.category_id');
  
	$this->db->where('category.category_name', $cat_id);
	
		$query=$this->db->get();
		return $query->result();	

}	
	public function getlocations()

	{
	$this->db->select('*')->from('locations');
	return $this->db->get()->result_array();
	}
	public function getlocations_insession($data)

	{
		
		$this->db->select('*')->from('locations');
		$this->db->where_in('location_name',$data);
		return $this->db->get()->row_array();
	}	
	
/*    login and signup      */	


public function checkuserEmail($email)
    {
    $this->db->where('user_email',$email);
	//$this->db->where('user_type',$user_type);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
}

public function userinsert($obj)
{

 $this->db->insert('user',$obj);

    return $this->db->insert_id();


}

public function authenticate($username, $password) {
        //$encrypted_password = ($password);

          $this->db->where('user_email',$username);
      $this->db->where('user_password',$password);
	  //$this->db->where('status', 1);
       $user=$this->db->get('user');
       //print_r($user->result()); exit;
        if (!is_null($user)) {
            return $user->row();

        }
        return FALSE;
    }

public function updatetime($user_id,$updated)
{
$this->db->where('user_id',$user_id);

    $query=$this->db->update('user',$updated);

    return $query; 


}

public function sendEmail($to_email)
    {
		//echo $to_email; exit;
         //$x=$this->encrypt->encode($to_email);
		//$x=str_replace(array('+', '/', '='), array('-', '_', '~'), $x);
        $from_email = 'mails@dev2.kateit.in'; //change this to yours
        $subject = 'Verify Your Email Address';
   		$message = "Dear User,<br>                
		Your Successfully registered<br><br>  Thanks,<br>Cart in hour"; 
        //send mail
		//$this->email->set_mailtype("html");
        $this->email->from($from_email, 'Cart in hour');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();	
		
		
			
    } 
	
public function verifyEmailID($key1)
    {
		//print_r($key1); exit;
        $data = array('status' => 1);
        $this->db->where('user_email', $key1);
        return $this->db->update('user', $data);
    }
	
public function getregstatus($email)
{
	
	$this->db->where('user_email',$email);
		$query = $this->db->get('user');
		//print_r($query->result()); exit;
		return $query->row();
	
	
}	
public function checkEmailExits($email)
	{
	$query = $this->db->query("select * from user where user_email='$email' and status=1");
	//echo  $this->db->last_query();
	return $query->result_array();
	}
	
public function updateforgotstatus($email)
{
	$data = array('forgot_status' => 1);
	$this->db->where('user_email', $email);
     return $this->db->update('user', $data);
	
	
	
}	

public function updateforgotstatus1($email)
{
	$data = array('forgot_status' => 0);
	$this->db->where('user_email', $email);
     return $this->db->update('user', $data);
	
	
	
}	

public function getforgotstatus($email)
{
	
	$this->db->where('user_email',$email);
		$query = $this->db->get('user');
		//print_r($query->result()); exit;
		return $query->row();
	
	
}


public function getsingleproduct($id)
{
	
	
	$this->db->where('item_id',$id);
		$query = $this->db->get('products');
		//print_r($query->result()); exit;
		return $query->row();
	
	
	
	
	
	
	
	
	
}


public function getmultipleimag($id)
{
	
$this->db->where('product_id',$id);
		$query = $this->db->get('products_imgs');
		//print_r($query->result()); exit;
		return $query->result();	
	
}


public function getsubcategoryid($id)
{
	//$this->db->select('subcategory_id');
	$this->db->where('item_id',$id);
		$query = $this->db->get('products');
		//print_r($query->result()); exit;
		return $query->row();	
	
	
	
	
	
	
}




public function getsimilarproducts($id)
{
	
$this->db->where('subcategory_id',$id);
		$query = $this->db->get('products');
		//print_r($query->result()); exit;
		return $query->result();
	
}

public function get_quickjump(){
	$this->db->select('COUNT(order_items.item_id) as count,products.item_id,products.category_id,products.subcategory_id,category.category_name,subcategories.subcategory_name')->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id', 'left');	
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id = products.category_id', 'left');	
	$this->db->where('products.item_status',1);
	$this->db->group_by('order_items.item_id');
	$this->db->order_by("COUNT(order_items.item_id)", "DESC");

	$this->db->limit(8);
	return $this->db->get()->result_array();
		/*$sql="SELECT COUNT(item_id), item_id FROM order_items GROUP BY item_id ORDER BY COUNT(item_id) DESC";
        return $this->db->query($sql)->result_array();*/
	
}
public function get_quickjump_details($subcatid){
	$this->db->select('*')->from('subcategories');
	$this->db->where('subcategory_id',$subcatid);
	return $this->db->get()->row_array();
		/*$sql="SELECT COUNT(item_id), item_id FROM order_items GROUP BY item_id ORDER BY COUNT(item_id) DESC";
        return $this->db->query($sql)->result_array();*/
	
}














	
	
}
	