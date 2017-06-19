<?php

class Cart_model extends MY_Model

{

	function __construct() 

	{

		parent::__construct();

		$this->load->database("default");

	}

	

	function getLastcartid()

	{

		$sql = "SELECT MAX(  `cart_id` ) as max

				FROM  `tmpcart`";

		$result = $this->db->query($sql);

		if($result && $result->num_rows())

		{

			$retdata = $result->result_array();				

			return intval($retdata[0]["max"]) + 1;

		}

		return 1;

	}

	

	function checkcartid($cart_id = "")

	{

		$this->db->where("cart_id",$cart_id);

		$result = $this->db->get("tmpcart");

		if($result && $result->num_rows())

		{

			return true;		

		}

		return false;

	}

	

	function addtoCart($cartData)

	{

		$cartData = array("cart_data"=>serialize($cartData));

		$this->db->insert("tmpcart",$cartData);			

		return $this->db->insert_id();

	}

	

	function updateCart($cart_id,$cartData)

	{

		//return $cartData;

		if($cart_id == "")return;

		if($cartData != "")

		{

			$cartData = serialize($cartData);

		}

		$updateData = array("cart_data"=>$cartData);

		$this->db->where("cart_id",$cart_id);		

		$this->db->update("tmpcart",$updateData);						

	}

	function getCartContents($cart_id)
	{
		$this->db->where("cart_id",$cart_id);
		$result = $this->db->get("tmpcart");
		if($result && $result->num_rows())
		{
			$retdata = $result->result_array();		
			//echo "<pre>";print_r($retdata);die;							
			if($retdata[0]['cart_data'] != "1" && $retdata[0]['cart_data'] != "")
			{

				return @unserialize($retdata[0]["cart_data"]);

			}		

		}

		return "";

	}

}

?>