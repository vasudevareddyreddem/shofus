<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}
	public function get_location_list(){
		$this->db->select('*')->from('locations');
		return $this->db->get()->result_array();
	}
	public function save_catrgore($data)
	{
		
		$this->db->insert('category', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_oldcategoreis_seller_categories($sid)
	{
	
	$this->db->select('*')->from('category');
	$this->db->where('seller_id',$sid);
	return $this->db->get()->result_array();
	}
	public function get_categories_list($sid)
	{
	
	$this->db->select('*')->from('category');
	return $this->db->get()->result_array();
	}
	public function get_subcategories_list($categoryid)
	{
	
	$this->db->select('*')->from('subcategories');
	$this->db->where('category_id',$categoryid);
	return $this->db->get()->result_array();
	}
	public function get_subcategory_product_list($sid,$subcategory_id)
	{ 
		$this->db->select('*')->from('products');
		$this->db->where('seller_id',$sid);
		$this->db->where('subcategory_id',$subcategory_id);
		return $this->db->get()->result_array();
	}
	function delet_get_cat_seller_categories($catid)
	{
			$sql1="DELETE FROM category WHERE category_id = '".$catid."'";
		return $this->db->query($sql1);
	}
	public function resend_otp($sid,$data){
		$this->db->where('seller_id',$sid);
		return $this->db->update('sellers', $data);
	}
	public function seller_register($data){
		$this->db->insert('sellers', $data);
	 return $insert_id = $this->db->insert_id();
	}
	public function get_seller_details($sid){
		
		$this->db->select('*')->from('sellers');
		$this->db->where('seller_id',$sid);
		return $this->db->get()->row_array();
	}
	public function insert_seller_cat($data){
		$this->db->insert('seller_categories', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function seller_id_nsert($data){
		$this->db->insert('seller_store_details', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_store_details($sid,$data){
		$this->db->where('seller_id',$sid);
		return $this->db->update('seller_store_details', $data);
	}
	public function save_personal_details($sid,$data){
		$this->db->where('seller_id',$sid);
		return $this->db->update('sellers', $data);
	}
	function get_upload_file($seller_id)
	{
	$this->db->select('*')->from('seller_store_details');
	$this->db->where('seller_id',$seller_id);
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
	
	function get_categories_name($cat_id)
	{
	$this->db->select('category.category_name')->from('category');
	$this->db->where('category_id',$cat_id);
	return $this->db->get()->row_array();
	}
	public function verifing_mobile($sid,$otp){
		
		$sql1="UPDATE sellers SET verifiation_yes ='".$otp."' WHERE seller_id = '".$sid."'";
       	return $this->db->query($sql1);
	}
	public function seller_mobile_check($mobile){
		 $sql = "SELECT seller_mobile FROM sellers WHERE seller_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array();
		
	}
	 public function seller_email_check($email){
	 	 $sql = "SELECT seller_email FROM sellers WHERE seller_email ='".$email."'";
         return $this->db->query($sql)->row_array();
		
	 }

	public function seller_login_check($username, $password) {
	 	$sql = "SELECT * FROM sellers WHERE (seller_email ='".$username."' AND seller_password ='".$password."') OR (seller_mobile ='".$username."' AND seller_password ='".$password."')";
	 		return $this->db->query($sql)->row_array();
	}
	public function get_category_list()
	{
		$this->db->select('*')->from('category');
		return $this->db->get()->result_array();	
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
	
	
	
	/* seller category purpose*/
	public function getcatsubcatpro($sid)

{
	
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
	$this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$sid);
	$this->db->group_by('category.category_name');
	$query = $this->db->get();
	 foreach ($query->result() as $category)
        {
            $return[$category->category_id] = $category;

        $return[$category->category_id]->docs = $this->get_catedata($category->category_id,$sid);
        

        
    }
     if(!empty($return))
    {
    return $return;
}
	
	
}

public function get_catedata($category_id,$sid)
{
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
   $this->db->where('products.category_id', $category_id);
    $this->db->where('products.seller_id', $sid);
	$this->db->group_by('subcategories.subcategory_name');
    $query = $this->db->get();
     foreach ($query->result() as $subcategory)
        {
            $return[$subcategory->subcategory_id] = $subcategory;

        $return[$subcategory->subcategory_id]->docs12 = $this->get_subcatedata($subcategory->subcategory_id,$sid);
    }
     if(!empty($return))
    {
    return $return;
}
	
	
}


public function get_subcatedata($subcategory_id ,$sid)
{
	
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

	


//store details 
	
	function seller_store_details($id,$data){
		
		
			$this->db->where('seller_id',$id);
			$query =  $this->db->update('seller_store_details', $data);
			return $query;

		}


	//seller_personal_details
	function seller_personal_details($id,$data){
		$this->db->where('seller_id',$id);
    	$query =  $this->db->update("sellers",$data);
    	return $query;

	}

	//update_stepone
	public function update_step_one($id,$stepone)
	{

		$this->db->where('seller_id',$id);
		$query =  $this->db->update('sellers', $stepone);
		return $query;
	}
	//update_stepthree
	public function update_step_three($id,$stepthree)
	{
		$this->db->where('seller_id',$id);		
		$query =$this->db->update('seller_store_details', $stepthree);
		return  $query;

	}
	//update_stepfour
	public function update_step_four($id,$data)
{
		
	$this->db->where('seller_id',$id);
	$query=$this->db->update('sellers',$data);
	return $query; 
	
}


	//seller_categories
	 public function insertseller_cat($id,$seller_category)
	{	
		$this->db->where('seller_id',$id);
		$query= $this->db->insert('seller_categories', $seller_category);
		//return $this->db->last_query();
		return $query->result_array();
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

public function listing_category($id){
	$this->db->select('products.seller_id,products.category_id,category.category_name');
	$this->db->from('products');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$id);
	$query = $this->db->get();
	return $query->result_array();

}
public function listing_sub_all($id)

{	
	$this->db->select('products.seller_id,products.category_id,subcategories.subcategory_name,products.item_id,products.item_name,products.item_code,products.item_description,products.item_quantity,products.item_cost,products.item_image,products.item_status');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id',$id);
	$query = $this->db->get();
	return $query->result_array();
}


//track _approval
public function track_approval($id)
{
	$this->db->select('*');
	$this->db->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id =products.subcategory_id');
   $this->db->join('category', 'category.category_id =products.category_id');
	$this->db->where('products.seller_id', $id);
		$query=$this->db->get();
		return $query->result();
	
}

//total_orders
public function get_total($id){
	$this->db->select('*');
	$this->db->from('orders');
	$this->db->where('orders.seller_id',$id);
	$query=$this->db->get();
	return $query->result();
	}
	//assigned_orders
public function assigned_orders($id)
{
	$this->db->select('sellers.seller_id,orders.order_id,orders.item_id,orders.product_name,deliveryboy.deliveryboy_name,sellers.seller_name,orders.delivery_date,orders.delivery_time,orders.customer_name,orders.customer_email,orders.customer_phone,orders.customer_address');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->join('deliveryboy', 'deliveryboy.deliveryboy_id = assign_orders.deliveryboy_id');
	$this->db->where('orders.order_status','1');
	$this->db->where('orders.seller_id', $id);
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	//return $this->db->last_query(); exit;
	return $query->result();
}
//inprogress_orders
public function inprogress_orders($id)
{
	$this->db->select('sellers.seller_id,orders.order_id,orders.item_id,orders.product_name,deliveryboy.deliveryboy_name,sellers.seller_name,orders.delivery_date,orders.delivery_time,orders.customer_name,orders.customer_email,orders.customer_phone,orders.customer_address');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->join('deliveryboy', 'deliveryboy.deliveryboy_id = assign_orders.deliveryboy_id');
	$this->db->where('orders.order_status','2');
	$this->db->where('orders.seller_id', $id);
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}
//delivery_orders
public function delivery_orders($id)
{
	$this->db->select('sellers.seller_id,orders.order_id,orders.item_id,orders.product_name,deliveryboy.deliveryboy_name,sellers.seller_name,orders.delivery_date,orders.delivery_time,orders.customer_name,orders.customer_email,orders.customer_phone,orders.customer_address,assign_orders.pickup_time,assign_orders.delivered_time,orders.payment_mode');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->join('deliveryboy', 'deliveryboy.deliveryboy_id = assign_orders.deliveryboy_id');
	$this->db->where('orders.order_status','3');
	$this->db->where('orders.seller_id', $id);
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
		//return $this->db->last_query(); exit;
	return $query->result();
}
//cancel_orders
public function cancel_orders($id)
{
	$this->db->select('sellers.seller_id,orders.order_id,orders.item_id,orders.product_name,deliveryboy.deliveryboy_name,sellers.seller_name,orders.delivery_date,orders.delivery_time,orders.customer_name,orders.customer_email,orders.customer_phone,orders.customer_address');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->join('deliveryboy', 'deliveryboy.deliveryboy_id = assign_orders.deliveryboy_id');
	$this->db->where('orders.order_status','4');
	$this->db->where('orders.seller_id', $id);
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}

//seller_payments
public function payment_details($id)
	{
	$this->db->select('*');
	$this->db->from('seller_payments');
	$this->db->where('seller_id',$id);
	$query = $this->db->get();
	return $query->result();
	}
//seller name

	public function seller_name($id)
	{
	$this->db->select('sellers.seller_name');
	$this->db->from('sellers');
	$this->db->where('seller_id',$id);
	$query = $this->db->get();
	return $query->result_array();
	}
	//save services
	public function services_save($service)
	{
		//$this->db->where('seller_id',$id);
		$query= $this->db->insert('request_for_services', $service);
		return $query;	
	}
	
	

		

}

