<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class payments_model extends MY_Model 
{

	    protected $_table="seller_payments";
		protected $primary_key="seller_payment_id";
		protected $soft_delete = FALSE;
		//public $before_create = array( 'created_at', 'updated_at' );

		//public $before_update = array( 'updated_at' );
		
	public function __construct()

	{
	parent::__construct();

	}
	
	
	public function getpaymentdetails()
	{
		$id = $this->session->userdata('seller_id');

	$this->db->select('*');
	$this->db->from('seller_payments');
	$this->db->where('seller_id',$id);
	$query = $this->db->get();
	return $query->result();
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