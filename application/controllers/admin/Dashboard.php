<?php

defined('BASEPATH') OR exit('No direct script access allowed');


@include_once( APPPATH . 'controllers/admin/Admin_Controller.php');

class Dashboard extends Admin_Controller {

public function __construct() {

parent::__construct();

$this->load->model('admin/orders_model');

}

	public function index()


	{


		$this->template->write_view('content', 'admin/dashboard/index');

		$this->template->render();

	}


}