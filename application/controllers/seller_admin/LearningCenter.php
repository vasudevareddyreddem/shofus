<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LearningCenter extends CI_Controller {

	public function __construct() {
		parent::__construct();

    $this->load->library('email');
    $this->load->library('encrypt');
    //$this->load->model('seller_admin/login_model');
		
		

}

 public function index() {
	 
	  
	  
	 
	 
	$this->load->view('seller_admin/header');
  $this->load->view('seller_admin/learningcenter');
$this->load->view('seller_admin/footer');
        //$this->template->render(); 
  }
  
  }