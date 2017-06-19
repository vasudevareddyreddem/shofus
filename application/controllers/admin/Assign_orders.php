<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Assign_orders extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/deliveryboy_model');
		$this->load->model('admin/assign_orders_model');

    }

 public function index()

	{

		$this->load->library('pagination');
		$result=$this->assign_orders_model->get_busydeliveryboys();
		//echo "<pre>";print_r($result);exit;
		$result1=$this->assign_orders_model->get_freedeliveryboys();
		//echo "<pre>";print_r($result1);exit;
		$data['busydeliveryboysdata'] =  $result;
		$data['freedeliveryboysdata'] =  $result1;

		$this->template->write_view('content', 'admin/assign_orders/index',$data);
		$this->template->render();

	}


 public function assign()
 {

   $id = $this->uri->segment('4');

   $data['deliveryboydata'] = $this->deliveryboy_model->get($id);
     $data['ordersdata'] = $this->assign_orders_model->get_notassignedorders();
    // echo "<pre>"; print_r($data); 
     $this->template->write_view('content', 'admin/assign_orders/assign',$data);
	$this->template->render();
}

 public function assigned_insert()
 {

      $deliveryboy_id = $this->uri->segment('4');
       $order_id = $this->input->post('order_id');

     $data = array(
  	  	'order_id' => $this->input->post('order_id'),
  	  	'deliveryboy_id' => $deliveryboy_id
  	  	);

     $res=$this->assign_orders_model->insert($data);

    	if($res)

			{
               
		$update_deliveryboy = $this->assign_orders_model->updatedeliveryboy_status($deliveryboy_id); 
		$update_order = $this->assign_orders_model->updateorder_status($order_id);
              if($update_deliveryboy && $update_order)
               {
				$this->prepare_flashmessage("Order successfully sssigned to the deliveryboy ..", 0);
               return redirect('admin/assign_orders');
	           }else{

	           	$this->prepare_flashmessage("Failed to Assign Order to the Deliveryboy..", 1);
				return redirect('admin/assign_orders');
	           }
           }
         else{      
               $this->prepare_flashmessage("Failed to Assign..", 1);
				return redirect('admin/assign_orders');
			}
 }

public function search()
{        
                $match = $this->input->post('search');
			 
			 	$this->load->library('pagination');
		$result=$this->assign_orders_model->search_busydeliveryboys($match);
		//echo "<pre>";print_r($result);exit;
		$result1=$this->assign_orders_model->search_freedeliveryboys($match);
		//echo "<pre>";print_r($result1);exit;
		$data['busydeliveryboysdata'] =  $result;
		$data['freedeliveryboysdata'] =  $result1;

		$this->template->write_view('content', 'admin/assign_orders/index',$data);
		$this->template->render();

	}
}	
