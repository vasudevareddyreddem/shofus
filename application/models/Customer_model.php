<?php
class Customer_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
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
	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function update_sear_area($custid,$areaid){
		$sql1="UPDATE customers SET area ='".$areaid."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function set_password($custid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function getcustomer_oldpassword($cusid){
		$sql="SELECT * FROM customers WHERE customer_id ='".$cusid."'";
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
	public function get_cart_products($cust_id){
		$this->db->select('cart.*,products.item_name,products.item_image,products.item_cost,products.offer_amount,products.offer_percentage,offer_amount,products.offer_combo_item_id,products.offer_type')->from('cart');
		$this->db->join('products', 'products.item_id = cart.item_id', 'left');
		$this->db->where('cart.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function get_whishlist_products($cust_id){
		$this->db->select('item_wishlist.*,products.*')->from('item_wishlist');
		$this->db->join('products', 'products.item_id = item_wishlist.item_id', 'left');
		$this->db->where('item_wishlist.cust_id', $cust_id);
        return $this->db->get()->result_array();
	}
	public function update_cart_qty($cust_id,$pid,$qty){
		$sql1="UPDATE cart SET qty ='".$qty."' WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."'";
		return $this->db->query($sql1);
	}
	public function delete_cart_item($cust_id,$pid,$id){
		$sql1="DELETE FROM cart WHERE cust_id = '".$cust_id."' AND  item_id = '".$pid."' AND id ='".$id."'";
		return $this->db->query($sql1);
	}
	public function delete_wishlist_item($cust_id,$wishlistid){
		$sql1="DELETE FROM item_wishlist WHERE cust_id = '".$cust_id."' AND  id = '".$wishlistid."'";
		return $this->db->query($sql1);
	}
	
	
}
?>