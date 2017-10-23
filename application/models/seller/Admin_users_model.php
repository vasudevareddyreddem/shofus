<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users_model extends MY_Model 

{



	protected $_table="admin_users";
	protected $primary_key="admin_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

	public function __construct()

	{

	parent::__construct();

}

public function search(){

    $match = $this->input->post('search');
	$this->db->like('admin_name',$match);
	$this->db->or_like('admin_email',$match);
	$query = $this->db->get('admin_users');
	return $query->result();

}
}