<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model 

{


	public function __construct()

	{

	parent::__construct();
	}

	public function roles_get()
	{
		$this->db->select('*')->from('roles');
		$this->db->where('roles.role_id!=1');
		return $this->db->get()->result_array();
	}
	public function get_all_customers()
	{
		$this->db->select('customers.*,roles.role')->from('customers');
		$this->db->join('roles', 'roles.role_id = customers.role_id', 'left');
		$this->db->where('customers.role_id!=1');
		return $this->db->get()->result_array();
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
	function deletecustomerdata($id,$status)
	{
		$sql1="UPDATE customers SET status ='".$status."'WHERE customer_id = '".$id."'";
		return $this->db->query($sql1);
	}

}