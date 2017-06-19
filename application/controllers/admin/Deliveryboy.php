<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Deliveryboy extends Admin_Controller {



	public function __construct() {

		parent::__construct();

		 $this->load->library('email');
          $this->load->library('encrypt');
		$this->load->model('admin/deliveryboy_model');

   }



public function index()

	{
       
		//$this->load->view('welcome_message');
		
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/deliveryboy/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->deliveryboy_model->count_by(array()),
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

		$result=$this->deliveryboy_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('deliveryboy_name',$order = 'ASC')->get_all();

		$data['deliveryboydata'] =  $result;

		$this->template->write_view('content', 'admin/deliveryboy/index', $data);

		$this->template->render();

}


public function create()

	{
    	$this->template->write_view('content', 'admin/deliveryboy/add');

		$this->template->render();

	}

public function insert()

  {

    
    if( $this->form_validation->run('deliveryboy_rules'))
    {

	 if(!empty($_FILES['deliveryboy_photo']['name'])){

                $config['upload_path'] = 'uploads/deliveryboys/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['deliveryboy_photo']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('deliveryboy_photo')){
                    $uploadData = $this->upload->data();
					$profile_pic =  base_url("uploads/deliveryboys/" . $uploadData['raw_name'] . $uploadData['file_ext']);

                   $deliveryboy_photo =   $uploadData['raw_name'] . $uploadData['file_ext'];
               }
               else{

               	    $this->prepare_flashmessage("Plz Choose Valid deliveryboy_photo..", 1);
                    echo "<script>window.location='".base_url()."admin/deliveryboys';</script>";
               }

                }else{

                	 $deliveryboy_photo = '';

                }

  	  $data = array(
  	  	'deliveryboy_name' => $this->input->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->input->post('deliveryboy_email'),
  	  	'deliveryboy_password' => md5($this->input->post('deliveryboy_password')),
  	  	'deliveryboy_mobile' => $this->input->post('deliveryboy_mobile'),
        'deliveryboy_alternateno' => $this->input->post('deliveryboy_alternateno'),
  	  	'deliveryboy_address' => $this->input->post('deliveryboy_address'),
  	  	'deliveryboy_bike' => $this->input->post('deliveryboy_bike'),
  	  	'deliveryboy_bikeno' =>$this->input->post('deliveryboy_bikeno'),
  	  	'deliveryboy_license' => $this->input->post('deliveryboy_license'),
  	  	'deliveryboy_adhar' => $this->input->post('deliveryboy_adhar'),
  	  	'deliveryboy_bank' => $this->input->post('deliveryboy_bank'),
  	  	'deliveryboy_photo' => $deliveryboy_photo

  	  	);
  	//print_r($data); exit;
	$res=$this->deliveryboy_model->insert($data);

    	if($res)

			{

		$date = date("d-m-Y");
		  
          $deliveryboy_name = $this->input->post('deliveryboy_name');
				 
         $to_email = $this->input->post('deliveryboy_email');

         $password = $this->input->post('deliveryboy_password');

         $from_email = 'ravali@kateit.in'; //change this to yours

         $subject = '$journal_name - Account Created in Research Article Central';

         $message = "$date<br>
		 Dear $deliveryboy_name<br><br>
		  Welcome to the Infinity hour
           Your User-Id and Password for your account <br><br>

            <strong> Username</strong> : $to_email <br>
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

                   return redirect('admin/deliveryboy');

                 }else{

                     $this->prepare_flashmessage("Successfully inserted ,But Failed to send Email..", 2);
                     return redirect('admin/deliveryboy');

                  }
            } else

			{

				//redirect(site_url('add_blogs_view'));

				$this->prepare_flashmessage("Failed to Insert..", 1);

				return redirect('admin/deliveryboy');

			}
   }

		else
		{
			$this->template->write_view('content', 'admin/deliveryboy/add');
	         $this->template->render();
		}
	}



public function delete()

	{

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);

		$result=$this->deliveryboy_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('admin/deliveryboy');

		}

	}



public function edit()

	{

		$id = $this->uri->segment(4); //controller/function/id

		$result=$this->deliveryboy_model->get($id);
		//print_r($result);
		//exit;
		$data['deliveryboydata'] = null;
		if($result)

		{
			$data['deliveryboydata'] = $result;
		}

		$this->template->write_view('content', 'admin/deliveryboy/edit',$data);
		$this->template->render();

	}

public function update()

	{


		$id = $this->uri->segment(4);

	if( $this->form_validation->run('updatedeliveryboy_rules'))
    {

		 if(!empty($_FILES['deliveryboy_photo']['name'])){

                $config['upload_path'] = 'uploads/deliveryboys/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['deliveryboy_photo']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('deliveryboy_photo')){
                    $uploadData = $this->upload->data();
					$profile_pic =  base_url("uploads/deliveryboys/" . $uploadData['raw_name'] . $uploadData['file_ext']);

                   $deliveryboy_photo =   $uploadData['raw_name'] . $uploadData['file_ext'];
               }
               else{

               	     $deliveryboy_photo = $_POST['hidn'];
               }

                }else{

                	 $deliveryboy_photo = $_POST['hidn'];

                }

  	  $data = array(
  	  	'deliveryboy_name' => $this->input->post('deliveryboy_name'),
  	  	'deliveryboy_email' => $this->input->post('deliveryboy_email'),
  	  	'deliveryboy_mobile' => $this->input->post('deliveryboy_mobile'),
  	  	'deliveryboy_alternateno' => $this->input->post('deliveryboy_alternateno'),
  	  	'deliveryboy_address' => $this->input->post('deliveryboy_address'),
  	  	'deliveryboy_bike' => $this->input->post('deliveryboy_bike'),
  	  	'deliveryboy_bikeno' => $this->input->post('deliveryboy_bikeno'),
  	  	'deliveryboy_license' => $this->input->post('deliveryboy_license'),
  	  	'deliveryboy_adhar' => $this->input->post('deliveryboy_adhar'),
  	  	'deliveryboy_bank' => $this->input->post('deliveryboy_bank'),
  	  	'deliveryboy_photo' => $deliveryboy_photo

  	  	);
          $res=$this->deliveryboy_model->update($id,$data);
			if($res)

			{
				$this->prepare_flashmessage("Successfully Updated..", 0);
				return redirect('admin/deliveryboy');
			}

			else
			{
			   $this->prepare_flashmessage("Failed to Update..", 1);
				return redirect(base_url('admin/deliveryboy'));
			}
}else{

	$result=$this->deliveryboy_model->get($id);
		//print_r($result);
		//exit;
		$data['deliveryboydata'] = null;
		if($result)

		{
			$data['deliveryboydata'] = $result;
		}

		$this->template->write_view('content', 'admin/deliveryboy/edit',$data);
		$this->template->render();
}

 }

public function view_details()
{

  $id = $this->uri->segment('4');

  $data['deliveryboydata'] = $this->deliveryboy_model->get($id);

  //echo "<pre>";print_r($data);exit;
  $this->template->write_view('content', 'admin/deliveryboy/view_details',$data);

  $this->template->render();

}

public function search()
	
  {

   	         $match = $this->input->post('search');
			 
			 	$result1 = $this->deliveryboy_model->search($match);
				$result2 = count($result1);
				//echo $result2;exit;
              $this->load->library('pagination');

			  $config = [
			   'base_url'       =>  base_url('admin/deliveryboy/search'),
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

			$result=$this->deliveryboy_model->limit($config['per_page'], $this->uri->segment(4) )->search($match);

			$data['deliveryboydata'] =  $result;

			$this->template->write_view('content', 'admin/deliveryboy/index',$data);

			$this->template->render();

	}


}







