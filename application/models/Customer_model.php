<?php
class Customer_model extends MY_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public function email_check($email){
		$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
        return $this->db->query($sql)->row_array(); 
	}
	public function save_customer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	
}
?>