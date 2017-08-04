<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Admin_Controller.php');

class Orders extends Admin_Controller {

  public function __construct() {

		parent::__construct();
		$this->load->model('seller/Orders_model');
		$this->load->model('seller/dashboard_model');
  }

public function index()

	{

       
		$result=$this->Orders_model->total();
		$data['ordersdata'] =  $result;
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/orders/index', $data);
		$this->template->render();
	

}


public function delete()

	{

	//echo $this->uri->segment(4); exit;

		$id=$this->uri->segment(4);

		$result=$this->Orders_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('seller/orders/new_orders');

		}
}

public function new_orders()
{
		$result=$this->Orders_model->new_orders();
		$data['ordersdata'] =  $result;
		//echo "<pre>";print_r($data);exit;
		$this->template->write_view('content', 'seller/orders/new_orders', $data);
		$this->template->render();
}

public function assigned_orders()
{
		$result=$this->Orders_model->assigned_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller/orders/assigned_orders', $data);
		$this->template->render();
}

public function inprogress_orders()
{
   
		$result=$this->Orders_model->inprogress_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller/orders/inprogress_orders', $data);
		$this->template->render();
}

public function delivered_orders()
{

	
		$result=$this->Orders_model->delivered_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller/orders/delivered_orders', $data);
		$this->template->render();
}


public function rejected_orders()
{

	
		$result=$this->Orders_model->rejected_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller/orders/rejected_orders', $data);
		$this->template->render();
}


public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->orders_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('seller/orders/search'),
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
            $result=$this->orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('created_at',$order = 'DESC')->search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'seller/orders/index',$data);

            $this->template->render();

    }
}
