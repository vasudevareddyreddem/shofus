<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping_model extends MY_Model 

{

	protected $_table="shipping";
	protected $primary_key="weight_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

public function search($match){

//echo $match; exit;
	$this->db->like('product_weight',$match);
	$this->db->or_like('shipping_charges',$match);
	$query = $this->db->get('shipping');
	return $query->result();

}
}


	