<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cih_model extends MY_Model 

{

	protected $_table="cih";
	protected $primary_key="cih_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

public function search(){

    $match = $this->input->post('search');
	$this->db->like('category_name',$match);
	$query = $this->db->get('cih');
	return $query->result();

}
}


	