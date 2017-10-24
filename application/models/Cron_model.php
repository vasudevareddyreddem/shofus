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
		return $this->db->get()->result_array();
		
	}
	public function assign_orderto_deliveryboy($dboy_id,$orderitem_id,$status){
		$sql1="UPDATE order_items SET delivery_boy_assign ='".$status."', delivery_boy_id ='".$dboy_id."' WHERE order_item_id = '".$orderitem_id."'";
       	return $this->db->query($sql1);
		
	}
	


}