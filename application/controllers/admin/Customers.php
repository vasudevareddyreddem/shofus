<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');



class Customers extends Admin_Controller {



	

	public function __construct() {

		parent::__construct();

		$this->load->model('admin/customers_model');

		

	}



	public function index()

	{
		$this->load->library('pagination');

		  $config = [
		   'base_url'   => base_url('admin/customers/index'),
		   'per_page'   => 5,
		   'total_rows'  => $this->customers_model->count_by(array()),
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

		//$this->load->view('welcome_message');

		$result=$this->customers_model->limit($config['per_page'], $this->uri->segment(4) )->get_all();

		$data['customersdata'] =  $result;

		$this->template->write_view('content', 'admin/customers/index', $data);

		$this->template->render();

	}

	public function delete()

	{

	//echo $this->uri->segment(3); exit;

		$id=$this->uri->segment(4);

		$result=$this->customers_model->delete($id);

		if($result==1){

			$this->prepare_flashmessage("Successfully Deleted..", 0);

			return redirect('admin/customers');

		}

	}
public function search()

	{
		$this->load->library('pagination');
		$result_count =$this->customers_model->search();

		  $config = [
		   'base_url'   => base_url('admin/customers/search'),
		   'per_page'   => 5,
		   'total_rows'  => count($result_count),
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

		//$this->load->view('welcome_message');


		$result=$this->customers_model->limit($config['per_page'], $this->uri->segment(4) )->search();

		$data['customersdata'] =  $result;

		$this->template->write_view('content', 'admin/customers/index', $data);

		$this->template->render();
	}



}