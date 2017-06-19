<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class New_orders extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/deliveryboy_model');
		$this->load->model('admin/new_orders_model');

    }

 public function index()

	{

	$this->load->library('pagination');
		$result=$this->new_orders_model->get_neworders();
		$result1=$this->new_orders_model->get_deliveryboys();
		//echo "<pre>";print_r($result);exit;
		$data['newordersdata'] =  $result;
                $data['deliveryboysdata'] =  $result1;
		$this->template->write_view('content', 'admin/new_orders/index',$data);
		$this->template->render();

	}
public function view_detail()
{

  $id = $this->uri->segment('4');

  $data['newordersdata'] = $this->new_orders_model->get_view_neworderdata($id);

  //echo "<pre>";print_r($data);exit;
  $this->template->write_view('content', 'admin/new_orders/view_details',$data);

  $this->template->render();

}
public function view_details()
{

  $id = $this->uri->segment('4');

  $data['newordersdata'] = $this->new_orders_model->get_neworderdata($id);

  //echo "<pre>";print_r($data);exit;
  $this->template->write_view('content', 'admin/new_orders/view_details',$data);

  $this->template->render();

}

public function search()
{        
       
       $match = $this->input->post('search');
      // echo $match;exit;

           $this->load->library('pagination');
	  if($match=='' || $match=='Not Assigned' || $match=='not assigned' )
	  {
          $result=$this->new_orders_model->get_neworders();
	  }
	  else{
		$result=$this->new_orders_model->search($match);
		}
		
		$data['newordersdata'] =  $result;
		
		$this->template->write_view('content', 'admin/new_orders/index',$data);
		$this->template->render();

}

}	
