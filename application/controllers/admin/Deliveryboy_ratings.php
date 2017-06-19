<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Deliveryboy_ratings extends Admin_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('admin/deliveryboy_ratings_model');

   }



public function index()

	{
       
		//$this->load->view('welcome_message');
		
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/deliveryboy_ratings/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->deliveryboy_ratings_model->count_by(array()),
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

		$result=$this->deliveryboy_ratings_model->limit($config['per_page'], $this->uri->segment(4) )->order_by('created_at',$order = 'DESC')->get_all();

		$data['deliveryboy_ratingsdata'] =  $result;

		$this->template->write_view('content', 'admin/deliveryboy_ratings/index', $data);

		$this->template->render();

}


public function delete()

	{

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);
		$result=$this->deliveryboy_ratings_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);
			return redirect('admin/deliveryboy_ratings');

		}

	}

}
