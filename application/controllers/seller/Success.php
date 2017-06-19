
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Seller_adddetails.php');

class Success extends Seller_adddetails{

	public function __construct() {
		parent::__construct();
}

 public function index() {	 

  	$this->template->write_view('content', 'seller/success/index');
    $this->template->render();
  }
  }