<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Sellers extends Admin_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('email');
        $this->load->library('encrypt');
		$this->load->model('admin/sellers_model');

   }



public function index()

	{
       
		//$this->load->view('welcome_message');
		
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/sellers/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->sellers_model->count_by(array()),
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

		$result=$this->sellers_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('seller_shop',$order = 'ASC')->get_all();

		$data['sellerdata'] =  $result;

		$this->template->write_view('content', 'admin/sellers/index', $data);

		$this->template->render();

}


public function create()

	{
    	$this->template->write_view('content', 'admin/sellers/add');

		$this->template->render();

	}

public function insert()

  {
    if( $this->form_validation->run('seller_rules'))
    {
  	 
      $data = array(
  	  	'seller_name' => $this->input->post('seller_name'),
  	  	'seller_email' => $this->input->post('seller_email'),
  	  	'seller_password' => md5($this->input->post('seller_password')),
  	  	'seller_mobile' => $this->input->post('seller_mobile'),
  	  	'seller_address' => $this->input->post('seller_address'),
  	  	'seller_shop' => $this->input->post('seller_shop'),
  	  	'seller_license' => $this->input->post('seller_license'),
  	  	'seller_servicetime' => $this->input->post('seller_servicetime'),
  	  	'seller_bank' => $this->input->post('seller_bank'),
  	  	'type' => $this->input->post('type'),
  	  	'status' => $this->input->post('status'),

  	  	);
  	 // print_r($data);
  	  //exit;

	$res=$this->sellers_model->insert($data);

    	if($res)

			{
				$date = date("d-m-Y");
		  
          $seller_name = $this->input->post('seller_name');
				 
         $to_email = $this->input->post('seller_email');

         $password = $this->input->post('seller_password');

         $from_email = 'ravali@kateit.in'; //change this to yours

         $subject = '$journal_name - Account Created in Research Article Central';

         $message = "$date<br>
		 Dear $seller_name<br><br>
		  Welcome to the Infinity hour as a Seller
           Your User-Id and Password for your account <br><br>

            <strong> Username</strong> : $seller_name <br>
            <strong> Password</strong> : $password <br>  
			
		  Please note that your PASSWORD is case-sensitive.<br><br>
		  Thank you for your participation.<br>
        Sincerely,<br>
Infinity hour";

        //send mail

        $this->email->set_mailtype("html");

        $this->email->from($from_email, 'Infinity Hour');

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

       if($this->email->send()){

                    $this->prepare_flashmessage(" Email Sent Successfully..", 0);

                   return redirect('admin/sellers');

                 }else{

                     $this->prepare_flashmessage("Successfully inserted ,But Failed to send Email..", 2);

                     return redirect('admin/sellers');

                  }
        	}

			else

			{
				//redirect(site_url('add_blogs_view'));
				$this->prepare_flashmessage("Failed to Insert..", 1);
				return redirect('admin/sellers');

			}
    }

		else
		{
			$this->template->write_view('content', 'admin/sellers/add');
	         $this->template->render();
		}
	}



public function delete()

	{

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);
		$result=$this->sellers_model->delete($id);
		if($result==1){
			$this->prepare_flashmessage("Successfully Deleted..", 0);
			return redirect('admin/sellers');
		}

	}



public function edit()

	{

		$id = $this->uri->segment(4); //controller/function/id
		$result=$this->sellers_model->get($id);
		//print_r($result);
		//exit;
		$data['sellerdata'] = null;
		if($result)
		{
			$data['sellerdata'] = $result;

		}
		
		$this->template->write_view('content', 'admin/sellers/edit',$data);
		$this->template->render();
	}

public function update()

	{

		$id = $this->uri->segment(4);

    if( $this->form_validation->run('updateseller_rules'))
    {
		$data = array(
  	  	'seller_name' => $this->input->post('seller_name'),
  	  	'seller_email' => $this->input->post('seller_email'),
  	  	'seller_mobile' => $this->input->post('seller_mobile'),
  	  	'seller_address' => $this->input->post('seller_address'),
  	  	'seller_shop' => $this->input->post('seller_shop'),
  	  	'seller_license' => $this->input->post('seller_license'),
  	  	'seller_servicetime' => $this->input->post('seller_servicetime'),
  	  	'seller_bank' => $this->input->post('seller_bank'),
  	  	'type' => $this->input->post('type'),
  	  	'status' => $this->input->post('status'),

  	  	);

  	  	//print_r($data); exit;
          $res=$this->sellers_model->update($id,$data);

			if($res)

			{
				$this->prepare_flashmessage("Successfully Updated..", 0);
				return redirect('admin/sellers');

			}

			else
			{

			   $this->prepare_flashmessage("Failed to Update..", 1);
				return redirect(base_url('admin/sellers'));

			}

   }else{

    $result=$this->sellers_model->get($id);
		//print_r($result);
		//exit;
		$data['sellerdata'] = null;
		if($result)
		{
			$data['sellerdata'] = $result;

		}
		
		$this->template->write_view('content', 'admin/sellers/edit',$data);
		$this->template->render();

   }
 }

public function view_details()
{

  $id = $this->uri->segment('4');

  $data['sellerdata'] = $this->sellers_model->get($id);
  $data['file_pathes'] = $this->sellers_model->getReportFiles($id);

  //echo "<pre>";print_r($data);exit;
  $this->template->write_view('content', 'admin/sellers/view_details',$data);

  $this->template->render();

}

public function products_view()
{

  $id = $this->uri->segment('4');

  $data['sellerproductsdata'] = $this->sellers_model->getproductdata($id);
 

  //echo "<pre>";print_r($data);exit;
  $this->template->write_view('content', 'admin/sellers/products_details',$data);

  $this->template->render();

}

public function approve_status()
{
	
	$id = $this->uri->segment('4');
	
	$data= array(
	
	'admin_status' => 1
	
	);
	
	$res = $this->sellers_model->updatestatus($data,$id);
	
	if($res)
	{
		return redirect('admin/sellers/products_view/'.$this->uri->segment('5'));
		
		
		
	}
	
	
	
}

public function reject_status()
{
	
	$id = $this->uri->segment('4');
	
	$data= array(
	
	'admin_status' => 2
	
	);
	
	$res = $this->sellers_model->updatestatus($data,$id);
	
	if($res)
	{
		return redirect('admin/sellers/products_view/'.$this->uri->segment('5'));
		
		
		
	}
	
	
}

public function search()
	
  {

   	         $match = $this->input->post('search');
			 
			 	$result1 = $this->sellers_model->search($match);
				$result2 = count($result1);
				//echo $result2;exit;
              $this->load->library('pagination');

			  $config = [
			   'base_url'       =>  base_url('admin/sellers/search'),
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

			$result=$this->sellers_model->limit($config['per_page'], $this->uri->segment(4) )->search($match);

			$data['sellerdata'] =  $result;

			$this->template->write_view('content', 'admin/sellers/index',$data);

			$this->template->render();

	}


}







