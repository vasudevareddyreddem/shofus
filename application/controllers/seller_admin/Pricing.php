<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Pricing extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('seller_admin/dashboard_model');
		$this->load->model('seller_admin/subcategory_model');
		
	}

	public function index()
	{
		
		//$this->load->view('welcome_message');
		//echo "ddg"; exit;
		//$data['sellersubcatdata'] = $this->dashboard_model->getsellersubcatdata();
		$data['catdata']=$this->dashboard_model->getcatdata();
		//print_r($data['sellersubcatdata']); exit;
		$this->template->write_view('content', 'seller_admin/pricing/index',$data);
		$this->template->render();


	}
	
function getajaxsubcat(){
	$cat=$this->input->post('category_id');
	$result=$this->subcategory_model->getsubcategoryDataforcat($cat);
	echo '<option value="">Select Subcategory</option>';
	foreach($result as $alldata)
	{
	echo '<option value="'.$alldata->subcategory_id.'">'.$alldata->subcategory_name.'</option>';
	}
	exit;
	}		
	
	
	
function getajaxrefferal(){
	$subcat=$this->input->post('subcategory_id');
	$result=$this->subcategory_model->getreferralfee($subcat);
	
	//echo $result->referral_fee ;
	
	
	
	 echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Refferal Fee</label>';
                  echo '<input class="form-control" placeholder="Food Item Charges" type="text" id="ref_id" name="ref_id" value="' .$result->referral_fee. '" disabled>' ;
				
              echo  '</div>' ;
			  
			  
			  
			   echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Enter Product Price(including shipping charge to customer)</label>';
                  echo '<input class="form-control" placeholder="Enter product price" type="number" id="product_price" name="product_price" >' ;
				
              echo  '</div>' ;
	
	
	   //echo '<button type="submit" class="btn btn-primary" name="submit" id="product_submit">Submit</button>';
	
	
	
	
	
	
	
	
	exit;
	}		
	
	
	function getajaxcount(){
	$referal=$this->input->post('ref_id');
	$price=$this->input->post('product_price');
	
	$ref = str_replace("%", "", $referal);
	
	$result = ($price * $ref)/100;
	
	//echo $result->referral_fee ;
	
	
	
	// echo $result;
	
	   //echo '<button type="submit" class="btn btn-primary" name="submit" id="product_submit">Submit</button>';
	
	
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Refferal Fee</label>';
                  echo '<input class="form-control" placeholder="Food Item Charges" type="text" id="ref_count" name="ref_count" value="' .$result. '" disabled>' ;
				
              echo  '</div>' ;
			  
			  
			  
			   echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Closing Price</label>';
                  echo '<input class="form-control" placeholder="Enter product price" type="text" id="closing_price" name="closing_price" value="10" disabled>' ;
				
              echo  '</div>' ;
	
	
	 echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Enter Product Weight in gms</label>';
                  echo '<input class="form-control" placeholder="gms" type="number" id="product_weight" name="product_weight" >' ;
				
              echo  '</div>' ;
	
	
	exit;
	}		
	
	
	
	
	
function getajaxweight(){
	$product_weight=$this->input->post('product_weight');
	
	$product_price=$this->input->post('product_price');
	$ref_count=$this->input->post('ref_count');
	$closing_price=$this->input->post('closing_price');
	
	$result=$this->subcategory_model->getshippingcharge($product_weight);
	
	
	$result2 = $result->shipping_charges;
	
	$delivery = ($product_price * 1.3)/100 ; 
	$shippingcharge = $delivery + $result2;
	//echo $result->shipping_charges;
	
	$total = $ref_count + $closing_price + $shippingcharge;
	
	$servicetax = ($total * 15)/100;
	
	$totalcharges = $total + $servicetax;
	
	$youmake = $product_price - $totalcharges;
	
	
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Shipping Charges</label>';
                 echo '<input class="form-control" placeholder="shipping charges" type="text" id="shipp_charge" name="shipp_charge" value="'.$result2.'" disabled>' ;
				
             echo  '</div>' ;
			 
	
    echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Delivery Service Fee @1.3%</label>';
                 echo '<input class="form-control" placeholder="Delivery Service Fee" type="text" id="del_fee" name="del_fee" value="'.$delivery.'" disabled>' ;
				
             echo  '</div>' ;
	
	
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Shipping Charges Including Delivery Service Fee @1.3%</label>';
                 echo '<input class="form-control" placeholder="shipping charges" type="text" id="shipping_charge" name="shipping_charge" value="'.$shippingcharge.'" disabled>' ;
				
             echo  '</div>' ;
			 
			 
			 
			 
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Referral+Closing+Shipping</label>';
                 echo '<input class="form-control" placeholder="Total" type="text" id="rcs_charge" name="rcs_charge" value="'.$total.'" disabled>' ;
				
             echo  '</div>' ;	


echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Service Tax   @15%</label>';
                 echo '<input class="form-control" placeholder="Service Tax is 15%" type="text" id="service_tax" name="service_tax" value="'.$servicetax.'" disabled>' ;
				
             echo  '</div>' ;				 
			 
			 
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Total Charges</label>';
                 echo '<input class="form-control" placeholder="Total Charges" type="text" id="total_charges" name="total_charges" value="'.$totalcharges.'" disabled>' ;
				
             echo  '</div>' ;	



   echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">You Make</label>';
                 echo '<input class="form-control" placeholder="You Make" type="text" id="you_make" name="you_make" value="'.$youmake.'" disabled>' ;
				
             echo  '</div>' ;	

	echo '<h3>Calculate Your Profit</h3>' ;
	
	
	
	echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Enter Cost of Product</label>';
                 echo '<input class="form-control" placeholder="Cost of Product" type="number" id="cost_product" name="cost_product">' ;
				
             echo  '</div>' ;
	 		 
	
	exit;
	}		
	
	
public function getajaxprofit()
{
$you_make=$this->input->post('you_make');
$cost_product=$this->input->post('cost_product');

$result = $you_make - $cost_product;


echo '<div class="form-group nopaddingRight col-md-6 san-lg">';
            echo ' <label for="exampleInputEmail1">Your Profit</label>';
                 echo '<input class="form-control" placeholder="Profit" type="text" id="product_profit" name="product_profit" value="'.$result.'" disabled>' ;
				
             echo  '</div>' ;
	 		 
	
	exit;


}	
	
	
	
}