<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Dashboard extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library(array('form_validation','session'));
		$this->load->model('seller/dashboard_model');
		$this->load->model('seller/adddetails_model');
		$this->load->model('admin/sellers_model');
		$this->load->model('seller/products_model');
		
		
		
	}

	public function index()
	{
		
		$data['sellersubcatdata'] = $this->dashboard_model->getsellersubcatdata();		
		$data['returnitemdata'] = $this->products_model->returns();
		$data['seller_ad'] = $this->dashboard_model->seller_ads();
		$data['sellerscats'] = $this->dashboard_model->seller_cats();
		//echo '<pre>';print_r($data);exit;
		
		$this->template->write_view('content', 'seller/dashboard/index', $data);
		$this->template->render();
	}
	
	public function subcategoryview()
	{
		$cat_id = $this->uri->segment(4);
		$data['sellerdata'] = $this->dashboard_model->getsellerdata($cat_id);
		//$this->load->view('welcome_message');
		//echo "ddg"; exit;
		//$data['sellersubcatdata'] = $this->dashboard_model->getsellersubcatdata();
		
	//print_r($data['sellerdata']); exit;
		$this->template->write_view('content', 'seller/dashboard/subcategory_view', $data);
		$this->template->render();


	}
	
	public function change_password()
	 
	 {
		$this->template->write_view('content', 'seller/dashboard/change_password');

			$this->template->render();  
		 
		 
		 
	 }
 public function success()
 
 {
  $this->template->write_view('content', 'seller/dashboard/success');

    $this->template->render();  
 }

 
	
	public function updatepassword()

  {


    if( $this->form_validation->run('changepassword_rules'))

    {
        $this->load->model('home_model');
           //$old_password =  md5($this->input->post('old_password'));
           $new_password =  md5($this->input->post('new_password'));
           $repeat_password =  $this->input->post('repeat_password');      
           $seller_id = current_seller()->seller_id;
         //  echo $user_id; exit;

          if($seller_id)

          {

             $result=$this->sellers_model->get($seller_id);
           //  print_r($result); exit;

            $password = $result->seller_password;
         /*   echo $password."<br>";
             echo $old_password;
            exit; */

          if($password == $new_password){

          $data = array(

            'seller_password' => md5($this->input->post('new_password'))

            );
             //print_r($data);
             //exit;
         $res=$this->sellers_model->update($seller_id,$data);
          if($res)
         {
              $this->prepare_flashmessage("Successfully Updated Your Password..", 0);
              return redirect('seller/dashboard/change_password');
          }
          else
          {
                $this->prepare_flashmessage("Failed to Update Your Password..", 1);
                return redirect(base_url('seller/dashboard/change_password'));
          }
          //echo "hello";
         }else{

                 $this->prepare_flashmessage("Please Enter Current Password Correctly ..", 1);
                  return redirect(base_url('seller/dashboard/change_password'));
              }

}

}else{
        $this->template->write_view('content', 'seller/dashboard/change_password');
        $this->template->render();

  }
}


 public function linkaccout()
 {
 	$this->template->write_view('content', 'seller/dashboard/link_youraccount');
	$this->template->render();  
 }

 public function accountupdate()
 {  

   $post=$this->input->post();
   //echo "<pre>";print_r($post);exit;
 
   $data = array(
    'seller_bank_account' => $post['bank_account'], 
    'seller_account_name' => $post['account_name'],
    'seller_aaccount_ifsc_code' => $post['ifsccode'],    
    'created_at'  => date('Y-m-d H:i:s'),
    'updated_at'  => date('Y-m-d H:i:s')
  
  );
   //echo '<pre>';print_r($data);exit;
    $result=$this->adddetails_model->seller_personal_details($data,$this->session->userdata('seller_id'));
   
    if(count($result)>0)
      {
		$this->session->set_flashdata('succes','Your Account Link Successfully');
		return redirect('seller/dashboard');

      }


    }

	
	
	
}