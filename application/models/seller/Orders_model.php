<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends MY_Model 

{

	protected $_table="order_items";

	protected $primary_key="order_item__id";

	protected $soft_delete = FALSE;


	public function __construct()

	{

	parent::__construct();
	}

	public function total(){
	$sid = $this->session->userdata('seller_id');
	$this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.seller_id',$sid);
	$query=$this->db->get();
	return $query->result();
	}

public function new_orders()
{

     $sid = $this->session->userdata('seller_id');
     $this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.order_status','0');
	$this->db->where('order_items.seller_id',$sid);
	$this->db->order_by('order_items.create_at','desc');
	return $query = $this->db->get()->result();
	//return $query->result();
}

public function assigned_orders()
{
	$sid = $this->session->userdata('seller_id');
     $this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.order_status','1');
	$this->db->where('order_items.seller_id',$sid);
	return $query = $this->db->get()->result();
}

public function inprogress_orders()
{
    $sid = $this->session->userdata('seller_id');
     $this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.order_status','2');
	$this->db->where('order_items.seller_id',$sid);
	return $query = $this->db->get()->result();
}

public function delivered_orders()
{
	$sid = $this->session->userdata('seller_id');
     $this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.order_status','3');
	$this->db->where('order_items.seller_id',$sid);
	return $query = $this->db->get()->result();
}


public function rejected_orders()

{
	$sid = $this->session->userdata('seller_id');
     $this->db->select('order_items.*,products.*,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->where('order_items.order_status','4');
	$this->db->where('order_items.seller_id',$sid);
	return $query = $this->db->get()->result();

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
$query = $this->db->query("SELECT COUNT(*) AS orders
FROM order_items
WHERE seller_id=$sid
AND MONTH(create_at)=$month
AND YEAR(create_at) =$year 
GROUP BY EXTRACT(DAY FROM create_at) ");
	
//$this->db->where("MONTH(created_at)", $month);
//$this->db->where("YEAR(created_at)", $year );
//$query = $this->db->get('orders');
//echo $this->db->last_query(); exit; 
return $query->result();
}
}


	