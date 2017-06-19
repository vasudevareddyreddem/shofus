<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Feedback extends Admin_Controller {


  public function __construct() {

		parent::__construct();

		$this->load->model('admin/feedback_model');

	}

	public function index()
	{

		 $this->load->library('pagination');

			  $config = [
			   'base_url'   => base_url('admin/feedback/index'),
			   'per_page'   => 5,
			   'total_rows'  => $this->feedback_model->count_by(array()),
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
			
			$result=$this->feedback_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();

			$data['feedbackdata'] =  $result;

			$this->template->write_view('content', 'admin/feedback/index',$data);

			$this->template->render();
	}



	public function delete()

	{

          $id=$this->uri->segment(4);

			$result=$this->feedback_model->delete($id);

			if($result==1){

	        $this->prepare_flashmessage("Successfully Deleted..", 0);

	        echo "<script>window.location='".base_url()."admin/feedback';</script>";
			}


	}







}







