<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing_calculator extends CI_Controller {

	public function __construct() {
		parent::__construct();

    $this->load->library('email');
    $this->load->library('encrypt');
    $this->load->model('seller/login_model');
}

 public function index() {
	 
	  
	$data['cihcatdata']  = $this->login_model->getcihcatedata();
	 	
	$this->load->view('seller/header');
  	$this->load->view('seller/pricing',$data);
	$this->load->view('seller/footer');
        //$this->template->render(); 
  }
  
  
  
  function getajaxcih(){
			$cih=$this->input->post('cih_id');
		   	$result=$this->login_model->getcihfeedata($cih);
		   	$sell = 1000;
		   	$show =$result->cih_fee;
		   	$disc = $sell - ($sell * $show / 100);
		   	
		   	//$per = 10;		   	
		   	//$percent = (float)$show . '%';
		   	//$percent = round((float)$show) . '%';
		   	//$we_take = $sell - $show;
		   	$serv_tax = 14.5;		   	
		   	$you_get = $disc - $serv_tax;
		   	$tot =  $sell - $disc + $serv_tax;
		   	//$tot = $you_get - $serv_tax;
			echo  '<div class="form-group">';
              echo '<input class="form-control" type="text" id="cih_fee" name="cih_fee" value="' .$show
              . '"  disabled>';
              echo '</div>';

		// echo '<div disabled id="lol">';
		// 	echo '<table style="border:1px solid #5fcbff;border-radius:10px;margin:0 auto;background-color:#f5f5f5;">';
		// 		echo '<tr>';
		// 			echo '<td style="padding:20px"><span style="color:#ff0000;font-size:18px;">You sell at :</span><br>Rs .1000</td>';
		// 			echo '<td style="padding:20px"><span style="color:#ff0000 ;font-size:18px;">We take:(for ' .$show.' )</span> <br>' .$show.'  of Rs.1000 + 14.5(service tax)= Rs.'.$tot.'</td>';
		// 			echo '<td style="padding:20px"><span style="color:#ff0000;font-size:18px;">You get in bank:</span><br>Rs.'.$you_get.'</td>';
		// 		echo '</tr>';
		// 	echo '</table>';
		// echo '</div>';
		
              	// echo '<div class="panel-group">';
                // echo '<div class="panel panel-success" style = "border-radius: 4px;">';
                  // echo '<div class="panel-body">
                  			// <p style="color:#006a99 ;font-size:18px;font-weight:100;">YOU SELL AT<p>
                  			// <p style="color:#000 ;font-size:17px;">Rs:'.$sell.'<p>
                  		// </div>';
                // echo '</div>';
                // echo '<div class="panel panel-default" style = "border-radius: 4px;">';
                  // echo '<div class="panel-body">
                  			// <p style="color:#006a99 ;font-size:18px;font-weight:600";">WE TAKE<p>
                  				// <p style="color:#000 ;font-size:17px;">' .$show.' Of RS.1000 +14.5(Service Tax) = '.$tot.'</p>
                  		// </div>';
                // echo '</div>';
                // echo '<div class="panel panel-default" style = "border-radius: 4px;">';
                  // echo '<div class="panel-body">
                  			// <p style="color:#006a99;font-size:18px;font-weight:600;">YOU GET IN BANK<p>
                  				// <p style="color:#000 ;font-size:17px;">Rs '.$you_get.'</p>
                  		// </div>';
                // echo '</div>';
              // echo '</div>';


              // echo  '<div class="form-group">';
              // echo 'WE Take<input class="form-control" type="text" id="cih_fee" name="cih_fee" value="' .$show.' Of RS.1000 +14.5(Service Tax)"  disabled>';
              // echo '</div>';

              // echo  '<div class="form-group">';
              // echo 'You Get In BANK<input class="form-control" type="text" id="cih_fee" name="cih_fee" value="' .$you_get. '"  disabled>';
              // echo '</div>';

		 exit;
			}
  
  public function getajaxcih1()
  
  {
	  
	$cih=$this->input->post('cih1_id');
	
	//echo "<pre>";print_r($cih);exit;
	if($cih!=''){
		$result=$this->login_model->getcihfeedata($cih);
			
			echo  '<div class="form-group san_sle">';
              echo '<input class="form-control" type="text" id="cih_fee1" name="cih_fee1" value="' .$result->cih_fee. '"    disabled>';
              echo '</div>';
		
	}
		   
              
		 exit;  
  }
  
public function getreferalfee()
{

	$product_price=$this->input->post('product_price');
	$cih_fee=$this->input->post('cih_fee1');	
	$sell = $this->input->post('product_price');//input value
	$comm = ($cih_fee * $sell) / 100;

	$disc = ($sell * $cih_fee) / 100;
	$serv_tax = 18;	
	$tax = ($comm * $serv_tax) / 100;
	$total = $comm + $tax;
	$cih =  ($disc * $serv_tax) / 100;
	$addin= $disc+ $cih ;
	$you_get = $sell - $cih;
	$amount= ($sell) - ($total);
	//echo $amount;exit;
// 	$ref = str_replace("%", "", $cih_fee1);
	
// 	$result12 = ($product_price * $ref)/100;
    
// 	if ($product_price > 1000) {
		
// 		$closing_price = 20;
// 	}
// else
// {
// 	$closing_price = 10;
	
	
// }
         echo '<h5>CIH Commision: '.$comm.'@'.$cih_fee.'</h5>';
          echo  '<h5>Service Tax: '.$tax.'@'.$serv_tax.'% </h5>';
          echo  '<h5>Total Fee: '.$total.' </h5>';
          echo  '<h5>You Make: '.$amount.' </h5>';
		  echo '<input type="hidden" id="productcih_fee" name="productcih_fee" value="'.$cih_fee.'">';
		  echo '<input type="hidden" id="closing_fee" name="closing_fee" value="'.$serv_tax.'">';
		  echo '<input type="hidden" id="you_make" name="you_make" value="'.$amount.'">';
		  echo '<div class="line">&nbsp;</div>';
		  
exit;  

}	 
  public function getajaxprofit()
  
  {
		$you_make=$this->input->post('you_make');
		$actual_price=$this->input->post('actual_price');
		//echo '<pre>';print_r($you_make);exit;
		$result =   $you_make - $actual_price; 
		
		if($result > 0){
		echo '<h5>Your Profit: '.$result.'</h5>';	
			
		}else{
		echo '<h5>Your Loss: '.$result.'</h5>';		
			
		}
		

		exit;
  }
  
}