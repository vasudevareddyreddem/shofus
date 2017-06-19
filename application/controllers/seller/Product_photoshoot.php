<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_photoshoot extends CI_Controller {

	public function __construct() {
		parent::__construct();

    //$this->load->library('email');
    //$this->load->library('encrypt');
    //$this->load->model('seller/login_model');
		
		

}

 public function index() {
	$this->load->view('seller/header');
  	$this->load->view('seller/product_photoshoot');
	$this->load->view('seller/footer');
  }
  
  }




  