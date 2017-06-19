<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends MY_Model 

{

	protected $_table="orders";

	protected $primary_key="order_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );

	public function __construct()

	{

	parent::__construct();
	}

public function new_orders()
{

  $this->db->select('*');
	$this->db->from('orders');
	$this->db->where('order_status','0');
	$query = $this->db->get();
	return $query->result();
}

public function new_search($match)
{

 $this->db->select('*');
 $this->db->from('orders');
 if($match){
 $this->db->where("(order_id LIKE '$match' OR item_id LIKE '$match' OR seller_id LIKE '$match' OR customer_name LIKE '$match' OR customer_email LIKE '$match' OR customer_phone LIKE '$match' OR customer_address LIKE '$match' OR product_name LIKE '$match' OR delivery_date LIKE '$match' OR delivery_time LIKE '$match')"  );
 }
 $this->db->where('order_status','0'); 
 $query = $this->db->get();
 return $query->result();

}

public function assigned_orders()
{

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->where('orders.order_status','1');
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}

public function assigned_search($match)
{

 $this->db->select('*');
 $this->db->from('orders');
 $this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
 if($match){
 $this->db->join('deliveryboy', 'assign_orders.deliveryboy_id = deliveryboy.deliveryboy_id');
 $this->db->where("(orders.order_id LIKE '$match' OR item_id LIKE '$match' OR seller_id LIKE '$match' OR customer_name LIKE '$match' OR customer_email LIKE '$match' OR customer_phone LIKE '$match' OR customer_address LIKE '$match' OR product_name LIKE '$match' OR delivery_date LIKE '$match' OR delivery_time LIKE '$match' OR deliveryboy.deliveryboy_name LIKE '$match')"  );
 }
 $this->db->where('orders.order_status','1'); 
 $query = $this->db->get();
 return $query->result();

}


public function inprogress_orders()
{

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->where('orders.order_status','2');
	$query = $this->db->get();
	return $query->result();
}

public function inprogress_search($match)
{
 //echo $match; exit;
  $this->db->select('*');
 $this->db->from('orders');
 $this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
 if($match){
 $this->db->join('deliveryboy', 'assign_orders.deliveryboy_id = deliveryboy.deliveryboy_id');
 $this->db->where("(orders.order_id LIKE '$match' OR item_id LIKE '$match' OR seller_id LIKE '$match' OR customer_name LIKE '$match' OR customer_email LIKE '$match' OR customer_phone LIKE '$match' OR customer_address LIKE '$match' OR product_name LIKE '$match' OR delivery_date LIKE '$match' OR delivery_time LIKE '$match' OR deliveryboy.deliveryboy_name LIKE '$match')"  );
 }
 $this->db->where('orders.order_status','2'); 
 $query = $this->db->get();
return $query->result();

}

public function delivered_orders()
{

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->where('orders.order_status','3');
	$query = $this->db->get();
	return $query->result();
}

public function delivered_search($match)
{

  $this->db->select('*');
 $this->db->from('orders');
 $this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
 if($match){
 $this->db->join('deliveryboy', 'assign_orders.deliveryboy_id = deliveryboy.deliveryboy_id');
 $this->db->where("(orders.order_id LIKE '$match' OR item_id LIKE '$match' OR seller_id LIKE '$match' OR customer_name LIKE '$match' OR customer_email LIKE '$match' OR customer_phone LIKE '$match' OR customer_address LIKE '$match' OR product_name LIKE '$match' OR delivery_date LIKE '$match' OR delivery_time LIKE '$match' OR deliveryboy.deliveryboy_name LIKE '$match' OR assign_orders.pickup_time LIKE '$match' OR assign_orders.delivered_time LIKE '$match' OR assign_orders.payment_mode LIKE '$match')"  );
 }
 $this->db->where('orders.order_status','3'); 
 $query = $this->db->get();
 return $query->result();

}

public function rejected_orders()

{
    $this->db->select('*');
	$this->db->from('orders');
	$this->db->where('order_status','4');
	$query = $this->db->get();
	return $query->result();

}

public function rejected_search($match)
{

  $this->db->select('*');
 $this->db->from('orders');
 if($match){
 $this->db->where("(order_id LIKE '$match' OR item_id LIKE '$match' OR seller_id LIKE '$match' OR customer_name LIKE '$match' OR customer_email LIKE '$match' OR customer_phone LIKE '$match' OR customer_address LIKE '$match' OR product_name LIKE '$match' OR delivery_date LIKE '$match' OR delivery_time LIKE '$match')"  );
 }
 $this->db->where('order_status','4'); 
 $query = $this->db->get();
 return $query->result();


}

public function locationBasedDeliveryBoy($oid,$sid){
$this->db->select('*');
	$this->db->from('sellers');
	$this->db->where('seller_id', $sid);
	
		$query1=$this->db->get();
		$selleradd= $query1->row();
$sellerlocation= $selleradd->seller_location;
$this->db->select('*');
$this->db->distinct('deliveryboy_id');

	$this->db->from('deliveryboy_location');
	$this->db->where('location', $sellerlocation);
	$query=$this->db->get();
		return $query->result_array();



}

}


	