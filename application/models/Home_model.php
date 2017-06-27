<?php

defined('BASEPATH') OR exit('No direct script access allowed');



 

class Home_model extends CI_Model

{

    function __construct()

    {

        // Call the Model constructor

        parent::__construct();

    }    

	
	public function get_search_functionality_products($areaid)
	{
	$this->db->select('products.url,products.item_id,products.item_name,')->from('products');
	//$this->db->where('item_name',$areaid);
	$this->db->like('item_name', $areaid);
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
	public function get_search_functionality_sub_category($areaid)
	{
	$this->db->select('*')->from('subcategories');
	$this->db->like('subcategory_name', $areaid);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 
	}
	public function get_search_top_offers($areaid)
	{
		$this->db->select('*')->from('products');
        $this->db->where('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(8);
		return $this->db->get()->result_array();

	}
	public function get_search_trending_products($areaid)
	{
		$this->db->select('*')->from('products');
        $this->db->where('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	public function get_search_offer_for_you($areaid)
	{
		$this->db->select('*')->from('products');
        $this->db->where('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	public function get_search_deals_of_the_day($areaid)
	{
		$this->db->select('*')->from('products');
        $this->db->where('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	public function get_search_season_sales($areaid)
	{
		$this->db->select('*')->from('products');
        $this->db->where('seller_location_area',$areaid);
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	public function get_top_offers()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(8);
		return $this->db->get()->result_array();

	}
	public function get_trending_products()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();

	}
	public function get_offer_for_you()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();

	}
	public function get_deals_of_the_day()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();

	}
	public function get_season_sales()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(5);
		return $this->db->get()->result_array();

	}
	
	public function Search_functionality($searchvalue)
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
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
	
	public function getcatsubcatpro()

	{
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
	$this->db->join('category', 'category.category_id =products.category_id');
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	//echo '<pre>';print_r($query);exit;
	foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_catedata($category->category_id);
        

        
    };
     if(!empty($return))
    {
    return $return;
}
	
	
}
public function get_catedata($category_id)
{
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('products.category_id', $category_id);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
   foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_subcatedata($subcategory->subcategory_id);
        
	}
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
	//$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
    
    return $query->result();
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
















	
	
}
	