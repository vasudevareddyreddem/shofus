<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends MY_Model 

{



	protected $_table="customers";

	protected $primary_key="customer_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );



	public function __construct()



	{

	parent::__construct();



	}

 public function search(){

    $match = $this->input->post('search');
	$this->db->like('customer_name',$match);
	$this->db->or_like('customer_email',$match);
	$this->db->or_like('customer_mobile',$match);
	$query = $this->db->get('customers');
	return $query->result();

}

}