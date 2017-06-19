<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	public function __construct() {
		parent::__construct();

   
}

 public function index() {

 	$this->load->view('seller/header');
  $this->load->view('seller/aboutus');
$this->load->view('seller/footer');
	// $this->template->write_view('content', 'seller/aboutus/index');
	// 	$this->template->render();
        //$this->template->render(); 
  }
  }