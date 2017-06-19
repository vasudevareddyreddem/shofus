<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Seller_adddetails.php');

class Storedetails extends Seller_adddetails{

	public function __construct() {
		parent::__construct();
    $this->load->model('seller/storedetails_model');
}

 public function index() {	 
  //$sid= $this->session->userdata('seller_id');
  //echo $sid;
 
  $this->template->write_view('content', 'seller/storedetails/index');
    $this->template->render();
        //$this->template->render(); 
  }
  //store 
    public function updatestoredetails()
  {  
      $data=$this->input->post();
    unset($data['submit']);
  // echo "<pre>";
  //print_r($_FILES); exit;
    $filename="report_".rand(1000,time());//time();
    $config['upload_path'] ='uploads/reports/';
    $config['allowed_types'] = '*';
    $config['file_name']= $filename;
    $config['overwrite']= FALSE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $imageDetailArray = array();
    $images=array();
//echo '<pre>';print_r($_FILES);exit;	
    

    $shop_open = $this->input->post('seller_open_time');
    $shop_close= $this->input->post('seller_close_time');
    $shop_total = $shop_open .'-'. $shop_close;

   $data = array(
    'seller_id' => $this->session->userdata('seller_id'),
    'seller_business_name' => $this->input->post('business_name'),
    'seller_location' => $this->input->post('seller_location'),
    'number_oulets' => $this->input->post('out_lets'),
    'delivery_own_us' => $this->input->post('delivery_own_us'),
    'seller_servicetime' => $shop_total,

    'orther_shop_location' => $this->input->post('other_shop'),
    'any_web_link' => $this->input->post('web_link'),    
    'created_at'  => date('Y-m-d H:i:s'),
    'updated_at'  => date('Y-m-d H:i:s')
  
  );
    $res=$this->storedetails_model->insertseller_store($data);
	  

    if((count($res)>0))
      {
		  		  //echo '<pre>';print_r($_FILES['report_file']['name']);exit;

		for($i=0; $i<count($_FILES['report_file']['name']); $i++)
    {
    $_FILES['userfile']['name']= $_FILES['report_file']['name'][$i];
    $_FILES['userfile']['type']= $_FILES['report_file']['type'][$i];
    $_FILES['userfile']['tmp_name']= $_FILES['report_file']['tmp_name'][$i];
    $_FILES['userfile']['error']= $_FILES['report_file']['error'][$i];
    $_FILES['userfile']['size']= $_FILES['report_file']['size'][$i];
      $img_result=$this->storedetails_model->insertFiles( $_FILES['report_file']['name'],$res);

    }
      }
    if($res == 1)

      {

        $this->session->set_flashdata('msg2','<div class="alert alert-success text-center" style="color: green;font-size:13px;">successfully. </div>');

        return redirect('seller/personaldetails');

      }

    }


    



}