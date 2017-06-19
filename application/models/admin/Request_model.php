<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_model extends MY_Model 

{

	protected $_table="seller_request";
	protected $primary_key="seller_request_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

	public function getdata(){
	$sid = $this->session->userdata('seller_id');
	$this->db->select('*');
	$this->db->from('seller_request'); 
	$this->db->join('sellers', 'sellers.seller_id =seller_request.seller_id');  
	$this->db->where('seller_request.seller_id',$sid);	
	$this->db->order_by('seller_request.created_at','asc');
    $query = $this->db->get();
    return $query->result();
	}

	public function new_orders()
	{

	  $this->db->select('*');
		$this->db->from('orders');
		$this->db->where('order_status','0');
		$query = $this->db->get();
		return $query->result();
	}
		

}


	