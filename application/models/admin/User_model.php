<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model 

{


	public function __construct()

	{

	parent::__construct();
	}

	public function roles_get()
	{

     $this->db->select('*');
	$this->db->from('roles');
	$data=$this->db->get();
	return $d=$data->result();
	}
	public function get_all_customers()
	{

     $this->db->select('*');
	$this->db->from('customers');
	$data=$this->db->get();
	return $d=$data->result();
	}

	public function insert_users($data)
	{
		
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_user_details($userid)
	{
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$userid);
		return $this->db->get()->row_array();
	}

}