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
	$this->db->select('order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,order_items.*,products.item_name,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id','left');
	$this->db->where('order_items.seller_id',$sid);
	$this->db->order_by("order_items.order_item_id","desc");
	$query=$this->db->get();
	return $query->result();
	}

public function new_orders()
{
	$date = new DateTime("now");
	$curr_date = $date->format('Y-m-d H:i:s');
	$lastdate= date('Y-m-d H:i:s', strtotime(' -1 day'));
	
   $sid = $this->session->userdata('seller_id');
	$this->db->select('order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,order_items.*,products.item_name,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1');
	$this->db->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id','left');
	$this->db->where('order_items.seller_id',$sid);
	$this->db->where('order_items.create_at >=', $lastdate);
	$this->db->where('order_items.create_at <=', $curr_date);
	$this->db->order_by('order_items.order_item_id','desc');
	return $query = $this->db->get()->result();
	//return $query->result();
}



public function inprogress_orders()
{
    
	$sid = $this->session->userdata('seller_id');
	$sid = $this->session->userdata('seller_id');
	$this->db->select('order_status.status_confirmation,order_status.status_packing,order_status.status_road,order_status.status_deliverd,order_status.status_refund,order_items.*,products.item_name,customers.cust_firstname,customers.cust_lastname,customers.cust_email,customers.cust_mobile,customers.address1')->from('order_items');
	$this->db->join('products', 'products.item_id = order_items.item_id','left');
	$this->db->join('customers', 'customers.customer_id = order_items.customer_id','left');
	$this->db->join('order_status', 'order_status.order_item_id = order_items.order_item_id', 'left');
	$this->db->where('order_items.seller_id',$sid);
	//$this->db->where('order_status.status_deliverd=',4);
	$this->db->where('order_status.status_deliverd is NULL', NULL, true);
	$this->db->order_by('order_items.order_item_id','desc');
	return $this->db->get()->result();
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


	