<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/seller/Seller_adddetails.php');
class Seller_adddetails extends MY_Controller {

	public function __construct() 
	{
			parent::__construct();
	   	$this->template->set_template('seller');        
        //$this->template->write_view('footer', 'seller/shared/footer');
   //       if (!current_admin()) {
   //            return redirect(base_url('seller/login'));
		 // }
	}
}