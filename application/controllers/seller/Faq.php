<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function __construct() {
		parent::__construct();
    $this->load->library('email');
    $this->load->library('encrypt');
	 $this->load->helper(array('url','html','form')); 
    //$this->load->model('seller/login_model');
		
		

}

 public function index() {
	$this->load->view('seller/header');
	$this->load->view('seller/faq');
	$this->load->view('seller/footer');
        //$this->template->render(); 
  }
  
  }