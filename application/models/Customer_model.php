<?php
class Customer_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	/* save orders purpose*/
	public function order_list($cust_id){
		$this->db->select('order_items.*,orders.transaction_id,products.item_name,products.item_description,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('orders', 'orders.order_id = order_items.order_id', 'left');
		$this->db->where('order_items.customer_id', $cust_id);
		return $this->db->get()->result_array();
	}
	public function get_order_items($order_id){
		$this->db->select('order_items.*,products.item_name,products.item_description,products.item_image')->from('order_items');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->where('order_items.order_id', $order_id);
		return $this->db->get()->result_array();
	}
	public function save_order_success($data){
		$this->db->insert('orders', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_order_items_list($data){
		$this->db->insert('order_items', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function after_payment_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function get_successorder_total_amount($order_id){
		$sql="SELECT SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM order_items  WHERE order_id ='".$order_id."'";
        return $this->db->query($sql)->row_array();
	}
	
	/* save orders purpose*/
	
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
	public function get_customers_details($cid){
		$this->db->select('*')->from('customers');		
		$this->db->where('customer_id', $cid);
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
		$this->db->select('products.*,category.commission')->from('products');
		$this->db->join('category', 'category.category_id = products.category_id', 'left');
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
		//$date = new DateTime("now");
		//$curr_date = $date->format('m/d/Y');
		$this->db->select('products.*')->from('products');
		$this->db->join('reviews', 'reviews.item_id = products.item_id', 'left');
		$this->db->where_in('seller_location_area',$location_id);
		$this->db->where('admin_status','0');
		//$this->db->where('offer_expairdate >=', $curr_date);
		$this->db->order_by('products.offer_percentage desc');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type,products.offer_expairdate,products.offer_time')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_Items_names($cust_id){
		$this->db->select('products.item_name')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_cart_total_amount($cust_id){
		$sql="SELECT count(item_id) as itemcount ,SUM(total_price) as pricetotalvalue ,SUM(delivery_amount) as delivertamount FROM cart  WHERE cust_id ='".$cust_id."'";
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

	
	
}
?>