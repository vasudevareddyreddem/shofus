<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments_model extends MY_Model 

{

	protected $_table="customer_payments";
	protected $primary_key="customer_payment_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

	public function __construct()
	{

	parent::__construct();

	}

public function getorderdata($id)
{
   $this->db->select('*');
	$this->db->from('orders');
	$this->db->join('assign_orders', 'orders.order_id = assign_orders.order_id');
	$this->db->where('orders.order_id',$id);
	$this->db->where('orders.order_status','3');
	$query = $this->db->get();
	return $query->row();
}

public function search(){

    $match = $this->input->post('search');
	$this->db->like('customer_name',$match);
	$this->db->or_like('trans_id',$match);
	$this->db->or_like('amount',$match);
	$this->db->or_like('date_time',$match);
	$query = $this->db->get('customer_payments');
	return $query->result();
}

public function getseller_payments()
{
	$date1=date('Y-m-d');
   $this->db->select('*');
	$this->db->from('orders');
	//DATE(myDate) = DATE(NOW())
	$this->db->join('sellers', 'sellers.seller_id = orders.seller_id');
	//$this->db->join('seller_payments', 'seller_payments.order_id = orders.order_id');
	$this->db->where('orders.created_at', $date1);
	
	$query = $this->db->get();
	
	//echo $this->db->last_query(); exit;
	return $query->result();
}
public function getindseller_payment($seller_id,$order_id)
{
	 $this->db->select('*');
	$this->db->from('seller_payments');
	$this->db->join('sellers', 'sellers.seller_id = seller_payments.seller_id');
	
	$this->db->where('seller_payments.seller_id', $seller_id);
	$this->db->where('seller_payments.order_id', $order_id);
	$query = $this->db->get();
	return $query->row();
	
	
	
}
public function get_singlesellerdata($seller_id)
{
	
	$this->db->select('*');
	$this->db->from('sellers');
	$this->db->where('seller_id', $seller_id);
	$query = $this->db->get();
	return $query->row();
	
	
}
public function seller_delete($id)
{

   $result = $this->db->where('seller_payment_id', $id)
                     ->delete('seller_payments');
        return $result;
}

public function seller_insert($data)
{

	return $this->db->insert('seller_payments',$data);
}

public function update_sellerpayments($id,$data)
{
	 $result =	$this->db->where('seller_payment_id', $id)
                     ->update('seller_payments',$data);
        return $result;
}

public function get_sellerpayments($id)
{

   $this->db->select('*');
	$this->db->from('seller_payments');
	$this->db->where('seller_payment_id',$id);
	$query = $this->db->get();
	return $query->row();
}

public function getsellerdata($id)
{
   $this->db->select('*');
	$this->db->from('sellers');
	$this->db->where('seller_id',$id);
	$query = $this->db->get();
	return $query->row();
}

public function seller_search(){

    $match = $this->input->post('search');
	$this->db->or_like('trans_id',$match);
	$this->db->or_like('advance_amount',$match);
	$this->db->or_like('pending_amount',$match);
	$this->db->or_like('total_amount',$match);
	$this->db->or_like('date_time',$match);
	$query = $this->db->get('seller_payments');
	return $query->result();

}
}