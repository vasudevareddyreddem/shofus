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
	$this->db->select('products.item_id,products.item_name,products.ram,products.colour,products.internal_memeory,products.yes')->from('products');
	$this->db->where('item_status',1);
	$this->db->like('item_name', $areaid);
	return $this->db->get()->result_array();
	//echo $this->db->last_query();exit; 

	}
	public function get_search_functionality_sub_category($areaid)
	{
	$this->db->select('subcategories.category_id,subcategories.subcategory_id,subcategories.subcategory_name,subcategories.yes')->from('subcategories');
	$this->db->like('subcategory_name', $areaid);
	$this->db->where('status',1);
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
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('top_offers.*,products.*')->from('top_offers');
		$this->db->join('products', 'products.item_id = top_offers.item_id', 'left');
		$this->db->join('item_wishlist', 'item_wishlist.item_id = top_offers.item_id', 'left');
		$this->db->order_by('top_offers.offer_percentage desc');
		$this->db->where('top_offers.preview_ok',1);
		$this->db->where('top_offers.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}

	public function deals_of_the_day_list()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('deals_ofthe_day.*,products.*')->from('deals_ofthe_day');
		$this->db->join('products', 'products.item_id = deals_ofthe_day.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('deals_ofthe_day.offer_percentage desc');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function season_sales_list()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('season_sales.offer_percentage desc');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
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
		$this->db->select('item_wishlist.*,products.item_name,products.item_cost,products.special_price,products.offer_percentage,products.item_status,products.item_quantity,products.offer_amount,products.offer_expairdate,products.item_image')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
		$this->db->order_by('item_wishlist.id desc');
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
		$this->db->select('category.category_id,category.category_name,category.category_image,category.status')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left');
		$this->db->where('category.status',1);
		$this->db->group_by('products.category_id');
		return $this->db->get()->result_array();
	}
	public function get_subcategories($sub_id)
	{
		$this->db->select('subcategories.*')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->where('products.category_id',$sub_id);
		$this->db->where('subcategories.status',1);
		$this->db->group_by('products.subcategory_id');
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
	public function top_offers_product_search(){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,top_offers.*')->from('products');
		$this->db->join('top_offers', 'top_offers.item_id = products.item_id', 'left');
		$this->db->where('admin_status','0');
		$this->db->where('top_offers.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('top_offers.expairdate >=', $curr_date);
		$this->db->order_by('top_offers.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function deals_of_the_day_product_search(){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,deals_ofthe_day.*')->from('products');
		$this->db->join('deals_ofthe_day', 'deals_ofthe_day.item_id = products.item_id', 'left');
		$this->db->where('admin_status','0');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		$this->db->order_by('deals_ofthe_day.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function season_sales_product_search(){
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('products.*,season_sales.*')->from('products');
		$this->db->join('season_sales', 'season_sales.item_id = products.item_id', 'left');
		$this->db->where('admin_status','0');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('products.item_status',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
		$this->db->order_by('season_sales.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function treanding_product_search(){
	
		$this->db->select('products.*')->from('products');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
		
		
	}
	
	
	public function offers_for_you_product_search(){
	$this->db->select('products.*')->from('products');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->result_array();
		
	}
	
	public function get_trendingproduct_details($id){
		 $this->db->select('products.*')->from('products');
		$this->db->where_in('item_id',$id);
		$this->db->order_by('products.offer_percentage desc');
		$this->db->where('products.item_status',1);
		return $this->db->get()->row_array();
	}

	public function get_product_details($itemid){
		$this->db->select('products.*,subcategories.commission')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function get_product_color_details($itemid){
		$this->db->select('*')->from('product_color_list');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->result_array();
	}
	public function get_product_size_details($itemid){
		$this->db->select('*')->from('product_size_list');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->result_array();
	}
	public function get_product_uksize_details($itemid){
		$this->db->select('*')->from('product_uksize_list');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->result_array();
	}
	public function get_product_specification_details($itemid){
		$this->db->select('*')->from('product_spcifications');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->result_array();
	}

	public function get_cart_products_list($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_cost,products.item_status,products.item_quantity,products.offer_amount,products.offer_expairdate,products.special_price,products.offer_percentage,products.item_image')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
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
	public function forgot_customer_id($cid){
	$sql = "SELECT * FROM customers WHERE customer_id ='".$cid."'";
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
		$this->db->select('order_items.*,orders.transaction_id,products.item_name,products.description,products.colour,products.ram,products.internal_memeory,products.item_image,seller_store_details.store_name')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->where('order_items.customer_id', $cust_id);
		$this->db->order_by('order_items.order_item_id desc');
		return $this->db->get()->result_array();
	}
	public function product_details($itemid){
		$this->db->select('products.*')->from('products');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function all_product_details($itemid){
		$this->db->select('products.*,seller_store_details.store_name')->from('products');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function all_product_description($itemid){
		$this->db->select('descrotion_list.description,descrotion_list.image')->from('descrotion_list');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->result_array();
	}
	public function get_order_items_lists($custid){
			$this->db->select('order_items.*')->from('order_items');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			return $this->db->get()->result_array();
	}
	public function get_profile_details($custid){
		$this->db->select('customers.*,locations.location_name')->from('customers');
		$this->db->join('locations', 'locations.location_id = customers.area', 'left');
		$this->db->where('customers.customer_id',$custid);
		return $this->db->get()->row_array();
	}
	public function get_order_items_list($custid,$order_id){
			$this->db->select('order_items.*,products.category_id,products.subcategory_id,products.item_name,orders.card_number,orders.discount,orders.payment_type,orders.card_number,orders.payment_mode,order_status.status_id,order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,(order_status.create_time)AS createedattime,(order_status.update_time)AS updatetime,billing_address.name,billing_address.mobile,billing_address.emal_id,billing_address.address1,billing_address.address2,locations.location_name,seller_store_details.store_name,products.item_image')->from('order_items');
			$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
			$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
			$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			$this->db->where('order_items.order_item_id', $order_id);
			return $this->db->get()->row_array();
	}
	public function save_review($data){
		
		$this->db->insert('reviews', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_rating($data){
		
		$this->db->insert('ratings', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_order_items_track_list($custid){
			$this->db->select('order_items.*,products.item_name,orders.card_number,orders.discount,orders.card_number,orders.payment_mode,orders.payment_type,order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,(order_status.create_time)AS createedattime,(order_status.update_time)AS updatetime,billing_address.name,billing_address.mobile,billing_address.emal_id,billing_address.address1,billing_address.address2,locations.location_name,seller_store_details.store_name')->from('order_items');
			$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
			$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
			$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
			$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
			$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
			$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
			$this->db->where('order_items.customer_id', $custid);
			$this->db->order_by('order_items.order_item_id desc');
			return $this->db->get()->result_array();
	}
	
	public function save_order_success($data){
		$this->db->insert('orders', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.product_code,products.colour,products.ram,products.internal_memeory,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type,products.offer_expairdate,products.offer_time,products.item_quantity,sellers.seller_mobile,sellers.seller_email')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_item_details($itemid){
		$this->db->select('products.item_quantity')->from('products');		
		$this->db->where('item_id', $itemid);
		return $this->db->get()->row_array();
	}
	public function update_tem_qty_after_purchasingorder($itemid,$qty,$sellerid){
		$sql1="UPDATE products SET item_quantity ='".$qty."' WHERE item_id = '".$itemid."' AND seller_id = '".$sellerid."' ";
       	return $this->db->query($sql1);
	}
	public function save_order_items_list($data){
		$this->db->insert('order_items', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_item_status_list($data){
		$this->db->insert('order_status', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_billing_address($data){
		$this->db->insert('billing_address', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function after_payment_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_order_items($order_id){
		$this->db->select('order_items.*,products.item_name,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->where('order_items.order_id', $order_id);
		return $this->db->get()->result_array();
	}
	public function get_successorder_total_amount($order_id){
		$sql="SELECT SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM order_items  WHERE order_id ='".$order_id."'";
        return $this->db->query($sql)->row_array();
	}
	public function save_searchdata($data){
		
		$this->db->insert('fliter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_search_all_subcategory_products()
	{
	
	$this->db->select('fliter_search.*')->from('fliter_search');
	$this->db->group_by('fliter_search.cusine');
	$this->db->group_by('fliter_search.restraent');
	$this->db->group_by('fliter_search.mini_amount');
	$this->db->group_by('fliter_search.max_amount');
	$this->db->group_by('fliter_search.offers');
	$this->db->group_by('fliter_search.brand');
	$this->db->group_by('fliter_search.discount');
	$this->db->group_by('fliter_search.status');
	$this->db->group_by('fliter_search.size');
	$this->db->group_by('fliter_search.color');
	$querys=$this->db->get()->result_array();
		foreach ($querys as $listing){
			if($listing['brand']!=''){
			$brand[] = $listing['brand'];	
			}
			if($listing['offers']!=''){
			$offers[] =$listing['offers'];
			
			}if($listing['discount']!=''){
			$discount[] =$listing['discount'];
			
			}
			if($listing['color']!=''){
			$color[] =$listing['color'];
			
			}
			$minamount = $listing['mini_amount'];
			$maxamount = $listing['max_amount'];
			$catid = $listing['category_id'];
			
		}
		
		if(isset($brand) && count($brand)>0 ){
			$brands=implode ('","', $brand );
		}else{
		$brands='NULL';

		}
		if(isset($offers) && count($offers)>0){
			$offerss=implode('","', $offers);
		}else{
		$offerss='NULL';
		}
		if(isset($discount) && count($discount)>0 ){
			$discount=implode('","', $discount);
		}else{
		$discount='NULL';
		}
		if(isset($color) && count($color)>0 ){
			$color=implode('","', $color);
		}else{
		$color='NULL';
		}
		$data['list'][] = $this->category_wise_filters_search($brands,$discount,$offerss,$color,$minamount,$maxamount,$catid);
		//echo $this->db->last_query();exit;
		if(!empty($data))
		{
		return $data; 
		}
		
	}
	public function category_wise_filters_search($b,$d,$f,$c,$min,$max,$cid){
		$min_amt=(($min)-1);
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$this->db->select('*')->from('products');
		$this->db->where('item_cost <=', $max);
		$this->db->where('item_cost >=', $min_amt);
		if($b!='NULL'){
			$this->db->where_in('brand','"'.$b.'"',false);
		
		}if($f!='NULL'){
				//$this->db->where_in('offer_percentage','"'.$f.'"',false);
				$this->db->where_in('if(`offer_expairdate`>="$curr_date",`offer_percentage`,`offers` )', '"'.$f.'"', false);

		}if($d!='NULL'){
			//$this->db->where_in('discount','"'.$d.'"',false);
				$this->db->where_in('if(`offer_expairdate`>="$curr_date",`offer_amount`,`discount` )', '"'.$d.'"', false);

		}
		if($c!='NULL'){
			$this->db->where_in('colour','"'.$c.'"',false);
		}
		
		$this->db->where('item_status',1);
		$this->db->where('category_id',$cid);
		$this->db->order_by('products.item_cost','DESC');

		
		return $this->db->get()->result_array();
	}
	public function get_cusinelist($cus,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		//$this->db->where_in('cusine',$cusine);
		$this->db->where('cusine', $cus);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_restraentlist($res,$cid){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		//$this->db->where_in('cusine',$cusine);
		$this->db->where('seller_id', $res);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_offersapi($offer,$cid,$status){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
		$this->db->where('offers',$offer);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_cusineapi($cusine,$cid){
		
		//echo $cusine;exit;
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		//$this->db->where_in('cusine',$cusine);
		$this->db->where('cusine', $cusine);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_restraentapi($restraent,$cid){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('seller_id',$restraent);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_brandsapi($brand,$cid,$status){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
		$this->db->where('brand',$brand);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_discountsapi($discount,$cid,$status){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',$status);
		$this->db->where('discount',$discount);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_sizesapi($size,$cid){
		
		$this->db->select('products.*')->from('product_size_list');
		$this->db->join('products', 'products.item_id = product_size_list.item_id', 'left'); //
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name',$size);
		$this->db->where('products.category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_colorsapi($color,$cid,$status){
		
		$this->db->select('products.*')->from('products');
		$this->db->where('products.item_status',$status);
		$this->db->where('products.colour',$color);
		$this->db->where('products.category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_statusapi($status,$cid){
		$this->db->select('*')->from('products');
		if($status!=0){
			$this->db->where('item_quantity !=',0);
			$this->db->where('item_status',1);
		}else{
		$this->db->where('item_quantity=',0);
		$this->db->where('item_status',1);		
		}
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	public function get_amountapi($min_amunt,$max_amount,$cid,$status){
		
		$min_amt=(($min_amunt)+1);
		$sql = "SELECT * FROM products WHERE category_id ='".$cid."' AND item_status ='".$status."' AND  item_cost BETWEEN '".$min_amt."' AND '".$max_amount."'";
		return $this->db->query($sql)->result_array();
		//echo $this->db->last_query();exit;
	}
		public function update_amount_privous_searchdata($min,$max,$id,$status)
	{
		$sql1="UPDATE fliter_search SET mini_amount ='".$min."', max_amount ='".$max."', status ='".$status."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_all_previous_search_fields($ipadd)
	{
		$this->db->select('*')->from('fliter_search');
		$this->db->where('Ip_address',$ipadd);
		return $this->db->get()->result_array();
	}
	public function get_all_previous_search_fields_withip($ip,$cid)
	{
		$this->db->select('*')->from('fliter_search');
		$this->db->where('Ip_address',$ip);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_all_cusine_list($catid)
	{
	
		$this->db->select('products.cusine')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('cusine!=','');
		$this->db->group_by('cusine');
		return $this->db->get()->result_array();
		
	}
	public function get_all_myrestaurant_list($catid)
	{
		$this->db->select('sellers.seller_name,sellers.seller_id')->from('products');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('products.seller_id!=','');
		$this->db->group_by('products.seller_id');
		return $this->db->get()->result_array();
	}
	public function get_all_color_list($catid){
		$this->db->select('product_color_list.color_name')->from('products');
		$this->db->join('product_color_list', 'product_color_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_color_list.color_name!=','');
		$this->db->group_by('product_color_list.color_name');
		return $this->db->get()->result_array();
	}
	public function get_all_size_list($catid){
		$this->db->select('product_size_list.p_size_name')->from('products');
		$this->db->join('product_size_list', 'product_size_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name!=','');
		$this->db->group_by('product_size_list.p_size_name');
		return $this->db->get()->result_array();
	}
	public function get_all_brand_list($catid){
		
		$this->db->select('products.brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('brand!=','');
		$this->db->group_by('brand');
		return $this->db->get()->result_array();
		
	}
	public function get_all_colours_list($catid){
		
		$this->db->select('(products.colour) as color_name')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('colour!=','');
		$this->db->group_by('colour');
		return $this->db->get()->result_array();
		
	}

	public function get_all_price_list($catid)
	{
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
		public function get_all_discount_list($catid)
	{
		$this->db->select('products.discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();
	}
	public function get_all_avalibility_list($catid)
	{
		$this->db->select('products.item_status')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('item_status',1);
		$this->db->where('item_quantity!=',0);
		return $this->db->get()->row_array();
	}
	public function get_all_offer_list($catid)
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d h:i:s A');
		$sql = "SELECT offer_percentage, offers, offer_expairdate  FROM `products` WHERE `category_id` = '".$catid."' AND `item_status` = 1 AND  offers!='' OR offer_percentage!=''";
		return $this->db->query($sql)->result_array();
	}
	public function get_subcategory_id_filterssearh($ip)
	{
		$this->db->select('fliter_search.category_id,fliter_search.Ip_address')->from('fliter_search');
		$this->db->where('fliter_search.Ip_address',$ip);
		$this->db->group_by('category_id');
		return $this->db->get()->result_array();
	}
	public function get_subcategory_iddata_filterssearh()
	{
		$this->db->select('subcat_wise_fliter_search.category_id,subcat_wise_fliter_search.subcategory_id,subcat_wise_fliter_search.Ip_address')->from('subcat_wise_fliter_search');
		$this->db->group_by('category_id');
		$this->db->group_by('subcategory_id');
		return $this->db->get()->result_array();
	}
	public function delete_privous_searchdata($id,$ipaddress)
	{
		$sql1="DELETE FROM fliter_search WHERE id = '".$id."' AND Ip_address ='".$ipaddress."'";
		return $this->db->query($sql1);
	}
	public function delete_subcategory_privous_searchdata($id,$ipaddress)
	{
		$sql1="DELETE FROM subcat_wise_fliter_search WHERE id = '".$id."' AND Ip_address ='".$ipaddress."'";
		return $this->db->query($sql1);
	}
	
	/* subcategorywise filters purpose*/
	public function get_all_cusine_list_sub($catid,$subcat)
	{
	
		$this->db->select('products.cusine')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('cusine!=','');
		$this->db->group_by('cusine');
		return $this->db->get()->result_array();
		
	}
	public function get_all_myrestaurant_list_sub($catid,$subcat)
	{
		$this->db->select('sellers.seller_name,sellers.seller_id')->from('products');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.subcategory_id',$subcat);
		$this->db->where('products.item_status',1);
		$this->db->where('products.seller_id!=','');
		$this->db->group_by('products.seller_id');
		return $this->db->get()->result_array();
	}
	public function get_all_price_list_sub($catid,$subcat)
	{
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('item_cost!=','');
		$this->db->group_by('item_cost');
		return $this->db->get()->result_array();
	}
	public function get_all_brand_list_sib($catid,$subcat)
	{
		$this->db->select('products.brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('brand!=','');
		$this->db->group_by('brand');
		return $this->db->get()->result_array();
	}
	public function get_all_discount_list_sub($catid,$subcat)
	{
	$this->db->select('products.discount')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('discount!=','');
		$this->db->group_by('discount');
		return $this->db->get()->result_array();
	}
	public function get_all_offer_list_sub($catid,$subcat)
	{
	$this->db->select('products.offers')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('offers!=','');
		$this->db->group_by('offers');
		return $this->db->get()->result_array();
	}
	public function get_all_color_list_sub($catid,$subcatid){
		$this->db->select('product_color_list.color_name')->from('products');
		$this->db->join('product_color_list', 'product_color_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.category_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_color_list.color_name!=','');
		$this->db->group_by('product_color_list.color_name');
		return $this->db->get()->result_array();
	}
	public function get_comatability_mobile_list($catid,$subcat)
	{
		$this->db->select('products.compatible_mobiles')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('compatible_mobiles!=','');
		$this->db->group_by('compatible_mobiles');
		return $this->db->get()->result_array();
		
	}
	public function get_type_mobile_list($catid,$subcat)
	{
		$this->db->select('products.producttype')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('producttype!=','');
		$this->db->group_by('producttype');
		return $this->db->get()->result_array();
		
	}
	public function get_mega_pixel_list($catid,$subcat)
	{
		$this->db->select('products.mega_pixel')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('mega_pixel!=','');
		$this->db->group_by('mega_pixel');
		return $this->db->get()->result_array();
	}
	public function get_sensor_type_list($catid,$subcat)
	{
		$this->db->select('products.sensor_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('sensor_type!=','');
		$this->db->group_by('sensor_type');
		return $this->db->get()->result_array();
	}
	public function get_battery_type_list($catid,$subcat)
	{
		$this->db->select('products.battery_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('battery_type!=','');
		$this->db->group_by('battery_type');
		return $this->db->get()->result_array();
	}
	public function get_display_size_list($catid,$subcat)
	{
		$this->db->select('products.display_size')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('display_size!=','');
		$this->db->group_by('display_size');
		return $this->db->get()->result_array();
		
	}
	public function get_conncetivity_list($catid,$subcat)
	{
		$this->db->select('products.connectivity')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('connectivity!=','');
		$this->db->group_by('connectivity');
		return $this->db->get()->result_array();
		
	}
	public function get_ram_list($catid,$subcat)
	{
		$this->db->select('products.ram')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ram!=','');
		$this->db->group_by('ram');
		return $this->db->get()->result_array();
		
	}
	public function get_voice_calling_facility_list($catid,$subcat)
	{
		$this->db->select('products.voice_calling_facility')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('voice_calling_facility!=','');
		$this->db->group_by('voice_calling_facility');
		return $this->db->get()->result_array();
		
	}
	public function get_os_list($catid,$subcat)
	{
		$this->db->select('products.operatingsystem')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('operatingsystem!=','');
		$this->db->group_by('operatingsystem');
		return $this->db->get()->result_array();
	}
	public function get_internal_storage_list($catid,$subcat)
	{
		$this->db->select('products.internal_storage')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('internal_storage!=','');
		$this->db->group_by('internal_storage');
		return $this->db->get()->result_array();
	}
	public function get_battery_capacity_list($catid,$subcat)
	{
		$this->db->select('products.battery_capacity')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('battery_capacity!=','');
		$this->db->group_by('battery_capacity');
		return $this->db->get()->result_array();
	}
		public function get_primary_camera_list($catid,$subcat)
	{
		$this->db->select('products.primary_camera')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('primary_camera!=','');
		$this->db->group_by('primary_camera');
		return $this->db->get()->result_array();
	}
	public function get_processor_clock_speed_list($catid,$subcat)
	{
		$this->db->select('products.processor_clock_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor_clock_speed!=','');
		$this->db->group_by('processor_clock_speed');
		return $this->db->get()->result_array();
	}
	public function get_wireless_speed_list($catid,$subcat)
	{
		$this->db->select('products.wireless_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('wireless_speed!=','');
		$this->db->group_by('wireless_speed');
		return $this->db->get()->result_array();
	}
	public function get_frequency_band_list($catid,$subcat)
	{
		$this->db->select('products.frequency_band')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('frequency_band!=','');
		$this->db->group_by('frequency_band');
		return $this->db->get()->result_array();
	}
	public function get_broadband_compatibility_list($catid,$subcat)
	{
		$this->db->select('products.broadband_compatibility')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('broadband_compatibility!=','');
		$this->db->group_by('broadband_compatibility');
		return $this->db->get()->result_array();
	}
	public function get_usb_ports_list($catid,$subcat)
	{
		$this->db->select('products.usb_ports')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('usb_ports!=','');
		$this->db->group_by('usb_ports');
		return $this->db->get()->result_array();
	}
	public function get_frequency_list_list($catid,$subcat)
	{
		$this->db->select('products.frequency')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('frequency!=','');
		$this->db->group_by('frequency');
		return $this->db->get()->result_array();
	}
	public function get_antennae_list($catid,$subcat)
	{
		$this->db->select('products.antennae')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('antennae!=','');
		$this->db->group_by('antennae');
		return $this->db->get()->result_array();
	}
	public function get_processor_list($catid,$subcat)
	{
		$this->db->select('products.processor')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor!=','');
		$this->db->group_by('processor');
		return $this->db->get()->result_array();
	}
	public function get_processor_brand_list($catid,$subcat)
	{
		$this->db->select('products.processor_brand')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('processor_brand!=','');
		$this->db->group_by('processor_brand');
		return $this->db->get()->result_array();
	}
	public function get_lifestyle_list($catid,$subcat)
	{
		$this->db->select('products.life_style')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('life_style!=','');
		$this->db->group_by('life_style');
		return $this->db->get()->result_array();
	}
	public function get_storage_type_list($catid,$subcat)
	{
		$this->db->select('products.storage_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('storage_type!=','');
		$this->db->group_by('storage_type');
		return $this->db->get()->result_array();
	}
	public function get_graphics_memory_list($catid,$subcat)
	{
		$this->db->select('products.graphics_memory')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('graphics_memory!=','');
		$this->db->group_by('graphics_memory');
		return $this->db->get()->result_array();
	}
	public function get_touch_screen_list($catid,$subcat)
	{
		$this->db->select('products.touch_screen')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('touch_screen!=','');
		$this->db->group_by('touch_screen');
		return $this->db->get()->result_array();
	}public function get_weight_list($catid,$subcat)
	{
		$this->db->select('products.weight')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('weight!=','');
		$this->db->group_by('weight');
		return $this->db->get()->result_array();
	}
	
	public function get_memory_type_list($catid,$subcat)
	{
		$this->db->select('products.memory_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('memory_type!=','');
		$this->db->group_by('memory_type');
		return $this->db->get()->result_array();
	}
	public function get_ram_typee_list($catid,$subcat)
	{
		$this->db->select('products.ram_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ram_type!=','');
		$this->db->group_by('ram_type');
		return $this->db->get()->result_array();
	}
	public function get_network_type_list($catid,$subcat)
	{
		$this->db->select('products.network_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('network_type!=','');
		$this->db->group_by('network_type');
		return $this->db->get()->result_array();
	}
		
	public function get_operating_system_version_name_list($catid,$subcat)
	{
		$this->db->select('products.operating_system_version_name')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('operating_system_version_name!=','');
		$this->db->group_by('operating_system_version_name');
		return $this->db->get()->result_array();
	}
	public function get_resolution_type_list($catid,$subcat)
	{
		$this->db->select('products.resolution_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('resolution_type!=','');
		$this->db->group_by('resolution_type');
		return $this->db->get()->result_array();
	}
	public function get_secondary_camera_list($catid,$subcat)
	{
		$this->db->select('products.secondary_camera')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('secondary_camera!=','');
		$this->db->group_by('secondary_camera');
		return $this->db->get()->result_array();
	}
	public function get_sim_type_list($catid,$subcat)
	{
		$this->db->select('products.sim_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('sim_type!=','');
		$this->db->group_by('sim_type');
		return $this->db->get()->result_array();
	}
	public function get_clock_speed_list($catid,$subcat)
	{
		$this->db->select('products.clock_speed')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('clock_speed!=','');
		$this->db->group_by('clock_speed');
		return $this->db->get()->result_array();
	}
	public function get_cores_list($catid,$subcat)
	{
		$this->db->select('products.cores')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('cores!=','');
		$this->db->group_by('cores');
		return $this->db->get()->result_array();
	}
	public function get_all_size_list_sub($catid,$subcatid){
		$this->db->select('product_size_list.p_size_name')->from('products');
		$this->db->join('product_size_list', 'product_size_list.item_id = products.item_id', 'left');	
		$this->db->where('products.category_id',$catid);
		$this->db->where('products.category_id',$subcatid);
		$this->db->where('products.item_status',1);
		$this->db->where('product_size_list.p_size_name!=','');
		$this->db->group_by('product_size_list.p_size_name');
		return $this->db->get()->result_array();
	}
	public function get_ideal_for_sub($catid,$subcat)
	{
		$this->db->select('products.ideal_for')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('ideal_for!=','');
		$this->db->group_by('ideal_for');
		return $this->db->get()->result_array();
	}
	public function get_theme_list($catid,$subcat)
	{
		$this->db->select('products.theme')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('theme!=','');
		$this->db->group_by('theme');
		return $this->db->get()->result_array();
	}
	
	public function get_dial_shape_list($catid,$subcat)
	{
		$this->db->select('products.dial_shape')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('dial_shape!=','');
		$this->db->group_by('dial_shape');
		return $this->db->get()->result_array();
	}
	public function get_compatibleos_list($catid,$subcat)
	{
		$this->db->select('products.compatibleos')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('compatibleos!=','');
		$this->db->group_by('compatibleos');
		return $this->db->get()->result_array();
	}
	public function get_usage_list($catid,$subcat)
	{
		$this->db->select('products.usage')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('usage!=','');
		$this->db->group_by('usage');
		return $this->db->get()->result_array();
	}
	public function get_display_type_list($catid,$subcat)
	{
		$this->db->select('products.display_type')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('display_type!=','');
		$this->db->group_by('display_type');
		return $this->db->get()->result_array();
	}
	public function get_occasion_list($catid,$subcat)
	{
		$this->db->select('products.occasion')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('occasion!=','');
		$this->db->group_by('occasion');
		return $this->db->get()->result_array();
	}
	public function get_material_list($catid,$subcat)
	{
		$this->db->select('products.material')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('material!=','');
		$this->db->group_by('material');
		return $this->db->get()->result_array();
	}
	public function get_gemstones_list($catid,$subcat)
	{
		$this->db->select('products.gemstones')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('gemstones!=','');
		$this->db->group_by('gemstones');
		return $this->db->get()->result_array();
	}
	public function get_strap_color_list($catid,$subcat)
	{
		$this->db->select('products.strap_color')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('strap_color!=','');
		$this->db->group_by('strap_color');
		return $this->db->get()->result_array();
	}
	
	public function get_dial_color_list($catid,$subcat)
	{
		$this->db->select('products.dial_color')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('dial_color!=','');
		$this->db->group_by('dial_color');
		return $this->db->get()->result_array();
	}
	public function get_packof_list($catid,$subcat)
	{
		$this->db->select('products.packof')->from('products');
		$this->db->where('category_id',$catid);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_status',1);
		$this->db->where('packof!=','');
		$this->db->group_by('packof');
		return $this->db->get()->result_array();
	}
	public function save_sub_searchdata($data){
		
		$this->db->insert('subcat_wise_fliter_search', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_search_all_subcategorywise_products()
	{
	
	$this->db->select('*')->from('subcat_wise_fliter_search');
	$this->db->group_by('subcat_wise_fliter_search.cusine');
	$this->db->group_by('subcat_wise_fliter_search.restraent');
	$this->db->group_by('subcat_wise_fliter_search.mini_amount');
	$this->db->group_by('subcat_wise_fliter_search.max_amount');
	$this->db->group_by('subcat_wise_fliter_search.offers');
	$this->db->group_by('subcat_wise_fliter_search.brand');
	$this->db->group_by('subcat_wise_fliter_search.discount');
	$this->db->group_by('subcat_wise_fliter_search.status');
	$this->db->group_by('subcat_wise_fliter_search.size');
	$this->db->group_by('subcat_wise_fliter_search.color');
	$this->db->group_by('subcat_wise_fliter_search.compatible_mobiles');
	$this->db->group_by('subcat_wise_fliter_search.producttype');
	$this->db->group_by('subcat_wise_fliter_search.mega_pixel');
	$this->db->group_by('subcat_wise_fliter_search.sensor_type');
	$this->db->group_by('subcat_wise_fliter_search.battery_type');
	$this->db->group_by('subcat_wise_fliter_search.display_size');
	$this->db->group_by('subcat_wise_fliter_search.connectivity');
	$this->db->group_by('subcat_wise_fliter_search.ram');
	$this->db->group_by('subcat_wise_fliter_search.voice_calling_facility');
	$this->db->group_by('subcat_wise_fliter_search.operatingsystem');
	$this->db->group_by('subcat_wise_fliter_search.internal_storage');
	$this->db->group_by('subcat_wise_fliter_search.battery_capacity');
	$this->db->group_by('subcat_wise_fliter_search.primary_camera');
	$this->db->group_by('subcat_wise_fliter_search.processor_clock_speed');
	$this->db->group_by('subcat_wise_fliter_search.wireless_speed');
	$this->db->group_by('subcat_wise_fliter_search.frequency_band');
	$this->db->group_by('subcat_wise_fliter_search.broadband_compatibility');
	$this->db->group_by('subcat_wise_fliter_search.usb_ports');
	$this->db->group_by('subcat_wise_fliter_search.frequency');
	$this->db->group_by('subcat_wise_fliter_search.antennae');
	$this->db->group_by('subcat_wise_fliter_search.processor');
	$this->db->group_by('subcat_wise_fliter_search.processor_brand');
	$this->db->group_by('subcat_wise_fliter_search.life_style');
	$this->db->group_by('subcat_wise_fliter_search.storage_type');
	$this->db->group_by('subcat_wise_fliter_search.graphics_memory');
	$this->db->group_by('subcat_wise_fliter_search.touch_screen');
	$this->db->group_by('subcat_wise_fliter_search.weight');
	$this->db->group_by('subcat_wise_fliter_search.memory_type');
	$this->db->group_by('subcat_wise_fliter_search.ram_type');
	$this->db->group_by('subcat_wise_fliter_search.network_type');
	$this->db->group_by('subcat_wise_fliter_search.speciality');
	$this->db->group_by('subcat_wise_fliter_search.operating_system_version_name');
	$this->db->group_by('subcat_wise_fliter_search.resolution_type');
	$this->db->group_by('subcat_wise_fliter_search.secondary_camera');
	$this->db->group_by('subcat_wise_fliter_search.sim_type');
	$this->db->group_by('subcat_wise_fliter_search.clock_speed');
	$this->db->group_by('subcat_wise_fliter_search.cores');
	$this->db->group_by('subcat_wise_fliter_search.theme');
	$this->db->group_by('subcat_wise_fliter_search.dial_shape');
	$this->db->group_by('subcat_wise_fliter_search.compatibleos');
	$this->db->group_by('subcat_wise_fliter_search.usages');
	$this->db->group_by('subcat_wise_fliter_search.display_type');
	$this->db->group_by('subcat_wise_fliter_search.occasion');
	$this->db->group_by('subcat_wise_fliter_search.ideal_for');
	$this->db->group_by('subcat_wise_fliter_search.material');
	$this->db->group_by('subcat_wise_fliter_search.gemstones');
	$this->db->group_by('subcat_wise_fliter_search.strap_color');
	$this->db->group_by('subcat_wise_fliter_search.dial_color');
	$this->db->group_by('subcat_wise_fliter_search.packof');
	$query=$this->db->get()->result_array();
		foreach ($query as $sorting){
			
			if($sorting['cusine']!=''){
				$return['cusine'] = $this->get_subcategorycusine($sorting['cusine'],$sorting['category_id'],$sorting['subcategory_id']);
			}
		
			if($sorting['restraent']!=''){
				$return['restraent'] = $this->get_subcategoryrestraent($sorting['restraent'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['offers']!=''){
			$return['offers'] = $this->get_subcategoryoffers($sorting['offers'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['brand']!=''){
			$return['brand'] = $this->get_subcategorybrand($sorting['brand'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['discount']!=''){
			$return['discount'] = $this->get_subcategorydiscount($sorting['discount'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['compatible_mobiles']!=''){
			$return['compatible_mobiles'] = $this->get_subcategorymobileacc($sorting['compatible_mobiles'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['producttype']!=''){
			$return['producttype'] = $this->get_subcategoryproducttype($sorting['producttype'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['mega_pixel']!=''){
			$return['mega_pixel'] = $this->get_subcategorymega_pixel($sorting['mega_pixel'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['sensor_type']!=''){
			$return['sensor_type'] = $this->get_subcategorysensor_type($sorting['sensor_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['battery_type']!=''){
			$return['battery_type'] = $this->get_subcategorybattery_type($sorting['battery_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['display_size']!=''){
			$return['display_size'] = $this->get_subcategorydisplay_size($sorting['display_size'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['connectivity']!=''){
			$return['connectivity'] = $this->get_subcategoryconnectivity($sorting['connectivity'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['voice_calling_facility']!=''){
			$return['voice_calling_facility'] = $this->get_subcategoryvoice_calling_facility($sorting['voice_calling_facility'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['ram']!=''){
			$return['ram'] = $this->get_subcategoryram($sorting['ram'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['operatingsystem']!=''){
			$return['operatingsystem'] = $this->get_subcategoryoperatingsystem($sorting['operatingsystem'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['internal_storage']!=''){
			$return['internal_storage'] = $this->get_subcategoryinternal_storage($sorting['internal_storage'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['battery_capacity']!=''){
			$return['battery_capacity'] = $this->get_subcategorybattery_capacity($sorting['battery_capacity'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['primary_camera']!=''){
			$return['primary_camera'] = $this->get_subcategoryprimary_camera($sorting['primary_camera'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor_clock_speed']!=''){
			$return['processor_clock_speed'] = $this->get_subcategoryprocessor_clock_speed($sorting['processor_clock_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['wireless_speed']!=''){
			$return['wireless_speed'] = $this->get_subcategorywireless_speed($sorting['wireless_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['frequency_band']!=''){
			$return['frequency_band'] = $this->get_subcategoryfrequency_band($sorting['frequency_band'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['broadband_compatibility']!=''){
			$return['broadband_compatibility'] = $this->get_subcategorybroadband_compatibility($sorting['broadband_compatibility'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['usb_ports']!=''){
			$return['usb_ports'] = $this->get_subcategoryusb_ports($sorting['usb_ports'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['frequency']!=''){
			$return['frequency'] = $this->get_subcategoryfrequency($sorting['frequency'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['antennae']!=''){
			$return['antennae'] = $this->get_subcategoryantennae($sorting['antennae'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor']!=''){
			$return['processor'] = $this->get_subcategoryprocessor($sorting['processor'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['processor_brand']!=''){
			$return['processor_brand'] = $this->get_subcategoryprocessor_brand($sorting['processor_brand'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['life_style']!=''){
			$return['life_style'] = $this->get_subcategorylife_style($sorting['life_style'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['storage_type']!=''){
			$return['storage_type'] = $this->get_subcategorystorage_type($sorting['storage_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['graphics_memory']!=''){
			$return['graphics_memory'] = $this->get_subcategorygraphics_memory($sorting['graphics_memory'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['touch_screen']!=''){
			$return['touch_screen'] = $this->get_subcategorytouch_screen($sorting['touch_screen'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['weight']!=''){
			$return['weight'] = $this->get_subcategoryweight($sorting['weight'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['memory_type']!=''){
			$return['memory_type'] = $this->get_subcategorymemory_type($sorting['memory_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['ram_type']!=''){
			$return['ram_type'] = $this->get_subcategoryram_type($sorting['ram_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['network_type']!=''){
			$return['network_type'] = $this->get_subcategorynetwork_type($sorting['network_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['speciality']!=''){
			$return['speciality'] = $this->get_subcategoryspeciality($sorting['speciality'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['operating_system_version_name']!=''){
			$return['operating_system_version_name'] = $this->get_subcategoryoperating_system_version_name($sorting['operating_system_version_name'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['resolution_type']!=''){
			$return['resolution_type'] = $this->get_subcategoryresolution_type($sorting['resolution_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['secondary_camera']!=''){
			$return['secondary_camera'] = $this->get_subcategorysecondary_camera($sorting['secondary_camera'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['sim_type']!=''){
			$return['sim_type'] = $this->get_subcategorysim_type($sorting['sim_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['clock_speed']!=''){
			$return['clock_speed'] = $this->get_subcategoryclock_speed($sorting['clock_speed'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['cores']!=''){
			$return['cores'] = $this->get_subcategorycores($sorting['cores'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['theme']!=''){
			$return['theme'] = $this->get_subcategorytheme($sorting['theme'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['dial_shape']!=''){
			$return['dial_shape'] = $this->get_subcategorydial_shape($sorting['dial_shape'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['compatibleos']!=''){
			$return['compatibleos'] = $this->get_subcategorycompatibleos($sorting['compatibleos'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['usages']!=''){
			$return['usages'] = $this->get_subcategoryusages($sorting['usages'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['display_type']!=''){
			$return['display_type'] = $this->get_subcategorydisplay_type($sorting['display_type'],$sorting['category_id'],$sorting['subcategory_id']);
			}if($sorting['occasion']!=''){
			$return['occasion'] = $this->get_subcategoryoccasion($sorting['occasion'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['ideal_for']!=''){
			$return['ideal_for'] = $this->get_subcategoryideal_for($sorting['ideal_for'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['material']!=''){
			$return['material'] = $this->get_subcategorymaterial($sorting['material'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['gemstones']!=''){
			$return['gemstones'] = $this->get_subcategorygemstones($sorting['gemstones'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['strap_color']!=''){
			$return['strap_color'] = $this->get_subcategorystrap_color($sorting['strap_color'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['dial_color']!=''){
			$return['dial_color'] = $this->get_subcategorydial_color($sorting['dial_color'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			if($sorting['packof']!=''){
			$return['packof'] = $this->get_subcategorypackof($sorting['packof'],$sorting['category_id'],$sorting['subcategory_id']);
			}
			
			
			$return['mini_amount'] = $this->get_subcategoryamount($sorting['mini_amount'],$sorting['max_amount'],$sorting['category_id'],$sorting['subcategory_id']);
			$return['status'] = $this->get_subcategorystatus($sorting['status'],$sorting['category_id'],$sorting['subcategory_id']);
			//echo $this->db->last_query();exit;
		}
		if(!empty($return))
		{
		return $return;
		}
		
	}
	/*sub*/
	public function get_subcategorypackof($packof,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('packof',$packof);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorydial_color($dial_color,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('dial_color',$dial_color);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorystrap_color($strap_color,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('strap_color',$strap_color);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorygemstones($gemstones,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('gemstones',$gemstones);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymaterial($material,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('material',$material);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryideal_for($ideal_for,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ideal_for',$ideal_for);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryoccasion($occasion,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('occasion',$occasion);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorydisplay_type($display_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('display_type',$display_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryusages($usages,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('usages',$usages);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorycompatibleos($compatibleos,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('compatibleos',$compatibleos);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorydial_shape($dial_shape,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('dial_shape',$dial_shape);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorytheme($theme,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('theme',$theme);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorycores($cores,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('cores',$cores);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryclock_speed($clock_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('clock_speed',$clock_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorysim_type($sim_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('sim_type',$sim_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorysecondary_camera($secondary_camera,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('secondary_camera',$secondary_camera);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryresolution_type($resolution_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('resolution_type',$resolution_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryoperating_system_version_name($operating_system_version_name,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('operating_system_version_name',$operating_system_version_name);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryspeciality($speciality,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('speciality',$speciality);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorynetwork_type($network_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('network_type',$network_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}	
	public function get_subcategoryram_type($ram_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ram_type',$ram_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymemory_type($memory_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('memory_type',$memory_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryweight($weight,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('weight',$weight);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorytouch_screen($touch_screen,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('touch_screen',$touch_screen);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorygraphics_memory($graphics_memory,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('graphics_memory',$graphics_memory);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorystorage_type($storage_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('storage_type',$storage_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorylife_style($life_style,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('life_style',$life_style);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor_brand($processor_brand,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor_brand',$processor_brand);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor($processor,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor',$processor);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryantennae($antennae,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('antennae',$antennae);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryfrequency($frequency,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('frequency',$frequency);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryusb_ports($usb_ports,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('usb_ports',$usb_ports);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybroadband_compatibility($broadband_compatibility,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('broadband_compatibility',$broadband_compatibility);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryfrequency_band($frequency_band,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('frequency_band',$frequency_band);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorywireless_speed($wireless_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('wireless_speed',$wireless_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprocessor_clock_speed($processor_clock_speed,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('processor_clock_speed',$processor_clock_speed);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryprimary_camera($primary_camera,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('primary_camera',$primary_camera);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybattery_capacity($battery_capacity,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('battery_capacity',$battery_capacity);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryinternal_storage($internal_storage,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('internal_storage',$internal_storage);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryoperatingsystem($operatingsystem,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('operatingsystem',$operatingsystem);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryram($ram,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('ram',$ram);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryvoice_calling_facility($voice_calling_facility,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('voice_calling_facility',$voice_calling_facility);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategoryconnectivity($connectivity,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('connectivity',$connectivity);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorydisplay_size($display_size,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('display_size',$display_size);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorybattery_type($battery_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('battery_type',$battery_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorysensor_type($sensor_type,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('sensor_type',$sensor_type);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategorymobileacc($mobileacc,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('compatible_mobiles',$mobileacc);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryproducttype($producttype,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('producttype',$producttype);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}public function get_subcategorymega_pixel($mega_pixel,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('mega_pixel',$mega_pixel);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	
	/*sub*/
	public function get_subcategorycusine($cusine,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('cusine',$cusine);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
	}
		public function get_subcategoryrestraent($restraent,$cid,$subcat){
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('seller_id',$restraent);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
	}
	public function get_subcategoryoffers($offer,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('offers',$offer);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorybrand($brand,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('brand',$brand);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategorydiscount($discount,$cid,$subcat){
		
		$this->db->select('*')->from('products');
		$this->db->where('item_status',1);
		$this->db->where('discount',$discount);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		//echo '<pre>';print_r($qq);exit;
		
	}
	public function get_subcategoryamount($min_amunt,$max_amount,$cid,$subcat){
		
		$sql = "SELECT * FROM products WHERE category_id ='".$cid."' AND  subcategory_id ='".$subcat."' AND item_status ='1' AND  item_cost BETWEEN '".$min_amunt."' AND '".$max_amount."'";
		return $this->db->query($sql)->result_array();
		//echo $this->db->last_query();exit;
	}
	public function get_subcategorystatus($status,$cid,$subcat){
		$this->db->select('*')->from('products');
		if($status!=0){
			$this->db->where('item_quantity !=',0);
		}else{
		$this->db->where('item_quantity=',0);	
		}
		$this->db->where('item_status',1);
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('category_id',$cid);
		return $this->db->get()->result_array();
		
	}
	
	public function get_all_previous_subcategorywise_search_fields($ip)
	{
		$this->db->select('*')->from('subcat_wise_fliter_search');
		$this->db->where('Ip_address',$ip);
		return $this->db->get()->result_array();
	}
	public function update_amount_privous_subcategory_wise_searchdata($min,$max,$id)
	{
		$sql1="UPDATE subcat_wise_fliter_search SET mini_amount ='".$min."', max_amount ='".$max."' WHERE id ='".$id."'";
		return $this->db->query($sql1);
	}
	/* review purpose*/
	public function get_products_reviews($pid){
		
		$this->db->select('reviews.*,ratings.rating,customers.cust_firstname')->from('reviews');
		$this->db->join('ratings', 'ratings.review_id = reviews.review_id', 'left'); 
		$this->db->join('customers', 'customers.customer_id = reviews.customer_id', 'left'); 
		$this->db->where('reviews.item_id',$pid);
		$this->db->order_by("ratings.review_id", "DESC");
		return $this->db->get()->result_array();
	}
	public function update_refund_details($status_id,$data){
		$this->db->where('status_id', $status_id);
		return $this->db->update('order_status', $data);
	}
	public function update_refund_details_inorders($status_id,$data){
		$this->db->where('order_item_id', $status_id);
		return $this->db->update('order_items', $data);
	}
	public function checking_ststus_id($status_id,$order_item_id)
	{
		$this->db->select('*')->from('order_status');
		$this->db->where('order_item_id',$order_item_id);
		$this->db->where('status_id',$status_id);
		return $this->db->get()->row_array();
	}
	public function get_related_products_list($catid,$subcatid,$name)
	{
		$sql = "SELECT * FROM products WHERE category_id ='".$catid."'AND subcategory_id ='".$subcatid."' AND  item_name LIKE '%".$name."%'";
      return $this->db->query($sql)->result_array(); 
	}
	
	public function all_stores_list()
	{
		$this->db->select('seller_store_details.store_name,sellers.seller_id')->from('sellers');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left'); 
		$this->db->where('sellers.status',1);
		$storeslist=$this->db->get()->result_array();
		//echo '<pre>';print_r($query);exit;
		foreach($storeslist AS $lists){
		$avg=$this->product_reviews_avg($lists['seller_id']);
		$return[$lists['seller_id']]=$lists;
		$return[$lists['seller_id']]['rating']=isset($avg['avg'])?$avg['avg']:'';
		$return[$lists['seller_id']]['categorylist']=$this->product_categories_list($lists['seller_id']);
		}
		if(!empty($return))
			{
			return $return;

		}
		
	}
	public function location_stores_list($locationids)
	{
		$this->db->select('seller_store_details.store_name,sellers.seller_id')->from('sellers');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left'); 
		$this->db->where_in('seller_store_details.area',$locationids);
		$this->db->where('sellers.status',1);
		$storeslist=$this->db->get()->result_array();
		//echo '<pre>';print_r($query);exit;
		foreach($storeslist AS $lists){
		$avg=$this->product_reviews_avg($lists['seller_id']);
		$return[$lists['seller_id']]=$lists;
		$return[$lists['seller_id']]['rating']=isset($avg['avg'])?$avg['avg']:'';
		$return[$lists['seller_id']]['categorylist']=$this->product_categories_list($lists['seller_id']);
		}
		if(!empty($return))
			{
			return $return;

		}
	}
	public function product_categories_list($sid){
		 
			$this->db->select('seller_categories.seller_category_id,seller_categories.category_name')->from('seller_categories');
			$this->db->where('seller_id', $sid);
			return $this->db->get()->result_array();
		 
	 }
	  public function get_seller_category_details($sid){
		 
			$this->db->select('seller_categories.seller_category_id,seller_categories.seller_id,seller_categories.category_name')->from('seller_categories');
			$this->db->where('seller_id', $sid);
			return $this->db->get()->result_array();
		 
	 }
	 public function get_sellercategory_wise_productslist($sid,$catid){
		 
			$this->db->select('*')->from('products');
			$this->db->where('seller_id', $sid);
			$this->db->where('category_id', $catid);
			$this->db->where('item_status',1);
			return $this->db->get()->result_array();
		 
	 }
	 public function get_all_products_review_and_reviewcount(){
		 
			$this->db->select('products.item_id')->from('products');
			$this->db->where('item_status',1);
			return $this->db->get()->result_array();
	}
	 public function product_reviews_avg($item){
		 
		$sql = "SELECT AVG(rating) as avg FROM ratings WHERE item_id ='".$item."'";
		return $this->db->query($sql)->row_array();	
		 
	 }
	 public function get_all_filters_product_list($catid,$fliter,$val)
	{
	
	if($val=='cuisine'){
		$this->db->select('products.cusine')->from('products');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left'); 
		$this->db->group_by('products.cusine');
		$this->db->where('category_id', $catid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}else if($val=='restrant'){
		$this->db->select('sellers.seller_name')->from('products');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');
		$this->db->group_by('products.seller_id');
		$this->db->where('category_id', $catid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}else if($val=='offers'){
		$sql = "SELECT IF(products.offer_expairdate<= DATE('Y-m-d h:i:s A'), offers, offer_percentage) AS offers FROM `products` WHERE `category_id` = '".$catid."' AND `item_status` = 1 AND `offers` != '' OR offer_percentage!=''";
		return $this->db->query($sql)->result_array();
	}else if($val=='brand'){
		$this->db->select('products.brand')->from('products');
		$this->db->group_by('products.brand');
		$this->db->where('category_id', $catid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}else if($val=='discount'){
		$this->db->select('products.discount')->from('products');
		$this->db->group_by('products.discount');
		$this->db->where('category_id', $catid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}else if($val=='item_cost'){
		//echo 'trt';exit;
		$this->db->select('products.item_cost')->from('products');
		$this->db->where('category_id', $catid);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	
	
		
	}
	 public function get_all_filters_product_list_color($catid,$fliter,$val){
		 
			$this->db->select('products.colour as color_name')->from('products');
			$this->db->group_by('products.colour');
			$this->db->where('products.category_id', $catid);
			$this->db->where('products.item_status',1);
			return $this->db->get()->result_array(); 
		 
	 }
	 public function get_all_filters_product_list_size($catid,$fliter,$val){
		 
			$this->db->select('product_size_list.p_size_name')->from('products');
			$this->db->join('product_size_list', 'product_size_list.item_id = products.item_id', 'left');
			$this->db->group_by('product_size_list.p_size_name');
			$this->db->where('products.category_id', $catid);
			$this->db->where('products.item_status',1);
			return $this->db->get()->result_array(); 
		 
	 }
	 
	 public function get_same_products($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.category_id,products.subcategory_id,products.colour,products.internal_memory,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->where('item_id !=', $item_id);
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_size($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('internal_memeory');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_color($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.internal_memeory,products.colour,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('colour');
		$this->db->where('item_status',1);
		return $this->db->get()->result_array();
	}
	public function get_same_products_ram($subcat,$name,$item_id)
	{
		$this->db->select('products.item_id,products.ram,products.subcategory_id,products.item_image')->from('products');
		$this->db->where('subcategory_id',$subcat);
		$this->db->where('item_name', $name);
		$this->db->group_by('ram');
		$this->db->where('item_status',1);
		$this->db->where('ram !=','');
		return $this->db->get()->result_array();
	}
	public function get_pincode_details($pincode)
	{
		$this->db->select('*')->from('pincodes_list');
		$this->db->where('pincode', $pincode);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}
	public function get_customer_billing_list($cust_id){
		$this->db->select('*')->from('customer_address');
		$this->db->where('cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function check_customer_exits($cust_id){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id', $cust_id);
        return $this->db->get()->row_array();
	}
	public function save_new_address($data){
		$this->db->insert('customer_address', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function get_home_banners_list(){
		$this->db->select('*')->from('appbanners_list');
		$this->db->where('status', 1);
        return $this->db->get()->result_array();
	}
	public function get_homepagemiddle_banners_list(){
		$this->db->select('*')->from('homesubbanners_list');
		$this->db->where('type', 2);
		$this->db->where('status', 1);
		$this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
		
	public function get_order_item_details($order_id){
		$this->db->select('order_items.*,products.item_name,products.description,products.item_image,products.product_code,products.brand,products.colour,products.ram,products.internal_memeory,sellers.seller_name,sellers.seller_mobile,seller_store_details.store_name,billing_address.name')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = products.seller_id', 'left');
		$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->where('order_items.order_id', $order_id);
		return $this->db->get()->result_array();
	}
	public function getinvoiceinfo($id){
		$this->db->select('order_items.*,billing_address.name,invoice_list.invoice_id,products.item_name,products.product_code,products.warranty_summary,products.warranty_type,products.service_type,seller_store_details.store_name,(seller_store_details.addrees1) AS sadd1,(seller_store_details.addrees2) AS sadd2,(seller_store_details.pin_code) AS Spin,seller_store_details.gstin,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1,customers.address2,(customers.pincode) AS cpin,subcategories.subcategory_name')->from('order_items');
		$this->db->join('customers', 'customers.customer_id = order_items.customer_id', 'left');
		$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->join('invoice_list', 'invoice_list.order_item_id = order_items.order_item_id', 'left');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');

		$this->db->where('order_items.order_item_id',$id);
		return $this->db->get()->row_array();
	}
	public function update_invocie_mail_send($order_item_id,$val){
		
		//print_r($areaid);exit;
		$sql1="UPDATE invoice_list SET mail_send ='".$val."' WHERE order_item_id = '".$order_item_id."'";
       	return $this->db->query($sql1);
	}
	public function update_invocie_name($order_item_id,$invoicename){
		
		//print_r($areaid);exit;
		$sql1="UPDATE invoice_list SET invoicename ='".$invoicename."' WHERE order_item_id = '".$order_item_id."'";
       	return $this->db->query($sql1);
	}
	public function save_cancel_order($order_tem_id,$data){
		$this->db->where('order_item_id', $order_tem_id);
		return $this->db->update('order_status', $data);
	}
	public function get_customerBilling_details($order_tem_id){
		$this->db->select('order_items.customer_phone,sellers.seller_email,sellers.seller_mobile,customers.cust_email')->from('order_items');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('customers', 'customers.customer_id = order_items.customer_id', 'left');
		$this->db->where('order_item_id',$order_tem_id);
		return $this->db->get()->row_array();
	}
	public function get_details_customer($cid){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$cid);
		return $this->db->get()->row_array();
	}
	public function get_sub_items_list($subcategory_id){
	$this->db->select('sub_items.*')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left');	
    $this->db->where('products.subcategory_id', $subcategory_id);
    $this->db->where('products.item_status', 1);
    $this->db->group_by('products.subitemid');
	return $this->db->get()->result_array();
	}
	public function get_sub_itemswise_productlist($sub_item_id){
	$this->db->select('products.*')->from('products');
	$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left');	
    $this->db->where('products.subitemid', $sub_item_id);
    $this->db->where('products.item_status', 1);
	return $this->db->get()->result_array();
	}
	
	public function get_subcategories_list($sub_id)
	{
		$this->db->select('subcategories.*')->from('products');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		$this->db->where('products.category_id',$sub_id);
		$this->db->where('subcategories.status',1);
		$this->db->group_by('products.subcategory_id');
		$query=$this->db->get()->result_array();
		foreach ($query as $list){
			//echo '<pre>';print_r($list);exit;
			$subitems[$list['subcategory_id']]=$list;
			$subitems[$list['subcategory_id']]['subitem']=$this->get_subitems_lists($list['subcategory_id']);
			
		}
		if(!empty($subitems))
			{
			return $subitems;

			}
		
	}
	
	
	public function get_subitems_lists($subcat_id){
		
			$this->db->select('sub_items.*')->from('products');
			$this->db->join('sub_items', 'sub_items.subitem_id = products.subitemid', 'left');	
			$this->db->where('products.subcategory_id', $subcat_id);
			$this->db->where('products.item_status', 1);
			return $this->db->get()->result_array();
		
	}
	
	
		
	


}