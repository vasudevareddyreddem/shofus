<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicefee_model extends MY_Model 

{

	protected $_table="servicefee";
	protected $primary_key="service_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

public function search(){

    $match = $this->input->post('search');
	$this->db->like('service_fee',$match);
	$query = $this->db->get('servicefee');
	return $query->result();

}
}


	