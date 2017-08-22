<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customerapi_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}

	public function get_all_wish_lists_ids()
	{
		$this->db->select('*')->from('item_wishlist');
        return $this->db->get()->result_array();
	}
	public function get_search_functionality_products($areaid)
	{
	$this->db->select('products.item_id,products.item_name,products.yes')->from('products');
	//$this->db->where('item_name',$areaid);
	$this->db->like('item_name', $areaid);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 

	}
	public function get_search_functionality_sub_category($areaid)
	{
	$this->db->select('subcategories.category_id,subcategories.subcategory_id,subcategories.subcategory_name,subcategories.yes')->from('subcategories');
	$this->db->like('subcategory_name', $areaid);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 
	}
	public function login_customer($username,$password){

	$sql = "SELECT * FROM customers WHERE (cust_email ='".$username."' AND cust_password ='".md5($password)."') OR (cust_mobile ='".$username."' AND cust_password ='".md5($password)."')";
	return $this->db->query($sql)->row_array();
	}
	public function mobile_checking($username){

	$sql = "SELECT * FROM customers WHERE (cust_email ='".$username."') OR (cust_mobile ='".$username."')";
      return $this->db->query($sql)->row_array(); 
	}
	public function mobile_check($mobile){

		$sql="SELECT * FROM customers WHERE cust_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}

	public function save_customer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function get_customer_details($custid){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$custid);
		return $this->db->get()->row_array();
	}

	public function login_details($email){
		$sql = "SELECT * FROM customers WHERE (cust_email ='".$email."') OR (cust_mobile ='".$email."')";
	return $this->db->query($sql)->row_array();
	}

	public function set_customer_password($custid,$pass){
		$sql1="UPDATE customers SET cust_password ='".md5($pass)."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function oldpassword($cusid,$pass){
		$sql="SELECT * FROM customers WHERE customer_id ='".$cusid."' AND cust_password ='".md5($pass)."'";
        return $this->db->query($sql)->row_array(); 
	}

	public function forgot_otp($cust_id,$data){
		$this->db->where('customer_id',$cust_id);
		return $this->db->update('customers', $data);
	}
	public function save_customer_profile($cust_id,$data){
		$this->db->where('customer_id',$cust_id);
		return $this->db->update('customers', $data);
	}
	

	public function customer_details($cust_id){
		
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$cust_id);
		return $this->db->get()->row_array();
	}
	public function verifing_otp($custid,$otp){
		
		$sql1="UPDATE customers SET otp_verifiation_ok ='".$otp."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}

	public function get_locations_list()
	{
		$this->db->select('*')->from('locations');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}

	public function home_page_banners()
	{
		$this->db->select('*')->from('home_banner');
		$this->db->order_by('home_banner.image_id desc');
		$this->db->where('home_banner.home_page_status',1);
		$this->db->where('home_banner.preview_ok',1);
		return $this->db->get()->result_array();

	}

	public function top_offers_list()
	{
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('top_offers.*,products.*')->from('top_offers');
		$this->db->join('products', 'products.item_id = top_offers.item_id', 'left');
		$this->db->join('item_wishlist', 'item_wishlist.item_id = top_offers.item_id', 'left');
		$this->db->order_by('top_offers.offer_percentage desc');
		$this->db->where('top_offers.preview_ok',1);
		//$this->db->where('top_offers.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}

	public function deals_of_the_day_list()
	{
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('deals_ofthe_day.*,products.*')->from('deals_ofthe_day');
		$this->db->join('products', 'products.item_id = deals_ofthe_day.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('deals_ofthe_day.offer_percentage desc');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		//$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function season_sales_list()
	{
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('season_sales.offer_percentage desc');
		$this->db->where('season_sales.preview_ok',1);
		//$this->db->where('season_sales.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function treding_products_list()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function offers_for_you_list()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}

	public function getsingle_products($product_id){
		
		$this->db->select('products.*')->from('products');
		//$this->db->join('item_wishlist', 'item_wishlist.item_id = products.item_id', 'left'); //
		$this->db->where('products.item_id',$product_id);
		$this->db->where('products.admin_status',0);
		return $this->db->get()->row_array();
	}
	public function get_subcategorie_items($sub_id)
	{
	
	$this->db->select('products.*')->from('products');
	$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');	
	$this->db->join('category', 'category.category_id =products.category_id', 'left');	
    $this->db->where('products.subcategory_id', $sub_id);
    $this->db->where('products.item_status', 1);
	return $this->db->get()->result_array();
		
	}
	public function store_review($review){
		
		$this->db->insert('reviews', $review);
		return $insert_id = $this->db->insert_id();
	}
	public function itemwise_reviews($item_id){
		
		$this->db->select('*')->from('reviews');
		$this->db->where('item_id',$item_id);
		return $this->db->get()->result_array();
	}

	public function wishlist_save($data)
	{
		
		$this->db->insert('item_wishlist', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function customer_wishlist_delete($cust_id,$wishlistid,$id){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  item_id = '".$wishlistid."' AND  id = '".$id."'";
		return $this->db->query($sql1);
	}

	public function get_customer_whishlists($cust_id){
		$this->db->select('item_wishlist.*,products.item_name,products.skuid,products.item_cost,products.offer_amount,products.item_image')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_customer_whishlists_count($cust_id){
		$this->db->select('COUNT(item_wishlist.item_id) as count')->from('item_wishlist');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->row_array();
	}

	public function get_category_products($category_id)
	{
		$this->db->select('products.*')->from('products');
		$this->db->join('category','category.category_id = products.category_id','left');
		$this->db->where('products.category_id', $category_id);
        return $this->db->get()->result_array();

	}

	public function get_categories()
	{
		$this->db->select('category.category_id,category.category_name,category.category_image,category.status')->from('category');
		$this->db->where('category.status',1);
		return $this->db->get()->result_array();
	}
	public function get_subcategories($sub_id)
	{
		$this->db->select('*')->from('subcategories');
		$this->db->where('category_id',$sub_id);
		//$this->db->where('subcategories.status',1);
		return $this->db->get()->result_array();
	}
	public function get_withoutsubcategories($cat_id,$sub_id)
	{
		$this->db->select('*')->from('products');
		//$this->db->where('category_id',$cat_id);
		$this->db->where('subcategory_id',$sub_id);
		return $this->db->get()->result_array();
		//$this->db->join('category', 'category.item_id = products.item_id', 'left');
	}

	/* location querys*/
	public function top_offers_product_search($location_id){
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('products.*,top_offers.*')->from('products');
		$this->db->join('top_offers', 'top_offers.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('top_offers.preview_ok',1);
		//$this->db->where('top_offers.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function deals_of_the_day_product_search($location_id){
		// $date = new DateTime("now");
 	// 	$curr_date = $date->format('Y-m-d');
		// $this->db->select('products.*,deals_ofthe_day.*')->from('products');
		// $this->db->join('deals_ofthe_day', 'deals_ofthe_day.item_id = products.item_id', 'left');
		// $this->db->where_in('deals_ofthe_day.area',$location_id);
		// $this->db->where('admin_status','0');
		// $this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		// $this->db->order_by('products.offer_percentage desc');
		// return $this->db->get()->result_array();
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('products.*,deals_ofthe_day.*')->from('products');
		$this->db->join('deals_ofthe_day', 'deals_ofthe_day.item_id = products.item_id', 'left');
		//$this->db->join('top_offers', 'top_offers.area = products.item_id', 'left');
		//$this->db->join('reviews', 'reviews.item_id = top_offers.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		//$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function season_sales_product_search($location_id){
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('products.*,season_sales.*')->from('products');
		$this->db->join('season_sales', 'season_sales.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where_in('area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->where('season_sales.preview_ok',1);
		//$this->db->where('season_sales.expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function treanding_product_search($location_id){
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('products.*')->from('products');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function offers_for_you_product_search($location_id){
		//$date = new DateTime("now");
 		//$curr_date = $date->format('Y-m-d');
		$this->db->select('products.*')->from('products');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}

	public function get_product_details($itemid){
		$this->db->select('products.*,subcategories.commission')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type,products.offer_expairdate,products.offer_time')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_products_list($cust_id){
		$this->db->select('*')->from('cart');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_products_list_count($cust_id){
		$this->db->select('COUNT(cart.cust_id)AS count')->from('cart');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->row_array();
	}
	public function get_wish_list_products($cust_id){
		$this->db->select('item_wishlist.*')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function cart_products_save($data){
		$this->db->insert('cart', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function temp_cart($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function update_cart_item_quentity($cust_id,$item_id,$cart_id,$data){
	
		 $this->db->where('cust_id',$cust_id);
		 $this->db->where('item_id',$item_id);
		 $this->db->where('id',$cart_id);
    	return $this->db->update("cart",$data);
	}
	public function delete_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function forgot_login($email){
	$sql = "SELECT * FROM customers WHERE (cust_email ='".$email."') OR (cust_mobile ='".$email."')";
	return $this->db->query($sql)->row_array();		
	}
	public function login_verficationcode_mobile_save($mobile,$cid,$vericiationcode){
		$sql1="UPDATE customers SET forgot_verification ='".$vericiationcode."' WHERE cust_mobile = '".$mobile."' AND customer_id = '".$cid."'";
       	return $this->db->query($sql1);
	}
		public function login_verficationcode_save($email,$cid,$vericiationcode){
		$sql1="UPDATE customers SET forgot_verification ='".$vericiationcode."' WHERE cust_email = '".$email."' AND customer_id = '".$cid."'";
       	return $this->db->query($sql1);
	}
	public function check_opt_mobile($cus_id,$otp){
		$sql = "SELECT * FROM customers WHERE customer_id ='".$cus_id."' AND forgot_verification ='".$otp."'";
        return $this->db->query($sql)->row_array();
	}
	public function update_password($pass,$cust_id){
		$sql1="UPDATE customers SET cust_password ='".md5($pass)."' WHERE customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function update_password_remove_otp($cust_id,$data){
		$sql1="UPDATE customers SET forgot_verification ='".$data."' WHERE customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function order_list($cust_id){
		$this->db->select('order_items.*,orders.transaction_id,products.item_name,products.item_description,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
		$this->db->where('order_items.customer_id', $cust_id);
		return $this->db->get()->result_array();
	}


}