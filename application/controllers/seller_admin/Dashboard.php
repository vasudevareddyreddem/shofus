<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');


class Dashboard extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('seller_admin/dashboard_model');
		$this->load->model('admin/sellers_model');
		
		
	}

	public function index()
	{
		
		//$this->load->view('welcome_message');
		//echo "ddg"; exit;
		$data['sellersubcatdata'] = $this->dashboard_model->getsellersubcatdata();
		
		//print_r($data['sellersubcatdata']); exit;
		$this->template->write_view('content', 'seller_admin/dashboard/index', $data);
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
		$this->template->write_view('content', 'seller_admin/dashboard/subcategory_view', $data);
		$this->template->render();


	}
	
public function change_password()
 
 {
	 
	 
	$this->template->write_view('content', 'seller_admin/dashboard/change_password');

		$this->template->render();  
	 
	 
	 
 }
	
	public function updatepassword()

  {


    if( $this->form_validation->run('changepassword_rules'))

    {
        $this->load->model('home_model');
           $old_password =  md5($this->input->post('old_password'));
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

          if($password == $old_password){

          $data = array(

            'seller_password' => md5($this->input->post('new_password'))

            );
             //print_r($data);
             //exit;
         $res=$this->sellers_model->update($seller_id,$data);
          if($res)
         {
              $this->prepare_flashmessage("Successfully Updated Your Password..", 0);
              return redirect('seller_admin/dashboard/change_password');
          }
          else
          {
                $this->prepare_flashmessage("Failed to Update Your Password..", 1);
                return redirect(base_url('seller_admin/dashboard/change_password'));
          }
          //echo "hello";
         }else{

                 $this->prepare_flashmessage("Please Enter Current Password Correctly ..", 1);
                  return redirect(base_url('seller_admin/dashboard/change_password'));
              }

}

}else{
        $this->template->write_view('content', 'seller_admin/dashboard/change_password');
        $this->template->render();

  }
}

	
	
	
}