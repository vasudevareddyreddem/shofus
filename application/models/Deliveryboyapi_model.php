<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveryboyapi_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}

	public function login_customer($username,$password){

	$sql = "SELECT * FROM customers WHERE (cust_email ='".$username."' AND cust_password ='".md5($password)."') OR (cust_mobile ='".$username."' AND cust_password ='".md5($password)."')";
	return $this->db->query($sql)->row_array();
	}
	public function get_deliveryboy_details($cust_id,$role){

		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$cust_id);
		$this->db->where('role_id',$role);
		return $this->db->get()->row_array();
	}
	public function update_deliveryboy_address($cust_id,$add){

		$sql1="UPDATE customers SET deliveryboy_current_location ='".$add."' WHERE customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	public function order_status_updated($cust_id,$order_item_id){

		$sql1="UPDATE order_items SET rejeted_del_boy_id ='".$cust_id."' WHERE order_item_id = '".$order_item_id."'";
       	return $this->db->query($sql1);
	}
	public function get_deliver_boy_orders_list($cust_id){
		$this->db->select('order_items.*,(seller_store_details.addrees1) as selleradd1,(seller_store_details.addrees2) as selleradd2,(seller_store_details.pin_code) as sellerpincode,sellers.seller_mobile')->from('order_items');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
		$this->db->where('order_items.delivery_boy_id',$cust_id);
		$this->db->where('order_status.status_deliverd =','0');
		return $this->db->get()->result_array();
	}
	public function get_deliver_boy_orders_reject_orderlist($cust_id){
		$this->db->select('order_items.*,(seller_store_details.addrees1) as selleradd1,(seller_store_details.addrees2) as selleradd2,(seller_store_details.pin_code) as sellerpincode,sellers.seller_mobile')->from('order_items');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
		$this->db->where('order_items.rejeted_del_boy_id',$cust_id);
		return $this->db->get()->result_array();
	}
	public function get_deliver_boy_orders_reject_list($cust_id){
		$this->db->select('order_items.order_item_id,order_items.rejeted_del_boy_id')->from('order_items');
		$this->db->where('order_items.rejeted_del_boy_id',$cust_id);
		return $this->db->get()->result_array();
	
	}
	
		
	


}