<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}

	public function getall_unasigned_order_list(){
		$this->db->select('order_items.*,(locations.pincode) as customerpincode,(seller_store_details.addrees1) as selleradd1,(seller_store_details.addrees2) as selleradd2,(seller_store_details.pin_code) as sellerpincode,sellers.seller_mobile')->from('order_items');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('locations', 'locations.location_id = order_items.area', 'left');
		$this->db->where('delivery_boy_assign', 0);
		return $this->db->get()->result_array();
	}
	public function update_delivery_time($orderitem_id,$km,$time,$timevalue){
		$sql1="UPDATE order_items SET customer_seller_km ='".$km."', customer_seller_time ='".$time."', customer_seller_timevalue ='".$timevalue."' WHERE order_item_id = '".$orderitem_id."'";
       	return $this->db->query($sql1);
	}
	public function getall_deliveries_list(){
		$this->db->select('customers.customer_id,customers.address1,customers.address2,customers.city,customers.state,customers.pincode')->from('customers');
		$this->db->where('role_id', 6);
		$this->db->where('status', 1);
		$this->db->where('active_status', 1);
		return $this->db->get()->result_array();
		
	}
	public function assign_orderto_deliveryboy($dboy_id,$orderitem_id,$status){
		$sql1="UPDATE order_items SET delivery_boy_assign ='".$status."', delivery_boy_id ='".$dboy_id."' WHERE order_item_id = '".$orderitem_id."'";
       	return $this->db->query($sql1);
		
	}
	public function get_order_item_details($id){
		$this->db->select('order_items.*,(locations.pincode) as customerpincode,(seller_store_details.addrees1) as selleradd1,(seller_store_details.addrees2) as selleradd2,(seller_store_details.pin_code) as sellerpincode,sellers.seller_mobile,products.item_name,products.colour')->from('order_items');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('locations', 'locations.location_id = order_items.area', 'left');
		$this->db->where('order_items.order_item_id',$id);
		return $this->db->get()->row_array();
	}
	public function get_delivery_details($id){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$id);
		return $this->db->get()->row_array();
	}
	public function getall_return_order_list(){
		$this->db->select('order_items.*,(locations.pincode) as customerpincode,(seller_store_details.addrees1) as selleradd1,(seller_store_details.addrees2) as selleradd2,(seller_store_details.pin_code) as sellerpincode,sellers.seller_mobile,order_status.status_refund')->from('order_items');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = order_items.seller_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('locations', 'locations.location_id = order_items.area', 'left');
		$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
		$this->db->where('order_status.status_refund !=', '');
		$this->db->where('order_status.status_refund !=', 'cancel');
		//$this->db->where_in('order_status.status_refund', array('Refund','Exchange','Replacement'));
		return $this->db->get()->result_array();
	}
	public function assign_returnorderto_deliveryboy($dboy_id,$orderitem_id){
		$sql1="UPDATE order_items SET return_deliveryboy_id='".$dboy_id."' WHERE order_item_id = '".$orderitem_id."'";
       	return $this->db->query($sql1);
		
	}
	public function get_complted_orders(){
		$this->db->select('order_items.*,billing_address.name,invoice_list.invoice_id,invoice_list.mail_send,invoice_list.invoicename,products.item_name,products.product_code,products.warranty_summary,products.warranty_type,products.service_type,seller_store_details.store_name,(seller_store_details.addrees1) AS sadd1,(seller_store_details.addrees2) AS sadd2,(seller_store_details.pin_code) AS Spin,seller_store_details.gstin,seller_store_details.gstinimage,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1,customers.address2,(customers.pincode) AS cpin,subcategories.subcategory_name,sellers.seller_email,sellers.seller_mobile')->from('order_items');
		$this->db->join('customers', 'customers.customer_id = order_items.customer_id', 'left');
		$this->db->join('billing_address', 'billing_address.order_id = order_items.order_id', 'left');
		$this->db->join('products', 'products.item_id = order_items.item_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('seller_store_details', 'seller_store_details.seller_id = products.seller_id', 'left');
		$this->db->join('invoice_list', 'invoice_list.order_item_id = order_items.order_item_id', 'left');
		$this->db->join('subcategories', 'subcategories.subcategory_id = products.subcategory_id', 'left');
		return $this->db->get()->result_array();
		
	}
	public function update_invocie_mail_send($order_item_id,$val){
		
		//print_r($areaid);exit;
		$sql1="UPDATE invoice_list SET mail_send ='".$val."' WHERE order_item_id = '".$order_item_id."'";
       	return $this->db->query($sql1);
	}
	public function update_invocie_mail_send_customer($nid,$val){
		
		//print_r($areaid);exit;
		$sql1="UPDATE invoice_list SET customer_email_send ='".$val."' WHERE invoice_id = '".$nid."'";
       	return $this->db->query($sql1);
	}
	public function update_invocie_name_save($invoice_id,$order_item_id,$val){
		
		//print_r($areaid);exit;
		$sql1="UPDATE invoice_list SET invoicename ='".$val."' WHERE invoice_id = '".$invoice_id."' and order_item_id = '".$order_item_id."'";
       	return $this->db->query($sql1);
	}
	public function get_pending_inovices_list(){
		$this->db->select('invoice_list.invoice_id,invoice_list.mail_send,invoice_list.invoicename,invoice_list.customer_email_send,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1,customers.address2,(customers.pincode) AS cpin,sellers.seller_email,sellers.seller_mobile')->from('order_items');
		$this->db->join('customers', 'customers.customer_id = order_items.customer_id', 'left');
		$this->db->join('invoice_list', 'invoice_list.order_item_id = order_items.order_item_id', 'left');
		$this->db->join('sellers', 'sellers.seller_id = order_items.seller_id', 'left');
		$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
		$this->db->where('order_status.status_refund =', 4);
		$this->db->where('invoice_list.customer_email_send =', 0);
		return $this->db->get()->result_array();
		
	}
	


}