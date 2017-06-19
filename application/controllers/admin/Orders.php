<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Orders extends Admin_Controller {

  public function __construct() {

		parent::__construct();
		$this->load->model('admin/Orders_model');
  }

public function index()

	{

       
		//$this->load->view('welcome_message');

		$this->load->library('pagination');

		  $config = [

		   'base_url'   => base_url('admin/orders/index'),
		   'per_page'   => 20,
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
		$this->template->write_view('content', 'admin/orders/index', $data);
		$this->template->render();

}


public function delete()

	{

	//echo $this->uri->segment(4); exit;

		$id=$this->uri->segment(4);

		$result=$this->Orders_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('admin/orders/new_orders');

		}
}
public function assign(){
 /*echo "send";
 $oid=$_post*/
 $oid=$_POST['orderid'];
 $sid=$_POST['sellerid'];
 $result=$this->Orders_model->locationBasedDeliveryBoy($oid,$sid);
//$boy = json_decode(json_encode($result),true);
//print_r($boy);exit;
 if(!empty($result)){
foreach($result as $bd){
  $bid[]=$bd['deliveryboy_id'];
  $blocation[]=$bd['location'];
  }

 
 // print_r($blocation[0]);exit;
echo "<table class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                       <th>S.NO</th>
                      <th>Boy Id </th>
                      <th>Current Location</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                
                  <tbody>
                    

   

    <tr>
         <td> 1 </td>
      <td> $bid[0] </td>
      <td>$blocation[0] </td>
       <td>Available </td>
       <td><a href='http://dev2.kateit.in/php/cartinhour_new/admin/orders/assigntodB/'$bid[0]>Assign</a> </td>
</tr><tr>
 <td> 2 </td>
      <td> $bid[1] </td>
       <td>$blocation[1] </td>
        <td>Available </td>
         <td><a href='http://dev2.kateit.in/php/cartinhour_new/admin/orders/assigntodB/'$bid[1]>Assign </a></td>

</tr><tr>
 <td> 3 </td>
      <td> $bid[2] </td>
      <td>$blocation[2] </td> 
       <td>Available </td> 
        <td><a href='http://dev2.kateit.in/php/cartinhour_new/admin/orders/assigntodB/'$bid[2]>Assign</a> </td>       

</tr>

     

    
                </table>";
                } else{
                
                       echo "<h4>No Records Found</h4>";
                }
}

public function assigntodB(){

echo"<script>windows.location('base_url()')</script>";
}
public function new_orders()
{

  $this->load->library('pagination');

	 $result1 = $this->Orders_model->new_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('admin/orders/new_orders'),
		   'per_page'   => 20,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->new_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'admin/orders/new_orders', $data);
		$this->template->render();
}

public function new_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->new_search($match);
                $result2 = count($result1);
              //echo "<pre>"; print_r($result1);exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/new_search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->new_search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/new_orders',$data);

            $this->template->render();

    }

public function assigned_orders()
{


	$this->load->library('pagination');

	 $result1 = $this->Orders_model->assigned_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('admin/orders/assigned_orders'),
		   'per_page'   => 20,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->assigned_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'admin/orders/assigned_orders', $data);
		$this->template->render();
}

public function assigned_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->assigned_search($match);
                $result2 = count($result1);
               // echo "<pre>"; print_r($result1);exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/assigned_search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->assigned_search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/assigned_orders',$data);

            $this->template->render();

    }


public function inprogress_orders()
{
   $this->load->library('pagination');

	 $result1 = $this->Orders_model->inprogress_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('admin/orders/assigned_orders'),
		   'per_page'   => 20,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->inprogress_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'admin/orders/inprogress_orders', $data);
		$this->template->render();
}

public function inprogress_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->inprogress_search($match);
                $result2 = count($result1);
              // echo "<pre>"; print_r($result1);exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/inprogress_search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->inprogress_search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/inprogress_orders',$data);

            $this->template->render();

    }


public function delivered_orders()
{

	$this->load->library('pagination');

	 $result1 = $this->Orders_model->delivered_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('admin/orders/delivered_orders'),
		   'per_page'   => 20,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->delivered_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'admin/orders/delivered_orders', $data);
		$this->template->render();
}

public function delivered_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->delivered_search($match);
                $result2 = count($result1);
               //echo "<pre>"; print_r($result1);exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/delivered_search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->delivered_search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/delivered_orders',$data);

            $this->template->render();

    }

public function rejected_orders()
{

	$this->load->library('pagination');

	 $result1 = $this->Orders_model->rejected_orders();
	//echo "<pre>"; print_r($result1); exit;
     $result2 = count($result1);

		  $config = [

		   'base_url'   => base_url('admin/orders/rejected_orders'),
		   'per_page'   => 20,
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
		$result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->rejected_orders();
		$data['ordersdata'] =  $result;
		$this->template->write_view('content', 'admin/orders/rejected_orders', $data);
		$this->template->render();
}

public function rejected_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->rejected_search($match);
                $result2 = count($result1);
               // echo "<pre>"; print_r($result1);exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/rejected_search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('orders.created_at',$order = 'DESC')->rejected_search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/rejected_orders',$data);

            $this->template->render();

    }
public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->Orders_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/orders/search'),
               'per_page'       =>  20,
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
            $result=$this->Orders_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('created_at',$order = 'DESC')->search($match);
            $data['ordersdata'] =  $result;
            $this->template->write_view('content', 'admin/orders/index',$data);

            $this->template->render();

    }
}
