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

     $id = $this->session->userdata('seller_id');

    $this->db->select('*');
	$this->db->from('orders');
	 $this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','0');
	$this->db->where('orders.seller_id', $id);
    $this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}

public function assigned_orders()
{
	$id = $this->session->userdata('seller_id');

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','1');
	$this->db->where('orders.seller_id', $id);
	$this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}

public function inprogress_orders()
{
    $id = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','2');
	$this->db->where('orders.seller_id', $id);
	  $this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}

public function delivered_orders()
{
	$id = $this->session->userdata('seller_id');

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','3');
		$this->db->where('orders.seller_id', $id);
	  $this->db->order_by("orders.order_id","desc"); 
	$query = $this->db->get();
	return $query->result();
}


public function rejected_orders()

{
	$id = $this->session->userdata('seller_id');
    $this->db->select('*');
	$this->db->from('orders');
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	$this->db->where('orders.order_status','4');
	$this->db->order_by("orders.order_id","desc"); 
	$this->db->where('orders.seller_id', $id);
	$query = $this->db->get();
	return $query->result();

}


public function search(){

    $match = $this->input->post('search');
	$this->db->like('customer_name',$match);
	$this->db->or_like('customer_email',$match);
	$this->db->or_like('customer_phone',$match);
	$this->db->or_like('customer_address',$match);
	$this->db->or_like('deliveryboy_id',$match);
	$this->db->or_like('product_name',$match);
	$query = $this->db->get('orders');
	return $query->result();

}

public function getperformancedaily($month,$year)

{
	
	  $sid= $this->session->userdata('seller_id');
	
	/* if($month = ""){
		$month = "5";
		
	}
	if($year = ""){
		$month = "2017";
		
	} */
	//echo $month; echo $year; exit;
$query = $this->db->query("SELECT COUNT(*) AS orders, created_at
FROM orders
WHERE seller_id=$sid
AND MONTH(created_at)=$month
AND YEAR(created_at) =$year 
GROUP BY EXTRACT(DAY FROM created_at)");
	
//$this->db->where("MONTH(created_at)", $month);
//$this->db->where("YEAR(created_at)", $year );
//$query = $this->db->get('orders');
//echo $this->db->last_query(); exit; 
return $query->result();
}
}


	