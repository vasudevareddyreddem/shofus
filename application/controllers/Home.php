<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');

class Home extends Front_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('customer_model');
		$this->load->model('home_model');
		$this->load->model('category_model');
		$this->load->library('cart');
        $this->load->library('session');
		//$this->load->library('Instamojo');
		 if($this->session->userdata('location_area')=='')  {
	
	//echo "dfdf";exit;
	}
	}

public function index()

 {
		
	if($this->session->userdata('seller_id')!=''){
		redirect('seller/dashboard');
	}
	  if($this->session->userdata('userdetails'))
		{
		$customerdetails=$this->session->userdata('userdetails');
		if($customerdetails['role_id']==5){
			redirect('inventory/dashboard');
		}else if($customerdetails['role_id']==2){
			redirect('admin/dashboard');
		}else if($customerdetails['role_id']==6){
			redirect('deliveryboy/dashboard');
		}
	 }
	 
	 $post=$this->input->post();
	 
	 if(isset($post['locationid']) && $post['locationid']!=''){
		 
			$locationdata= $this->home_model->getlocations();
			$loacationname=array();
				foreach ($locationdata as $list){
					if ($list['location_id']==$post['locationid']) {
						$loacationname[]=$list['location_name'];
						$loacationidslist[]=$list['location_id'];
					}
				}
			$locationdatadetails=implode(", ",$loacationname);
			$this->session->set_userdata('location_area',$locationdatadetails);
			$this->session->set_userdata('location_ids',$loacationidslist);
			$data['locationnames']=$locationdatadetails;
			$data['seemore']=$post['locationid'];
			if($this->session->userdata('userdetails'))
			{
			$customerdetails=$this->session->userdata('userdetails');
			$updatearea = $this->customer_model->update_sear_area($customerdetails['customer_id'],$post['locationid']);	
			}
				$data['topoffers'] = $this->home_model->get_top_offers($post['locationid']);
				$data['trending_products'] = $this->home_model->get_trending_products($post['locationid']);
				$data['offer_for_you'] = $this->home_model->get_offer_for_you($post['locationid']);
				$data['deals_of_the_day'] = $this->home_model->get_deals_of_the_day($post['locationid']);
				$data['season_sales'] = $this->home_model->get_season_sales	($post['locationid']);
				$data['homepage_banner'] = $this->home_model->get_home_pag_banner();
				
		 
	 }else{
			$id='';
			$data['topoffers'] = $this->home_model->get_top_offers($id);
			$data['trending_products'] = $this->home_model->get_trending_products($id);
			$data['offer_for_you'] = $this->home_model->get_offer_for_you($id);
			$data['deals_of_the_day'] = $this->home_model->get_deals_of_the_day($id);
			$data['season_sales'] = $this->home_model->get_season_sales	($id);
			$data['homepage_banner'] = $this->home_model->get_home_pag_banner();
			$data['seemore']=$id;
	 }
	 //echo '<pre>';print_r($post);exit;
		
	
		
	
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
	if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'home/index',$data);
	$this->template->render();
}



public function search_functionality(){
	
	$post=$this->input->post();
	$data1 = $this->home_model->get_search_functionality_products($post['searchvalue']);
	$data2 = $this->home_model->get_search_functionality_sub_category($post['searchvalue']);
	$data['detail']=array_merge($data1,$data2);
	//echo "<pre>";print_r($data);exit;
	$this->load->view('customer/search',$data);
}

 public function addtocart()

 {
		 
	$this->template->write_view('content', 'home/cart_view');
	$this->template->render();
 }
 
 public function shipping_address()
 {
   $this->template->write_view('content', 'home/shipping_address');
		$this->template->render();
 } 
 
 public function productsview()

 {
	 
$cat_id = str_replace('%20',' ',$this->uri->segment(3));
$subcat_id = str_replace('%20',' ',$this->uri->segment(4));


$count=$this->home_model->getproductdatacount($cat_id,$subcat_id);

$this->load->library('pagination');

  $config = [
   'base_url'   => base_url('home/productsview/'.$cat_id.'/'.$subcat_id.'/index'),
   'per_page'   => 12,
   'total_rows'  => $count,
   'full_tag_open'  => "<ul class='pagination'>",
   'full_tag_close' => "</ul>",
   'first_tag_open' => '<li>',
   'first_tag_close' => '</li>',
   'last_tag_open'  => '<li>',
   'last_tag_close' => '</li>',
   'next_tag_open'  => '<li>',
   'next_tag_close' => '</li>',
   'prev_tag_open'  => '<li>',
   'prev_tag_close' => '</li>',
   'num_tag_open'  => '<li>',
   'num_tag_close'  => '</li>',
   'cur_tag_open'  => "<li class='active'><a>",
   'cur_tag_close'  => '</a></li>',
  ];

  $this->pagination->initialize($config);




$result=$this->home_model->getproductdata($cat_id,$subcat_id,$config['per_page'],$this->uri->segment(6));








//echo $subcat_id ; exit;
//echo str_replace('%20',' ',$subcat_id); exit;
$data['catdat'] = $cat_id;
$data['subcatdata'] = $this->home_model->getsubcatdata($cat_id);
$data['productdata'] = $result;	 
		 
$this->template->write_view('content', 'home/products_view',$data);
		$this->template->render();
	

		

 }
 public function payment(){
	 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:8317303df6f7ccd8bcad8b1c3a603bc5",
                  "X-Auth-Token:747e55b2bc291b12ac9737d796ce032e"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://dev2.kateit.in/php/cartinhour_new',
    'send_email' => true,
    'webhook' => 'http://dev2.kateit.in/php/cartinhour_new',
    'send_sms' => true,
    'email' => 'sandeep@kateit.in',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

//echo $response;
$res = json_decode($response);
//print_r($res) ;exit;
//$r = json_decode(json_encode($res),true);


 $id=$res->payment_request->id;
$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/$id');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
             array("X-Api-Key:8317303df6f7ccd8bcad8b1c3a603bc5",
                  "X-Auth-Token:747e55b2bc291b12ac9737d796ce032e"));
$response = curl_exec($ch);
curl_close($ch); 





echo $response;


 }
 
 function add()
	{
		$cat_id = str_replace('%20',' ',$this->uri->segment(3));
		$subcat_id = str_replace('%20',' ',$this->uri->segment(4));
		//echo $cat; echo $subcat; exit;
		//echo $this->input->post('pro_image'); exit;
              // Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'pro_image' => $this->input->post('pro_image'),
			'item_quantity' => $this->input->post('item_quantity'),
			'qty' => 1
		);		

                 // This function add items into cart.
		$this->cart->insert($insert_data);
	      
                // This will show insert data in cart.
		//$data['productdata'] = $this->home_model->getproductdata($cat_id,$subcat_id);	 
		 $this->session->set_flashdata('verify_msg', 'product added to the cart sucessfully');
echo "<script>window.location='".base_url()."home/productsview/".$cat_id."/".$subcat_id."'</script>";



	     }
		 
function remove($rowid) {
                    // Check rowid value.
					
		if ($rowid=="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('home/addtocart');
	}		 
		 
		 
		 
		 
		 
 function update_cart(){
                
				
				//echo "sdfsd"; exit;
                // Recieve post values,calcute them and update
                $cart_info =  $_POST['cart'] ;
				//print_r( $_POST['cart']); exit;
 		foreach( $cart_info as $id => $cart)
		{	
		     if($cart['item_quantity'] >= $cart['qty']) {
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
			 }
		}
		redirect('home/addtocart');        
	}	
	
public function location()
{

$session=array('location_name'=>$this->input->post('location_name'));

$this->session->set_userdata($session);

 echo "1";
}


public function signup() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('home_model');
            
           
                $obj    = array(
                        
                        'user_name' => $this->input->post('user_name'),
                        'user_email'     => $this->input->post('user_email'),
						'user_mobile'     => $this->input->post('user_phone'),
                        'user_password'  => md5($this->input->post('user_password')),
                        'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s'),
                    );
      if(($this->home_model->checkuserEmail($this->input->post('user_email')))==0)
	  {
                $inserted_id         = $this->home_model->userinsert($obj);

                if ($inserted_id) {
                    
                    //$this->home_model->sendEmail($this->input->post('user_email'));
		
                    echo "1";
                } else {
                    echo "0";
                }
		}
		else{
			echo "2";
		}
            
        }
    }
	
	  /*function verify($hash=NULL)
	{
	
	$dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $hash);
      $db_email =$this->encrypt->decode($dec_username);
	  
	  $result=$this->home_model->getregstatus($db_email);
	  
	  if($result->status == "0")
	  {
	
		if ($this->home_model->verifyEmailID($db_email))
		{
		$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
		//redirect(Please login to access your account);
		echo "<script>window.location='".base_url()."home/verifyemail'</script>";
		
		}
		else
		{
		$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
		//redirect('Login/');
		echo "<script>window.location='".base_url()."home/verifyemail'</script>";
		
		}
		
	  }
	  
	  else{
		  
		 echo "<script>window.location='".base_url()."home/emailexpired'</script>"; 
		  
		  
	  }
	}*/
	
	/*public function verifyemail(){
		
		$this->load->view('home/emailverified');         
    
    }
	public function emailexpired(){
		
		$this->load->view('home/registrationlink_expires');         
    
    }*/

 public function login()
 {

if ($this->input->is_ajax_request()) {
            $this->load->model('home_model');
            //$login = $this->input->post('login');
           
            
                $email    = $this->input->post('user_email');
                $password = md5($this->input->post('user_password'));
                $result   = $this->home_model->authenticate($email, $password);
                if ($result) {
                    $data = array(
                        'user_id'        => $result->user_id,
                        'user_name' => $result->user_name,
                        'user_email'     => $result->user_email,
                        'user_loggedin'  => TRUE,
                    );
        
                      date_default_timezone_set('Asia/Kolkata');
      
         $user_id =  $result->user_id;
         $last_login  = (new \DateTime())->format('Y-m-d H:i:s');
         $result1 = $this->home_model->updatetime($user_id, array(
                  'updated_at'=> $last_login,
                      ));
         

                    $this->session->set_userdata($data);
                    echo "1";
                }
                 else {
                    echo "0";
                }
            
        
    }




 }

  public function logout() {
        $data = array(
            'user_id'        => '',
            'user_name'  => '',
            'user_email'     => '',
            'loggedin'  => FALSE,
        );
        $this->session->set_userdata($data);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->session->sess_regenerate(TRUE);
        //flash_message('Successfully Logged Out', 'success');
        return redirect(base_url(''));
    }

public function doforget()
	{
		$x=$this->encrypt->encode($this->input->post('lost_email'));
		$x=str_replace(array('+', '/', '='), array('-', '_', '~'), $x);
		
		if ($this->home_model->checkEmailExits($this->input->post('lost_email')))
		{
		$from_email = 'admin@uncancer.com';
		$subject = 'Reset Your Password';
		$message = "Dear User,\nPlease click on below URL to change the password\n\n http://uncancerindia.org/home/changepwd/". $x ."?id=changepwd"."\n\nThanks,\nUncancer Team";
		
		//send mail
		$this->email->from($from_email, 'Uncancer');
		
				$this->email->to($this->input->post('lost_email'));
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				$this->home_model->updateforgotstatus($this->input->post('lost_email'));
				
		
			
			 echo json_encode(array('success' => true));
		
        }
		else
		{
			
	   echo json_encode(array('success' => false, 'message' => 'Its not a Registered Email ID'));
			

		}
		
	
		}
	public function changepwd()
	{
		
    
		$z=$this->uri->segment('3');
 $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $z);
 $db_email =$this->encrypt->decode($dec_username);

	$data['forgotstatus1']=$this->home_model->getforgotstatus($db_email);
    
		$this->load->view('home/changepwd_view',$data);
		
              
    
    }
	
public function changepassword()
{
	$z=$this->uri->segment('3');
 $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $z);
 $db_email =$this->encrypt->decode($dec_username);

	$data['forgotstatus1']=$this->home_model->getforgotstatus($db_email);
	$this->load->library('form_validation');
	//$this->form_validation->set_rules('Email','Current Email','trim|callback_change');
	$this->form_validation->set_rules('npassword','New Password','required|trim|callback_change');
	$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');
	
	if ($this->form_validation->run() == FALSE)
 
    {
    
		$this->load->view('home/changepwd_view',$data);
		
              
    }
	
}	
	
	
	public function change() 
{
 $z=$this->uri->segment('3');
 $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $z);
 $db_password =$this->encrypt->decode($dec_username);
$fixed_pw = md5($this->input->post('npassword'));
     $update = $this->db->query("Update user SET user_password='$fixed_pw' WHERE user_email='$db_password '")or die(mysql_error()); 
if($update)
   $this->home_model->updateforgotstatus1($db_password);
$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color: #7BAE52;">
<strong>Your Password Updated! Please <a href="'.base_url().'">Login</a> to Continue</strong></div>');
//return redirect(base_url('home/changepwd_view'));
return false; 

	

}
	 
public function single_product()

{
	$id = $this->uri->segment(3);

	$result = $this->home_model->getsubcategoryid($id);
	$data['singleproduct']=$this->home_model->getsingleproduct($id);
	$data['mutiimages']=$this->home_model->getmultipleimag($id);
	$data['similarproducts']=$this->home_model->getsimilarproducts($result->subcategory_id);
	$this->template->write_view('content', 'home/single_product', $data);
	$this->template->render();	
	
	
	
	
	
}

public function addtocompare()
{

//echo "<pre>";print_r($id);exit;
	$id = $this->input->post('id');
	//echo "<pre>";print_r($id);exit;
	// $_SESSION['id'] = array();
	// $test =array_push($_SESSION['id'],$id);
	// print_r($test);exit;	
	// $old_ary =array();

	$old_compare =  $this->session->userdata('id');
	array_push($old_compare, $id[$_POST['id']]);
	$tests = $this->session->set_userdata('id', $old_compare);
	foreach ($tests as $test) {
		$test_id =$test['item_id'];
	}

	print_r($test_id);exit;	



	// $old_compare =  $this->session->userdata($this->input->post('id'));
	// $old_compare =array();
	// $test =array_push($_SESSION['id'],$id);	
	// //echo "<pre>";print_r($old_compare);exit;
	//  // array_push($old_compare, $old_ary);
	//  // $total =$this->session->set_userdata('id', $old_compare);
	//  echo "<pre>";print_r($test);exit;

	// $this->db->select('*')->from('products');
 	//$this->db->where('admin_status','0');
	// $this->db->where('item_id', $id);
	// return $this->db->get()->result_array();
	//echo "<pre>";print_r($id);exit;	
	

}




	 
 
}