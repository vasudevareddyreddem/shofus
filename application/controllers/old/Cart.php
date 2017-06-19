<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Cart extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();
		$this->load->model('Home_model');
		$this->load->helper("url");
		$this->load->model("Product_model");
		$this->load->model("Cart_model");
 }
	
	public function addtocart($product_id = "", $quantity = "1" ,$is_ajax = 1)
	{
	if($product_id == "")redirect(base_url(),"refresh");
		if(is_array($product_id))
		{
		$where = "  card_id IN ('".implode("','",$product_id)."')";			
		}
		else
		{
		$where = " card_id = '".$product_id."'";
		}
		$products = $this->Product_model->getProduct("","",$where);
		$cProduct = array();
		foreach($products as $key=>$product)
		{
			$id = $product["card_id"];
			$price = $product["discount_price"];
			$name = $product["product_name"];
			$qty = $quantity;
			$cProduct[] = array
			(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
            );	
		}
		if(is_array($cProduct) && !empty($cProduct))
		{
		$this->cart->insert($cProduct);
		}
		
		if($this->cart_id)
		{
			$this->updatecarttodb($this->cart->contents());
		}
		else
		{
			$this->addcarttodb($this->cart->contents());
		}
			
			
			
				
		if($is_ajax)
		{
			echo "success";
		}
		else
		{
			redirect(base_url(),"refresh");
		}		
	}
	
	public function getcurrentcart($getValues = FALSE)
	{	
 	 
		//echo $this->cart_id;die;
		if(intval($this->carttotalitems) == 0){if($getValues == TRUE){return "";}echo "";die;} //Kill it when there is no item in the cart
		//echo "calle";
		$cartprodids = $this->getCartProductIds();
	
		
		$Products = $this->getProductsData($cartprodids);
		//print_r($Products);
	//exit;
		$cartProducts = array();
		$totalprice = 0;	
		$discount = 0;	
		foreach($this->Cart_model->getCartContents($this->cart_id) as $key=>$cartitems)	
		{
			$val = array();			
			foreach($Products as $product)
			{
				if($cartitems["id"] == $product["card_id"])
				{
					$val['product_id'] = $product["card_id"];
					$val['product_name'] = $product["product_name"];	
					if(is_file('uploads/'.$product["product_image"]))
					{
					$val['picture'] = $product["product_image"];
					}
					else
					{
					    $val['picture'] = 'no-thumb.jpg';	
					}
					$val['discount_price'] = number_format($product["discount_price"]);
					$val['product_price'] = number_format($product["actual_price"]);
					 $val['sub_total'] = number_format($cartitems["subtotal"]);
					$val['quantity'] = $cartitems["qty"];
					$val['row_id'] = $key;					
					$val['totalprice'] =  number_format($product["actual_price"] * $cartitems["qty"]);
					$totalprice += doubleval($product['actual_price'] * $cartitems["qty"]);					
					$discount += doubleval(($product['actual_price'] - $product["discount_price"]) * $cartitems["qty"]) ;
				}				
			}
			$cartProducts[] = $val;
		}
		$retArr = array
		(
			"status"=>"success",
			"productData"=>$cartProducts,
			"grossprice"=>"Rs. ".number_format(doubleval($totalprice)-doubleval($discount)),
			"totalprice"=>"Rs. ".number_format($totalprice),
			"totaldiscount"=>"Rs. ".number_format($discount),
		);
		
	 //echo "<pre>";print_r($retArr);
	 //die;	
		
		if($getValues == TRUE)		
		{
			return $retArr;
		}
		else
		{
			
		 	echo   json_encode($retArr);
		}
	//echo "<pre>";print_r($Products);die;
	}
	
	public function removeCartItem($row_id)
	{
		$data = array(
               'rowid' => $row_id,
               'qty'   => 0
            );	
			
		
			
	 $res1=	$this->cart->update($data);	
		 if($res1)
		  {
			echo 'success';
		  }	
		if($this->cart_id)
		{
		  $res =	$this->updatecarttodb($this->cart->contents());
		  if($res)
		  {
			echo 'success';
		  }
		}
		else
		{
		redirect(base_url(),"refresh");
		}
	}
	

	
	public function updateQuantity($row_id,$qty = "1",$getResp = FALSE)
	{
		//print_r($this->cart->contents()); exit; 
		$data = array('rowid' => $row_id,'qty'=>$qty);
		$this->cart->update($data); 
		if($this->cart_id)
		{
			$this->updatecarttodb($this->cart->contents());
		}
		if($getResp)
		{
			$this->getcurrentcart();
		}
	}
	
	public function removeCart($redirect_url = "")
	{
		$this->cart->destroy();
		
		
	
		
		if($this->cart_id)
		{
			
		$result=	$this->updatecarttodb($this->cart_id,"");
		
		
		}
		if($redirect_url)redirect(base_url(),"refresh");
	}
	
	private function getProductsData($prod_ids)
	{
		$where = " card_id IN ('".implode("','",$prod_ids)."')";
		$products = $this->Product_model->getProduct(" "," ", $where);
		return $products;
	}
	
	private function getCartProductIds()
	{
		$id_array = array();
		foreach($this->cart->contents() as $cartitems)
		{
			$id_array[] = $cartitems["id"];
		}
		return $id_array;
	}
	
	private function addcarttodb($cartdata)
	{
		$cart_id = $this->Cart_model->addtoCart($cartdata);
		$cookie = array(
						    'name'   => 'cart_id',
						    'value'  => $cart_id,
						    'expire' => (365*60*60*24),
						    'domain' => '',
						    'path'   => '/',
						    'prefix' => '',
						    'secure' => FALSE
						);
		$this->input->set_cookie($cookie);
	}
	private function updatecarttodb($cartdata)
	{  
	   // echo "<pre>";
		//print_r($cartdata); exit;
		$this->Cart_model->updateCart($this->cart_id,$cartdata);		
	}
	public function totalcartitems()
	{
		
	   echo $this->carttotalitems;		
	}
}
?>