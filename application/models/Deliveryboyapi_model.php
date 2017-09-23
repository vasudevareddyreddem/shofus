<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveryboyapi_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}

	public function login_customer($username,$password){

	$sql = "SELECT * FROM customers WHERE (cust_email ='".$username."' AND cust_password ='".md5($password)."') OR (cust_mobile ='".$username."' AND cust_password ='".md5($password)."')";
	return $this->db->query($sql)->row_array();
	}
	public function get_deliveryboy_details($cust_id,$role){

		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$cust_id);
		$this->db->where('role_id',$role);
		return $this->db->get()->row_array();
	}
	public function update_deliveryboy_address($cust_id,$add){

		$sql1="UPDATE customers SET deliveryboy_current_location ='".$add."' WHERE customer_id = '".$cust_id."'";
       	return $this->db->query($sql1);
	}
	
		
	


}