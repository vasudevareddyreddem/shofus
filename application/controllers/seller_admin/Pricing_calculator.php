<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing_calculator extends CI_Controller {

	public function __construct() {
		parent::__construct();

    $this->load->library('email');
    $this->load->library('encrypt');
    $this->load->model('seller_admin/login_model');
		
		

}

 public function index() {
	 
	  
	  $data['cihcatdata']  = $this->login_model->getcihcatedata();
	 
	 
	$this->load->view('seller_admin/header');
  $this->load->view('seller_admin/pricing',$data);
$this->load->view('seller_admin/footer');
        //$this->template->render(); 
  }
  
  
  
  function getajaxcih(){
			$cih=$this->input->post('cih_id');
		   $result=$this->login_model->getcihfeedata($cih);
			
			echo  '<div class="form-group">';
              echo '<input class="form-control" type="text" id="cih_fee" name="cih_fee" value="' .$result->cih_fee. '"  disabled>';
              echo '</div>';
		 exit;
			}
  
  public function getajaxcih1()
  
  {
	  
	$cih=$this->input->post('cih1_id');
		   $result=$this->login_model->getcihfeedata($cih);
			
			echo  '<div class="form-group san_sle">';
              echo '<input class="form-control" type="text" id="cih_fee1" name="cih_fee1" value="' .$result->cih_fee. '"    disabled>';
              echo '</div>';
		 exit;  
	  
	  
	  
	  
	  
  }
  
public function getreferalfee()
{

	$product_price=$this->input->post('product_price');
	$cih_fee1=$this->input->post('cih_fee1');
	
	$ref = str_replace("%", "", $cih_fee1);
	
	$result12 = ($product_price * $ref)/100;
    
	if ($product_price > 1000) {
		
		$closing_price = 20;
	}
else
{
	$closing_price = 10;
	
	
}
         echo '<h5>CIH Fee: '.$result12.'</h5>';
          echo  '<h5>Closing Fee: '.$closing_price.' </h5>';
		  echo '<input type="hidden" id="productcih_fee" name="productcih_fee" value="'.$result12.'">';
		  echo '<input type="hidden" id="closing_fee" name="closing_fee" value="'.$closing_price.'">';
		  echo '<div class="line">&nbsp;</div>';
		  
exit;  

}	
  
 public function shippingcharge()
  {
	$product_weight=$this->input->post('product_weight');
	
	$product_price=$this->input->post('product_price');
	
	$closing_fee=$this->input->post('closing_fee');
	
	$productcih_fee=$this->input->post('productcih_fee'); 

    //$cih_fee1=$this->input->post('cih_fee1');	
	  
	
$result=$this->login_model->getshippingcharge($product_weight);	

$result2 = $result->shipping_charges;

$delresult=$this->login_model->getdeliveryfee();

$servicedelfee = $delresult->service_fee;

$ref12 = str_replace("%", "", $servicedelfee);

$delivery = ($product_price * $ref12)/100 ;
$shippingcharge = $delivery + $result2;

$total = $productcih_fee + $closing_fee + $shippingcharge;

$servicetax = ($total * 15)/100;

$totalcharges = $total + $servicetax;

$youmake = $product_price - $totalcharges;

          echo '<h5>Shipping Charges: '.$result2.'</h5>';
          echo  '<h5>Delivery Service Fee: '.$delivery.'             @'.$servicedelfee.' </h5>';
		  echo '<div class="line">&nbsp;</div>';
		  echo  '<h5>CIH+Closing+Shipping: '.$total.' </h5>';
		  echo  '<h5>Service Tax: '.$servicetax.'           @15%</h5>';
	      echo  '<h5>Total Charges: '.$totalcharges.' </h5>';
		  echo  '<h5>Total You Make: '.$youmake.' </h5>';
		  echo '<input type="hidden" id="youmake" name="youmake" value="'.$youmake.'">';
		  
	  exit;
	  
  }
  
  public function getajaxprofit()
  
  {
	 $you_make=$this->input->post('youmake');
$actual_price=$this->input->post('actual_price');

$result = $you_make - $actual_price; 

echo '<h5>Your Profit: '.$result.'</h5>';
	  
	  exit;
  }
  
  
}