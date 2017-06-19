
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Seller_adddetails.php');

class Sellercategories extends Seller_adddetails{

	public function __construct() {
		parent::__construct();
		$this->load->model('seller/products_model');
    $this->load->model('seller/sellercat_model');
}

 public function index() {	 
 	$data['getcat'] = $this->products_model->getcatdata();
  $this->template->write_view('content', 'seller/sellercategories/index',$data);
    $this->template->render();
        //$this->template->render(); 
  }
  
  //store 
    public function updatesellercat() 
  {  
   $data = array(
    'seller_id' => $this->session->userdata('seller_id'),
    'seller_category_id'=> $this->input->post('seller_cat'),
    
  );
   //echo '<pre>';print_r($data);exit();
    $res=$this->sellercat_model->insertseller_cat($data);
    if($res == 1)
      {
        $this->session->set_flashdata('msg2','<div class="alert alert-success text-center" style="color: green;font-size:13px;">successfully. </div>');
        return redirect('seller/personaldetails');
      }
    }
    public function savesubcat(){
		
    $post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
    $data=array(
        'seller_id' => $this->session->userdata('seller_id'),
        'seller_category_id' => $post['sub_cat_id'],
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s')

    );
   // echo '<pre>';print_r($data);exit();
        $res=$this->sellercat_model->save_sub_cat_id($data);

    
    
  }





}