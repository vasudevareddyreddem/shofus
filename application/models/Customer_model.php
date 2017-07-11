<?php
class Customer_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_billing_deails($data){
		$this->db->insert('billing_address', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_billing_details($custid){
		$this->db->select('billing_address.*,locations.location_name')->from('billing_address');
		$this->db->join('locations', 'locations.location_id = billing_address.area', 'left');
		$this->db->where('billing_address.cust_id',$custid);
		return $this->db->get()->row_array();
	}
	public function get_profile_details($custid){
		$this->db->select('customers.*,locations.location_name')->from('customers');
		$this->db->join('locations', 'locations.location_id = customers.area', 'left');
		$this->db->where('customers.customer_id',$custid);
		return $this->db->get()->row_array();
	}
	public function update_deails($custid,$data){
		$this->db->where('customer_id', $custid);
		return $this->db->update('customers', $data);
	}
	public function get_customer_details($custid){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$custid);
		return $this->db->get()->row_array();
	}
	public function email_unique_check($email){
		$this->db->select('*')->from('customers');
		$this->db->where('cust_email',$email);
		return $this->db->get()->row_array();
	}
	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function update_sear_area($custid,$areaid){
		$sql1="UPDATE customers SET area ='".$areaid."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function set_password($custid,$roleid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."' AND role_id ='".$roleid."'";
       	return $this->db->query($sql1);
	}
	public function getcustomer_oldpassword($cusid,$roleid){
		$sql="SELECT * FROM customers WHERE customer_id ='".$cusid."' AND role_id ='".$roleid."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function update_password($pass,$cust_id,$email){
		$sql1="UPDATE customers SET cust_password ='".md5($pass)."' WHERE cust_email = '".$email."' AND customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function forgot_login($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function get_user($cid,$email){
		$this->db->select('*')->from('customers');		
		$this->db->where('customer_id', $cid);
		$this->db->where('cust_email', $email);
		return $this->db->get()->row_array();
	}

	public function role_ids($email){
		$this->db->select('customers.role_id')->from('customers');
		$this->db->join('roles', 'roles.role_id = customers.role_id', 'left');		
		$this->db->where('cust_email', $email);	
        return $this->db->get()->row_array();
	}
	public function inve_login_details($email,$pass,$role_id){
		$this->db->select('*')->from('customers');		
		$this->db->where('cust_email', $email);
		$this->db->where('cust_password', $pass);
		$this->db->where('role_id', $role_id);
        return $this->db->get()->row_array();
	}

	public function login_details($email,$pass){
		$this->db->select('*')->from('customers');
		$this->db->where('cust_email', $email);
		$this->db->where('cust_password', $pass);
        return $this->db->get()->row_array();
	}
	
	public function save_customer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_product_details($itemid){
		$this->db->select('*')->from('products');
		$this->db->where('item_id', $itemid);
        return $this->db->get()->row_array();
	}
	public function cart_products_save($data){
		$this->db->insert('cart', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function add_whishlist($data){
		$this->db->insert('item_wishlist', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function remove_whishlist($cust_id,$item_id){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  item_id = '".$item_id."'";
		return $this->db->query($sql1);
	}
	public function get_whishlist_list($cust_id){
		$this->db->select('*')->from('item_wishlist');
		$this->db->where('cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_product_search_location($location_id){
		$this->db->select('products.*')->from('products');
		$this->db->join('reviews', 'reviews.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_total_amount($cust_id){
		$sql="SELECT SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM cart  WHERE cust_id ='".$cust_id."'";
        return $this->db->query($sql)->row_array();
	}
	public function get_whishlist_products($cust_id){
		$this->db->select('item_wishlist.*,products.*')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function update_cart_qty($cust_id,$pid,$data){
	
		 $this->db->where('cust_id',$cust_id);
		 $this->db->where('item_id',$pid);
    	return $this->db->update("cart",$data);
	}
	public function delete_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function delete_wishlist_item($cust_id,$wishlistid){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  id = '".$wishlistid."'";
		return $this->db->query($sql1);
	}
	public function setpassword_user($custid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}

	public function get_seller_categories()
	{
		$this->db->select('*')->from('category');
		return $this->db->get()->result_array();
		// $sqll = $this->db->query("SELECT s.seller_name AS `seller`, 
		// GROUP_CONCAT(sc.category_name ORDER BY sc.category_name SEPARATOR ', ') AS categoryname,count(sc.seller_id) as seller_count
		// FROM sellers s, seller_categories sc 
		// WHERE sc.seller_id = s.seller_id  
		// GROUP BY s.seller_id");
		// return $sqll->result_array();
		// $this->db->select('sellers.seller_name,GROUP_CONCAT(DISTINCT seller_categories.category_name ORDER BY seller_categories.category_name) as categoryname')->from('seller_categories');
		// $this->db->join('sellers', 'sellers.seller_id = seller_categories.seller_id', 'LEFT');
		// //$this->db->where('sellers.seller_id = seller_categories.seller_id');
  //       return $this->db->get()->result();
	}

	public function get_seller_names($cid){
	$this->db->select('sellers.*,seller_categories.*')->from('sellers');
	$this->db->join('seller_categories', 'seller_categories.seller_id = sellers.seller_id', 'left');
	$this->db->where('seller_categories.seller_category_id', $cid);
    return $this->db->get()->result_array();

	}

	

	public function get_seller_databaseid()
	{
		 // 	$this->db->select('sellers.*,seller_store_details.*,GROUP_CONCAT(seller_categories.category_name ORDER BY seller_categories.category_name SEPARATOR ', ') AS categoryname ')->from('seller_categories');
		 // 	$this->db->join('sellers', 'sellers.seller_id =seller_categories.seller_id' , 'left');
		 // 	$this->db->join('seller_store_details', 'seller_store_details.seller_id = sellers.seller_id', 'left');
		 // return $this->db->get()->result_array();
		 $sqll = $this->db->query("SELECT sellers.*,seller_store_details.*,GROUP_CONCAT(seller_categories.category_name ORDER BY seller_categories.category_name SEPARATOR ', ') AS categoryname 
		 FROM seller_categories LEFT JOIN sellers ON seller_categories.seller_id =sellers.seller_id LEFT JOIN seller_store_details ON 
		 	seller_store_details.seller_id = sellers.seller_id GROUP BY sellers.seller_id");
		 return $sqll->result_array();
		
	}

	public function get_seller_payments()
	{
		$this->db->select('*')->from('orders');
		return $this->db->get()->result();
	}
	public function get_inventory_management()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Inventory management');
		return $this->db->get()->result();
	}
	public function get_catalog_management()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Catalog Management');
		return $this->db->get()->result();
	}
	public function get_both()
	{
		$this->db->select('*')->from('request_for_services');
		$this->db->where('request_for_services.select_plan','Both');
		return $this->db->get()->result();
	}
	
}
?>