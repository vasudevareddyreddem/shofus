<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customerapi_model extends MY_Model 

{
	public function __construct()
	{

	parent::__construct();

	}


	public function mobile_check($mobile){

		$sql="SELECT * FROM customers WHERE cust_mobile ='".$mobile."'";
        return $this->db->query($sql)->row_array(); 
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

	public function login_details($email){
		$sql = "SELECT * FROM customers WHERE (cust_email ='".$email."') OR (cust_mobile ='".$email."')";
	return $this->db->query($sql)->row_array();
	}

	public function set_customer_password($custid,$pass){
		$sql1="UPDATE customers SET cust_password ='".$pass."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}
	public function oldpassword($cusid){
		$sql="SELECT * FROM customers WHERE customer_id ='".$cusid."'";
        return $this->db->query($sql)->row_array(); 
	}
	// public function forget_mobile_check($mobile){

	// 	$sql="SELECT * FROM customers WHERE cust_mobile ='".$mobile."'";
 //        return $this->db->query($sql)->row_array(); 
	// }
	// public function forget_email_check($email){

	// 	$sql="SELECT * FROM customers WHERE cust_email ='".$email."'";
 //        return $this->db->query($sql)->row_array(); 
	// }

	public function customer_details($cust_id){
		
		$this->db->select('*')->from('customers');
		$this->db->where('customer_id',$cust_id);
		return $this->db->get()->row_array();
	}
	public function verifing_otp($custid,$otp){
		
		$sql1="UPDATE customers SET otp_verifiation_ok ='".$otp."' WHERE customer_id = '".$custid."'";
       	return $this->db->query($sql1);
	}

	public function get_locations_list()
	{
		$this->db->select('*')->from('locations');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}

	public function home_page_banners()
	{
		$this->db->select('*')->from('home_banner');
		$this->db->order_by('home_banner.image_id desc');
		$this->db->where('home_banner.home_page_status',1);
		$this->db->where('home_banner.preview_ok',1);
		return $this->db->get()->result_array();

	}

	public function top_offers_list()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d');
		$this->db->select('top_offers.*,products.*')->from('top_offers');
		$this->db->join('products', 'products.item_id = top_offers.item_id', 'left');
		$this->db->order_by('top_offers.offer_percentage desc');
		$this->db->where('top_offers.preview_ok',1);
		$this->db->where('top_offers.expairdate >=', $curr_date);
		return $this->db->get()->result_array();

	}

	public function deals_of_the_day_list()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d');
		$this->db->select('deals_ofthe_day.*,products.*')->from('deals_ofthe_day');
		$this->db->join('products', 'products.item_id = deals_ofthe_day.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('deals_ofthe_day.offer_percentage desc');
		$this->db->where('deals_ofthe_day.preview_ok',1);
		$this->db->where('deals_ofthe_day.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function season_sales_list()
	{
		$date = new DateTime("now");
 		$curr_date = $date->format('Y-m-d');
		$this->db->select('season_sales.*,products.*')->from('season_sales');
		$this->db->join('products', 'products.item_id = season_sales.item_id', 'left');
        $this->db->where('admin_status','0');
		$this->db->order_by('season_sales.offer_percentage desc');
		$this->db->where('season_sales.preview_ok',1);
		$this->db->where('season_sales.expairdate >=', $curr_date);
		return $this->db->get()->result_array();
	}
	public function treding_products_list()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}
	
	public function offers_for_you_list()
	{
		$this->db->select('*')->from('products');
        $this->db->where('admin_status','0');
		$this->db->order_by('products.offer_percentage desc');
		return $this->db->get()->result_array();
	}

}