<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');





class Cancelledorders extends Admin_Controller {



	public function __construct() {

		parent::__construct();

		$this->load->model('admin/cancelledorders_model');

		

	}



	public function index()

	{
      
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/cancelledorders/index'),
		   'per_page'   => 10,
		   'total_rows'  => $this->cancelledorders_model->count_by(array()),
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

		$result=$this->cancelledorders_model->limit($config['per_page'], $this->uri->segment(4) )->get_allorderdetails();

		//print_r($result);exit;

		$data['orderdata'] =  $result;

		$this->template->write_view('content', 'admin/cancelledorders/index',$data);

		$this->template->render();





	}

	public function create()

	{



        $this->template->write_view('content', 'admin/cancelledorders/add');

		$this->template->render();



	}





 public function insert()

 {



    $data=$this->input->post();

    unset($data['submit']);

	     if( $this->form_validation->run('doctors_rules'))

	  {

		      $res=$this->doctors_model->insert($data);

				

	      	   if($res)

				{

				 $this->prepare_flashmessage("Successfully Inserted..", 0);

	         return redirect('admin/doctors');




				}

				else

				{

				//redirect(site_url('add_blogs_view'));

	          return redirect(base_url('doctors_insertview'));

				}



	  }

	  else

	  {

	  	



       $this->template->write_view('content', 'doctors_insertview');

       $this->template->render();

	  }

}



public function delete()

	{

	//echo $this->uri->segment(3); exit;

	$id=$this->uri->segment(4);

	$result=$this->cancelledorders_model->delete($id);

	if($result==1){

	 //return redirect('admin/orders');
	 echo "<script>window.location='".base_url()."admin/orders';</script>";

	}

	}



public function edit()

	{

		$id = $this->uri->segment(4); //controller/function/id

		$result=$this->cancelledorders_model->geteditdata($id);

		$data['orderdata'] = null;
		//print_r($result);exit;

		if($result)

		{

		$data['orderdata'] = $result;

		}

		

		$this->template->write_view('content', 'admin/cancelledorders/edit',$data);

		$this->template->render();

	}

	public function view()

	{

		$id = $this->uri->segment(4); //controller/function/id

		$result=$this->cancelledorders_model->getviewdata($id);

		$data['orderdata'] = null;
		//print_r($result);exit;

		if($result)

		{

		$data['orderdata'] = $result;

		}

		

		$this->template->write_view('content', 'admin/cancelledorders/view',$data);

		$this->template->render();

	}


public function updatedorder()

	{


		 $id = $this->input->post('hidden');
		  $status=$this->input->post('order_status');
		  $name=$this->input->post('user_name');
		  

		  $mobile=$this->input->post('phone');
       $data=$this->input->post();
     // print_r( $data);exit;
       unset($data['submit']);
       unset($data['hidden']);
     
       $res=$this->cancelledorders_model->update($id,$data);
		
      	if($res)
			{

				if($status==0){
$status="Pending";
				}
				if($status==1){
$status="In-Process";
				}
				if($status==2){
$status="Delivered";
				}
				if($status==3){
$status="Reject";
				}

 $api_url2 ='http://alerts.skycel.in/api/v3/?method=sms&api_key=A33d981a613df2d9afeb0e93004ec935b&to='.$mobile.'&sender=ORDABA&message=Dear%20'.$name.'%20Your%20Order%20status%20is%20'.$status.'%20ThankYou%20OrderYourdabba';
    
    $response = file_get_contents($api_url2);
//print_r($response);exit;

//sending email
$to_email=$this->input->post('email');
$this->load->library('email'); 
   

   $messege="Dear $name ,

   				Your order  order id # $id  is  $status

   			ThankYou,
   			OrderYourDabba  ";

   $toemail=$this->input->post('email');
         $this->email->from('yazdana.khan123@gmail.com', 'OrderYourDabba'); 
         $this->email->to($toemail);
         $this->email->subject('Order Status '); 
         $this->email->message($messege); 
   
         //Send mail 
         $this->email->send();



			$this->prepare_flashmessage("Successfully Updated..", 0);
        
         echo "<script>window.location='".base_url()."admin/orders';</script>";
			}
			else
			{
			$this->prepare_flashmessage("Failed to Update..", 1);
   
     echo "<script>window.location='".base_url()."admin/orders';</script>";
			}
			
		
	
}

public function search()

	{
      
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/cancelledorders/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->cancelledorders_model->count_by(array()),
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

		$result=$this->cancelledorders_model->limit($config['per_page'], $this->uri->segment(4) )->search();

		//print_r($result);exit;

		$data['orderdata'] =  $result;

		$this->template->write_view('content', 'admin/cancelledorders/index',$data);

		$this->template->render();





	}



public function status(){
	//$status=$_POST['status_id'];
	echo "hi"; 
}
}







  



 



