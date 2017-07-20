<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');


class Payments extends Admin_Controller {

	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('seller/dashboard_model');
		$this->load->model('seller/payments_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$count = $this->payments_model->getpaymentdetails();
		$total_count = count($count);
		 $config = [
	   'base_url'   => base_url('seller/payments/index'),
	   'per_page'   => 20,
	   'total_rows'  => $total_count,
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

       $data = $this->dashboard_model->bank_status();
  //echo "<pre>";print_r($data);exit;
  if($data['0']['bank_complete']==0){
    redirect('seller/dashboard');
  }else{
				
       $data['paymentsdata'] = $this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->getpaymentdetails();
		
		$this->template->write_view('content', 'seller/payments/index', $data);
		$this->template->render();
	}


	}
	
public function seller_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->payments_model->seller_search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('seller/payments/seller_search'),
               'per_page'       =>  5,
               'total_rows'     =>  $result2,
               'full_tag_open'  =>  "<ul class='pagination'>",
               'full_tag_close' =>  "</ul>",
               'first_tag_open' =>  '<li>',
               'first_tag_close'=>  '</li>',
               'last_tag_open'  =>  '<li>',
               'last_tag_close' =>  '</li>',
               'next_tag_open'  =>  '<li>',
               'next_tag_close' =>  '</li>',
               'prev_tag_open'  =>  '<li>',
               'prev_tag_close' =>  '</li>',
               'num_tag_open'   =>  '<li>',
               'num_tag_close'  =>  '</li>',
               'cur_tag_open'   =>  "<li class='active'><a>",
               'cur_tag_close'  =>  '</a></li>',
              ];

             $this->pagination->initialize($config);
            //$this->load->view('welcome_message');
            $result=$this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->seller_search($match);
            $data['paymentsdata'] =  $result;
            $this->template->write_view('content', 'seller/payments/index',$data);

            $this->template->render();

  }
	
}