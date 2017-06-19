<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller_admin/Admin_Controller.php');

class Orders extends Admin_Controller {

  public function __construct() {

		parent::__construct();
		$this->load->model('seller_admin/Orders_model');
  }

public function index()

	{

       
		//$this->load->view('welcome_message');

		$this->load->library('pagination');

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->Orders_model->count_by(array()),
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('created_at',$order = 'DESC')->get_all();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/index', $data);
		$this->template->render();

}


public function delete()

	{

	//echo $this->uri->segment(4); exit;

		$id=$this->uri->segment(4);

		$result=$this->Orders_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('seller_admin/orders/new_orders');

		}
}

public function new_orders()
{

  $this->load->library('pagination');

	 $result1 = $this->Orders_model->new_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/new_orders'),
		   'per_page'   => 5,
		   'total_rows'  => $result2,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->new_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/new_orders', $data);
		$this->template->render();
}

public function assigned_orders()
{


	$this->load->library('pagination');

	 $result1 = $this->Orders_model->assigned_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/assigned_orders'),
		   'per_page'   => 5,
		   'total_rows'  => $result2,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->assigned_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/assigned_orders', $data);
		$this->template->render();
}

public function inprogress_orders()
{
   $this->load->library('pagination');

	 $result1 = $this->Orders_model->inprogress_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/assigned_orders'),
		   'per_page'   => 5,
		   'total_rows'  => $result2,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->inprogress_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/inprogress_orders', $data);
		$this->template->render();
}

public function delivered_orders()
{

	$this->load->library('pagination');

	 $result1 = $this->Orders_model->delivered_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/delivered_orders'),
		   'per_page'   => 5,
		   'total_rows'  => $result2,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->delivered_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/delivered_orders', $data);
		$this->template->render();
}


public function rejected_orders()
{

	$this->load->library('pagination');

	 $result1 = $this->Orders_model->rejected_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('seller_admin/orders/rejected_orders'),
		   'per_page'   => 5,
		   'total_rows'  => $result2,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->rejected_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'seller_admin/orders/rejected_orders', $data);
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
               'base_url'       =>  base_url('seller_admin/orders/search'),
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
            $this->template->write_view('content', 'seller_admin/orders/index',$data);

            $this->template->render();

    }
}
