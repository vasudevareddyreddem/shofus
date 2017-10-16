<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

    $this->load->library('email');
    $this->load->library('encrypt');
		$this->load->model('seller_admin/login_model');
		$this->load->model('admin/sellers_model');
		$this->load->model('seller_admin/dashboard_model');
		
$this->load->model('seller_admin/subcategory_model');
}

 public function index() {
	 $data['catdata']=$this->dashboard_model->getcatdata();
    //print_r($data['catdata']); exit;
	 $this->load->view('seller_admin/header');
  $this->load->view('seller_admin/login',$data);
   $this->load->view('seller_admin/footer');

        //$this->template->render(); 
  }


 public function register() {

 $data['email'] = $this->input->post('seller_email');
 
  $data['phone'] = $this->input->post('seller_phone');
  
  $data['locationdata']=$this->login_model->getlocation();
 
  $this->load->view('seller_admin/header');
  $this->load->view('seller_admin/register',$data);
$this->load->view('seller_admin/footer');
    }


public function insert() {

	//echo "hi"; exit;
	$six_digit_random_number = mt_rand(100000, 999999);
	$phone = $this->input->post('seller_mobile');

  $data = array(
  	  	'seller_name' => $this->input->post('seller_fullname'),
  	  	'seller_email' => $this->input->post('seller_email'),
  	  	'seller_password' => md5($six_digit_random_number),
  	  	'seller_mobile' => $this->input->post('seller_mobile'),
  	  	'seller_address' => $this->input->post('seller_address'),
  	  	'seller_shop' => $this->input->post('seller_shop'),
		'seller_location' => $this->input->post('location_name'),
  	  	'seller_license' => $this->input->post('seller_license'),
  	  	'seller_adhar' => $this->input->post('seller_adhar'),
  	  	'seller_bank' => $this->input->post('seller_bank'),
  	    'created_at'  => date('Y-m-d H:i:s'),
		'updated_at'  => date('Y-m-d H:i:s'),

  	  	);
  	 // print_r($data);
  	  //exit;
   if(($this->login_model->checksellerEmail($this->input->post('seller_email'),$this->input->post('seller_mobile')))==0)
   {
	$res=$this->login_model->insertseller($data);

    	if($res == 1)

			{
				
		  
        
		 $from_email = 'mails@dev2.kateit.in';
		$subject = 'Registraion';
		$message = "Dear User,\nYou are Registered Successfully. \n Your Password is : " .$six_digit_random_number. "\n\n Thanks,\nCart In Hour Team";
		
		//send mail
		$this->email->from($from_email, 'CartinHours');
		
				$this->email->to($this->input->post('seller_email'));
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send(); 
				
				
				$user_id="cartin"; 
        $pwd="9494422779";    
        $sender_id = "CARTIN";          
        $mobile_num = $phone;  
        $message = "Your Temporary Password is : " .$six_digit_random_number;
        
        
        // Sending with PHP CURL
       $url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
$ret = file($url); 
				

     

                    $this->session->set_flashdata('msg1','<div class="alert alert-success text-center" style="color: green;font-size:13px;">Registered successfully. please Check Your Email or Mobile for Password.</div>');

                  return redirect(base_url('seller_admin/login/register'));


                  
        	}

			else

			{
				//redirect(site_url('add_blogs_view'));
				
                    $this->session->set_flashdata('msg1','<div class="alert alert-success text-center" style="color: red;font-size:13px;">Registration Failed.</div>');
				return redirect('seller_admin/login/register');

			}
   }
   
   else{
	   
	   
	   $this->session->set_flashdata('msg1','<div class="alert alert-success text-center" style="color: red;font-size:13px;">The email/phone number you entered already exist.</div>');
				return redirect('seller_admin/login/register');
	   
	   
   }
    }


public function do_login()

{

        $this->form_validation->set_rules('seller_name', 'Username', 'trim|required'); 

        $this->form_validation->set_rules('seller_password', 'Password', 'trim|required'); 

        if ($this->form_validation->run() == TRUE) {
            $username   = $this->input->post('seller_name');

            $password = md5($this->input->post('seller_password'));

            $result   = $this->login_model->authenticate($username, $password);


//print_r($result); exit;


            if ($result) {

                $data                   = array(

                    'seller_id'    => $result->seller_id,

                    'seller_name'  => $result->seller_name,

                    'seller_email' => $result->seller_email,

                    'loggedin'   => TRUE,

                );

                $this->session->set_userdata($data);
            
                return redirect(base_url('seller_admin/dashboard')); 



            } else {

              //$this->data['message'] = alert_message('Invalid Username/Password', 'danger')

                $this->session->set_flashdata('msg','<div style="color: red;font-size:13px; margin-left: 141px;">Invalid username or password.</div>');

                  return redirect(base_url('seller_admin/login'));

                }

            }

       $this->load->view('seller_admin/login');

}

 public function logout() {

        $data = array(

            'seller_id'        => '',
            'seller_name'  => '',
            'seller_email'     => '',
            'loggedin'  => FALSE,

        );



        $this->session->set_userdata($data);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");
        $this->session->sess_regenerate(TRUE);

        //flash_message('Successfully Logged Out', 'success');
        return redirect(base_url('seller_admin/login'));

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
	
	 echo  '<div class="form-group">';
     echo '<input type="text" class="form-control san_sle" id="usr" placeholder="CIH FEE"  value="' .$result->referral_fee. '">';
           
         echo '</div>';
	
	
	exit;
	}		


public function autocomplete()
	{

     $q = "";
          
         if (isset($_GET['term'])){
         $q = strtolower($_GET['term']);
         $this->login_model->getsubcategories($q);
        
    }
}

public function getproductfield()

{
	
	$subcatname=$this->input->post('tags');
	
	
	
	if(($this->login_model->checksubcat($subcatname))!=0)
	
	
	{
	     echo '<label for="" class="emter">Enter Product Price (including shipping charge to customer)</label>';
         echo '<input type="number" class="form-control san_label" id="product_price" name="product_price" placeholder="₹ 5000">' ;
		 echo '<input type="hidden" value="' .$subcatname. '" id="subcatname" name="subcatname" >' ;
	
	
	exit;
	
	}
	else{
		
		echo "0";
		
		
	}
	
}

public function getreferalfee()
{
    
	
	$product_price=$this->input->post('product_price');
	$subcatname=$this->input->post('subcatname');
	
	$result=$this->login_model->getreferralfee($subcatname);
	
	
	$ref = str_replace("%", "", $result->referral_fee);
	
	$result12 = ($product_price * $ref)/100;
	
	
	
	
	
	 echo '<li>';
     echo '<div class="refer">';
     echo '<h5>CIH Fee</h5>';
     echo '<div class="ci_riup">';
	 
     echo '<h3>₹ '.$result12.'<span class="add_referal">' .$result->referral_fee. '</span></h3>';
	 echo '<input type="hidden" class="form-control san_label" value="'.$result12.'" id="totproduct_price" name="totproduct_price" placeholder="₹ 5000">';
     echo '</div>';
      echo  '</div>';
      echo '</li>';
       echo '<li>';
       echo '<div class="refer">';
       echo '<h5>Closing Fee</h5>';
        echo '<div class="ci_riup">';
       echo '<h3>₹ 10</h3>';
	   echo '<input type="hidden" class="form-control san_label" value="10" id="closing_fee" name="closing_fee" placeholder="₹ 5000">';
        echo '</div>';
      echo '</div>';
       echo '</li>';
	   
	   
	     /*echo '<li>';
            echo '<div class="refer">';
                 echo '<h5>Enter Product Weight in gms</h5>';
                  echo '<div class="ci_riup">';
                    echo '<h3><input type="number" class="form-control san_label" id="product_weight" name="product_weight" placeholder="₹ in gms"></h3>';
					echo '  <button type="submit" id="weight_submit" class="click">Calculate Fees</button>';
                  echo '</div>';
				  
                echo '</div>';
              echo '</li>';*/
	   
	   exit;
	
}

public function shippingcharge()

{
	
	$product_weight=$this->input->post('product_weight');
	
	$product_price=$this->input->post('product_price');
	
	$totproduct_price=$this->input->post('totproduct_price');
	
	$closing_fee=$this->input->post('closing_fee');
	
	$result=$this->subcategory_model->getshippingcharge($product_weight);
	
	
	$result2 = $result->shipping_charges;
	
	$delivery = ($product_price * 1.3)/100 ; 
	$shippingcharge = $delivery + $result2;
	//echo $result->shipping_charges;
	
	$total = $totproduct_price + $closing_fee + $shippingcharge;
	
	$servicetax = ($total * 15)/100;
	
	$totalcharges = $total + $servicetax;
	
	$youmake = $product_price - $totalcharges;
	
	
	
	echo '<li>';
                echo '<div class="refer">';
                  echo '<h5>Shipping Charges Including Delivery Service Fee @1.3%</h5>';
                  echo '<div class="ci_riup">';
                    echo '<h3>₹ '.$shippingcharge.'</h3>';
					echo '<input type="hidden" class="form-control san_label" value="'.$shippingcharge.'" id="delivery_fee" name="delivery_fee" placeholder="₹ 5000">';
                  echo '</div>';
                echo '</div>';
              echo '</li>';
	
	echo '<li>';
                echo '<div class="refer">';
                  echo '<h5>Referral+Closing+Shipping</h5>';
                  echo '<div class="ci_riup">';
                    echo '<h3>₹ '.$total.'</h3>';
					echo '<input type="hidden" class="form-control san_label" value="'.$total.'" id="total_charge" name="total_charge" placeholder="₹ 5000">';
                  echo '</div>';
                echo '</div>';
              echo '</li>';
	
    
			  
			  
			   echo '<li>';
                echo '<div class="refer">';
                  echo '<h5>Service Tax</h5>';
                  echo '<div class="ci_riup">';
                    echo '<h3>₹ '.$servicetax.'<span class="add_referal">@15%</span></h3>';
					echo '<input type="hidden" class="form-control san_label" value="'.$servicetax.'" id="service_tax" name="service_tax" placeholder="₹ 5000">';
                 echo '</div>';
                echo '</div>';
              echo '</li>';
			  
			 echo '<li>';
               echo '<div class="refer">';
                 echo ' <h5>Total Charges<span class="add_referal">You Make</span></h5>';
                  echo '<div class="ci_riup">';
                   echo ' <h3>'.$totalcharges.'<span class="add_referal">'.$youmake.'</span></h3>';
				   echo '<input type="hidden" class="form-control san_label" value="'.$totalcharges.'" id="cost_product" name="cost_product" placeholder="₹ 5000">';
				   echo '<input type="hidden" class="form-control san_label" value="'.$youmake.'" id="you_make" name="you_make" placeholder="₹ 5000">';
                  echo '</div>';
                echo '</div>';
              echo '</li>';
			  
			  
			  
			  
	
			  
			  
			  
			  
exit;			  
}

public function getajaxprofit()

{
	
$you_make=$this->input->post('you_make');
$actual_price=$this->input->post('actual_price');

$result = $you_make - $actual_price;
	
	echo '<li>';
                echo '<div class="refer">';
                  echo '<h5>Calculate Your Profit</h5>';
                  echo '<div class="ci_riup">';
                    echo '<h3>₹ '.$result.'</h3>';
					
                  echo '</div>';
                echo '</div>';
              echo '</li>';
	exit;
	
	
}








public function forgot()
 {
 
 
$email = $this->input->post('forgot_email');
  $phone = $this->input->post('forgot_mobile');
  
    
  $this->load->model('login_model');
  if($email != "" && $phone == "" )
  {
if($this->login_model->checkuseremail($email) == 1)
{

	
	 $pat = $this->login_model->getsellerid($email);	
$six_digit_random_number = mt_rand(100000, 999999);
 $this->login_model->insertrandom($six_digit_random_number,$pat->seller_id);

    $to_email = $email;    
   $from_email = 'mails@dev2.kateit.in';
		$subject = 'Temporary Password';
		$message = "Dear User,\n                
		Your Password is : ".$six_digit_random_number;
		
		//send mail
		$this->email->set_mailtype("html");
		$this->email->from($from_email, 'CartinHours');
		
				$this->email->to($to_email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
        echo "7";
}
else{

echo "4";

}	

}
	
	
	
else if($phone !="" && $email == "")
{

if($this->login_model->checkusermobile($phone) == 1)
{
	
	$pat = $this->login_model->getsellermobile($phone);	
$six_digit_random_number = mt_rand(100000, 999999);
 $this->login_model->insertrandom($six_digit_random_number,$pat->seller_id);
	
	
	//$this->login_model->insertrandom($six_digit_random_number,$phone);
$user_id="cartin"; 
        $pwd="9494422779";    
        $sender_id = "CARTIN";          
        $mobile_num = $phone;  
        $message = "Your Temporary Password is : " .$six_digit_random_number;
        
        
        // Sending with PHP CURL
       $url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
$ret = file($url); 
         
       if( $ret)
        
        {
        echo "8";
		}
}
else {
	
	echo "5";
}
}

else if($phone !="" && $email != "")		
{
if($this->login_model->checkusermobileemail($phone,$email) == 1)
{
	$pat = $this->login_model->getselleridall($phone,$email);	
$six_digit_random_number = mt_rand(100000, 999999);
$this->login_model->insertrandom($six_digit_random_number,$pat->seller_id);
$to_email = $email;    
   $from_email = 'mails@dev2.kateit.in';
		$subject = 'Temporary Password';
		$message = "Dear User,\n                
		Your Password is : ".$six_digit_random_number;
		
		//send mail
		$this->email->set_mailtype("html");
		$this->email->from($from_email, 'CartinHours');
		
				$this->email->to($to_email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();


$user_id="cartin"; 
        $pwd="9494422779";    
        $sender_id = "CARTIN";          
        $mobile_num = $phone;  
        $message = "Your Temporary Password is : " .$six_digit_random_number;
        
        
        // Sending with PHP CURL
       $url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
$ret = file($url); 

echo "9";
}
else{
	
	echo "6";
	
}

}	
else
{

echo "0";

}		
  
  
  

 
 
 
 }


       
}