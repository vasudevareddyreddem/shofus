<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Payments extends Admin_Controller {

  public function __construct() {

		parent::__construct();
		$this->load->model('admin/payments_model');
		$this->load->model('admin/orders_model');
		$this->load->model('admin/sellers_model');
  }

public function index()

	{

       
		//$this->load->view('welcome_message');

		$this->load->library('pagination');

		  $config = [

		   'base_url'   => base_url('admin/payments/index'),
		   'per_page'   => 3,
		   'total_rows'  => $this->payments_model->count_by(array()),
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
		$result=$this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
		$data['paymentsdata'] =  $result;
		$this->template->write_view('content', 'admin/payments/index', $data);
		$this->template->render();

}

 //*** Starts Customer Payments ***//

public function customer_payments()

	{

       
		//$this->load->view('welcome_message');

		$this->load->library('pagination');

		  $config = [

		   'base_url'   => base_url('admin/payments/customer_payments'),
		   'per_page'   => 3,
		   'total_rows'  => $this->payments_model->count_by(array()),
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
		$result=$this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();
		$data['paymentsdata'] =  $result;
		$this->template->write_view('content', 'admin/payments/customer_payments', $data);
		$this->template->render();

}

public function delete()
	{
	//echo $this->uri->segment(4); exit;

		$id=$this->uri->segment(4);
		$result=$this->payments_model->delete($id);
		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);
			return redirect('admin/payments/customer_payments');
		}

	}


public function order_details()
{

$id = $this->uri->segment('4');
$data['orderdata'] = $this->payments_model->getorderdata($id);
//echo "<pre>"; print_r($data); exit;
$this->template->write_view('content', 'admin/payments/order_details', $data);
$this->template->render();

}

public function search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->payments_model->search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/payments/search'),
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
            $result=$this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->search($match);
            $data['paymentsdata'] =  $result;
            $this->template->write_view('content', 'admin/payments/customer_payments',$data);

            $this->template->render();

  }

//*** End Customer Payments ***//

  //*** Starts Seller Payments ***//

public function seller_payments()

	{

       
		//$this->load->view('welcome_message');

		$this->load->library('pagination');

		$count = $this->payments_model->getseller_payments();

		$total_count = count($count);
		//echo $total_count; exit;

		  $config = [

		   'base_url'   => base_url('admin/payments/seller_payments'),
		   'per_page'   => 3,
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
		$result=$this->payments_model->limit($config['per_page'], $this->uri->segment(4) )->getseller_payments();
		$data['paymentsdata'] =  $result;
		$this->template->write_view('content', 'admin/payments/seller_payments', $data);
		$this->template->render();

}

public function sellerpayment_details()
{
	
	$seller_id = $this->uri->segment(4);
	$order_id = $this->uri->segment(5);
	$result=$this->payments_model->getindseller_payment($seller_id,$order_id);
	$data['paymentsdata'] =  $result;
$this->template->write_view('content', 'admin/payments/sellerpayment_details', $data);
		$this->template->render();	
	
	
	
	
}

public function create()

	{
$seller_id = $this->uri->segment(4);
	$data['order_id'] = $this->uri->segment(5);
		$result = $this->sellers_model->get_all();
		$result2 = $this->payments_model->get_singlesellerdata($seller_id);
		//echo "<pre>"; print_r($result); exit;
        $data['sellerdata'] = $result;
		$data['singlesellerdata'] = $result2;
		$this->template->write_view('content', 'admin/payments/add',$data);
		$this->template->render();
	}

public function insert()

	{
		$seller_id = $this->uri->segment(4);
	$order_id = $this->uri->segment(5);
		if(isset($_POST)){



			if(!empty($_FILES['invoice']['name'])){



				$config['upload_path'] = 'uploads/invoice/';



				$config['allowed_types'] = '*';



				$config['file_name'] = $_FILES['invoice']['name'];







                //Load upload library and initialize configuration



				$this->load->library('upload',$config);



				$this->upload->initialize($config);







				if($this->upload->do_upload('invoice')){



					$uploadData = $this->upload->data();



					$picture = $uploadData['file_name'];



				}else{



$this->prepare_flashmessage("Image format Invalid..", 1);



				//return redirect('admin/fooditems');

				echo "<script>window.location='".base_url()."admin/payments/create';</script>";



				}



			}else{



				$picture = '';



			}



		}
		
		$data=array(

            'seller_id' => $this->input->post('seller_id'),			
			'order_id' => $this->input->post('order_id'),           
			'cih_comission' => $this->input->post('cih_comission'),
			'net_profit' => $this->input->post('net_profit'),
			'invoice'=>$picture,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),

			);
		
		
		
		
		
		

		
		
		$res=$this->payments_model->seller_insert($data);
			if($res)
			{
				$this->prepare_flashmessage("Successfully Inserted..", 0);
				return redirect('admin/payments/sellerpayment_details/'.$seller_id.'/'.$order_id);

             }
			else
			{
				//redirect(site_url('add_blogs_view'));
				$this->prepare_flashmessage("Failed to Insert..", 1);
				return redirect('admin/payments/sellerpayment_details/'.$seller_id.'/'.$order_id);
			}
	}

	public function edit()

	{

		$id = $this->uri->segment(4); //controller/function/id

		$data['sellerdata'] = $this->sellers_model->get_all();
		$result=$this->payments_model->get_sellerpayments($id);
		$data['paymentsdata'] = null;
		if($result)
		{

			$data['paymentsdata'] = $result;

		}

		$this->template->write_view('content', 'admin/payments/edit',$data);
		$this->template->render();
	}


public function update()
	{

		$id = $this->uri->segment(4);
		$seller_id = $this->uri->segment(5);
		$order_id = $this->uri->segment(6);
		
		if(isset($_POST)){

if(!empty($_FILES['invoice']['name'])){

                $config['upload_path'] = 'uploads/invoice/';

                $config['allowed_types'] = '*';

                $config['file_name'] = $_FILES['invoice']['name'];

                

                //Load upload library and initialize configuration

                $this->load->library('upload',$config);

                $this->upload->initialize($config);

                

                if($this->upload->do_upload('invoice')){

                    $uploadData = $this->upload->data();

                    $picture = $uploadData['file_name'];

                }else{

                    $picture = $_POST['hdn_inner_banner'];

                }

            }else{

                $picture = $_POST['hdn_inner_banner'];

            }

}
		
		
		

		$data=array(

            'seller_id' => $this->input->post('seller_id'),			
			'order_id' => $this->input->post('order_id'),           
			'cih_comission' => $this->input->post('cih_comission'),
			'net_profit' => $this->input->post('net_profit'),
			//'amount_status' => $this->input->post('amount_status'),
			'invoice'=>$picture,
			'updated_at' => date('Y-m-d H:i:s'),

			);

            $res=$this->payments_model->update_sellerpayments($id,$data);

            if($res)

			{

				$this->prepare_flashmessage("Successfully Updated..", 0);
				return redirect('admin/payments/sellerpayment_details/'.$seller_id.'/'.$order_id);
			}

			else

			{
			//redirect(site_url('add_blogs_view'));
				$this->prepare_flashmessage("Failed to Update..", 1);
				return redirect('admin/payments/sellerpayment_details/'.$seller_id.'/'.$order_id);
			}

	}
	
public function seller_delete()
	{
	//echo $this->uri->segment(4); exit;

		$id=$this->uri->segment(4);
		$seller_id = $this->uri->segment(5);
		$order_id = $this->uri->segment(6);
		$result=$this->payments_model->seller_delete($id);
		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);
			return redirect('admin/payments/sellerpayment_details/'.$seller_id.'/'.$order_id);
		}

	}

public function seller_details()
{

$id = $this->uri->segment('4');
$data['sellerdata'] = $this->payments_model->getsellerdata($id);
//echo "<pre>"; print_r($data); exit;
$this->template->write_view('content', 'admin/payments/seller_details', $data);
$this->template->render();

}

public function seller_search()
    
  {

             $match = $this->input->post('search');
             
                $result1 = $this->payments_model->seller_search($match);
                $result2 = count($result1);
                //echo $result2;exit;
              $this->load->library('pagination');

              $config = [
               'base_url'       =>  base_url('admin/payments/seller_search'),
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
            $this->template->write_view('content', 'admin/payments/seller_payments',$data);

            $this->template->render();

  }

//*** End Seller Payments ***//
}
