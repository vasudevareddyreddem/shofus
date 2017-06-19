<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveries_model extends MY_Model 

{

	protected $_table="deliveries";
	protected $primary_key="delivery_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );


public function __construct()

	{
	parent::__construct();
	}


public function getalldeliveries($deliveryboy_id)
{

	$this->db->select('*');
	$this->db->from('deliveries');
	$this->db->where('deliveryboy_id',$deliveryboy_id);
	$query = $this->db->get();
	return $query->result();
}

}