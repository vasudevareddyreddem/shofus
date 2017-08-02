<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customerapi_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}


	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}

	public function save_customer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function get_customer_details($custid){
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$custid);
		return $this->db->get()->row_array();
	}

	public function login_details($email,$pass){
		$this->db->select('*')->from('customers');
		$this->db->where('cust_email', $email);
		$this->db->where('cust_password', $pass);
        return $this->db->get()->row_array();
	}

}