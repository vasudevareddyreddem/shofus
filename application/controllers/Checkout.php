<?php

defined('BASEPATH') OR exit('No direct script access allowed');



@include_once( APPPATH . 'controllers/Front_Controller.php');



class Checkout extends Front_Controller 

{
 

public function __construct() 
  {
         
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->helper("url");
		$this->load->model("Product_model");
		$this->load->model("Cart_model");		
		
		

	
 }

  public function index()

	{ 
	// echo "<pre>";
	//print_r($this);  exit; 
	      $data['carcount']= $this->carttotalitems;
		
		  $data['total_cart_items'] = $this->Cart_model->getCartContents($this->cart_id);
		  
		 
	      $data['allcheckoutproducts'] =  $this->getcurrentcart(TRUE);
		  if($data['allcheckoutproducts'])
		  {
		  
		         $data['checkoutproducts'] =  $data['allcheckoutproducts']['productData'];
		  }
		  
		   //print_r($data); '</pre>';
		  //exit;
		

		$this->template->write_view('content', 'checkout/index',$data);

		$this->template->render();

         }
	
public function removeItem($row_id)
	{
		$this->oCart->removeCartItem($row_id);	
		$this->oCart->getcurrentcart();
	//	redirect(base_url()."checkout","refresh");
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

					$val['product_price'] = number_format($product["discount_price"]);

					 $val['sub_total'] = number_format($cartitems["subtotal"]);

					$val['quantity'] = $cartitems["qty"];

					$val['row_id'] = $key;					

					$val['totalprice'] =  number_format($product["discount_price"] * $cartitems["qty"]);

					$totalprice += doubleval($product['discount_price'] * $cartitems["qty"]);					

					/*$discount += doubleval(($product['actual_price'] - $product["discount_price"]) * $cartitems["qty"]) ;*/

				}				

			}
			$cartProducts[] = $val;
		}
		$retArr = array
		(
			"status"=>"success",
			"productData"=>$cartProducts,
			/*"grossprice"=>"Rs. ".number_format(doubleval($totalprice)-doubleval($discount)),*/
			"totalprice"=>"Rs. ".number_format($totalprice),
			/*"totaldiscount"=>"Rs. ".number_format($discount),*/
		);
		
	// echo "<pre>";print_r($retArr);
	 //die;	
		
		if($getValues == TRUE)		
		{
			return $retArr;
		}
		else
		{
			
			echo json_encode($retArr);
		}
	//echo "<pre>";print_r($Products);die;
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
	
	private function getProductsData($prod_ids)
	{
		$where = " card_id IN ('".implode("','",$prod_ids)."')";
		$products = $this->Product_model->getProduct(" "," ", $where);
		return $products;
	}	

	
		
	
public function success()
	{
		$this->template->write_view('content', 'checkout/success');

		$this->template->render();

         }

}











