<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->helper(array('url', 'html'));
	$this->load->library('email');
	$this->load->library('encrypt');
	$this->load->library('session');
	$this->load->model('seller/login_model');
	$this->load->model('admin/sellers_model');
	$this->load->model('seller/dashboard_model');
	$this->load->model('seller/login_model');
	$this->load->model('seller/subcategory_model');
	
	$incompleteregisters=$this->login_model->get_all_seller_registers();
	
	foreach($incompleteregisters as $all_lists){
		$sellerdetails=$this->login_model->delete_pending_seller_details($all_lists['seller_id']);
		$storedetails=$this->login_model->delete_pending_seller_store_details($all_lists['seller_id']);
		$incompletecat=$this->login_model->get_pending_seller_cat_details($all_lists['seller_id']);
		foreach($incompletecat as $all_subcategory){
			$deletependingcats=$this->login_model->delete_pending_seller_cat_details($all_subcategory['seller_cat_id']);
		}
        $this->session->unset_userdata('seller_id');
	}
	//echo '<pre>';print_r($incompleteregisters); exit;     
}

 public function index() {
	 
	$seller_id=$this->session->userdata('seller_id');
	if($seller_id!=''){
		redirect('seller/dashboard');
	}else{
		$data['cihcatdata']  = $this->login_model->getcihcatedata();
		$this->load->view('seller/header');
		$this->load->view('seller/login',$data);
		$this->load->view('seller/footer');
	}
	
  }
  public function aboutus() {
	 
		$this->load->view('seller/header');
		$this->load->view('seller/aboutus');
		$this->load->view('seller/footer');
	
  }
  public function contactus() {
	 
		$this->load->view('seller/header');
		$this->load->view('seller/contactus');
		$this->load->view('seller/footer');
	
  }


 public function register() {

 $data['email'] = $this->input->post('seller_email');
 
  $data['phone'] = $this->input->post('seller_phone');
  
  $data['locationdata']=$this->login_model->getlocation();
 
  	$this->load->view('seller/header');
  	$this->load->view('seller/register',$data);
	$this->load->view('seller/footer');
    }


// Terms and Conditions
    public function termsandconditions() {
	$this->load->view('seller/header');
	$this->load->view('seller/termsandconditions');
	$this->load->view('seller/footer');
    }

public function insert() {
	$post = $this->input->post();
	//echo "<pre>";print_r($post);exit;
	//echo "hi"; exit;
	$six_digit_random_number = mt_rand(100000, 999999);
	$seller = 'SEL';
	$seller_rand_id = mt_rand(100000, 999999);
	$phone = $this->input->post('seller_mobile');
	$password_status = 0;
  $data = array(
  		'seller_rand_id' => $seller.''.$seller_rand_id,
  		'password_status' => $password_status,
  	  	'seller_password' => md5($six_digit_random_number),
  	  	'seller_mobile' => $post['seller_mobile'],
  	  	'any_refer'=>$post['any_ref'],
   	    'created_at'  => date('Y-m-d H:i:s'),
		'updated_at'  => date('Y-m-d H:i:s')

  	  	);
  //echo "<pre>";print_r($data);exit;
   if(($this->login_model->checksellerEmail($this->input->post('seller_email'),$this->input->post('seller_mobile')))==0)
   {
	$res=$this->login_model->insertseller($data);

    	if(count($res)>0 )

			{
			$this->session->set_userdata('seller_id',$res);
			//echo '<pre>';print_r($res);exit;
			$data=array('seller_id'=>$res);
			$addstoredetails=$this->login_model->addind_seller_id($data);
			
		//  $from_email = 'mails@dev2.kateit.in';
		// $subject = 'Registraion';
		// $message = "Dear User,\nYou are Registered Successfully. \n Your Password is : " .$six_digit_random_number. "\n\n Thanks,\nCart In Hour Team";
		
		// //send mail
		// $this->email->from($from_email, 'CartinHour');
		
		// 		$this->email->to($this->input->post('seller_email'));
		// 		$this->email->subject($subject);
		// 		$this->email->message($message);
		// 		$this->email->send(); 							
				$user_id="cartin"; 
        		$pwd="9494422779";    
        		$sender_id = "CARTIN";          
        		$mobile_num = $phone;  
        		$message = "Your Temporary Password is : " .$six_digit_random_number;               
        // Sending with PHP CURL
       $url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
			$ret = file($url); 
                   
                  echo "1";              
        	}
			else
			{
			
                    $this->session->set_flashdata('msg1','<div class="alert alert-success text-center" style="color: red;font-size:13px;">Registration Failed.</div>');
				

			}
   }
   
   else{
	   	   echo "0";
	   
	   
	   
   }
    }





    public function do_login()
	{
        $this->form_validation->set_rules('login_email', 'Username', 'trim|required'); 
        $this->form_validation->set_rules('login_password', 'Password', 'trim|required'); 
        if ($this->form_validation->run() == TRUE) {
            $username   = $this->input->post('login_email');
            $password = md5($this->input->post('login_password'));           
            $result   = $this->login_model->selleruser_login($username, $password);
			if($result['status']!=0){
			//echo '<pre>';print_r($result); exit;            
             if(count($result)>0) {
                $datavalue= array(
                    'seller_id'    		=> $result['seller_id'],
                    'seller_name'   	=> $result['seller_name'],
                    'seller_address'    => $result['seller_address'],
                    'seller_rand_id'    => $result['seller_rand_id'],                   
                    'loggedin'   		=> TRUE,
                );
                //echo '<pre>';print_r($datavalue);exit;
                $this->session->set_userdata($datavalue);
				$this->session->set_flashdata('welcome',"Thank you for visit, Welcome to Seller Portal");
				echo "0";
            } else {              
				echo "1";
				}
				
			}else{
				echo "2";
			}
                

            }

       

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
        return redirect(base_url('seller/login'));

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
		$post=$this->input->post();
		if($post['option']==0){
		$checkmobile=$this->login_model->verify_mobile($post['mobile_number']);	
		//echo '<pre>';print_r($checkmobile);exit;
		if(count($checkmobile)>0){
			
				$six_digit_random_number = mt_rand(100000, 999999);
				$updatepassword=$this->login_model->update_forgotpassword($checkmobile['seller_id'],$six_digit_random_number);
				//echo $this->db->last_query();exit;				
				//echo '<pre>';print_r($updatepassword);exit;
				$user_id="cartin"; 
				$pwd="9494422779";    
				$sender_id = "CARTIN";          
				$mobile_num = $post['mobile_number'];  
				$message = "Your Temporary Password is : " .$six_digit_random_number;        
				// Sending with PHP CURL
				$url="http://smslogin.mobi/spanelv2/api.php?username=".$user_id."&password=".$pwd."&to=".urlencode($mobile_num)."&from=".$sender_id."&message=".urlencode($message);
				$ret = file($url); 
				if($ret)
				{
					//echo '<pre>';print_r($ret);exit;
				$data['sendmsg']=1;
				echo json_encode($data);
				}else{
				$data['sendmsg']=0;
				echo json_encode($data);	
				}
			
			
			
			
		}else{
			$data['nomobile']=0;
			echo json_encode($data);
		}
			
		}elseif($post['option']==1){
			
			$checkemail=$this->login_model->verify_email($post['mobile_number']);	
			if(count($checkemail)>0){
				$six_digit_random_number = mt_rand(100000, 999999);
				$updatepassword=$this->login_model->update_forgotpassword($checkemail['seller_id'],$six_digit_random_number);
				
			//send mail
				//$this->email->set_mailtype("html");
				$this->load->library('email');
				$this->email->from('admin@cartinhour.com', 'CartInHour');
				$this->email->to($post['mobile_number']);
				$this->email->subject('CartInHour - Unable To Login');
				$Unable_otp = "Dear User,\n Your Password is : ".$six_digit_random_number;
				$this->email->message($Unable_otp);
				$this->email->send();
				$data['mailsend']=1;
			echo json_encode($data);
			}else{
			$data['noemail']=0;
			echo json_encode($data);
			}
		}
		


	}


       
}