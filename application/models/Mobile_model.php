<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}
	public function seller_register($data){
		$this->db->insert('sellers', $data);
		return $insert_id = $this->db->insert_id();;
		
	}
	public function seller_mobile_check($mobile){
		 $sql = "SELECT * FROM sellers WHERE seller_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array();
		
	}

}